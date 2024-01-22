<?php
namespace Lando\App\Models\Dashboard\Landings;

class MyLandingsModel {
	private $conn;
	private $uid;

	function __construct($conn, int $uid){
	    $this->conn = $conn;
	    $this->uid = $uid;
	}

	public function getLandings(){
		$stmt = $this->conn->prepare("
		    SELECT *
		    FROM landings
		    WHERE userId_landing = ?
		    ORDER BY id_landing DESC
		");
		$stmt->bind_param("i",
			$this->uid
		);
		$stmt->execute();
		$result = $stmt->get_result();

		return $result;
	}
}