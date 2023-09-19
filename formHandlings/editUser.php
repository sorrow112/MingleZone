<?php
include '../connection.php';
session_start();
$conn = OpenCon();
$user = $_SESSION["user_id"];
if(isset($_POST["submitName"])){
    $fname = $_POST["firstName"];
    $lname = $_POST["lastName"];
    
    $query = "UPDATE user SET first_name = '$fname',last_name = '$lname' where id='$user'";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('name updated successfully')</script>";
        echo '<meta http-equiv="refresh" content = "0;URL=../myProfile.php">';
    } else {
        echo "Error: " . mysqli_error($conn);
    }}
    else if(isset($_POST["submitImage"])){
        if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
            $image_path = '../images/uploads/avatars/' . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
            $image_path = 'images/uploads/avatars/' . $_FILES['image']['name'];

            $query = "UPDATE user SET avatar = '$image_path'";
            if (mysqli_query($conn, $query)) {
                echo "<script>alert('image updated successfully')</script>";
                echo '<meta http-equiv="refresh" content = "0;URL=../myProfile.php">';
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }



}else if(isset($_POST["submitEmail"])){
    $email = $_POST["email"];
    $query = "SELECT * from user where email = '$email'";
    $result=mysqli_query($conn,$query);
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('email address already used')</script>";
        echo '<meta http-equiv="refresh" content = "0;URL=../myProfile.php">';
    }else{

        $query = "UPDATE user SET email = '$email' where id='$user'";
        if (mysqli_query($conn, $query)) {
            echo "<script>alert('email address updated successfully')</script>";
           echo '<meta http-equiv="refresh" content = "0;URL=../myProfile.php">';
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}else if(isset($_POST["submitPhone"])){
    $phone = $_POST["phone"];
    if (preg_match('/^[952]\d{7}$/', $phone)) {
        $query = "UPDATE user SET phone = '$phone' where id='$user'";
        if (mysqli_query($conn, $query)) {
            echo "<script>alert('phone number updated successfully')</script>";
            echo '<meta http-equiv="refresh" content = "0;URL=../myProfile.php">';
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }else{
        echo "<script>alert('invalid phone number')</script>";
        echo '<meta http-equiv="refresh" content = "0;URL=../myProfile.php">';
    }
}else if (isset($_POST["submitPassword"])){
    $password = $_POST["password"];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $query = "UPDATE user SET password = '$hashed_password' where id='$user'";
        if (mysqli_query($conn, $query)) {
            echo "<script>alert('password number updated successfully')</script>";
            echo '<meta http-equiv="refresh" content = "0;URL=../myProfile.php">';
        } else {
            echo "Error: " . mysqli_error($conn);
        }
}