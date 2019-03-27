#!/usr/bin/php
<?php
$index = 0;
if ($argc == 1)
    return ;
foreach($argv as $i => $val)
{
    if ($i != 0)
    {
        $tab = explode(" ", $val);
        $tab = array_filter($tab, 'strlen');
        foreach ($tab as $j => $val2)
        {
            $tab_tmp[$index] = $val2;
            $index++;
        }
    }
}
sort($tab_tmp);
foreach ($tab_tmp as $val)
    print($val)."\n";
?>