<?php

Class Color 
{
	public $red = 0;
	public $green = 0;
	public $blue = 0;
	public $rgb = 0;
	public static $verbose = false;
	
	public function check_limits ($color)
	{
		if ($color < 0)
			return (0);
		else if ($color > 255)
			return (255);
		else
			return ($color);
	}

	public function convert ($input)
	{
		$hex = null;
		$index = 0;
		$to_ten = base_convert((int)$input, 10, 16);
		$size = 6 - strlen($to_ten);
		while ($index < $size)
		{
			$hex = $hex."0";
			$index++;
		}
		$hex = $hex.$to_ten;
		$array_rgb = array();
		if (strlen($hex) == 6)
		{
			$val = base_convert($hex, 16, 10);
			$array_rgb['red'] = 255 & ($val >> 16);
			$array_rgb['green'] = 255 & ($val >> 8);
			$array_rgb['blue'] = 255 & $val;
		}
		return ($array_rgb);
	}

	public function __construct ($array)
	{
		$check = 0;
		if (array_key_exists('rgb', $array) == true)
		{		
			$array_rgb = $this->convert($array['rgb']);
			$this->red = $array_rgb['red'];
			$this->green = $array_rgb['green'];
			$this->blue = $array_rgb['blue'];
			$check++;
		}
		else if (array_key_exists('red', $array) == true && array_key_exists('green', $array) == true && array_key_exists('blue', $array) == true)
		{
			$this->red = round((int)$array['red'], null);
			$this->green = round((int)$array['green'], null);
			$this->blue = round((int)$array['blue'], null);
			$check++;
		}
		$this->red = $this->check_limits($this->red);
		$this->green = $this->check_limits($this->green);
		$this->blue = $this->check_limits($this->blue);
		if (self::$verbose == true && $check === 0)
			$error = "Error\n";
		else if (self::$verbose == true)
			$success = "Color( red: ".printf("%3s",$this->red).", green: ".printf("%3s",$this->green).", blue: ".printf("%3s", $this->blue)." ) constructed.".PHP_EOL;
	}

	public function __destruct ()
	{
		if (self::$verbose == true)
			$success = "Color( red: ".printf("%3s",$this->red).", green: ".printf("%3s",$this->green).", blue: ".printf("%3s", $this->blue)." ) destructed.".PHP_EOL;
		return (1);
	}

	public function __toString ()
	{
		return ($this->success);
	}

	public function doc ()
	{
		$file = 'Color.doc.txt';
		$contenu = file_get_contents($file);
		echo ($contenu."\n");
	}

	public function add ($color)
	{
		$red = $this->red + $color->red;
		$green = $this->green + $color->green;
		$bleu = $this->blue + $color->blue; 
		return (new Color(array('red' => $red, 'green' => $green, 'blue' => $blue)));
	}
		
	public function sub ($color)
	{
		$red = $this->red - $color->red;
		$green = $this->green - $color->green;
		$bleu = $this->blue - $color->blue; 
		return (new Color(array('red' => $red, 'green' => $green, 'blue' => $blue)));
	}

	public function mult ($color)
	{
		$red = $this->red * $color->red;
		$green = $this->green * $color->green;
		$bleu = $this->blue * $color->blue; 
		return (new Color(array('red' => $red, 'green' => $green, 'blue' => $blue)));
	}
}

?>