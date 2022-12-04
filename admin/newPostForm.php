<?php
include 'authenticate.php';
include '../db/index.php';


if($_POST['category_id'] == 'none'){
    $_POST['category_id'] = null;
}

if($_POST['category_id'] == '0'){
    $category_name = $_POST['category_name'];
    $sql = "INSERT INTO categories (name) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $category_name);
    $stmt->execute();
    $stmt->close();
    
    $sql = "SELECT id FROM categories WHERE name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $category_name);
    $stmt->execute();
    $result = $stmt->get_result();
    $category = $result->fetch_assoc();
    $stmt->close();
    $_POST['category_id'] = $category['id'];

}

$sql = "INSERT INTO posts (title, content, author_id, category_id, date) VALUES (?, ?, ?, ?, NOW());";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssii", $_POST['title'], $_POST['content'], $user['id'],$_POST['category_id']);
$stmt->execute();
$stmt->close();

if($_FILES['image']){
    $image = $_FILES['image']['name'];
    $sql = "UPDATE posts SET image = ? WHERE id = ?";
    $stmt = $conn->prepare($sql); $stmt->bind_param('si', $image, $id); $stmt->execute();
    $stmt->close();
    

    $target_dir = "../images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
}
$conn->close();
header("Location: index.php");
die();

?>