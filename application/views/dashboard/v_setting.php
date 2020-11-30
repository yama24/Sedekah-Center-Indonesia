		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1><?php echo $page ?></h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active"><?php echo $page ?></li>
							</ol>
						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section>
			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="card card-outline card-primary">
						<div class="card-header">
							<h3 class="card-title">Data <?php echo $page ?></h3>
							<!-- <a href="<?php echo base_url() . 'dashboard/export' ?>" style="float: left;" target="_blank" class="btn btn-outline-secondary">
								Export Kontak
							</a>
							<button data-toggle="modal" data-target="#modal-tambah-basis" style="float: right;" class="btn btn-outline-success">
								New Data
							</button> -->
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example2" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th style="width: 1%;">No</th>
										<th>Tanggal</th>
										<th>Inv</th>
										<th>Referensi</th>
										<th>Nama</th>
										<th>Phone</th>
										<th>Email</th>
										<th>Jumlah</th>
										<th>Diterima</th>
										<th>Metode Pembayaran</th>
										<th>Status</th>
										<th>Url</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach (array_reverse($transaksi) as $t) {
									?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo $t->input_year ."/". $t->input_month ."/". $t->input_date ." ". $t->input_time; ?></td>
											<td><?php echo $t->inv; ?></td>
											<td><?php echo $t->reference; ?></td>
											<td><?php echo ucwords(strtolower($t->nama)); ?></td>
											<td><?php echo $t->phone; ?></td>
											<td><?php echo $t->email; ?></td>
											<td>Rp. <?php echo number_format($t->jumlah, 0, ",", "."); ?></td>
											<td>Rp. <?php echo number_format($t->diterima, 0, ",", "."); ?></td>
											<td><?php echo $t->nama_metode; ?></td>
											<td><?php echo $t->status; ?></td>
											<td><a href="<?php echo $t->checkout_url; ?>" target="_blank"><?php echo $t->checkout_url; ?></a></td>
										</tr>
									<?php } ?>
								</tbody>
								<tfoot>
									<tr>
										<th>No</th>
										<th>Tanggal</th>
										<th>Inv</th>
										<th>Referensi</th>
										<th>Nama</th>
										<th>Phone</th>
										<th>Email</th>
										<th>Jumlah</th>
										<th>Diterima</th>
										<th>Metode Pembayaran</th>
										<th>Status</th>
										<th>Url</th>
									</tr>
								</tfoot>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
