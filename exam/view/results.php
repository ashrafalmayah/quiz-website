<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="results.css">
</head>

<body>
    <?php require("../functions.php"); ?>
    <?php require("../partials/navbar.php"); ?>
    <main>
        <div class="card">
            <div>
                <p> اسم المستخدم:</p>
                <h2>ashraf</h2>
            </div>

            <div>
                <p> النتيجه</p>
                <h2>
                    90%
                </h2>
            </div>
            <div>
                <p> التقدير</p>
                <h2>
                    ممتاز
                </h2>
            </div>
        </div>
        <div class="card">
            <div>
                <p>الاسئله المجاب علبه بطريقه صحيحه</p>

                <h2>
                    20/25
                </h2>
            </div>
            <div>
                <p>الاسئله المجاب علبه بطريقه خاطئه</p>

                <h2>
                    5/25
                </h2>
            </div>
        </div>
        <a href="check-questions.php" class="button">التحقق من الاسئله</a>
    </main>
</body>

</html>