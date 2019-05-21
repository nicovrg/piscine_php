#!/usr/bin/php
<?php
function ft_split($str)
{
	if ($str)
	{
		$tab = preg_split('/\s+/', $str);
		$res = array_filter($tab, 'strlen');
		return ($res);
	}
}
if ($argc == 1)
    return ;
foreach ($argv as $key =>$value) 
{
    if ($value == NULL)
        unset($argv[$key]);
}
$arr_all = array();
$arr_tmp = array();
foreach ($argv as $value)
{
    $arr_tmp = ft_split ($value);
    $arr_all = array_merge($arr_all, $arr_tmp);
}
array_shift($arr_all);
$arr_char = array();
$arr_numb = array();
$arr_else = array();
$arr_resu = array();
foreach ($arr_all as $val)
{
    if (($val[0] >= 'a' && $val[0] <= 'z') || ($val[0] >= 'A' && $val[0] <= 'Z'))
        array_push($arr_char, $val);
    else if ($val[0] >= '0' && $val[0] <= '1')
        array_push($arr_numb, $val);
    else
        array_push($arr_else, $val);
}
natcasesort($arr_char);
$arr_resu = array_merge($arr_resu, $arr_char);
$arr_resu = array_merge($arr_resu, $arr_numb);
$arr_resu = array_merge($arr_resu, $arr_else);
foreach ($arr_resu as $value)
    print ($value)."\n";
?>