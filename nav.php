<?php
session_start();
echo '
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="row container">
        <span id="header-logo" class="col-lg-5 col-md-5">
          <img src="images/logoheader.png" alt="logo" style="width: 250px" />
        </span>
    <ul class="mynav col-lg-3 col-md-3">
      <li style="margin-left: 1em"><a href="index.php">HOME</a></li>
      <li><a href="feed.php">FEED</a></li>
    </ul>';
if(!isset($_SESSION['user_id'])){
    echo '
    <ul id="varLoginnav" class="offset-1 mynav col-lg-3 col-md-3">
      <li><a href="registration.php">REGISTER</a></li>
      <li><a href="login.php">LOGIN</a></li>
    </ul>
  </div>';
}else{
    if(isset($_SESSION['avatar'])){
      $avatar = $_SESSION['avatar'];
    }else{
      $avatar = "images/avatarUser.webp";
    }
  
    echo ' <ul id="varProfilenav" class="offset-1 col-lg-3 col-md-3">
      <li>
        <div class="dropdown">
          <button
                  class="btn btn-light header-avatar"
                  type="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
          >
            <img
                    src="'.$avatar.'"
                    class="rounded-circle"
                    alt="Avatar"
                    style="width: 50px;height: 50px;"
            />
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="myProfile.php">PROFILE</a></li>
            <li><a class="dropdown-item" href="logout.php">LOGOUT</a></li>
          </ul>
        </div>
      </li>
    </ul>';
}
