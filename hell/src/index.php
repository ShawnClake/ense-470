<?php

include 'classes/db.php';
include 'classes/authentication.php';
//error_reporting(E_ALL);
//ini_set("display_errors","On");
session_start();

//$_SESSION['user'] = "test";


$db = DB::Instance()->conn;

$user = null;

if(isset($_SESSION['user']))
{
    $sql = "SELECT * FROM `users` WHERE `id`=".$_SESSION['user'];
    $result = $db->query($sql);
    if ($result->num_rows == 1)
    {
        $user = $result->fetch_assoc();
    }
}

//authentication::getApproverSoftware();

if(authentication::isApprover())
{
    $pending = count(authentication::getPendingApproverRequests());


}


//while ($row = $result->fetch_assoc()) {

    //$username = $row['first_name'] . $row['last_name'];
    //echo $email . "<br>";
    //$pass = password_hash("test123", PASSWORD_DEFAULT);
    //$sql2 = "UPDATE `users` SET `username` = '$username' WHERE `id` =".$row['id'];
    //echo "$sql2 <br>";
    //mysqli_query($db, $sql2);
//}

/*if ($result->num_rows > 0) {
    $out = array();
    $out = $result->fetch_all();
    echo json_encode($out);
} else {
    return;
}*/


?>


<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://openrubicon.com/470/libs/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://openrubicon.com/470/libs/css/animate.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


</head>

<body style="background-color:#E3D3D3;">

<div class="container">

    <nav class="navbar navbar-light navbar-expand-lg" style="background-color:rgba(0,0,0,0.1);">
        <a class="navbar-brand" href="#">
            <img src="/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
            HELL
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <?php if(isset($_SESSION['user'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="request.php">New Requests</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="requests.php">My Requests</a>
                    </li>
                    <?php if(authentication::isApprover() || authentication::isAnalyst()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="manage.php">Manage Requests <?php if(isset($pending) && $pending > 0): echo "<div class='animated infinite bounce' style='color:#630000;display:inline;'>($pending)</div>"; endif; ?></a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="logout.php">Logout</a>
                    </li>
                <?php endif; ?>
                <?php if(!isset($_SESSION['user'])): ?>
                    <!---<li class="nav-item">
                        <a class="nav-link disabled" href="#">Login</a>
                    </li>-->
                <?php endif; ?>

            </ul>
        </div>

    </nav>
</div>

<div class="container">
    <div class="jumbotron jumbotron-fluid text-center" style="height:200px;background-color:rgba(0,0,0,0);">
        <!---background-color:#E3CCCC">-->
        <div class="container animated infinite pulse">
            <h1 class="display-3">HELL's Tech Support</h1>
            <?php if(!isset($_SESSION['user'])): ?>
                <p class="lead">Come, try our software.</p>
            <?php else: ?>
                <p class="lead">Welcome back<?php if(isset($user)): echo " " . $user['first_name']; endif; ?>.</p>
            <?php endif; ?>
        </div>
    </div>


    <div class="row">
        <div class="col-6 offset-3 ">
            <?php if(!isset($_SESSION['user'])): ?>
                <h3>Login</h3>
                <form id="login" action="login.php" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            <?php else: ?>
                <div class="form-group text-center">
                    <div class="text-center" style="display:inline;">
                        <a href="request.php" class="btn btn-lg btn-primary form-inline">New Request</a>
                    </div>
                    <?php if(authentication::isApprover() || authentication::isAnalyst()): ?>
                        <div class="text-center" style="display:inline;">
                            <a href="manage.php" class="btn btn-lg btn-primary form-inline">Manage Requests</a>
                        </div>
                    <?php endif; ?>
                    <div class="text-center" style="display:inline;">
                        <a href="requests.php" class="btn btn-lg btn-success form-inline">My Requests</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="row" style="margin-top:25px;">
        <div class="col-sm">
            <h5 class="text-center">Approvers Near You</h5>

            <div style="padding:15px;">
                <div class="card" style="padding:10px;background-color:rgba(255,255,255,0.2);">
                    <img class="card-img-top" src="http://openrubicon.com/470/assets/chewwy.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Dr. Jed I. Knight</h5>
                        <p class="card-text">Hey, never be afraid to come by and talk about your software requests. I
                            assure you, I don't bite, unless I'm hungry.. If you need me, I'll be in the Falcon.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm">
            <h5>Latest Software</h5>
        </div>
        <div class="col-sm">
            <h5>Your Neighborhood IT</h5>
        </div>


    </div>


</div>

<script src="https://openrubicon.com/470/libs/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>
<script src="https://openrubicon.com/470/libs/js/bootstrap.min.js"></script>
</body>
</html>










