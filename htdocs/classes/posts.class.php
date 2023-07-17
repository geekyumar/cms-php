<?php

class posts
{
    public static function create($post_image, $post_name, $post_description, $token, $uid)
    {
        if(usersession::authorize($token) === true)
        {
            if(!$conn)
        {
            $conn = database::getConnection();
        }
       
        $post_id = md5(rand(0,9999). $post_image . $post_name . $uid);

        $sql = "INSERT INTO `posts` (`uid`, `post_id`, `post_image`, `post_name`, `post_description`, `post_create_time`) 
            VALUES ('$uid', '$post_id', '$post_image', '$post_name', '$post_description', now())";

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

        $sql = "SELECT * FROM `post` WHERE `uid` = '$uid'";
        $result = $conn->query($sql);

        if($result)
        {
            if($result->num_rows)
            {
                return $result->fetch_assoc();
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

    public static function update($post_name, $post_link, $token, $uid)
    {
        if(usersession::authorize($token) === true)
        {
            if(!$conn)
        {
            $conn = database::getConnection();
        }

        $sql = "UPDATE `post` SET
        `post_name` = '$post_name',
        `post_link` = '$post_link',
        WHERE `uid` = '$uid'";

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

    public static function delete($post_id, $token)
    {
        if(usersession::authorize($token) === true)
        {
            if(!$conn)
        {
            $conn = database::getConnection();
        }

        $sql = "DELETE FROM `post`
        WHERE ((`post_id` = '$post_id'))";

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
}