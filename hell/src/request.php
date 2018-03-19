<?php
//ini_set("display_errors","On");
//error_reporting(E_ALL);
include 'classes/db.php';
include 'classes/request.php';
include 'classes/authentication.php';

session_start();

if(!isset($_SESSION['user']))
{
    header('Location: '."http://144.217.7.184");
}

$db = DB::Instance()->conn;

$software = request::getSoftware();

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
        <a class="navbar-brand" href="index.php">
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
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
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
                            <a class="nav-link" href="manage.php">Manage Requests <?php if(authentication::isApprover()) {$pending = count(authentication::getPendingApproverRequests());} if(isset($pending) && $pending > 0): echo "<div class='animated infinite bounce' style='color:#630000;display:inline;'>($pending)</div>"; endif; ?></a>
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

    <div class="row" style="margin-top:25px;">
        <div class="col-6 offset-3 ">
            <h3>New Request</h3>
            <form id="request" action="submit_request.php" method="post">
                <div class="form-group">
                    <label for="software">Software</label>
                    <input type="text" class="form-control" id="software" name="software" list="softwareList" placeholder="Choose Software">
                    <datalist id="softwareList">
                        <?php

                            foreach($software as $entry)
                            {
                                $name = "";
                                foreach($entry as $col => $value)
                                {
                                    if($col == 'name')
                                        $name .= $value;
                                    elseif($col == 'acronym')
                                        $name .= ' - ' . $value;
                                }
                                echo "<option value='$name'>";
                            }
                        ?>
                    </datalist>
                </div>
                <div class="form-group">
                    <label for="note">Note</label>
                    <input type="text" class="form-control" id="note" name="note" placeholder="Enter a note for the approver">
                </div>
                <div class="form-group text-right">
                    <div class="text-right" style="display:inline;">
                        <a href="index.php" class="btn btn btn-danger form-inline">Cancel</a>
                        <button type="submit" class="btn btn-lg btn-success">Submit</button>
                    </div>
                </div>

            </form>


            <div class="modal fade" id="formFail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Failed</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <p>Your request was not submitted as fields were filled out improperly</p>
                            <div style="font-size:8em;" class="text-center">
                                <span class="text-center"><i style="color:darkred;" class="fas fa-times"></i></span>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <div class="form-group text-right">
                                <div class="text-right" style="display:inline;">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<script src="https://openrubicon.com/470/libs/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>
<script src="https://openrubicon.com/470/libs/js/bootstrap.min.js"></script>

<script>


    /**
     * JavaScript Get URL Parameter
     *
     * Taken from Kevin Leary
     * https://www.kevinleary.net/javascript-get-url-parameters/
     *
     * @param String prop The specific URL parameter you want to retreive the value for
     * @return String|Object If prop is provided a string value is returned, otherwise an object of all properties is returned
     */
    function getUrlParams( prop ) {
        var params = {};
        var search = decodeURIComponent( window.location.href.slice( window.location.href.indexOf( '?' ) + 1 ) );
        var definitions = search.split( '&' );

        definitions.forEach( function( val, key ) {
            var parts = val.split( '=', 2 );
            params[ parts[ 0 ] ] = parts[ 1 ];
        } );

        return ( prop && prop in params ) ? params[ prop ] : params;
    }

    $(document).ready(function(){

        if(getUrlParams('s') === 'formfail')
            $('#formFail').modal('show');


    });

</script>

</body>
</html>










