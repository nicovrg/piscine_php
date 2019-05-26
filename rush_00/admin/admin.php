<?PHP
session_start();
if ($_SESSION['loggued_on_user'])
{
	$authorize = 0;
	$users = unserialize(file_get_contents("../htdocs/private/passwd"));
    print_r ($users);
    foreach ($users as $user)
    {
        print "one".$user['admin']."1\n";
        print "two".$user['name']."2\n";
        print "three".$_SESSION['loggued_on_user']."3\n";
		if ($user['admin'] == true && $user['name'] == $_SESSION['loggued_on_user'])
			$authorize = 1;
    }
	if ($authorize == 1)
	{
        echo ('<!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8" />
            <link rel="stylesheet" type="text/css" href="../style/topbar.css">
            <link rel="stylesheet" type="text/css" href="../style/admin.css">
        </head>
        <body>
            <h3>Categories</h3><br>
            <a href="add_category.php">Add Categories</a><br>
            <a href="remove_category.php">Remove Categories</a><br>
            <a href="modif_category.php">Edit Categories</a><br>
            <h3>Products</h3><br>
            <a href="add_product.php">Add Product</a><br>
            <a href="remove_product.php">Remove Product</a><br>
            <a href="modif_product.php">Edit Product</a><br>
            <h3>Users</h3><br>
            <a href="add_user.php">Add User</a><br>
            <a href="remove_user.php">Remove User</a><br>
            <a href="modif_user.php">Edit User </a><br>
        </body>
        </html>');
        require('../menu/topbar.php');
	}
}
?>
