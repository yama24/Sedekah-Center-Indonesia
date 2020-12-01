<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Donasi | SCI</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/ionicons/css/ionicons.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminltes.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- Select2 -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
</head>

<body class="hold-transition login-page">
	<div class="wrapper">
		<section class="content">
			<div class="container-fluid">
				<center>
					<div class="login-box" style="text-align: left;">
						<div class="login-logo">
							<!--<b>Input </b>Data-->
						</div>
						<center><img src="<?php echo base_url() ?>assets/dist/img/sci.png" alt="" width="200"></center>
						<div class="login-logo">
							<!-- <b>Input </b>Data -->
						</div>
						<!-- /.login-logo -->
						<div class="card">
							<!-- banner -->
							<?php if ($setting['banner'] == 1) { ?>
								<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
									<ol class="carousel-indicators">
										<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
										<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
										<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
									</ol>
									<div class="carousel-inner">
										<div class="carousel-item active">
											<img class="d-block w-100" src="<?php echo base_url() ?>assets/dist/img/banner/1.png" alt="First slide">
										</div>
										<div class="carousel-item">
											<img class="d-block w-100" src="<?php echo base_url() ?>assets/dist/img/banner/2.png" alt="Second slide">
										</div>
										<div class="carousel-item">
											<img class="d-block w-100" src="<?php echo base_url() ?>assets/dist/img/banner/3.png" alt="Third slide">
										</div>
									</div>
									<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
										<span class="carousel-control-prev-icon" aria-hidden="true"></span>
										<span class="sr-only">Previous</span>
									</a>
									<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
										<span class="carousel-control-next-icon" aria-hidden="true"></span>
										<span class="sr-only">Next</span>
									</a>
								</div>
							<?php } ?>
							<!-- end banner -->
							<div class="card-header" style="background-color: #C82333;">
								<center> <span class="login-box-msg" style="color: white;">Silahkan isi data untuk berdonasi</span> </center>
							</div>
							<div class="card-body login-card-body">

								<?php
								if (isset($_GET['alert'])) {
									if ($_GET['alert'] == "isiulang") {
										echo "<div class='alert alert-danger font-weight-bold text-center'>Maaf! Mohon gunakan email atau nomor handphone yang berbeda.</div>";
									} else if ($_GET['alert'] == "belum_isi") {
										echo "<div class='alert alert-danger font-weight-bold text-center'>Anda Harus Isi Data Terlebih Dulu!</div>";
									} else if ($_GET['alert'] == "logout") {
										echo "<div class='alert alert-success font-weight-bold text-center'>Anda Telah Logout!</div>";
									}
								}
								?>
								<form action="<?php echo base_url('welcome/form_submit'); ?>" method="post">
									<label>Nama</label>
									<div class="input-group mb-3">
										<input type="text" class="form-control" placeholder="Isi dengan nama lengkap atau &#34Hamba Allah&#34" name="nama" required>
										<div class="input-group-append">
											<div class="input-group-text">
												<span class="fas fa-user"></span>
											</div>
										</div>
									</div>

									<label>Nomor handphone</label>
									<div class="input-group mb-3">
										<input type="tel" class="form-control" placeholder="cth: 082161821282" name="phone" pattern="[0]{1}[8]{1}[0-9].{8,}" required>
										<div class="input-group-append">
											<div class="input-group-text">
												<span class="fas fa-mobile-alt"></span>
											</div>
										</div>
									</div>
									<label>Email</label>
									<div class="input-group mb-3">
										<input type="email" class="form-control" placeholder="cth: email@gmail.com" name="email" required>
										<div class="input-group-append">
											<div class="input-group-text">
												<span class="fas fa-envelope"></span>
											</div>
										</div>
									</div>
									<label>Jumlah donasi</label>
									<div class="input-group mb-3">
										<input type="number" class="form-control" placeholder="cth: 100000" name="jumlah" required>
										<div class="input-group-append">
											<div class="input-group-text">
												<span class="fas fa-hand-holding-heart"></span>
											</div>
										</div>
									</div>
									<style>
										.myDiv {
											display: none;
											text-align: center;
										}

										.myDiv img {
											margin: 0 auto;
										}
									</style>
									<label>Metode pembayaran</label>
									<div class="input-group mb-3">
										<select name="metode" id="metode" class="form-control select2bs4">
											<option value="">- Pilih metode pembayaran</option>
											<?php foreach ($tripay as $tp) {  ?>
												<option value="<?php echo $tp->code ?>"><?php echo $tp->name ?></option>
											<?php } ?>
										</select>
									</div>
									<?php foreach ($tripay as $tp) {  ?>
										<div id="show<?php echo $tp->code ?>" class="myDiv">
											<img src="<?php echo base_url() ?>assets/dist/img/pay/<?php echo $tp->code ?>.png" width="200px" alt="" class="" />
										</div>
									<?php } ?>
									<br>
									<button class="btn btn-block btn-danger" type="submit">Submit</button>
								</form>

							</div>
						</div>
					</div>

				</center>

			</div>

	</div>
	<!-- /.login-box -->

	<!-- jQuery -->
	<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>
	<!-- Select2 -->
	<script src="<?php echo base_url() ?>assets/plugins/select2/js/select2.full.min.js"></script>
	<script>
		$(function() {
			//Initialize Select2 Elements
			$('.select2').select2()

			//Initialize Select2 Elements
			$('.select2bs4').select2({
				theme: 'bootstrap4'
			})
		})
	</script>
	<script>
		$(document).ready(function() {
			$('#metode').on('change', function() {
				var demovalue = $(this).val();
				$("div.myDiv").hide();
				$("#show" + demovalue).show();
			});
		});
	</script>
</body>
<footer>

</footer>

</html>