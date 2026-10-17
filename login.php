<?php
session_start();

// Database connection — UPDATE THESE DETAILS!
$db_host = 'localhost';
$db_user = 'your_database_username';
$db_pass = 'your_database_password';
$db_name = 'kids_alphabet_db';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Find user by email
    $stmt = $conn->prepare("SELECT user_id, full_name, password_hash, role FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($user_id, $full_name, $password_hash, $role);
        $stmt->fetch();
        
        // Check password against encrypted version
        if (password_verify($password, $password_hash)) {
            // ✅ Success — save session data
            $_SESSION['user_id'] = $user_id;
            $_SESSION['full_name'] = $full_name;
            $_SESSION['role'] = $role;
            
            header("Location: dashboard.php"); // Go to lessons & games
            exit;
        }
    }
    
    // ❌ Failed
    echo "<script>alert('Oops! Email or password incorrect. Please try again.'); window.history.back();</script>";
}
?>
