<?php
session_start();

header('Content-Type: application/json');

// if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off') {
//     exit(json_encode(['success' => false, 'error' => 'Insecure connection']));
// }

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    exit(json_encode(['success' => false, 'error' => 'Method Not Allowed']));
}

if (!isset($_SESSION['data']) || empty($_SESSION['data'])) {
    exit(json_encode(['success' => false, 'error' => 'Bad Request']));
}

$data = $_SESSION['data'];

$appStore_url = filter_var($_POST['appStore_url'], FILTER_SANITIZE_URL);
$googlePlay_url = filter_var($_POST['googlePlay_url'], FILTER_SANITIZE_URL);
$page_title = filter_var($_POST['page_title'], FILTER_SANITIZE_STRING);
$page_description = filter_var($_POST['page_description'], FILTER_SANITIZE_STRING);

$data['appStore_url'] = $appStore_url;
$data['googlePlay_url'] = $googlePlay_url;
$data['page_title'] = $page_title;
$data['page_description'] = $page_description;

$_SESSION['data'] = $data;

echo json_encode(['success' => true]);
?>