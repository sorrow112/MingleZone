<?php
include '../connection.php';
$conn = OpenCon();
$fname = $_POST['firstName'];
$lname = $_POST['lastName'];
$email = $_POST['email'];
$password = $_POST['password'];
//https://stackoverflow.com/questions/30279321/how-to-use-phps-password-hash-to-hash-and-verify-passwords
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$phone = $_POST['phone'];
$birthdate = $_POST['birthday_year'].'-'.$_POST['bd_month'].'-'.$_POST['bd_day'];
if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
    $image_path = '../images/uploads/avatars/' . $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
    $image_path = 'images/uploads/avatars/' . $_FILES['image']['name'];
} else {
    $image_path = null;
}
//var_dump($birthdate);
$query = "select * from user where email='$email'";
$result=mysqli_query($conn,$query);
if (mysqli_num_rows($result) > 0) {
    echo '<script> alert("your email has to be unique!")</script>';
}else{
    $query = "INSERT INTO user (first_name, last_name, email, password, phone, birthdate,avatar) VALUES ('$fname','$lname','$email','$hashed_password','$phone','$birthdate','$image_path')";
    if ($conn->query($query) === FALSE) {
        echo "Error: " . $query . "<br>" . $conn->error;
    }else{
        echo '<meta http-equiv="refresh" content = "0;URL=../login.php">';
    }
}

CloseCon($conn);

?>