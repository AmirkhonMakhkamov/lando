<?php
require_once('vendor/autoload.php');

use Lando\App\Configs\Config;
use Lando\App\Controllers\Dashboard\AuthController;
use Lando\App\Controllers\Dashboard\Landings\Preview\PreviewController;

if (!session_id()) {
    session_start();
}

$config = new Config();
$conn = $config->conn();

$previewController = new PreviewController($conn);

if (
	isset($_SESSION['data']) && !empty($_SESSION['data'])
) {
	$previewData = $previewController->initPreviewData(
		$_SESSION['data']
	);

}else if (
	isset($_GET['internalDomain']) && !empty($_GET['internalDomain'])
) {
	$internalDomain = $previewController->filterStr(
		$_GET['internalDomain']
	);

	$landingId = $previewController->getLandingId(
		'internalDomain_landing', $internalDomain
	);

	if ($landingId <= 0) {
	    http_response_code(404);
	    die('404. Not Found');
	    exit;
	}

	$previewData = $previewController->getPreviewData($landingId);

}else if (
	isset($_GET['landingHash']) && !empty($_GET['landingHash'])
) {
	$authController = new AuthController($conn);
	$uid = $authController->getId();

	$landingHash = $previewController->filterStr(
		$_GET['landingHash']
	);

	$landingId = $previewController->getLandingId(
		'hash_landing', $landingHash
	);

	if ($previewController->checkAccess($uid, $landingId) === true) {
		$previewData = $previewController->getPreviewData($landingId);
	}
}else{
	http_response_code(400);
	die('400. Bad Request');
	exit;
}

if (empty($previewData)) {
	http_response_code(404);
	die('404. Not Found');
	exit;
}

function baseUrl(){
	$domain = $_SERVER['HTTP_HOST'];
	$documentRoot = $_SERVER['DOCUMENT_ROOT'];
	$currentPath = __DIR__;
	$relativePath = str_replace($documentRoot, '', $currentPath);
	$url = "http://{$domain}{$relativePath}/";
	return $url;
}

$baseUrl = baseUrl();

include 'include/head.php';
include 'include/header.php';
include 'include/body.php';
include 'include/footer.php';
include 'include/foot.php';
