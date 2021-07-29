<?php
// Include config file
require_once "config.php";

// if(isset($_POST['submit'])){
//     $UserName = $_POST['username'];
//     $Password = $_POST['password'];
  
//    //Insert into Database
//     $sql = "INSERT INTO 'register'('username', 'password') VALUES ('$UserName', '$Password')";
  
//   if (!mysqli_query($link, $sql))
//          {
//          die('Error: ' . mysqli_error($link));
//          }
  
//        echo "\n You have registered successfully. You can login to view your packages.";
  
//       mysqli_close($link);

//     }



$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
       
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 4){
        $password_err = "Password must have atleast 4 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    // $sql = "INSERT INTO 'register'('username', 'password')";

        // $servername = "localhost";
        // $username = "root";
        // $password = "";
        // $dbname = "hc";

        // // Create connection
        // $conn = new mysqli($servername, $username, $password, $dbname);
        // // Check connection
        // if ($conn->connect_error) {
        //     die("Connection failed: " . $conn->connect_error);
        // }
        $username     = $_POST['username'];
        $password     = $_POST['password'];

        // clean data 
        $username = filter_var($username, FILTER_SANITIZE_EMAIL);
        $password = mysqli_real_escape_string($conn, $password);

        $sql = "INSERT INTO register (username, password)
        VALUES ('$username', '$password')";
        $query = mysqli_query($conn, $sql);

        // If query fails, show the reason 
        if(!$query){
           die("SQL query failed: " . mysqli_error($conn));
        }
    


        if (!empty($username) && !empty($password) && !empty($confirm_password) === false){
        
            echo "Please try again..";
        
        }else if($password != $confirm_password){
            
            echo "Password do not match.. Please try again..";

        } else if ($username && $password && $confirm_password == true) {
            echo "Thank you for registering $username. Now you will be redirected to the home page. There you can login.";
            header("refresh:4; url=index.html");
            
        } 

        $conn->close();
        
      
}
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
<div class="jumbotron">
        <div class="container">
        
        <nav class="navtopp">
        <a href="back.php"><i class="fas fa-sign-out-alt"></i>Back</a>
        </nav>

        <h2 class="ih2">Register</h2>
        <p class="ip">Please fill this form to create an account.</p>

        <div class="row">


            <div class="col text-left">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                        <span class="invalid-feedback"><?php echo $username_err; ?></span>
                    </div>    
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                        <span class="invalid-feedback"><?php echo $password_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                        <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <input type="reset" class="btn btn-secondary ml-2" value="Reset">
                    </div>
                    <p>Already have an account? <a href="login.php">Login here</a>.</p>
                </form>
            </div>
        </div>
    </div> 
</div>   
</body>
</html>