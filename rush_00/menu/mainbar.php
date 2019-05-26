<?PHP
	session_start();
	$categories = unserialize(file_get_contents("htdocs/items/categories"));
	$products = unserialize(file_get_contents("htdocs/items/products"));
?>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style/topbar.css">
	<link rel="stylesheet" type="text/css" href="style/sidebar.css">
	<link rel="stylesheet" type="text/css" href="style/mainbar.css">
</head>
<html>
<body>
<div class="big_div">	

	<p class="sidebar_title">Categories</p>
	<div class="main_sidebar">
		<div>
			<?php foreach($categories as $category => $value): ?>
			<div class="sidebar">
				<?=$value?>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
	<p class="mainbar_title">Products</p>
	<div class="mainbar">
		<div>
			<?php foreach($products as $product => $value): ?>
			<div class="sidebar">
				<?=$value["name"]?>
				<?=$value["price"]?>
				<img src = <?=$value["img"]?>>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
</body>
</html>
