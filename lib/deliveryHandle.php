SELECT * FROM tbl_delivery NATURAL JOIN tbl_order_track WHERE track_status="Dispatched"

<?php
require_once("dbconnection.php");
if (isset($_GET["type"])) {
    $type = $_GET["type"];
    $type();
}

function getOrder()
{
    $conn = DB::connectDB();

    $sql = "SELECT * FROM tbl_delivery NATURAL JOIN tbl_order_track WHERE track_status="Dispatched";";
    $result = $conn->query($sql);
    $output = "<tr value='deli_id'></tr>";
    $rows = $result->num_rows;
    if ($rows > 0) {
        while ($rec = $result->fetch_assoc()) {
            $output .= "<tr><td>" . $rec["deli_id"] . "</td><td>" . $rec["order_id"] . "</td><td>" . $rec["deli_estimate_date"] . "</td><td>" . $rec["deliver_person_id"] . "</td><td>" . $rec["track_status"] . "</td></tr><br>";
        }
        
        return $output;
        $conn->close();
    } else {
        return "No Records";
    }
}

function viewOrder()
{
    $table = 'deliveryview';

    // Table's primary key
    $primaryKey = 'deli_id';

    $columns = array(
        array('db' => 'deli_id', 'dt' => 0),
        array('db' => 'order_id',  'dt' => 1),
        array('db' => 'cus_id',  'dt' => 2),
        array('db' => 'deliver_person_id',   'dt' => 3),
        array('db' => 'track_status',    'dt' => 4)
    );

    // SQL server connection information
    require_once("config.php");
    $host = Config::$host;
    $uname = Config::$db_uname;
    $pass = Config::$db_pass;
    $db = Config::$dbname;

    $sql_details = array(
        'user' => $uname,
        'pass' => $pass,
        'db'   => $db,
        'host' => $host
    );

    require('ssp.class.php');

    echo json_encode(
        SSP::complex($_POST, $sql_details, $table, $primaryKey, $columns)
    );
}
