<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create an Exam</title>
    <link rel="stylesheet" href="exam-create.css">
</head>
<body>
    <main>
        <!-- Question Template -->
        <div id="questionTemplate" class="hidden">
            <span class="delete-question">X</span>
            <div class="options">
                <label>نوع السؤال: </label>
                <select name="questionType" class="question-type">
                    <option value="select">اختيارات متعددة</option>
                    <option value="direct">سؤال مباشر</option>
                </select>
            </div>
            <div class="question-structure">
                <textarea name="question" id="question" placeholder="اكتب السؤال هنا"></textarea>
                <div class="select-question">
                    <div class="question-option">
                        <input type="radio" name="correct">
                        <input type="text" name="questionOption" placeholder="اكتب خيار">
                        <span class="delete-option">X</span>
                    </div>
                    <div class="question-option">
                        <input type="radio" name="correct">
                        <input type="text" name="questionOption" placeholder="اكتب خيار">
                        <span class="delete-option">X</span>
                    </div>
                    <button class="add-new-option-btn" type="button">أضف خيار جديد <i class="fa fa-plus"></i></button>
                </div>
            </div>
        </div>
        
        <form action="" method="get" id="questions-form">
            
            <button id="add-new-question-btn" type="button">أضف سؤال جديد <i class="fa fa-plus"></i></button>
            <input type="submit" value="تأكيد">
            <a href="../dashboard.php" id="cancel">إلغاء</a>
            <span class="note"></span>
        </form>
    </main>
    
    <script src="exam-create.js"></script>
    <script src="https://kit.fontawesome.com/6bef7c705c.js" crossorigin="anonymous"></script>
</body>
</html>