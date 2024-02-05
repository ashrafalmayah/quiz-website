<?php 

session_start();

function dd($var) {
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    die();
}

function connectDB(){
    $db_connect = mysqli_connect('localhost', 'root', '', 'quizly')
    or die(mysqli_connect_error());

    if (!$db_connect) {
        die("connection failed");
    }

    return $db_connect;
}