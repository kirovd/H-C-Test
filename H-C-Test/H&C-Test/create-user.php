<?php

require_once "config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate name
    if(empty(trim($_POST["name"]))){
        $Names_err = "Please enter a name.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["name"]))){
        $Names_err = "Name can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
       
        
      
    // Validate purCredits
    if(empty(trim($_POST["purchased_credits"]))){
        $purCredits_err = "Please enter the purchased_credits.";     
    } elseif(strlen(trim($_POST["purchased_credits"])) < 1){
        $purCredits_err = "purchased_credits must have atleast 1 characters.";
    } else{
        $purCredits = trim($_POST["purchased_credits"]);
    }

$Names = $_POST['name'];
$purCredits = $_POST['purchased_credits'];


        $sql = "INSERT INTO users (name, purchased_credits)
        VALUES ('$Names', '$purCredits')";

        if ($conn->query($sql) === TRUE) {
            echo "You have registered a USER successfully ! Go back and view the USERS or add more Users.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        
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
    
        <div class="form-group">
        <nav class="navtopp">
        <a href="logoutt.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
        </nav>
        </div>
        <h2 class="ih2">Welcome Admin</h2>
        <p class="ip">Now you can create users and packages. Also you have the power to disable them if needed.</p>

        <div class="row">
            <div class="col text-left">
            
            <form method="post">
                <label for="name">Username</label>
                <input type="text" name="name" id="name">
                <label for="purchased_credits">Purchased Credits</label>
                <input type="text" name="purchased_credits" id="purchased_credits">
                <input type="submit" name="submit" value="Submit">
            </form>

            <a href="admin.php">Back to Admin</a>

            </div>
        </div>
    </div>
    </div>
</body>
</html>