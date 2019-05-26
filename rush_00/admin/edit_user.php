<?php
session_start();
if ($_POST)
{
	// print $_POST['old_login'];
	// print $_POST['old_login'];
	// print $_POST['new_passwd'];
	// print $_POST['new_passwd'];
	// print $_POST['admin'];
	if ($_POST['old_login'] && $_POST['old_passwd'] && $_POST['new_login'] && $_POST['new_passwd'] && $_POST['admin'] && $_POST['submit'] == "OK")
	{
	//check if login is in array
		$users = unserialize(file_get_contents("../htdocs/private/passwd"));
		if ($users && $_POST['admin'] === "yes")
		{
			unset($users['old_login']);
			unset($users['old_passwd']);
			unset($users['admin']);
			$users[] = array('login' => $_POST['new_login'], 'passwd' => hash('sha512', $_POST['old_passwd']), 'admin' => "yes");
			file_put_contents("../htdocs/private/passwd", serialize($users));
		}
		else if ($users && $_POST['admin'] === "no")
		{
			unset($users['old_login']);
			unset($users['old_passwd']);
			unset($users['admin']);
			$users[] = array('login' => $_POST['new_login'], 'passwd' => hash('sha512', $_POST['old_passwd']), 'admin' => "no");
			file_put_contents("../htdocs/private/passwd", serialize($users));
		}
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
	<form action="edit_user.php" method="POST">
		Old Username: <input type="text" name="old_login" value="" required/><br/>
		New Username: <input type="text" name="new_login" value="" required/><br/>
		Old Password: <input type="password" name="old_passwd" value="" required/><br/>
		New Password: <input type="password" name="new_passwd" value="" required/><br/>
		Admin: <input type="admin" name="admin" value="" required/><br/>
		<input type="submit" name="submit" value="OK"/>
	</form>
</body>
</html>
<?php
// require('sidebar/sidebar.php');