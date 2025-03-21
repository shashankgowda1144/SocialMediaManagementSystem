<?php
// Start session only if it's not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include("includes/header.php");

if (!isset($_SESSION['user_email'])) {
    header("location: index.php");
    exit; // Ensure to halt further execution after redirection
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>View your Post</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style/home_style2.css">
</head>
<body>
    <div class='row'>
        <div class='col-sm-12'>    
            <center><h1>Comments</h2><br></center>
            <?php include("single.php"); ?>
        </div>
    </div>
</body>
</html>
