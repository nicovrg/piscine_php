<?PHP
class NightsWatch implements IFighter
{
	public function recruit($fighter)
	{
		if (method_exists($fighter, 'fight'))
			$fighter->fight() . "\n";
	}
	public function fight() 
	{
	}
}
?>