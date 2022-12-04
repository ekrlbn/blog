<?php
include "./db/index.php";

try {
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        die("Invalid email");
    }
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $sql = "INSERT INTO emails (email) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    
    $conn->close();
} catch (\Throwable $th) {}
header("Location: ../index.php");
die();

?>