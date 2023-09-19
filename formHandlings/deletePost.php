<?php
include '../connection.php';
session_start();
$post_id = $_GET['post'];
$conn = OpenCon();
$query = "delete from comments where post_id = '$post_id'";
$result=mysqli_query($conn,$query);

$query = "delete from posts where id = '$post_id'";

$result=mysqli_query($conn,$query);
$url = 'http://localhost/projet/feed.php';
header('Location: ' . $url);
