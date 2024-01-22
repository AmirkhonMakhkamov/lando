<?php
namespace Lando\App\Controllers\Home;
use Lando\App\Controllers\Home\GoogleAuth;
// use Lando\App\Controllers\Home\AppleAuth;

class HomeController {
	private $conn;
	public $googleAuth;
	// public $appleAuth;
	
	function __construct($conn){
		$this->conn = $conn;
		$this->googleAuth = new GoogleAuth($conn);
		// $this->appleAuth = new AppleAuth($conn);
	}

	public function get_request(){
		if (isset($_GET['code']) && !empty($_GET['code'])) {
			return $this->googleAuth->auth_user();
		}else{
			if (isset($_SESSION['token']) && !empty($_SESSION['token'])) {
				if ($_SESSION['token'] === TOKEN) {
					return "dashboard";
				}else{
					return;
				}
			} elseif (isset($_SESSION['data']) && !empty($_SESSION['data'])) {
				if (!isset($_SESSION['data']['visited']) || empty($_SESSION['data']['visited'])) {
					return "~new/preview/";
				}else{
					return;
				}
				
			}
		}
	}

	public function getLandingProgress(){
		if (isset($_SESSION['data']) && !empty($_SESSION['data'])) {
			if (isset($_SESSION['data']['visited']) && $_SESSION['data']['visited'] == true) {
				return true;
			}else{
				return false;
			}
		}
	}

	public function showInProgressLanding(){
		if ($this->getLandingProgress()) {
			$data = $_SESSION['data'];
			echo '
				<div class="position-fixed bottom-0 end-0 px-3 py-4">
					<button type="button" class="btn bg-violet d-flex align-items-center justify-content-center px-4" onclick="markAsNotVisited($(this));">
						<img src="'.$data["logo"].'" class="d-block rounded-3" width="30">
						<p class="ms-2 fw-500">'.$data["title"].'</p>
					</button>
				</div>
			';
		}
	}
}
