<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/64585f28ed.js" crossorigin="anonymous"></script>
    <script src="scripts/scriptt.js"></script>
    <title>MingleZone</title>
    <script src="scripts/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php
echo '<header>';
include 'nav.php';
echo '</header>';
include 'formHandlings/likeDislike.php';
$conn = OpenCon();
if (!isset($_SESSION['user_id'])){
    echo '<meta http-equiv="refresh" content="0;URL=./login.php">';

}
if (isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];

    // Retrieve post information
    $query = "SELECT posts.*, user.first_name as firstName, user.last_name as lastName, user.avatar as avatar
        FROM posts
        JOIN user ON posts.user_id = user.id
        WHERE posts.id = '$post_id';";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $value = mysqli_fetch_object($result);
        $id = $value->id;
        $title = $value->title;
        $content = $value->content;
        $image = $value->image;
        $avatar = $value->avatar;
        $createdAt = $value->createdAt;
        $firstName = $value->firstName;
        $lastName = $value->lastName;
        $userId = $value->user_id;

        // Count likes for the post
        $query = "SELECT count(*) as nbr
                FROM likes
                WHERE post_id = '$id';";
        $result = mysqli_query($conn, $query);
        $data = mysqli_fetch_object($result);
        $count = $data->nbr;

        // Count dislikes for the post
        $query = "SELECT count(*) as nbr
                FROM dislikes
                WHERE post_id = '$id';";
        $result = mysqli_query($conn, $query);
        $data = mysqli_fetch_object($result);
        $count -= $data->nbr;

        $liked = '';
        $disliked = '';

        if (isset($_SESSION["user_id"])) {
            $user_id = $_SESSION["user_id"];

            // Check if the post is liked by the user
            $query = "SELECT *
                    FROM likes
                    WHERE post_id = '$id' AND user_id='$user_id';";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                $liked = 'chev-toggled';
            }

            // Check if the post is disliked by the user
            $query = "SELECT *
                FROM dislikes
                WHERE post_id = '$id' AND user_id='$user_id';";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                $disliked = 'chev-toggled';
            }

            // Count comments for the post
            $query = "SELECT count(*) as nbComments
                FROM comments
                WHERE post_id = '$id';";
            $result = mysqli_query($conn, $query);
            $data = mysqli_fetch_object($result);
            $countComments = $data->nbComments;
        }

        // Show delete button for the post if it belongs to the logged-in user
        if ($_SESSION['user_id'] == $userId) {
            $del = '<form action="formHandlings/deletePost.php" method="get" class="col-1">

                      <input type="hidden" name="post" value="' . $post_id . '">
                      <button  type="submit" style="border: none;background-color: transparent; margin-left: -5px">
                                    <i style="color: red" class="fa-solid fa-trash fa-xs" ></i>
                                </button>
                    </form>';
        } else {
            $del = '';
        }

        echo '
<div class="container d-flex mt-5">
                            <img src="' . $avatar . '" class="rounded-circle" alt="Avatar" style="width: 75px;height: 75px">
                            <div class="username">
                                <a href="profile.php?user_id=' . $userId . '" style="text-decoration: none; color: #2b394a">
                                    <h5>' . $firstName . ' ' . $lastName . '</h5>
                                </a>
                                <p class="date-post">' . $createdAt . '</p>
                            </div>
        </div>
      <div class="container">
        <div class=" card mt-4">
            <article class="post">
                <div class="react">
                    <form method="post">
                        <input type="hidden" name="post_id" value="' . $id . '">
                        <button class="chevrons" name="like" type="submit">
                            <i class="fa-solid fa-chevron-up fa-xl ' . $liked . '" id="post1up" onclick="upPostOne()"></i>
                        </button>
                    </form>
                    <div class="text-center upnbr" id="post1">' . $count . '</div>
                    <form method="post">
                        <input type="hidden" name="post_id" value="' . $id . '">
                        <button class="chevrons" name="dislike" type="submit">
                            <i class="fa-solid fa-chevron-down ' . $disliked . ' fa-xl" id="post1down" onclick="downPostOne()"></i>
                        </button>
                    </form>
                </div>
                <div class="post-body">
                    <div class="card-body">
                    <div class="d-flex justify-content-between">
                     <h5 class="card-title">' . $title . '</h5>
                     <div>' . $del . '</div>
                     </div>
                        
                        
                        <img class="mt-4 d-block mx-auto" src="' . $image . '" alt="' . $image . '" style="width: 85%;">
                        <p class="card-text mt-4 " style="font-size: 21px">' . $content . '</p>
                    </div>
                    <div class="card-footer d-flex">
                        <button type="button" class="btn btn-light btn-reactions" data-mdb-ripple-color="dark">
                            <i class="fa-regular fa-message fa-xl"></i>
                            <span style="margin-left: 0.5em">' . $countComments . ' comments</span>
                        </button>
                    </div>
                </div>

            </article>

        </div>        
        </div>
                    
                ';

        $query = "SELECT comments.*, user.first_name as firstName, user.last_name as lastName, user.avatar as avatar, user.id as userId
        FROM comments
        JOIN user ON comments.user_id = user.id
        WHERE comments.post_id = '$id';";
        if(isset($_SESSION['avatar'])){
            $avatar = $_SESSION['avatar'];
        }else{
            $avatar = "images/avatarUser.webp";
        }
        $result = mysqli_query($conn, $query);
        $arr = resultToArray($result);
        echo '

