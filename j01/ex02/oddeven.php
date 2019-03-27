#!/usr/bin/php
<?php
while (1)
{
	print("Entrez un nombre: ");
#	if (ctrl-d == TRUE)
#		exit();
#	else
#	{
		$line = trim(fgets(STDIN));
		if (is_numeric($line) == false)
			print("'$line' n'est pas un chiffre\n");
		else
		{
			if ((int)$line % 2 == 0)
				print("Le chiffre $line est Pair\n");
			else
				print("Le chiffre $line est Impair\n");
		}
#	}
}
?>

<!-- comment exit avec ctrlD? --> 
<!-- proteger le fait que stdin soit sur dev/null? --> 
<!-- pourquoi quand je fais fleche up, ca remet la ligne d'avant? --> 
<!-- et pourquoi quand je spam fleche up, ca remet remonte dans le terminal? wtf --> 