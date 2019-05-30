<?php

class	Jaime
{
	public function	sleepWith($who)
	{
		if ($who instanceof Tyrion)
			print("Not even if I'm drunk !" . "\n");
		else if ($who instanceof Sansa)
			print("Let's do this." . "\n");
		else if ($who instanceof Cersei)
			print("With pleasure, but only in a tower in Winterfell, then." . "\n");
	}
}
?>