#!/usr/bin/php
<?php
function ft_split($str)
{
    $arr_tab = array();
    $arr_res = array();
	if ($str)
	{
		$arr_tab = preg_split('/\s+/', $str);
		$arr_res = array_filter($arr_tab, 'strlen');
		return ($arr_res);
	}
}
if ($argc > 1)
{
    $arr_res = ft_split($argv[1]);
    $word = array_shift ($arr_res);
    array_push ($arr_res, $word);
    foreach ($arr_res as $value)
        $str = $str." ".$value;
    $tmp = (count(str) - 1);
    $str = substr($str, 1);
    print ($str);
}
?>