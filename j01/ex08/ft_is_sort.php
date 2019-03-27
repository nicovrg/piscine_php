#!/usr/bin/php
<?PHP
function ft_is_sort ($array)
{
    $array_cpy = $array;
    sort ($array_cpy);
    while ($i < count($array))
    {
        if ($array[$i] != $array_cpy[$i])
            return (0);
        $i++;
    }
    return (1);
}
?>