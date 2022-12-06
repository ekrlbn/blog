<?php
include './db/index.php';
isset($_GET['category']) ? $category = $_GET['category'] : $category = null;
if ($category != null) {
	$sql = "SELECT posts.id,posts.title,posts.content,categories.name as category, posts.image, posts.visit_count
	FROM posts
	LEFT JOIN categories
	ON posts.category_id = categories.id
	WHERE categories.id = ?
	ORDER BY posts.visit_count desc;";

	$stmt = $conn->prepare($sql);
	$stmt->bind_param("s", $category);
	$stmt->execute();
	$result = $stmt->get_result();
	$stmt->close();
}else{
	$sql = "SELECT posts.id,posts.title,posts.content,categories.name as category, posts.image, posts.visit_count
	FROM posts
	LEFT JOIN categories
	ON posts.category_id = categories.id
	ORDER BY posts.visit_count desc;";

	$result = $conn->query($sql);
}


$posts = array();
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$row['content'] = substr($row['content'],0,350) . '...';  
		$posts[] = $row;
	}
} 


$sql_categories = "SELECT DISTINCT categories.id, categories.name FROM categories LEFT JOIN posts ON posts.category_id = categories.id;";
$result_categories = $conn->query($sql_categories);
$categories = array();
if ($result_categories->num_rows > 0) {
  while($row = $result_categories->fetch_assoc()) {
	$categories[] = $row;
  }
}

$conn->close();
?>

<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link
			rel="stylesheet"
			href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
			integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
			crossorigin="anonymous"
		/>
		<link rel="stylesheet" href="/style/home.css" />
		<script src="/scripts/search.js" defer></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous" defer></script>

		<title>Home</title>
	</head>
	<body>
		<?php include "header.php" ?>
		<main>
			<section id="post-section">

                <?php foreach($posts as $post): ?>
				    <a href="/post?id=<?php echo $post["id"] ?>" class="post card">
						<?php if ($post['category']): ?>
							<div class="category"><?php echo $post['category'] ?></div>
						<?php endif ?>
						<?php if(strlen($post["image"]) > 0 ):?>
				    		<img
				    			src="/images/<?php echo $post["image"] ?>"
				    			class="card-img-top"
				    			alt="image"
				    		/>
						<?php endif; ?>
				    	<div class="card-body">
							<?php if(!(strlen($post["image"]) > 0 )):?>
				    		<p class="post-body">
				    			<?php echo $post["content"] ?>
				    		</p>
							<?php endif;?>
				    		<h4 class="post-title">
                                <?php echo $post["title"] ?> 
                            </h4>
				    	</div>
				    </a>
                    
                <?php endforeach; ?>
			</section>
			<section class="sidebar">
					
				<input
					class="form-control mr-sm-2 search-input "
					type="search"
					placeholder="Search"
					aria-label="Search"
					name="search"
				/>
				<div class="dropdown" id="categories">
					<button class="btn btn-secondary dropdown-toggle w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">Categories</button>
					<ul class="dropdown-menu">
						<a class="dropdown-item" href="/">
							<li >all</li>
						</a>
						<?php foreach($categories as $category): ?>
						<a class="dropdown-item" href="/home?category=<?php echo $category['id'] ?>">
							<li>
								<?php echo $category['name'] ?>
							</li>
						</a>
						<?php endforeach; ?>
					</ul>
				</div>
					
				<div class="card about" id="about">
					<h3>About Me</h3>
					<p>
						Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam,
						quae.
					</p>
				</div>
				
			</section>
		</main>
		<?php include "footer.php" ?>
	</body>
</html>

