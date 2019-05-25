<?php
if ($_POST['submit'] != "OK" || !$_POST['login'] || !$_POST['oldpw'] || !$_POST['newpw'])
	echo ("ERROR\n");
else
{
	$i = 0;
	$user["login"] = $_POST['login'];;
	$top_user = unserialize(file_get_contents("../htdocs/private/passwd"));
	if ($top_user)
	{
		foreach ($top_user as $value)
		{
			if ($value['login'] == $user["login"]){
				if (($value['login'] == $user["login"]) && ($value['passwd'] == hash("sha512", $_POST['oldpw'])))
				{
					$top_user[$i]["passwd"] = hash("sha512", $_POST['newpw']);
					file_put_contents("../htdocs/private/passwd", serialize($top_user));
					header('Location: index.html');
					echo ("OK\n");
					return (0);
				}
			}
			$i++;
		}
	}
	echo ("ERROR\n");
}
return (0);
?>