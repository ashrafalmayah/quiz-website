<?php
require("../functions.php");

$db_connect = connectDB();

$examId = $_GET["id"];
$results = mysqli_query($db_connect, "SELECT id, mark, user_id FROM results where exam_id = $examId");
$questionsCount = mysqli_query($db_connect, "select count(*) as questionsCount from questions where exam_id = $examId");
$questionsCount = $questionsCount->fetch_assoc()["questionsCount"];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="" href="style.css">
  <title>Document</title>
</head>

<body>
  <?php require("../partials/navbar.php"); ?>
  <main>
    <div class="container">
      <div class="hedeng">
        <p class="cp_hhy"> نتائج اختبارات الطلاب </p>
        <p> ترتيب الطلاب </p>
      </div>

      <table id="studentsTable">
        <tr>
          <th>الاسم</th>
          <th>النتيجة</th>
        </tr>

        <?php
        while ($result = $results->fetch_assoc()) {
          $studentName = mysqli_query($db_connect, "SELECT username from users where id = {$result["user_id"]}");
          $studentName = $studentName->fetch_assoc()["username"];
          $mark = round(($result['mark'] / $questionsCount) * 100);
          echo '<tr class="' . ($mark < 50 ? "failed" : "") . '">';
          echo "<td>$studentName</td>";
          echo '<td id="grade_ ' . $result['id'] . '">' . $mark . '%</td>';
          echo "</tr>";
        }
        ?>
      </table>
      <?php
      if (mysqli_num_rows($results) <= 0) {
        echo '<h3>لا يوجد نتائج لهذا الاختبار للوقت الحالي<h3>';
      }
      ?>
  </main>

</body>

</html>