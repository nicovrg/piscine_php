<?php
require_once('Color.class.php');

Class Vertex
{
	private $_x = 0.00;
	private $_y = 0.00;
	private $_z = 0.00;
	private $_w = 1.00;
	private $_color;
	public static $verbose = false;

	function __construct ($array)
	{
		if (!isset($array))
		{
			$this->_x = 0;
			$this->_y = 0;
			$this->_z = 0;
			$this->_w = 1.00;
			$this->_color = new Color(array( 'red' => 255, 'green' => 255, 'blue' => 255 ));
		}
		if (isset($array['x']) && isset($array['y']) && isset($array['z']))
		{
			$this->_x = $array['x'];
			$this->_y = $array['y'];
			$this->_z = $array['z'];
			if (isset($array['w']))
				$this->_w = $array['w'];
			if (isset($array['color']))
				$this->_color = $array['color'];
			else
				$this->_color = new Color(array( 'red' => 255, 'green' => 255, 'blue' => 255 ));
		}
		if (self::$verbose == true)
			printf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, Color( red: %3d, green: %3d, blue: %3d ) ) constructed)\n", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue);
	}

	function __destruct ()
	{
		if (self::$verbose == true)
			printf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, Color( red: %3d, green: %3d, blue: %3d ) ) destructed)\n", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue);
	}

	function __toString ()
	{
		if (self::$verbose == true)
			return (sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, Color( red: %3d, green: %3d, blue: %3d ) )", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue));
		return (sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f )", $this->_x, $this->_y, $this->_z, $this->_w));
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