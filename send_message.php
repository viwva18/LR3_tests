<?php
include('db.php');

if (isset($_POST['message'])) {
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    $user_id = 1; // замените на подходящее значение, если у вас есть система аутентификации

    $sql = "INSERT INTO messages (user_id, message) VALUES ('$user_id', '$message')";
    mysqli_query($conn, $sql);
}
?>
