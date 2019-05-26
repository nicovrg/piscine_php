<?PHP
	session_start();
	$products = unserialize(file_get_contents("htdocs/items/products"));	
?>
<html>
<body>
	<p class="mainbar_title">Products</p>
	<div class="mainbar">
		<div>
			<?php foreach($products as $product => $value): ?>
				<div class="sidebar">
					<p>Product:</p><?=$value["name"]?>
					<p>Price:</p><?=$value["price"]?>
					<img src = <?=$value["img"]?>>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</body>
</html>