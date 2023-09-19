<?php
include '../connection.php';
session_start();
$conn = OpenCon();
$id = $_GET['id'];
$postId = $_GET['post'];
$query = "delete from comments where id = '$id'";
$result=mysqli_query($conn,$query);
$url = 'http://localhost/projet/post.php?post_id=' . urlencode($postId);
header('Location: ' . $url);