<?php require('adminconnection.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--external css-->
    <link href="./contact.css" rel="stylesheet">
    <!--bootstrap 5 icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>Contact Form</title>
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
            <a class="nav-link active link-outline-light" href="productall.php">Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="contact.html">Contact</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link active" href="#">About</a>
          </li> -->
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
   <!-- navbar end -->
    
        <div class="container"> 
          
          <div class="row">
            <div class="col-md-7">
              <h4>Get in touch</h4>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Name</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter your name">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter your email">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Contact Number</label>
                <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Enter your number">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>
              <button class="btn btn-primary">Send</button>

              <a href="index.html" class="btn btn-primary">Back</a>
            </div>
            <div class="col-md-5">
              <h4>Contact us</h4><hr>
              <div class="mt-5">
                  <div class="d-flex">
                    <i class="bi bi-geo-alt-fill"></i>
                    <p>Kolkata</p>
                  </div><hr>
                  <div class="d-flex">
                    <i class="bi bi-telephone-fill"></i>
                    <p>Contact:- 8888888888 </p>
                  </div><hr>
                  <div class="d-flex">
                    <i class="bi bi-envelope-fill"></i>
                    <p>Email:- contact@gmail.com</p>
                  </div><hr>
                  <div class="d-flex">
                    <i class="bi bi-browser-chrome"></i>
                    <p>Website: www.contact.com</p>
                  </div><hr>

              </div>

            </div>
          </div>
          
        </div>

     
        

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    
    
    
  
   
</body>

  

</html>