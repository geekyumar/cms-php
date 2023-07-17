<?php

class products
{
    public static function create($product_image, $product_name, $product_description, $token, $uid)
    {
        if(usersession::authorize($token) === true)
        {
            if(!$conn)
        {
            $conn = database::getConnection();
        }
       
        $product_id = md5(rand(0,9999). $product_image . $product_name . $uid);

        $sql = "INSERT INTO `products` (`uid`, `product_id`, `product_image`, `product_name`, `product_description`, `product_create_time`) 
            VALUES ('$uid', '$product_id', '$product_image', '$product_name', '$product_description', now())";

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

        $sql = "SELECT * FROM `products` WHERE `uid` = '$uid'";
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

    public static function edit($product_id, $product_name, $product_description, $token, $uid)
    {
        if(usersession::authorize($token) === true)
        {
            if(!$conn)
        {
            $conn = database::getConnection();
        }

        $sql = "UPDATE `products` SET
        `product_name` = '$product_name',
        `product_description` = '$product_description'
        WHERE `uid` = '$uid' AND `product_id` = '$product_id'";

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

    public static function delete($product_id, $token, $uid)
    {
        if(usersession::authorize($token) === true)
        {
            if(!$conn)
        {
            $conn = database::getConnection();
        }

        $sql = "DELETE FROM `products`
        WHERE ((`product_id` = '$product_id')) AND `uid` = '$uid'";

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

    public static function no_of_products($uid)
    {
        if(!$conn)
        {
            $conn = database::getConnection();
        }
        
        $sql = "SELECT * FROM `products` WHERE `uid` = '$uid'";
        $result = $conn->query($sql);
        if($result)
        {
           echo $result->num_rows;
        }
    }
}