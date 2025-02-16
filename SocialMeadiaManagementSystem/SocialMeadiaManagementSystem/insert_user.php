<?php
if (isset($_POST['sign_up'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $password = $_POST['u_pass'];
    $email = $_POST['u_email'];
    $country = $_POST['u_country'];
    $gender = $_POST['u_gender'];
    $birthday = $_POST['u_birthday'];

    // Checking password length
    if(strlen($password) < 9){
        echo "<script>alert('Password should be minimum 9 characters!')</script>";
        exit();
    }

    // Checking email existence (you need to implement your own method to check email existence)

    // Selecting profile picture
    $rand = rand(1, 3);
    $profile_pic = ($rand == 1) ? "d1.png" : (($rand == 2) ? "d3.jpeg" : "d4.jpg");

   

    $servername = "localhost";
    $username = "root";
    $password_db = "";
    $dbname = "social_network";

    $conn = new mysqli($servername, $username, $password_db, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
     $user_name = strtolower($first_name . "_" . $last_name);
    // Include the 'user_image' column in the SQL query and assign the profile picture path
    $sql = "INSERT INTO users (f_name, l_name, user_pass, user_email, user_country, user_gender, user_birthday, user_image,user_name)
            VALUES ('$first_name', '$last_name', '$password', '$email', '$country', '$gender', '$birthday', '$profile_pic','$user_name')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('User registered successfully')</script>";
        echo "<script>window.open('signin.php', '_self')</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
