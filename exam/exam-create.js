let questions;
const addNewQuestion = document.getElementById("add-new-question-btn");
const form = document.getElementById("questions-form");
const cancel = document.getElementById("cancel");
const questionTemplate = document.getElementById("questionTemplate");
const questionsOptionTemplate =
    questionTemplate.querySelector(".question-option");
const selectQuestion = questionTemplate.querySelector(".select-question");

function addQuestion() {
    const newQuestion = questionTemplate.cloneNode(true);
    newQuestion.classList.remove("hidden");
    newQuestion.classList.add("question");
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
    const newOption = questionsOptionTemplate.cloneNode(true);
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
    if (isEmpty)
        document.querySelector(".note").textContent = "يرجى ملء جميع الحقول";
    else document.querySelector(".note").textContent = "";
});

addQuestion();
