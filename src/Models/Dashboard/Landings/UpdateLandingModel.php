<?php
namespace Lando\App\Models\Dashboard\Landings;

class UpdateLandingModel {
	private $conn;
	private $uid;
	private $landingHash;
	public $error;

	function __construct($conn, $uid, $landingHash){
	    $this->conn = $conn;
	    $this->uid = $uid;
	    $this->landingHash = $landingHash;
	}

	public function update(array $data) {
	    $setClause = [];
	    $types = '';
	    $values = [];
	    foreach ($data as $column => $value) {
	        $columnName = trim($column) . "_landing";
	        $setClause[] = "$columnName = ?";
	        $types .= 's';
	        $values[] = $value;
	    }
	    $setClauseStr = implode(', ', $setClause);
	    
	    $query = "
	        UPDATE landings
	        SET $setClauseStr
	        WHERE userId_landing = ?
	        AND hash_landing = ?
	    ";
	    $stmt = $this->conn->prepare($query);
	    
	    if ($stmt === false) {
	        error_log("MySQLi prepare error: " . $this->conn->error);
	        return false;
	    }
	    
	    $types .= 'is';
	    $values[] = $this->uid;
	    $values[] = $this->landingHash;
	    $stmt->bind_param($types, ...$values);
	    
	    if (!$stmt->execute()) {
	        error_log("MySQLi execute error: " . $stmt->error);
	        return false;
	    }
	    
	    return true;
	}

	public function checkDomain($domain){
		$stmt = $this->conn->prepare("
		    SELECT hash_landing
		    FROM landings
		    WHERE
		    internalDomain_landing = ?
		    AND hash_landing != ?
		");

		$stmt->bind_param("ss",
		    $domain,
		    $this->landingHash
		);

		$stmt->execute();
		$result = $stmt->get_result();
		$stmt->close();

		if ($result->num_rows > 0) {
			$this->error = "preview.landoai.com/" . $domain . " is already in use. Please select another one.";
		    return false;
		}else{
		    return true;
		}
	}
}
