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

$sql = "select * from blog_detail where blog_id in ('10', '20')";
$sql1 = "select * from blog";
$blog = $conn->query($sql1)->fetch_assoc();
$result = $conn->query($sql);
$bolg_details = $result->fetch_all(MYSQLI_ASSOC);

$result1 = $conn->query($sql1);
// foreach ($result as $row) {
//     echo $row['tittle'];
// }

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
    <article id=" the-whale">




        <?php foreach ($bolg_details as $key => $value) {
        ?>
            <h1>
                <a href="#"><?php echo $blog["tittle"] ?></a>
            </h1>
            <h2><?php echo $blog["author"] ?></h2>
            <time datetime="14-06-1851"><?php echo $blog["created"] ?></time>
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
                <p><em><?php echo $value["image_desc"] ?></em>.</p>
            </figcaption>
        <?php }
        ?>
    </article>
</body>

</html>