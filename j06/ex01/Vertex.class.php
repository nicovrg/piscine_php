<?php

require_once('Color.class.php');

Class Vertex
{
	private $_x;
	private $_y;
	private $_z;
	private $_w;
	private $_color;
	public static $verbose = false;

	function __construct ($array)
	{
		if (!isset($array))
		{
			$this->_x = $this->set_x(0);
			$this->_y = $this->set_y(0);
			$this->_z = $this->set_z(0);
			$this->_w = $this->set_w(1);
			$this->_color = $this->set_color(new Color(array( 'red' => 255, 'green' => 255, 'blue' => 255 )));
		}
		else if (isset($array['x']) && isset($array['y']) && isset($array['z']))
		{
			$this->_x = $array['x'];
			$this->_y = $array['y'];
			$this->_z = $array['z'];
			if (isset($array[$w]))
				$this->_w = $array['w'];
			if (isset($array['color']))
				$this->_color = $array['color'];
		}
		if (self::$verbose == true)
			$success = "Color( red: ".printf("%3s",$this->red).", green: ".printf("%3s",$this->green).", blue: ".printf("%3s", $this->blue)." ) constructed.".PHP_EOL;
	}

	function __destruct ()
	{

	}

	function __toString ()
	{

	}

	public function __get($obj)
	{
		return ($this->$obj);
	}
	
	public function get_x()
	{
		return ($this->_x);
	}
	public function get_y()
	{
		return ($this->_y);
	}
	public function get_z()
	{
		return ($this->_z);
	}
	public function get_w()
	{
		return ($this->_w);
	}
	public function get_color()
	{
		return ($this->_color);
	}

	public function set_x($x)
	{
		return ($this->_x = $x);
	}
	public function set_y($y)
	{
		return ($this->_y = $y);
	}
	public function set_z($z)
	{
		return ($this->_z = $z);
	}
	public function set_w($w)
	{
		return ($this->_w = $w);
	}
	public function set_color($color)
	{
		return ($this->_color = $color);
	}

	function doc ()
	{
		$file = 'Vertex.doc.txt';
		$contenu = file_get_contents($file);
		echo ($contenu."\n");
	}
}