<?php
abstract class Fighter
{
	public $type;

	abstract function fight($target);

	public function __construct($soldier)
	{
		$this->type = $soldier;
	}
}
//fight recoit une instance
?>