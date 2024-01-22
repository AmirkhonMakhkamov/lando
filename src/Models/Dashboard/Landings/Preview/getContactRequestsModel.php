<?php
namespace Lando\App\Models\Dashboard\Landings\Preview;

class getContactRequestsModel {
	public $conn;
	public $landingHash;
	public $landingId;

	function __construct($conn, string $landingHash){
	    $this->conn = $conn;
	    $this->landingHash = $landingHash;
	    $this->landingId = $this->getLandingId();
	}

	public function getLandingId() {
        $stmt = $this->conn->prepare("
            SELECT id_landing
            FROM landings
            WHERE hash_landing = ?
        ");

        $stmt->bind_param("s",
            $this->landingHash
        );

        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        if ($result->num_rows > 0) {
        	$row = $result->fetch_assoc();
        	return intval($row['id_landing']);
        }else{
        	return 0;
        }
    }

	public function getContactRequests(){
		$stmt = $this->conn->prepare("
		    SELECT *, DATE_FORMAT(date_contactRequest, '%d/%m/%y %h:%i %p') as date_contactRequestF
		    FROM contactRequests
		    WHERE landingId_contactRequest = ?
		    ORDER BY id_contactRequest DESC
		");
		$stmt->bind_param("i",
			$this->landingId
		);
		$stmt->execute();
		$result = $stmt->get_result();
		$stmt->close();

		return $result;
	}
}
