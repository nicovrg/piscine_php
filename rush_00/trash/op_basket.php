<?php
session_start();

function ft_add($name, $quantity, $price)
{
	$select = array(name => $name, quantity => $quantity, price => ($quantity*$price));
	if (isset($_SESSION[basket]))
	{
	foreach ($_SESSION[basket] as $key => $elem)
	{	
		if ($elem[name] === $name)
		{
			$_SESSION[basket][$key][quantity] = $elem[quantity] + $recap_nb;
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