<?PHP
print_r($_POST);
if ($_SESSION['basket'] == NULL)
{
	$_SESSION['basket'] = array(
		array('name' => 'tomate', 'cat' => array('fruit', 'vegetable'), 'price' => 2, 'img' => 'url/imgur', 'quantity' => 5),
		array('name' => 'pomme', 'cat' => array('fruit'), 'price' => 3, 'img' => 'url/imgur', 'quantity' => 1),
		array('name' => 'abricot', 'cat' => array('fruit'), 'price' => 4, 'img' => 'https://www.grandfrais.com/userfiles/image/produit/big/gfp-20170606155720.jpg', 'quantity' => 1),
		array('name' => 'romarin', 'cat' => array('aromate'), 'price' => 1, 'img' => 'url/imgur', 'quantity' => 1),
		array('name' => 'haricot', 'cat' => array('vegetable'), 'price' => 3, 'img' => 'url/imgur', 'quantity' => 1),
		array('name' => 'orange', 'cat' => array('fruit'), 'price' => 2, 'img' => 'url/imgur', 'quantity' => 1),
		array('name' => 'champignon', 'cat' => array('others'), 'price' => 5, 'img' => 'url/imgur', 'quantity' => 1),
		array('name' => 'truffe', 'cat' => array('others'), 'price' => 55, 'img' => 'url/imgur', 'quantity' => 1),
		array('name' => 'artichaud', 'cat' => array('others'), 'price' => 1, 'img' => 'url/imgur', 'quantity' => 1),
		array('name' => 'cerise', 'cat' => array('fruit'), 'price' => 10, 'img' => 'https://www.grandfrais.com/userfiles/image/produit/big/gfp-20170606155720.jpg', 'quantity' => 1),
		array('name' => 'framboise', 'cat' => array('fruit'), 'price' => 1, 'img' => 'url/imgur', 'quantity' => 1),
		array('name' => 'thin', 'cat' => array('aromate'), 'price' => 3, 'img' => 'url/imgur', 'quantity' => 1),
		array('name' => 'thieul', 'cat' => array('aromate'), 'price' => 2, 'img' => 'url/imgur', 'quantity' => 1)
	);
}

if ($_POST['name'] != NULL)
{
	foreach ($_SESSION['basket'] as &$product)
	{
		if ($product['name'] == $_POST['name'])
		{
			echo 'prout';
			$product['quantity'] = $_POST['quantity'];
			print_r($product);
		}
		unset($product['name']);
	}
}
echo '<div id="cart">';
	if ($_SESSION['basket'] != NULL)
	{
		foreach ($_SESSION['basket'] as $product)
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
	}
	else
		echo "<p>Votre panier est vide.</p>";
echo "</div>";
require('../menu/topbar.php');
?>

