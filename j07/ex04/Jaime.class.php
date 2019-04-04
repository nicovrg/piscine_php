<?php

class	Jaime
{
	public function	sleepWith($who)
	{
		if (is_a($who, "Tyrion"))
			print("Not even if I'm drunk !" . "\n");
		else if (is_a($who, "Sansa"))
			print("Let's do this." . "\n");
		else if (is_a($who, "Cersei"))
			print("With pleasure, but only in a tower in Winterfell, then." . "\n");
	}
}
?>