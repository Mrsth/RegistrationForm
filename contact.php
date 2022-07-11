<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";
$note = "";



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SESSION['flag']) == null) {
    header("Location: index.php");
}


$fname = $email = $msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cid = bin2hex(random_bytes(10));
    $fname = $_POST["fname"];
    $email = $_POST["email"];
    $msg = $_POST["msg"];

    $sql = "INSERT INTO contact (cid, fullname, email, msg) VALUES ('$cid', '$fname', '$email', '$msg')";
    if ($conn->query($sql) === TRUE) {
        $note =  "Your message inserted successfully";
    }
}
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="blog.css">
</head>

<body>
    <div class="navbar">
        <ul class="ul">
            <div>
                <li class="li" style="margin-right:10px"><a class="a" href="blog.php">Home</a></li>
                <li class="li" style="margin-right:10px"><a class="a" href="contact.php">Contact</a></li>
            </div>

            <li class="li"><a class="a" type="submit" name="submit" href="logout.php">Logout</a></li>
        </ul>



        <div class="contact-form" style="margin-left: 25%; margin-top:  5%; width:50%">
            <h2 style="color:black">Contact Us</h2>
            <span class="success" style="color:green ;text-align:center;"><?php echo $note; ?></span>
            <form method="POST" class="contact-form" id="contact-form">
                <div class="form-group">
                    <label for="fullName"><i class="zmdi zmdi-account material-icons-name"></i></label>
                    <input type="text" name="fname" id="fname" placeholder="Your name" />
                </div>
                <div class="form-group">
                    <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                    <input type="text" name="email" id="email" placeholder="Your email" />
                </div>
                <div class="form-group">
                    <textarea rows="4" cols="50" placeholder="Please enter your message" name="msg"></textarea>
                </div>
                <div class="form-group form-button">
                    <input type="submit" name="signin" id="signin" class="form-submit" value="Submit" />
                </div>
            </form>

        </div>

    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>