<section  >
  <div class="container mt-3">
    <div class="row d-flex justify-content-center">
      <div class="col-md-12 col-lg-10 col-xl-8">
        <div class="card ">
        <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;" >
        <h3 class="mb-4">Drop a comment</h3>
                     <form method="post" action="formHandlings/subComment.php" class="px-4 py-4 d-flex ">
                           <img class="rounded-circle shadow-1-strong me-3"
                                src="' . $avatar . '" alt="avatar" width="40"
                                height="40" />
                        <input type="hidden" name="post" value="' . $post_id . '">
                        <div class="form-floating">
                            <textarea class="form-control" id="floatingTextarea" rows="4" cols="100"name="content" required
                            style="background: #fff;" placeholder="Comment"></textarea>
                             <div class="float-end mt-2 pt-1">
                                <button type="submit" class="btn btn-sm" name="create_comment" value="Submit" style="background-color: #ff6122; color: white">Post comment</button>
                                <button type="reset" class="btn btn-sm" style="background-color: #ff6122; color: white">Cancel</button>
                            </div>
                        </div>
                    </form>

                        </div>
                       </div>
      </div>
    </div>
  </div>
</section>';
        echo '<section class="gradient-custom commentsSection " >
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 col-lg-10 col-xl-8">
                <div class="card">
                    <div class="card-body p-4">
                    
                        ';
        $nbcomms = 0;
        foreach ($arr as $value) {
            $nbcomms ++;
            $firstNamee = $value["firstName"];
            $lastNamee = $value["lastName"];
            $avatarr = $value["avatar"];
            $user_idd = $value["userId"];
            $createdAtt = $value["createdAt"];
            $contentt = $value["content"];
            $idd = $value["id"];
            if ($user_idd != $_SESSION["user_id"]) {
                echo '<div class="row mb-5">
                            <div class="col">
                                <div class="d-flex flex-start">
                                    <img class="rounded-circle shadow-1-strong me-3"
                                         src="' . $avatarr . '" alt="avatar" width="65"
                                         height="65" />
                                    <div class="flex-grow-1 flex-shrink-1">
                                        <div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="mb-1"><a href="./profile.php?user_id=' . $user_idd . '">
                                                    ' . $firstNamee . ' ' . $lastNamee . ' </a><span class="small">- ' . $createdAtt . '</span>
                                                </p>
                                            </div>
                                            <p class="small mb-0">
                                                ' . $contentt . '
                                            </p>
                                           </div>
                                    </div>
                                </div>
                            </div>
                        </div>
';
            } else {
                echo '<div class="row mb-5">
                            <div class="col">
                                <div class="d-flex flex-start">
                                    <img class="rounded-circle shadow-1-strong me-3"
                                         src="' . $avatarr . '" alt="avatar" width="65"
                                         height="65" />
                                    <div class="flex-grow-1 flex-shrink-1">
                                        <div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="mb-1"><a href="./profile.php?user_id=' . $user_idd . '" style="text-decoration:none; color:#ff6122 ">
                                                    ' . $firstNamee . ' ' . $lastNamee . ' </a> <span class="small">- ' . $createdAtt . '</span>
                                                </p>
                                    <form action="formHandlings/deleteComment.php" method="get">
                                    <input type="hidden" name="id" value="' . $idd . '">
                                    <input type="hidden" name="post" value="' . $post_id . '">
                                    <button type="submit" style="border: none; background-color: transparent">
                                        <i style="color: red" class="fa-solid fa-trash fa-xs"></i>
                                    </button>
                                </form>
                                            </div>
                                            <p class="small mb-0">
                                                ' . $contentt . '
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
';

            }
        }
        if ($nbcomms ==0){
            echo '<div class="container" style="text-align: center">
        <h3>There are no comments on this post, be the first !</h3>
</div>';
        }
    } else {
        echo '<p class="text-center mt-5">Post not found.</p>';
    }
}
echo '                   </div>
                </div>
            </div>
        </div>
    </div></section>';
CloseCon($conn);
?>

<script>
    function upPostOne() {
        const upbtn = document.getElementById("post1up");
        upbtn.classList.toggle("chev-toggled");
    }

    function downPostOne() {
        const downbtn = document.getElementById("post1down");
        downbtn.classList.toggle("chev-toggled");
    }
</script>
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
