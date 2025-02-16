<?php
include("includes/connection.php");
include("functions/functions.php");
// Start session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


// Check if the user is logged in
if (isset($_SESSION['user_email'])) {
    $user_email = $_SESSION['user_email'];

    // Prepare and execute query to fetch user details
    $user_query = "SELECT * FROM users WHERE user_email=?";
    $stmt = mysqli_prepare($con, $user_query);
    mysqli_stmt_bind_param($stmt, "s", $user_email);
    mysqli_stmt_execute($stmt);
    
    // Get the result
    $result = mysqli_stmt_get_result($stmt);
     if ($result) {
        // Fetch the row
        $row = mysqli_fetch_assoc($result);
         if ($row) {
                $user_id = $row['user_id'];
                $user_name = $row['user_name'];
                $first_name = $row['f_name'];
                $last_name = $row['l_name'];
                $describe_user = $row['describe_user'];
                $Relationship_status = $row['Relationship'];
                $user_pass = $row['user_pass'];
                $user_email = $row['user_email'];
                $user_country = $row['user_country'];
                $user_gender = $row['user_gender'];
                $user_birthday = $row['user_birthday'];
                $user_image = $row['user_image'];
                $user_cover = $row['user_cover'];
                $recovery_account = $row['recovery_account'];
                $register_date = $row['user_reg_date'];

                $user_posts = "select * from posts where user_id='$user_id'";
                $run_posts = mysqli_query($con, $user_posts);
                $posts = mysqli_num_rows($run_posts);
                } else {
            // Handle case where user details are not found
            // Redirect or display an error message
            echo "User details not found.";
        }
    } else {
        // Handle query execution errors
        echo "Query execution error: " . mysqli_error($con);
    }
} else {
    // Handle case where user is not logged in
    // Redirect to login page or handle accordingly
    header("Location: login.php");
    exit();
}
?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="home.php">Coding Cafe</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

                

                <li><a href='profile.php?<?php echo "u_id=$user_id" ?>'><?php echo "$first_name"; ?></a></li>
                <li><a href="home.php">Home</a></li>
                <li><a href="members.php">Find People</a></li>
                <li><a href="messages.php?u_id=new">Messages</a></li>

                <?php
                echo "
                <li class='dropdown'>
                    <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'><span><i class='glyphicon glyphicon-chevron-down'></i></span></a>
                    <ul class='dropdown-menu'>
                        <li>
                            <a href='my_post.php?u_id=$user_id'>My Posts <span class='badge badge-secondary'>$posts</span></a>
                        </li>
                        <li>
                            <a href='edit_profile.php?u_id=$user_id'>Edit Account</a>
                        </li>
                        <li role='separator' class='divider'></li>
                        <li>
                            <a href='logout.php'>Logout</a>
                        </li>
                    </ul>
                </li>
                ";
                ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <form class="navbar-form navbar-left" method="get" action="results.php">
                        <div class="form-group">
                            <input type="text" class="form-control" name="user_query" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-info" name="search">Search</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
