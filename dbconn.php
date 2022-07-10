<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "CREATE table contact
(
    cid      varchar(20) unique not null,
    fullname text,
    email  text,
    msg text
);";

if ($conn->query($sql) === TRUE) {
    echo "New table created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
