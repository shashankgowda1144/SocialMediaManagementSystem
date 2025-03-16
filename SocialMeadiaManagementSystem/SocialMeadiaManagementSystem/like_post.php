<?php
// Connect to the database
$con = mysqli_connect("localhost", "root", "", "social_network") or die("Connection was not established");

session_start(); // Start the session

if (isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];
    $user_id = $_SESSION['user_id']; // Assuming user ID is stored in session after login

    // Check if the user already liked the post to prevent duplicate likes
    $check_query = "SELECT * FROM post_likes WHERE post_id = '$post_id' AND user_id = '$user_id'";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) == 0) {
        // Insert like into post_likes table
        $insert_query = "INSERT INTO post_likes (post_id, user_id) VALUES ('$post_id', '$user_id')";
        $insert_result = mysqli_query($con, $insert_query);

        if ($insert_result) {
            // Handle successful like insertion (e.g., redirect back to the post)
            header("Location: home.php");
            exit();
        } else {
            // Handle errors if the insertion fails
            echo "Error: " . mysqli_error($con);
        }
    } else {
        // The user already liked this post
        echo "You have already liked this post.";
    }
}
?>
