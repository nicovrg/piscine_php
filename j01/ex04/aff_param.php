#!/usr/bin/php
<?php
	if ($argv)
	{
		array_shift($argv);
		foreach ($argv as $value)
			print ($value."\n");
	}
?>
