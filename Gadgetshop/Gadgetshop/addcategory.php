<?php
require('adminconnection.php');

// Check connection
// Handle category addition with image upload
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_category'])) {
    $category_name = $con->real_escape_string($_POST['category_name']);
    
    // Allowed file types
    $allowed_types = array('jpg', 'JPG', 'PNG', 'png', 'jpeg', 'JPEG', 'webp', 'WEBP');

    // Handle image upload
    if (isset($_FILES['category_image']) && $_FILES['category_image']['error'] == 0) {
        $image = $_FILES['category_image'];
        $image_name = $image['name'];
        $image_tmp = $image['tmp_name'];
        $image_ext = pathinfo($image_name, PATHINFO_EXTENSION);

        if (in_array($image_ext, $allowed_types)) {
            $image_path = "uploads/" . $image_name;
            // Move the image to the uploads folder
            if (move_uploaded_file($image_tmp, $image_path)) {
                // Insert product details into the database
                $stmt = $con->prepare("INSERT INTO category(ct_name, ct_image) VALUES (?, ?)");
                $stmt->bind_param("ss", $category_name,  $image_path);
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
    $con->query("DELETE FROM category WHERE ctid = $product_id");
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
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">

    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="adminheader.html">ADMIN</a>
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
           
        <!-- Navigation and Sidebar Code -->
        
        <div id="layoutSidenav_content">
            <div class="container">
                <h1 class="mb-4">Admin Panel</h1>
                
                <!-- Add Category -->
                <div class="card">
                    <div class="card-header">
                        <h4>Add Category</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" name="category_name" class="form-control" placeholder="Category Name" required>
                            </div>
                            <div class="form-group">
                                <input type="file" name="category_image" class="form-control" accept="image/*" required>
                            </div>
                            <button type="submit" name="add_category" class="btn btn-primary">Add Category</button>
                        </form>
                    </div>
                </div>

                <!-- Existing Categories -->
                <div class="card">
                    <div class="card-header">
                        <h4>Manage Categories</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                        <?php
                            $products = $con->query("SELECT * FROM category");
                            while ($row = $products->fetch_assoc()) {
                                ?>
                                <img src="<?php echo $row['ct_image']; ?>" alt="Product Image" width="50" height="50">
                                <?php
                                echo "<li class='list-group-item d-flex justify-content-between align-items-center'>
                                    {$row['ct_name']} 
                                    <a href='?delete_product={$row['ctid']}' class='btn btn-danger btn-sm'>Delete</a>
                                </li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
                        </div></body>
</html>
