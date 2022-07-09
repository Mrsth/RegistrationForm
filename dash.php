
<?php
session_start();
if ($_SESSION['flag'] == 0) {
    echo $_SESSION['flag'];
    header("Location: index.php");
}
echo $_SESSION['flag'];

if (array_key_exists('button1', $_POST)) {
    button1();
}
function button1()
{
    $_SESSION['flag'] = 0;
    header("Location: index.php");
}
?>

<?php "Welcome to dashboard" . $_SESSION['email'] ?>

<form method="post">
    <input type="submit" name="button1" class="button" value="Logout" />
</form>