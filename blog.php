<?php
session_start();
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

$sql = "select * from blog_detail";
$sql1 = "select * from blog";
$blog = $conn->query($sql1)->fetch_assoc();
$result = $conn->query($sql);
$bolg_details = $result->fetch_all(MYSQLI_ASSOC);

//Comment part
$fname = $email = $msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cmt_id = bin2hex(random_bytes(10));
    $content = $_POST["cmt"];
    $author = $_SESSION["email"];
    $blog_id = '10';

    $sql = "INSERT INTO comment (cmt_id, author, content, blog_id) VALUES ('$cmt_id', '$author', '$content', '$blog_id')";
    if ($conn->query($sql) === TRUE) {
        $note =  "Your message inserted successfully";
    }
}

$sql1 = "select * from comment";
$result1 = $conn->query($sql1);
$all_cmts = $result1->fetch_all(MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html>

<head>
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

    </div>
    <article id="the-whale">
        <h1>
            <a href="#"><?php if ($blog["tittle"] != null)
                            echo $blog["tittle"] ?></a>
        </h1>
        <h2><?php if ($blog["author"] != null)
                echo $blog["author"] ?></h2>
        <time datetime="14-06-1851">
            <?php if ($blog["created"] != null)
                echo $blog["created"] ?>
        </time>
        <?php
        if ($bolg_details != null)
            foreach ($bolg_details as $key => $value) {
        ?>
            <h3><?php echo $value["title"] ?></h3>
            <p style="text-align: justify"><?php echo $value["content"]
                                            ?>
            </p>

            <figure class="size-3">
                <?php
                if ($value["image"] != null)
                    echo '<img  class="poster-image" src="data:image/jpeg;base64,' . base64_encode($value["image"]) . '"/>' ?>
            </figure>
            <figcaption>
                <p><em><?php
                        if ($value["image_desc"] != null)
                            echo $value["image_desc"] ?></em>.</p>
            </figcaption>
        <?php }
        ?>
        <form method="POST">
            <div>
                <h2 style="color:black"> POST YOUR COMMENTS</h2>
                <textarea style="width:100%" rows="3" placeholder="Enter your comment here..." name="cmt"></textarea>
                <button style="background:#1da0f2;width: 50px;padding: 5px;border-radius: 5px" ;>Post</button>
            </div>
        </form>

        <div style="margin-top: 5%">
            <h2 style="margin-top:1%; color:black">All comments</h2>
            <?php
            foreach ($all_cmts as $value) {
            ?>
                <div>
                    <p style="margin-bottom:1%"><?php echo "Comment: " . $value["content"] ?></p>
                    <hr>
                    <i><?php echo "Author: " . $value["author"] ?></i><br>
                    <i><?php echo "Posted on: " . $value["createdDate"] ?></i>
                </div>
                <br>
            <?php } ?>
        </div>
    </article>
</body>

</html>