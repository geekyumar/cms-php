<?php

class usersession
{
    public static function authenticate($user, $pass)
    {
        $result = user::login($user, $pass);
        if ($result) {

            $conn = database::getConnection();

            $sql = "SELECT * FROM `users` WHERE `username` = '$user'";

            $result1 = $conn->query($sql);
            if($result1->num_rows == 1)
            {
                $row = $result1->fetch_assoc();
                $uid = $row['id'];
            }
            else
            {
                die("Invalid user");
            }
            $userobj = new user($uid);
            $username = $userobj->username;
            $id = $userobj->id;
            $user_ip = $_SERVER['REMOTE_ADDR'];
            $session_token = md5(rand(0, 9999) . $username . $user_ip);
            $user_agent = $_SERVER['HTTP_USER_AGENT'];

            $conn = database::getConnection();

            $sql = "INSERT INTO `sessions` (`uid`, `username`, `session_token`, `user_ip`,`login_time`, `user_agent`) VALUES ('$id', '$username', '$session_token','$user_ip', now(), '$user_agent')";

            $result = $conn->query($sql);

            if ($result) {
                session::set('session_token', $session_token);
                session::set('session_user', $userobj->username);
                session::set('user_id', $userobj->id);

                return true;
            } else {
                return false;

            }
        } else {
           return false;
        }

    }

    public static function authorize($token)
    {
        $host_ip = $_SERVER['REMOTE_ADDR'];
        $host_useragent = $_SERVER['HTTP_USER_AGENT'];

        $conn = database::getConnection();

        $sql = "SELECT * FROM `sessions` WHERE `session_token` = '$token'";

        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $session_ip = $row['user_ip'];
            $session_useragent = $row['user_agent'];
        } else {
            session::unset_all();
            die('<pre>Session Token not found from database. Try clearing your cookies and Login again :) <a href="../login">Login</a></pre>');
        }

        if ($host_ip == $session_ip and $host_useragent == $session_useragent) {
            return true;
        } else {

            $sql = "DELETE FROM `sessions` WHERE ((`session_token` = '$token'))";
            $conn->query($sql);
            session::destroy();
            session::unset_all();
            die('<pre>You hijacked this session by copying someones cookies, Session Destroyed.<a href="../login">Login</a></pre>');

        }

    }

    public function __construct($token)
    {

        $conn = database::getConnection();

        $sql = "SELECT * FROM `sessions` WHERE `session_token` = '$token'";

        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $this->data = $row;
            $this->id = $row['uid'];
            $this->username = $row['username'];
            $this->ip = $row['user_ip'];
            $this->user_agent = $row['user_agent'];
        } else {
            echo "Session is invalid. Please try to login again.";
            throw new Exception("Session token is invalid. Try to login again.");
        }

    }

    public static function isValid($token)
    {
        $conn = database::getConnection();
        $sql = "SELECT * FROM `sessions` WHERE `session_token` = '$token'";

        $result = $conn->query($sql);
        {
            if ($result->num_rows == 1) {
                return true;
            } else {
                die("Session is invalid. Try to login again.");
            }

        }

    }

}
