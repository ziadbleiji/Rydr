<?php
session_start();
require "database/connection.php";

$user_id = $_SESSION['id'] ?? 0;

if ($user_id == 0) {
    header("Location: /index.php?url=login-form");
    exit;
}

$car_id = $_POST['car_id'];
$start = $_POST['start_date'];
$end = $_POST['end_date'];

mysqli_query($conn, "INSERT INTO rentals (user_id, car_id, start_date, end_date)
VALUES ('$user_id','$car_id','$start','$end')");

header("Location: /index.php?url=account");
exit;