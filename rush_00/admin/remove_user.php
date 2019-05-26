<?php
session_start();
if ($_POST)
{
	$check = 0;
	if ($_POST['name'] && $_POST['submit'] == "OK")
	{
		$users = unserialize(file_get_contents("../htdocs/private/passwd"));
		if ($users)
		{
			$i = 0;
			foreach ($users as $user)
			{
				if ($users[$i]['login'] === $_POST['name'])
					$check = 1;
				if ($check === 0)
					$i++;
			}
		}
		if ($check === 1)
		{
			unset($users[$i]);
			file_put_contents("../htdocs/private/passwd", serialize($users));
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
	<form action="remove_user.php" method="POST">
		Name:<input type="text" name="name" value="" required/><br/>
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