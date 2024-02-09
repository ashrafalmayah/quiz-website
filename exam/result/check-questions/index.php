<?php
require("../../../functions.php");

$db_connect = connectDB();
$examId = $_GET["id"];
$userId = $_SESSION["user"]["id"];
$examName = mysqli_query($db_connect, "SELECT name from exams where id = $examId");
$examName = $examName->fetch_assoc()["name"];
$questions = mysqli_query($db_connect, "SELECT id, question, question_type from questions where exam_id = $examId");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>التحقق من الاسئله</title>
  <link rel="stylesheet" href="check-questions.css">
</head>

<body>
  <?php require("../../../partials/navbar.php"); ?>
  <main>
    <div class="exam-name"><?= $examName ?></div>
    <div class="questions-container">
      <?php while ($question = $questions->fetch_assoc()) : ?>

        <div class="question">
          <h1><?= $question["question"] ?></h1>

          <?php if ($question["question_type"] == "select") : ?>
            <div class="question-options">
              <?php
              $selectedOptionId = mysqli_query($db_connect, "SELECT selected_option_id from user_answers where user_id = $userId and exam_id = $examId and question_id = {$question["id"]}");
              $nothingSelected = false;
              if (mysqli_num_rows($selectedOptionId) <= 0) {
                $selectedOptionId = -1;
                $nothingSelected = true;
              } else {
                $selectedOptionId = $selectedOptionId->fetch_assoc()["selected_option_id"];
              }

              $options = mysqli_query($db_connect, "select id, content, is_correct from options where question_id = {$question["id"]}");
              while ($option = $options->fetch_assoc()) :
                $isSelected = $selectedOptionId == $option["id"];
              ?>

                <div class="<?php if ($isSelected && !$option["is_correct"]) echo 'wrong';
                            elseif ($option["is_correct"]) echo 'correct'; ?>">
                  <?= $option["content"] ?>
                </div>


              <?php endwhile;
              if ($nothingSelected) {
                echo "<span class='wrong' style='display:none;'></span>";
              }
              ?>

            </div>

          <?php else : ?>
            <textarea name="" id="" cols="30" rows="10"></textarea>
          <?php endif; ?>

        </div>

      <?php endwhile;

      $db_connect->close();
      ?>
      <a href="/exam/result/?id=<?= $examId ?>" class="button">الرجوع الى النتيجة</a>
    </div>
  </main>
</body>

</html>