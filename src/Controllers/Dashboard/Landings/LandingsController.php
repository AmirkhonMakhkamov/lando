<?php
namespace Lando\App\Controllers\Dashboard\Landings;

use Lando\App\Configs\Config;
use Lando\App\Controllers\Dashboard\AuthController;
use Lando\App\Controllers\Dashboard\Landings\MyLandingsController;

class LandingsController {
	private $conn;

	function __construct(){
		$this->config = new Config();
		$this->conn = $this->config->conn();
		$this->authController = new AuthController($this->conn);
		$this->uid = $this->authController->getId();
		$this->myLandingsController = new MyLandingsController($this->conn, $this->uid);
	}

	public function run() {
        $this->result = $this->myLandingsController->getLandings();
        $this->includeLayouts();
    }
}

// draft; not complete