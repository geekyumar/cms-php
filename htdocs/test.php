<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/classes/main.php';
$token = session::get('session_token');
$uid = session::get('user_id');

posts::edit('33840ef59416be706c918215afbc85f7', 'rfrgrfef','grfedwefre', $token, $uid);