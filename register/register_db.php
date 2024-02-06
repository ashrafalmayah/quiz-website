<?php
    $db_connect = connectDB();

    $sql="SELECT username from users where username = '{$_POST["username"]}' or email='{$_POST["email"]}'";
    $result = mysqli_query($db_connect, $sql);
    
    if(mysqli_num_rows($result)>0){
        mysqli_close($db_connect);
        header("location: /register");
        exit();
    }
    else{
        $sql="insert into users (username, email, password) values('{$_POST["username"]}','{$_POST["email"]}', '{$_POST["password"]}')";
        $result = mysqli_query($db_connect, $sql);
        mysqli_close($db_connect);
        
        $_SESSION["user"]["id"] = $_POST["userId"];
        $_SESSION["user"]["name"] = $_POST["username"];
        header("location: /");
        exit();
    }

?>