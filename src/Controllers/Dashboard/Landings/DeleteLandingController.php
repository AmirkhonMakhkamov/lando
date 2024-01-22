<?php
namespace Lando\App\Controllers\Dashboard\Landings;
use Lando\App\Models\Dashboard\Landings\DeleteLandingModel;

class DeleteLandingController {
	private $conn;
	private $uid;
	private $landingId;
	private $model;

	function __construct($conn, $uid, $landingId){
	    $this->conn = $conn;
	    $this->uid = $uid;
	    $this->landingId = $landingId;
	    $this->model = new DeleteLandingModel(
	    	$this->conn, $this->uid, $this->landingId
	    );
	}

	public function delete(){
		$this->conn->begin_transaction();

		try {
            $this->model->deleteLanding();
            $this->model->deleteScreenshots();
            $this->model->deleteReviews();
            $this->model->deleteFeatures();
            $this->model->deleteHiw();
            $this->model->deleteSteps();
            $this->model->deleteFaq();
            
            $this->conn->commit();

            return true;

        } catch (Exception $e) {
            $this->conn->rollback();
            return false;
        }
	}
}
