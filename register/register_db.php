<?php
    $db_connect = mysqli_connect('localhost','root','','quizly')
    or die(mysqli_connect_error());

    if(!$db_connect){
        die("connection failed");
    }

    $sql="SELECT username from users where username = '{$_POST["username"]}' or email='{$_POST["email"]}'";
    $result = mysqli_query($db_connect, $sql);

    if(mysqli_num_rows($result)>0){
        header("location: /register");
    }
    else{
        $sql="insert into users (username, email, password) values('{$_POST["username"]}','{$_POST["email"]}', '{$_POST["password"]}')";
        $result = mysqli_query($db_connect, $sql);
        $_SESSION["username"] = $_POST["username"];
        header("location: /");
    }

    mysqli_close($db_connect);
?>