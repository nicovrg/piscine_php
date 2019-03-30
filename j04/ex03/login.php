<?php
    include("auth.php");
    session_start();
    if (!$_GET['login'] && !$_GET['passwd'])
        return (0);
    if (auth($_GET['login'], $_GET['passwd']))
    {
        $_SESSION['loggued_on_user'] = $_GET['login'];
        echo ("OK\n");
        return (0);    
    } 
    else
        echo ("ERROR\n");
    return (0);
?>
