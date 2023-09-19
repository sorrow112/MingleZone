
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="css/profiles.css" />
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
    <title>My profile</title>
    <script src="scripts/bootstrap.bundle.min.js"></script>
</head>
<!--TODO make equivalents-->
<body >
<header id="intro-header" class="container-fluid mb-4">
    <?php include "nav.php";?>
</header>
<?php
include "connection.php";

$conn = OpenCon();
$userId = $_GET['user_id'];
$query = "select * from user where id='$userId'";
    $result=mysqli_query($conn,$query);
    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_object($result);
        $fullName = $data->first_name.' '. $data->last_name;
        $email = $data->email;
        $phone = $data->phone;
        $birthdate = $data->birthdate;
        $avatar = $data->avatar;
        if($avatar==null){
            $$avatar = 'images/avatarUser.webp';
        }
        //TODO: avatar doesn't work ; w7ot condition if me3andouch avatar t7ot avatarUser.webp
        echo '
        
<section class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-4 mb-sm-5">
                <div class="card card-style1 border-0">
                    <div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-12 mb-4 mb-lg-0">
                                <img src="'.$avatar.'" alt="'.$avatar.'" style="width: 100%;"/>
                            </div>
                            <div class="offset-1 col-lg-5 col-md-11 px-xl-10 ml-4">
                                <div
                                    class="mb-1-9"
                                >
                                    <h3 class="h2 mb-0" style="color: #ff6122" id="full-name">'.$fullName.'</h3>
                                </div>
                                <ul class="list-unstyled mb-1-9">
                                    <li class="mb-2 mb-xl-3 display-28">
                        <span
                            class="display-26 text-secondary me-2 font-weight-600"
                        >Email:</span
                        >
                                        <p id="email">'.$email.'</p>
                                    </li>
                                    <li class="mb-2 mb-xl-3 display-28">
                        <span
                            class="display-26 text-secondary me-2 font-weight-600"
                        >Phone number:</span
                        >
                                        <p id="phone">'.$phone.'</p>
                                    </li>
                                    <li class="mb-2 mb-xl-3 display-28">
                        <span
                            class="display-26 text-secondary me-2 font-weight-600"
                        >Birthdate:</span
                        >
                                        <p id="birth">'.$birthdate.'</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<footer>
    <div>
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
        ';CloseCon($conn);
    }else{
        echo '<meta http-equiv="refresh" content = "0;URL=./feed.php">';
    }

