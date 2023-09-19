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
  <link rel="stylesheet" href="css/styleee.css" />

  <script
          src="https://kit.fontawesome.com/64585f28ed.js"
          crossorigin="anonymous"
  ></script>

  <script src="scripts/scriptt.js"></script>
  <title>MingleZone</title>
  <script src="scripts/bootstrap.bundle.min.js"></script>
</head>
<!--<body onload="slideshow();" id="index-body">-->
<body id="index-body">
<header id="intro-header" class="container-fluid mb-4 ">
  <?php include 'nav.php';?>
  <div id="intro" class="container-fluid ">
    <div class="container">
      <div class="row">
            <span class="col-lg-7 col-md-7 col-sm-12" id="intro-box">
              <p class="title">Hi, we're MingleZone</p>
              <h3 class="subtitle">
                Your new favorite Social media and your second home.
              </h3>
              <div id="intro-p">
                <p>
                  MingleZone connects you the people you've always wanted to
                  meet and allows you to share your thoughts and ideas to the
                  world to see.
                </p>

                <div id="intro-buttons" class="d-flex justify-content-around">
                  <button class="big-button" onclick="gotoregister()">Join us</button>
                  <button class="big-button" onclick="gotologin()">Login</button>
                </div>
              </div>
            </span>
        <span class="col-lg-5 col-md-5 col-sm-12">
              <img src="images/intropic.jpg" style="width: 100%;" alt="placeholder" />
            </span>
      </div>
    </div>
  </div>
</header>
<section class="container main ">
  <h1 class="text-center ahbat">How MingleZone works</h1>
  <div class="row services">
    <div class="col-lg-4 col-md-4 service" >
      <td><img src="images/post.gif" alt="post" class="howItWorksImg"></td>

      <p class="text-center">Post articles and photos</p>
    </div>
    <div class="col-lg-4 col-md-4 service">
      <img src="images/browse.gif" alt="post" class="howItWorksImg">
      <p class="text-center">Look for the content you enjoy</p>
    </div>
    <div class="col-lg-4 col-md-4 service">
      <img src="images/interact.gif" alt="post" class="howItWorksImg">
      <p class="text-center">Interact with other members</p>
    </div>
  </div>
</section>
<!-- this should contain description to services -->
<div id="desc-services">
  <section class="container">
    <div class="row">
      <div class="col-lg-6">
        <img src="images/avatars.jpg" alt="avatars" style="width: 100%" />
      </div>
      <div class="col-lg-6 mt-5">
        <h3>Be a part of this growing community</h3>
        <p class="service-p">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam quas impedit temporibus dignissimos maxime adipisci iusto officiis labore expedita, corrupti fugiat sit asperiores ratione quia facilis nesciunt, aperiam reiciendis sint! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magni, tenetur molestias iure nobis odio, quae delectus amet at rem libero possimus eos quis animi quidem suscipit magnam a in autem.</p>
      </div>
    </div>
  </section>
  <section class="container ">
    <div class="row">

      <div class="col-lg-6 col-md-6">
        <img src="images/temp_posts.jfif" alt="" style="width: 100%" />
      </div>
      <div class="col-lg-6 col-md-6 mt-5">
        <h3>Browse a big selection of posts</h3>
        <p class="service-p">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam quas impedit temporibus dignissimos maxime adipisci iusto officiis labore expedita, corrupti fugiat sit asperiores ratione quia facilis nesciunt, aperiam reiciendis sint!Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magni, tenetur molestias iure nobis odio, quae delectus amet at rem libero possimus eos quis animi quidem suscipit magnam a in autem.</p>

      </div>
    </div>
  </section>
  <section class="container">
    <div class="row">
      <div class="col-lg-6">
        <img src="images/share.png" alt="" style="width: 100%" />
      </div>
      <div class="col-lg-6 mt-5">
        <h3>Share your own ideas with the world</h3>
        <p class="service-p">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam quas impedit temporibus dignissimos maxime adipisci iusto officiis labore expedita, corrupti fugiat sit asperiores ratione quia facilis nesciunt, aperiam reiciendis sint!Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magni, tenetur molestias iure nobis odio, quae delectus amet at rem libero possimus eos quis animi quidem suscipit magnam a in autem.</p>

      </div>
    </div>
  </section>
</div>
<div id="stats">
  <section class="container">
    <h1 class="text-center">The Mingly Community</h1>
    <div class="row services">
      <?php
      include_once 'connection.php';
      $conn = OpenCon();
      $query = "SELECT count(*) as nlikes FROM likes";
      $result = mysqli_query($conn, $query);
      $data = mysqli_fetch_object($result);
      $nlikes = $data->nlikes;

      $query = "SELECT count(*) as nusers FROM user";
      $result = mysqli_query($conn, $query);
      $data = mysqli_fetch_object($result);
      $nmembers = $data->nusers;

      $query = "SELECT count(*) as npost FROM posts";
      $result = mysqli_query($conn, $query);
      $data = mysqli_fetch_object($result);
      $nposts = $data->npost;

      echo '      <div class="col-lg-4 col-md-4 stat" id="nbrSection" >
        <h1 id="nmembers">'.$nmembers.'</h1>

        <p class="text-center">Membres</p>
      </div>
      <div class="col-lg-4 col-md-4 stat">
        <h1 id="nposts">'.$nposts.'</h1>

        <p class="text-center">Posts</p>
      </div>
      <div class="col-lg-4 col-md-4 stat">
        <h1 id="nupvotes">'.$nlikes.'</h1>

        <p class="text-center">Upvotes</p>
      </div>';
      ?>

    </div>
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
