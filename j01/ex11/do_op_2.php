#!/usr/bin/php
<?php
if ($argc != 2)
{
	echo ("Incorrect Parameters\n");
	return ;
}
$i = 0;
$clean = trim($argv[1]);
$param = sscanf($argv[1], "%d %c %d %s");
$first = $param[0];
$operand = $param[1];
$second = $param[2];
$check = $param[3];
if (!is_numeric($first) || !is_numeric($second) || $check)
{
	echo ("Syntax Error\n");
	return ;
}
if ($operand !== '+' && $operand !== '-' && $operand !== '*' && $operand !== '/' && $operand !== '%')
{
	echo ("Syntax Error\n");
	return ;
}
if ($operand === '+')
{
	$result = $first + $second;
	echo ("$result\n");
	return ;
}
if ($operand === '-')
{
	$result = $first - $second;
	echo ("$result\n");
	return ;
}
if ($operand === '*')
{
	$result = $first * $second;
	echo ("$result\n");
	return ;
}
if ($operand === '/')
{
	if ($second === 0)
	{
		echo ("you're dividing by zero!\n");
		return ;
	}
	$result = $first / $second;
	echo ("$result\n");
	return ;
}
if ($operand === '%')
{
	$result = $first % $second;
	echo ("$result\n");
	return ;
}
?>