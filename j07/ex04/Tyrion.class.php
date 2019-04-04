<?php

include_once('Lannister.class.php');

class	Tyrion
{
	public function	sleepWith($who)
	{
		if (is_a($who, "Jaime") || is_a($who, "Cersei") )
			print("Not even if I'm drunk !" . "\n");
		else if (is_a($who, "Sansa"))
			print("Let's do this." . "\n");
	}
}
?>