<?php

include_once('/Users/nivergne/42_Nico/42_gitlab/ongoing/piscine_php/j07/ex05/IFighter.class.php');
include_once('/Users/nivergne/42_Nico/42_gitlab/ongoing/piscine_php/j07/ex05/NightsWatch.class.php');

class Varys implements IFighter {
	public function pretendToFight() {
		print("* finds someone to fight for him *" . PHP_EOL);
	}
}

$varys = new Varys();
$nw = new NightsWatch();

$nw->recruit($varys);

$nw->fight();

?>

