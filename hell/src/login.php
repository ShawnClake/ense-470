<?php

//error_reporting(E_ALL);
//ini_set("display_errors","On");

include 'classes/authentication.php';


$email = $_POST["email"];
$password = $_POST["password"];

authentication::login($email, $password);

header('Location: '."http://144.217.7.184/");

?>

<html>



</html>