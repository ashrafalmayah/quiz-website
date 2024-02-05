let questions;
const addNewQuestion = document.getElementById("add-new-question-btn");
const form = document.getElementById("questions-form");
const cancel = document.getElementById("cancel");

function addQuestion() {
    // const newQuestion = questionTemplate.cloneNode(true);
    const newQuestion = document.createElement("div");
    let max = -1;
    questions &&
        questions.forEach((question) => {
            if (question.dataset.questionId > max) max = question.dataset.questionId;
        });
    max++;
    newQuestion.innerHTML = `
    <div data-question-id="${max}" class="question">
        <span class="delete-question">X</span>
        <div class="options">
            <label>نوع السؤال: </label>
            <select name="questions[${max}][type]" class="question-type">
                <option value="select">اختيارات متعددة</option>
                <option value="direct">سؤال مباشر</option>
            </select>
        </div>
        <div class="question-structure">
            <textarea name="questions[${max}][content]" id="question" placeholder="اكتب السؤال هنا"></textarea>
            <div class="select-question">
                <div class="question-option" data-option-id="0">
                    <input type="radio" checked value="0" name="questions[${max}][isCorrect]">
                    <input type="text" name="questions[${max}][option][0]" placeholder="اكتب خيار">
                    <span class="delete-option">X</span>
                </div>
                <div class="question-option" data-option-id="1">
                    <input type="radio" value="1" name="questions[${max}][isCorrect]">
                    <input type="text" name="questions[${max}][option][1]" placeholder="اكتب خيار">
                    <span class="delete-option">X</span>
                </div>
                <button class="add-new-option-btn" type="button">أضف خيار جديد <i class="fa fa-plus"></i></button>
            </div>
        </div>
    </div>
    `;
    addNewQuestion.parentElement.insertBefore(newQuestion, addNewQuestion);
    questions = document.querySelectorAll(".question");
    handleQuestionActions(newQuestion);
}

function handleQuestionActions(question) {
    const questionType = question.querySelector(".question-type");
    const deleteQuestion = question.querySelector(".delete-question");
    const selectQuestion = question.querySelector(".select-question");

    questionType.addEventListener("change", () => {
        if (questionType.value == "select") {
            question
                .querySelector(".question-structure")
                .appendChild(selectQuestion);
        } else {
            question.querySelector(".select-question").remove();
        }
    });

    deleteQuestion.addEventListener("click", () => {
        if (questions.length > 1) {
            question.remove();
            questions = document.querySelectorAll(".question");
        }
    });

    handleQuestionOptions(question);
}

function handleQuestionOptions(question) {
    const addNewOption = question.querySelector(".add-new-option-btn");
    let questionOptions = question.querySelectorAll(".question-option");

    addNewOption.addEventListener("click", () => {
        addOption(addNewOption, () => {
            questionOptions = question.querySelectorAll(".question-option");
        });
    });

    questionOptions.forEach((option) => {
        handleOptionActions(option, () => {
            questionOptions = question.querySelectorAll(".question-option");
        });
    });
}

function handleOptionActions(option, callback) {
    const deleteOption = option.querySelector(".delete-option");

    deleteOption.addEventListener("click", () => {
        const questionOptions =
            option.parentElement.querySelectorAll(".question-option");
        console.log(questionOptions);
        if (questionOptions.length > 2) {
            option.remove();
            callback();
        }
    });
}

function addOption(addNewOption, callback) {
    const id = addNewOption.closest(".question").dataset.questionId;
    const options =
        addNewOption.parentElement.querySelectorAll(".question-option");
    let max = -1;
    options &&
        options.forEach((option) => {
            if (option.dataset.optionId > max) max = option.dataset.optionId;
        });
    max++;
    const newOption = document.createElement("div");
    newOption.innerHTML = `
    <div class="question-option" data-option-id="${max}">
        <input type="radio" value="${max}" name="questions[${id}][isCorrect]">
        <input type="text" name="questions[${id}][option][${max}]" placeholder="اكتب خيار">
        <span class="delete-option">X</span>
    </div>
    `;
    addNewOption.parentElement.insertBefore(newOption, addNewOption);
    handleOptionActions(newOption, callback);
}

// Event listeners

addNewQuestion.addEventListener("click", addQuestion);

form.addEventListener("submit", (e) => {
    const inputs = form.querySelectorAll("input, textarea");
    let isEmpty = false;
    inputs.forEach((input) => {
        if (input.value.trim() == "") {
            e.preventDefault();
            isEmpty = true;
        }
    });
    if (isEmpty) {
        document.querySelector(".note").textContent = "يرجى ملء جميع الحقول";
        return;
    }
    document.querySelector(".note").textContent = "";
});

addQuestion();
