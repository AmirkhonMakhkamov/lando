<?php
session_start();

header('Content-Type: application/json');

// if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off') {
//     exit(json_encode(['success' => false, 'error' => 'Insecure connection']));
// }

if (!isset($_SESSION['data']) || empty($_SESSION['data'])) {
    exit(json_encode(['success' => false, 'error' => 'Bad Request']));
}

unset($_SESSION['data']['visited']);

echo json_encode(['success' => true]);
?>