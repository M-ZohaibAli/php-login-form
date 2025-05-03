<?php
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if (!$name || !$email || !$password) {
    header("Location: signup.php?error=All fields are required!");
    exit;
}

$userDataFile = 'users.json';
$users = [];

if (file_exists($userDataFile)) {
    $json = file_get_contents($userDataFile);
    $users = json_decode($json, true) ?? [];
}

// Check if email exists
foreach ($users as $user) {
    if ($user['email'] === $email) {
        header("Location: signup.php?error=Email already registered!");
        exit;
    }
}

// Register user
$users[] = [
    'name' => $name,
    'email' => $email,
    'password' => password_hash($password, PASSWORD_DEFAULT)
];

file_put_contents($userDataFile, json_encode($users, JSON_PRETTY_PRINT));

header("Location: index.php?success=Account created. Please log in.");
exit;
