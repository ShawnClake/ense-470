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

$myrequests = authentication::getMyRequests();
//var_dump($myrequests);

?>


<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://openrubicon.com/470/libs/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://openrubicon.com/470/libs/css/animate.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap4.min.css" rel="stylesheet"/>
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
        <div class="col-10 offset-1 ">
            <h1>My Requests</h1>
            <table id="thedata" class="table table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Software</th>
                    <th scope="col">Note</th>
                    <th scope="col">Status</th>
                    <th scope="col">Created</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php

                if(count($myrequests) < 1)
                {
                    echo "You have no software requests. <a href='request.php'>Make a request.</a>";
                }

                foreach($myrequests as $row)
                {
                    echo "<tr>";

                    $id = $row['id'];
                    $software = request::getSoftwareWithID($row['software_id'])[0];
                    $note = json_decode($row['data'], true)['note'];
                    //$note = $note;
                    $status = $row['status'];
                    $created = $row['created_at'];


                    if($software['acronym'] != "")
                        $software = $software['name'] . " - " . $software['acronym'];
                    else
                        $software = $software['name'];

                    echo "<th scope='row'>$id</th>";

                    echo "<td>$software</td>";

                    echo "<td>$note</td>";

                    echo "<td>$status</td>";

                    echo "<td>$created</td>";


                    echo "<td>";
                    if($status == eRequestStatus::REQUIRE_EDIT)
                        echo "<button type='button' class='btn btn-sm form-inline btn-primary open-editRow' data-toggle='modal' data-software='$software' data-note='$note' data-id='$id' data-target='#editRow'><i class='fas fa-pencil-alt'></i></button>";

                    if($status != eRequestStatus::REMOVED)
                        echo "<a href='remove_request.php?id=$id' data-toggle='tooltip' data-placement='right' title='Remove Request' class='btn btn-sm btn-danger form-inline' ><i class=\"fas fa-times\"></i></a>";

                    echo "</td>";

                    echo "</tr>";
                }

                ?>
                </tbody>
            </table>

            <!-- Modal -->
            <div class="modal fade" id="editRow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form id="edit" action="edit_request.php" method="post">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Request</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="software">Software</label>
                                    <input type="text" class="form-control" id="software" name="software" value="the software" readonly>

                                </div>
                                <div class="form-group">
                                    <label for="note">Note</label>
                                    <input type="text" class="form-control" id="note" name="note" value="the note">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="id" name="id" value="">
                                </div>


                            </div>
                            <div class="modal-footer">
                                <div class="form-group text-right">
                                    <div class="text-right" style="display:inline;">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-lg btn-success">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="submitRow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <p>Your request has been submitted</p>
                            <div style="font-size:8em;" class="text-center">
                            <span class="text-center"><i style="color:green;" class="fas fa-check-circle"></i></span>
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

            <div class="modal fade" id="submitEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <p>Your request has been edited</p>
                            <div style="font-size:8em;" class="text-center">
                                <span class="text-center"><i style="color:green;" class="fas fa-check-circle"></i></span>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.13/js/dataTables.bootstrap4.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>
<script src="https://openrubicon.com/470/libs/js/bootstrap.min.js"></script>

<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>

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
        $('[data-toggle="tooltip"]').tooltip();
        $('#thedata').DataTable( {
            "order": [[ 3, "asc" ]]
        } );
        $('#thedata_info').css('width', '300px');

        if(getUrlParams('s') === 'success')
            $('#submitRow').modal('show');

        if(getUrlParams('s') === 'edit-success')
            $('#submitEdit').modal('show');

    });

    $(document).on("click", ".open-editRow", function () {
        var software = $(this).data('software');
        var note = $(this).data('note');
        var id = $(this).data('id');
        $(".modal-body #software").val( software );
        $(".modal-body #note").val( note );
        $(".modal-body #id").val( id );
        // As pointed out in comments,
        // it is superfluous to have to manually call the modal.
        // $('#addBookDialog').modal('show');
    });
</script>


</body>
</html>










