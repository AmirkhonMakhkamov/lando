<?php
namespace Lando\App\Configs;

class Database {
    private $conn;

    public function __construct() {
        $this->connect();
    }

    private function connect(): void
    {
        $this->conn = mysqli_connect(
            getenv('DB_SERVERNAME'),
            getenv('DB_USERNAME'),
            getenv('DB_PASSWORD'),
            getenv('DB_NAME')
        );

        if (!$this->conn) {
            die('Error in db');
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function __destruct(){
        $this->closeConnection();
    }

    public function closeConnection(): void
    {
        if ($this->conn) {
            mysqli_close($this->conn);
        }
    }
}