function randomLetter() {
    const letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    return letters.charAt(Math.floor(Math.random() * letters.length));
}

function randomColor() {
    const colors = ["#FF5733", "#33FF57", "#3357FF", "#F3FF33", "#FF33A8", "#A833FF"];
    return colors[Math.floor(Math.random() * colors.length)];
}

function randomPosition(minX, maxX, minY, maxY) {
    const x = Math.random() * (maxX - minX) + minX;
    const y = Math.random() * (maxY - minY) + minY;
    return { x, y };
}

function createFloatingLetter() {
    const steadyAreaWidth = window.innerWidth;
    const steadyAreaHeight = window.innerHeight;

    const letter = document.createElement('div');
    letter.classList.add('letter-floating');
    letter.textContent = randomLetter();
    letter.style.color = randomColor();

    const { x, y } = randomPosition(0, steadyAreaWidth, 0, steadyAreaHeight);
    letter.style.left = `${x}px`;
    letter.style.top = `${y}px`;
    document.body.appendChild(letter);

    setTimeout(() => letter.remove(), 5000);
}
setInterval(createFloatingLetter, 150);

//changing signin <-> signup
function toggleForm(formId) {
    document.querySelectorAll('.form-section').forEach(section => {
        section.classList.remove('active');
    });
    document.querySelector(`#${formId}`).classList.add('active');

    document.querySelectorAll('.toggle ul li').forEach(tab => {
        tab.classList.remove('active');
    });
    document.querySelector(`.toggle ul li[onclick="toggleForm('${formId}')"]`).classList.add('active');
}

