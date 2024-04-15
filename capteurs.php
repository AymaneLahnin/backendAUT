<?php 

// Allow requests from any origin
header('Access-Control-Allow-Origin: *');
// Allow GET requests
header('Access-Control-Allow-Methods: GET');
// Allow headers for CORS preflight requests
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

$db_server="localhost";
$db_user="root";
$db_pass="";
$db_name="examAutDB";//here put the data base name
$conn="";

try {
    $conn=mysqli_connect($db_server,$db_user,$db_pass,$db_name);

} catch (mysqli_sql_exception) {
    echo"connection is failed";
}
function fetchGaugeData($conn) {
    $query = "SELECT * FROM `sensors` ORDER BY id DESC"; 
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    } else {
        return null;
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'fetchGaugeValue') {
    $data = fetchGaugeData($conn);
    echo json_encode($data);
    exit;
}
function fetchHistoricalData($conn) {
    $query = "SELECT * FROM `sensors` ORDER BY id DESC"; 
    $result = mysqli_query($conn, $query);

    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    return $data;
}
if (isset($_GET['action']) && $_GET['action'] == 'fetchHistoricalData') {
    $data = fetchHistoricalData($conn);
    echo json_encode($data);
    exit;
}
?> 