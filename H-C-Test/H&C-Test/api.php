<?php

require_once __DIR__. '/configg.php';

class API {
    function Select(){
        $db = new Connect;
        $admins = array();
        $data = $db->prepare('SELECT * FROM admins ORDER BY id');
        $data->execute();
        while($OutputData = $data->fetch(PDO::FETCH_ASSOC)){
            $admins[$OutputData['id']];
        }
        return json_encode($admins);
    }

}

class APII {
    function Select(){
        $db = new Connect;
        $username = 'username';
        $password = 'password';
        $register = array();
        $data = $db->prepare("SELECT id, username, password FROM register");
        $data->execute();
        while($OutputData = $data->fetch(PDO::FETCH_ASSOC)){
            $register[$OutputData['id']];
        }
        return json_encode($register);
    }

}

?>