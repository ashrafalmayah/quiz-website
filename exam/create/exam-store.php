<?php

require("../../functions.php");


$db_connect = connectDB();

$now = date('YYYY-mm-dd');

$userId = $_SESSION["user"]["id"];

$sql = "INSERT INTO exams (name, user_id, create_date) VALUES ('{$_POST["examName"]}', $userId, NOW())";
$result = mysqli_query($db_connect, $sql);

$examId = $db_connect->insert_id;

foreach ($_POST["questions"] as $question) {
    $sql = "INSERT INTO questions (exam_id, question, question_type) VALUES ($examId, '{$question["content"]}', '{$question["type"]}')";
    $result = mysqli_query($db_connect, $sql);
    $questionId = $db_connect->insert_id;

    if (!isset($question["option"]))
        break;

    $isCorrect = $question["isCorrect"];

    $options = array_map(function ($option) {
        return ["content" => $option, "isCorrect" => 0];
    }, $question["option"]);

    $options[$isCorrect]["isCorrect"] = 1;

    foreach ($options as $option) {
        $sql = "INSERT INTO options (content, is_correct, question_id) VALUES ('{$option["content"]}', {$option["isCorrect"]}, $questionId)";
        $result = mysqli_query($db_connect, $sql);
    }
}

$db_connect->close();

header("location: /dashboard");
exit();
