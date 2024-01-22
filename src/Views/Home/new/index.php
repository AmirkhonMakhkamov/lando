<?php
require('vendor/autoload.php');

use Lando\App\Controllers\Dashboard\Landings\Preview\PreviewController;

$previewController = new PreviewController($conn);

if (isset($_SESSION['data']) && !empty($_SESSION['data'])) {
	$previewData = $previewController->initPreviewData(
		$_SESSION['data']
	);
	$previewDetails = $previewController->initPreviewDetails(
		$_SESSION['data']
	);
	
}else{
	http_response_code(400);
	die('400. Bad Request');
}

include 'layouts/head.php';
include 'layouts/header.php';
include 'layouts/body.php';
include 'layouts/settings.php';
include 'src/Views/Home/layouts/login.php';
include 'layouts/foot.php';
?>