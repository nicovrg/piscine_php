<?php
session_start();
if ($_POST)
{
	if (isset($_POST['category']) && isset($_POST['submit']) == "OK")
	{
		$categories = unserialize(file_get_contents("../htdocs/items/categories"));
		if ($categories)
		{
			$categories[] = $_POST['category'];
			file_put_contents("../htdocs/items/categories", serialize($categories));
		}
		$confirm = '<script>alert("Category added");</script>';
		header('Location: admin.php');
	}
	else
		$erno = '<script>alert("All fields are required");</script>';
		header('Location: admin.php');
}
require('../menu/topbar.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../style/topbar.css">
	<link rel="stylesheet" type="text/css" href="../style/admin.css">
</head>
<body>
	<form action="add_category.php" method="POST">
		Add Category: <input type="text" name="category" value="" required/><br/>
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