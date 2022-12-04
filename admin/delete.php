<?php
include 'authenticate.php';
include '../db/index.php';

if(isset($_GET['method'])){
    $method = $_GET['method'];
    if($method == 'delete'){
        $id = $_GET['id'];
        $sql = "DELETE FROM posts WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        header('Location: index.php');
        die();
    }
}

?>