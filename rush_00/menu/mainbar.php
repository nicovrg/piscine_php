<?PHP
	session_start();
	if (file_exists("htdocs/items/categories") === true)
	{
		$categories = unserialize(file_get_contents("htdocs/items/categories"));
		$products = unserialize(file_get_contents("htdocs/items/products"));
	}
	else
	{
		$categories = unserialize(file_get_contents("../htdocs/items/categories"));
		$products = unserialize(file_get_contents("../htdocs/items/products"));
	}
?>
<html>
<body>
<div class="big_div">	
	<div class="sidebar">
		<p class="sidebar_title">Categories</p>
		<div>
			<?php foreach($categories as $category => $value): ?>
			<div class="sidebar_foreach">
				<?=$value?>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
	<div class="mainbar">
		<p class="mainbar_title">Products</p>
		<div>
			<?php foreach($products as $product => $value): ?>
			<div class="flex-container">
				<?=$value["name"]?>
				<?=$value["price"]?>
				<form action="basket/add_basket.php" method="POST">
				<input type="hidden" name="name" value="$product['name']"/>
				<input type="submit" value="add to cart">
				</form>
				<img src = <?=$value["img"]?>>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
	<div class="basketbar">
		<p class="basketbar_title">Basket</p>
		<div>
			<?php foreach($products as $product => $value): ?>
			<div class="flex-container">
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
