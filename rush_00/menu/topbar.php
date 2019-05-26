<?php
  // echo $_SESSION["loggued_on_user"]."\n";
?>
<div class="topbar">
  <?php
    // print $_SESSION["loggued_on_user"];
    if (!isset($_SESSION["loggued_on_user"]))
      echo '<a href="../login/login.php">Sign in</a>
            <a href="../login/create_account.php">Create account</a>';
    else if (isset($_SESSION["loggued_on_user"]))
      echo '<a href="../login/logout.php">Sign out</a>
            <a href="../login/edit_account.php">Edit account</a>
            <a href="../admin/admin.php" class="admin_navbar">Admin</a>';
  ?>
  <a href="../basket/basket.php">Basket</a>  
  <a href="../index.php">Home</a>  
</div>