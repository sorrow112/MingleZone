<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/x-icon" href="images/favicon.ico" />
  <!-- <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
  />
  <link
    href="https://getbootstrap.com/docs/5.2/assets/css/docs.css"
    rel="stylesheet"
  /> -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/style.css" />
  <script
          src="https://kit.fontawesome.com/64585f28ed.js"
          crossorigin="anonymous"
  ></script>

  <script src="scripts/scriptt.js"></script>
  <script src="scripts/formCheck.js"></script>
  <script src="scripts/bootstrap.bundle.min.js"></script>
  <title>Login</title>
</head>
<body >
<header id="intro-header" class="container-fluid mb-4">
  <?php include 'nav.php';?>
</header>
<section>
  <div class="container-fluid">
    <div class="container" id="login-container">
      <div class="row">
        <div class="col-lg-6 col-md-6" id="login-col1">
          <img src="images/placeholder-loginimg.png" alt="login-img" />
          <h2>MingleZone</h2>
          <p>
            login to enter an environment where you'll find thousands of
            people that share you same interests and are willing to interact
            with you
          </p>
        </div>
        <form
            method = "post"
                action="formHandlings/checkLogin.php"
                class="col-lg-6 col-md-6 login-form"
                style="height: 700px"
        >
          <img src="images/logoimg.png" alt="" />
          <h2>hello again !</h2>
          <p>fill in the form with your account's informations to login</p>

          <input
                  type="email"
                  class="form-control"
                  id="email"
                  name="email"
                  placeholder="Email address"
                  required
                  style="margin-top: 80px"
          />
          <small id="sm-email" class="err-sm"></small>
          <input
                  type="password"
                  name="password"
                  id="password"
                  class="form-control"
                  placeholder="Password"
                  required
          />
          <small id="sm-password" class="err-sm"></small>
          <input
                  type="submit"
                  value="Login"
                  onsubmit="login()"
                  class="btn btn-light"
          />

          <p>
            don't have an account yet ?<a href="registration.php">
            Sign in</a
          >
          </p>
        </form>
      </div>
    </div>
  </div>
</section>
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
<?php $id = $_SESSION['user_id']; echo $id; ?>

