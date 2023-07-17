<?php

class pages
{
    public static function create($page_name, $page_heading, $page_subheading, $page_content, $token, $uid)
    {
        if(usersession::authorize($token) === true)
        {
            if(!$conn)
        {
            $conn = database::getConnection();
        }
       
        $page_id = md5(rand(0,9999). $page_name . $page_heading . $page_content. $uid);

        $sql = "INSERT INTO `pages` (`uid`, `page_id`, `page_name`, `page_heading`, `page_subheading`, `page_content`, `page_create_time`) 
            VALUES ('$uid', '$page_id', '$page_name', '$page_heading', '$page_subheading', '$page_content', now())";

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

        $sql = "SELECT * FROM `pages` WHERE `uid` = '$uid'";
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

    public static function edit($page_id, $page_name, $page_heading, $page_subheading, $page_content, $token, $uid)
    {
        if(usersession::authorize($token) === true)
        {
            if(!$conn)
        {
            $conn = database::getConnection();
        }

        $sql = "UPDATE `pages` SET
        `page_name` = '$page_name',
        `page_heading` = '$page_heading',
        `page_subheading` = '$page_subheading',
        `page_content` = '$page_content'
        WHERE `page_id` = '$page_id' AND `uid` = '$uid'";

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

    public static function delete($page_id, $token)
    {
        if(usersession::authorize($token) === true)
        {
            if(!$conn)
        {
            $conn = database::getConnection();
        }

        $sql = "DELETE FROM `pages`
        WHERE ((`page_id` = '$page_id'))";

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

    public static function no_of_pages($uid)
    {
        if(!$conn)
        {
            $conn = database::getConnection();
        }
        
        $sql = "SELECT * FROM `pages` WHERE `uid` = '$uid'";
        $result = $conn->query($sql);
        if($result)
        {
           echo $result->num_rows;
        }
    }
}