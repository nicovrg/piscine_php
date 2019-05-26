<?php
session_start();
	function auth($login, $passwd)
	{
		if (!$login || !$passwd)
			return (false);
		$users = unserialize(file_get_contents('../htdocs/private/passwd'));
		if ($users)
		{
			foreach ($users as $user)
			{
				if ($user['login'] === $login && $user['passwd'] === hash('sha512', $passwd))
				{
					if ($user['admin'] === 'yes')
						return (1);
					return (0);
				}
			}
		}
		return (-1);
	}
?>
