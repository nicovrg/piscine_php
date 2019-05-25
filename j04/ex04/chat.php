<?php
session_start();
if (!($_SESSION['loggued_on_user']))
	echo ("ERROR\n");
else 
{
	date_default_timezone_set('Europe/Paris');
	if (file_exists('../htdocs/private') && file_exists('../htdocs/private/chat'))
	{
		$chat = unserialize(file_get_contents('../htdocs/private/chat'));
		foreach ($chat as $val)
			echo ("[".date('H:i',$val['time'])."]<b>".$val['login']."</b>:".$val['msg']."<br />");
	}
}
?>