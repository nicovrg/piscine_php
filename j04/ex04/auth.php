<?php
	function auth($login, $passwd)
	{
		if (!$login || !$passwd)
			return (false);
		if (!file_exists("../htdocs/private"))
		{
			mkdir("../htdocs");
			mkdir("../htdocs/private");
		}
		$account = unserialize(file_get_contents('htdocs/private/passwd'));
		if ($account)
			foreach ($account as $value)
				if ($value['login'] === $login && $value['passwd'] === hash('sha512', $passwd))
					return (true);
		return (false);
	}
?>