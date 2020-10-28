<?php
$serverName = "localhost";
$username = "root";
$password = "root";

$conn = new mysqli($serverName, $username, $password);

if ($conn->connect_error){
    die("Connection failed " . $conn->connect_error);
}

$sql = "CREATE DATABASE Family";
if ($conn->query($sql) === TRUE){
    echo "Database created successfully";
}
else{
    echo "Error in creating the database: " . $conn->error;
}

$conn->close()
?>
