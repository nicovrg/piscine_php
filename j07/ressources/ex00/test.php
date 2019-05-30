<?php

class Lannister {
	public function __construct() {
		print("A Lannister is born !" . PHP_EOL); 
	}
	public function getSize() {
		return "Average";
	}
	public function houseMotto() {
		return "Hear me roar!";
	}
}

include('/Users/nivergne/42_Nico/42_gitlab/ongoing/piscine_php/j07/ex00/Tyrion.class.php');

$tyrion = new Tyrion();

print($tyrion->getSize() . PHP_EOL);
print($tyrion->houseMotto() . PHP_EOL);
?>
