<?PHP
print_r($_POST);

//include ("../index.php");
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
print_r ($products);

if (!$_SESSION['basket'])
{
	$_SESSION['basket'] = array(
		"foo" => "bar",
	);
	foreach ($products as $key)
	{
		$_SESSION['basket'] = array_push($_SESSION['basket'], $products[$key]);
	}
	$_SESSION['basket'] = array_reverse($_SESSION['basket']);
}


{
	echo '<div id="tryhard">';
	if ($_SESSION['basket'])
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
}



//{
	//foreach {	
	//	print_r($product[]);
	//	$name = ($value[name]);
	//	echo "$value[name]";
	//	$price = ($value[price]);
	//	$img = ($value[img]);
	//}
	//foreach ($value as $product)
	//{	
		//print_r($product[]);
	//	$name = ($product[name]);
	//	echo "$value[name]";
	//	$price = ($product[price]);
	//	$img = ($product[img]);
//	}
//}

if ($_SESSION['basket'] == NULL)
{
	echo "<p>Votre panier est vide.</p>";
}
//	$_SESSION['basket'][] = array();
//	$_SESSION['basket'] = $list_products;
//	if ($list_products) 
//	{
//		foreach ($list_products as $product)
//		{
//			$product['quantity'] == 0;
//		}

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
	if ($_SESSION['basket'])
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

	if ($_SESSION[basket])
	{
		foreach ($_SESSION[basket] as $key => $elem)
		{
			$total_qty = $total_qty + ($elem[quantity]);
			$total_price = $total_price + ($elem[price]);
		}
		$order = unserialize(file_get_contents("../htdocs/items/order"));
		$order = push_array($_SESSION['basket']);
		file_put_contents("../htdocs/items/order", serialize($order));
	}
echo "</div>";
require('../menu/topbar.php');
?>

