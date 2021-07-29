<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 
// Include config file
require_once __DIR__. "/configg.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    
    if(isset($_POST['admin-login'])) {
        $API = new API;
        header('Content-Type: application/jason');
        echo $API -> Select();
    }


    if (!empty($username) && !empty($password) === false){
        
        echo "Please try again..";
    
    } else if ("$username"=="admin" AND "$password"=="admin"){
        echo "Welcome $username. ";
        header("refresh:3; url=admin.php");
        
    }  else if ("$username"=="admin" AND "$password"=="admin123"){
        echo "Welcome $username. ";
        header("refresh:3; url=admin.php");
    
    }  else if ("$username"=="admin" AND "$password"=="admin1234"){
        echo "Welcome $username. ";
        header("refresh:3; url=admin.php");
    }
}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

</head>
<body>
<div class="jumbotron">
        <div class="container">
    
        
        <nav class="navtopp">
        <a href="back.php"><i class="fas fa-sign-out-alt"></i>Back</a>
        </nav>

        <h2 class="ih2">Admin Login</h2>
        <p class="ip">Please fill in your credentials to login.</p>

        <div class="row">
            <div class="col text-left">
        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
        </form>
            </div>
        </div>
    </div>
    </div>
</body>
</html>