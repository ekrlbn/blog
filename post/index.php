<?php 
include '../db/index.php';

$sql = "SELECT posts.id, posts.title, posts.content,authors.name as author,posts.date FROM posts,authors WHERE posts.id = ? AND authors.id = posts.author_id";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $_GET['id']);
$stmt->execute();
$result = $stmt->get_result();

$stmt->close();

$post = $result->fetch_assoc();
$visit_count = "UPDATE posts SET visit_count = visit_count + 1 WHERE id = ". $post['id'];
$conn->query($visit_count);

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
		<link rel="stylesheet" href="../style/home.css" />
		<link rel="stylesheet" href="../style/post.css" />
		<title>Title</title>
	</head>

	<body>
		<?php include "../header.php"?>

		<main>
			<div class="post">
				<div class="post-header">
					
					<div class="post-title">
						<h1><?php echo $post['title']; ?></h1>
					</div>
					
					<div class="post-author">
						<h4><?php echo $post['author']; ?></h4>
					</div>
					<div class="post-date">
						<p><?php echo $post['date']; ?></p>
					</div>
				</div>
				<div class="post-content">
					<p><?php echo $post['content']; ?></p>
				</div>
			</div>
		</main>
		<?php include "../footer.php"?>
	</body>
</html>
