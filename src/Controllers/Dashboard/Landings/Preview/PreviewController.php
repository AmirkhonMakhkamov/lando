<?php
namespace Lando\App\Controllers\Dashboard\Landings\Preview;
use Lando\App\Models\Dashboard\Landings\Preview\PreviewModel;
use Lando\App\Models\Dashboard\Landings\Preview\PreviewDataModel;
use Lando\App\Controllers\Dashboard\Landings\Preview\PreviewDataController;

class PreviewController {
	private $conn;
	private $previewModel;

	function __construct($conn){
	    $this->conn = $conn;
	    $this->previewModel = new PreviewModel($this->conn);
	}

	private function previewData($landingId){
		$previewData = new PreviewDataModel(
			$this->conn, $landingId
		);
		return $previewData->getPreviewData();
	}

	public function getLandingId($param, $value){
		return $this->previewModel->getLandingId($param, $value);
	}

	public function getPreviewData($landingId){
		$data = $this->previewData($landingId);
		return $this->initPreviewData($data);
	}

	public function getPreviewDetails($landingId){
		$data = $this->previewData($landingId);
		return $this->initPreviewDetails($data);
	}

	public function initPreviewData($data){
		$initPreviewData = new PreviewDataController($data);
		return $initPreviewData->getPreviewData();
	}

	public function initPreviewDetails($data){
		$initPreviewDetails = new PreviewDetailsController($data);
		return $initPreviewDetails->getPreviewDetails();
	}

	public function checkAccess($uid, $landingId){
		return $this->previewModel->checkAccess($uid, $landingId);
	}

	public function filterStr($str){
		$str = mysqli_real_escape_string(
			$this->conn, trim($str)
		);

		if (empty($str)) {
			http_response_code(400);
			die('400. Bad Request');
			exit;
		}

		return $str;
	}
}