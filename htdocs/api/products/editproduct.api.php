<?php

header('Content-type: application/json');
include_once($_SERVER['DOCUMENT_ROOT'].'/classes/main.php');

$dataArray = file_get_contents('php://input');
$data = json_decode($dataArray, true);
$token = session::get('session_token');
$uid = session::get('user_id');

if(isset($token) && isset($uid))
{ 

if(isset($data['product_id']) and 
   isset($data['product_name']) and 
   isset($data['product_description'])) 
{
    $product_id = $data['product_id'];
    $product_name = $data['product_name'];
    $product_description = $data['product_description'];

    $result = products::edit($product_id, $product_name, $product_description, $token, $uid);
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
