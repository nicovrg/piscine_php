<?php
//include("index.php");
include("op_basket.php");

if ($_GET[prod])
{
$dataprod = file_get_contents("../htdocs/items/products");
$products= unserialize($dataprod);

foreach ($products as $key => $value)
{
	if (($value[name])=== $_GET[prod])
	{	
		$nom_produit = ($value[name]);
		$prix_produit = ($value[price]);
		$image_produit = ($value[img]);
	}
}
?>
<html>
<div class="produit">
<img style="width:30vw;height:20vw" src= <?php echo "$image_produit"; ?>>
<br />
<b style="font-family: 'Just Another Hand', cursive; font-size:40px; letter-spacing:2px">Produit:</b> <span style="font-size:20px"><?php echo "$nom_produit"; ?></span>
<br />
<b style="font-family: 'Just Another Hand', cursive; font-size:40px; letter-spacing:2px">Prix :</b> <?php echo "$prix_produit €"; ?>
<br />
<br />
<form method="post" action="produit.php?<?php echo "prod=$nom_produit";?>">
<span> <img src="./imagesdebase/panier.png" height="40px" width="40px" style="position:relative; top:10px">
	<input type="number" min="1" max="10" name ="nbarticles" value="0" />
	<input type="submit" name="add" style="background:#dcf442" value="Ajouter au panier"/></span>
</form>

<?php
$value = $_POST["add"];
$qte = $_POST["nbarticles"];
if ($value === "Ajouter au panier")
{
	add($nom_produit, $qte, $prix_produit);
	echo "<script>setTimeout(\"location.href = 'produit.php?prod=$nom_produit';\", 100);</script>";
}
?>
<?php 
}
else 
{
	echo "<br>Page non disponible";
	echo "<br /><a href=\"index.php\" class=\"button\" style=\"position:relative; top:10px; left: -10px \" > Retour a la page d'accueil </a>";
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