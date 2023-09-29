<?php




session_start();
$con = mysqli_connect('localhost', 'root', "", 'logistic');

if (isset($_POST['email']) && isset($_POST['password'])) {

    $php_errormsg = "";



    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    

        // $sql = "SELECT * FROM `user` WHERE email='$email' AND password='$password'";

        // $result = mysqli_query($con, $sql);

        // if (mysqli_num_rows($result) === 1) {
        //     $row = mysqli_fetch_assoc($result);
        //     if ($row['email'] === $email && $row['password'] === $password) {
        //         $_SESSION['email'] = $row['email'];
        //         $_SESSION['password'] = $row['password'];
        //         header("Location: ./welcome.html");
        //         exit();
        //     }else{
        //         $php_errormsg = "Incorrect Email or Password";
        //         // header("Location: signin.html?error=Incorrect Email or Password");
        //         // exit();
        //     }

        // }else{
        //     $php_errormsg = "Incorrect Email or Password";
        //     // header("Location: signin.html?error=Incorrect Email or Password");
        //     // exit();
        // }
  


$sql = "SELECT * FROM user WHERE email=? AND password=?";
$stmt = mysqli_stmt_init($con);

if (mysqli_stmt_prepare($stmt, $sql)) {
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['email'] === $email && password_verify($password, $row['password'])) {
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['password'];
            header("Location: ./welcome.html");
            exit();
        } else {
            $error = "Incorrect Email or Password";
        }
    } else {
        $error = "Incorrect Email or Password";
    }
} else {
    // Handle database query preparation error
    $error = "Database query error";
}
        
}


?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="signin.css" />
        <title>Sign in</title>
    </head>
    <body>
        <div class="container">
            <div class="details">
                <h1> Your Logistics Partner For Seamless Delivery. </h1>
                <p>
                    We provide services for all your nationwide shipping needs.
                </p>
            </div>

            <div class="form-section">
                <form action="./login.php" method="post">
                    <h2>Welcome Back!</h2>
                    <p>
                        Track your logistics with <strong>SpruceXpress</strong>
                    </p>
                    <?php if (!empty($error)) { ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php } ?>
                    <label for="">Email</label>
                    <input
                        type="email"
                        id="email"
                        placeholder="Enter your email"
                        name="email"
                    />
                    <label for="">Password</label>
                    <input
                        type="password"
                        id="password"
                        placeholder="Enter Password"
                        name="password"
                    />


                    <div class="password-checker" >
                        <div>
                            <input type="checkbox" id="checkbox" />
                            <p>Remember me</p>
                        </div>

                        <p class="forgot-password">Forgot Password?</p>
                    </div>
                    <button>Sign In</button>
<button class="google-btn" ><img class="google-logo" src="./public/images/google.png" alt="google">
Or continue with Google
</button>
                    
                   
                    <p class="cta-text"
                    >New to SpruceXpress?  <span><a href="signup.html">Create an account</a></span></p
                    >
                </form>
            </div>
        </div>
    </body>
</html>
