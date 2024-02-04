// const questions = [{
//         question: "What is the capital of France?",
//         answers: ["Paris", "London", "Rome", "Berlin"],
//         correctAnswer: "Paris"
//     },
//     {
//         question: "What is the largest planet in our solar system?",
//         answers: ["Jupiter", "Saturn", "Mars", "Earth"],
//         correctAnswer: "Jupiter"
//     }
// ];
// const questionsEl = document.getElementById("questions");
// const resultsEl = document.getElementById("results");
// const submitBtn = document.getElementById("submit");
// let currentQuestion = 0;
// let score = 0;

// function showQuestion() {
//     const question = questions[currentQuestion];
//     questionsEl.innerHTML = `
//     <h2>${question.question}</h2>
//     ${question.answers.map((answer, index) => `
//     <div>
//     <input type="radio" name="answer" value="${answer}" id="answer${index}">
//     <label for="answer${index}">${answer}</label>
//     </div>
//     `).join("")}
//     `;
//     submitBtn.addEventListener("click", checkAnswer);
//    }
//    function checkAnswer() {
//     const answer = document.querySelector('input[name="answer"]:checked').value;
//     const question = questions[currentQuestion];
//     if (answer === question.correctAnswer) {
//     score++;
//     }
//     currentQuestion++;
//     if (currentQuestion === questions.length) {
//     showResults();
//     } else {
//     showQuestion();
//     }
//    }
//    function showResults() {
//     resultsEl.innerHTML = `
//     <h2>You scored ${score} out of ${questions.length}</h2>
//     `;
//     resultsEl.style.display = "block";
//    }
// showQuestion();


const $list = Array
    .from(
        document.getElementsByTagName('li'),
    );
$list.forEach(($li) => {
    $li.addEventListener(
        'click',
        () => {
            document
                .getElementsByClassName('active')[0]
                .classList
                .remove('active');
            $li.classList.add('active');
        },
    );
});