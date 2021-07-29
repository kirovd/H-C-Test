<?php 

require_once __DIR__. '/configg.php';

class API {
    function Select(){
        $db = new Connect;
        $packages = array();
        $data = $db->prepare('SELECT * FROM packages ORDER BY id');
        $data->execute();
        while($OutputData = $data->fetch(PDO::FETCH_ASSOC)){
            $packages[$OutputData['id']] = array(
                'id' => $OutputData['id'],
                'name' => $OutputData['name'],
                'description' => $OutputData['description'],
                'commitment_period' => $OutputData['commitment_period'],
                'credits' => $OutputData['credits'],
                'enabled' => $OutputData['enabled'],
                'sell_limit' => $OutputData['sell_limit'],
                'remarks' => $OutputData['remarks'],
                
            );
        }
        return json_encode($packages);
    }
}

$API = new API;
header('Content-Type: application/json');
echo $API -> Select();

?>