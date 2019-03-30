<?php
if ($_POST['submit'] != "OK" || !$_POST['login'] || !$_POST['passwd'])
	echo ("ERROR\n");
else
{
	$user["login"] = $_POST['login'];
	$user["passwd"] = hash("sha512", $_POST['passwd']);
	if (!file_exists("../htdocs/private"))
    {
        mkdir("../htdocs");
        mkdir("../htdocs/private");
    }
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
	file_put_contents("../htdocs/private/passwd", serialize($top_user));
	echo ("OK\n");
}
return (0);