<?php
namespace Lando\App\Controllers\Dashboard\Landings;

class NewLandingController {
    private $url;
    private $data;
    
    function __construct($url){
        $this->url = $url;
        $this->data = [];
        $this->data['url'] = $this->url;
    }

    public function main(){
        if ($this->readUrl()) {
            if ($this->processGptData()) {
                return $this->data;
            }
        }

        return [];
    }

    private function processGptData() {
        try {
            $this->gptSubtitles();
            $this->gptFeatures();
            $this->gptHowitworks();
            $this->gptSteps();
            $this->gptFAQ();

            return true;
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    public function run(){
        if ($this->readUrl()) {
            $this->gptSubtitles();
            $this->gptFeatures();
            $this->gptHowitworks();
            $this->gptSteps();
            $this->gptFAQ();
            return $this->data;
        }else{
            return [];
        }
    }

    private function multiCurlRequests($requests) {
        $mh = curl_multi_init();
        $handles = [];
        $responses = [];

        foreach ($requests as $key => $request) {
            $ch = curl_init();
            curl_setopt_array($ch, $request['options']);
            $handles[$key] = $ch;
            curl_multi_add_handle($mh, $ch);
        }

        $active = null;
        do {
            $status = curl_multi_exec($mh, $active);
            if ($active) {
                curl_multi_select($mh);
            }
        } while ($active && $status == CURLM_OK);

        foreach ($handles as $key => $ch) {
            $responses[$key] = curl_multi_getcontent($ch);
            curl_multi_remove_handle($mh, $ch);
        }

        curl_multi_close($mh);

        return $responses;
    }

    private function readUrl(){
        if (preg_match('/https:\/\/play\.google\.com\/store\/apps\/details\?id=/', $this->url)) {
            return $this->googlePlay();

        } elseif (preg_match('/https:\/\/apps\.apple\.com\//', $this->url)) {
            $this->url = $this->modifyURL($this->url);
            $this->data['url'] = $this->url;
            return $this->appStore();

        } else {
            return false;
        }
    }

    private function modifyURL() {
        $parsedURL = parse_url($this->url);
        parse_str($parsedURL['query'] ?? '', $query);

        if (isset($query['platform'])) {
            if ($query['platform'] !== 'iphone') {
                $query['platform'] = 'iphone';
            }
        } else {
            $query['platform'] = 'iphone';
        }

        $newQuery = http_build_query($query);
        return $parsedURL['scheme'] . '://' . $parsedURL['host'] . ($parsedURL['path'] ?? '') . '?' . $newQuery . ($parsedURL['fragment'] ?? '');
    }

    private function gptSubtitles(){
        $description = $this->data['description'];

        $messages = [
            [
                'role' => 'user',
                'content' => "Generate a three-sentence description (each sentence should be concise and 100-150 characters and can be used separately) for a mobile app based on its description: \"$description\"."
            ]
        ];

        $post = [
            'model' => getenv('OPENAI_VERSION'),
            'messages' => $messages
        ];

        $response_data = $this->callOpenAI($post);

        if (isset($response_data['choices'][0]['message']['content'])) {

            $response = $response_data['choices'][0]['message']['content'];

            $content = trim(
                preg_replace(
                    '/\s+/', ' ',
                    str_replace('"', '', $response)
                )
            );

            $this->data['subtitles'] = $content;

        }else{
            $this->data['subtitles'] = $description;
        }

        return;
    }

    private function gptFeatures(){
        $description = $this->data['description'];

        $messages = [
            [
                'role' => 'system',
                'content' => "You are a technical assistant who has been given the task of analyzing and summarizing the main technical features of an app. You will generate 6 distinct features, each with a brief description."
            ],

            [
                'role' => 'user',
                'content' => "Based on the following description of an app: \"$description\", please identify and describe 6 technical features. The description of each feature should be concise and limited to 80 characters."
            ],

            [
                'role' => 'system',
                'content' => 'Please provide information about features in the following JSON format: [{"title": "Feature Title", "description": "Feature Description", "icon": "Specific icon name from boxicons.com or "widget" for a random selection"},]'
            ]
        ];

        $post = [
            'model' => getenv('OPENAI_VERSION'),
            'messages' => $messages
        ];

        try {
            $response_data = $this->callOpenAI($post);

            if (
                isset($response_data['choices'][0]['message']['content']) &&
                !empty($response_data['choices'][0]['message']['content'])
            ) {
                $content = json_decode(
                    $response_data['choices'][0]['message']['content'], true
                );

                $this->data['features'] = $content;
            } else {
                $this->data['features'] = [[]];
            }
        } catch (Exception $e) {
            error_log($e->getMessage());

            $this->data['features'] = [[]];
        }

        return;
    }

    private function gptHowitworks(){
        $description = $this->data['description'];

        $messages = [
            [
                'role' => 'system',
                'content' => "You are a technical assistant asked to describe the process of how a user can interact with an application. You will provide three key steps that explain 'How it Works?'."
            ],

            [
                'role' => 'user',
                'content' => "Please outline the three main steps a user needs to follow to start using the application based on it's description: \"$description\", such as 'Create an Account,' 'Set Up Your Profile,' etc. Provide a title and an 80-character-long description for each step."
            ],

            [
                'role' => 'system',
                'content' => 'Please provide information about steps in the following JSON format: [{"title": "Step Title", "description": "Step Description", "icon": "Specific icon name from boxicons.com or "widget" for a random selection"},]'
            ]
        ];

        $post = [
            'model' => getenv('OPENAI_VERSION'),
            'messages' => $messages
        ];

        try {
            $response_data = $this->callOpenAI($post);

            if (
                isset($response_data['choices'][0]['message']['content']) &&
                !empty($response_data['choices'][0]['message']['content'])
            ) {
                $content = json_decode(
                    $response_data['choices'][0]['message']['content'], true
                );

                $this->data['how_it_works'] = $content;
            } else {
                $this->data['how_it_works'] = [[]];
            }
        } catch (Exception $e) {
            error_log($e->getMessage());

            $this->data['how_it_works'] = [[]];
        }

        return;
    }

    private function gptSteps(){
        $description = $this->data['description'];

        $messages = [
            [
                'role' => 'system',
                'content' => "You are a technical assistant tasked with summarizing the benefits and features that a user can gain from an application. You will outline two main benefits based on the app's description."
            ],

            [
                'role' => 'user',
                'content' => "Based on the following description of the app: \"$description\", please identify and describe two main benefits or features that a user can gain from this app. Provide a title and a concise description for each."
            ],

            [
                'role' => 'system',
                'content' => 'Please return the information in JSON format, like this: [{"title": "Benefit Title", "description": "Benefit Description"},]'
            ]
        ];

        $post = [
            'model' => getenv('OPENAI_VERSION'),
            'messages' => $messages
        ];

        try {
            $response_data = $this->callOpenAI($post);

            if (
                isset($response_data['choices'][0]['message']['content']) &&
                !empty($response_data['choices'][0]['message']['content'])
            ) {
                $content = json_decode(
                    $response_data['choices'][0]['message']['content'], true
                );

                $this->data['steps'] = $content;
            } else {
                $this->data['steps'] = [[]];
            }
        } catch (Exception $e) {
            error_log($e->getMessage());

            $this->data['steps'] = [[]];
        }

        return;
    }

    private function gptFAQ(){
        $description = $this->data['description'];

        $messages = [
            [
                'role' => 'system',
                'content' => "You are a technical assistant tasked with creating a set of Frequently Asked Questions (FAQs) for an application. Based on the app's description, you will generate four FAQs that potential users might have."
            ],

            [
                'role' => 'user',
                'content' => "Based on the following description of the app: \"$description\", please identify and create four FAQs that users might have. Include both the questions and answers for each FAQ."
            ],

            [
                'role' => 'system',
                'content' => 'Please return the information in JSON format, like this: [{"question": "What does the app do?", "answer": "The app allows you to..."}, {"question": "Is the app free?", "answer": "Yes, the basic version is free..."}, ...].'
            ]
        ];

        $post = [
            'model' => getenv('OPENAI_VERSION'),
            'messages' => $messages
        ];

        try {
            $response_data = $this->callOpenAI($post);

            if (
                isset($response_data['choices'][0]['message']['content']) &&
                !empty($response_data['choices'][0]['message']['content'])
            ) {
                $content = json_decode(
                    $response_data['choices'][0]['message']['content'], true
                );

                $this->data['faq'] = $content;
            } else {
                $this->data['faq'] = [[]];
            }
        } catch (Exception $e) {
            error_log($e->getMessage());

            $this->data['faq'] = [[]];
        }

        return;
    }

    private function callOpenAI($post){
        $requests = [
            'openai' => [
                'options' => [
                    CURLOPT_URL => getenv('OPENAI_API_ENDPOINT'),
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_POST => true,
                    CURLOPT_POSTFIELDS => json_encode($post),
                    CURLOPT_HTTPHEADER => [
                        'Authorization: Bearer ' . getenv('OPENAI_API_KEY'),
                        'Content-Type: application/json'
                    ]
                ]
            ]
        ];

        $responses = $this->multiCurlRequests($requests);
        return json_decode($responses['openai'], true);
    }

    private function googlePlay(){
        $requests = [
            'googlePlay' => [
                'options' => [
                    CURLOPT_URL => getenv('SCRAPER_PROVIDER') . getenv('SCRAPER_API_KEY') . '&url=' . urlencode($this->url),
                    CURLOPT_RETURNTRANSFER => 1
                ]
            ]
        ];

        $responses = $this->multiCurlRequests($requests);
        $response = $responses['googlePlay'];

        $dom = new \DOMDocument();
        @$dom->loadHTML(mb_convert_encoding($response, 'HTML-ENTITIES', 'UTF-8'));

        $xpath = new \DOMXPath($dom);

        // Title
        $title = $xpath->query("//h1[@itemprop='name']/span");
        if ($title->length > 0) {
            $title = $title->item(0)->nodeValue;
            $this->data['title'] = $title;
        }else{
            return false;
        }

        // Logo
        $logo = $xpath->query("//img[contains(@class, 'T75of')]");
        if ($logo->length > 0) {
            $logo = $logo->item(0)->getAttribute("src");
            $this->data['logo'] = $logo;
        }

        // Screenshots
        $screenshots = $xpath->query("//img[contains(@alt, 'Screenshot image')]");
        // $screenshot_width = "2104";
        // $screenshot_height = "1184";
        $screenshot_width = "1052";
        $screenshot_height = "592";
        foreach ($screenshots as $screenshot) {
            $screenshot_url = $screenshot->getAttribute("src");

            $new_screenshot_url = preg_replace(
                '/=w(\d+)-h(\d+)(-rw)?/',
                '=w' . $screenshot_width . '-h' . $screenshot_height . '$3',
                $screenshot_url
            );

            $this->data['screenshots'][] = $new_screenshot_url;
        }

        // Description
        $description = $xpath->query("//div[@data-g-id='description']");
        if ($description->length > 0) {
            $description = $description->item(0)->nodeValue;
            $this->data['description'] = nl2br(str_replace("<br>", "\n", $description));
        }else{
            return false;
        }

        // Reviews
        $reviews = $xpath->query("//div[@class='gSGphe']");
        if ($reviews->length > 0) {
            for ($i = 0; $i < count($reviews); $i++) {
                // $review_img_width = "256";
                $review_img_width = "128";

                $new_review_img = preg_replace(
                    '/=s\d+/',
                    '=s' . $review_img_width,
                    $xpath->query(".//img/@src", $reviews->item($i))->item(0)->nodeValue
                );

                $this->data['reviews'][] = [
                    'img' => $new_review_img,
                    'name' => $xpath->query(".//div", $reviews->item($i))->item(0)->nodeValue,
                    'rating' => $xpath->query("//div[@class='iXRFPc']")->item($i)->getAttribute("aria-label"),
                    'content' => $xpath->query("//div[@class='h3YV2d']")->item($i)->nodeValue
                ];
            }
        }else{
            $this->data['reviews'] = [];
        }

        return true;
    }

    private function appStore(){
        $requests = [
            'appStore' => [
                'options' => [
                    CURLOPT_URL => getenv('SCRAPER_PROVIDER') . getenv('SCRAPER_API_KEY') . '&url=' . urlencode($this->url),
                    CURLOPT_RETURNTRANSFER => 1
                ]
            ]
        ];

        $responses = $this->multiCurlRequests($requests);
        $response = $responses['appStore'];

        $dom = new \DOMDocument();
        @$dom->loadHTML(mb_convert_encoding($response, 'HTML-ENTITIES', 'UTF-8'));

        $xpath = new \DOMXPath($dom);

        // Title
        $title = $xpath->query("//h1[contains(@class, 'product-header__title app-header__title')]/text()[not(parent::span)]");
        if ($title->length > 0) {
            $this->data['title'] = trim($title->item(0)->nodeValue);
        }else{
            return false;
        }

        // Logo
        $logo = $xpath->query("//div[contains(@class, 'product-hero__media')]/picture/source");
        if ($logo->length > 0) {
            $srcset = explode(" ", explode(",", $logo->item(0)->getAttribute("srcset"))[0])[0];
            $this->data['logo'] = $srcset;
        }

        // Screenshots
        $screenshots = $xpath->query("//div[contains(@class, 'we-screenshot-viewer__screenshots')]/ul/li/picture/source");
        foreach ($screenshots as $screenshot) {
            $srcset = explode(" ", explode(",", $screenshot->getAttribute("srcset"))[0])[0];

            $src = preg_replace('/(\d+x\d+w)\.webp/', '900x0w.webp', $srcset);

            // $src = str_replace("/300x0w.webp", "/900x0w.webp", $srcset);
            $this->data['screenshots'][] = $src;
        }

        // Description
        $description = $xpath->query("//div[contains(@class, 'section__description')]");
        if ($description->length > 0) {
            $this->data['description'] = '';
            // Fetch all child nodes of the div
            $childNodes = $description->item(0)->childNodes;
            foreach ($childNodes as $node) {
                // Exclude nodes that are h2 elements
                if ($node->nodeName !== 'h2') {
                    $this->data['description'] .= nl2br(trim($node->nodeValue));
                }
            }
        }else{
            return false;
        }

        // Reviews
        $reviews = $xpath->query("//div[contains(@class, 'we-customer-review lockup')]");
        if ($reviews->length > 0) {
            for ($i = 0; $i < count($reviews); $i++) {
                $this->data['reviews'][] = [
                    'img' => "",
                    'name' => trim(explode(",", $xpath->query(".//div", $reviews->item($i))->item(0)->nodeValue)[0]),
                    'rating' => trim($xpath->query(".//figure", $reviews->item($i))->item(0)->getAttribute("aria-label")),
                    'content' => trim($xpath->query(".//h3", $reviews->item($i))->item(0)->nodeValue).". ".trim($xpath->query(".//blockquote", $reviews->item($i))->item(0)->nodeValue)
                ];
            }
        }else{
            $this->data['reviews'] = [];
        }

        return true;
    }
}
