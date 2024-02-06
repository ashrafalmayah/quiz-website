<?php 
require("../../functions.php"); 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create an Exam</title>
    <link rel="stylesheet" href="exam-create.css">
</head>

<body>
    <?php require("../../partials/navbar.php"); ?>
    <main>
        <!-- Question Template -->


        <form action="exam-store.php" method="post" id="questions-form">
            <div>
                <input type="text" class="exam-name" name="examName" id="examName" placeholder="اسم الاختبار:">
            </div>
            <button id="add-new-question-btn" type="button">أضف سؤال جديد <i class="fa fa-plus"></i></button>
            <div>
                <input type="submit" value="تأكيد">
                <a href="../dashboard.php" id="cancel">إلغاء</a>
                <span class="note"></span>
            </div>
        </form>
    </main>

    <script src="exam-create.js"></script>
    <script src="https://kit.fontawesome.com/6bef7c705c.js" crossorigin="anonymous"></script>
</body>

</html>