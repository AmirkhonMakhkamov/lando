<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>
		<?= $previewData['page_title'] ?>
	</title>

	<meta
	name="description"
	content="<?= $previewData['page_description'] ?>">

	<meta
	name="author"
	content="Lando AI - landoai.com">
	
	<link
	rel="icon"
	type="image/x-icon"
	href="include/image.php?image=<?= $previewData['logo']; ?>">

	<base href="<?= $baseUrl ?>">

	<link href="assets/css/style.css" rel="stylesheet" id="style">

	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body class="bg-white dark:bg-black">
	<div class="lds-ring d-flex align-items-center justify-content-center h-100 w-100">
		<div></div><div></div><div></div><div></div>
	</div>