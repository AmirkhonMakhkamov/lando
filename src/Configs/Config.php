<?php
namespace Lando\App\Configs;

use Dotenv\Dotenv;
use Lando\App\Configs\Session;
use Lando\App\Configs\Database;
use Lando\App\Configs\User;

class Config {
	private $session;
	private $database;
	private $user;

	public function __construct() {
		$this->initializeErrorReporting();
        $this->loadDotEnv();

		$this->session = new Session();
		$this->database = new Database();
		$this->user = new User();

		$this->setTimezone();
        $this->setConstants();
        $this->setCookies();
	}

	private function initializeErrorReporting(): void
    {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    }

    private function loadDotEnv(): void
    {
        require __DIR__ . '/../../vendor/phpdotenv/vendor/autoload.php';

        $dotenv = Dotenv::createImmutable(__DIR__ . '/../..');
        $dotenv->load();
    }

    private function setTimezone(): void
    {
        date_default_timezone_set('America/New_York');
    }

    private function setConstants(): void
    {
        define('TOKEN', $this->user->token);
        define('IP', $this->user->ip);

        define('FILE_PATH', '/'.basename(get_include_path()).'/');
        // define('FILE_PATH', '/');
    }

    private function setCookies(): void
    {
        // setcookie("dashboard_pageSlice", 2, 0, "/");
        setcookie("dashboard_pageSlice", 1, 0, "/");

        setcookie("dashboard_filePath", FILE_PATH, 0, "/");
        setcookie("dashboard_rootPath", FILE_PATH.'dashboard/', 0, "/");
    }

    public function conn() {
    	return $this->database->getConnection();
    }
}