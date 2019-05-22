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
	return $return;
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
			$argv[$i] = substr($argv[$i], 0, 8);
		// $array[0] =	https://www.42.fr/wp-content/themes/42/images/42_logo_black.svg
		// $array[1] =	http:///images/home_big.jpg
		// print $val."\n";
		if (file_exists($val) == FALSE)
			mkdir("$argv", 0777, true);
		
		$i++;
	}
	if (strncmp($argv, "http://", 7) === 0)
	{
		$argv = substr($argv, 0, 7);
	}
	else if (strncmp($argv[$i], "http://", 8) === 0)
	{
		
	}
	print $val."\n";
	print $argv."\n";	
}

if ($argc == 2)
{
	main($argv[1]);
	return (0);
}







// $val = $argv[1];
// if (substr($argv[1], 0, 7) == "http://")
// 	$val = substr($argv[1], 7);
// if (file_exists($val) == FALSE)
// 	mkdir($val, 0777, true);
// foreach ($match[0] as $key) {
// 	$imgurl = $key;
// 	$imagename= basename($imgurl);
// 	if(file_exists('./$val/'.$imagename)){continue;} 
// 	$image = get_img($imgurl); 
// 	file_put_contents($val.'/'.$imagename,$image);
// }





// 1 - curl init
// 2 - get html from url
// 3 - 

?>