#!/usr/bin/php
<?php
if ($argc != 2)
{
	echo ("Incorrect Parameters\n");
	return ;
}
$first = trim($argv[1]);
$operand = trim($argv[2]);
$second = trim($argv[3]);
if (!is_numeric($first) || !is_numeric(trim($second)))
	return ;
if ($operand !== '+' && $operand !== '-' && $operand !== '*' && $operand !== '/' && $operand !== '%')
	return ;
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
	if ($second === '0')
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