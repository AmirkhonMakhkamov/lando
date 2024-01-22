<?php
namespace Lando\App\Models\Shared\Landings\Contact;

class LandingContactModel {
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
	}

	private function insert() {
	    $stmt = $this->conn->prepare("
	        INSERT INTO contactRequests
	        (
	        	landingId_contactRequest,
	        	name_contactRequest,
	        	email_contactRequest,
	        	message_contactRequest
	        )
	        VALUES
	        (?,?,?,?)
	    ");

	    $stmt->bind_param("isss",
	    	$this->landingId,
	    	$this->postArray['name'],
	    	$this->postArray['email'],
	    	$this->postArray['message']
	    );

	    $stmt->execute();
	    
	    if ($stmt->affected_rows > 0) {
	    	return true;
	    }
	    return false;
	}

	public function send(){
		$stmt = $this->conn->prepare("
		    SELECT id_landing
		    FROM landings
		    WHERE
		    id_landing = ?
		");

		$stmt->bind_param("i",
		    $this->landingId
		);

		$stmt->execute();
		$result = $stmt->get_result();
		$stmt->close();

		if ($result->num_rows > 0) {
		    return $this->insert();
		}else{
		    return false;
		}
	}
}
