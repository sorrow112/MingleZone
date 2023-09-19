<?php
include './connection.php';
function resultToArray($result)
{
    $rows = array();
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    return $rows;
}
$conn = OpenCon();
if(isset($_POST["like"])){
    if(!isset($_SESSION["user_id"])){
        echo '<meta http-equiv="refresh" content = "0;URL=./login.php">';
    }
    $id = $_POST["post_id"];
    $user_id = $_SESSION["user_id"];
    $query = "SELECT * FROM likes where post_id='$id' and user_id='$user_id' ";
    $result=mysqli_query($conn,$query);
    if (mysqli_num_rows($result) <= 0) {
        $query = "SELECT * FROM dislikes where post_id='$id' and user_id='$user_id' ";
        $result=mysqli_query($conn,$query);
        if (mysqli_num_rows($result) > 0) {
            $query = "DELETE FROM dislikes where post_id='$id' and user_id='$user_id' ";
            $result=mysqli_query($conn,$query);
        }
        $query = "INSERT into likes(post_id , user_id) values ('$id', '$user_id')";

        $result=mysqli_query($conn,$query);
    }
}else if(isset($_POST["dislike"])){
    if(!isset($_SESSION["user_id"])){
        echo '<meta http-equiv="refresh" content = "0;URL=./login.php">';
    }
    $id = $_POST["post_id"];
    $user_id = $_SESSION["user_id"];
    $query = "SELECT * FROM dislikes where post_id='$id' and user_id='$user_id' ";
    $result=mysqli_query($conn,$query);
    if (mysqli_num_rows($result) <= 0) {
        $query = "SELECT * FROM likes where post_id='$id' and user_id='$user_id' ";
        $result=mysqli_query($conn,$query);
        if (mysqli_num_rows($result) > 0) {
            $query = "DELETE FROM likes where post_id='$id' and user_id='$user_id' ";
            $result=mysqli_query($conn,$query);
        }
        $query = "INSERT into dislikes(post_id , user_id) values ('$id', '$user_id')";

        $result=mysqli_query($conn,$query);
    }
}
CloseCon($conn);