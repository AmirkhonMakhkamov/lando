<?php
namespace Lando\App\Models\Dashboard\Landings\Preview;

class PreviewDataModel {
    private $conn;
    private $landingId;
    private $data;

    function __construct(
        $conn,
        int $landingId
    ) {
        $this->conn = $conn;
        $this->landingId = $landingId;
        $this->data = [];
    }

    private function fetchData(
        string $query,
        string $type,
        $param,
        string $dataKey,
        callable $callback
    ): bool {
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param($type, $param);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows <= 0) {
            $this->data[$dataKey][] = [];
        } else {
            while ($row = $result->fetch_assoc()) {
                $callback($row);
            }
        }
        $stmt->close();
        return true;
    }

    private function getLandingDetails() {
        return $this->fetchData(
            "SELECT * FROM landings WHERE id_landing = ?",
            "s",
            $this->landingId,
            'error',
            function ($row) {
                $this->data['title'] = $row['title_landing'];
                $this->data['logo'] = $row['logo_landing'];
                $this->data['url'] = $row['url_landing'];
                $this->data['description'] = $row['description_landing'];
                $this->data['subtitles'] = $row['subtitles_landing'];
                $this->data['appStore_url'] = $row['appStoreUrl_landing'];
                $this->data['googlePlay_url'] = $row['googlePlayUrl_landing'];
                $this->data['page_title'] = $row['pageTitle_landing'];
                $this->data['page_description'] = $row['pageDescription_landing'];
                $this->data['internalDomain'] = $row['internalDomain_landing'];
            }
        );
    }

    private function getLandingScreenshots() {
        return $this->fetchData(
            "SELECT * FROM screenshots WHERE landingId_screenshot = ?",
            "i",
            $this->landingId,
            'screenshots',
            function ($row) {
                $this->data['screenshots'][] = $row['url_screenshot'];
            }
        );
    }

    private function getLandingReviews() {
        return $this->fetchData(
            "SELECT * FROM reviews WHERE landingId_review = ?",
            "i",
            $this->landingId,
            'reviews',
            function ($row) {
                $this->data['reviews'][] = [
                    'img' => $row['img_review'],
                    'name' => $row['name_review'],
                    'rating' => $row['rating_review'],
                    'content' => $row['content_review']
                ];
            }
        );
    }

    private function getLandingFeatures() {
        return $this->fetchData(
            "SELECT * FROM features WHERE landingId_feature = ?",
            "i",
            $this->landingId,
            'features',
            function ($row) {
                $this->data['features'][] = [
                    'title' => $row['title_feature'],
                    'description' => $row['description_feature'],
                    'icon' => $row['icon_feature']
                ];
            }
        );
    }

    private function getLandingHowItWorks() {
        return $this->fetchData(
            "SELECT * FROM how_it_works WHERE landingId_hiw = ?",
            "i",
            $this->landingId,
            'how_it_works',
            function ($row) {
                $this->data['how_it_works'][] = [
                    'title' => $row['title_hiw'],
                    'description' => $row['description_hiw'],
                    'icon' => $row['icon_hiw']
                ];
            }
        );
    }

    private function getLandingSteps() {
        return $this->fetchData(
            "SELECT * FROM steps WHERE landingId_step = ?",
            "i",
            $this->landingId,
            'steps',
            function ($row) {
                $this->data['steps'][] = [
                    'title' => $row['title_step'],
                    'description' => $row['description_step']
                ];
            }
        );
    }

    private function getLandingFaq() {
        return $this->fetchData(
            "SELECT * FROM faqs WHERE landingId_faq = ?",
            "i",
            $this->landingId,
            'faq',
            function ($row) {
                $this->data['faq'][] = [
                    'question' => $row['question_faq'],
                    'answer' => $row['answer_faq']
                ];
            }
        );
    }

    public function getPreviewData() {
        $methods = [
            'getLandingDetails', 
            'getLandingScreenshots', 
            'getLandingReviews', 
            'getLandingFeatures', 
            'getLandingHowItWorks', 
            'getLandingSteps', 
            'getLandingFaq'
        ];

        foreach ($methods as $method) {
            if (!method_exists($this, $method)) {
                http_response_code(500);
                exit("<center class=\"mt-4\">500. Method $method does not exist");
            }

            if (!$this->$method()) {
                exit("<center class=\"mt-4\">404. Not found");
            }
        }

        return $this->data;
    }
}
