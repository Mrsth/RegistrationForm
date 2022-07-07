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


$sql = "INSERT INTO user_register 
(user_id, first_name, last_name, email, the_password, registered, created, updated, the_role) 
VALUES 
('100', 'Manish', 'Shrestha', 'abc@abc.com', 'test', '0', current_timestamp(), current_timestamp(), 'admin')
";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
