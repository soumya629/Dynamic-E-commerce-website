<?php
require('adminconnection.php');

if (!isset($_SESSION['user'])) {
    header('Location: login.php'); // Redirect to login page
    exit();
}

// Check for database connection errors
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handling the quantity update
if (isset($_POST['quantity']) && isset($_POST['cart_id'])) {
    $quantity = intval($_POST['quantity']); // Ensure the quantity is an integer
    $cart_id = intval($_POST['cart_id']); // Ensure the cart ID is an integer

    // Update the cart table with the quantity
    $update_query = "UPDATE cart SET quantity = '$quantity' WHERE cart_id = '$cart_id'";

    if (mysqli_query($con, $update_query)) {
        // Redirect to the cart page after the update to avoid form resubmission issues
        header('Location: addtocart.php');
        exit();
    } else {
        die("Error updating record: " . mysqli_error($con));
    }
}

if (isset($_GET['product_id'])) {
    $product_id = intval($_GET['product_id']); // Ensure the ID is an integer
    $src = "SELECT * FROM newproduct WHERE p_id = $product_id";
    $srs = mysqli_query($con, $src) or die(mysqli_error($con));

    if (mysqli_num_rows($srs) > 0) {
        while ($data = mysqli_fetch_assoc($srs)) {
            $p_id = $data['p_id'];
            $p_name = $data['p_name'];
            $p_price = $data['p_price'];
            $p_img = $data['p_img'];
            $u_name = $_SESSION['user']['name'];
            $u_add = $_SESSION['user']['address'];
            $u_id= $_SESSION['user']['id'];
            $u_ph= $_SESSION['user']['phone'];
            
        }

        $sql = "INSERT INTO cart (cart_p_name, cart_p_price, cart_p_img, cart_p_id, cart_u_name, cart_u_phone, cart_u_id, quantity) 
                VALUES('$p_name', '$p_price', '$p_img', '$p_id', '$u_name', '$u_ph', '$u_id', 1)"; 
        $sql2 = mysqli_query($con, $sql) or die(mysqli_error($con));
    }
    

}

$src2 = "SELECT * FROM cart";
$src3 = mysqli_query($con, $src2) or die(mysqli_error($con));

// cart delete button
if (isset($_GET['remove_product'])) {
    $remove_id = intval($_GET['remove_product']);
    $delete_query = "DELETE FROM order_details WHERE o_c_p_id = $remove_id";
    mysqli_query($con, $delete_query) or die(mysqli_error($con));

    $delete_query = "DELETE FROM cart WHERE cart_id = $remove_id";
    mysqli_query($con, $delete_query) or die(mysqli_error($con));
    header('Location: addtocart.php');
    exit();
}





$i = $_SESSION['user']['id'];
$src2 = "SELECT * FROM cart WHERE cart_u_id ='$i' ";
$src3 = mysqli_query($con, $src2) or die(mysqli_error($con));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="style4.css">
    <title>Title</title>
</head>
   
<body>
    <div class="container">
        <h1 class="text-center text-light">ADD TO CART</h1>
        <a href="index.php" type="button" class="btn btn-before bg-light" style="width: 80px; height:30px">BACK</a>

        <?php
        if (mysqli_num_rows($src3) > 0) {
            ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>NAME</th>
                        <th>PRICE</th>
                        <th>IMAGE</th>
                        <th>QUANTITY</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($rec = mysqli_fetch_assoc($src3)) {
                        $cart_id = $rec['cart_id'];
                        ?>
                        <tr>
                            <td><?php echo htmlspecialchars($rec['cart_p_name']); ?></td>
                            <td><?php echo htmlspecialchars($rec['cart_p_price']); ?></td>
                            <td><img src="<?php echo htmlspecialchars($rec['cart_p_img']); ?>" alt="Product Image" width="50" height="50"></td>
                            <td>
                                <!-- Quantity form -->
                                <form method="post" action="">
                                    <input type="hidden" name="cart_id" value="<?php echo $cart_id; ?>">
                                    <input type="number" min="1" max="5" id="quantity" value="<?php echo $rec['quantity']; ?>" name="quantity">
                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                </form>
                            </td>
                            <td>
                                <a href="order.php?buy_product=<?php echo $rec['cart_id']; ?>" class="btn btn-primary btn-sm">Buy now</a>
                                <a href="?remove_product=<?php echo $rec['cart_id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
            <?php
        } else {
            echo "<p>No items in the cart</p>";
        }
        ?>
    </div>
</body>
</html>
