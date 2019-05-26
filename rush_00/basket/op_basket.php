<?php
session_start();
function add_item($name,$quantity,$price)
{
	$select = array(name => $name, quantity => $quantity, price => ($quantity*$price));
	if (isset($_SESSION[basket]))
	{
	foreach ($_SESSION[basket] as $key => $elem)
	{	
		if ($elem[name] === $name)
		{
			$_SESSION[basket][$key][quantity] = $elem[quantity] + $quantity;
			$_SESSION[basket][$key][price] = $elem[price] + ($quantity*$price);
			return;
		}	
	}
	$_SESSION[basket][] = $select;
	return;
	}
	else if (!(isset($_SESSION['basket']))){
      $_SESSION[basket][] = $select;
	  return;
   }
   echo "Error> > op_basket";
	
}
?>