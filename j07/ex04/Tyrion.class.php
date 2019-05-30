<?php
include_once('Lannister.class.php');
class	Tyrion
{
	public function	sleepWith($who)
	{
		if ($who instanceof Jaime || $who instanceof Cersei)
			print("Not even if I'm drunk !" . "\n");
		else if ($who instanceof Sansa)
			print("Let's do this." . "\n");
	}
}
?>