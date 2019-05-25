<div class="topbar">
	<p>Categories</p>
	<?php
		$categories = unserialize(file_get_contents("../htdocs/items/categories"));
		foreach ($categories as $category)
		{
			echo ("<div class="sidebar">$category</div>");
		}
	?>
	<a href="../login/login.php">Sign in</a>
	<a href="../login/logout.php">Sign out</a>
	<a href="../login/create_account.php">Create account</a>
	<a href="../login/edit_account.php">Edit account</a>
	<a href="basket.php" class="basket_navbar">Basket</a>  
</div>