<?php
$parameter = $_POST['parameter'];
$url = 'http://localhost/projet/post.php?post_id=' . urlencode($parameter);
header('Location: ' . $url);
exit;