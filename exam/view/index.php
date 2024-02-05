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
  <?php require("../../functions.php"); ?>
  <?php require("../../partials/navbar.php"); ?>
  <main>
    <h2> اسم الختبار</h2>
    <form action="answers-store.php" method="post">
      <?php
        $db_connect = connectDB();
        $questions = mysqli_query($db_connect, "select id, question, question_type from questions where exam_id = {$_GET["id"]}");
        while($question = $questions->fetch_assoc()){
          if($question["question_type"] == "select"){
            ?>
            <div class="question">
              <h1><?= $question["question"] ?></h1>
              <div class="question-options">
                <?php 
                $options = mysqli_query($db_connect, "select id, content from options where question_id = {$question["id"]}");
                while($option = $options->fetch_assoc()){
                ?>
                <div>
                  <input type="radio" value="<?= $option["id"] ?>" name="answers[<?= $question["id"] ?>]" id="">
                  <label for=""><?= $option["content"] ?></label>
                </div>
                <?php } ?>
              </div>
            </div>
          <?php
          } else {
            ?>
            <div class="question">
              <h1><?= $question["question"] ?></h1>
              <textarea name="answers[<?= $question["id"] ?>]" id="" cols="30" rows="10"></textarea>
            </div>
            <?php 
          }
        }
        $db_connect->close();
      ?>
      <div>
        <input type="hidden" name="examId" value = "<?= $_GET["id"] ?>">
        <input type="submit" value="تاكيدالاجابة">
      </div>
    </form>
  </main>
</body>

</html>