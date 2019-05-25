<?php
session_start();
if (!($_SESSION['loggued_on_user']))
	echo ("ERROR\n");
else
{
	if ($_POST['msg']) 
	{
		if (!file_exists('../htdocs/private')) 
			mkdir("../htdocs/private");
		if (!file_exists('../htdocs/private/chat')) 
			file_put_contents('../htdocs/private/chat', null);
		$chat = unserialize(file_get_contents('../htdocs/private/chat'));
		$fp = fopen('../htdocs/private/chat', "w");
		flock($fp, LOCK_EX);
		$tmp['login'] = $_SESSION['loggued_on_user'];
		$tmp['time'] = time();
		$tmp['msg'] = $_POST['msg'];
		$chat[] = $tmp;
		file_put_contents('../htdocs/private/chat', serialize($chat));
		fclose($fp);
	}
}
?>
<html>
<head>
	<script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
</head>
<body>
	<form action="speak.php" method="POST">
		<input type="text" name="msg" value=""/>
		<input type="submit" name="submit" value="Send"/>
	</form>
</body>