<?php

//error_reporting(E_ALL);
//ini_set("display_errors","On");

include 'classes/request.php';

$software = $_POST['software'];
$note = $_POST['note'];

echo $software;

if(!isset($software) || $software == "")
    header('Location: '."http://144.217.7.184/request.php?s=formfail");
else {
    request::submitRequest($software, $note);

    header('Location: '."http://144.217.7.184/requests.php?s=success");
}



?>

<html>



</html>