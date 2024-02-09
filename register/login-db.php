<?php
require("../functions.php");

$errors = array();

$db_connect = connectDB();

$sql = "SELECT id, username, password from users where email = '{$_POST["email"]}'";
$result = mysqli_query($db_connect, $sql);
mysqli_close($db_connect);

if (mysqli_num_rows($result) <= 0) {
    $errors["login"] = "كلمة المرور او البريد غير صحيح";
} else {
    $row = mysqli_fetch_assoc($result);

    if (!password_verify($_POST['password'], $row["password"])) {
        $errors["login"] = "كلمة المرور او البريد غير صحيح";
    }
}

if (!empty($errors)) {
    $_SESSION["errors"] = $errors;
    $_SESSION["registerType"] = "login";
    header("location: /register");
    exit();
}


$_SESSION["user"]["id"] = $row["id"];
$_SESSION["user"]["name"] = $row["username"];

$redirectUrl = $_SESSION["redirectUrl"] ?? "/";
unset($_SESSION["redirectUrl"]);

header("location: $redirectUrl");
exit();
