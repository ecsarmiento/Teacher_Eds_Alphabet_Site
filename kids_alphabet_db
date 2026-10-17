-- Users table (parents/teachers)
CREATE TABLE users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('parent','teacher') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Student progress
CREATE TABLE student_progress (
    progress_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    student_name VARCHAR(100),
    lesson_id INT,
    game_id INT,
    score INT DEFAULT 0,
    completed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- Lesson content
CREATE TABLE lessons (
    lesson_id INT PRIMARY KEY AUTO_INCREMENT,
    lesson_name VARCHAR(100) NOT NULL,
    description TEXT,
    content TEXT NOT NULL,
    image_url VARCHAR(255),
    audio_url VARCHAR(255)
);

-- Insert lessons
INSERT INTO lessons VALUES
(1,'The Alphabet','What it is & why we need it','...',NULL,NULL),
(2,'Phonics','Sounds & blending','...',NULL,NULL),
(3,'Animals A–Z','Animals alphabetically','...',NULL,NULL),
(4,'Things A–Z','Everyday objects alphabetically','...',NULL,NULL),
(5,'Countries A–Z','Countries alphabetically','...',NULL,NULL),
(6,'Names A–Z','Common names alphabetically','...',NULL,NULL),
(7,'Fruits A–Z','Fruits alphabetically','...',NULL,NULL);