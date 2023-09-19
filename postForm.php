<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="images/favicon.ico" />
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    />
    <link
        href="https://getbootstrap.com/docs/5.2/assets/css/docs.css"
        rel="stylesheet"
    />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <script
        src="https://kit.fontawesome.com/64585f28ed.js"
        crossorigin="anonymous"
    ></script>

    <script src="scripts/scriptt.js"></script>
    <title>MingleZone</title>
    <script src="scripts/bootstrap.bundle.min.js"></script>
</head>
<body>
<header id="intro-header" class="container-fluid mb-4">
    <?php include 'nav.php';?>
</header>
<form class="container post-form" method="post" enctype="multipart/form-data"  action="formHandlings/createPost.php">
    <h2>Create a post</h2>
    <hr />
    <h3>Title:</h3>
    <input
        type="text"
        class="form-control"
        name="title"
        style="font-size: 26px; font-weight: 700"
        required
    />
    <h3>content:</h3>
    <div class="form-floating">
        <textarea class="form-control" id="floatingTextarea" name="content" required></textarea>
    </div>
    <div>
        <h3>Attach an image</h3>
        <input class="form-control" type="file" id="image" name="image" style="font-size: 25px"><br>

        <input
            type="submit"
            class="mt-4 big-button"
            value="submit"
            onclick="gofeed()"
            name="create_post"
        />
    </div>
</form>
<footer>
    <div>
        <hr />
        <ul class="d-flex">
            <li><a href="index.php"> HOME</a></li>
            <li><a href="feed.php"> FEED</a></li>
            <li><a href="login.php"> LOGIN</a></li>
            <li><a href="registration.php"> REGISTER</a></li>
            <li><a href="myProfile.php"> PROFILE</a></li>
        </ul>
    </div>
</footer>
</body>
</html>

<?php
if(!isset($_SESSION["user_id"])){
    echo '<meta http-equiv="refresh" content = "0;URL=login.php">';
}
