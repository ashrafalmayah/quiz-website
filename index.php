<?php 
require("functions.php");
$db_connect = connectDB();
$userId = $_SESSION["user"]["id"];
$search = isset($_GET['search']) ? $_GET['search'] : '';
$totalExams = mysqli_query($db_connect, "SELECT COUNT(*) AS total FROM exams where name like '%$search%'");
$totalExams = $totalExams->fetch_assoc()["total"];

$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

$examsPerPage = 10;
$totalPages = ceil(($totalExams - 1) / $examsPerPage);
$offset = ($currentPage - 1) * $examsPerPage;

$sql = "SELECT id, name, create_date FROM exams where name like '%$search%' LIMIT $offset, $examsPerPage";
$exams = mysqli_query($db_connect, $sql);

?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizly</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <?php require("partials/navbar.php"); ?>
    <main>
        <form class="search">
            <label> ابحث عن اختبارات</label>
            <input type="text" class="search-text" name="search" />
            <input type="submit" value="بحث">
        </form>
    
    
        <div class="wrapper">
            <div class="list">
                <?php 
                    if(mysqli_num_rows($exams) <= 0){
                        echo '<h2>لم يتم العثور على اي اختبارات</h2>';
                    }

                    while($exam = $exams->fetch_assoc()):
                        $questionsCount = mysqli_query($db_connect, "select count(*) as questionsCount from questions where exam_id = {$exam["id"]}");
                        $questionsCount = $questionsCount->fetch_assoc()["questionsCount"];
                        ?>
                        <a href="/exam/view?id=<?= $exam["id"] ?>" class="item">
                            <h2><?= $exam["name"] ?></h2>
                            <p>عدد الاسئلة: <span><?= $questionsCount ?></span></p>
                        </a>
                    <?php endwhile;
                    $db_connect->close();
                    ?>
            </div>
            <?php if($totalPages > 1){
                echo '<ul class="pagination">';
                    $start = max(1, $currentPage - 6);
                    $end = min($totalPages, $start + 9);
                    
                    echo '<li><a class"'.($currentPage == 1) ? "active" : "".'" href="?page='.($currentPage - 1).'">السابق</a></li>';
                    for($i = $start; $i <= $end; $i++){
                        echo '<li class="'.($i == $currentPage) ? "active" : "".'"><a href="?page='.$i.'">'.$i.'</a></li>';
                    }
                    echo '<li><a class"'.($currentPage == $totalPages) ? "active" : "".'" href="?page='.($currentPage + 1).'">التالي</a></li>';
                echo '</ul>';
            }
            ?>
        </div>
    </main>

    <script src="script.js"></script>
</body>

</html>