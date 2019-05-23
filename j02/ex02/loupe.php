#!/usr/bin/php
<?php

function upper($matches)
{
    $str = str_replace($matches[1], strtoupper($matches[1]), $matches[0]);
    return($str);
}

function main ($argv)
{
	if(file_exists($argv) == false)
        return 0;
	$file = fopen($argv, 'r');
    $line = fread($file, filesize($argv));
    $line = preg_replace_callback('/<a.*?title="(.*?)">/', "upper", $line);
    $line = preg_replace_callback('/<a.*?>(.*?)</', "upper", $line);
    print($line);
	fclose($file);
}

if ($argc == 2)
{
    main ($argv[1]);
}
?>