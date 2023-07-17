<?php

header('Content-type: application/json');
include_once($_SERVER['DOCUMENT_ROOT'].'/classes/main.php');

$dataArray = file_get_contents('php://input');
$data = json_decode($dataArray, true);
$token = session::get('session_token');
$uid = session::get('user_id');

if(isset($token) && isset($uid))
{ 

if(isset($data['post_id'])) 
{
    $post_id = $data['post_id'];
    $result = posts::delete($post_id, $token, $uid);
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
}
