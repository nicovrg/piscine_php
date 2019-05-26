<?php
include("../index.php");
include ("../op_basket.php");
if (file_exists("../htdocs/items/categories"))
{
	$categories = file_get_contents("../htdocs/items/categories");
	$categories = unserialize($categories);
}
if (file_exists("../htdocs/items/products"))
{
$products = file_get_contents("../htdocs/items/products"); 
$products = unserialize($products);
}
?>
<HTML>
<head>
    <meta charset="utf-8">
	<title>Basket</title>
	<link rel="stylesheet" type="text/css" href="basket.css">
</head>
<table>
<tr > <td class="basket" style="border-radius:5px; background-color:336666"><b>product</b></td> <td class="basket" style="border-radius:5px; background-color:336666">price</td> <td class="basket" style="border-radius:5px; background-color:336666">total</td><td class="basket" style="border-radius:5px; background-color:336666">quantity/td> <br /></tr>
</HTML>
<?php 

if (!$_SESSION['basket'])
	echo "Your basket is empty !";

if ($_SESSION[basket] && $_GET[value] !== "empty" && $_GET[command] !== "ok")
{
	foreach ($_SESSION[basket] as $key => $elem)
	{	
		$price = $elem[price] / $elem[quantity];
		echo "<tr> <td class=\"basket\"><b>$elem[name]</b></td> <td class=\"basket\"> $price € </td> <td class=\"basket\"> $elem[price] € </td> <td class=\"basket\"> $elem[quantity]
		</td> </tr>";
		$total = $total + $elem[price];
	}
	echo "<tr class=\"basket\"> <td>Total : $total € <td></tr></table><br /><br/>";

	if (!$_SESSION['loggued_on_user'])
		echo "<div>Please, connect on your account before to valid your order.</div>";
	else {
	echo "<img src=\"./imagesdebase/Tic.png\" width=25px style=\"position:relative; top:7px; margin-right:10px\"> Valid your order: 
	<form style=\"font-size:20px\" method=\"post\"action=\"basket.php?value=validate&command=ok\">
	<input type=\"submit\" name=\"validate\" value=\"validate\"/>
	</form>";}
	echo "Empty your basket: 
	<form style=\"font-size:20px\" method=\"post\"action=\"basket.php?value=empty\">
	<input type=\"submit\" name=\"empty\" value=\"Vider le basket\"/>
	</form>";

}
if($_GET[value] === "empty")
{
	unset($_SESSION[basket]);
	echo "Your basket is empty !";
}
	if($_GET[value] === "validate" && $_SESSION[basket])
	{
		if ($_SESSION['loggued_on_user'])
		{
			foreach ($_SESSION[basket] as $key => $elem)
					$total = $total + $elem[price];
			if (!file_exists("../htdocs/items/orders")){
				$tab[] = array("user"=>$_SESSION[loggued_on_user], "basket" => $_SESSION[basket], "total" => $total);
				$str = serialize($tab);
				file_put_contents("../htdocs/items/orders", $str);
				echo "Order successfully sent ! Thank you an see you soon !";
				unset($_SESSION[basket]);
			}
			else{
				$tab = array("user"=>$_SESSION[loggued_on_user], "basket" => $_SESSION[basket], "total" => $total);
				$commandes = file_get_contents("../htdocs/items/orders");
				$commandes = unserialize($commandes);
				$commandes[] = $tab;
				$str = serialize($commandes);
				file_put_contents("../htdocs/items/orders", $str);
				echo "Order successfully sent ! Thank you an see you soon !";
				unset($_SESSION[basket]);
			}		
		}
	}
?>