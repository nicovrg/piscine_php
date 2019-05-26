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
	if ($_SESSION['loggued_on_user'])
	{
		$basket = unserialize(file_get_contents("../htdocs/items/basket"));
		foreach($basket as $product => $value) 
		{
			?><div>
				<?=$value["name"]?>
				<?=$value["price"]." € / kg"?>
			</div><?
		}
		header('Location: ../index.php');
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