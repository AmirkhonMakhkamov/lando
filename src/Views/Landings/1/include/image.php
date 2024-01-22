<?php
if (isset($_GET['image']) && !empty($_GET['image'])) {
	header('Content-Type: image/jpeg');
	$image_url = $_GET['image'];
	echo file_get_contents($image_url);
}
?>