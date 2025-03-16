<!DOCTYPE html>
<?php
session_start();
include("includes/header.php");

if (!isset($_SESSION['user_email'])) {
    header("location: index.php");
    exit(); // Ensure script stops after redirection
}
?>

<html>

<head>
    <?php
    $user = $_SESSION['user_email'];
$get_user = "SELECT * FROM users WHERE user_email='$user'";
$run_user = mysqli_query($con, $get_user);

if ($run_user) {
    $row_count = mysqli_num_rows($run_user);

    if ($row_count > 0) {
        $row = mysqli_fetch_array($run_user);
        $user_name = isset($row['user_name']) ? $row['user_name'] : 'DefaultUserName';
        $describe_user = isset($row['describe_user']) ? $row['describe_user'] : 'DefaultDescription';
        $relationship_status = isset($row['Relationship']) ? $row['Relationship'] : 'DefaultRelationship';
        $user_cover = isset($row['user_cover']) ? $row['user_cover'] : 'DefaultCoverImage';
        
        // Rest of your code...
    } else {
        echo "No user found.";
        // You might want to redirect or handle this situation appropriately
    }
} else {
    echo "Error: " . mysqli_error($con); // Display the specific error for debugging
    // Handle the error appropriately, e.g., redirect to an error page
}


    ?>
    <title><?php echo "$user_name"; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style/home_style2.css">
</head>

<body>
    <div class="row">
        <div id="insert_post" class="col-sm-12">
            <center>
                <form action="home.php" method="post" id="f" enctype="multipart/form-data">
                    <textarea class="form-control" id="content" rows="4" name="content" placeholder="What's in your mind?"></textarea><br>
                    <label class="btn btn-warning" id="upload_image_button">Select Image
                        <input type="file" name="upload_image" size="30">
                    </label>
                    <button id="btn-post" class="btn btn-success" name="sub">Post</button>
                </form>
                <?php insertPost(); ?>
            </center>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <center>
                <h2><strong>News Feed</strong></h2><br>
            </center>
            <?php echo get_posts(); ?>
        </div>
    </div>
</body>

</html>
