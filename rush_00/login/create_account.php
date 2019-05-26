<?PHP
session_start();
if ($_POST)
{
	if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'])
	{
		$user["login"] = $_POST['login'];
		$user["passwd"] = hash("sha512", $_POST['passwd']);
		if (!file_exists("../htdocs"))
			mkdir("../htdocs");
		if (!file_exists("../htdocs/private"))
			mkdir("../htdocs/private");
		if (!file_exists("../htdocs/private/passwd"))
			file_put_contents("../htdocs/private/passwd", "");
		if (file_exists("../htdocs/private/passwd"))
			$top_user = unserialize(file_get_contents("../htdocs/private/passwd"));
		if ($top_user) 
		{
			foreach ($top_user as $value)
			{
				if ($value['login'] == $user["login"])
				{
					echo ("ERROR\n");
					return (0);
				}
			}
		}
		$top_user[] = $user;
		header('Location: ../index.php');
		file_put_contents("../htdocs/private/passwd", serialize($top_user));
		echo ("OK\n");
	}
	else
		echo ("ERROR\n");
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
	<form action="create_account.php" method="POST">
		Identifiant: <input type="text" name="login" value="" required/><br/>
		Mot de passe: <input type="password" name="passwd" value="" required/><br/>
		<input type="submit" name="submit" value="OK"/>
	</form>
</body>
</html>