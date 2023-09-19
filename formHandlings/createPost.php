<?php
// Start a session
include '../connection.php';
session_start();
$conn = OpenCon();

// Process the form submission
if (isset($_POST['create_post'])) {

    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);

    $author_id = $_SESSION['user_id'];

    // Upload the image file (if provided)
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $image_path = '../images/uploads/posts/' . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
        $image_path = 'images/uploads/posts/' . $_FILES['image']['name'];
    } else {
        $image_path = null;
    }

    // Get the current date and time
    $date = new DateTime();
    $date_modification = date("Y-m-d H:i:s");

    // Insert the post data into the database
    $sql = "INSERT INTO posts (title, content, user_id, image, createdAt, updatedAt) VALUES ('$title', '$content', '$author_id', '$image_path','$date_modification','$date_modification')";

    if (mysqli_query($conn, $sql)) {
        echo "Post created successfully";
        echo '<meta http-equiv="refresh" content="0;URL=../feed.php">';
    } else {
        echo "Error: " . mysqli_error($conn);
    }    
}

// Close the database connection
mysqli_close($conn);
?>
