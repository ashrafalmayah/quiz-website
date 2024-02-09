<?php
require("../functions.php");
$db_connect = connectDB();

$errors = array();

$username = $_POST["username"];
$email = $_POST["email"];
$password = password_hash($_POST["password"], PASSWORD_DEFAULT);

$sql = "SELECT username from users where username = '$username'";
$result = mysqli_query($db_connect, $sql);

if (mysqli_num_rows($result) > 0) {
    $errors["username"] = "هذا الاسم مستخدم بالفعل";
}

$sql = "SELECT username from users where email='$email'";
$result = mysqli_query($db_connect, $sql);

if (mysqli_num_rows($result) > 0) {
    $errors["email"] = "هذا البريد مستخدم بالفعل";
}

if (!empty($errors)) {
    mysqli_close($db_connect);
    $_SESSION["errors"] = $errors;
    $_SESSION["registerType"] = "register";
    header("location: /register");
    exit();
}

$sql = "insert into users (username, email, password) values('$username','$email', '$password')";
$result = mysqli_query($db_connect, $sql);

$_SESSION["user"]["id"] = $db_connect->insert_id;
$_SESSION["user"]["name"] = $username;
mysqli_close($db_connect);

$redirectUrl = $_SESSION["redirectUrl"] ?? "/";
unset($_SESSION["redirectUrl"]);

header("location: $redirectUrl");
exit();
