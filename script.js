// Letter sound mapping
const letterSounds = {
    A: { sound: 'sounds/a.mp3', word: 'Apple', emoji: '🍎' },
    B: { sound: 'sounds/b.mp3', word: 'Ball', emoji: '⚽' },
    C: { sound: 'sounds/c.mp3', word: 'Cat', emoji: '🐱' },
    // ... continue to Z
};

// Play sound on letter click
function playSound(letter) {
    const audio = new Audio(letterSounds[letter].sound);
    audio.play();
    document.getElementById('display').innerHTML =
        `${letter} is for ${letterSounds[letter].word}! ${letterSounds[letter].emoji}`;
}

// Game 4 — Missing Letter
const game4Data = [
    { image: 'images/cat.png', answer: 'C', hint: 'A pet that says meow' },
    { image: 'images/dog.png', answer: 'D', hint: 'A pet that says woof' },
    // ... 8 more items
];
let game4Score = 0;
let game4Current = 0;

function loadGame4() {
    const item = game4Data[game4Current];
    document.getElementById('game4-image').src = item.image;
    document.getElementById('game4-hint').textContent = item.hint;
    document.getElementById('game4-feedback').textContent = '';
}

function checkGame4(letter) {
    if (letter === game4Data[game4Current].answer) {
        game4Score++;
        document.getElementById('game4-feedback').textContent = '✅ Great job!';
    } else {
        document.getElementById('game4-feedback').textContent = `❌ Try again — the first letter is "${game4Data[game4Current].answer}"`;
    }
    game4Current++;
    if (game4Current < 10) setTimeout(loadGame4, 1500);
    else alert(`Game Over! Score: ${game4Score}/10 🎉`);
}

// Login/Register modals
function showLogin() { document.getElementById('loginModal').style.display = 'block'; }
function showRegister() { window.location.href = 'register.html'; }