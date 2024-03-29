<?php

class menu
{
    public static function create($menu_name, $menu_link, $token, $uid)
    {
        if(usersession::authorize($token) === true)
        {
            if(!$conn)
        {
            $conn = database::getConnection();
        }
       
        $menu_id = md5(rand(0,9999). $menu_name . $menu_link . $uid);

        $sql = "INSERT INTO `menu` (`uid`, `menu_id`, `menu_name`, `menu_link`, `menu_create_time`) 
            VALUES ('$uid', '$menu_id', '$menu_name', '$menu_link', now())";

        if($conn->query($sql) == true)
        {
            return true;
        }else{
            return false;
        }

        }
        else
        {
           echo ("Unauthorized API request detected!");
        }
    }

    public static function list($token, $uid)
    {
        if(usersession::authorize($token) === true)
        {
            if(!$conn)
        {
            $conn = database::getConnection();
        }

        $sql = "SELECT * FROM `menu` WHERE `uid` = '$uid'";
        $result = $conn->query($sql);

        if($result)
        {
            if($result->num_rows)
            {
                return $result;
            }
            else{
                return 0;
            }
        }else{
            return false;
        }

        }
        else
        {
           echo ("Unauthorized API request detected!");
        }
    }

    public static function edit($menu_id, $menu_name, $menu_link, $token, $uid)
    {
        if(usersession::authorize($token) === true)
        {
            if(!$conn)
        {
            $conn = database::getConnection();
        }

        $sql = "UPDATE `menu` SET
        `menu_name` = '$menu_name',
        `menu_link` = '$menu_link'
        WHERE `menu_id` = '$menu_id' AND `uid` = '$uid'";

        if($conn->query($sql) === true)
        {
           return true;
        }else{
            return false;
        }
        }
        else
        {
           echo ("Unauthorized API request detected!");
        }
    }

    public static function delete($menu_id, $token, $uid,)
    {
        if(usersession::authorize($token) === true)
        {
            if(!$conn)
        {
            $conn = database::getConnection();
        }

        $sql = "DELETE FROM `menu`
        WHERE ((`menu_id` = '$menu_id')) AND `uid` = '$uid'";

        if($conn->query($sql) === true)
        {
           return true;
        }else{
            return false;
        }
        }
        else
        {
           echo ("Unauthorized API request detected!");
        }
    }

    public static function no_of_menu($uid)
    {
        if(!$conn)
        {
            $conn = database::getConnection();
        }
        
        $sql = "SELECT * FROM `menu` WHERE `uid` = '$uid'";
        $result = $conn->query($sql);
        if($result)
        {
           echo $result->num_rows;
        }
    }
}