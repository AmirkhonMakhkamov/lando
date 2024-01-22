<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// include('../../vendor/simplehtmldom/simple_html_dom.php');


// $_GET['landingHash'] = "652d7d8e8bb71";
// ob_start();

// set_include_path(get_include_path() . PATH_SEPARATOR . "/lando3/src/Views/Landings/1/");

// include 'index.php';
// $html_string = ob_get_contents();
// ob_end_clean();

// $html = str_get_html($html_string);

// $source_code = $html->save();
// $html->save('result.html');

// echo $html_string;

// Cleanup (optional, but recommended for freeing up memory)
// $html->clear();
// unset($html);





// $file_path = 'https://landoai.com/pimsleur';

// // Load the local HTML file
// $html = file_get_html($file_path);

// // If you want to get the entire HTML source of the file
// $source_code = $html->save();

// $html->save('htmldomresult.html');

// // Output the source code
// echo $source_code;










// $url = "../../src/Views/Landings/1/index.php";
// $html_content = file_get_contents($url);

// // Save the HTML content to a file
// file_put_contents("result.html", $html_content);





// $url = "http://localhost/lando3/src/Views/Landings/1/index.php?landingHash=652d7d8e8bb71";

// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// $html_content = curl_exec($ch);
// curl_close($ch);

// // Save the HTML content to a file
// file_put_contents("result.html", $html_content);




$_GET['landingHash'] = "652d7d8e8bb71";
ob_start();
include("../../src/Views/Landings/1/index.php");
$html_content = ob_get_clean();

// Save the HTML content to a file
file_put_contents("result.html", $html_content);











?>