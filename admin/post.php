<?php
include 'authenticate.php';
include '../db/index.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM posts WHERE id = ? ";
    $stmt = $conn->prepare($sql); $stmt->bind_param('i', $id); $stmt->execute();
    $result = $stmt->get_result(); 
    if($result->num_rows == 0){ 
        header("Location: index.php"); 
        die(); 
        $stmt->close(); 
        $conn->close(); 
    } 
    $post = $result->fetch_assoc(); 
    $stmt->close();

    $sql = "SELECT * FROM categories";
    $result = $conn->query($sql);
    $categories = [];
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $categories[] = $row;
        }
    }

    $conn->close();

}else{
    header("Location: index.php");
    die();
} 
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="../style/admin.css" />
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
			crossorigin="anonymous"
		/>

		<title><?php echo $post['title']?></title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous" defer></script>
    <script src="../scripts/newCategory.js" defer></script>
	</head>
	<body>
    <header class="nav">
    <div class="left-nav">
      <a href="/admin/index.php" class="btn btn-outline-primary">home</a>
      <a href="/admin/logout.php" class="btn btn-outline-danger"> log out</a>
    </div>
    <button id="delete-button" type="button" class="btn btn-outline-danger">Delete This Post</button>


    </header>
    <div class="container">
		<form action="form.php" method="post">
      <input type="hidden" name="id" value="<?php echo $post['id'] ?>" />
			<div class="title">
				<label for="title" class="form-label">Title</label>
				<input
					type="text"
					name="title"
					id="title"
					value="<?php echo $post['title']?>"
					class="form-control"
				/>
        <button type="submit" class="btn btn-outline-primary">Submit</button>
			</div>
    </form>
    </div>

    <div class="container">
    <form action="form.php" method="post">
      <div class="content">
        <input type="hidden" name="id" value="<?php echo $post['id'] ?>" />
        <label for="content" class="form-label">Content</label>
				<textarea name="content" id="content" rows="5" class="form-control"><?php echo $post['content']?></textarea>
        <button type="submit" class="btn btn-outline-primary">Submit</button>
			</div>
    </form>
    </div>


    <div class="container">
      <div class="image-form">
        <?php if($post['image'] != null):?>
          <form action="form.php" method="post">
            <input type="hidden" name="id" value="<?php echo $post['id'] ?>" />
            <input type="hidden" name="image">
            <img src="../images/<?php echo $post['image']?>" alt="" class="img-fluid" />
            <button type="submit" class="btn btn-danger">Delete Image</button>
          </form>
        <?php endif; ?>  
          <form action="form.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $post['id'] ?>" />
            <label for="formFile" class="form-label">Upload Image</label>
            <input name="image" class="form-control" type="file" id="formFile" >
            <button type="submit" class="btn btn-outline-primary">Submit</button>
          </form>
      </div>
    </div>

    <div class="container">
      <form action="form.php" method="post">
          <input type="hidden" name="id" value="<?php echo $post['id'] ?>" />
          <div class="category">
            <label for="category" class="form-label">Category</label>
            <select name="category_id" id="category" class="form-select">
              <option <?php if(null == $post['category_id']) echo 'selected' ?>>none</option>
              <option value="0">new category</option>
              <?php foreach($categories as $category): ?>
                <option value="<?php echo $category['id'] ?>" <?php if($category['id'] == $post['category_id']) echo 'selected' ?>><?php echo $category['name'] ?></option>
              <?php endforeach; ?>
            </select>
            <div class="new-category" id="new-category">
							<label for="new-category-name" class="form-label">Category Name</label>
							<input type="text" name="category_name" class="form-control" id="new-category-name">
						</div>
            <button type="submit" class="btn btn-outline-primary">Submit</button>
          </div>
      </form>
    </div>

    <?php include 'deleteModal.php'?>
   
	</body>
</html>
