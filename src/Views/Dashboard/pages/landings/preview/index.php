<?php
require_once('vendor/autoload.php');

use Lando\App\Configs\Config;
use Lando\App\Controllers\Dashboard\AuthController;
use Lando\App\Controllers\Dashboard\Landings\Preview\PreviewController;

use Lando\App\Controllers\Dashboard\Landings\Preview\getContactRequestsController;

if($_SERVER["REQUEST_METHOD"] != "POST"){
	http_response_code(400);
	die('400. Bad Request');
	exit;
}

if (!isset($_POST['id']) || empty($_POST['id'])) {
	http_response_code(400);
	die('400. Bad Request');
	exit;
}

$config = new Config();
$conn = $config->conn();

$authController = new AuthController($conn);
$uid = $authController->getId();
$row = $authController->getUser();

if (!$uid) {
    http_response_code(401);
    die('401. Unauthorized');
    exit;
}

$previewController = new PreviewController($conn);

$landingHash = $previewController->filterStr(
	$_POST['id']
);

$landingId = $previewController->getLandingId(
	'hash_landing', $landingHash
);

if ($previewController->checkAccess($uid, $landingId) === true) {
	$previewData = $previewController->getPreviewData($landingId);
	$previewDetails = $previewController->getPreviewDetails($landingId);
}

if (empty($previewData)) {
	// http_response_code(404);
	die('<center class="mt-4">404. Not found');
	exit;
}

$contactRequests = new getContactRequestsController($conn, $landingHash);
$contactRequestsData = $contactRequests->getContactRequests();

include 'layouts/header.php';
include 'layouts/body.php';
include 'layouts/settings.php';
include 'layouts/contactRequests.php';
include 'layouts/publish.php';
