<!-- 
private function convert ($input)
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

	if (array_key_exists('rgb', $array) == true)
	{
	$array_rgb = $this->convert($array['rgb']);
	$this->red = $array_rgb['red'];
	$this->green = $array_rgb['green'];
	$this->blue = $array_rgb['blue'];
	$check++;
	}
-->