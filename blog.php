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

$sql = "select * from blog_detail where blog_id = '123'";
$sql1 = "select * from blog where id = '123'";
$blog = $conn->query($sql1)->fetch_assoc();
$result = $conn->query($sql);
$bolg_details = $result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="blog.css">
</head>
<body>
<article id="the-whale">
    <h1>
        <a href="#"><?php echo $blog["tittle"] ?></a>
    </h1>
    <h2><?php echo $blog["author"] ?></h2>

    <time datetime="14-06-1851"><?php echo $blog["created"] ?></time>
    <?php foreach ($bolg_details as $key => $value) {
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
            <p><em><?php echo $value["image_desc"]?></em>.</p>
        </figcaption>
    <?php }
    ?>
</article>
</body>
</html>