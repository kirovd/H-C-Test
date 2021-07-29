<?php 

require_once __DIR__. '/config.php';

//                 $Disabled = ['remarks'] ? 'disable' : '';
//                 $Enable = ['remarks'] ? 'enable' : '';
        
//                 if($Enable === 'enable' || $Disabled === 'disable'){
//                         {              
                                
//                         echo "Record updated";
//                         header("refresh:3; url=find-packages.php");
//                         } 
//                 }

// class API {
//     function Insert(){
//         $db = new Connect;
//         $packages = array();
//         $data = $db->prepare("INSERT INTO packages (remarks) values ()");
//         $data->execute();
//         if($InputData = $data->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION )){
//             $packages[$InputData['id']] = array(
//                 'remarks' => $InputData['remarks'],
                
//             );
//         }
//         return json_encode($packages);
//     }
// }
if (isset($_POST['submit'])){
if ($_POST['submit'] == 'remarks'){
    $row= '';
    if ($_POST['remarks'] == 'Enable'){
        $row='Disabled';
    }else{
        $row= 'Enabled';
    }
    $query = "INSERT INTO packages(remarks) VALUES('$row')";
    $data = $conn->prepare($query);
    $data->execute(
      array(
          ':remarks' => $row,
          ':id'      => $_POST['id']
      )

    );
    $array = array();
    while($row = $result->fetch_assoc())
    $array[] = $row;
    
    if(isset($result)){
        echo 'Record updated';
    }
}
}


?>

