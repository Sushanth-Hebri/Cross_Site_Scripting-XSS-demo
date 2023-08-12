<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $connection = mysqli_connect("localhost", "root", "", "cross-site_scripting");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT * FROM users WHERE email_id='$email' AND password='$password'";
    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($result);
    if ($user) {
        $_SESSION['user'] = $user;
        header("Location: index.php");
    } else {
        echo "Invalid email or password.";
    }
    mysqli_close($connection);
}
?>
