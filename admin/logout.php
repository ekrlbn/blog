<?php
include 'authenticate.php';
include '../db/index.php';

unset($_COOKIE['s_id']);

$sql = "DELETE FROM sessions WHERE user_id = " . $user['id'];
$conn->query($sql);
$conn->close();
header('Location: login.php');
?>