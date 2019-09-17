<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Log In</title>
	<link href="<?=base_url('assets/bootstrap/css/sb-admin-2.min.css');?>" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
	<div class="container">
		<!-- Outer Row -->
		<div class="row justify-content-center">
			<div class="col-xl-10 col-lg-12 col-md-9">
				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
							<div class="col-lg-12">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4">
										<?php if ($this->session->flashdata("successMsg")): ?>
											<?=$this->session->flashdata("successMsg");?> 
										<?php else: ?>
											Please log in here..
										<?php endif ?>
										</h1>
									</div>
									<?php if ($this->session->flashdata("errorMsg")): ?>
									<div class="alert alert-danger text-center">
										<span><?=$this->session->flashdata("errorMsg");?></span>
									</div>
									<?php endif ?>
									<form class="user" action="<?=base_url('login/auth');?>" method="post">
										<div class="form-group">
											<input type="email" name="email" class="form-control form-control-user" aria-describedby="emailHelp" placeholder="email@rumahweb.co.id" required autofocus>
										</div>
										<div class="form-group">
											<input type="password" name="password" class="form-control form-control-user" placeholder="your password" required>
										</div>
										<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Bootstrap core JavaScript-->
	<script src="<?=base_url('assets/bootstrap/js/jquery.min.js');?>"></script>
	<script src="<?=base_url("assets/bootstrap/js/bootstrap.bundle.min.js");?>"></script>
	<!-- Core plugin JavaScript-->
	<script src="<?=base_url("assets/bootstrap/js/jquery.easing.min.js");?>"></script>
	<!-- Custom scripts for all pages-->
	<script src="<?=base_url("assets/bootstrap/js/sb-admin-2.min.js");?>"></script>
</body>

</html>