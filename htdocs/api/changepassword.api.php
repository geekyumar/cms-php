<?php

header('Content-type: application/json');
include_once($_SERVER['DOCUMENT_ROOT'].'/classes/main.php');

$dataArray = file_get_contents('php://input');
$data = json_decode($dataArray, true);
$token = session::get('session_token');
$uid = session::get('user_id');

if(isset($token) && isset($uid))
{ 

if(isset($data['old_pass']) and 
   isset($data['new_pass']) and
   isset($data['re_new_pass'])) 
{
    $old_pass = $data['old_pass'];
    $new_pass = $data['new_pass'];
    $re_new_pass = $data['re_new_pass'];

    $result = user::changePassword($old_pass, $new_pass,$re_new_pass, $token, $uid);
    if($result == true)
    {
        session::destroy();
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
}
