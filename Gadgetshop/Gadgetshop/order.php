<?php
require('adminconnection.php');

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php'); // Redirect to login page
    exit();
}

// Check for database connection errors
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Insert product details into the order_details table when buying from the cart
if (isset($_GET['buy_product'])) {
    $product_id = intval($_GET['buy_product']); // Sanitize the product ID input

    // Fetch product details from the cart based on the cart_id
    $cart_query = "SELECT * FROM cart WHERE cart_id = $product_id";
    $cart_result = mysqli_query($con, $cart_query) or die(mysqli_error($con));

    if (mysqli_num_rows($cart_result) > 0) {
        $cart_data = mysqli_fetch_assoc($cart_result);
        $p_id = $cart_data['cart_id'];
        $p_name = $cart_data['cart_p_name'];
        $p_price = $cart_data['cart_p_price'];
        $p_img = $cart_data['cart_p_img'];
        $p_quantity = $cart_data['quantity']; // Get the quantity from the cart table

        // User details from session
        $u_name = $_SESSION['user']['name'];
        $u_add = $_SESSION['user']['address'];
        $u_id = $_SESSION['user']['id'];
        $u_ph = $_SESSION['user']['phone'];

        // Clean up price value to remove symbols and convert it into an integer
        $cleaned_amount = str_replace(['₹', ','], '', $p_price);
        $integer_amount = intval($cleaned_amount);
        $total = $integer_amount * $p_quantity; // Calculate the total price

        // Check if the product already exists in the order_details table
        $existing_order_query = "SELECT * FROM order_details WHERE o_c_p_id = '$p_id' AND o_u_id = '$u_id'";
        $existing_order_result = mysqli_query($con, $existing_order_query);

        if (mysqli_num_rows($existing_order_result) > 0) {
            // Update the existing order if the product already exists
            $update_order = "UPDATE order_details SET quantity = '$p_quantity', total = '$total' 
                             WHERE o_c_p_id = '$p_id' AND o_u_id = '$u_id'";
            mysqli_query($con, $update_order) or die(mysqli_error($con));
        } else {
            // Insert the product along with quantity into the order_details table
            $insert_order = "INSERT INTO order_details (o_p_name, o_p_price, o_p_img, o_c_p_id, o_u_name, o_u_id, u_address, o_u_phone, quantity, total) 
                             VALUES ('$p_name', '$p_price', '$p_img', '$p_id', '$u_name', '$u_id', '$u_add', '$u_ph', '$p_quantity', '$total')";
            mysqli_query($con, $insert_order) or die(mysqli_error($con));
        }

        // After successfully inserting into order_details, delete the item from the cart
        $delete_cart_item = "DELETE FROM cart WHERE cart_id = '$p_id'";
        if (!mysqli_query($con, $delete_cart_item)) {
            die("Error deleting cart item: " . mysqli_error($con));
        }

        // Redirect to the order page after the process is complete
        header('Location: order.php');
        exit();
    } else {
        echo "Product not found in the cart.";
    }
}

// Remove product from order_details table
if (isset($_GET['remove_order'])) {
    $remove_id = intval($_GET['remove_order']);
    $delete_query = "DELETE FROM order_details WHERE o_id = $remove_id";
    mysqli_query($con, $delete_query) or die(mysqli_error($con));
    header('Location: order.php');
    exit();
}

// Fetch the user's order details from the database
$i = $_SESSION['user']['id'];
$order_query = "SELECT * FROM order_details WHERE o_u_id = '$i'";
$order_result = mysqli_query($con, $order_query) or die(mysqli_error($con));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Order details page"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="style4.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>Order Details</title>
</head>
<body>
    <!-- Navbar Section -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="./logo.jpg" alt="Logo" style="height: 50px; width: 50px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="fa-solid fa-bars"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="productall.php">Product</a></li>
                    <li class="nav-item"><a class="nav-link active" href="contact.php">Contact</a></li>
                    <li class="nav-item"><a class="nav-link active" href="order.php">Order</a></li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-but"><a class="btn btn-outline-dark" href="addtocart.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
                </ul>
                <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i> <?php echo $_SESSION['user']['name']; ?></a>
                        <ul class="dropdown-menu dropdown-menu-end bg-danger" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="addressfrom.php">Settings</a></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Order Details Section -->
    <div class="container">
        <h1 class="text-center text-light">ORDER DETAILS</h1>
        <div class="row">
            <div class="col col-20">
                <div class="card">
                    <h4>NAME: <?php echo $_SESSION['user']['name']; ?></h4>
                    <h4>ADDRESS: <?php echo $_SESSION['user']['address']; ?></h4>
                    <h4>PHONE NUMBER: <?php echo $_SESSION['user']['phone']; ?></h4>
                </div>
            </div>
        </div>

        <?php if (mysqli_num_rows($order_result) > 0) { ?>
            <table class="table">
                <thead>
                    <tr style="color:black;">
                        <th>NAME</th>
                        <th>PRICE</th>
                        <th>TOTAL</th>
                        <th>QUANTITY</th>
                        <th>IMAGE</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($order_data = mysqli_fetch_assoc($order_result)) { ?>
                        <tr style="color:black;">
                            <td><?php echo $order_data['o_p_name']; ?></td>
                            <td><?php echo $order_data['o_p_price']; ?></td>
                            <td><?php echo $order_data['total']; ?></td>
                            <td><?php echo $order_data['quantity']; ?></td>
                            <td><img src="<?php echo $order_data['o_p_img']; ?>" alt="Product Image" width="50" height="50"></td>
                            <td><a href="?remove_order=<?php echo $order_data['o_id']; ?>" class="btn btn-danger btn-sm">Delete</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else {
            echo "<p>No items in the order</p>";
        } ?>
    </div>

    <!-- Footer Section -->
    <section class="info_section layout_padding2" style="background-color: rgb(0, 10, 15); width:1500px;margin-top:300px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3 info-col" style="margin-left: 200px;">
                    <div class="info_detail text-light">
                        <h4>About Us</h4>
                        <p class="text-light">OCEAN is a haven for gadget lovers. We curate great gadgets, offer personalized recommendations.</p>
                        <div class="info_social">
                            <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook"></i></a>
                            <a href="https://twitter.com/"><i class="fa-brands fa-twitter"></i></a>
                            <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
