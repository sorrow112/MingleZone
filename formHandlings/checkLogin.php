<?php
include '../connection.php';
session_start();
$conn = OpenCon();

$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT id, password, avatar FROM user WHERE email='$email'";
$result = mysqli_query($conn, $query);

// Check if there is a matching user with the provided email
if (mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_object($result);
    $hashed_password = $data->password;

    // Verify the provided password with the hashed password from the database
    if (password_verify($password, $hashed_password)) {
        $_SESSION["user_id"] = $data->id;
        $_SESSION["avatar"] = $data->avatar;
        $_SESSION["login"] = $email;
        echo '<meta http-equiv="refresh" content="0; URL=../index.php">';
    } else {
        // Incorrect password
        echo '<script>alert("Incorrect password!");</script>';
        echo '<meta http-equiv="refresh" content="0; URL=../login.php">';
    }
} else {
    // Incorrect login (no matching user)
    echo '<script>alert("Incorrect login!");</script>';
    echo '<meta http-equiv="refresh" content="0; URL=../login.php">';
}

CloseCon($conn);
?>
