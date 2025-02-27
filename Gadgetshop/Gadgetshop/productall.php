<?php
require('adminconnection.php');



$sql = "SELECT * FROM newproduct  "; 
$sql2 = mysqli_query($con,$sql);
$rowcount = mysqli_num_rows($sql2);
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
<link rel="stylesheet" href="style3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
<title></title>
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
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-but">
            <a class="btn btn-outline-dark" href="addtocart.php" ><i class="fa-solid fa-cart-shopping"></i></a>
          </li>
        </ul>
       
      </div>
    </div>
  </nav>

  

  <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="./image/camera/banner3.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="./image/camera/b5.png" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching"
      data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching"
      data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

<?php
if($rowcount > 0) {
?>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4 py-5">
            <?php
            while($data = mysqli_fetch_assoc($sql2)) {
                $productId = $data['p_id'];
                ?>
                <div class="col">
                    <div class="card mt-0">
                        <img src="<?php echo $data['p_img']; ?>" class="card-img-top bg-dark" alt="..." style="width:auto;height:45vh">
                        <div class="card-body text-center">
                            <p class="card-text">
                                <h5>
                                    <?php echo $data['p_s_desc']; ?> <br>
                                    <?php echo $data['p_price']; ?> <br>
                                </h5>
                            </p>
                        </div>
                        <div class="d-flex justify-content-around mb-5">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-<?php echo $productId; ?>">
                                DETAILS
                            </button>

                            <a href="addtocart.php?product_id=<?php echo $data['p_id'] ?>" class="btn btn-primary">ADD TO CART</a>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="modal-<?php echo $productId; ?>" tabindex="-1" aria-labelledby="modalLabel-<?php echo $productId; ?>" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel-<?php echo $productId; ?>">Product Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <img src="<?php echo $data['p_img']; ?>" class="img-fluid" alt="Product Image">
                        <p><?php echo $data['p_s_desc']; ?></p>
                        <p class="fw-bold"><?php echo $data['p_price']; ?></p>
                        <p class="fw-bold"><?php echo $data['p_desc']; ?></p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <!-- <a href="order.php?product_id=<?php echo $productId; ?>" class="btn btn-primary">BUY NOW</a> -->
                      </div>
                    </div>
                  </div>
                </div>

            <?php
            }
            ?>
        </div>
    </div>
<?php 
}
?>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>
