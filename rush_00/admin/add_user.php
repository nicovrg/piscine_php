<?php
session_start();
if ($_POST)
{
	if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] == "OK")
	{
		$users = unserialize(file_get_contents("../htdocs/private/passwd"));
		if ($users && $_POST['admin'] === "yes")
		{
			$_SESSION['admin'] = 1;
			$users[] = array('login' => $_POST['login'], 'passwd' => hash('sha512', $_POST['passwd']), 'admin' => "yes");
			file_put_contents("../htdocs/private/passwd", serialize($users));
			$confirm = '<script>alert("User added");</script>';
			header('Location: admin.php');
		}
		else if ($users && $_POST['admin'] === "no")
		{
			$users[] = array('login' => $_POST['login'], 'passwd' => hash('sha512', $_POST['passwd']), 'admin' => "no");
			file_put_contents("../htdocs/private/passwd", serialize($users));
			$confirm = '<script>alert("User added");</script>';
			header('Location: admin.php');
		}
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
	<form action="add_user.php" method="POST">
		Username: <input type="text" name="login" value="" required/><br/>
		Password: <input type="password" name="passwd" value="" required/><br/>
		Admin: <input type="admin" name="admin" value="" required/><br/>
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