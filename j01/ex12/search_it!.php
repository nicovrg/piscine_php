#!/usr/bin/php
<?php
foreach ($argv as $val)
{
	if ($val != $argv[0] || $val != $argv[1])
	{
		$key_val = explode(':', $val);
		if ($key_val[0] == $argv[1])
			$result = $key_val[1];
	}
}
if (!is_null($result))
	echo ($result."\n");
?>
