<?php
$con = mysqli_connect('localhost', 'root', "", 'logistic');

$name = $_POST['u_name'];
$email = $_POST['u_mail'];
$passkey = $_POST['passkey'];

$insert = "INSERT INTO user(name, email, password) VALUES ('$name', '$email', '$passkey')";
$done= mysqli_query($con, $insert);

if($done){
    header("Location: ./signin.html");
}


?>