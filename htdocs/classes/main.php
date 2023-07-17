<?php

session_start();

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

function load_template($name)
{
    include $_SERVER['DOCUMENT_ROOT']."/_templates/$name.html";
}

include_once 'database.class.php';
include_once 'user.class.php';
include_once 'session.class.php';
include_once 'usersession.class.php';
include_once 'menu.class.php';
include_once 'pages.class.php';
include_once 'posts.class.php';
include_once 'products.class.php';
include_once 'history.class.php';