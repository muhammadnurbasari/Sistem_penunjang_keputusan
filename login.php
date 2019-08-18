<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sistem Pengambilan Keputusan</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
	<script src="bootstrap/jquery.min.js"></script>
	<script src="bootstrap/bootstrap.min.js"></script>
	<style type="text/css">
		footer{
			text-align: center;
			font-family: cursive;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">	
			<!--membuat page header dengan jumbotron-->
				<div class="jumbotron">

				<!-- membuat form Login-->
						<form action="cek-login.php" method="POST">
							<div class="panel panel-primary">
								<div class="panel-heading">Form Login</div>
								<div class="panel-body">
									<?php
										/* pesan error */
										if (isset($_GET['error'])) : ?>
										<div class="alert alert-danger alert-dismissible">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
											<strong>Warning!</strong> <?=base64_decode($_GET['error']);?>
										</div>
									<?php endif; ?>
									<div class="form-group">
										<input type="text" name="username" placeholder="Username" class="form-control" autocomplete="off" required/>
									</div>
									<div class="form-group">
										<input type="password" name="password" placeholder="Password" class="form-control" autocomplete="off" required/>
									</div>
								</div>
								<div class="panel-footer">
									<button class="btn btn-primary btn-block" type="submit" name="submit">LOGIN</button>
								</div>
							</div>
						</form>
					<footer>Copyright &copy; 2018 ABAS</footer>
				</div>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
</body>
</html>