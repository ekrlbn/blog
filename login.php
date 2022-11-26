<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="login.css" />
		<link
			rel="stylesheet"
			href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
			integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
			crossorigin="anonymous"
		/>
		<link rel="stylesheet" href="/style/login.css" />

		<title>Login</title>
	</head>
	<body>
		<main>
			<div class="container">
				<h2>Login</h2>
				<form action="login.php" method="POST">
					<div class="form-group">
						<label for="username">Username</label>
						<input
							type="text"
							class="form-control"
							id="username"
							placeholder="Username"
							name="username"
						/>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input
							type="password"
							class="form-control"
							id="password"
							placeholder="Password"
							name="password"
						/>
					</div>

					<button type="submit" class="btn btn-primary btn-lg btn-block">
						Submit
					</button>
				</form>
			</div>
		</main>
	</body>
</html>
