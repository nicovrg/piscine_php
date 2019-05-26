<?PHP
session_start();
if ($_SESSION['loggued_on_user'] != "" || $_SESSION['loggued_on_user'] != "")
{
	if (!file_exists("../htdocs/order"))
		mkdir("../htdocs/order");
	if (!file_exists("../htdocs/order"))
		mkdir("../htdocs/order");
	if (!file_exists("../htdocs/order/".$_SESSION['loggued_on_user']))
		file_put_contents("../htdocs/order/".$_SESSION['loggued_on_user'], "");
	if (file_exists("../htdocs/order/".$_SESSION['loggued_on_user']))
		$orders = unserialize(file_get_contents("../htdocs/order/".$_SESSION['loggued_on_user']));
	if ($orders) 
	{
		// foreach ($orders as $value)
		// {
		// 	if ($value['login'] == $user["login"])
		// 	{
		// 		echo ("ERROR\n");
		// 		return (0);
			// }
		// }
	}
	// $orders[] = $user;
	// header('Location: ../index.php');
	// file_put_contents("../order/private/passwd", serialize($order));
	// echo ("OK\n");
}
require('../menu/topbar.php');
// require('sidebar/sidebar.php');
?>