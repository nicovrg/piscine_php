#!/usr/bin/php
<?php

Class Color 
{
	public $red = 0;
	public $green = 0;
	public $blue = 0;
	public $rgb = 0;
	public static $verbose = false;
	
	function __construct ($array)
	{
		if ($verbose == true)
			print ("constructor called");
		if (array_key_exists($array['rgb'], $array) == true)
		{
			$this->rgb = (int)$array['rgb'];
		}
		else if (array_key_exists($array['red'], $array) == true && array_key_exists($array['green'], $array) == true && array_key_exists($array['blue'], $array) == true)
		{
			$this->red = (int)$array['red'];
			$this->green = (int)$array['green'];
			$this->blue = (int)$array['blue'];
		}
		else if ($verbose == true)
			print ("Error\n");
	}

	function __destruct ()
	{
		if ($verbose == true)
			print ("destructor called");
		return (1);
	}

	function __toString ()
	{
		return('Color( red: '.sprintf("%3s", $this->red).', green: '.sprintf("%3s", $this->green).', blue: '.sprintf("%3s", $this->blue).' )');
	}

	function convert ($input)
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
		print $hex;
		if (strlen($hex) == 6)
		{
			$val = base_convert($hex, 16, 10);
			$array_rgb['red'] = 255 & ($val >> 16);
			$array_rgb['green'] = 255 & ($val >> 8);
			$array_rgb['blue'] = 255 & $val;
		}
		else
			return (-1);
		return ($array_rgb);
	}


	function add ()
	{
		
	}
		
	function sub ()
	{
		
	}
		
	function mult ()
	{
		
	}
		

	static function doc ()
	{
		$file = 'Color.doc.txt';
		$contenu = file_get_contents($file);
		echo ($contenu."\n");
	}
}

Color::$verbose = true;
// print( Color::doc() );
// print_r( Color::convert(65535) );
Color::convert(3);
// $red = new Color( array( 'red' => 0xff, 'green' => 0   , 'blue' => 0	) );
print( $red	 . PHP_EOL );


?>