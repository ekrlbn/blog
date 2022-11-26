<?php
include './db/index.php';
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
		<link rel="stylesheet" href="/style/style.css" />
		<script src="/scripts/script.js" defer></script>
		<title>Home</title>
	</head>
	<body>
		<?php include "header.php" ?>
		<main>
			<section id="post-section">

                <?php foreach($posts as $post): ?>
				    <a href="/post?id=<?php echo $post["id"] ?>" class="post card">
				    	<div class="tags">
                                <?php foreach($post["tags"] as $tag): ?>
                        			<span class="tag"><?php echo $tag ?></span>
                                <?php endforeach; ?>
				    	</div>
				    	<img
				    		src="<?php echo $post["image"] ?>"
				    		class="card-img-top"
				    		alt="image"
				    	/>
				    	<div class="card-body">
				    		<p class="post-body">
				    			<?php echo $post["content"] ?>
				    		</p>
				    		<h2 class="post-title">
                                <?php echo $post["title"] ?> 
                            </h2>
				    	</div>
				    </a>
                    
                <?php endforeach; ?>
			</section>
			<section class="sidebar">
				<div class="card search">
					<h2>Search</h2>
					<form
						class="form-inline my-2 my-lg-0"
						method="get"
						action="index.php"
					>
						<input
							class="form-control mr-sm-2 search-input"
							type="search"
							placeholder="Search"
							aria-label="Search"
							name="search"
						/>
					</form>
				</div>
				<div class="card" id="about">
					<h3>About Me</h3>
					<p>
						Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam,
						quae.
					</p>
				</div>
				<div class="card" id="categories">
					<h3>Categories</h3>
					<ul>
						<li><a href="/">all</a></li>
						<?php foreach($categories as $category): ?>
							<li>
								<a href="/home?category=<?php echo $category ?>"><?php echo $category ?></a>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</section>
		</main>
		<?php include "footer.php" ?>
	</body>
</html>

