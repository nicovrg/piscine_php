<?php
session_start();
if ($_POST)
{
	if ($_POST['submit'] == "OK" && $_POST['login'] && $_POST['newpw'] && $_POST['oldpw'])
	{
		$i = 0;
		$user["login"] = $_POST['login'];
		$top_user = unserialize(file_get_contents("../htdocs/private/passwd"));
		if ($top_user)
		{
			foreach ($top_user as $value)
			{
				if ($value['login'] == $user["login"])
				{
					if (($value['login'] == $user["login"]) && ($value['passwd'] == hash("sha512", $_POST['oldpw'])))
					{
						$top_user[$i]["passwd"] = hash("sha512", $_POST['newpw']);
						file_put_contents("../htdocs/private/passwd", serialize($top_user));
						header('Location: ../index.php');
						echo ("OK\n");
					}
				}
				$i++;
			}
		}
	}
	else
	{
		header('Location: er_login.php');
		echo ("ERROR\n");
	}
}
require('../menu/topbar.php');
require('../menu/mainbar.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../style/topbar.css">
</head>
<body>
	<form action="edit_account.php" method="POST">
		Identifiant: <input type="text" name="login" value="" required/><br/>
		Ancien Mot de passe: <input type="password" name="oldpw" value="" required/><br/>
		Nouveau Mot de passe: <input type="password" name="newpw" value="" required/><br/>
		<input type="submit" name="submit" value="OK"/>
	</form>
</body>
</html>
<?php
// require('sidebar/sidebar.php');