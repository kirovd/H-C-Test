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
        <a href="logoutt.php"><i class="fas fa-sign-out-alt"></i>Logout</a><br><a href="admin.php" class="submit">Back to Admin</a>
        </nav>
        </div>
        <h2 class="ih2">Welcome Admin</h2>
        <p class="ip">Now you can view the users and have the power to enable/disable them if needed.</p>

        <div class="row">
            <div class="col text-left">

            <table width = "100%" border = "1px" height = "20%">
        <tr align = "left">
            <th>ID</th>
            <th>Name</th>
            <th>Enable</th>
            <th>Purchased Credits</th>
            <th>Remarks</th>
            <th>Enable/Disable</th>
        </tr>

        <?php
            require_once "config.php";

            
            if($_SERVER["REQUEST_METHOD"] == "GET"){
                
            $sql = "SELECT id, name, enabled, purchased_credits, remarks FROM users";
            $result = $conn->query($sql);
            while($row = mysqli_fetch_array($result))
    {
        echo "<tr><form action = 'find-user.php' method = post>";
        echo "<input type=hidden name=id value='".$row['id']."'>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['enabled']."</td>";
        echo "<td>".$row['purchased_credits']."</td>";
        echo "<td>".$row['remarks']."</td>";
        echo "<td><input type =submit value='Enable' name=enable";
        echo "<td><input type =submit value='Disable' name=disable>";
       

        
       

            
        // if($row['remarks'] == 'Enable' || $row['remarks'] == 'Disabled')
        // {
        //     $Disabled = $row['id'] ? 'disable' : '';
        //     $Enable = $row['id'] ? 'enable' : '';
    
        //     // clean data 
        //     $Disabled = filter_var($Disabled, FILTER_SANITIZE_EMAIL);
        //     $Enable = mysqli_real_escape_string($conn, $Enable);
    
           
        //     // If query fails, show the reason 
        //      if(!$sql){
        //        die("SQL query failed: " . mysqli_error($conn));
         


        // if(isset($_POST['submit'])) {
            
        //     }
        
        
        // if(isset($row['submit'])){ 
        //     $sql = "UPDATE `users` SET `remarks`=[Disabled] WHERE id";
        //     // echo "You have successfully Disabled/Enabled a record.";
        //     // header("refresh:3; url=find-page.php");
        //     // $sql = "UPDATE `users` SET `remarks`=['Enabled'] WHERE ID=$_POST[id]";
        //     }

        // if($row['remarks'] == 'Enable' || $row['remarks'] == 'Disabled')
        // {
        //     echo "<td><input type =submit enable value='Enable' name=enable>";
        //     echo "<td><input type =submit disable value='Disable' name=disable>";
        // }
               
        // if(isset($_POST['enable'])) {
        //     $sql = "UPDATE `users` SET `remarks`=['Enabled'] WHERE ID=$_POST[id]";
        // } else if (isset($_POST['disable'])){
        //     $sql = "UPDATE `users` SET `remarks`=['Disabled'] WHERE ID=$_POST[id]";
        // }

        
        echo "</form></tr>";  

        
        }
    
    

    if ($result == true){
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "id: " . $row["id"]. " - Name: " . $row["name"]. " -Enabled: " . $row["enabled"]. "  -Purchased Credits: " . $row["purchased_credits"]. " -Remarks: " . $row["remarks"]."<br>";
        }
      } else {
        echo "0 results";
      }
          exit;     
      
            }

            $Disabled = ['remarks'] ? 'disable' : '';
                $Enable = ['remarks'] ? 'enable' : '';
        
                if($Enable === 'enable' || $Disabled === 'disable'){
                        {
                            
                            $sqll = "UPDATE `users` SET `remarks` WHERE  VALUES ($Enable, $Disabled)";
                            $results = $conn->query($sqll);
                        echo "Record updated";
                        } 
                }

            
    $conn->close();
            
?>

    </table>
             <!-- <button class="ilogin" style="text-align: center;"><a href="find-user.php">View Users</a></button> -->
             
            

            </div>
        </div>
    </div>
    </div>
</body>
</html>