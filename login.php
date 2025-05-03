<?php
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if (!$email || !$password) {
    header("Location: index.php?error=Email and password are required!");
    exit;
}

$userDataFile = 'users.json';

if (!file_exists($userDataFile)) {
    header("Location: index.php?error=No users found. Please sign up.");
    exit;
}

$users = json_decode(file_get_contents($userDataFile), true);

foreach ($users as $user) {
    if ($user['email'] === $email && password_verify($password, $user['password'])) {
        header("Location: index.php?success=Login successful!");
        exit;
    }
}

header("Location: index.php?error=Invalid credentials!");
exit;
