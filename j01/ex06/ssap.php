#!/usr/bin/php
<?php
if ($argc > 1)
{
    $j = 0;
    foreach($argv as $i => $val)
    {
        if ($i != 0)
        {
            $tab = explode(" ", $val);
            $tab = array_filter($tab, 'strlen');
            $tab_tmp = $tab;
        }
    }
    sort($tab_tmp);
    foreach ($tab_tmp as $val)
        print($val)."\n";
}
?>