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
       
        
      
    if(empty(trim($_POST["description"]))){
            $Names_err = "Please enter a description.";
        } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["description"]))){
            $Names_err = "Description can only contain letters, numbers, and underscores.";
        } else{
    }

    if(empty(trim($_POST["commitment_period"]))){
        $CommitPeriod_err = "Please enter the commitment_period.";     
    } elseif(strlen(trim($_POST["commitment_period"])) < 1){
        $CommitPeriod_err = "Commitment period must have atleast 1 characters.";
    } else{
        $CommitPeriod = trim($_POST["commitment_period"]);
    }

    if(empty(trim($_POST["credits"]))){
        $Credits_err = "Please enter the credits.";     
    } elseif(strlen(trim($_POST["credits"])) < 1){
        $Credits_err = "Credits must have atleast 1 characters.";
    } else{
        $Credits = trim($_POST["credits"]);
    }

    if(empty(trim($_POST["sell_limit"]))){
        $Sell_err = "Please enter the sell_limit.";     
    } elseif(strlen(trim($_POST["sell_limit"])) < 1){
        $Sell_err = "Sell limit must have atleast 1 characters.";
    } else{
        $Sell = trim($_POST["sell_limit"]);
    }

        $Names = $_POST['name'];
        $DesCri = $_POST['description'];
        $CommitPeriod = $_POST['commitment_period'];
        $Credits = $_POST['credits'];
        $Sell = $_POST['sell_limit'];

        
        $sql = "INSERT INTO `packages`(`name`, `description`, `commitment_period`, `credits`, `sell_limit`)
        VALUES ('$Names', '$DesCri', '$CommitPeriod', '$Credits', '$Sell')";

        if ($conn->query($sql) === TRUE) {
            echo "You have registered a Package successfully ! Go back and view the Package or add more Packages.";
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
                <label for="name">Name</label>
                <input type="text" name="name" id="name">
                <label for="description">Description</label>
                <input type="text" name="description" id="description">
                <label for="commitment_period">Commitment Period</label>
                <input type="text" name="commitment_period" id="commitment_period">
                <label for="credits">Credits</label>
                <input type="text" name="credits" id="credits">
                <label for="sell_limit">Sell Limit</label>
                <input type="text" name="sell_limit" id="sell_limit">

                <input type="submit" name="submit" value="Submit">
            </form>

            <a href="admin.php">Back to Admin</a>

            </div>
        </div>
    </div>
    </div>
</body>
</html>