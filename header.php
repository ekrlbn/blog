<header>
	<nav class="navbar-expand-lg navbar">
		<div class="navbar-item">
			<a href="/">
				<h2>Home</h2>
			</a>
		</div>

		<div class="navbar-item">
			<a href="#Contact">
				<h2>Contact</h2>
			</a>
		</div>
		<div class="navbar-item newsletter-button">
			<button id="newsletter" type="button" class="btn btn-primary">
				Newsletter
			</button>
		</div>
	</nav>
</header>

<div class="modal" tabindex="-1" id="myModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Subscribe to the Newsletter</h5>
				<button id="close-button-modal" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="emailForm.php" method="post">
				<div class="modal-body">
					<div class="mb-3">
						<label for="email" class="form-label">
							Email address
						</label>
						<input
							type="email"
							class="form-control"
							id="email"
							placeholder="name@example.com"
							name="email"
						/>
					</div>
				</div>
				<div class="modal-footer">
					<button
						id="close-modal"
						type="button"
						class="btn btn-secondary"
						data-bs-dismiss="modal"
					>
						Close
					</button>
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	const myModal = document.getElementById('myModal');
	const newsLetter = document.getElementById('newsletter');
	const closeModal = document.getElementById('close-modal');

	newsLetter.onclick = function () {
		myModal.style.display = 'block';
	};

	closeModal.onclick = function () {
		myModal.style.display = 'none';
	};

	window.onclick = function (event) {
		if (event.target == myModal) {
			myModal.style.display = 'none';
		}
	};
	
</script>
