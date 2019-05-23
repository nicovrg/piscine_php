#!/usr/bin/php
<?php

function get_img($url)
{
	$headers[] = 'Accept: image/gif, image/x-bitmap, image/jpeg, image/pjpeg';              
	$headers[] = 'Connection: Keep-Alive';
	$headers[] = 'Content-type: application/x-www-form-urlencoded;charset=UTF-8';         
	$user_agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)';
	$process = curl_init($url);
	curl_setopt($process, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($process, CURLOPT_HEADER, 0);
	curl_setopt($process, CURLOPT_USERAGENT, $user_agent);
	curl_setopt($process, CURLOPT_TIMEOUT, 30);
	curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($process, CURLOPT_FOLLOWLOCATION, 1);
	$return = curl_exec($process);
	curl_close($process);
	return ($return);
}

function main($argv)
{
	$init = curl_init($argv);
	$html_content = file_get_contents($argv);
	preg_match_all('/<img.{0,}src=["][[:graph:]]+["]/', $html_content, $match);
	$i = 0;
	$number_img = count($match[0]);
	while ($i != $number_img)
	{
		$val = substr(strstr($match[0][$i], "src="), 5);
		$val = str_replace('"', '', $val);
		if ($val[0] == "/")
			$array[$i] = $argv.$val;
		else
			$array[$i] = $val;
		$i++;
	}
	if (strncmp($argv, "http://", 7) === 0)
		$argv = substr($argv, 7);
	else if (strncmp($argv, "https://", 8) === 0)
		$argv = substr($argv, 8);
	if (file_exists($argv) == FALSE)
		mkdir("$argv", 0777, true);
	foreach ($array as $link)
	{
		$img_link = $link;
		$img_name = basename($img_link);
		if (file_exists('./$argv/'.$img_name))
			continue ;
		$img = get_img($img_link);
		file_put_contents($argv.'/'.$img_name, $img);
		print ($img_link."\n");	
	}
	return (0);
}

if ($argc == 2)
{
	main($argv[1]);
	return (0);
}
?>