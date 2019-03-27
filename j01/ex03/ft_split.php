#!/usr/bin/php
<?php
function ft_split($str)
{
	if ($str)
	{
		$tab = explode (" ", $str);
		sort ($tab);
		return ($tab);
	}
}

print_r(ft_split("$argv[1]"));

#print_r(ft_split("Hello    World AAA"));
#que fait la fonction si il n'y a pas de str en params? return 0?
#comment savoir si register_argc_argv est activé?
#pourquoi je ne peux pas parser une chaine normalement?


#function ft_split($str)
#{
#	$i = 0;
#	while($str[i])
#	{
#		print($str[i]);
#		$i++;
#	}
#}
?>