<?php
session_start();
if ($_POST)
{
	if ($_POST['name'] && $_POST['category'] && $_POST['price'] && $_POST['image'] && $_POST['submit'] == "OK")
	{
		$products = unserialize(file_get_contents("../htdocs/items/products"));		
		if ($products)
		{
			$products[] = array('name' => $_POST['name'], 'cat' => $_POST['category'], 'price' => $_POST['price'], 'img' => $_POST['image']);
			file_put_contents("../htdocs/items/products", serialize($products));
		}
		$confirm = '<script>alert("Product added");</script>';
	}
	else
		$erno = '<script>alert("All fields are required");</script>';
}
require('../menu/topbar.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../style/topbar.css">
</head>
<body>
	<p>Add Product:</p>
	<form action="add_product.php" method="POST">
		Name: <input type="text" name="name" value="" required/><br/>
		Category: <input type="text" name="category" value="" required/><br/>
		Price: <input type="text" name="price" value="" required/><br/>
		Image: <input type="text" name="image" value="" required/><br/>
		<input type="submit" name="submit" value="OK"/>
	</form>
</body>
<?php
if (isset($confirm)) 
	echo $confirm;
else if (isset($erno)) 
	echo $erno;
?>
</html>
<?php
// require('sidebar/sidebar.php');