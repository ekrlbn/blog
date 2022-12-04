<?php
include "authenticate.php";
include "../db/index.php";

$order = "date";
$asc_desc = "DESC";


if(isset($_GET['order']) && $_GET['order'] == "visit_count") {
	$order = "visit_count";
}
if(isset($_GET['asc-desc']) && $_GET['asc-desc'] == "ASC") {
	$asc_desc = "ASC";
}

$sql = "SELECT * FROM posts WHERE author_id = ". $user['id'] ." ORDER BY ".$order." ".$asc_desc;
$result = $conn->query($sql);
if($result->num_rows > 0){ 
	while($row = $result->fetch_assoc()){ 
		$posts[] = $row; 
	} 
} 
$date_checked = $order == "date"; 
$desc_checked = $asc_desc == "DESC";
 
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
		<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
			crossorigin="anonymous"
			defer
		></script>

		<script src="../scripts/search.js" defer></script>
		<script src="../scripts/modal.js" defer></script>
		<script src="../scripts/order.js" defer></script>

		<title>Admin</title>
	</head>
	<body>
		<header>
			<nav class="nav">
				<button class="btn btn-outline-primary" id="modal-button">
					add new post
				</button>
				<a href="/admin/logout.php" class="btn btn-outline-danger">log out</a>
			</nav>
		</header>
		<main>
			<div class="search-order">
				<div class="search ">
					<form class="form-inline my-2 my-lg-0" method="get" action="index.php">
						<input
							class="form-control search-input"
							type="search"
							placeholder="Search"
							aria-label="Search"
							name="search"
						/>
					</form>
				</div>
				<div class="order">
					<!-- <span>Order By: </span> -->
					<form action="/admin/index.php" method="get" id="order">
						<div class="btn-group" role="group" aria-label="Basic radio toggle button group">
							<input type="radio" class="btn-check" name="order" value="date" id="date-order" autocomplete="off" <?php if($date_checked)echo 'checked';?>>
							<label class="btn btn-outline-primary" for="date-order">date</label>
							
							<input type="radio" class="btn-check" name="order" value="visit_count" id="visited-order" autocomplete="off" <?php if(!$date_checked)echo 'checked';?>>
							<label class="btn btn-outline-primary" for="visited-order">visited</label>
						</div>
						<div class="btn-group" role="group" aria-label="Basic radio toggle button group">
							<input type="radio" class="btn-check" name="asc-desc" value="ASC" id="asc" autocomplete="off" <?php if(!$desc_checked)echo 'checked';?>>
							<label class="btn btn-outline-primary" for="asc" value="date">ascending</label>
							
							<input type="radio" class="btn-check" name="asc-desc" value="DESC" id="desc" autocomplete="off" <?php if($desc_checked)echo 'checked';?>>
							<label class="btn btn-outline-primary" for="desc">descending</label>
						</div>
					</form>
				</div>
			</div>
			
			<section class="posts">
				<?php foreach ($posts as $post): ?>
				<div class="post">
					<div class="post-title">
						<h4><?php echo $post['title']?></h4>
					</div>
					<div class="post-date"><?php echo $post['date'] ?></div>
					<div class="visit-count">
						Visited:
						<?php echo $post['visit_count']?>
					</div>
					<div class="edit">
						<a href="/admin/post.php?id=<?php echo $post['id']?>">Edit</a>
					</div>
				</div>
				<?php endforeach; ?>
			</section>
		</main>
		<?php include 'newPostModal.php'?>
	</body>
</html>
