<?php
session_start();
$conn = new mysqli('localhost', 'your_user', 'your_pass', 'kids_alphabet_db');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $stmt = $conn->prepare("SELECT user_id, password_hash FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $hash);
        $stmt->fetch();
        if (password_verify($pass, $hash)) {
            $_SESSION['user_id'] = $user_id;
            header("Location: dashboard.php");
            exit;
        }
    }
    echo "Invalid login — please try again.";
}
?>