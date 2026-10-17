<?php
session_start();

// Database connection — SAME details as login.php
$db_host = 'localhost';
$db_user = 'your_database_username';
$db_pass = 'your_database_password';
$db_name = 'kids_alphabet_db';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Basic validation
    if (strlen($password) < 6) {
        echo "<script>alert('Password must be at least 6 characters!'); window.history.back();</script>";
        exit;
    }

    // Encrypt password — NEVER store plain text!
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Save to database
    $stmt = $conn->prepare("INSERT INTO users (full_name, email, password_hash, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $full_name, $email, $password_hash, $role);

    if ($stmt->execute()) {
        // Auto sign in after successful registration
        $_SESSION['user_id'] = $conn->insert_id;
        $_SESSION['full_name'] = $full_name;
        $_SESSION['role'] = $role;
        
        header("Location: dashboard.php");
        exit;
    } else {
        if (str_contains($conn->error, 'Duplicate entry')) {
            echo "<script>alert('This email is already registered! Please sign in instead.'); window.location.href='index.html';</script>";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>
