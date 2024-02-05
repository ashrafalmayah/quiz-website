<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php require("../functions.php"); ?>
    <?php require("../partials/navbar.php"); ?>
    <main>
        <h1>لوحة التحكم</h1>
        <h2><?= $_SESSION["userId"] ?></h2>

        <div class="list">
            <div class="options">
                <a href="/exam/create" class="add-exam-btn">أضف اختبار</a>
            </div>
            <?php 
                $db_connect = connectDB();
                $userId = $_SESSION["userId"];
                $sql = "select id, name, create_date from exams where user_id = $userId";
                $result = mysqli_query($db_connect, $sql);
                while($exam = $result->fetch_assoc()){
                    $questionsCount = mysqli_query($db_connect, "select count(*) as questionsCount from questions where exam_id = {$exam["id"]}");
                    $questionsCount = $questionsCount->fetch_assoc()["questionsCount"];
                    ?>
                    <a href="/exam/view?id=<?= $exam["id"] ?>" class="item">
                        <h2><?= $exam["name"] ?></h2>
                        <p>عدد الاسئلة: <span><?= $questionsCount ?></span></p>
                    </a>
                <?php
                } 
                $db_connect->close();
                ?>
        </div>
    </main>
</body>

</html>