<?php
session_start();
if ($_POST)
{
	$check = 0;
	if ($_POST['old_category'] && $_POST['new_category'] && $_POST['submit'] == "OK")
	{
		$categories = unserialize(file_get_contents("../htdocs/items/categories"));
		if ($categories)
		{
			$i = 0;
			foreach ($categories as $category)
			{
				print $categories[$i]; 
				if ($categories[$i] === $_POST['old_category'])
					$check = 1;
				if ($check === 0)
					$i++;
			}
		}
		if ($check === 1)
		{
			unset($categories[$i]);
			$categories[$i] = $_POST['new_category'];			
			file_put_contents("../htdocs/items/categories", serialize($categories));
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
	<form action="edit_category.php" method="POST">
		Old Category: <input type="text" name="old_category" value="" required/><br/>
		New Category: <input type="text" name="new_category" value="" required/><br/>
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