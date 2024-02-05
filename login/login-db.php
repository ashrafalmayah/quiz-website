<?php
require ("../functions.php");

$db_connect = connectDB();

$sql = "SELECT password from users where username = '{$_POST["username"]}'";
$result = mysqli_query($db_connect, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result)['password'];
    if ($row == $_POST['password']) {
        $_SESSION["userId"] = $_POST["id"];
        header("location: /");
    } else {
        header("location: /login");
    }
} else {
    header("location: /login");
}

mysqli_close($db_connect);
