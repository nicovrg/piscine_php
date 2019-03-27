#!/usr/bin/php
<?php
function ft_split($str)
{
	if ($str)
	{
		$arr_tab = preg_split('/\s+/', $str);
		$arr_res = array_filter($arr_tab, 'strlen');
		sort ($arr_res);
		return ($arr_res);
	}
}
if ($argc == 2)
{
	if ($argv[1] === "0")
	{
		print ("0\n");
		exit (0);	
	}
	$array = ft_split($argv[1]);
	$j = count($array);
	$i = 1;
	$str = $str.$array[0];
	while ($i < $j)
	{
		$str = $str." ".$array[$i];
		$i++;
	}
	$str = $str.$array[$i];
	if (($str))
		print ($str."\n");
}
?>