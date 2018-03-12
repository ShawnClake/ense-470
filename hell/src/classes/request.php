<?php

session_start();

require_once 'db.php';

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
	
	

}

class eRequestStatus
{
	const APPROVED = "APPROVED";
	const AWAITING_APPROVAL = "AWAITING_APPROVAL";
	const REQUIRE_EDIT = "REQUIRE_EDIT";
	const DENIED = "DENIED";
	const REMOVED = "REMOVED";
}






