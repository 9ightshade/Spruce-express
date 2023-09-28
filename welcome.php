<?php
session_start();

if (isset($_SESSION['email']) && isset($_SESSION['password']) ) {
    $con = mysqli_connect('localhost', 'root', "", 'logistic');
}else {
    header("Location: ./signup.html");
    exit();
}

?>