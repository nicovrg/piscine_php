#!/usr/bin/php
<?php
#if 
#./standard_functions.php | grep function_name
#give an output, the function is allowed in this piscine 
$fl = get_extension_funcs("standard"); sort($fl); print_r($fl);
?>
