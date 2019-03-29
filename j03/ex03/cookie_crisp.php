<?php
    if ($_GET === null || $_GET['name' === null])
        return (0);
    else if ($_GET['action'] === "set" && $_GET['value'] !== null)
        setcookie ($_GET['name'], $_GET['value'], time() + 3600 * 24 * 365, null, null, false, true);
    else if ($_GET['action'] === "get" && $_COOKIE[$_GET['name']] !== null)
        echo ($_COOKIE[$_GET['name']]."\n");
    else if ($_GET['action'] === "del")        
        setcookie ($_GET['name'], null, time() + 3600 * 24 * 365, null, null, false, true);
?>