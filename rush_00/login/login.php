<?php
session_start();
require_once('auth.php');
if ($_POST)
{
	if (!file_exists("../htdocs"))
		mkdir("../htdocs");
	if (!file_exists("../htdocs/private"))
		mkdir("../htdocs/private");
	if (!file_exists("../htdocs/private/passwd"))
		file_put_contents("../htdocs/private/passwd", "");
	if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] == "OK")
	{
		$ret = auth($_POST['login'], $_POST['passwd']);
		if ($ret === 1)
		{
			$_SESSION['admin'] = 1;
			$_SESSION['loggued_on_user'] = $_POST['login'];
			header('Location: ../index.php');
			exit();
		}
		if ($ret === 0)
		{
			$_SESSION['loggued_on_user'] = $_POST['login'];
			header('Location: ../index.php');
			exit();
		}
		if ($ret === -1)
			$erno = '<script>alert("All fields are required");</script>';
	}
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
	<form action="login.php" method="POST">
		Identifiant: <input type="text" name="login" value=""/><br/>
		Mot de passe: <input type="password" name="passwd" value=""/><br/>
		<input type="submit" name="submit" value="OK"/>
	</form>
</body>
<?php
if (isset($erno)) 
	echo $erno;
?>
</html>
