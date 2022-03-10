<!-- Database used is hvav-modified-1.sql !-->
<?php 
    include 'classes/session.classes.php';
    include 'includes/flagInit.php';
    session::start();
    resetFlags();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <section>

<main> 
    <?php //test
        //session::display();
        if (session::get("loggedInID")) {
            echo '<p>You are logged in</p>';
        } else {
            echo '<p>You are logged out</p>';
        }
    ?>
</main>

            <div>
                <h4>Add User</h4>
                <?php
                    if ($_SESSION["addUserFlag"] = 1){
                        echo "<h4 style = 'color: red; 
                        '>{$_SESSION["addUserErrorMsg"]}</h4>
                        ";
                    }
                ?>
                    <form action="includes/signup.inc.php" method="post">
                        <input type="text" name="employee_ID" placeholder="Employee ID">
                        <input type="password" name="pwd" placeholder="Password">
                        <input type="password" name="confirmpwd" placeholder="Confirm Password">
                        <input type="text" name="email" placeholder="E-mail">
                        <input type="text" name="first_name" placeholder="First Name">
                        <input type="text" name="last_name" placeholder="Last Name">
                        <input type="text" name="phone_number" placeholder="Phone Number">
                        <input type="text" name="employee_type" placeholder="Employee Type">
                        <br>
                        <button type="submit" name="submit">Add User</button>
                    </form>
            </div>
            <div>
                <h4>LOGIN</h4>
                <?php echo "<h4 style = 'color: red;'>{$_SESSION["loginErrorMsg"]}</h4>";?>
                <form action="includes/login.inc.php" method="post">
                        <input type="text" name="employee_ID" placeholder="Employee ID">
                        <input type="password" name="pwd" placeholder="Password">
                        <br>
                        <button type="submit" name="submit">LOGIN</button>
                </form>
            </div>
            <div>
                <h4>Log Out</h4>
                <form action="includes/logout.inc.php" method="post">
                        <button type="submit" name="submit">Log Out</button>
                </form>
            </div>
            <div>
                <h4>Remove User</h4>
                <?php echo "<h4 style = 'color: red;'>{$_SESSION["removeUserErrorMsg"]}</h4>";?>
                <form action="includes/removeUser.inc.php" method="post">
                        <input type="text" name="employee_ID" placeholder="Employee ID">
                        <br>
                        <button type="submit" name="submit">REMOVE USER</button>
                </form>
            </div>
            <div>
                <h4>Add Product</h4>
                    <form action="includes/addProduct.inc.php" method="post">
                        <input type="text" name="product_ID" placeholder="product ID">
                        <input type="text" name="product_type" placeholder="product_type">
                        <input type="text" name="name" placeholder="name">
                        <input type="text" name="description" placeholder="description">
                        <input type="text" name="model_no" placeholder="model_no">
                        <input type="text" name="regular_price" placeholder="regular_price">
                        <input type="text" name="quantity_in_stock" placeholder="quantity_in_stock">
                        <br>
                        <button type="submit" name="submit">Add Product</button>
                    </form>
            </div>
            <div>
                <h4>Remove Product</h4>
                <?php echo "<h4 style = 'color: red;'>{$_SESSION["removeProductErrorMsg"]}</h4>";?>
                <form action="includes/removeProduct.inc.php" method="post">
                        <input type="text" name="product_ID" placeholder="Product ID">
                        <br>
                        <button type="submit" name="submit">REMOVE PRODUCT</button>
                </form>
            </div>
            <div>
                <h4>Update Product</h4>
                <?php echo "<h4 style = 'color: red;'>{$_SESSION["updateProductErrorMsg"]}</h4>";?>
                    <form action="includes/updateProduct.inc.php" method="post">
                        <input type="text" name="product_ID" placeholder="product ID">
                        <input type="text" name="product_type" placeholder="product_type">
                        <input type="text" name="name" placeholder="name">
                        <input type="text" name="description" placeholder="description">
                        <input type="text" name="model_no" placeholder="model_no">
                        <input type="text" name="regular_price" placeholder="regular_price">
                        <input type="text" name="quantity_in_stock" placeholder="quantity_in_stock">
                        <br>
                        <button type="submit" name="submit">Update Product</button>
                    </form>
            </div>
        </section>
    </body>
</html>

