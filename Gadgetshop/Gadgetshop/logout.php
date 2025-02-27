<?php
// Start the session
require('adminconnection.php');

// Destroy the session
session_unset();
session_destroy();

// Redirect to the login page or homepage
header('Location: login.php');
exit();
?>
