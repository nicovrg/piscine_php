<?PHP
session_start();

//$_SESSION['basket'] = array();



?>
<div id="cart">
<?PHP
	if ($_SESSION['basket'] != NULL)
	{
		foreach ($_SESSION['basket'] as $product)
		{
			echo '
			<div class="product">
				<p class="name">'.$product['name'].'</p>
				<a>
				</a>
			</div>
			';
		}
	}
	else
		echo "<p>Votre panier est vide.</p>";
?>
</div>
<form method="POST" action ="basket.php">
	<input type="hidden" name="name" value="<?PHP echo "$product['name']";?>" />
    Quantity: <input type="number" name="" value="<?PHP echo ""?>"/>
    <br />
    <input type="submit" name="submit" value="OK"/>
    </form>
</body>
</html>
