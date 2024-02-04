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