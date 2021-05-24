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
			<?php $json = json_decode($json['json']) ?>
			<div class="card">
				<div class="card-header" style="background-color: #e8e8e8;">
					<center><span class="login-box-msg" style="color: black;"><img src="<?php echo base_url() ?>assets/dist/img/pay/<?php echo $json->data->payment_method ?>.png" width="200px" alt="" srcset=""><br><?php echo $json->data->payment_name ?></span></center>
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
					<div class="row">
						<div class="col-md-6">
							<table>
								<tr>
									<td style="width: 90px;">Merchant</td>
									<td> : </td>
									<td><b>Sedekah Center Indonesia</b></td>
								</tr>
								<tr>
									<td>Nama</td>
									<td> : </td>
									<td><b><?php echo $json->data->customer_name; ?></b></td>
								</tr>
								<tr>
									<td>No. HP</td>
									<td> : </td>
									<td><b><?php echo $json->data->customer_phone; ?></b></td>
								</tr>
								<tr>
									<td>Email</td>
									<td> : </td>
									<td><b><?php echo $json->data->customer_email; ?></b></td>
								</tr>
								<tr>
									<td>Donasi</td>
									<td> : </td>
									<td><b><?php echo "Rp. " . str_replace(",", ".", number_format($json->data->amount)) ?></b></td>
								</tr>
							</table>
						</div>
						<div class="col-md-6">
							<table>
								<tr>
									<td>
										Batas Pembayaran<br>
										<span style="color: #DC3545;"><b><?php echo date("Y-m-d H:i:s", $json->data->expired_time); ?></b></span>
									</td>
								</tr>
								<tr>
									<td>
										No. Referensi<br>
										<div class="input-group input-group-sm">
											<input type="text" value="<?php echo $json->data->reference; ?>" class="form-control" id="ref" readonly>
											<span class="input-group-append">
												<button class="btn btn-info btn-flat swalref" type="button" onclick="copy_ref()">Copy</button>
											</span>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<?php if ($json->data->pay_code != null) { ?>
											Kode bayar/No. VA<br>
											<div class="input-group input-group-sm">
												<input type="text" value="<?php echo $json->data->pay_code; ?>" class="form-control" id="va" readonly>
												<span class="input-group-append">
													<button class="btn btn-info btn-flat swalva" type="button" onclick="copy_va()">Copy</button>
												</span>
											</div>
										<?php } ?>
									</td>
								</tr>
								<tr>
									<td>
										Total Tagihan<br>
										<div class="input-group input-group-sm">
											<input type="text" value="<?php echo $json->data->amount; ?>" class="form-control" id="am" readonly>
											<span class="input-group-append">
												<button class="btn btn-info btn-flat swalam" type="button" onclick="copy_am()">Copy</button>
											</span>
										</div>
									</td>
								</tr>
							</table>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-12">
							<?php if (isset($json->data->qr_url)) { ?>
								<center>
									<b>QRIS</b><br>
									<button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-default">
										<img src="<?php echo $json->data->qr_url; ?>" width="100px" height="100px" class="img-fluid" alt="QRIS" />
									</button>
								</center><br>
								<div class="modal fade" id="modal-default">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title">QRIS</h4>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<p>Scan QRIS dibawah ini :</p>
												<center><img src="<?php echo $json->data->qr_url; ?>" class="img-fluid" alt="QRIS" /></center>
											</div>
										</div>
										<!-- /.modal-content -->
									</div>
									<!-- /.modal-dialog -->
								</div>
							<?php } ?>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card card-outline card-success">
								<div class="card-header">
									<h3 class="card-title">Instruksi Pembayaran</h3>
								</div>
								<div class="card-body">
									<?php foreach ($json->data->instructions as $ins) { ?>
										<div id="accordion">
											<div class="card card-outline card-info" data-toggle="collapse" data-parent="#accordion" href="#collapseThree<?php echo str_replace(" ", "_", $ins->title) ?>">
												<div class="card-header">
													<h4 class="card-title">
														<?php echo $ins->title ?>
													</h4>
												</div>
												<div id="collapseThree<?php echo str_replace(" ", "_", $ins->title) ?>" class="panel-collapse collapse">
													<div class="card-body">
														<ol>
															<?php foreach ($ins->steps as $steps) { ?>
																<li><?php echo $steps ?></li>
															<?php } ?>
														</ol>
													</div>
												</div>
											</div>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
					<a href="<?php echo base_url() ?>" class="btn btn-block btn-sm btn-success">Selesai</a>
				</div>
				<!-- /.login-card-body -->
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
	<!-- SweetAlert2 -->
	<script src="<?php echo base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
	<!-- Select2 -->
	<script src="<?php echo base_url() ?>assets/plugins/select2/js/select2.full.min.js"></script>
	<script type="text/javascript">
		function copy_ref() {
			document.getElementById("ref").select();
			document.execCommand("copy");
		}

		function copy_va() {
			document.getElementById("va").select();
			document.execCommand("copy");
		}

		function copy_am() {
			document.getElementById("am").select();
			document.execCommand("copy");
		}
	</script>
	<script type="text/javascript">
		$(function() {
			const Toast = Swal.mixin({
				toast: true,
				position: 'top',
				showConfirmButton: false,
				timer: 3000
			});

			$('.swalref').click(function() {
				Toast.fire({
					icon: 'success',
					title: 'No. Referensi berhasil dicopy'
				})
			});
			$('.swalva').click(function() {
				Toast.fire({
					icon: 'success',
					title: 'Kode Bayar/No. VA berhasil dicopy'
				})
			});
			$('.swalam').click(function() {
				Toast.fire({
					icon: 'success',
					title: 'Total Tagihan berhasil dicopy'
				})
			});
		});
	</script>
</body>
<footer>

</footer>

</html>