<?php

$content = file_get_contents('../src/Views/Landings/1/index.php?previewId='.$landingHash);
echo $content;

// Initialize cURL session
$ch = curl_init();

// The URL of the PHP page you want to get the content from
$previewId = 'someValue'; // replace with the actual value you want to pass
$url = 'https://landoai.com/src/Views/Landings/1/index.php?previewId=' . urlencode($landingHash);

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // Return the transfer as a string
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Follow redirects

// Execute cURL session and get the content
$content = curl_exec($ch);

// Check if any error occurs during the cURL session
if (curl_errno($ch)) {
    echo 'cURL Error: ' . curl_error($ch);
} else {
    // Output the content
    echo $content;
}

// Close cURL session
curl_close($ch);
?>