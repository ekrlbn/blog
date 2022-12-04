<?php
include 'authenticate.php';
include '../db/index.php';

if(!isset($_POST['id'])){
    header("Location: index.php");
    die();
}

$id = $_POST['id'];
$sql = "SELECT * FROM posts WHERE id = ?";
$stmt = $conn->prepare($sql); $stmt->bind_param('i', $id); $stmt->execute();
$result = $stmt->get_result();
if($result->num_rows == 0){
    header("Location: index.php");
    $stmt->close();
    $conn->close();
    die();
}

if(isset($_POST['title'])){
    $title = $_POST['title'];
   
    $sql = "UPDATE posts SET title = ? WHERE id = ?";
    $stmt = $conn->prepare($sql); $stmt->bind_param('si', $title,$id); $stmt->execute();
    $stmt->close();
    $conn->close();
    header("Location: post.php?id=$id");
    die();
}

if (isset($_POST['content'])) {
    $content = $_POST['content'];
    $sql = "UPDATE posts SET content = ? WHERE id = ?";
    $stmt = $conn->prepare($sql); $stmt->bind_param('si', $content, $id); $stmt->execute();
    $stmt->close();
    $conn->close();
    header("Location: post.php?id=$id");
    die();
}

if(isset($_POST['image'])){
    $image = $_POST['image'];
    $sql = "UPDATE posts SET image = NULL WHERE id = ?";
    $stmt = $conn->prepare($sql); $stmt->bind_param('i', $id); $stmt->execute();
    $stmt->close();
    $conn->close();
    header("Location: post.php?id=$id");
    die();
}

if(isset($_FILES['image'])){
    $image = $_FILES['image']['name'];
    echo $image;
    $sql = "UPDATE posts SET image = ? WHERE id = ?";
    $stmt = $conn->prepare($sql); $stmt->bind_param('si', $image, $id); $stmt->execute();
    $stmt->close();
    $conn->close();

    $target_dir = "../images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    header("Location: post.php?id=$id");
    die();
}

if (isset($_POST['category_id'])) {

    $category_id = $_POST['category_id'];

    if($category_id == 'none'){
        $sql = "UPDATE posts SET category_id = NULL WHERE id = ?";
        $stmt = $conn->prepare($sql); $stmt->bind_param('i', $id); $stmt->execute();
        $stmt->close();
        $conn->close();
        header("Location: post.php?id=$id");
        die();
    }

    if($category_id == '0'){
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
        $category_id = $category['id'];
    
    }
    
    $sql = "UPDATE posts SET category_id = ? WHERE id = ?";
    $stmt = $conn->prepare($sql); $stmt->bind_param('si', $category_id, $id); $stmt->execute();
    $stmt->close();
    $conn->close();
    header("Location: post.php?id=$id");
    die();
}


$conn->close();
header('Location: index.php');
die();


?>
