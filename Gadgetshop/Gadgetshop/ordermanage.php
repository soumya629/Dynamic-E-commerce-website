<?php
require('adminconnection.php');
$src2 = "SELECT * FROM order_details";
$src3 = mysqli_query($con, $src2) or die(mysqli_error($con));
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
                        <div class="small">Logged in as: <br>
                            <?php echo $_SESSION['admin']['name'];?> </div>
                        
                    </div>
                </nav>
            </div>
            
        <!-- Navigation and Sidebar Code -->

    <div id="layoutSidenav_content">
        <div class="container">
            <h1 class="text-center text-dark">ORDER DETAILS</h1>
            <?php if (mysqli_num_rows($src3) > 0) { ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>NAME</th>
                            <th>PRICE</th>
                            <th> QUANTITY </th>
                            <th>TOTAL PRICE</th>
                            <th>IMAGE</th>
                            <th>USER NAME</th>
                            <th>PHONE</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($rec1 = mysqli_fetch_assoc($src3)) { ?>
                            <tr>
                                <td><?php echo $rec1['o_p_name']; ?></td>
                                <td><?php echo $rec1['o_p_price']; ?></td>
                                <td><?php echo $rec1['quantity']; ?></td>
                                <td><?php echo $rec1['total']; ?></td>
                                <td><img src="<?php echo $rec1['o_p_img']; ?>" alt="Product Image" width="50" height="50"></td>
                                <td><?php echo $rec1['o_u_name']; ?></td>
                                <td><?php echo $rec1['o_u_phone']; ?></td>
                                <td><a href="?remove_order=<?php echo $rec1['o_id']; ?>" class="btn btn-danger btn-sm">Delete</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } else {
                echo "<p>No items in the order</p>";
            } ?>
        </div>
    </div>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>
