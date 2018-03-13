<?php

session_start();

require_once 'db.php';

class authentication
{

    public static function login($email, $password="")
    {
        $db = DB::Instance()->conn;
        $sql = "SELECT * FROM `users` WHERE `email`='$email'";
        $result = $db->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            if(password_verify($password, $row['password']))
                $_SESSION['user'] = $row['id'];
        }
    }


    public static function isLoggedIn()
    {
        if(isset($_SESSION['user']))
            return true;
        return false;
    }


    public static function logout()
    {

        if(isset($_SESSION['user']))
            session_destroy();


    }

    public static function isApprover()
    {
        if(!isset($_SESSION['user']))
            return false;

        $db = DB::Instance()->conn;

        $sql = "SELECT * FROM `approvers` WHERE `user_id`=". $_SESSION['user'];
        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            return true;
        }

        return false;
    }

    public static function isAnalyst()
    {
        if(!isset($_SESSION['user']))
            return false;

        $db = DB::Instance()->conn;

        $sql = "SELECT * FROM `analysts` WHERE `user_id`=". $_SESSION['user'];
        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            return true;
        }

        return false;
    }

    public static function getMyRequests()
    {
        if(!isset($_SESSION['user']))
            return false;

        $db = DB::Instance()->conn;

        $sql = "SELECT * FROM `requests` WHERE `user_id`=". $_SESSION['user'];
        $result = $db->query($sql);



        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        return false;
    }

    public static function getApproverSoftware()
    {
        if(!isset($_SESSION['user']))
            return false;

        $db = DB::Instance()->conn;

        $sql = "SELECT * FROM `approvers` WHERE `user_id`=". $_SESSION['user'];
        $result = $db->query($sql);

        $software = [];

        while ($row = $result->fetch_assoc()) {
            $software[] = $row['software_id'];
        }
        //var_dump($result->fetch_all(MYSQLI_ASSOC));
        //var_dump(array_column($result->fetch_all(MYSQLI_ASSOC), 'software_id'));

        if ($result->num_rows > 0) {
            return $software;
        }


    }

    public static function getApproverRequests()
    {
        if(!isset($_SESSION['user']))
            return false;

        $db = DB::Instance()->conn;

        $sql = "SELECT * FROM `requests` WHERE `approver_id`=". $_SESSION['user'];
        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        return false;
    }

    public static function getPendingApproverRequests()
    {
        if(!isset($_SESSION['user']))
            return false;

        $db = DB::Instance()->conn;

        $sql = "SELECT * FROM `requests` WHERE `status`='AWAITING_APPROVAL'";
        $result = $db->query($sql);

        $requests = [];

        $approversSoftware = authentication::getApproverSoftware();

        while ($row = $result->fetch_assoc()) {
            if(in_array($row['software_id'], $approversSoftware))
            {
                $requests[] = $row;
            }

        }

        return $requests;
    }

    public static function getAnalystRequests()
    {
        if(!isset($_SESSION['user']))
            return false;

        $db = DB::Instance()->conn;

        $sql = "SELECT * FROM `requests` WHERE `analyst_id`=". $_SESSION['user'];
        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        return false;
    }

    public static function getPendingAnalystRequests()
    {
        if(!isset($_SESSION['user']))
            return false;

        $db = DB::Instance()->conn;

        $sql = "SELECT * FROM `requests` WHERE `approver_id`=". $_SESSION['user'];
        $result = $db->query($sql);

        $requests = [];

        while ($row = $result->fetch_assoc()) {
            if($row['status'] == 'APPROVED')
                $requests[] = $row;
        }

        return $requests;
    }

    public static function register($email, $password)
    {


    }
}