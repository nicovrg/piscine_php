<?php
session_start();
if ($_POST)
{
	$check = 0;
	if ($_POST['old_name'] && $_POST['new_name'] && $_POST['old_category'] && $_POST['new_category'] && $_POST['old_price'] && $_POST['new_price'] && $_POST['old_img'] && $_POST['new_img'] && $_POST['submit'] == "OK")
	{
		$products = unserialize(file_get_contents("../htdocs/private/passwd"));
		if ($products)
		{
			foreach ($products as $product)
			{
				if ($product['new_name'] == $_POST['old_name'])
					$check = 1;
			}
		}
		if ($check == 1)
		{
				unset($products['old_name']);
				unset($products['new_name']);
				unset($products['old_category']);
				unset($products['new_category']);
				unset($products['old_price']);
				unset($products['new_price']);
				unset($products['old_img']);
				unset($products['new_img']);
				$products[] = array('name' => $_POST['new_name'], 'cat' => $_POST['new_category'], 'price' => $_POST['new_price'], 'img' => $_POST['new_img'] );
				file_put_contents("../htdocs/private/passwd", serialize($products));
		}
		else
			$erno1 = '<script>alert("All fields are required");</script>';
		}
	else
		$erno2 = '<script>alert("Product does not exist - Go to add product");</script>';
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