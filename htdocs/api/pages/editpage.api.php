<?php

header('Content-type: application/json');
include_once($_SERVER['DOCUMENT_ROOT'].'/classes/main.php');

$dataArray = file_get_contents('php://input');
$data = json_decode($dataArray, true);
$token = session::get('session_token');
$uid = session::get('user_id');

if(isset($token) && isset($uid))
{ 

if(isset($data['page_id']) and 
    isset($data['page_name']) and 
   isset($data['page_heading']) and 
   isset($data['page_subheading']) and 
   isset($data['page_content'])) 
{
    $page_id = $data['page_id'];
    $page_name = $data['page_name'];
    $page_heading = $data['page_heading'];
    $page_subheading = $data['page_subheading'];
    $page_content = $data['page_content'];

    $result = pages::edit($page_id, $page_name, $page_heading, $page_subheading, $page_content, $token, $uid);
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
