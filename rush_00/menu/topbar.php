<!DOCTYPE html>
  <html>
    <head>
	      <meta name="viewport" content="width=device-width, initial-scale=1">
	      <link rel="stylesheet" type="text/css" href="../style/topbar.css">
	      <link rel="stylesheet" type="text/css" href="../style/mainbar.css">
	      <link rel="stylesheet" type="text/css" href="../style/sidebar.css">
	      <link rel="stylesheet" type="text/css" href="../style/basketbar.css">
      </head>
      <body>
<div class="topbar">
  <?php
    if (!isset($_SESSION["loggued_on_user"]))
      echo '<a href="../login/login.php">Sign in</a>
            <a href="../login/create_account.php">Create account</a>';
    else if (isset($_SESSION["loggued_on_user"]))
      echo '<a href="../login/logout.php">Sign out</a>
            <a href="../login/edit_account.php">Edit account</a>
            <a href="../admin/admin.php" class="admin_navbar">Admin</a>';
  ?>
  <a href="../basket/order.php">Basket</a>  
  <a href="../index.php">Home</a>  
</div>