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
        sort ($arr_res);
		return ($arr_res);
	}
}
if ($argc > 1)
{
    $i = 1;
    $arr_res = array();
    $arr_tmp = array();
    while ($i < $argc)
    {
        $arr_tmp = ft_split($argv[$i]);
        $arr_res = array_merge($arr_res, $arr_tmp);
        $i++;
    }
    $i = 0;
    sort ($arr_res);
    while ($i < count($arr_res))
    {
        print ($arr_res[$i]);
        print ("\n");
        $i++;
    }
}
?>
