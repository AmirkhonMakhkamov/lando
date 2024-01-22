<?php
namespace Lando\App\Controllers\Dashboard;
use Lando\App\Controllers\Dashboard\Landings\SaveLandingController;

class DashboardController {
	private $conn;
	private $uid;

	function __construct($conn, int $uid){
		$this->conn = $conn;
		$this->uid = $uid;
	}

	public function checkProgress(){
		if (isset($_SESSION['data']) && !empty($_SESSION['data'])) {
			$data = $_SESSION['data'];

			$_SESSION['data'] = array();
			unset($_SESSION['data']);

			$saveLanding = new SaveLandingController($this->conn, $data, $this->uid);

			if ($saveLanding->initiateSave() === true) {
				$newLandingHash = $saveLanding->getLandingHash();
				header('location: '.FILE_PATH.'dashboard/landings/preview/'.$newLandingHash);
				exit;
			}
		}
	}
}
?>