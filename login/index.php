<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel='stylesheet' href="style.css">
</head>

<body>
    <?php require("../functions.php"); ?>
    <?php require("../partials/navbar.php"); ?>
    <main>
        <form action="login-db.php" method="post">
            <div class="main">
                <h1>Log in</h1>
                <input type="text" name="username" id="username" placeholder="username"><br>
                <input type="password" name="password" id="password" placeholder="password"><br>
                <input type="submit" name="submit" id="submit" value="Log in">

                <h3>or</h3><br>
                <a id='register' href="/register">Register </a>

            </div>
        </form>
    </main>
</body>

</html>