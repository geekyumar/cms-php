<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/classes/main.php';
$token = session::get('session_token');
$uid = session::get('user_id');

$out = user::changePassword('pass', 'paspass','passpass', $token, $uid);
if($out)
{
    echo "success";
}
else{
    echo "fail";
}