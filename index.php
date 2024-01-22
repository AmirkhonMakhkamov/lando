<?php
require('vendor/autoload.php');

use Lando\App\Configs\Config;
use Lando\App\Controllers\Home\HomeController;

$config = new Config();
$conn = $config->conn();

echo get_include_path();

$homeController = new HomeController($conn);
$request = $homeController->get_request();

$googleAuthLink = $homeController->googleAuth->get_link();
// $appleAuth = new AppleAuth($conn);

switch ($request) {
    case "dashboard":
        header('location: dashboard');
        exit;
        break;

    case "~new/preview/":
        include 'src/Views/Home/new/index.php';
        break;

    default:
        include 'src/Views/Home/index.php';
        break;
}