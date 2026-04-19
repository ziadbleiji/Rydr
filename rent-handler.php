<?php
session_start();
require "database/connection.php";

$user_id = $_SESSION['id'] ?? 0;

if (!$user_id) {
    header("Location: index.php?url=login-form");
    exit;
}

$car_id = $_POST['car_id'];
$name = $_POST['name'];
$start = $_POST['start_date'];
$end = $_POST['end_date'];

mysqli_query($conn, "
INSERT INTO bookings (user_id, car_id, name, start_date, end_date)
VALUES ('$user_id','$car_id','$name','$start','$end')
");

header("Location: index.php?url=account");
exit;