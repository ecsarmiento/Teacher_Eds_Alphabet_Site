<?php
$conn = new mysqli('localhost', 'your_user', 'your_pass', 'kids_alphabet_db');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['full_name'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $stmt = $conn->prepare("INSERT INTO users (full_name,email,password_hash,role) VALUES (?,?,?,?)");
    $stmt->bind_param("ssss", $name, $email, $pass, $role);
    
    if ($stmt->execute()) {
        header("Location: index.html?registered=1");
    } else {
        echo "Error: Email may already be registered.";
    }
}
?>