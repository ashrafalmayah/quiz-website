<?php
require("../functions.php");

$db_connect = connectDB();
$userId = $_SESSION["user"]["id"];
$search = isset($_GET['search']) ? $_GET['search'] : '';
$totalExams = mysqli_query($db_connect, "SELECT COUNT(*) AS total FROM exams where user_id = $userId and name like '%$search%'");
$totalExams = $totalExams->fetch_assoc()["total"];

$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

$examsPerPage = 10;
$totalPages = ceil(($totalExams - 1) / $examsPerPage);
$offset = ($currentPage - 1) * $examsPerPage;

$sql = "SELECT id, name, create_date FROM exams where user_id = $userId and name like '%$search%' ORDER BY create_date DESC LIMIT $offset, $examsPerPage";
$exams = mysqli_query($db_connect, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php require("../partials/navbar.php"); ?>
    <main>
        <h1>لوحة التحكم</h1>
        <h2><?= $_SESSION["user"]["name"] ?></h2>

        <div class="list">
            <div class="options">
                <form class="search">
                    <label> ابحث عن اختبارات</label>
                    <input type="text" class="search-text" name="search" />
                    <input type="submit" value="بحث">
                </form>
                <a href="/exam/create" class="add-exam-btn">أضف اختبار</a>
            </div>
            <?php
            if (mysqli_num_rows($exams) <= 0) {
                echo '<h2>لم يتم العثور على اي اختبارات</h2>';
            }

            while ($exam = $exams->fetch_assoc()) :
                $questionsCount = mysqli_query($db_connect, "select count(*) as questionsCount from questions where exam_id = {$exam["id"]}");
                $questionsCount = $questionsCount->fetch_assoc()["questionsCount"];
            ?>
                <div class="item">
                    <a href="/exam/view?id=<?= $exam["id"] ?>">
                        <h2><?= $exam["name"] ?></h2>
                        <p>عدد الاسئلة: <span><?= $questionsCount ?></span></p>
                    </a>
                    <a href="/students-results?id=<?= $exam["id"] ?>" class="button">عرض نتائج الطلاب</a>
                </div>
            <?php
            endwhile;
            $db_connect->close();
            ?>
            <?php if ($totalPages > 1) {
                echo '<ul class="pagination">';
                $start = max(1, $currentPage - 6);
                $end = min($totalPages, $start + 9);

                echo '<li class="' . (($currentPage == 1) ? "active" : "") . '"><a href="?page=' . ($currentPage - 1) . '">السابق</a></li>';
                for ($i = $start; $i <= $end; $i++) {
                    echo '<li class="' . (($i == $currentPage) ? "active" : "") . '"><a href="?page=' . $i . '">' . $i . '</a></li>';
                }
                echo '<li class="' . (($currentPage == $totalPages) ? "active" : "") . '"><a href="?page=' . ($currentPage + 1) . '">التالي</a></li>';
                echo '</ul>';
            }
            ?>
        </div>
    </main>
</body>

</html>