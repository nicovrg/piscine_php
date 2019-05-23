#!/usr/bin/php
<?php

function my_regex($matches)
{
    $str = preg_replace_callback('#>(.*?)<#si', my_upper, $matches[0]);
    return ($str);
}

function my_upper($matches)
{
    $ret = str_replace($matches[1], strtoupper($matches[1]), $matches[0]);
    return $ret;
}

if ($argc < 2)
    exit (1);
$file = fopen($argv[1], "r+") or die("Unable to open file\n");
$content = fread($file, filesize($argv[1]));
$result = preg_replace_callback('#<a[^>]*>(.*?)</a>#si', my_regex, $content);
$result = preg_replace_callback('#<[^>]*title="([^"]*?)"#si', my_upper, $result);
echo ($result);
?>