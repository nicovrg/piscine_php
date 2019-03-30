<?php 
session_start ();
if ($_GET['login'] && $_GET['passwd'] && $_GET['submit'] && $_GET['submit'] == "OK")
{
    $_SESSION['login'] = $_GET['login']; 
    $_SESSION['passwd'] = $_GET['passwd'];
}
?>
<html><body>
<form action="index.php" method="get">
    Identifiant: <input type="text" name="login" placeholder="login" value="<?php echo $_SESSION['login'] ?>" />
    <br />
    Mot de passe: <input type="text" name="passwd" placeholder="passwd" value="<?php echo $_SESSION['passwd']?>" />
    <input type="submit">
</form>
</body></html>
