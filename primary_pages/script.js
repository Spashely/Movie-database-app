const questions = [
    {
        question: "What is the name of the boy who is left home alone at Christmas?",
        answers: [
            { text: "Tommy", correct: false },
            { text: "Kevin", correct: true },
            { text: "Jack", correct: false },
            { text: "Ben", correct: false }
        ]
    },
    {
        question: "In which movie do toys come to life when humans are not around",
        answers: [
            { text: "Cars", correct: false },
            { text: "Monsters on Vacation", correct: false },
            { text: "The Lego Movie", correct: false },
            { text: "Toy Story", correct: true }
        ]
    },
    {
        question: "Who is Harry Potter’s best friend?",
        answers: [
            { text: "Ron Weasley", correct: true },
            { text: "Draco Malfoy", correct: false },
            { text: "Neville Longbottom", correct: false },
            { text: "Cedric Diggory", correct: false }
        ]
    },
    {
        question: "What is the name of the lion in The Lion King?",
        answers: [
            { text: "Mufasa", correct: false },
            { text: "Simba", correct: true },
            { text: "Scar", correct: false },
            { text: "Timon", correct: false }
        ]
    },
        {
        question: "Which movie is about traveling through time using a car?",
        answers: [
            { text: "Fast & Furious", correct: false },
            { text: "Back to the Future", correct: true },
            { text: "The Matrix", correct: false },
            { text: "Inception", correct: false }
        ]
    },
            {
        question: "Who lives in a pineapple under the sea?",
        answers: [
            { text: "SpongeBob", correct: true },
            { text: "Nemo", correct: false },
            { text: "Patrick", correct: false },
            { text: "Squidward", correct: false }
        ]
    },
            {
        question: "What is the name of the snowman in Frozen?",
        answers: [
            { text: "Kristoff", correct: false },
            { text: "Sven", correct: false },
            { text: "Hans", correct: false },
            { text: "Olaf", correct: true }
        ]
    },
            {
        question: "Which superhero shoots webs?",
        answers: [
            { text: "Batman", correct: false },
            { text: "Iron Man", correct: false },
            { text: "Spider-Man", correct: true },
            { text: "Superman", correct: false }
        ]
    },
];

const questionElement = document.getElementById("question");
const answerButton = document.getElementById("answer-buttons");
const nextButton = document.getElementById("next-btn");

let currentQuestionsIndex = 0;
let score = 0;

function startQuiz()  {
    currentQuestionsIndex = 0;
    score = 0;
    nextButton.innerHTML = 'Next';
    showQuestion();
}

function showQuestion() {
    resetState();
    let currentQuestion = questions[currentQuestionsIndex];
    let questionNo = currentQuestionsIndex + 1;
    questionElement.innerHTML = questionNo + ". " + currentQuestion.question;

    currentQuestion.answers.forEach(answer => {
        const button = document.createElement("button");
        button.innerHTML = answer.text;
        button.classList.add("btn"); // Corrected class name
        answerButton.appendChild(button);
        if (answer.correct) {
            button.dataset.correct = answer.correct
        }
        button.addEventListener("click", selectAnswer)
    });
}

function resetState() {
    nextButton.style.display = 'none'
    while(answerButton.firstChild){
        answerButton.removeChild(answerButton.firstChild);
    }
}

function selectAnswer(e) {
    const selectedBtn = e.target
    const isCorrect = selectedBtn.dataset.correct === "true";
    if (isCorrect) {
        selectedBtn.classList.add("correct");
        score++;
    } else {
        selectedBtn.classList.add("incorrect"); 
    }
    Array.from(answerButton.children).forEach(button => {
        if (button.dataset.correct === "true") {
            button.classList.add("correct");
        }
        button.disabled = true;
    });
    nextButton.style.display = "block";
}

function showScore() {
    resetState();
    questionElement.innerHTML = `You scored ${score} out of ${questions.length}!`;
    nextButton.innerHTML = 'Play Again'
    nextButton.style.display = "block";
}

function handleNextButton() {
    currentQuestionsIndex++;
    if (currentQuestionsIndex < questions.length) {
        showQuestion();

    } else {
        showScore();
    }
}

nextButton.addEventListener("click", () => {
    if (currentQuestionsIndex < questions.length) {
        handleNextButton();
    } else {
        startQuiz();
    }
})

startQuiz();