<?php  
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

// Add endpoint to fetch lmassa2il shouf kidir meah 
if(isset($_GET['action']) && $_GET['action'] == 'fetchGaugeValue') {
    $query = "SELECT `flow` FROM `sensors` WHERE `id` = 2"; 
    $result = mysqli_query($conn, $query);

    if($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo json_encode($row['level_remote']);
    } else {
        echo json_encode(null);
    }
    exit;
}
// khdm bhadi ` mashi hadi ' 
// Code to insert values into the database
// $query = "INSERT INTO `remote control` (`id`, `remote_checked`, `level_remote`) VALUES (1, 1, 3.5)";
// $result = mysqli_query($conn, $query);

// if($result) {
//     echo "Values inserted successfully.";
// } else {
//     echo "Error inserting values: " . mysqli_error($conn);
// }
?>
