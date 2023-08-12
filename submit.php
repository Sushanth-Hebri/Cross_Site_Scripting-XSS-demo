<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "cross-site_scripting");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
$name = $_POST['name'];
$comment = $_POST['comment'];
$query = "INSERT INTO comments (name, comment) VALUES ('$name', '$comment')";
mysqli_query($connection, $query);
mysqli_close($connection);
header("Location: index.php");
?>
