<?php

header('Content-type: application/json');
include_once($_SERVER['DOCUMENT_ROOT'].'/classes/main.php');

$dataArray = file_get_contents('php://input');
$data = json_decode($dataArray, true);

if(isset($data['username']) and 
 isset($data['password']))
{
    $username = $data['username'];
    $password = $data['password'];

    $result = usersession::authenticate($username, $password);
    if($result)
    {
        $responseArray = [
            'response' => 'success'
        ];
        $response = json_encode($responseArray);
        echo $response;
    }
    else{
        $responseArray = [
            'response' => 'failed'
        ];
        $response = json_encode($responseArray);
        echo $response;
    }
}