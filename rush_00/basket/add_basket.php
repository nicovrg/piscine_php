<?php
session_start();
if ($_POST)
{
	if (!file_exists("../htdocs"))
		mkdir("../htdocs");
	if (!file_exists("../htdocs/items"))
		mkdir("../htdocs/items");
	if (!file_exists("../htdocs/items/basket"))
		file_put_contents("../htdocs/items/basket", "");
	if ($_POST['name'] && $_POST['submit'] == "add to cart")
	{
		$basket = unserialize(file_get_contents("../htdocs/items/basket"));
		$basket[] = $_POST['name'];
		file_put_contents("../htdocs/items/basket", serialize($basket));	
		header('Location: ../index.php');
		print_r ($basket);
	}
	else
		$erno = '<script>alert("All fields are required");</script>';
}
require('../menu/topbar.php');
require('../menu/mainbar.php');
?>
<?php
if (isset($erno)) 
	echo $erno;
?>