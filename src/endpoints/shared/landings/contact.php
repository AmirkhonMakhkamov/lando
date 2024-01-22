<?php
header('Content-Type: application/json');

require('vendor/autoload.php');

use Lando\App\Configs\Config;
use Lando\App\Controllers\Shared\Landings\Contact\LandingContactController;

// if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off') {
//     echo json_encode(
//         [
//             'success' => false,
//             'error' => 'Bad Request'
//         ]
//     );
//     exit;
// }

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    echo json_encode(
        [
            'success' => false,
            'error' => 'Method Not Allowed'
        ]
    );
    exit;
}

if (!isset($_POST['lid']) || empty($_POST['lid'])) {
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

$landingId = intval($_POST['lid']);

unset($_POST['lid']);

if (empty($landingId) || $landingId < 1) {
    echo json_encode(
        [
            'success' => false,
            'error' => 'Bad Request'
        ]
    );
    exit;
}

$landingContactController = new LandingContactController(
    $conn, $landingId, $_POST
);

if ($landingContactController->send()) {
    echo json_encode(
        [
            'success' => true,
            'data' => 'Contact request sent.'
        ]
    );
    exit;

} else {
    echo json_encode(
        [
            'success' => false,
            'error' => 'Failed send contact request.'
        ]
    );
    exit;
}
