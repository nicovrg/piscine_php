<?php
session_start();
if ($_POST)
{
	if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'])
	{
		$user["login"] = $_POST['login'];
		$user["passwd"] = hash("sha512", $_POST['passwd']);
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
		$users[] = array('login' => $_POST['login'], 'passwd' => hash('sha256', $_POST['passwd']), 'admin' => true);
		$categories = array('fruit', 'vegetable', 'aromate', 'others'); 
		$products = array(
			array('name' => 'tomate', 'cat' => array('fruit', 'vegetable'), 'price' => 2, 'img' => 'url/imgur'),
			array('name' => 'pomme', 'cat' => array('fruit'), 'price' => 3, 'img' => 'url/imgur'),
			array('name' => 'abricot', 'cat' => array('fruit'), 'price' => 4, 'img' => 'https://www.grandfrais.com/userfiles/image/produit/big/gfp-20170606155720.jpg'),
			array('name' => 'romarin', 'cat' => array('aromate'), 'price' => 1, 'img' => 'url/imgur'),
			array('name' => 'haricot', 'cat' => array('vegetable'), 'price' => 3, 'img' => 'url/imgur'),
			array('name' => 'orange', 'cat' => array('fruit'), 'price' => 2, 'img' => 'url/imgur'),
			array('name' => 'champignon', 'cat' => array('others'), 'price' => 5, 'img' => 'url/imgur'),
			array('name' => 'truffe', 'cat' => array('others'), 'price' => 55, 'img' => 'url/imgur'),
			array('name' => 'artichaud', 'cat' => array('others'), 'price' => 1, 'img' => 'url/imgur'),
			array('name' => 'cerise', 'cat' => array('fruit'), 'price' => 10, 'img' => 'https://www.grandfrais.com/userfiles/image/produit/big/gfp-20170606155720.jpg'),
			array('name' => 'framboise', 'cat' => array('fruit'), 'price' => 1, 'img' => 'url/imgur'),
			array('name' => 'thin', 'cat' => array('aromate'), 'price' => 3, 'img' => 'url/imgur'),
			array('name' => 'thieul', 'cat' => array('aromate'), 'price' => 2, 'img' => 'url/imgur')
		);
		header('Location: index.php');
		file_put_contents("htdocs/private/passwd", serialize($users));
		file_put_contents("htdocs/category", serialize($categories));
		file_put_contents("htdocs/product", serialize($products));
		echo ("OK\n");
	}
	else
		echo ("ERROR\n");
}
require('menu/topbar.php');
// require('menu/sidebar.php');
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
