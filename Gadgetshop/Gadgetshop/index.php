
<?php
require('adminconnection.php');

// Check if the user is logged in



$sql = "SELECT * FROM category"; 
$sql2 = mysqli_query($con, $sql);
$rowcount = mysqli_num_rows($sql2);



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body>
  <!-- navbar start -->
  <nav class="navbar navbar-expand-lg ">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="./logo.jpg" alt="Logo" style="height: 50px; width: 50px;"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="productall.php">Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="contact.php">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="order.php">Order</a>
          </li>
        </ul>
        
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0"><?php
        if (!isset($_SESSION['user'])) { ?>
          <li class="nav-but">
            <a class="btn btn-outline-dark" href="registration.php">REGISTRATION</a>
          </li>
          <li class="nav-but">
            <a class="btn btn-outline-dark" href="login.php">Login</a>
          </li>
          <?php
        }
        
        if (isset($_SESSION['user'])) { ?>
         <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-6 my-md-0" method="post" action="search.php">
    <div class="input-group">
        <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." name="text" />
        <button name="search" class="btn btn-primary" type="submit">
            <i class="fas fa-search"></i>
        </button>
    </div>
</form>

          <li class="nav-but">
            <a class="btn btn-outline-dark" href="logout.php">Logout</a>
          </li>
          
          <li class="nav-but"><a class="btn btn-outline-dark" href="addtocart.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
          <?php
        }
        ?>
         
        </ul>
      </div>
    </div>
  </nav>

  <!-- content of the protected page -->
  <!-- Continue your content here -->
<?php
?>



  <!-- navbar end -->
  <!-- carousel start -->
  <div class="carousel-wrapper">
    <div class="carousel mt-112px">
      <div id="carouselExampleIndicators" class="carousel slide carousel1" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="./images/banner1.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item active">
            <img src="./images/banner2.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item active">
            <img src="./images/banner3.jpg" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </div>

  <!-- carousel end -->

  <div class="card-wrapper">
    <div class="catagorie" style="text-align: center; margin-bottom:10px; font-weight: 100; color: white;">
      <h2><b>CATAGORIES</b></h2>
    </div>

    <!-- cards starting with 4 columns -->

    <div class="container" style="padding:50px;">
      <div class="row">
        <!-- Display categories in 4 columns -->
        <?php
        while ($data = mysqli_fetch_assoc($sql2)) {
        ?>
          <div class="col-md-3 mb-3">
            <div class="card custom_card">
              <img class="card-img-top" src="<?php echo $data['ct_image']; ?>" alt="" style="height: 42vh;">
              <div class="card-body">
                <h5 class="card-title"><?php echo $data['ct_name']; ?></h5>
                <a href="product.php?id=<?php echo $data['ctid']; ?>" class="btn btn-primary">View Details</a>
              </div>
            </div>
          </div>
        <?php
        }
        ?>
      </div>
    </div>
  </div>

  
  <!-- card end -->
  <!-- galery start -->

  <div class="gallery-container">
    <div class="left-text">
      <h1 style="text-align: center;"> BEST DEAL ON OSEAN</h1>
      <p> Prime Members can enjoy unlimited Free Shipping, early access to Lightning Deals and more. Explore deals on top categories like camera, mobile & more on OSEAN today.
        <br>
       Deals on Laptops & more Top Brands
       <br>
       Epic Smartphone Deals!
       Up to 40% off Up to 12 Months No Cost EMI</p>
    </div>
    <div class="img-gallery">
      <div class="img-box row2"
        style=" background-image: url(./image/laptop/Lenovo6.webp); background-color: rgb(254, 250, 250);"></div>
      <div class="img-box col2"
        style=" background-image: url(./image/Hometheater/Audio-Player-2.jpg); background-color: rgb(39, 238, 13);"> </div>
      <div class="img-box"
        style=" background-image: url(./image/Headphone/e1.jpg); background-color: rgb(106, 10, 241);"> </div>
      <div class="img-box row2"
        style=" background-image: url(./image/Headphone/e5.jpg); background-color: rgb(235, 11, 11);"> </div>
      <div class="img-box col2"
        style=" background-image: url(./image/Tv/banner4.jpg); background-color: rgb(14, 152, 237);"> </div>
      <div class="img-box"
        style=" background-image: url(./image/camera/c2.jpg); background-color: rgb(226, 7, 250);"> </div>
      <div class="img-box col2"
        style=" background-image: url(./image/camera/banner3.jpg); background-color: rgb(226, 250, 9);"> </div>
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

  <!-- end info section -->

  

  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->




  <script src="./bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
  

</body>

</html>
