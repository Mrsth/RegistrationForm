<?php
$firstName = $lastName = $email = $pass = $confirmPass = "";
$firstNamemsg = $lastNamemsg = $emailmsg = $passmsg = $confirmPassmsg = "";
$message = "";

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = test_input($_POST["firstName"]);
    $lastName = test_input($_POST["lastName"]);
    $email = test_input($_POST["email"]);
    $pass = test_input($_POST["pass"]);
    $confirmPass = test_input($_POST["confirmPass"]);

    // Empty check
    if (empty($_POST["firstName"])) {
        $firstNamemsg = "The field is required";
    } else {
        $firstName = test_input($_POST["firstName"]);
    }
    //--------------------------------------------------------------------------------------------
    if (empty($_POST["lastName"])) {
        $lastNamemsg = "The field is required";
    } else {
        $lastName = test_input($_POST["lastName"]);
    }
    //--------------------------------------------------------------------------------------------
    if (empty($_POST["email"])) {
        $emailmsg = "The field is required";
    } else {
        $email = test_input($_POST["email"]);
    }
    //--------------------------------------------------------------------------------------------
    if (empty($_POST["pass"])) {
        $passmsg = "Password field is required";
    } else {
        $pass = test_input($_POST["pass"]);
    }
    //--------------------------------------------------------------------------------------------
    if (empty($_POST["confirmPass"])) {
        $confirmPassmsg = "Confirm password field is required.";
    } else {
        $confirmPass = test_input($_POST["confirmPass"]);
        if ($pass != $confirmPass) {
            $confirmPassmsg = "Password not Matched";
        }
    }


    //Insert Statement -> all field empty then nothing will be inserted
    /*
        $bytes = random_bytes(10);
        echo bin2hex($bytes);
    */
    if (($firstName and $lastName and $email and $pass and $confirmPass) != null) {
        try {
            $id = bin2hex(random_bytes(10));
            $sql = "INSERT INTO user_register (user_id, first_name, last_name, email, the_password) VALUES('$id', '$firstName', '$lastName', '$email', '$pass')";
            if ($conn->query($sql) === TRUE) {
                $message =  "New record created successfully";
            }
        } catch (Exception $e) {
            $message =  "New record creation failed";
        }
    }
}
function test_input($para1)
{
    $value = trim($para1);
    $value = stripcslashes($value);
    $value = htmlspecialchars($value);
    return $value;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h3 class="error" style="color:red;text-align:center;"><?php echo $message; ?></h3>
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="firstName"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="firstName" id="name" placeholder="First Name" />
                                <span class="error" style="color:red;text-align:center;"><?php echo $firstNamemsg; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="lastName"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="lastName" id="name" placeholder="Last Name" />
                                <span class="error" style="color:red;text-align:center;"><?php echo $lastNamemsg; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Email" />
                                <span class="error" style="color:red;text-align:center;"><?php echo $emailmsg; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password" />
                                <span class="error" style="color:red;text-align:center;"><?php echo $passmsg; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="confirmPass" id="re_pass" placeholder="Repeat your password" />
                                <span class="error" style="color:red;text-align:center;"><?php echo $confirmPassmsg; ?></span>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="submit" id="signup" class="form-submit" value="Create an account" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="index.php" class="signup-image-link">I am already member</a>
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