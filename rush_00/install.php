<?php
session_start();
if ($_POST)
{
	if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'])
	{
		if (!file_exists("htdocs"))
			mkdir("htdocs");
		if (!file_exists("htdocs/private"))
			mkdir("htdocs/private");
		if (!file_exists("htdocs/private/passwd"))
			file_put_contents("htdocs/private/passwd", "");
		if (!file_exists("htdocs/items"))
			mkdir("htdocs/items");
		if (!file_exists("htdocs/items/categories"))
			file_put_contents("htdocs/items/categories", "");
		if (!file_exists("htdocs/items/products"))
			file_put_contents("htdocs/items/products", "");
		if (!file_exists("htdocs/items/orders"))
			file_put_contents("htdocs/items/orders", "");
		if (!file_exists("htdocs/items/basket"))
			file_put_contents("htdocs/items/basket", "");
		$users[] = array('login' => $_POST['login'], 'passwd' => hash('sha512', $_POST['passwd']), 'admin' => "yes");
		$categories = array('fruit', 'vegetable', 'aromate', 'flowers', 'tea', 'others'); 
		$products = array(
			array('name' => 'tomato', 'cat' => array('fruit', 'vegetable'), 'price' => 2, 'img' => 'https://www.grandfrais.com/userfiles/image/produit/big/grand-frais-tomates-de-saison.png'),
			array('name' => 'apple', 'cat' => array('fruit'), 'price' => 3, 'img' => 'https://www.grandfrais.com/userfiles/image/produit/big/grand-frais-pomme-royal-gala.png'),
			array('name' => 'apricot', 'cat' => array('fruit'), 'price' => 4, 'img' => 'https://www.grandfrais.com/userfiles/image/produit/big/gfp-20170606155720.jpg'),
			array('name' => 'basil', 'cat' => array('aromate'), 'price' => 20, 'img' => 'https://www.grandfrais.com/userfiles/image/produit/big/gfp-20180425122630.jpg'),
			array('name' => 'bean', 'cat' => array('vegetable'), 'price' => 3, 'img' => 'https://www.grandfrais.com/userfiles/image/produit/big/grand-frais-haricots-coco.png'),
			array('name' => 'carrot', 'cat' => array('vegetable'), 'price' => 2, 'img' => 'https://www.grandfrais.com/userfiles/image/produit/big/grand-frais-carotte.png'),
			array('name' => 'eggplant', 'cat' => array('vegetable'), 'price' => 3, 'img' => 'https://www.grandfrais.com/userfiles/image/produit/big/grand-frais-aubergine-noire.png'),
			array('name' => 'pepper', 'cat' => array('vegetable'), 'price' => 4, 'img' => 'https://www.grandfrais.com/userfiles/image/produit/big/grand-frais-poivron-rouge.png'),
			array('name' => 'orange', 'cat' => array('fruit'), 'price' => 4, 'img' => 'https://www.grandfrais.com/userfiles/image/produit/big/orange-navel.png'),
			array('name' => 'cep', 'cat' => array('others'), 'price' => 9, 'img' => 'https://www.grandfrais.com/userfiles/image/produit/big/grand-frais-cepe.png'),
			array('name' => 'mushroom', 'cat' => array('others'), 'price' => 7, 'img' => 'https://www.grandfrais.com/userfiles/image/produit/big/gfp-20180425124751.jpg'),
			array('name' => 'girole', 'cat' => array('others'), 'price' => 9, 'img' => 'https://www.grandfrais.com/userfiles/image/produit/big/champignon-girolle.png'),
			array('name' => 'parsley', 'cat' => array('aromate'), 'price' => 20, 'img' => 'https://www.grandfrais.com/userfiles/image/produit/big/persil-frise.png'),
			array('name' => 'artichoke', 'cat' => array('vegetables'), 'price' => 4, 'img' => 'https://www.grandfrais.com/userfiles/image/produit/big/grand-frais-artichaut.png'),
			array('name' => 'cherry', 'cat' => array('fruit'), 'price' => 6, 'img' => 'https://www.grandfrais.com/userfiles/image/produit/big/gfp-20170606155720.jpg'),
			array('name' => 'raspberry', 'cat' => array('fruit'), 'price' => 8, 'img' => 'https://www.grandfrais.com/userfiles/image/produit/big/gfp-20180425182028.jpg'),
			array('name' => 'mint', 'cat' => array('aromate'), 'price' => 20, 'img' => 'https://www.grandfrais.com/userfiles/image/produit/big/grand-frais-menthe.png'),
			array('name' => 'coriander', 'cat' => array('aromate'), 'price' => 20, 'img' => 'https://www.grandfrais.com/userfiles/image/produit/big/gfp-20140505083435.jpg'),
		);
		header('Location: index.php');
		file_put_contents("htdocs/private/passwd", serialize($users));
		file_put_contents("htdocs/items/categories", serialize($categories));
		file_put_contents("htdocs/items/products", serialize($products));
		echo ("OK\n");
		exit();
	}
	else
		echo ("ERROR\n");
}
require('menu/topbar.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../style/topbar.css">
</head>
<body>
	<form action="install.php" method="POST">
		Admin Id: <input type="text" name="login" value="" required/><br/>
		Admin Password: <input type="password" name="passwd" value="" required/><br/>
		<input type="submit" name="submit" value="OK"/>
	</form>
</body>
</html>
