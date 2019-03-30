<?php
if ($_POST['submit'] != "OK" || !$_POST['login'] || !$_POST['passwd'])
{
	echo ("ERROR\n");
	return (0);
}	
else
{
	$user["login"] = $_POST['login'];
	$user["passwd"] = hash("sha512", $_POST['passwd']);
	if (!file_exists("../private"))
		mkdir("../private");
	if (file_exists("../private/passwd"))
		$top_user = unserialize(file_get_contents("../private/passwd"));
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
	file_put_contents("../private/passwd", serialize($top_user));
	echo ("OK\n");
	return (0);
}