<?php

include('/Users/nivergne/42_Nico/42_gitlab/ongoing/piscine_php/j07/ex03');

class HouseStark extends House {
	public function getHouseName() {
		return "Stark";
	}
	public function getHouseMotto() {
		return "Winter is coming";
	}
	public function getHouseSeat() {
		return "Winterfell";
	}
}

class HouseMartell extends House {
	public function getHouseName() {
		return "Martell";
	}
	public function getHouseMotto() {
		return "Unbowed, Unbent, Unbroken";
	}
	public function getHouseSeat() {
		return "Sunspear";
	}
}

$houses = Array(new HouseStark(), new HouseMartell());

foreach ($houses as $house) {
	$house->introduce();
}

?>
