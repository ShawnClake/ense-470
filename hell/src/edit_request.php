<?php

error_reporting(E_ALL);
ini_set("display_errors","On");

include 'classes/request.php';

//$software = $_POST['software'];
$note = $_POST['note'];
$id = $_POST['id'];

request::updateRequestAndData($id, ['note' => $note], eRequestStatus::AWAITING_APPROVAL);

header('Location: '."http://144.217.7.184/requests.php?s=edit-success");

?>

<html>



</html>