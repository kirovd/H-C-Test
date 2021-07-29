<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>User Page</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link rel="stylesheet" href="style.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Profile</h1>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
                
			</div>
		</nav>
		<div class="content" style="text-align: center;">
            <i class="fas fa-user-circle" style='font-size:70px; margin-top:40px;'></i>
			<h2>Account Details:</h2>
   
      <table width = "100%"  height = "20%">
        <tr align = "center">
            <th>Name</th>
            <th>Enabled</th>
            <th>Purchased Credits</th>
            <th>Remarks</th>
        </tr>

        <?php
            require_once "config.php";

            $sql = "SELECT * FROM users WHERE id = '2'";

            // Execute the query (the recordset $rs contains the result)
            $result = $conn->query($sql);
          
            // Loop the recordset $rs
            // Each row will be made into an array ($row) using mysqli_fetch_array
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
              {
                  echo "<tr><form action = 'profile.php' method = post>";
                  echo "<input type=hidden name=id value='".$row['id']."'>";
                  echo "<td>".$row['name']."</td>";
                  echo "<td>".$row['enabled']."</td>";
                  echo "<td>".$row['purchased_credits']."</td>";
                  echo "<td>".$row['remarks']."</td>";        
                  echo "</form></tr>";  

                  
                  }
                 
    $conn->close();
       
      
?>

          </table>
		</div>
	</body>
</html>