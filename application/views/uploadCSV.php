<!DOCTYPE html>
<html>
	<head>
		<title>Upload CSV</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="http://localhost/ciproject/assets/styles.css">
	</head>
	<body style="margin:50px;">
		<header id="header" class="">
			<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<div class="container-fluid">
					<div class="navbar-header">
						<a class="navbar-brand" href="#">Contact Management System</a>
					</div>
					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<ul class="nav navbar-nav">
							<li class="active"><a href="<?php echo site_url('Sagarcontroller')?>">Contacts List</a></li>
							<li><a href="<?php echo site_url('Sagarcontroller/loadinsert')?>">Add a Contact</a></li>
						</ul>
						<form class="navbar-form navbar-left" method="POST" role="search" action="<?php echo site_url('Sagarcontroller/getSingle')?>">
							<div class="form-group">
								<input type="text" class="form-control" name="contactname" placeholder="Search By Name....">
							</div>
							<button type="submit" class="btn btn-default">Search</button>
						</form>
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href=" <?php echo site_url('SagarController/uploadCSV')?>">Upload CSV</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</header>
		<main style="margin-top:160px; margin-bottom: 80px;">
			<div class="container text-center">
				<h2>Upload CSV File</h2>
				<form method="post" enctype="multipart/form-data" action="<?= site_url('Sagarcontroller/previewCSV') ?>">
					<div class="form-group col-md-6 col-md-offset-5 text-center">
						<input type="file" name="csvfile" accept=".csv" required>
					</div>
					
					<button type="submit" class="btn btn-primary">Upload & Preview</button>
				</form>
			</div>
		</main>
		<footer class="navbar-inverse navbar-fixed-bottom">
			<p>&copy; <?php echo date('Y'); ?> Contact Management System - Sagar</p>
		</footer>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</body>
</html>