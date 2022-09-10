<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
</head>
<body>
    <br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <table id="example" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Country</th>
                                <th>Created</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Country</th>
                                <th>Created</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>                                
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script>


        !(function($){
            let table = new DataTable('#example', {
                "processing": true,
                "serverSide": true,
                ajax: 'models/fetch.php',
            });
        })(jQuery);
    </script>
</body>
</html>




<?php 
// Database connection info 
$dbDetails = array( 
    'host' => 'localhost', 
    'user' => 'root', 
    'pass' => '', 
    'db'   => 'apitest' 
); 
 
// DB table to use 
$table = 'members'; 
 
// Table's primary key 
$primaryKey = 'id'; 
 

$columns = array(
    array("defaultContent: <button id='myBtn' type='button' class='btn'>Manage</button>", "dt" => 0),
    array("db" => "usrId", "dt" => 1),
    array("db" => "usrFullName", "dt" => 2),
    array("db" => "usrName", "dt" => 3),
    array("db" => "usrPhone", "dt" => 4),
    array("db" => "usrCreateDate","dt" => 5, "formatter" => function($d, $row) {return date("d-m-Y", strtotime($d));})
  );





// Array of database columns which should be read and sent back to DataTables. 
// The `db` parameter represents the column name in the database.  
// The `dt` parameter represents the DataTables column identifier. 
$columns = array( 
    array( 'db' => 'first_name', 'dt' => 0 ), 
    array( 'db' => 'last_name',  'dt' => 1 ), 
    array( 'db' => 'email',      'dt' => 2 ), 
    array( 'db' => 'gender',     'dt' => 3 ), 
    array( 'db' => 'country',    'dt' => 4 ), 
    array( 
        'db'        => 'created', 
        'dt'        => 5, 
        'formatter' => function( $d, $row ) { 
            return date( 'jS M Y', strtotime($d)); 
        } 
    ), 
    array( 
        'db'        => 'status', 
        'dt'        => 6, 
        'formatter' => function( $d, $row ) { 
            // return ($d == 1)?'Active':'Inactive'; 
            return ($d == 1)?'<span class="badge bg-success">Active</span>':'<span class="badge text-dark bg-warning">Inactive</span>'; 
        } 
    ),
    array( 
        'db'        => 'id', 
        'dt'        => 7, 
        'formatter' => function( $d, $row ) { 
            $action = '<a class="btn btn-warning btn-sm me-2" href="?action=edit&id='.$d.'">Edit</a>'; 
            $action .='<a class="btn btn-danger btn-sm" href="?action=delete&id='.$d.'">Delete</a>'; 
            return $action;
        } 
    ) 
); 
 
// Include SQL query processing class 
require 'ssp.class.php'; 
 
// Output data as json format 
echo json_encode( 
    SSP::simple( $_GET, $dbDetails, $table, $primaryKey, $columns ) 
);