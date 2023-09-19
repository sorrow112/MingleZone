<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <script src="https://kit.fontawesome.com/64585f28ed.js" crossorigin="anonymous"></script>
    <script src="scripts/scriptt.js"></script>
    <title>Feed</title>
    <script src="scripts/bootstrap.bundle.min.js"></script>
</head>
<body>
<header id="intro-header" class="container-fluid mb-4">
    <?php include 'nav.php';?>
</header>
<div class="container main">
    <section class="container-fluid">
        <div class="card mt-4">
            <div class="card-header">
                <h2 class="m-4">Create your own post!</h2>
            </div>
            <div class="card-body">
                <input
                    type="email"
                    class="form-control"
                    id="email"
                    placeholder="Click here to write a post"
                    onclick="gopostform()"
                />
            </div>
        </div>

        <?php
        // Include necessary files
        include 'formHandlings/likeDislike.php';
        $conn = OpenCon();

        // Retrieve posts from the database
        $query = "SELECT posts.*, user.first_name as firstName,user.last_name as lastName , user.avatar as avatar
        FROM posts
        JOIN user ON posts.user_id = user.id;";
        $result = mysqli_query($conn, $query);
        $arr = resultToArray($result);

        // Loop through the posts and display them
        foreach ($arr as $value) {
            // Retrieve post details
            $id = $value["id"];
            $title = $value["title"];
            $content = $value["content"];
            $image = $value["image"];
            $createdAt = $value["createdAt"];
            $firstName = $value["firstName"];
            $lastName = $value["lastName"];
            $avatar = $value["avatar"];
            $userId = $value["user_id"];

            // Retrieve the number of likes for the post
            $query = "SELECT count(*) as nbr FROM likes WHERE post_id = '$id';"; 
            $result = mysqli_query($conn, $query);
            $data = mysqli_fetch_object($result);
            $count = $data->nbr;

            // Retrieve the number of dislikes for the post
            $query = "SELECT count(*) as nbr FROM dislikes WHERE post_id = '$id';"; 
            $result = mysqli_query($conn, $query);
            $data = mysqli_fetch_object($result);
            $count -= $data->nbr;

            // Check if the user has liked/disliked the post
            $liked = '';
            $disliked = '';
            if (isset($_SESSION["user_id"])) {
                $user_id = $_SESSION["user_id"];

                $query = "SELECT * FROM likes WHERE post_id = '$id' AND user_id='$user_id';"; 
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) > 0) {
                    $liked = 'chev-toggled';
                }

                $query = "SELECT * FROM dislikes WHERE post_id = '$id' AND user_id='$user_id';"; 
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) > 0) {
                    $disliked = 'chev-toggled';
                }


            }
// Retrieve the number of comments for the post
            $query = "SELECT count(*) as nbComments FROM comments WHERE post_id = '$id';";
            $result = mysqli_query($conn, $query);
            $data = mysqli_fetch_object($result);
            $countComments = $data->nbComments;
            // Display the post
            echo '<div class="card mt-4">
                <article class="post">
                    <div class="react">
                        <form method="post">
                            <input type="hidden" name="post_id" value="'.$id.'"/>
                            <button class="chevrons" name="like" type="submit">
                                <i class="fa-solid fa-chevron-up fa-xl '.$liked.'" id="post1up" onclick="upPostOne()"></i>
                            </button>
                        </form>
                        <div class="text-center upnbr" id="post1">'.$count.'</div>
                        <form method="post">
                            <input type="hidden" name="post_id" value="'.$id.'"/>
                            <button class="chevrons" name="dislike" type="submit">
                                <i class="fa-solid fa-chevron-down '.$disliked.' fa-xl" id="post1down" onclick="downPostOne()"></i>
                            </button>
                        </form>
                    </div>
                    <div class="post-body">
                        <div class="card-header d-flex">
                            <img src="'.$avatar.'" class="rounded-circle" alt="Avatar" />
                            <div class="username">
                                <a href="profile.php?user_id='.$userId.'" style="text-decoration: none; color: #2b394a">
                                    <h5>'.$firstName.' '.$lastName.'</h5>
                                </a>
                                <p class="date-post">'.$createdAt.'</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">'.$title.'</h5>
                            <p class="card-text">'.$content.'</p>
                            <img src="'.$image.'" alt="'.$image.'" style="width: 85%;"/>
                        </div>
                        <div class="card-footer d-flex">
                            <form method="post" action="redirect.php">
                                <input type="hidden" name="parameter" value="'.$id.'">
                                <button class="btn btn-light btn-reactions" data-mdb-ripple-color="dark" type="submit">
                                    <i class="fa-regular fa-message fa-xl"></i>
                                    <span style="margin-left: 0.5em">'.$countComments.' comments</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </article>
            </div>';
        }
        ?>
    </section>
</div>
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
// Rest of the code
