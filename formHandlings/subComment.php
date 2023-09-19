<?php
include '../connection.php';
session_start();
$post_id = $_POST['post'];
$user_id = $_SESSION['user_id'];
$content = $_POST['content'];
$conn = OpenCon();
$query = "insert into comments(content,post_id,user_id) values ('$content', '$post_id', '$user_id')";

$result=mysqli_query($conn,$query);
$url = 'http://localhost/projet/post.php?post_id=' . urlencode($post_id);
header('Location: ' . $url);
