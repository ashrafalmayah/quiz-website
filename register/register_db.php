<?php
    $db_connect = connectDB();

    $sql="SELECT username from users where username = '{$_POST["username"]}' or email='{$_POST["email"]}'";
    $result = mysqli_query($db_connect, $sql);

    if(mysqli_num_rows($result)>0){
        header("location: /register");
    }
    else{
        $sql="insert into users (username, email, password) values('{$_POST["username"]}','{$_POST["email"]}', '{$_POST["password"]}')";
        $result = mysqli_query($db_connect, $sql);
        $_SESSION["userId"] = $_POST["userId"];
        header("location: /");
    }

    mysqli_close($db_connect);
?>