#!/usr/bin/php
<?php
$str = (trim(preg_replace("/[ \t]{1,}/", " ", $argv[1])));
echo ($str);
?>