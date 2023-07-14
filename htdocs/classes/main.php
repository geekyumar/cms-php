<?php

function get_config($key)
{
    $config = file_get_contents('/var/www/cms-php/workspace/config.json');
    $data = json_decode($config, true);

    if(isset($data[$key]))
    {
        return $data[$key];
    }else{
        echo "error";
    }
}

include_once 'database.class.php';
include_once 'user.class.php';