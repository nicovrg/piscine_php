#!/usr/bin/php
<?PHP

function ft_is_sort ($array)
{

}

$tab =array("!/@#;^", "42", "Hello World", "salut", "zZzZzZz");

$tab[] = "Et qu’est-ce qu’on fait maintenant ?";
if (ft_is_sort($tab))
    echo"Le tableau est trie\n";
else
    echo"Le tableau n’est pas trie\n";
?>