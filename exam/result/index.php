<?php 
require("../../functions.php");

$db_connect = connectDB();
$examId = $_GET["id"];
$userId = $_SESSION["user"]["id"];
$username = $_SESSION["user"]["name"];
$mark = mysqli_query($db_connect, "select mark from results where user_id = $userId and exam_id = $examId");
$mark = $mark->fetch_assoc()["mark"];
$questionsCount = mysqli_query($db_connect, "select count(*) as questionsCount from questions where exam_id = $examId");
$questionsCount = $questionsCount->fetch_assoc()["questionsCount"];
$percent = round(($mark / $questionsCount) * 100);
$rate;
if($percent >= 90){
    $rate = "ممتاز";
} elseif($percent >= 80) {
    $rate = "جيد جداً";
} elseif($percent >= 70) {
    $rate = "جيد";
} elseif($percent >= 60) {
    $rate = "مقبول";
} elseif($percent >= 50) {
    $rate = "ضعيف";
} else {
    $rate = "راسب";
}

// if(mysqli_num_rows($mark) > 0){
    
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>النتيجة</title>
    <link rel="stylesheet" href="results.css">
</head>

<body>
    <?php require("../../partials/navbar.php"); ?>
    <main>
        <div class="card">
            <div>
                <p> اسم المستخدم:</p>
                <h2><?= $username ?></h2>
            </div>

            <div>
                <p> النتيجه</p>
                <h2>
                    <?= $percent ?>%
                </h2>
            </div>
            <div>
                <p> التقدير</p>
                <h2>
                    <?= $rate ?>
                </h2>
            </div>
        </div>
        <div class="card">
            <div>
                <p>الاسئله المجاب عليها بطريقه صحيحه</p>

                <h2>
                    <?= $mark ?>/<?= $questionsCount ?>
                </h2>
            </div>
            <div>
                <p>الاسئله المجاب عليها بطريقه خاطئه</p>

                <h2>
                    <?= $questionsCount - $mark ?>/<?= $questionsCount ?>
                </h2>
            </div>
        </div>
        <a href="/exam/result/check-questions/?id=<?= $examId ?>" class="button">التحقق من الاسئله</a>
    </main>
</body>

</html>