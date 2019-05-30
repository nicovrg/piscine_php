<?php
class UnholyFactory
{
	private $array;
	
	function absorb($solier)
	{
		if (!$this->array || !$this->array == null || !in_array($solier, $this->array))
		{
			if (get_parent_class($solier) === "Fighter")
			{
				$this->array[] = $solier;
				print("(Factory absorbed a fighter of type ".$solier->type.")".PHP_EOL);
			}
			else
				print("(Factory can't absorb this, it's not a fighter)".PHP_EOL);
		}
		else
			print("(Factory already absorbed a fighter of type".$solier->type.")".PHP_EOL);
	}

	function fabricate($soldier)
	{
		foreach ($this->array as $key => $solier)
		{
			if ($solier->type === $soldier)
			{
				print("(Factory fabricates a fighter of type ".$soldier.")".PHP_EOL);
				return $this->array[$key];
			}
		}
		print("(Factory hasn't absorbed any fighter of type ".$soldier.")".PHP_EOL);
	}
}
?>