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
        <p class="ip">Now you can view the packages and have the power to enable/disable them if needed.</p>

        <div class="row">
            <div class="col text-left">

            <table width = "100%" border = "1px" height = "20%">
        <tr align = "left">
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Commitment Period</th>
            <th>Credits</th>
            <th>Enabled</th>
            <th>Sell Limits</th>
            <th>Remarks</th>
            <th>Enable</th>
            <th>Disable</th>
        </tr>

        <?php
            require_once __DIR__. "/config.php";

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "api";
            
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }

                        
            $sql = "SELECT id, name, description, commitment_period, credits, enabled, sell_limit, remarks FROM packages";
          
          $result = $conn->query($sql);
          
        
          
          while($row = mysqli_fetch_array($result))
    {
        echo "<tr><form action = 'find-packages.php' class='formm' method = post>";
        echo "<input type=hidden name=id value='".$row['id']."'>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['description']."</td>";
        echo "<td>".$row['commitment_period']."</td>";
        echo "<td>".$row['credits']."</td>";
        echo "<td>".$row['enabled']."</td>";
        echo "<td>".$row['sell_limit']."</td>";
        echo "<td>".$row['remarks']."</td>";
        echo "<td><button type='submit' class='iloginn' style='text-align: center'>Enable";
        echo "<td><button type='submit' class='iloginn' style='text-align: center'>Disable";       
         
        echo "</form></tr>"; 
    }
    
      if ($result == true){
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. " - Name: " . $row["name"]. " -Description: " . $row["description"]. " -Commitment Period: " . $row["commitment_period"]. "  -Credits: " . $row["credits"]. " -Enabled: " . $row["enabled"]. " -Sell Limit: " . $row["sell_limit"]. " -Remarks: " . $row["remarks"]."<br>";
        }
      } else {
        echo "0 results";
      }     

      if (isset($_POST['submit'])){
            
            if (['remarks'] == 'Enable'){
                $row='Enable';
                echo 'Record updated';
            }else if (['remarks'] == 'Disable') {
                $row= 'Disable';
                echo 'Record updated';
            }
            $query = "UPDATE packages WHERE remarks = '$row'";
            $data = $conn->prepare($query);
            $data->execute(
              array(
                  ':remarks' => $row
              )
        
            );
            $array = array();
            while($result = $data->fetch())
            $array[] = $row;
            
            if(isset($result)){
                echo 'Record updated';
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