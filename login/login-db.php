<?php
require ("../functions.php");

$db_connect = connectDB();

$sql = "SELECT id, password from users where username = '{$_POST["username"]}'";
$result = mysqli_query($db_connect, $sql);
mysqli_close($db_connect);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if ($row["password"] == $_POST['password']) {
        $_SESSION["user"]["id"] = $row["id"];
        $_SESSION["user"]["name"] = $_POST["username"];
        header("location: /");
        exit();
    } else {
        header("location: /login");
        exit();
    }
} else {
    header("location: /login");
    exit();
}

