<?php
namespace Lando\App\Models\Dashboard\Landings\Preview;

class PreviewModel {
    private $conn;

    function __construct($conn) {
        $this->conn = $conn;
    }

    public function getLandingId(
    	string $param,
    	string $value
    ): int {
        $stmt = $this->conn->prepare("
            SELECT id_landing
            FROM landings
            WHERE $param = ?
        ");

        $stmt->bind_param("s",
            $value
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

    public function checkAccess(
    	int $uid,
    	int $landingId
    ): bool {
    	$stmt = $this->conn->prepare("
    	    SELECT id_landing
    	    FROM landings
    	    WHERE id_landing = ?
    	    AND userId_landing = ?
    	");

    	$stmt->bind_param("ii",
    		$landingId,
    		$uid
    	);

    	$stmt->execute();
    	$result = $stmt->get_result();
    	$stmt->close();

    	if ($result->num_rows > 0) {
    	    return true;
    	}else{
    	    return false;
    	}
    }
}
