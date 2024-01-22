<?php
require('vendor/autoload.php');

use Lando\App\Configs\Config;
use Lando\App\Controllers\Dashboard\AuthController;
use Lando\App\Controllers\Dashboard\DashboardController;

$config = new Config();
$conn = $config->conn();

$authController = new AuthController($conn);
$uid = $authController->getId();
$row = $authController->getUser();

$dashboardController = new DashboardController($conn, $uid);
$dashboardController->checkProgress();

include 'src/Views/Dashboard/index.php';