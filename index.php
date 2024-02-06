<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizly</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <?php require("functions.php"); ?>
    <?php require("partials/navbar.php"); ?>
    <main>
        <div class="container">
            <label> ابحث عن اختبارات</label>
            <input type="text" />
        </div>
    
    
        <div class="wrapper">
            <div class="list">
                <?php 
                    $db_connect = connectDB();
                    $userId = $_SESSION["user"]["id"];
                    $sql = "SELECT id, name, create_date from exams limit 8";
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
            <ul class="pagination">
                <li><a href="#">previous</a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">6</a></li>
                <li><a href="#">7</a></li>
                <li><a href="#">8</a></li>
                <li><a href="#">Next</a></li>
            </ul>
        </div>
    </main>

    <script src="script.js"></script>
</body>

</html>