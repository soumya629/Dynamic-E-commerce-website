<?php 
// Database connection
require('adminconnection.php');

// Check if the connection was successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="sign.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="http://kit.fontawesome.com/97ebdf5864.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <form method="post">
            <h2 style="text-align:center">REGISTRATION</h2>

            <div class="form-group">
                <input type="text" id="Name" name="l_name" pattern="[A-Za-z\s]+" required>
                <label for="Name">Name</label>
                <i class="fa-solid fa-envelope"></i>
            </div>

            <div class="form-group">
                <input type="email" id="email" name="l_email" required> 
                <span id="msg" class="text-danger"></span> <!-- Email validation message -->
                <label for="email">Email</label>
                <i class="fa-solid fa-envelope"></i>
            </div>

            <div class="form-group">
                <input type="password" required id="password" name="l_pass">
                <label for="password">Password</label>
                <i class="fa-solid fa-lock"></i>
            </div>

            <div class="form-group">
                <input type="text" id="phone" name="l_ph" required>
                <label for="phone">PHONE NO</label>
                <i class="fa-solid fa-envelope"></i>
            </div>

            <div class="form-group">
                <input type="text" id="address" name="l_add" required>
                <label for="address">ADDRESS</label>
                <i class="fa-solid fa-envelope"></i>
            </div>

            <button class="btn btn-primary" name="ok" style="width:200px;margin-left:65px;height:30px;">Register</button>
            <p>You have an account? <a href="login.php">Login</a></p>
        </form>

        <?php
        if(isset($_POST['ok'])){
            // Sanitize and retrieve the form data
            $name = mysqli_real_escape_string($con, $_POST['l_name']);
            $email = mysqli_real_escape_string($con, $_POST['l_email']);
            $add = mysqli_real_escape_string($con, $_POST['l_add']);
            $pass = password_hash($_POST['l_pass'], PASSWORD_DEFAULT); // Hashing the password
            $ph = mysqli_real_escape_string($con, $_POST['l_ph']);
            
            // Check if the email already exists
            $check_email = "SELECT * FROM userdata WHERE email='$email'";
            $res = mysqli_query($con, $check_email);

            if (mysqli_num_rows($res) > 0) {
                echo '<div class="alert alert-danger">Email is already registered</div>';
            } else {
                // Insert the new user data
                $sql = "INSERT INTO userdata (name, email, password, address, phone) VALUES ('$name', '$email', '$pass', '$add', '$ph')";
                $res = mysqli_query($con, $sql);

                if($res){
                    echo '<div class="alert alert-success">Registration is successful</div>';
                } else {
                    echo '<div class="alert alert-danger">Registration failed: ' . mysqli_error($con) . '</div>';
                }
            }
        }
        ?>
    </div>

    <!-- AJAX script for email validation -->
    <script type="text/javascript">
        $(document).ready(function(){
            $('#email').on('input', function() {
                var email = $(this).val();
                if (email.length > 0) {
                    $.ajax({
                        url: 'checkemail.php',
                        method: 'POST',
                        data: { email: email },
                        success: function(response) {
                            if (response == "exists") {
                                $('#msg').html("Email is already registered").css('color', 'red');
                            } else {
                                $('#msg').html("");
                            }
                        }
                    });
                } else {
                    $('#msg').html("");
                }
            });
        });
    </script>

</body>
</html>
