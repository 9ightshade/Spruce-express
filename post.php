<?php
$con = mysqli_connect('localhost', 'root', "", 'logistic');

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$insert = "INSERT INTO user(name, email, password) VALUES ('$name', '$email', '$password')";
$done= mysqli_query($con, $insert);

if($done){
    header("Location: ./welcome.html");
}


?>