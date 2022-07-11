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

//Create database
// $sql = "CREATE DATABASE if not exists blog";
// if ($conn->query($sql) === TRUE) {
//     echo "New database created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

// Creating contact user_register
// $sql = "CREATE table user_register
// (
//     user_id      varchar(32) unique not null,
//     first_name varchar(15),
//     last_name  varchar(14),
//     email varchar(30),
//     the_password varchar(30),
//     registered int,
//     created timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
//     updated timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
//     the_role varchar(15)
// );";
// if ($conn->query($sql) === TRUE) {
//     echo "New table created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }


// Creating contact table
// $sql = "CREATE table contact
// (
//     cid      varchar(20) unique not null,
//     fullname text,
//     email  text,
//     msg text
// );";

// if ($conn->query($sql) === TRUE) {
//     echo "New table created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

// Creating contact blog
// $sql = "CREATE table blog
// (
//     id      varchar(20) unique not null,
//     tittle text,
//     author  text,
//     created text,
//     updated text
// );";
// if ($conn->query($sql) === TRUE) {
//     echo "New table created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

// Creating contact blog_details
// $sql = "CREATE table blog_detail
// (
//     blog_detail_id varchar(20) not null,
//     title text default '' null,
//     image longblob,
//     content text,
//     created text,
//     updated text,
//     image_desc text,
//     blog_id varchar(20) not null ,
//     primary key (blog_detail_id),
//     foreign key (blog_id) references blog (id)
//         ON UPDATE CASCADE ON DELETE RESTRICT
// );";
// if ($conn->query($sql) === TRUE) {
//     echo "New table created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

// Creating comment table
$sql = "CREATE table comment
(
    cmt_id varchar(20) not null,
    author varchar(30) not null,
    content text,
    createdDate timestamp,
    blog_id varchar(20) not null ,
    primary key (cmt_id),
    foreign key (blog_id) references blog (id)
        ON UPDATE CASCADE ON DELETE RESTRICT
);
";
if ($conn->query($sql) === TRUE) {
    echo "New table created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
