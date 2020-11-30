<!doctype html>
<html>

<head>
	<meta name="viewport" content="width=device-width" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Konfirmasi Donasi</title>
	<style>
		/* -------------------------------------
          GLOBAL RESETS
      ------------------------------------- */
		img {
			border: none;
			-ms-interpolation-mode: bicubic;
			max-width: 100%;
		}

		body {
			background-color: #90D1DD;
			font-family: sans-serif;
			-webkit-font-smoothing: antialiased;
			font-size: 14px;
			line-height: 1.4;
			margin: 0;
			padding: 0;
			-ms-text-size-adjust: 100%;
			-webkit-text-size-adjust: 100%;
		}

		table {
			color: #555555;
			border-collapse: separate;
			mso-table-lspace: 0pt;
			mso-table-rspace: 0pt;
			width: 100%;
		}

		table td {
			font-family: sans-serif;
			font-size: 14px;
			vertical-align: top;
		}

		/* -------------------------------------
          BODY & CONTAINER
      ------------------------------------- */

		.body {
			background-color: #90D1DD;
			width: 100%;
		}

		/* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
		.container {
			display: block;
			Margin: 0 auto !important;
			/* makes it centered */
			max-width: 580px;
			padding: 10px;
			width: 580px;
		}

		/* This should also be a block element, so that it will fill 100% of the .container */
		.content {
			box-sizing: border-box;
			display: block;
			Margin: 0 auto;
			max-width: 580px;
			padding: 10px;
		}

		/* -------------------------------------
          HEADER, FOOTER, MAIN
      ------------------------------------- */
		.main {
			background: #F5F5F5;
			border-radius: 3px;
			width: 100%;
		}

		.wrapper {
			box-sizing: border-box;
			padding: 20px;
		}

		.content-block {
			padding-bottom: 10px;
			padding-top: 10px;
		}

		.footer {
			clear: both;
			Margin-top: 10px;
			text-align: center;
			width: 100%;
		}

		.footer td,
		.footer p,
		.footer span,
		.footer a {
			color: #555555;
			font-size: 12px;
			text-align: center;
		}

		/* -------------------------------------
          TYPOGRAPHY
      ------------------------------------- */
		h1,
		h2,
		h3,
		h4 {
			color: #555555;
			font-family: sans-serif;
			font-weight: 400;
			line-height: 1.4;
			margin: 0;
			Margin-bottom: 30px;
		}

		h1 {
			font-size: 35px;
			font-weight: 300;
			text-align: center;
			text-transform: capitalize;
		}

		p,
		ul,
		ol {
			color: #555555;
			font-family: sans-serif;
			font-size: 14px;
			font-weight: normal;
			margin: 0;
			Margin-bottom: 15px;
		}

		p li,
		ul li,
		ol li {
			color: #555555;
			list-style-position: inside;
			margin-left: 5px;
		}

		a {
			color: #87c1ff;
			text-decoration: underline;
		}

		/* -------------------------------------
          BUTTONS
      ------------------------------------- */
		.btn {
			box-sizing: border-box;
			width: 100%;
		}

		.btn>tbody>tr>td {
			padding-bottom: 15px;
		}

		.btn table {
			width: auto;
		}

		.btn table td {
			background-color: #ffffff;
			border-radius: 5px;
			text-align: center;
		}

		.btn a {
			background-color: #ffffff;
			border: solid 1px #3498db;
			border-radius: 5px;
			box-sizing: border-box;
			color: #3498db;
			cursor: pointer;
			display: inline-block;
			font-size: 14px;
			font-weight: bold;
			margin: 0;
			padding: 12px 25px;
			text-decoration: none;
			text-transform: capitalize;
		}

		.btn-primary table td {
			background-color: #3498db;
		}

		.btn-primary a {
			background-color: #3498db;
			border-color: #3498db;
			color: #ffffff;
		}

		/* -------------------------------------
          OTHER STYLES THAT MIGHT BE USEFUL
      ------------------------------------- */
		.last {
			margin-bottom: 0;
		}

		.first {
			margin-top: 0;
		}

		.align-center {
			text-align: center;
		}

		.align-right {
			text-align: right;
		}

		.align-left {
			text-align: left;
		}

		.clear {
			clear: both;
		}

		.mt0 {
			margin-top: 0;
		}

		.mb0 {
			margin-bottom: 0;
		}

		.preheader {
			color: transparent;
			display: none;
			height: 0;
			max-height: 0;
			max-width: 0;
			opacity: 0;
			overflow: hidden;
			mso-hide: all;
			visibility: hidden;
			width: 0;
		}

		.powered-by a {
			text-decoration: none;
		}

		hr {
			border: 0;
			border-bottom: 1px solid #f5f5f5;
			Margin: 20px 0;
		}

		/* -------------------------------------
          RESPONSIVE AND MOBILE FRIENDLY STYLES
      ------------------------------------- */
		@media only screen and (max-width: 620px) {
			table[class=body] h1 {
				font-size: 28px !important;
				margin-bottom: 10px !important;
			}

			table[class=body] p,
			table[class=body] ul,
			table[class=body] ol,
			table[class=body] td,
			table[class=body] span,
			table[class=body] a {
				font-size: 16px !important;
			}

			table[class=body] .wrapper,
			table[class=body] .article {
				padding: 10px !important;
			}

			table[class=body] .content {
				padding: 0 !important;
			}

			table[class=body] .container {
				padding: 0 !important;
				width: 100% !important;
			}

			table[class=body] .main {
				border-left-width: 0 !important;
				border-radius: 0 !important;
				border-right-width: 0 !important;
			}

			table[class=body] .btn table {
				width: 100% !important;
			}

			table[class=body] .btn a {
				width: 100% !important;
			}

			table[class=body] .img-responsive {
				height: auto !important;
				max-width: 100% !important;
				width: auto !important;
			}
		}

		/* -------------------------------------
          PRESERVE THESE STYLES IN THE HEAD
      ------------------------------------- */
		@media all {
			.ExternalClass {
				width: 100%;
			}

			.ExternalClass,
			.ExternalClass p,
			.ExternalClass span,
			.ExternalClass font,
			.ExternalClass td,
			.ExternalClass div {
				line-height: 100%;
			}

			.apple-link a {
				color: inherit !important;
				font-family: inherit !important;
				font-size: inherit !important;
				font-weight: inherit !important;
				line-height: inherit !important;
				text-decoration: none !important;
			}

			.btn-primary table td:hover {
				background-color: #34495e !important;
			}

			.btn-primary a:hover {
				background-color: #34495e !important;
				border-color: #34495e !important;
			}
		}
	</style>
