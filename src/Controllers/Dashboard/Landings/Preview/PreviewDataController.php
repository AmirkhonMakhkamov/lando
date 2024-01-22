<?php
namespace Lando\App\Controllers\Dashboard\Landings\Preview;

class PreviewDataController {
    private $data;
    private $title_parts;

    function __construct($data){
        $this->data = $data;

        $this->title_parts = preg_split(
            '/\W+/',
            $this->data['title'],
            2
        );
    }

    private function getUrl(){
        return $this->data['url'];
    }

    private function getAppStoreUrl(){
        if (isset($this->data['appStore_url']) && !empty($this->data['appStore_url'])) {
            return $this->data['appStore_url'];
        }else{
            if (preg_match('/https:\/\/apps\.apple\.com\//', $this->data['url'])) {
                return $this->data['url'];
            }else{
                return "";
            }
        }
    }

    private function getGooglePlayUrl(){
        if (isset($this->data['googlePlay_url']) && !empty($this->data['googlePlay_url'])) {
            return $this->data['googlePlay_url'];
        }else{
            if (preg_match('/https:\/\/play\.google\.com\/store\/apps\/details\?id=/', $this->data['url'])) {
                return $this->data['url'];
            }else{
                return "";
            }
        }
    }

    private function getLogo(){
        return $this->data['logo'];
    }

    private function getTitle(){
        return $this->data['title'];
    }

    private function getTitleFirst(){
        return trim($this->title_parts[0]);
    }

    private function getTitleRest(){
        return isset($this->title_parts[1]) ? trim($this->title_parts[1]) : '';
    }

    private function getSubtitle(){
        return explode(".", $this->data['subtitles'])[0];
    }

    private function getSubtitle2(){
        return explode(".", $this->data['subtitles'])[1];
    }

    private function getSubtitle3(){
        return explode(".", $this->data['subtitles'])[2];
    }

    private function getScreenshots(){
        return $this->data['screenshots'];
    }

    private function getReviews(){
        return $this->data['reviews'];
    }

    private function getFeatures(){
        if (!empty($this->data['features'][0])) {
            $features = $this->data['features'];
            
            foreach ($features as &$feature) {
                if (isset($feature['icon'])) {
                    $feature['icon'] = "bx bx-" . $feature['icon'];
                }else{
                    $feature['icon'] = "widget";
                }
            }
            return $features;
        }else{
            return $this->data['features'];
        }
    }

    private function getHiw(){
        if (!empty($this->data['how_it_works'][0])) {
            $how_it_works = $this->data['how_it_works'];
            
            foreach ($how_it_works as &$hiw) {
                if (isset($hiw['icon'])) {
                    $hiw['icon'] = "bx bx-" . $hiw['icon'];
                }else{
                    $hiw['icon'] = "widget";
                }
            }
            return $how_it_works;
        }else{
            return $this->data['how_it_works'];
        }
    }

    private function getSteps(){
        return $this->data['steps'];
    }

    private function getFaq(){
        return $this->data['faq'];
    }

    private function getPageTitle() {
        if (isset($this->data['page_title']) && !empty($this->data['page_title'])) {
            return $this->data['page_title'];
        }else{
            return $this->getTitleFirst();
        }
    }

    private function getPageDescription() {
        if (isset($this->data['page_description']) && !empty($this->data['page_description'])) {
            return $this->data['page_description'];
        }else{
            return $this->getSubtitle();
        }
    }

    public function getPreviewData(){
        return [
            "url" => $this->getUrl(),
            "googlePlay_url" => $this->getGooglePlayUrl(),
            "appStore_url" => $this->getAppStoreUrl(),
            "logo" => $this->getLogo(),
            "title" => $this->getTitle(),
            "title_first" => $this->getTitleFirst(),
            "title_rest" => $this->getTitleRest(),
            "subtitle" => $this->getSubtitle(),
            "subtitle2" => $this->getSubtitle2(),
            "subtitle3" => $this->getSubtitle3(),
            "screenshots" => $this->getScreenshots(),
            "reviews" => $this->getReviews(),
            "features" => $this->getFeatures(),
            "hiw" => $this->getHiw(),
            "steps" => $this->getSteps(),
            "faq" => $this->getFaq(),
            "page_title" => $this->getPageTitle(),
            "page_description" => $this->getPageDescription()
        ];
    }
}
?>