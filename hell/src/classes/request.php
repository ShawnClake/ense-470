<?php

session_start();

require_once 'db.php';
require_once 'mail.php';

class request
{
	public static function getSoftware()
    {
        if(!isset($_SESSION['user']))
            return false;

        $db = DB::Instance()->conn;

        $sql = "SELECT * FROM `software`";
        $result = $db->query($sql);

        $software = [];

        while ($row = $result->fetch_assoc()) {
            $software[] = $row;
        }

        if ($result->num_rows > 0) {
            return $software;
        }
    }

    public static function getSoftwareWithID($id)
    {
        if(!isset($_SESSION['user']))
            return false;

        $db = DB::Instance()->conn;

        $sql = "SELECT * FROM `software` WHERE `id`=$id";
        $result = $db->query($sql);

        $software = [];

        while ($row = $result->fetch_assoc()) {
            $software[] = $row;
        }

        if ($result->num_rows > 0) {
            return $software;
        }
    }

    public static function submitRequest($software, $note)
    {
        if(!isset($_SESSION['user']))
            return false;

        $db = DB::Instance()->conn;

        $softwareName = explode(" - ", $software)[0];

        //var_dump($softwareName);

        //echo "$softwareName <br>";

        $sqlp = "SELECT * FROM `software` WHERE `name`='$softwareName'";
        $resultp = $db->query($sqlp);
        if ($resultp->num_rows > 0) {

            $softwareId = $resultp->fetch_assoc()['id'];

            $userid = $_SESSION['user'];
            $data = json_encode(['note' => $note]);

            //echo "$softwareId <br>";
            //echo "$userid <br>";
            //echo "$data <br>";

            $sql = "INSERT INTO `requests` (`user_id`, `software_id`, `data`) VALUES ('$userid', '$softwareId', '$data')";

            mysqli_query($db, $sql);
        }


    }

    public static function updateRequest($id, $status)
    {
        if(!isset($_SESSION['user']))
            return false;

        $db = DB::Instance()->conn;

        $sql = "UPDATE `requests` SET `status`='$status' WHERE `id`='$id'";

        mysqli_query($db, $sql);
    }

    public static function approverUpdateRequest($id, $status)
    {
        if(!isset($_SESSION['user']))
            return false;

        $db = DB::Instance()->conn;

        $auid = $_SESSION['user'];

        $sql = "UPDATE `requests` SET `status`='$status',`approver_id`='$auid' WHERE `id`='$id'";

        mysqli_query($db, $sql);
    }

    public static function analystUpdateRequest($id)
    {
        if(!isset($_SESSION['user']))
            return false;

        $db = DB::Instance()->conn;

        $auid = $_SESSION['user'];

        $sql = "UPDATE `requests` SET `analyst_id`='$auid' WHERE `id`='$id'";

        mysqli_query($db, $sql);

        $sql2 = "SELECT * FROM `requests` WHERE `id`='$id'";
        $result2 = $db->query($sql2);

        if ($result2->num_rows == 1) {
            $row2 = $result2->fetch_assoc();
            $uid = $row2['user_id'];
            $sql3 = "SELECT * FROM `users` WHERE `id`='$uid'";
            $result3 = $db->query($sql3);
            if ($result3->num_rows == 1) {
                $row3 = $result3->fetch_assoc();

                Mail::send($row3['email'], 'Your request has been implemented', 'You are receiving this message to notify you that a recent software request has been approved.');
            }

        }




    }

    public static function updateRequestAndData($id, $data, $status)
    {
        if(!isset($_SESSION['user']))
            return false;

        $db = DB::Instance()->conn;

        $data = json_encode($data);

        $sql = "UPDATE `requests` SET `data`='$data', `status`='$status' WHERE `id`='$id'";

        mysqli_query($db, $sql);
    }
	
	

}

class eRequestStatus
{
	const APPROVED = "APPROVED";
	const AWAITING_APPROVAL = "AWAITING_APPROVAL";
	const REQUIRE_EDIT = "REQUIRE_EDIT";
	const DENIED = "DENIED";
	const REMOVED = "REMOVED";
}