</head>

<body class="">
	<table border="0" cellpadding="0" cellspacing="0" class="body">
		<?php
		$dateInput = date('Y-m-d H:i:s');
		?>
		<tr>
			<td>&nbsp;</td>
			<td class="container">
				<div class="content">
					<!-- START CENTERED WHITE CONTAINER -->
					<span class="preheader">Konfirmasi Donasi</span>
					<h1><img src="<?= base_url();  ?>assets/dist/img/scismall.png" alt=""></h1>
					<h1><?php echo $this->config->item('app_name') ?></h1>
					<table class="main">
						<!-- START MAIN CONTENT AREA -->
						<tr>
							<td class="wrapper">
								<?php $json = json_decode($json) ?>
								<table border="0" cellpadding="0" cellspacing="0">
									<tr>
										<td>
											<h3><b>Konfirmasi Donasi</b></h3>
											<p>Hi <?php echo $json->data->customer_name ?>,</p>
											<p>
												terima kasih telah berdonasi melalui <b><?php echo $this->config->item('app_name') ?></b><br>tinggal satu langkah lagi untuk menyelesaikan proses ini.<br>
											</p>
											<p>
												Silahkan melakukan pembayaran dibawah ini :
											</p>
											<table>
												<tr>
													<td>Metode Pembayaran</td>
													<td><b><?php echo $json->data->payment_name ?></b></td>
												</tr>
												<tr>
													<td>No. Referensi</td>
													<td><b><?php echo $json->data->reference ?></b></td>
												</tr>
												<?php if ($json->data->pay_code != null) { ?>
													<tr>
														<td style="padding-right:20px;">Kode Bayar/No. VA</td>
														<td><b><?php echo $json->data->pay_code ?></b></td>
													</tr>
												<?php } ?>
												<tr>
													<td>Total Tagihan</td>
													<td><b>Rp. <?php echo str_replace(",", ".", number_format($json->data->amount)) ?></b></td>
												</tr>
												<?php if (isset($json->data->qr_url)) { ?>
													<tr align="center">
														<td>QRIS</td>
													</tr>
													<tr align="center">
														<td><img src="<?php echo $json->data->qr_url ?>" alt=""></td>
													</tr>
												<?php } ?>
											</table>
											<br>
											<table>
												<tr>
													<td><b>Instruksi Pembayaran</b></td>
												</tr>
												<?php foreach ($json->data->instructions as $ins) { ?>
													<tr>
														<td><?php echo $ins->title ?></td>
													</tr>
													<tr>
														<td>
															<ol>
																<?php foreach ($ins->steps as $steps) { ?>
																	<li><?php echo $steps ?></li>
																<?php } ?>
															</ol>
														</td>
													</tr>
												<?php } ?>
											</table>
											<br />
											<!-- <table style="border-collapse: collapse;">
												<tr>
													<th style="border: 1px solid #555555; padding: 10px;">Produk</th>
													<th style="border: 1px solid #555555; padding: 10px;">Jumlah</th>
													<th style="border: 1px solid #555555; padding: 10px;">Harga</th>
													<th style="border: 1px solid #555555; padding: 10px;">Total</th>
												</tr>
												<tr>
													<td style="border: 1px solid #555555; padding: 10px;">kritcu</td>
													<td style="border: 1px solid #555555; padding: 10px;">5</td>
													<td style="border: 1px solid #555555; padding: 10px;">10000</td>
													<td style="border: 1px solid #555555; padding: 10px;">50000</td>
												</tr>
											</table> -->
											<!-- <br />
											<table>
												<tr>
													<td>Total Harga</td>
													<td>Rp <?php echo number_format("50000", 0, ',', '.') ?></td>
												</tr>
												<tr>
													<td>Biaya Pengiriman</td>
													<td>Rp <?php echo number_format("10000", 0, ',', '.') ?></td>
												</tr>
												<tr>
													<td style="padding-right:20px;"><strong>Total Keseluruhan</strong></td>
													<td><strong>Rp <?php echo number_format("60000", 0, ',', '.') ?></strong></td>
												</tr>
											</table> -->
											<!-- <p>Silakan pilih metode pembayaran yang tersedia dibawah ini:</p>
											<p><strong>BCA</strong><br />
												Atas Nama :Yayan<br />
												No Rekening :456824458</p>
											<br />
											<p>Pesanan akan dikirim setelah kami menerima pembayaran Anda.</p> -->
											<p>Semoga donasi ini menjadi wasilah kebaikan dan dimudahkannya dalam segala urusan</p>
											<p>Terima kasih.</p>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<!-- END MAIN CONTENT AREA -->
					</table>
					<!-- START FOOTER -->
					<div class="footer">
						<table border="0" cellpadding="0" cellspacing="0">
							<!-- <tr>
								<td class="content-block">
									<span class="apple-link">Company Inc, 3 Abbey Road, San Francisco CA 94102</span>
									<br> Don't like these emails? <a
										href="http://i.imgur.com/CScmqnj.gif">Unsubscribe</a>.
								</td>
							</tr> -->
							<tr>
								<td class="content-block powered-by">
									Powered by <a href="<?php echo base_url() ?>"><b>Sedelah Center Indonesia</a>.
								</td>
							</tr>
						</table>
					</div>
					<!-- END FOOTER -->
					<!-- END CENTERED WHITE CONTAINER -->
				</div>
			</td>
			<td>&nbsp;</td>
		</tr>
	</table>
</body>

</html>