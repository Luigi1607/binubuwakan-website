<?php
session_start();

// Enforce HTTPS
if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] !== 'on') {
    header("Location: https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    exit;
}

// CSRF token validation
if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die("Invalid CSRF token.");
}

// Database configuration
$host = 'localhost';
$db   = 'user_registration';
$user = 'root'; // Replace with your DB username
$pass = '';     // Replace with your DB password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    // Set error mode to exceptions
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed.");
}

// Retrieve and sanitize form inputs
$username         = trim($_POST['username']);
$email            = trim($_POST['email']);
$address          = trim($_POST['address']);
$password         = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Basic validation
if (empty($username) || empty($email) || empty($address) || empty($password) || empty($confirm_password)) {
    die("Please fill in all required fields.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email format.");
}

if ($password !== $confirm_password) {
    die("Passwords do not match.");
}

// Check if email already exists
$stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
$stmt->execute([$email]);
if ($stmt->fetch()) {
    die("Email is already registered.");
}

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert user into the database
$stmt = $pdo->prepare("INSERT INTO users (username, email, address, password) VALUES (?, ?, ?, ?)");
try {
    $stmt->execute([$username, $email, $address, $hashed_password]);
    echo "Registration successful! You can now <a href='login.php'>login</a>.";
} catch (PDOException $e) {
    die("Registration failed.");
}
?>
