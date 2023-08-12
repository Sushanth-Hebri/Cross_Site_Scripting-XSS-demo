<!DOCTYPE html>
<html>
<head>
    <title>User Comments</title>
</head>
<body>
    <h1>User Comments</h1>
    <form action="submit.php" method="post">
        <label>Name:</label>
        <input type="text" name="name"><br>
        <label>Comment:</label>
        <textarea name="comment"></textarea><br>
        <input type="submit" value="Submit">
    </form>
    <hr>
    <h2>All Comments</h2>
    <?php
    $connection = mysqli_connect("localhost", "root", "", "cross-site_scripting");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
    $query = "SELECT * FROM comments";
    $result = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<strong>Name:</strong> " . $row['name'] . "<br>";
        echo "<strong>Comment:</strong> " . $row['comment'] . "<br><br>";
    }
    mysqli_close($connection);
    ?>
  
</body>
</html>
