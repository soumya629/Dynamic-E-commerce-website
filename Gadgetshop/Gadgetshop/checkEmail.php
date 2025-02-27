<?php
require('adminconnection.php'); // Database connection

if (isset($_POST['email'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    
    // Query to check if email exists
    $query = "SELECT * FROM userdata WHERE email = '$email'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "exists"; // Email already exists
    } else {
        echo "not exists"; // Email not found in the database
    }
}
