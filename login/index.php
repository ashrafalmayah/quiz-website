<?php
require("../functions.php"); 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل دخول</title>
    <link rel='stylesheet' href="style.css">
</head>

<body>
    <?php require("../partials/navbar.php"); ?>
    <main>
        <form action="login-db.php" method="post">
            <div class="main">
                <h1>تسجيل دخول</h1>
                <input type="text" name="username" id="username" placeholder="اسم المستخدم"><br>
                <input type="password" name="password" id="password" placeholder="كلمة السر"><br>
                <input type="submit" name="submit" id="submit" value="تسجيل دخول">

                <h3>أو</h3><br>
                <a id='register' href="/register">تسجيل</a>

            </div>
        </form>
    </main>
</body>

</html>