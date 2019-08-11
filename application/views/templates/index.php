<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
	<?php echo $this->template->stylesheet ?>

	<title><?php echo $this->template->title ?></title>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<div class="container">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url() ?>">Home</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Data
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="<?php echo base_url('criteria') ?>">Criteria</a>
							<a class="dropdown-item" href="<?php echo base_url('alternative') ?>">Alternative</a>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('assessment') ?>">Assessment</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('result') ?>">Result</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<br> <br>

	<div class="container">
		<?php echo $this->template->content ?>
	</div>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="<?php echo base_url('assets/jquery-3.4.1.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/popper.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
	<?php echo $this->template->javascript ?>
</body>

</html>
