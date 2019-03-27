#!/usr/bin/php
<?php
while(1)
{
    print("Entrez un nombre: ");
    $line = trim(fgets(STDIN));
    if(feof(STDIN) == true)
    {
        echo "\n";
        exit(0);
    }
	else
	{
		if (is_numeric($line) == false)
			print("'$line' n'est pas un chiffre\n");
		else
		{
            if (substr($line, -1) % 2 == 0)
				print("Le chiffre $line est Pair\n");
			else
				print("Le chiffre $line est Impair\n");
		}
	}
}
?>
