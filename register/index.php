<?php 
require("../functions.php"); 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل</title>
    <link rel='stylesheet' href="style.css">
</head>

<body>
    <?php require("../partials/navbar.php"); ?>
    <main>
        <h1>تسجيل</h1>

        <form action="register_db.php" method="post">
            <input required type="text" name="username" id="username" placeholder="اسم المستخدم"><br>
            <input required type="text" name="email" id="email" placeholder="البريد الالكتروني"><br>
            <input required type="password" name="password" id="password" placeholder="كلمة السر"><br>
            <input required type="password" name="confirmPassword" id="confirmPassword" placeholder="تأكيد كلمة السر"><br>

            <input type="submit" name="submit" id="submit" value="تسجيل"><br>
        </form>

        <h3>أو</h3>
        <br>
        <a id='login' href="/login">تسجيل دخول</a>
    </main>
    <script src="register.js"></script>
</body>

</html>