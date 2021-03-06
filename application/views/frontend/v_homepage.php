<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Donasi | SCI</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="<?php echo base_url() ?>assets/dist/img/favicon.png">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
	<!-- SweetAlert2 -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
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

	<!-- Primary Meta Tags -->
	<meta name="title" content="Donasi | SCI">
	<meta name="description" content="Dari Ummat Untuk Ummat">
	<meta name="keyword" content="">

	<!-- Open Graph / Facebook -->
	<meta property="og:type" content="website">
	<meta property="og:url" content="<?php echo base_url() ?>">
	<meta property="og:title" content="Donasi | SCI">
	<meta property="og:description" content="Dari Ummat Untuk Ummat">
	<meta property="og:image" content="<?php echo base_url() ?>assets/dist/img/sci.png">
	<meta property="og:keyword" content="">

	<!-- Twitter -->
	<meta property="twitter:card" content="summary_large_image">
	<meta property="twitter:url" content="<?php echo base_url() ?>">
	<meta property="twitter:title" content="Donasi | SCI">
	<meta property="twitter:description" content="Dari Ummat Untuk Ummat">
	<meta property="twitter:image" content="<?php echo base_url() ?>assets/dist/img/sci.png">
	<meta property="twitter:keyword" content="">

	<style>
		.myDiv {
			display: none;
			text-align: center;
		}

		.myDiv img {
			margin: 0 auto;
		}
	</style>
</head>

<body class="hold-transition login-page">
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
							<?php
							foreach ($banner as $key => $value) {
								$active = ($key == 0) ? 'active' : '';
								echo '<li data-target="#carouselExampleIndicators" data-slide-to="' . $key . '" class="' . $active . '"></li>';
							}
							?>
						</ol>
						<div class="carousel-inner">
							<?php
							foreach ($banner as $key => $value) {
								$active = ($key == 0) ? 'active' : '';
								echo '<div class="carousel-item ' . $active . '">
								<img class="d-block w-100 h-100" src="' . base_url() . 'assets/dist/img/banner/' . $value['nama'] . '">
								</div>';
							}
							?>
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
					<center><span class="login-box-msg" style="color: white;">Silahkan isi data untuk berdonasi</span></center>
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
								<img src="<?php echo base_url() ?>assets/dist/img/pay/<?php echo $tp->code ?>.png" height="70px" alt="" class="" />
							</div>
						<?php } ?>
						<br>
						<button class="btn btn-block btn-danger" type="submit">Submit</button>
					</form>
				</div>
			</div>
		</div>

	</center>
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