<?php
require_once('vendor/autoload.php');

use Lando\App\Configs\Config;
use Lando\App\Controllers\Dashboard\AuthController;
use Lando\App\Controllers\Dashboard\Landings\MyLandingsController;

$config = new Config();
$conn = $config->conn();

$authController = new AuthController($conn);
$uid = $authController->getId();
// $row = $authController->getUser();

$myLandingsController = new MyLandingsController($conn, $uid);
$myLandingsData = $myLandingsController->getLandings();

include 'layouts/header.php';
include 'layouts/body.php';