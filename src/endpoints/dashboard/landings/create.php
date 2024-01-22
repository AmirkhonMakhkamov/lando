<?php
header('Content-Type: application/json');

require('vendor/autoload.php');

use Lando\App\Configs\Config;
use Lando\App\Controllers\Dashboard\Landings\NewLandingController;

$config = new Config();

function jsonResponse($success, $data = null, $error = null) {
    echo json_encode(compact('success', 'data', 'error'));
    exit;
}

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    // http_response_code(405);
    jsonResponse(false, null, 'Method Not Allowed');
}

if (!isset($_POST['app_url']) || empty($_POST['app_url'])) {
    // http_response_code(400);
    jsonResponse(false, null, 'Bad Request: app_url is required');
}

$url = trim($_POST['app_url']);

if (filter_var($url, FILTER_VALIDATE_URL)) {
    try {
        $generate = new NewLandingController($url);

        $data = $generate->main();

        if (!empty($data)) {
            $_SESSION['data'] = $data;
            jsonResponse(true, $data);
        }else{
            jsonResponse(false, null, 'The provided URL is either invalid or not from the Apple App Store or Google Play.<br/>Please ensure you are using a valid link from one of these platforms.');
        }
        
    } catch (Exception $e) {
        // http_response_code(500);
        jsonResponse(false, null, $e->getMessage());
    }
} else {
    // http_response_code(400);
    jsonResponse(false, null, 'The provided URL is either invalid or not from the Apple App Store or Google Play.<br/>Please ensure you are using a valid link from one of these platforms.');
}