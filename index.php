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
		<link rel="stylesheet" href="style.css" />
		<script src="script.js" defer></script>
		<title>Document</title>
	</head>
	<body>
		<header>
			<nav class="navbar navbar-expand-lg">
				<div class="navbar-item">
					<a href="/index.html">
						<h2>Home</h2>
					</a>
				</div>
				<div class="navbar-item">
					<a href="http://">
						<h2>Newsletter</h2>
					</a>
				</div>
				<div class="navbar-item">
					<a href="#Contact">
						<h2>Contact</h2>
					</a>
				</div>
			</nav>
		</header>
		<main>
			<section id="post-section">
				<a href="http://" class="card post">
					<div class="tags">
						<span class="tag">tech</span>
					</div>
					<img
						src="https://www.w3schools.com/css/img_lights.jpg"
						class="card-img-top"
						alt=""
					/>
					<div class="card-body">
						<p class="post-body">
							Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam,
							quae.
						</p>
						<h2 class="post-title">Post 1</h2>
					</div>
				</a>
				<a href="http://" class="post card">
					<div class="tags">
						<span class="tag">tech</span>
					</div>
					<img
						src="https://www.w3schools.com/css/img_forest.jpg"
						class="card-img-top"
						alt=""
					/>
					<div class="card-body">
						<p class="post-body">
							Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam,
							quae.
						</p>
						<h2 class="post-title">Post 2</h2>
					</div>
				</a>
				<a href="http://" class="card post">
					<div class="tags">
						<span class="tag">politics</span>
						<span class="tag">media</span>
					</div>
					<img
						src="https://www.w3schools.com/css/img_5terre.jpg"
						class="card-img-top"
						alt=""
					/>
					<div class="card-body">
						<p class="post-body">
							Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam,
							quae.
						</p>
						<h2 class="post-title">Post 3</h2>
					</div>
				</a>
				<a href="http://" class="card post">
					<div class="tags">
						<span class="tag">travel</span>
					</div>
					<img
						src="https://www.w3schools.com/css/img_5terre.jpg"
						class="card-img-top"
						alt=""
					/>
					<div class="card-body">
						<p class="post-body">
							Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam,
							quae.
						</p>
						<h2 class="post-title">Some Title</h2>
					</div>
				</a>
				<a href="http://" class="card post">
					<div class="tags">
						<span class="tag">health</span>
						<span class="tag">tech</span>
					</div>
					<img
						src="https://www.w3schools.com/css/img_5terre.jpg"
						class="card-img-top"
						alt=""
					/>
					<div class="card-body">
						<p class="post-body">
							Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam,
							quae.
						</p>
						<h2 class="post-title">New Post</h2>
					</div>
				</a>
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
						<li><a action="index.php" href="?category=tech">tech</a></li>
						<li><a action="index.php" href="?category=health">health</a></li>
						<li><a action="index.php" href="?category=travel">travel</a></li>
						<li>
							<a action="index.php" href="?category=politics">politics</a>
						</li>
						<li><a action="index.php" href="?category=media">media</a></li>
					</ul>
				</div>
			</section>
		</main>
		<footer>
			<div id="Contact">
				<h2>Contact</h2>
				<p>example@mail.com</p>
				<a href="http://github">GitHub</a>
				<br />
				<a href="http://Twitter">Twitter</a>
				<br />
				<a href="http://instagram">Instagram</a>
			</div>
		</footer>
	</body>
</html>
