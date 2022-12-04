<?php
include_once '../db/index.php';
$now = time();

$delete = "DELETE FROM sessions WHERE expires < ". $now;
$conn->query($delete);

if(isset($_COOKIE['s_id'])){
    $session_id = $_COOKIE['s_id'];
    $sql = "SELECT * FROM sessions WHERE sid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $session_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows == 0){
        header("Location: login.php");
        $stmt->close();
        $conn->close();
        die();
    }
    $session = $result->fetch_assoc();
    $sql = "SELECT * FROM authors WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $session['user_id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();
    $conn->close();
} else {
    header("Location: login.php");
    die();
}
?>