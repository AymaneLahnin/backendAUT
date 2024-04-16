<?php

header("Access-Control-Allow-Origin: http://127.0.0.1:5501");


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "examAutDB";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$levelValue = $_POST['levelValue'];
$isChecked = ($_POST['isChecked'] == 'true') ? 1 : 0; // Convert string 'true'/'false' to boolean 1/0

// Prepare and execute SQL query to insert/update the values into the database
$sql = "INSERT INTO `remote control` (level_remote, remote_checked) VALUES ('$levelValue', $isChecked)";

if ($conn->query($sql) === TRUE) {
    echo "Values inserted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
