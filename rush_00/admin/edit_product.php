<?php
session_start();
if ($_POST)
{
	$check = 0;
	if ($_POST['old_name'] && $_POST['new_name'] && $_POST['old_category'] && $_POST['new_category'] && $_POST['old_price'] && $_POST['new_price'] && $_POST['old_img'] && $_POST['new_img'] && $_POST['submit'] == "OK")
	{
		$products = unserialize(file_get_contents("../htdocs/items/products"));
		if ($products)
		{
			$i = 0;
			foreach ($products as $product)
			{
				if ($products[$i]['name'] === $_POST['old_name'])
					$check = 1;
				if ($check === 0)
					$i++;
			}
		}
		if ($check === 1)
		{
			unset($products[$i]);
			$products[] = array('name' => $_POST['new_name'], 'cat' => $_POST['new_category'], 'price' => $_POST['new_price'], 'img' => $_POST['new_img']);
			file_put_contents("../htdocs/items/products", serialize($products));
		}
		else
			$erno1 = '<script>alert("All fields are required");</script>';
			header('Location: admin.php');
		}
	else
		$erno2 = '<script>alert("Product does not exist - Go to add product");</script>';
		header('Location: admin.php');
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
	<form action="edit_product.php" method="POST">
		Old Name: <input type="text" name="old_name" value="" required/><br/>
		New Name: <input type="text" name="new_name" value="" required/><br/>
		Old Category: <input type="password" name="old_category" value="" required/><br/>
		New Category: <input type="password" name="new_category" value="" required/><br/>
		Old Price: <input type="text" name="old_price" value="" required/><br/>
		New Price: <input type="text" name="new_price" value="" required/><br/>
		Old Image: <input type="password" name="old_img" value="" required/><br/>
		New Image: <input type="password" name="new_img" value="" required/><br/>
		<input type="submit" name="submit" value="OK"/>
	</form>
</body>
<?php
if (isset($erno))
	echo $erno1;
if (isset($erno)) 
	echo $erno2;
?>
</html>