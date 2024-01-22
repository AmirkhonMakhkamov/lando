<?php
namespace Lando\App\Controllers\Shared\Landings\Contact;
use Lando\App\Models\Shared\Landings\Contact\LandingContactModel;

class LandingContactController {
	private $conn;
	private $landingId;
	private $postArray;
	private $model;

	function __construct(
		$conn,
		int $landingId,
		array $postArray
	){
		$this->conn = $conn;
		$this->landingId = $landingId;
		$this->postArray = $postArray;
		$this->model = new LandingContactModel($this->conn, $this->landingId, $this->postArray);
	}

	private function checkPost(){
		$data = [
			'name',
			'email',
			'message'
		];

		foreach ($this->postArray as $key => $value) {
			if (!in_array($key, $data)) {
				return false;
			}
		}
		return true;
	}

	private function filterPost(){
		foreach ($this->postArray as $key => $value) {
			$this->postArray[$key] = mysqli_real_escape_string(
				$this->conn, trim($value)
			);
		}
	}

	public function send(){
		if ($this->checkPost()) {
			$this->filterPost();
			return $this->model->send();
		}else{
			return false;
		}
	}
}