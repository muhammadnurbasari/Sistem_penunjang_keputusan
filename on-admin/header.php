<!DOCTYPE html>
<html lang="en">
<head>
	<title>SPK Pemilihan Kacamata</title>
	<link rel="stylesheet" href="./../bootstrap/bootstrap.min.css">
	<script src="./../bootstrap/jquery.min.js"></script>
	<script src="./../bootstrap/bootstrap.min.js"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="index.php" class="navbar-brand">SPK Pemilihan Kacamata</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="kriteria.php">Kriteria Dan Bobot</a></li>
			<li><a href="nilai.php">Nilai</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right" style="margin-right: 10px;">
				<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><img src="./../images/icons8-user-shield-24.ico"> <?=$_SESSION['nama'];?>  <span class="caret"></span></a> 
					<ul class="dropdown-menu">
						<li><a href="./../logout.php">Log Out</a></li>
					</ul>		
				</li>
			</ul>
		</div>
	</nav>
