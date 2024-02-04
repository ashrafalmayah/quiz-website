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
  <?php require("../functions.php"); ?>
  <?php require("../partials/navbar.php"); ?>
  <main>
    <h2> اسم الختبار</h2>
    <form action="">
      <div class="question">
        <h1>السؤال الاول</h1>
        <label for=""> في اي عام ولدة </label>
        <div class="question-options">
          <div>
            <input type="radio" name="q1" id="">
            <label for="">2000 </label>
          </div>
          <div>
            <input type="radio" name="q1" id="">
            <label for="">2000 </label>
          </div>
          <div>
            <input type="radio" name="q1" id="">
            <label for="">2000 </label>
          </div>
          <div>
            <input type="radio" name="q1" id="">
            <label for="">2000 </label>
          </div>
        </div>
      </div>
      <div class="question">
        <h1>السؤال الثاني</h1>
        <label for="">عبر عنن حياتك</label>
        <textarea name="" id="" cols="30" rows="10"></textarea>
      </div>
      <div>
        <input type="submit" value="تاكيدالاجابة">
      </div>
    </form>
  </main>
</body>

</html>