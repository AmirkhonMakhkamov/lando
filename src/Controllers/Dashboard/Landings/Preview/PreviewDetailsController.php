<?php
namespace Lando\App\Controllers\Dashboard\Landings\Preview;

class PreviewDetailsController {
    private $data;

    function __construct($data){
        $this->data = $data;
    }

    private function getLogo(){
        return $this->data['logo'];
    }

    private function getTitle(){
        $title_parts = preg_split(
            '/\W+/',
            $this->data['title'],
            2
        );

        return trim($title_parts[0]);
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

    private function getSubtitle(){
        return explode(".", $this->data['subtitles'])[0];
    }

    private function getPageTitle() {
        if (isset($this->data['page_title']) && !empty($this->data['page_title'])) {
            return $this->data['page_title'];
        }else{
            return $this->getTitle();
        }
    }

    private function getPageDescription() {
        if (isset($this->data['page_description']) && !empty($this->data['page_description'])) {
            return $this->data['page_description'];
        }else{
            return $this->getSubtitle();
        }
    }

    private function getInternalDomain() {
        if (isset($this->data['internalDomain']) && !empty($this->data['internalDomain'])) {
            return strtolower($this->data['internalDomain']);
        }else{
            return "";
        }
    }

    private function getExternalDomain() {
        if (isset($this->data['externalDomain']) && !empty($this->data['externalDomain'])) {
            return strtolower($this->data['externalDomain']);
        }else{
            return "";
        }
    }

    private function getPublishStatus(){
        return !empty($this->getInternalDomain()) ? "preview" : "publish";
    }

    private function getDomainStatus() {
        return empty($this->getExternalDomain()) ? 'internal' : "external";
    }

    public function getPreviewDetails(){
        return [
            "googlePlay_url" => $this->getGooglePlayUrl(),
            "appStore_url" => $this->getAppStoreUrl(),
            "logo" => $this->getLogo(),
            "title" => $this->getTitle(),
            "page_title" => $this->getPageTitle(),
            "page_description" => $this->getPageDescription(),
            "internalDomain" => $this->getInternalDomain(),
            "publishStatus" => $this->getPublishStatus(),
            "domainStatus" => $this->getDomainStatus()
        ];
    }
}
