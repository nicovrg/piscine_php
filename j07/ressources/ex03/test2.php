<?php
include('/Users/nivergne/42_Nico/42_gitlab/ongoing/piscine_php/j07/ex03/House.class.php');
class DrHouse extends House {
	public function diagnose() {
		print("It's not lupus !" . PHP_EOL);
	}
}
$house = new DrHouse();
$house->introduce();

?>

