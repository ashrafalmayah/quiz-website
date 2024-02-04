<?php
$db_connect = mysqli_connect('localhost', 'root', '', 'quizly')
    or die(mysqli_connect_error());

if (!$db_connect) {
    die("connection failed");
}

$sql = "SELECT password from users where username = '{$_POST["username"]}'";
$result = mysqli_query($db_connect, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result)['password'];
    if ($row == $_POST['password']) {
        $_SESSION["username"] = $_POST["username"];
        // header("location: /");
    } else {
        header("location: /login");
    }
} else {
    header("location: /login");
}

mysqli_close($db_connect);
