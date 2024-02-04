<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel='stylesheet' href="style.css">
</head>

<body>
    <?php require("../functions.php"); ?>
    <?php require("../partials/navbar.php"); ?>
    <main>
        <h1>Register</h1>

        <i>Enter The Data</i><br><br>

        <form action="register_db.php" method="post">
            <input required type="text" name="username" id="username" placeholder="username"><br>
            <input required type="text" name="email" id="email" placeholder="email"><br>
            <input required type="password" name="password" id="password" placeholder="new password"><br>
            <input required type="password" name="confirmPassword" id="confirmPassword" placeholder="password confirmation"><br>

            <input type="submit" name="submit" id="submit" value="Register"><br>
        </form>

        <h3>or</h3>
        <br>
        <a id='login' href="/login">Log in</a>
    </main>
    <script src="register.js"></script>
</body>

</html>