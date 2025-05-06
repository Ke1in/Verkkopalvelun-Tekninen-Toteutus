const questions = [
    {
        question: "What's the capital city of Finland?",
        answers: ["Helsinki", "Tampere", "Turku", "Oulu"],
        correct: 0
    },
    {
        question: "What's 2 + 2?",
        answers: ["3", "4", "5", "6"],
        correct: 1
    },
    {
        question: "What's the worlds biggest ocean?",
        answers: ["Atlantic", "Pacific", "Indian Ocean"],
        correct: 1
    }
];

let currentQuestionIndex = 0;

function loadQuestion() {
    const questionElement = document.getElementById("question");
    const answersElement = document.getElementById("answers");
    const feedbackElement = document.getElementById("feedback");
    const nextButton = document.getElementById("next-button");

    feedbackElement.innerText = "";
    answersElement.innerHTML = "";

    const currentQuestion = questions[currentQuestionIndex];
    questionElement.innerText = currentQuestion.question;

    currentQuestion.answers.forEach((answer, index) => {
        const button = document.createElement("button");
        button.innerText = answer;
        button.onclick = () => checkAnswer(index);
        answersElement.appendChild(button);
    });

    nextButton.style.display = "none";
}

function checkAnswer(selectedIndex) {
    const feedbackElement = document.getElementById("feedback");
    const nextButton = document.getElementById("next-button");
    const currentQuestion = questions[currentQuestionIndex];

    if (selectedIndex === currentQuestion.correct) {
        feedbackElement.innerText = "Correct!";
        feedbackElement.style.color = "green";
    } else {
        feedbackElement.innerText = "Wrong!";
        feedbackElement.style.color = "red";
    }

    nextButton.style.display = "block";
}

function nextQuestion() {
    currentQuestionIndex++;

    if (currentQuestionIndex < questions.length) {
        loadQuestion();
    } else {
        const quizContainer = document.getElementById("quiz-container");
        quizContainer.innerHTML = "<h1>Thank you for playing!</h1>";
    }
}

window.onload = loadQuestion;