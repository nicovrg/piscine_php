<?php
require_once('auth.php');
session_start();
if (!($_POST['login'] && $_POST['passwd'] && $_POST['submit'] == "OK" && auth($_POST['login'], $_POST['passwd'])))
{
	$_SESSION['loggued_on_user'] = "";
	header('Location: index.html');
	echo ("ERROR\n");
}
else 
{
	$_SESSION['loggued_on_user'] = $_POST['login'];
	echo ('<iframe name="chat" src="chat.php" width="100%" height="550px"></iframe><iframe name="speak" src="speak.php" width="100%" height="50px"></iframe>');
}
?>
