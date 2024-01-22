<?php
namespace Lando\App\Controllers\Dashboard\Landings;
use Lando\App\Models\Dashboard\Landings\SaveLandingModel;

class SaveLandingController {
    private $conn;
    private $model;
    private $uid;
    private $data;
    private $landingId;
    private $landingHash;

    function __construct($conn, $data, $uid) {
        $this->conn = $conn;
        $this->data = $data;
        $this->uid = $uid;
        $this->model = new SaveLandingModel($this->conn);
        $this->landingHash = uniqid();

        $this->adjustData();
    }


    // ============================================================================================== //
    // ==================================== ADJUST $DATA ARRAY ====================================== //
    // ============================================================================================== //
    private function adjustData(){
        $this->adjustDataValue('appStore_url', $this->getAppStoreUrl());
        $this->adjustDataValue('googlePlay_url', $this->getGooglePlayUrl());
        $this->adjustDataValue('page_title', $this->getTitleFirst());
        $this->adjustDataValue('page_description', $this->getSubtitle());

        // $this->adjustDataIcons('features');
        // $this->adjustDataIcons('how_it_works');

        // $this->adjustDataValue('features', []);
        // $this->adjustDataValue('steps', []);
        // $this->adjustDataValue('how_it_works', []);
        // $this->adjustDataValue('screenshots', []);
        // $this->adjustDataValue('reviews', []);
        // $this->adjustDataValue('faq', []);
    }
    private function adjustDataValue($key, $value){
        if (!isset($this->data[$key]) || empty($this->data[$key])) {
            $this->data[$key] = $value;
        }
        return;
    }
    private function adjustDataIcons($key){
        if (isset($this->data[$key][0]) && !empty($this->data[$key][0])) {
            foreach ($this->data[$key] as &$value) {
                if (!isset($value['icon'])) {
                    $value['icon'] = "widget";
                }
            }
        }
        return;
    }
    private function getAppStoreUrl(){
        if (preg_match('/https:\/\/apps\.apple\.com\//', $this->data['url'])) {
            return $this->data['url'];
        }else{
            return "";
        }
    }
    private function getGooglePlayUrl(){
        if (preg_match('/https:\/\/play\.google\.com\/store\/apps\/details\?id=/', $this->data['url'])) {
            return $this->data['url'];
        }else{
            return "";
        }
    }
    private function getTitleFirst(){
        $title_parts = preg_split('/\W+/', $this->data['title'], 2);
        return trim($title_parts[0]);
    }
    private function getSubtitle(){
        return explode(".", $this->data['subtitles'])[0];
    }
    // ============================================================================================== //
    // ==================================== ADJUST $DATA ARRAY ====================================== //
    // ============================================================================================== //


    public function getLandingHash(){
        return $this->landingHash;
    }

    public function initiateSave() {
        if (!$this->validateData()) {
            throw new Exception("Data validation failed");
        }

        $this->conn->begin_transaction();

        try {
            $this->saveLanding();
            $this->saveScreenshots();
            $this->saveReviews();
            $this->saveFeatures();
            $this->saveHowItWorks();
            $this->saveSteps();
            $this->saveFaq();

            $this->conn->commit();
            return true;
        } catch (Exception $e) {
            $this->conn->rollback();
            // Log or re-throw the exception
            return false;
        }
    }

    private function validateData() {
        // $requiredKeys = ['title', 'logo', /* other fields */];
        // foreach ($requiredKeys as $key) {
        //     if (!array_key_exists($key, $this->data)) {
        //         return false;
        //     }
        // }
        return true;
    }

    private function saveLanding() {
        $this->landingId = $this->model->saveLanding(
            $this->landingHash,
            $this->uid,
            $this->data['title'],
            $this->data['logo'],
            $this->data['url'],
            $this->data['appStore_url'],
            $this->data['googlePlay_url'],
            $this->data['description'],
            $this->data['subtitles'],
            $this->data['page_title'],
            $this->data['page_description'],
            ""
        );
        if ($this->landingId <= 0) {
            throw new Exception("Failed to save landing data");
        }
    }

    private function saveScreenshots() {
        $formattedScreenshots = array_map(function($url) {
            return ['url' => $url];
        }, $this->data['screenshots']);

        $result = $this->model->saveScreenshots(
            $this->uid,
            $this->landingId,
            $formattedScreenshots
        );
        if (!$result) {
            throw new Exception("Failed to save screenshots");
        }
    }

    private function saveReviews() {
        $result = $this->model->saveReviews(
            $this->uid,
            $this->landingId,
            $this->data['reviews']
        );
        if (!$result) {
            throw new Exception("Failed to save reviews");
        }
    }

    private function saveFeatures() {
        $result = $this->model->saveFeatures(
            $this->uid,
            $this->landingId,
            $this->data['features']
        );
        if (!$result) {
            throw new Exception("Failed to save features");
        }
    }

    private function saveHowItWorks() {
        $result = $this->model->saveHowItWorks(
            $this->uid,
            $this->landingId,
            $this->data['how_it_works']
        );
        if (!$result) {
            throw new Exception("Failed to save how it works");
        }
    }

    private function saveSteps() {
        $result = $this->model->saveSteps(
            $this->uid,
            $this->landingId,
            $this->data['steps']
        );
        if (!$result) {
            throw new Exception("Failed to save steps");
        }
    }

    private function saveFaq() {
        $result = $this->model->saveFaq(
            $this->uid,
            $this->landingId,
            $this->data['faq']
        );
        if (!$result) {
            throw new Exception("Failed to save FAQ.");
        }
    }
}
