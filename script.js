document.addEventListener('DOMContentLoaded', () => {
    const themeToggleCheckbox = document.getElementById('theme-toggle');
    const currentTheme = localStorage.getItem('theme');

    if (currentTheme) {
        document.body.classList.add(currentTheme);
        if (currentTheme === 'dark-mode') {
            themeToggleCheckbox.checked = true;
        }
    }

    themeToggleCheckbox.addEventListener('change', () => {
        document.body.classList.toggle('dark-mode');
        
        let theme = 'light-mode';
        if (document.body.classList.contains('dark-mode')) {
            theme = 'dark-mode';
        }
        localStorage.setItem('theme', theme);
    });
});
function showNextQuestion(currentIndex) {
    const currentQuestion = document.getElementById('question_' + currentIndex);
    const nextQuestion = document.getElementById('question_' + (currentIndex + 1));
    
    if (nextQuestion) {
        currentQuestion.style.display = 'none';
        nextQuestion.style.display = 'block';
    } else {
        currentQuestion.style.display = 'none';
        document.getElementById('submit-section').style.display = 'block';
    }
}