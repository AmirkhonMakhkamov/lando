<?php
header('Content-Type: application/json');

require('vendor/autoload.php');

use Lando\App\Configs\Config;
use Lando\App\Controllers\Dashboard\AuthController;
use Lando\App\Controllers\Dashboard\Landings\DeleteLandingController;

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    http_response_code(405);
    echo json_encode(
        [
            'success' => false,
            'error' => 'Method Not Allowed'
        ]
    );
    exit;
}

if (!isset($_POST['landingId']) || empty($_POST['landingId'])) {
    http_response_code(400);
    echo json_encode(
        [
            'success' => false,
            'error' => 'Bad Request: landingId is required'
        ]
    );
    exit;
}

$config = new Config();
$conn = $config->conn();

$authController = new AuthController($conn);
$uid = $authController->getId();

if (!$uid) {
    http_response_code(401);
    echo json_encode(
        [
            'success' => false,
            'error' => 'Unauthorized'
        ]
    );
    exit;
}

$landingId = mysqli_real_escape_string(
    $conn, intval(
        trim(
            $_POST['landingId']
        )
    )
);

if (empty($landingId) || $landingId < 1) {
    http_response_code(400);
    echo json_encode(
        [
            'success' => false,
            'error' => 'Bad Request'
        ]
    );
    exit;
}

$deleteLandingController = new DeleteLandingController(
    $conn, $uid, $landingId
);

if ($deleteLandingController->delete()) {
    http_response_code(200);
    echo json_encode(
        [
            'success' => true,
            'data' => 'Landing page deleted successfully.'
        ]
    );
    exit;

} else {
    http_response_code(500);
    echo json_encode(
        [
            'success' => false,
            'error' => 'Failed to delete landing page. Please try again.'
        ]
    );
    exit;
}
