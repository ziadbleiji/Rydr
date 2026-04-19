<?php
session_start();
require "database/connection.php";

$email = $_POST["email"];
$password = $_POST["password"];
$confirm = $_POST["confirm-password"];

if ($password !== $confirm) {
    $_SESSION["message"] = "Wachtwoorden komen niet overeen";
    header("Location: /index.php?url=register-form");
    exit;
}

$check = mysqli_query($conn, "SELECT * FROM account WHERE email='$email'");
if (mysqli_num_rows($check) > 0) {
    $_SESSION["message"] = "Email bestaat al";
    header("Location: /index.php?url=register-form");
    exit;
}

$hashed = password_hash($password, PASSWORD_DEFAULT);

mysqli_query($conn, "INSERT INTO account (email, password) VALUES ('$email','$hashed')");

// 🔥 FIX: direct inloggen
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM account WHERE email='$email'"));
$_SESSION["id"] = $user["id"];

header("Location: /");
exit;