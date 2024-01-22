<?php
namespace Lando\App\Controllers\Dashboard\Landings;
use Lando\App\Models\Dashboard\Landings\MyLandingsModel;

class MyLandingsController {
	private $conn;
	private $uid;
	private $model;

	function __construct($conn, $uid){
	    $this->conn = $conn;
	    $this->uid = $uid;
	    $this->model = new MyLandingsModel($conn, $uid);
	}

	public function getLandings(){
		return $this->model->getLandings();
	}
}
