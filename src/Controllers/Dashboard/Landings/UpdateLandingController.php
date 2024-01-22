<?php
namespace Lando\App\Controllers\Dashboard\Landings;
use Lando\App\Models\Dashboard\Landings\UpdateLandingModel;

class UpdateLandingController {
	private $conn;
	private $uid;
	private $landingHash;
	public $model;

	function __construct($conn, $uid, $landingHash){
	    $this->conn = $conn;
	    $this->uid = $uid;
	    $this->landingHash = $landingHash;
	    $this->model = new UpdateLandingModel(
	    	$this->conn, $this->uid, $this->landingHash
	    );
	}

	private function checkPost(array $postArray){
		$data = [
			'internalDomain',
			'externalDomain',
			'status',
			'appStoreUrl',
			'googlePlayUrl',
			'pageTitle',
			'pageDescription',
			'supportEmail',
			'privacyUrl',
			'termsUrl',
			'facebook',
			'instagram',
			'discord',
			'linkedin',
			'twitter'
		];

		foreach ($postArray as $key => $value) {
			if (!in_array($key, $data)) {
				// unset($postArray[$key]);
				return false;
			}
		}
		return true;
	}

	private function filterPost(array $postArray){
		foreach ($postArray as $key => $value) {
			$postArray[$key] = mysqli_real_escape_string(
				$this->conn, trim($value)
			);
		}
		return $postArray;
	}

	public function update(array $postArray){
		if ($this->checkPost($postArray)) {
			// $postArray = $this->filterPost($postArray);

			if ($this->checkDomain($postArray)) {
				return $this->model->update($postArray);
			}
		}else{
			return false;
		}
		
	}

	public function checkDomain(array $postArray){
		if (isset($postArray['internalDomain']) && !empty($postArray['internalDomain'])) {
			return $this->model->checkDomain($postArray['internalDomain']);
		}else{
			return true;
		}
	}
}
