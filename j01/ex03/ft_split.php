<?php
function ft_split($str)
{
	if ($str)
	{
		$tab = preg_split('/\s+/', $str);
		$res = array_filter($tab, 'strlen');
		sort ($res);
		return ($res);
	}
}
?>