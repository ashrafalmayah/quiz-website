<?php 
require("../functions.php"); 

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
          <th>Grade</th>
          <th>Name</th>
          <th style="width: 0.781; height: 0px; width: 0px;">ID</th>
        </tr>

        <?php
        $students = [
          ['grade' => 55, 'name' => 'John Doe', 'id' => 1],
          ['grade' => 45, 'name' => 'Jane Smith', 'id' => 2],
          ['grade' => 60, 'name' => 'Mike Johnson',  'id' => 3],
          ['grade' => 30, 'name' => 'Sara Brown', 'id' => 4],
          ['grade' => 35, 'name' => 'David Williams', 'id' => 5],
        ];
        foreach ($students as $student) {

          echo "<tr>";
          echo "<td id='grade_ " . $student['id'] . "'style='background-color:" . (($student['grade'] < 50) ? "red" : "green") . "'>" . $student['grade'] . "</td>";
          echo "<td>{$student['name']}</td>";
          echo "<td>{$student['id']}</td>";
          echo "</tr>";
        }
        ?>
      </table>
  </main>

</body>

</html>