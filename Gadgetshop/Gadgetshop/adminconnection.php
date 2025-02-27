<?php
session_start();
$db="product";
$user="root";
$password="";
$server="localhost";

try{
    $con=mysqli_connect($server, $user, $password, $db);
}catch(Exception $e){
    echo $e->getMessage();
}
?>