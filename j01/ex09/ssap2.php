#!/usr/bin/php
<?PHP
function sscp_sort($a, $b)
{
    $lower_a = strtolower($a);
    $lower_b = strtolower($b);
    if ($lower_a === $lower_b)
        return (0);
    $order = "abcdefghijklmnopqrstuvwxyz0123456789 !\"#$%&'()*+,-./:;<=>?@[\]^_`{|}~";
	for ($i = 0; $lower_a[$i] === $lower_b[$i]; $i++);
    for ($j = 0; $lower_a[$i] !== $order[$j]; $j++);
    for ($k = 0; $lower_b[$i] !== $order[$k]; $k++);
    if ($j < $k)
        return (-1);
    return (1);
}

if ($argc >= 2)
{
    $final = array();
    foreach ($argv as $key => $param)
    {
		if ($key != 0)
        {
            $str = trim($param);
            $tab = explode(' ', $str);
            $tab = array_filter($tab);
            $final = array_merge($final, $tab);
        }
    }
    usort($final, "sscp_sort");
    foreach ($final as $word)
        echo ($word."\n");
}
?>