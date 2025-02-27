<?php
$conn= mysqli_connect('localhost','root','','product');

$sql = "SELECT * FROM useraddress  "; 
$sql2 = mysqli_query($conn,$sql);
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
            <a class="nav-link active link-outline-light" href="Product.php">Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="contact.php">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">Order</a>
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

  <a href="index.php" type="button" class="btn btn-before bg-light" style="width: 58px; margin-left:20px;">BACK</a>

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
                $userId = $data['user_id'];
                ?>
                <div class="col">
                    <div class="card mt-0">
                        
                        <div class="card-body text-center">
                            <p class="card-text">
                                <h5>
                                    <?php echo $data['user_email']; ?> <br>
                                    
                                </h5>
                            </p>
                        </div>
                        <div class="d-flex justify-content-around mb-5">
                            

                            <a href="?user_id=<?php echo $data['user_id'] ?>" class="btn btn-primary">ADD TO CART</a>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                
            <?php
            }
            ?>
        </div>
    </div>
<?php 
}
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>
