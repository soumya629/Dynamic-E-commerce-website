<?php
require('adminconnection.php');

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_product'])) {
    $product_name = $con->real_escape_string($_POST['product_name']);
    $price = floatval($_POST['product_price']);
    $product_s_desc = $con->real_escape_string($_POST['product_s_desc']);
    $product_desc = $con->real_escape_string($_POST['product_desc']);
    $category_id = intval($_POST['category_id']);

    // Allowed file types
    $allowed_types = array('jpg', 'JPG', 'PNG', 'png', 'jpeg', 'JPEG', 'webp', 'WEBP');

    // Handle image upload
    if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] == 0) {
        $image = $_FILES['product_image'];
        $image_name = $image['name'];
        $image_tmp = $image['tmp_name'];
        $image_ext = pathinfo($image_name, PATHINFO_EXTENSION);

        if (in_array($image_ext, $allowed_types)) {
            $image_path = "uploads/" . $image_name;
            // Move the image to the uploads folder
            if (move_uploaded_file($image_tmp, $image_path)) {
                // Insert product details into the database
                $stmt = $con->prepare("INSERT INTO newproduct (p_name, p_price, p_s_desc, p_img, ct_id, p_desc) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssss", $product_name, $price, $product_s_desc, $image_path, $category_id, $product_desc);
                if ($stmt->execute()) {
                    echo "<div class='alert alert-success'>Product added successfully</div>";
                } else {
                    echo "<div class='alert alert-danger'>Failed to add product</div>";
                }
                $stmt->close();
            } else {
                echo "<div class='alert alert-danger'>Error uploading the image</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Invalid image file type</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Please upload a valid image</div>";
    }
}

// Handle product deletion
if (isset($_GET['delete_product'])) {
    $product_id = intval($_GET['delete_product']);
    $con->query("DELETE FROM newproduct WHERE p_id = $product_id");
    header('Location: adminheader.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Add Product</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">ADMIN</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link " id="navbarDropdown" href="#"aria-expanded="false"><i class="fas fa-user fa-fw"></i> <?php echo $_SESSION['admin']['name'];?> </a>
                   
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading"></div>
                            <a class="nav-link" href="adminheader.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Admin</div>
                            <a class="nav-link" href="addcategory.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Category
                            </a>
                            <a class="nav-link" href="addproduct.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                PRODUCT
                            </a>
                            <a class="nav-link" href="ordermanage.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                ORDER MANAGE
                            </a>
                            
                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $_SESSION['admin']['name'];?> 
                    </div>
                </nav>
            </div>
            
            <div id="layoutSidenav_content">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Product</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" name="product_name" class="form-control" placeholder="Product Name" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="product_price" class="form-control" placeholder="Product Price" required>
                            </div>
                            <div class="form-group">
                                <textarea name="product_s_desc" class="form-control" placeholder="Product Short Description" required></textarea>
                            </div>
                            <div class="form-group">
                                <textarea name="product_desc" class="form-control" placeholder="Product Full Description" required></textarea>
                            </div>
                            <div class="form-group">
                                <input type="file" name="product_image" class="form-control" accept="image/*" required>
                               
                            </div>
                            <div class="form-group">
                                <select name="category_id" class="form-control" required>
                                    <option value="">Select Category</option>
                                    <?php
                                    $categories = $con->query("SELECT * FROM category");
                                    while ($row = $categories->fetch_assoc()) {
                                        echo "<option value='{$row['ctid']}'>{$row['ct_name']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <button type="submit" name="add_product" class="btn btn-primary">Add Product</button>
                        </form>
                    </div>
                </div>

                <!-- Existing Products -->
                <div class="card">
                    <div class="card-header">
                        <h4>Manage Products</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <?php
                            $products = $con->query("SELECT * FROM newproduct");
                            while ($row = $products->fetch_assoc()) {
                                ?>
                                <img src="<?php echo $row['p_img']; ?>" alt="Product Image" width="50" height="50">
                                
                                
                                <?php
                                echo "<li class='list-group-item d-flex justify-content-between align-items-center'>
                                  {$row['p_name']} ({$row['p_price']}) 
                                  <a href='?delete_product={$row['p_id']}' class='btn btn-danger btn-sm'>Delete</a>
                                 </li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
           
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
