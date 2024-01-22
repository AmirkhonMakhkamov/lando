<?php
header('Content-Type: application/json');

require('vendor/autoload.php');

use Lando\App\Configs\Config;
use Lando\App\Controllers\Dashboard\AuthController;
use Lando\App\Controllers\Dashboard\Landings\UpdateLandingController;

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    // http_response_code(405);
    echo json_encode(
        [
            'success' => false,
            'error' => 'Method Not Allowed'
        ]
    );
    exit;
}

if (!isset($_POST['landingHash']) || empty($_POST['landingHash'])) {
    // http_response_code(400);
    echo json_encode(
        [
            'success' => false,
            'error' => 'Bad Request: landingHash is required'
        ]
    );
    exit;
}

$config = new Config();
$conn = $config->conn();

$authController = new AuthController($conn);
$uid = $authController->getId();

if (!$uid) {
    // http_response_code(401);
    echo json_encode(
        [
            'success' => false,
            'error' => 'Unauthorized'
        ]
    );
    exit;
}

$landingHash = mysqli_real_escape_string(
    $conn, trim($_POST['landingHash'])
);

unset($_POST['landingHash']);

if (empty($landingHash)) {
    // http_response_code(400);
    echo json_encode(
        [
            'success' => false,
            'error' => 'Bad Request'
        ]
    );
    exit;
}

$updateLandingController = new UpdateLandingController(
    $conn, $uid, $landingHash
);

if ($updateLandingController->update($_POST)) {
    // http_response_code(200);
    echo json_encode(
        [
            'success' => true,
            'data' => 'Landing page updated successfully.'
        ]
    );
    exit;

} else {
    // http_response_code(500);
    echo json_encode(
        [
            'success' => false,
            'error' => !empty($updateLandingController->model->error) ? $updateLandingController->model->error : 'Failed to update landing page. Please try again.'
        ]
    );
    exit;
}

