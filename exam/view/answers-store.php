<?php 
require("../../functions.php");

$db_connect = connectDB();
$userId = $_SESSION["userId"];
$examId = $_POST["examId"];

$questionsCount = mysqli_query($db_connect, "select count(*) as questionsCount from questions where exam_id = {$exam["id"]}");
$questionsCount = $questionsCount->fetch_assoc()["questionsCount"];
$correct = 0;

foreach($_POST["answers"] as $questionId => $optionId){
    $sql = "INSERT INTO user_answers (user_id, exam_id, question_id, selected_option_id) VALUES ($userId, $examId, $questionId, $optionId)";
    mysqli_query($db_connect, $sql);
    $isCorrect = mysqli_query($db_connect, "SELECT isCorrect FROM options WHERE id = $optionId");
    $isCorrect = $isCorrect->fetch_assoc()["isCorrect"];
    if($isCorrect){
        $correct++;
    }

}
$mark = ($questionsCount / $correct) * 100;

$sql = "INSERT INTO results (mark, exam_id, user_id) VALUES ($mark , $examId, $userId)";
mysqli_query($db_connect, $sql);

$db_connect->close();

header("location: /exam/result?id=$examId");