<?php
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
	<title>L'épicerie des Rêves</title>
	<link rel="stylesheet" type="text/css" href="../style/basket.css">
</head>
<table>
<tr > <td class="basket" style="border-radius:5px; background-color:336666"><b>product</b></td> <td class="basket" style="border-radius:5px; background-color:336666">price</td> <td class="basket" style="border-radius:5px; background-color:336666">total</td><td class="basket" style="border-radius:5px; background-color:336666">quantity/td> <br /></tr>
</HTML>

<?php

foreach ($_SESSION['basket'] as &$products)
{
	echo '
	<div class="product">
		<p class="name">'.$product['name'].'</p>
		<form method="POST" action ="basket.php">
			<input type="hidden" name="name" value="'.$product['name'].'" />
			Quantity: <input type="number" name="quantity" value="'.$product['quantity'].'"/>
			<p>'.$product['quantity'].'</p>
			<br />
			<input type="submit" name="submit" value="OK"/>
		</form>
		<a>
		</a>
	</div>
	';
}

if (!$_SESSION[basket])
{
	echo "Let's find the item you dream of to fulfill your basket !\n";
	$products = array(
		array('name' => 'tomatoe', 'cat' => array('fruit', 'vegetable'), 'price' => 2, 'quantity' => 2, 'img' => 'https://www.grandfrais.com/userfiles/image/produit/big/grand-frais-tomates-de-saison.png'),
		array('name' => 'apple', 'cat' => array('fruit'), 'price' => 3, 'quantity' => 4, 'img' => 'https://www.grandfrais.com/userfiles/image/produit/big/grand-frais-pomme-royal-gala.png'),
		array('name' => 'apricot', 'cat' => array('fruit'), 'price' => 4, 'quantity' => 5, 'img' => 'https://www.grandfrais.com/userfiles/image/produit/big/gfp-20170606155720.jpg'),
		array('name' => 'basil', 'cat' => array('aromate'), 'price' => 20, 'quantity' => 0, 'img' => 'https://www.grandfrais.com/userfiles/image/produit/big/gfp-20180425122630.jpg'),
		array('name' => 'bean', 'cat' => array('vegetable'), 'price' => 3, 'quantity' => 0, 'img' => 'https://www.grandfrais.com/userfiles/image/produit/big/grand-frais-haricots-coco.png'),
		array('name' => 'carrot', 'cat' => array('vegetable'), 'price' => 2, 'quantity' => 0, 'img' => 'https://www.grandfrais.com/userfiles/image/produit/big/grand-frais-carotte.png'),
		array('name' => 'eggplant', 'cat' => array('vegetable'), 'price' => 3, 'quantity' => 0, 'img' => 'https://www.grandfrais.com/userfiles/image/produit/big/grand-frais-aubergine-noire.png'),
		array('name' => 'pepper', 'cat' => array('vegetable'), 'price' => 4, 'quantity' => 0, 'img' => 'https://www.grandfrais.com/userfiles/image/produit/big/grand-frais-poivron-rouge.png'),
		array('name' => 'orange', 'cat' => array('fruit'), 'price' => 4, 'quantity' => 0, 'img' => 'https://www.grandfrais.com/userfiles/image/produit/big/orange-navel.png'),
		array('name' => 'cep', 'cat' => array('others'), 'price' => 9, 'quantity' => 0, 'img' => 'https://www.grandfrais.com/userfiles/image/produit/big/grand-frais-cepe.png'),
		array('name' => 'mushroom', 'cat' => array('others'), 'price' => 7, 'quantity' => 0, 'img' => 'https://www.grandfrais.com/userfiles/image/produit/big/gfp-20180425124751.jpg'),
		array('name' => 'girole', 'cat' => array('others'), 'price' => 9, 'quantity' => 0, 'img' => 'https://www.grandfrais.com/userfiles/image/produit/big/champignon-girolle.png'),
		array('name' => 'parsley', 'cat' => array('aromate'), 'price' => 20, 'quantity' => 0, 'img' => 'https://www.grandfrais.com/userfiles/image/produit/big/persil-frise.png'),
		array('name' => 'artichoke', 'cat' => array('vegetables'), 'price' => 4, 'quantity' => 0, 'img' => 'https://www.grandfrais.com/userfiles/image/produit/big/grand-frais-artichaut.png'),
		array('name' => 'cherry', 'cat' => array('fruit'), 'price' => 6, 'quantity' => 0, 'img' => 'https://www.grandfrais.com/userfiles/image/produit/big/gfp-20170606155720.jpg'),
		array('name' => 'raspberry', 'cat' => array('fruit'), 'price' => 8, 'quantity' => 0, 'img' => 'https://www.grandfrais.com/userfiles/image/produit/big/gfp-20180425182028.jpg'),
		array('name' => 'mint', 'cat' => array('aromate'), 'price' => 20, 'quantity' => 0, 'img' => 'https://www.grandfrais.com/userfiles/image/produit/big/grand-frais-menthe.png'),
		array('name' => 'coriander', 'cat' => array('aromate'), 'price' => 20, 'quantity' => 0, 'img' => 'https://www.grandfrais.com/userfiles/image/produit/big/gfp-20140505083435.jpg'),
	);
		foreach($products as $key => $row)
		{
			echo "~ <b>".$row["name"]."</b> ~<br><br>";
			echo "<div><img src =".$row["img"]." width=100px height=100px></div>";
			echo "<i>Price: ".$row["price"]." € / kg</i><br><br>";
		}
		if ($product['name'] == $_POST['name'])
		{
			$product['quantity'] = $_POST['quantity'];
		}
}

if ($_SESSION[basket])
{
	foreach ($_SESSION[basket] as $key => $elem)
	{	
		$multiply = $elem[price] * $elem[quantity];
		echo "<tr> <td class=\"basket\"><b>$elem[name]</b></td> <td class=\"basket\"> $price € </td> <td class=\"basket\"> $elem[price] € </td> <td class=\"basket\"> $elem[quantity]
		</td> </tr>";
		$total = $total + $multiply;
	}
	echo "<tr class=\"basket\"> <td>Total : $total € <td></tr></table><br /><br/>";

	if (!$_SESSION['loggued_on_user'])
		echo "<div>Please, connect on your account before to valid your order.</div>";
	else {
	echo "<img src=\"http://www.primheure.ch/new/images/stories/virtuemart/product/Fruits.jpg\" width=25px style=\"position:relative; top:7px; margin-right:10px\"> Valid your order: 
	<form style=\"font-size:20px\" method=\"post\"action=\"basket.php?value=validate&command=ok\">
	<input type=\"submit\" name=\"validate\" value=\"validate\"/>
	</form>";}
	echo "Empty your basket: 
	<form style=\"font-size:20px\" method=\"post\"action=\"basket.php?value=empty\">
	<input type=\"submit\" name=\"empty\" value=\"Vider le basket\"/>
	</form>";
}

if($_POST[value] === "empty")
{
	unset($_SESSION[basket]);
	echo "Your basket is empty !";
}
	if($_POST[value] === "validate" && $_SESSION[basket])
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
				echo "Order successfully sent ! Thank you and see you soon !";
				unset($_SESSION[basket]);
			}		
		}
	}
?>