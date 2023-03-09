<!DOCTYPE html>
<html lang="en">
<head>
	<title>Hotel Hebat</title>					
		<link rel="icon" href="">
							
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">				
		<link rel="stylesheet" href="assets/style.css">
		<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


		
</head>

<body class="home">
	<nav class="navbar sticky-top navbar-expand">
		<div class="container">
			<div class="collapse navbar-collapse justify-content-left" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="btn" href="index.php">Home</a>
					</li>

					<li class="nav-item">
						<a class="btn" href="#about">Kamar</a>
					</li>
				</ul>
			</div>
			<div class="d-flex">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="btn" href="login.php" data-bs-toggle="modal" data-bs-target="#modallogin">Login</a>
					</li>

					<li class="nav-item">
						<a class="btn" href="register.php" data-bs-toggle="modal" data-bs-target="#modalregister">Register</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="modal fade" id="modallogin">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="text-center">
						<div class="row mb-5 card" >
							<form method="post" action="ceklogin.php" class="mb-5">
								<h1 class="mb-4">Login</h1>
								<div class="mb-3 text-center">
									<label for="username" class="form-label">Username</label>
									<input type="text" class="form-control" aria-describedby="emailHelp" name="username" Required>
								</div>
								<div class="mb-5 text-center">
									<label for="pass" class="form-label">Password</label>
									<input type="password" name="password" class="form-control" Required>
								</div>
								<button type="submit" class="btn btn-primary" >Login</button> <br>
								<!-- <a class="nav-link" href="login.php" data-bs-toggle="modal" data-bs-target="#modalregister">Register</a> -->
							</form>											
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modalregister">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="text-center">
						<div class="row mb-5 card" >
							<form method="post" action="ceklogin.php" class="mb-5">
								<h1 class="mb-4">Register</h1>
								<div class="mb-3 text-center">
									<label for="username" class="form-label">Username</label>
									<input type="text" class="form-control" name="username" Required>
								</div>
								<div class="mb-3 text-center">
									<label for="pass" class="form-label">Password</label>
									<input type="password" name="password" class="form-control" Required>
								</div>
								<div class="mb-3 text-center">
									<label for="level" class="form-label">Level</label>
									<input type="text" class="form-control" name="level" Required>
								</div>
								<button type="submit" class="btn btn-primary" >Register</button> <br>
							</form>											
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	