<?php
require('adminconnection.php');

$sql = "SELECT * FROM category"; 
$sql2 = mysqli_query($con, $sql);
$rowcount = mysqli_num_rows($sql2);

$sql3 = "SELECT * FROM newproduct WHERE p_id >=30 AND p_id<=33; "; 
$sql4 = mysqli_query($con,$sql3);
$rowcount1 = mysqli_num_rows($sql2);

$sql5 = "SELECT * FROM newproduct WHERE p_id >=35 AND p_id<=38; "; 
$sql6 = mysqli_query($con,$sql5);
$rowcount1 = mysqli_num_rows($sql2);


$searchResults = [];
if (isset($_POST['search'])) {
    $searchQuery = mysqli_real_escape_string($con, $_POST['text']);
    $query1 = "SELECT * FROM category WHERE ct_name LIKE '%$searchQuery%'";
    $run = mysqli_query($con, $query1);

    if (mysqli_num_rows($run) > 0) {
        while ($data = mysqli_fetch_assoc($run)) {
            $searchResults[] = $data;

           
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="style3.css">
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg ">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="./logo.jpg" alt="Logo" style="height: 50px; width: 50px;"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa-solid fa-bars"></i>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active link-outline-light" href="Productall.php">Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="contact.php">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="order.php">Order</a>
          </li>
        </ul>
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-6 my-md-0" method="post" action="search.php">
    <div class="input-group">
        <input class="form-control" type="text" placeholder=" please enter category" aria-label="Search for..." name="text" />
        <button name="search" class="btn btn-primary" type="submit">
            <i class="fas fa-search"></i>
        </button>
    </div>
</form>
        
            <a class="btn btn-outline-dark" href="addtocart.php" ><i class="fa-solid fa-cart-shopping"></i></a>
        
       
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown " style="color:white;">
                    <i class="fas fa-user fa-fw">
                    </i> 
                    <?php echo $_SESSION['user']['name'];?>
                    
                   
                </li>
            </ul>
      </div>
    </div>
  </nav>


    <div class="container mt-4">
        
        <div class="row">
            <?php if (empty($searchResults)) { ?>
                <div class="alert alert-warning">No categories found.</div>
            <?php } else {
                foreach ($searchResults as $category) { ?>
                    <div class="row " >
                        <div class="card">
                            
                            <div class="card-body" style="display:flex;">
                                <h3 class="card-title" style=" margin-top:5%;"><?php echo $category['ct_name']; ?></h3>
                                <a href="product.php?id=<?php echo $category['ctid']; ?>" class="btn btn-primary" style="margin-left:70%;  margin-top:5%;">View Details</a>
                            </div>
                        </div>
                    </div>

                    
                <?php }
            } ?>
        </div>
    </div>

    

  
    <!-- cards starting with 4 columns -->

    <div class="container" style="padding:50px;">
      <div class="row">
        <!-- Display categories in 4 columns -->
         <h3 style="color:white;">BEST DEAL FOR YOU </h3>
        <?php
        while ($data1 = mysqli_fetch_assoc($sql4)) {
        ?>
          <div class="col-md-3 mb-3">
            <div class="card custom_card">
              <img class="card-img-top" src="<?php echo $data1['p_img']; ?>" alt="" style="height: 22vh;">
              <div class="card-body">
                <h5 class="card-title"><?php echo $data1['p_name']; ?></h5>
                <a href="addtocart.php?product_id=<?php echo $data1['p_id'] ?>" class="btn btn-primary">ADD TO CART</a>
               
                
              </div>
            </div>
          </div>
        <?php
        }
        ?>
         <?php
        while ($data1 = mysqli_fetch_assoc($sql6)) {
        ?>
          <div class="col-md-3 mb-3">
            <div class="card custom_card">
              <img class="card-img-top" src="<?php echo $data1['p_img']; ?>" alt="" style="height: 22vh;">
              <div class="card-body">
                <h5 class="card-title"><?php echo $data1['p_name']; ?></h5>
                <a href="addtocart.php?product_id=<?php echo $data1['p_id'] ?>" class="btn btn-primary">ADD TO CART</a>
               
                
              </div>
            </div>
          </div>
        <?php
        }
        ?>
      </div>
    </div>


   
    <section class="info_section layout_padding2 "style="background-color: rgb(0, 10, 15); width:1500px;margin-top:-20px; " >
    <div class="container ">
      <div class="row">
        <div class="col-md-6 col-lg-3 info-col"style="margin-left: 200px;">
          <div class="info_detail text-light" >
            <h4>
              About Us
            </h4>
            <p class="text-light">
              OCEAN is a haven for gadegt lovers. We curate great gadegts, offer personalized recommendations. 
            </p>
            <div class="info_social">
              <a href="https://www.facebook.com/">
              <i class="fa-brands fa-facebook"></i></i>
              </a>
              <a href="https://x.com/">
              <i class="fa-brands fa-twitter"></i>
              </a>
              <a href="https://www.linkedin.com/">
              <i class="fa-brands fa-linkedin"></i>
              </a>
              <a href="https://www.instagram.com/">
              <i class="fa-brands fa-instagram"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 info-col">
          <div class="info_contact text-light">
            <h4>
              Address
            </h4>
            <div class="contact_link_box">
              
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Call +91 12345 67894
                </span>
              </a> <br>
              <a href="https://mail.google.com/mail">
              <i class="fa-solid fa-envelope"></i>
                <span>
                  demo@gmail.com
                </span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 info-col">
          <div class="info_contact text-light">
            <h4>
              News letter
            </h4>
            <form action="#">
              <input type="text" placeholder="Enter email" />
              <button type="submit" class="bg-danger">
                Subscribe
              </button>
            </form>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 info-col">
          <div class="map_container">
            <div class="map">
              <div id="googleMap"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


    
 
         
</body>
</html>
