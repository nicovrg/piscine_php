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

	public function __construct ($array)
	{
		$check = 0;
		if (array_key_exists('rgb', $array) == true)
		{
			$this->red = intval($array['rgb'] >> 16 & 0xFF);
            $this->green = intval($array['rgb'] >> 8 & 0xFF);
            $this->blue = intval($array['rgb'] >> 0 & 0xFF);
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
			printf("error\n");
		else if (self::$verbose == true)
			printf("Color( red: %3d, green: %3d, blue: %3d ) constructed.\n", $this->red, $this->green, $this->blue);
	}

	public function __destruct ()
	{
		if (self::$verbose == true)
			printf("Color( red: %3d, green: %3d, blue: %3d ) destructed.\n", $this->red, $this->green, $this->blue);
	}

	public function __toString ()
	{
		return (sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue));
	}

	public function doc ()
	{
		$file = 'Color.doc.txt';
		$contenu = file_get_contents($file);
		echo ($contenu."\n");
	}
	
	public function add (Color $color)
	{
		$red = $this->red + $color->red;
		$green = $this->green + $color->green;
		$blue = $this->blue + $color->blue; 
		return (new Color(array('red' => $red, 'green' => $green, 'blue' => $blue)));
	}

	public function sub (Color $color)
	{
		$red = $this->red - $color->red;
		$green = $this->green - $color->green;
		$blue = $this->blue - $color->blue; 
		return (new Color(array('red' => $red, 'green' => $green, 'blue' => $blue)));
	}

	public function mult ($color)
	{
		$red = $this->red * $color;
		$green = $this->green * $color;
		$blue = $this->blue * $color; 
		return (new Color(array('red' => $red, 'green' => $green, 'blue' => $blue)));
	}
}

?>
