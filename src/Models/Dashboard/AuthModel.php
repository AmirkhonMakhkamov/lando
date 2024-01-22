<?php
namespace Lando\App\Models\Dashboard;

class AuthModel {
    private $conn;

    function __construct($conn){
        $this->conn = $conn;
    }

    public function getUser(int $id){
        $stmt = $this->conn->prepare("
            SELECT *
            FROM users
            WHERE id_user = ?
        ");
        $stmt->bind_param("i",
            $id
        );
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        }else{
            return array();
        }
    }
}
?>