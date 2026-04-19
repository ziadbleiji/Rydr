<?php
session_start();
require "database/connection.php";

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$result = mysqli_query($conn, "SELECT * FROM account WHERE email='$email'");
$user = mysqli_fetch_assoc($result);

if ($user && password_verify($password, $user['password'])) {

    // 🔥 BELANGRIJK: session zetten
    $_SESSION['id'] = $user['id'];

    // 🔥 redirect + STOP script
    header("Location: /");
    exit;
}

// fout → terug naar login
header("Location: /index.php?url=login-form");
exit;