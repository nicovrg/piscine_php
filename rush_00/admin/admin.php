<?PHP
session_start();
// print $_SESSION['loggued_on_user'];
// print $_SESSION['admin'];
if ($_SESSION['loggued_on_user'] && $_SESSION['admin'] == 1)
{
	$users = unserialize(file_get_contents("../htdocs/private/passwd"));
    require('../menu/topbar.php');
    ?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8" />
            <link rel="stylesheet" type="text/css" href="../style/topbar.css">
            <link rel="stylesheet" type="text/css" href="../style/admin.css">
        </head>
        <body>
            <div class="general">
                <div class="user">
                    <h3>Users</h3><br>
                    <a href="add_user.php">Add User</a><br>
                    <a href="edit_user.php">Edit User </a><br>
                    <a href="remove_user.php">Remove User</a><br>
                </div>
                <div class="category">    
                    <h3>Categories</h3><br>
                    <a href="add_category.php">Add Categories</a><br>
                    <a href="edit_category.php">Edit Categories</a><br>
                    <a href="remove_category.php">Remove Categories</a><br>
                </div>
                <div class="product">
                    <h3>Products</h3><br>
                    <a href="add_product.php">Add Product</a><br>
                    <a href="edit_product.php">Edit Product</a><br>
                    <a href="remove_product.php">Remove Product</a><br>
                </div>    
            </div>
        </body>
        </html>
        <?
}
// else if (!$_SESSION['loggued_on_user'] || $_SESSION['admin'] != 1)
//     print 1 ;
// ?>
<!-- //     <!DOCTYPE html>
//     <html>
//     <head>
//         <meta charset="utf-8" />
//         <link rel="stylesheet" type="text/css" href="../style/topbar.css">
//         <link rel="stylesheet" type="text/css" href="../style/admin.css">
//     </head>
//     <body>
//     <p>You're not supposed to be here</p>
//     </body>
//     </html>
    
     -->