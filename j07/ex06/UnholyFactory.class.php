<?php
Class UnholyFactory{
	
	static $array;

	public function absorb($str)
	{
		if (get_parent_class($str) != "Fighter")
			print "(Factory can't absorb this, it's not a fighter)\n";
		
		else
		{
			if ($array)
				print "(Factory absorbed a fighter of type " . strtolower(get_class($str)) . ")\n";
            else
                return ;
		}
	}
	public function fabricate($str)
	{
		
	}
}
?>