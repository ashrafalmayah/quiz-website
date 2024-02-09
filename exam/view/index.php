<?php
require("../../functions.php");

$db_connect = connectDB();


$examId = $_GET["id"];
//if not registered
if(!isset($_SESSION["user"])){
  $_SESSION["redirectUrl"] = "/exam/view?id=$examId";
  header("location: /register");
}

$userId = $_SESSION["user"]["id"];
$result = mysqli_query($db_connect, "select id from results where user_id = $userId and exam_id = $examId");
if (mysqli_num_rows($result) > 0) {
  //already taken the exam

  $db_connect->close();
  header("location: /exam/result?id=$examId");
  exit();
}
$examName = mysqli_query($db_connect, "select name from exams where id = $examId");
$examName = $examName->fetch_assoc()["name"];
$questions = mysqli_query($db_connect, "select id, question, question_type from questions where exam_id = $examId");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="view-exam.css">
</head>

<body>
  <?php require("../../partials/navbar.php"); ?>
  <main>
    <div class="exam-name"><?= $examName ?></div>
    <form action="answers-store.php" method="post">
      <?php while ($question = $questions->fetch_assoc()) : ?>
        <div class="question">
          <h1><?= $question["question"] ?></h1>

          <?php if ($question["question_type"] == "select") : ?>
            <div class="question-options">
              <?php
              $options = mysqli_query($db_connect, "select id, content from options where question_id = {$question["id"]}");
              while ($option = $options->fetch_assoc()) : ?>

                <div>
                  <input type="radio" value="<?= $option["id"] ?>" name="answers[<?= $question["id"] ?>]" id="<?= $option["id"] ?>">
                  <label for="<?= $option["id"] ?>"><?= $option["content"] ?></label>
                </div>

              <?php endwhile; ?>
            </div>

          <?php else : ?>
            <textarea name="answers[<?= $question["id"] ?>]" id="" cols="30" rows="10"></textarea>
          <?php endif ?>

        </div>
      <?php endwhile;
      $db_connect->close();
      ?>
      <div>
        <input type="hidden" name="examId" value="<?= $examId ?>">
        <input type="submit" class="button" value="تاكيد الاجابة">
      </div>
    </form>
  </main>
</body>

</html>