<?php
require('adminconnection.php');
//session

// 
// $email=$_POST['email'];
// $src="SELECT email FROM userdata WHERE email='$email'";
// $rs=mysqli_query($con, $src)or die(mysqli_error($con));
// if(mysqli_num_rows($rs)>0){
// echo 'You are already registered';
// }

 if(isset($_POST['ok'])){
     $email=$_POST['l_email'];
    $pass=$_POST['l_pass'];
    
     $query= "SELECT * FROM userdata WHERE email =' $email' AND password = '$pass'";
     $newresult = mysqli_query ($con ,$query);
    if(mysqli_num_rows($newresult)>0){
         $data = mysqli_fetch_assoc($newresult);
         $_SESSION['uname'] = $data['name'];
        
    }
 }

if(isset($_POST['ok'])){
    $email=$_POST['l_email'];
    $pass=$_POST['l_pass'];
    // checkuser
    $sql1= "SELECT * FROM userdata ";
    $sql2= mysqli_query($con,$sql1);
    $row1= mysqli_num_rows($sql2);
    if($row1>0){
        while( $data=mysqli_fetch_assoc($sql2)){
           if($data['email']==$email && $data['password']==$pass){
            $_SESSION['user']=$data;
            echo '<div class="alert alert-success">You can exist in userpage</div>';
            
            header('Location: http://localhost/gadegtshop/index.php');
            exit;
            }
           
        }
    } else{
        echo '<div class="alert alert-success">You doesnot exist in userpage</div>';
    }
    $sql3= "SELECT * FROM admindata ";
    $sql4= mysqli_query($con,$sql3);
    $row2= mysqli_num_rows($sql4);
    if($row1>0){
        while( $data=mysqli_fetch_assoc($sql4)){
           if($data['email']==$email && $data['password']==$pass){
            $_SESSION['admin']=$data;
            echo '<div class="alert alert-success">You can exist in adminpage</div>';
            header('Location: http://localhost/gadegtshop/adminheader.php');
            exit;
            }
            
        }
       
       
    }else{
        echo '<div class="alert alert-success">You doesnot exist in userpage</div>';
    }



}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animated Login Form</title>
    <link rel="stylesheet" href="login.css">
    <script src="http://kit.fontawesome.com/97ebdf5864.js" crossorigin="anonymous"></script>
</head>
<body>
     
    <div class="container">

   
        <form  method="post">
            <h2>Login</h2>
        
                <div class="form-group">
                    <input type="email" name="l_email" required>
                    <label for="">Email</label>
                    <i class="fa-solid fa-envelope"></i>
                </div>
                <div class="form-group">
                    <input type="password" name="l_pass" required>
                    <label for="">Password</label>
                    <i class="fa-solid fa-lock"></i>
                </div>

                <p> <a href="forgot.php">Forget Password</a></p>

            <!-- <a href="#" id="btn" type="button" value="Login" style="margin-left:120px ;color:white;
            ">LOGIN</a> -->
                <!-- <button class="btn btn-primary" style="width:200px;margin-left :65px;height:30px;">Log in</button> -->
                 <input type="submit" value="login" class="btn btn-primary" placeholder="Login"  style="width:200px;margin-left :65px;height:30px;" name="ok" >

                <p>Don't have an account? <a href="registration.php">Register</a></p>
        </form>
        

       

       
    </div>

    
    
</body>
</html>


