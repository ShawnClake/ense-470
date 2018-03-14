<?php

//error_reporting(E_ALL);
//ini_set("display_errors","On");

include 'classes/request.php';
include 'classes/authentication.php';

$requestid = $_GET['id'];

session_start();

if(!isset($_SESSION['user']))
    header('Location: '."http://144.217.7.184/");

if(!authentication::isApprover())
    header('Location: '."http://144.217.7.184/requests.php");

$allowed = false;

foreach(authentication::getPendingApproverRequests() as $row)
{
    if($row['id'] == $requestid)
        $allowed = true;
}

if($allowed)
    request::approverUpdateRequest($requestid, eRequestStatus::DENIED);

header('Location: '."http://144.217.7.184/manage.php?s=deny-success");

?>

<html>



</html>