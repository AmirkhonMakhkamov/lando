<?php
namespace Lando\App\Controllers\Dashboard\Landings\Preview;
use Lando\App\Models\Dashboard\Landings\Preview\getContactRequestsModel;

class getContactRequestsController {
	private $conn;
	public $landingHash;
	public $model;

	function __construct($conn, $landingHash){
	    $this->conn = $conn;
	    $this->landingHash = $landingHash;
	    $this->model = new getContactRequestsModel($conn, $landingHash);
	}

	public function getContactRequests(){
		return $this->model->getContactRequests();
	}
}