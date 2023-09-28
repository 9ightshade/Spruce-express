<?php
$con = mysqli_connect('localhost', 'root', "", 'logistic');

$name = $_POST['ename'];
$email = $_POST['email'];
$password = $_POST['password'];

$insert = "INSERT INTO user(name, email, password) VALUES ('$name', '$email', '$password')";
$done= mysqli_query($con, $insert);

if($done){
    header("Location: ./signin.html");
}







$email = $_POST['email'];
$password = $_POST['password'];

if ("$email===you2@gmail.com || $password===12345") {
    echo "my email is the same";
} else {
    echo "password or email incorrect";
if($done){
    header("Location: ./signin.welcome.html");
}
    


    
}

?>