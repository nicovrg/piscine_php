<?PHP

print_r($_POST);
if ($_SESSION['basket'] == NULL)
{
//	$_SESSION['basket'][] = array();
//	$_SESSION['basket'] = $list_products;
//	if ($list_products) 
//	{
//		foreach ($list_products as $product)
//		{
//			$product['quantity'] == 0;
//		}
$products = array(
	array('name' => 'tomatoe', 'cat' => array('fruit', 'vegetable'), 'price' => 2, 'quantity' => 2, 'img' => 'https://www.grandfrais.com/userfiles/image/produit/big/grand-frais-tomates-de-saison.png'),
	array('name' => 'apple', 'cat' => array('fruit'), 'price' => 3, 'quantity' => 0, 'img' => 'https://www.grandfrais.com/userfiles/image/produit/big/grand-frais-pomme-royal-gala.png'),
	array('name' => 'apricot', 'cat' => array('fruit'), 'price' => 4, 'quantity' => 0, 'img' => 'https://www.grandfrais.com/userfiles/image/produit/big/gfp-20170606155720.jpg'),
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
	array('name' => 'coriander', 'cat' => array('aromate'), 'price' => 20, 'quantity' => 0, 'img' => 'https://www.grandfrais.com/userfiles/image/produit/big/gfp-20140505083435.jpg')
);
}

if ($_POST['name'] != NULL)
{
	if ($_POST['coriander'] != NULL)
		$save_coriander = $_POST['coriander'];
	foreach ($_SESSION['basket'] as &$product)
	{
		if ($product['name'] == $_POST['name'])
		{
			$product['quantity'] = $_POST['quantity'];
		}
	}
	$product[$coriander] = $save_coriander;
	header('Location: ../index.php');
	echo ("OK\n");
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
			$order = unserialize(file_get_contents("../htdocs/items/order"));
			$order = push_array($_SESSION['basket']);
			file_put_contents("../htdocs/items/order", serialize($order));
		}
	}
	else
		echo "<p>Votre panier est vide.</p>";
echo "</div>";
require('../menu/topbar.php');
?>

