<?php 

include '../db/index.php';




$post = array_filter($posts, function($post){
	return ($post['id'] == intval($_GET['id']));
});

$post = array_values($post)[0];


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
		<link rel="stylesheet" href="../style/style.css" />
		<link rel="stylesheet" href="../style/post.css" />
		<title>Title</title>
	</head>

	<body>
		<?php include "../header.php"?>

		<main>
			<div class="post">
				<div class="post-header">
					<!-- <div class="post-tags">
						<?php foreach($post['tags'] as $tag): ?>
							<span class="tag">
								<?php echo $tag; ?>
							</span>
						<?php endforeach; ?>
					</div> -->
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
