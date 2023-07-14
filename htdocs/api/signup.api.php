<?php

header('Content-Type: application/json');

include_once ($_SERVER['DOCUMENT_ROOT'].'/classes/main.php');

    $dataArray = file_get_contents('php://input');
    $data = json_decode($dataArray, true);

    if(isset($data['name']) and 
    isset($data['username']) and
    isset($data['email']) and 
    isset($data['phone']) and 
    isset($data['password']))

    {
    $name = $data['name'];
    $username = $data['username'];
    $email = $data['email'];
    $phone = $data['phone'];
    $pass = $data['password'];
    $regid = rand(0000,9999);

    $result = user::signup($name, $username, $email, $phone, $pass, $regid);

    if($result)
    {
            $success = array(
                "response" => "success"
            );
            $jsonSuccess = json_encode($success);
            echo $jsonSuccess;
    }
    else{
        $data = array(
            "request" => "Signup Failed!"
        );
        $json = json_encode($data);
        echo $json;
    }
}