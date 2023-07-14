<?php

class user
{

    public static function signup($name, $username, $email, $phone, $pass, $regid)
    {
        $password = password_hash($pass, PASSWORD_BCRYPT);
        
        $conn = database::getConnection();

        $sql1 = "SET @@session.time_zone = '+05:30'";

        $sql2 = "INSERT INTO `users` (`name`,`username`, `email`,`phone`,`reg_id`)
    VALUES ('$name','$username', '$email', '$phone', '$regid')";

       

        if ($conn->query($sql1) and $conn->query($sql2) === true) {
             return true;
            } 
            else 
            {
            return false;
             }

    }

    public static function login($username, $password)
    {
        $conn = database::getConnection();

        $sql = "SELECT * FROM `login` WHERE `username` = '$username'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $pass_verify = password_verify($password, $row['password']);
            if ($pass_verify === true) {
                return true;
            } else {
                die("Error 401: Invalid Credentials");
            }

        } else {

            die("Error 401: Invalid Credentials");

        }

    }

    public function __construct($id)
    {
        $conn = database::getConnection();
        $sql = "SELECT * FROM `users` WHERE `id` = '$id'";

        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $this->id = $row['id'];
            $this->name = $row['name'];
            $this->username = $row['username'];
            $this->age = $row['age'];
            $this->gender = $row['gender'];
            $this->dob = $row['dob'];
            $this->email = $row['email'];
            $this->phone = $row['phone'];
            $this->reg_id = $row['reg_id'];

        } else {

            die("Invalid Username");

        }
    }

    public static function no_of_users()
    {
        $conn = database::getConnection();

        $sql = "SELECT * FROM `users`";

        $result = $conn->query($sql);

        if ($result) {
            echo $result->num_rows;
        } else {
            return false;
        }
    }

    public static function signout_all($uid)
    {
        $conn = database::getConnection();
        $sql = "DELETE FROM `sessions` WHERE `uid` = '$uid'";

        $result = $conn->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function update_profile($name, $username, $age, $gender, $dob, $email, $phone)
    {
        if(!$conn)
        {
            $conn = database::getConnection();
        }
        $sql1 = "UPDATE `users` SET
         `name` = '$name',
         `username` = '$username',
         `age` = '$age',
          `gender` = '$gender',
          `dob` = '$dob',
           `email` = '$email',
            `phone` = '$phone'
          WHERE `id` = '$this->id'";

          $sql2 = "UPDATE `login` SET 
            `name` = '$name',
            `username` = '$username'
            WHERE `id` = '$this->id'";
        
        if($conn->query($sql1) && $conn->query($sql2) == true)
        {
            return true;
        }
        else
        {
            return false;
        }

    }
}





