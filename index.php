<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";
$msg = "";
$emailmsg = "";
$passmsg = "";


if ($_SESSION['flag'] == 1) {
    header("Location: dash.php");
}
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function test_input($para1)
{
    $value = trim($para1);
    $value = stripcslashes($value);
    $value = htmlspecialchars($value);
    return $value;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = test_input($_POST["email"]);
    $pass = test_input($_POST["pass"]);

    if (empty($_POST["email"])) {
        $emailmsg = "The field is required";
    } else {
        $email = test_input($_POST["email"]);
    }
    //-------------------------------------------------
    if (empty($_POST["pass"])) {
        $passmsg = "Password field is required";
    } else {
        $pass = test_input($_POST["pass"]);
    }

    $theSelect = "SELECT email, the_password from user_register where email='$email'";
    $result = mysqli_query($conn, $theSelect);
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['email'] === $email && $row['the_password'] === $pass) {
            $_SESSION['email'] = $row['email'];
            $_SESSION['pass'] = $row['the_password'];
            $_SESSION['flag'] = 1;

            if ($_SESSION['flag'] == 1) {
                header("Location: dash.php");
                exit();
            } else {
                header("Location: index.php");
                exit();
            }
        } else {
            $msg = "Login Failed. No such user.";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="main">

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <center>
                    <h2 class="error" style="color:red;text-align:center;"><?php echo $msg; ?></h2>
                </center>
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="signup.php" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign In</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="email" id="email" placeholder="Your email" />
                                <span class="error" style="color:red;text-align:center;"><?php echo $emailmsg; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="your_pass" placeholder="Password" />
                                <span class="error" style="color:red;text-align:center;"><?php echo $passmsg; ?></span>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>