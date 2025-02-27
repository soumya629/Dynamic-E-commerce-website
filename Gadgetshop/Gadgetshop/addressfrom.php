<?php 
// Start the session


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
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

<title>Title</title>
</head>
<body>
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row" style="margin-left:30%; width:100%;">
            <div class="col-md-5 border-right">
                <form method="post">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Settings</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label class="labels">Name</label>
                                <input type="text" class="form-control" placeholder="Enter full name" required name="a_name">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class="labels">Mobile Number</label>
                                <input type="text" class="form-control" placeholder="Enter phone number" name="a_phone" required>
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Address Line</label>
                                <input type="text" class="form-control" placeholder="Enter address line" name="a_address" required>
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Postcode</label>
                                <input type="text" class="form-control" placeholder="Enter postcode" name="a_postcode" required>
                            </div>
                            <div class="col-md-12">
                                <label class="labels">State</label>
                                <input type="text" class="form-control" placeholder="Enter state" name="a_state" required>
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Email ID</label>
                                <input type="email" class="form-control" placeholder="Enter email ID" name="a_email" required>
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <input type="submit" value="SUBMIT" class="btn btn-primary" name="save">
                            <a href="index.php" type="button" class="btn btn-before bg-success" style="width: 108px; margin-left:20px;"><i class="fa-solid fa-house"></i> </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>

<?php
if (isset($_POST['save'])) {
    // Sanitize and retrieve the form data
    $name = mysqli_real_escape_string($con, $_POST['a_name']);
    $phone = mysqli_real_escape_string($con, $_POST['a_phone']);
    $address = mysqli_real_escape_string($con, $_POST['a_address']);
    $postcode = mysqli_real_escape_string($con, $_POST['a_postcode']);
    $state = mysqli_real_escape_string($con, $_POST['a_state']);
    $email = mysqli_real_escape_string($con, $_POST['a_email']);

    // Retrieve the user's email from the session
    $session_email = $_SESSION['user']['email'];

    // Update the userdata table
    $sql2 = "UPDATE userdata 
             SET name = '$name', email = '$email', address = '$address' WHERE email = '$session_email'";

    $res2 = mysqli_query($con, $sql2);

    if ($res2) {
        // Store the updated information in the session
        $_SESSION['user'] = [
            'name' => $name,
            'phone' => $phone,
            'address' => $address,
            'postcode' => $postcode,
            'state' => $state,
            'email' => $email
        ];
        if($res2==1){
            echo '<div class="alert alert-success">Profile updated successfully!</div>';
        }

        
    } else {
        echo '<div class="alert alert-danger">Update failed: ' . mysqli_error($con) . '</div>';
    }
}
?>
