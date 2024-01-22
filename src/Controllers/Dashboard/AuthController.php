<?php
namespace Lando\App\Controllers\Dashboard;
use Lando\App\Models\Dashboard\AuthModel;

class AuthController {
	private $conn;
	private $uid;
	private $model;

	function __construct($conn){
		$this->conn = $conn;
		$this->uid = $this->getId();
		$this->model = new AuthModel($this->conn);
	}

	public function getId(){
		if ($this->isSessionTokenValid() && $this->isUserIdValid()) {
			return $this->getUserId();
		}
		return $this->logOut();
	}

	public function getUser(){
		$user = $this->model->getUser($this->uid);
		if ($user) {
			return $user;
		}
		return $this->logOut();
	}

	public function logOut(){
		$_SESSION = array();
		session_destroy();

		header('location: ../');
		die;
	}

	private function isSessionTokenValid() {
		return isset($_SESSION['token']) && $_SESSION['token'] === TOKEN;
	}

	private function isUserIdValid() {
	    $decodedId = base64_decode($_SESSION['user_id']);
	    return isset($decodedId) && ctype_digit($decodedId);
	}

	private function getUserId(){
		return intval(trim(base64_decode($_SESSION['user_id'])));
	}
}
