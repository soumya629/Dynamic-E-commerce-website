<?php
require('adminconnection.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="login.css">
    <script src="http://kit.fontawesome.com/97ebdf5864.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <form method="post">
            <h2>Reset Password</h2>
        
            <div class="form-group">
                <input type="email" name="f_email" required>
                <label for="">Email</label>
                <i class="fa-solid fa-envelope"></i>
            </div>
            <div class="form-group">
                <input type="password" name="f_pass" required>
                <label for="">New Password</label>
                <i class="fa-solid fa-lock"></i>
            </div>
            <input type="submit" value="Reset Password" class="btn btn-primary" style="width:200px;margin-left:65px;height:30px;" name="forget" >
            <a href="login.php" class="btn ">LOGIN</a>

            <?php
            if (isset($_POST['forget'])) {
                $email = $_POST['f_email'];
                $pass = $_POST['f_pass'];
                
              
            
                // Query to check if the email exists
                $sql1 = "SELECT * FROM userdata WHERE email='$email'";
                $sql2 = mysqli_query($con, $sql1);
                
                if (mysqli_num_rows($sql2) > 0) {
                    // Update password query
                    $s = "UPDATE userdata SET password='$pass' WHERE email='$email'";
                    $sq2 = mysqli_query($con, $s);
            
                   if ($sq2) {?>
                        <h3 style="margin-left:40px;"><?php echo "your password is updated"?></h3>
                     <?php   
                     } else { ?>

                        <h3><?php echo "error updateing password"?></h3><?php
                    }
                 } else { ?>

                     <h3><?php echo "your email is not found"?></h3><?php
                 }
            }?>
            
        </form>
    </div>
</body>
</html>
