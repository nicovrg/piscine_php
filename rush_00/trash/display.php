<?php
//include("index.php");

if ($_POST[prod])
{
$dataprod = file_get_contents("../htdocs/items/products");
$products= unserialize($dataprod);

foreach ($products as $key => $value)
{
	if (($value[name]) === $_POST[prod])
	{	
		$nom_produit = ($value[name]);
		$prix_produit = ($value[price]);
		$image_produit = ($value[img]);
	}
}
?>
<html>
<div></div>
<img style="width:30vw;height:20vw" src= <?php echo "$img"; ?>>
<br />
<b style="font-family: 'Just Another Hand', cursive; font-size:40px; letter-spacing:2px">product:</b> <span style="font-size:20px"><?php echo "$name"; ?></span>
<br />
<b style="font-family: 'Just Another Hand', cursive; font-size:40px; letter-spacing:2px">price :</b> <?php echo "$price €"; ?>
<br />
<br />
<form method="post" action="display.php?<?php echo "prod=$name";?>">
<span> <img src="./imagesdebase/panier.png" height="40px" width="40px" style="position:relative; top:10px">
	<input type="number" min="1" max="12" name ="quantity" value="0" />
	<input type="submit" name="add" style="background:#dcf442" value="Add to the basket"/></span>
</form>

<?php
$value = $_POST["add"];
$quantity = $_POST["quantity"];
include("op_basket.php");
if ($value === "Add to the basket")
{
	ft_add($name, $quantity, $price);
	echo "<script>setTimeout(\"location.href = 'produit.php?prod=$nom_produit';\", 100);</script>";
}
?>
<?php 
}
else 
{
	echo "<br>Web page not available";
	echo "<br /><a href=\"../index.php\" class=\"button\" style=\"position:relative; top:10px; left: -10px \" >Go to main screen</a>";
}









// <p>add item:</p>
// 	<form action="add_item.php" method="POST">
// 		Name: <input type="text" name="name" value="" required/><br/>
// 		Category: <input type="text" name="category" value="" required/><br/>
// 		Price: <input type="text" name="price" value="" required/><br/>
// 		Image: <input type="text" name="image" value="" required/><br/>
// 		<input type="submit" name="submit" value="OK"/>
// 	</form>



?>