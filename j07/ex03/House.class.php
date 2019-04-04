<?php

class House
{
	public function introduce ()
	{
		$name = $this->getHouseName();
		$motto = $this->getHouseMotto();
		$seat = $this->getHouseSeat();
		print ("House $name of $seat : $motto\n");
	}
}

?>

