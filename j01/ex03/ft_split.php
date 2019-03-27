#!/usr/bin/php
<?php
function ft_split($str)
{
	if ($str)
	{
		$tab = explode (" ", $str);
		$res = array_filter($tab, 'strlen');
		sort ($tab);
		return ($res);
	}
}
?>