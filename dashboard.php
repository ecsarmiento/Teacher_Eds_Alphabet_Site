<?php
session_start();
// Block access if NOT signed in
if (!isset($_SESSION['user_id'])) {
    header("Location: index.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard — Learn A to Z</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <!-- Top Bar -->
        <div class="top-bar">
            <span class="greeting">Hello, <?php echo $_SESSION['full_name']; ?>! 🎉</span>
            <a href="signout.php" class="signout-link">Sign Out</a>
        </div>

        <h1>Let's Learn! 📚</h1>
        
        <h2>📖 Lessons</h2>
        <div class="lesson-grid">
            <a href="lessons/lesson1.html" class="lesson-card">Lesson 1: The Alphabet</a>
            <a href="lessons/lesson2.html" class="lesson-card">Lesson 2: Phonics & Blending</a>
            <a href="lessons/lesson3.html" class="lesson-card">Lesson 3: Animals A–Z</a>
            <a href="lessons/lesson4.html" class="lesson-card">Lesson 4: Things A–Z</a>
            <a href="lessons/lesson5.html" class="lesson-card">Lesson 5: Countries A–Z</a>
            <a href="lessons/lesson6.html" class="lesson-card">Lesson 6: Names A–Z</a>
            <a href="lessons/lesson7.html" class="lesson-card">Lesson 7: Fruits A–Z</a>
        </div>

        <h2>🎮 Games</h2>
        <div class="game-grid">
            <a href="games/game1.html" class="game-card">1. Crossword</a>
            <a href="games/game2.html" class="game-card">2. Guess the Word</a>
            <a href="games/game3.html" class="game-card">3. Word Puzzle</a>
            <a href="games/game4.html" class="game-card">4. Guess the Missing Letter</a>
            <!-- Games 5–10 here -->
        </div>
    </div>
</body>
</html>
