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
							<h3 class="card-title">Aktivasi Banner</h3>
							<!-- <a href="<?php echo base_url() . 'dashboard/export' ?>" style="float: left;" target="_blank" class="btn btn-outline-secondary">
								Export Kontak
							</a>
							<button data-toggle="modal" data-target="#modal-tambah-basis" style="float: right;" class="btn btn-outline-success">
								New Data
							</button> -->
							<?php if ($setting['banner'] == 0) { ?>
								<form action="<?php echo base_url('dashboard/switchbanner') ?>" method="post">
									<input type="number" value="1" name="aktif" hidden>
									<input type="number" value="1" name="id" hidden>
									<button style="float: right;" class="btn btn-sm btn-outline-primary" type="submit">Aktifkan Banner</button>
								</form>
							<?php } ?>
							<?php if ($setting['banner'] == 1) { ?>
								<form action="<?php echo base_url('dashboard/switchbanner') ?>" method="post">
									<input type="number" value="0" name="aktif" hidden>
									<input type="number" value="1" name="id" hidden>
									<button style="float: right;" class="btn btn-sm btn-outline-danger" type="submit">Nonaktifkan Banner</button>
								</form>
							<?php } ?>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<?php if ($setting['banner'] == 0) { ?>
								Banner tidak aktif
							<?php } ?>
							<?php if ($setting['banner'] == 1) { ?>
								Banner aktif
							<?php } ?>
						</div>
						<!-- /.card-body -->
					</div>
					<?php if ($setting['banner'] == 1) { ?>
						<div class="card card-outline card-info">
							<div class="card-header">
								<h3 class="card-title">Banner</h3>
								<!-- <a href="<?php echo base_url() . 'dashboard/export' ?>" style="float: left;" target="_blank" class="btn btn-outline-secondary">
								Export Kontak
							</a> -->
								<button data-toggle="modal" data-target="#modal-tambah-banner" style="float: right;" class="btn btn-outline-success">
									Add Banner
								</button>
							</div>
							<!-- /.card-header -->
							<div class="card-body">
								<?php
								if (isset($_GET['alert'])) {
									if ($_GET['alert'] == "success") {
										echo "<div class='alert alert-success font-weight-bold text-center'>Banner berhasil ditambahkan!</div>";
									} else if ($_GET['alert'] == "failed") {
										echo "<div class='alert alert-danger font-weight-bold text-center'>Gagal menambah banner</div>";
									} else if ($_GET['alert'] == "fail") {
										echo "<div class='alert alert-warning font-weight-bold text-center'>Gagal menambah banner, pastikan banner berukuran maksimal 2mb dan berformat png, jpg, jpeg.</div>";
									} else if ($_GET['alert'] == "deleted") {
										echo "<div class='alert alert-danger font-weight-bold text-center'>Banner berhasil dihapus!</div>";
									}
								}
								?>
								<table id="example2" class="table table-bordered table-hover">
									<thead>
										<tr>
											<th>No</th>
											<th>Banner</th>
											<th>Opsi</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($banner as $b) { ?>
											<tr>
												<td><?php echo $no++; ?></td>
												<td><img src="<?php echo base_url() ?>assets/dist/img/banner/<?php echo $b->nama ?>" width="200px" alt=""></td>
												<td>
													<center>
														<button data-toggle="modal" data-target="#modal-edit-banner<?php echo $b->id; ?>" class="btn btn-info btn-xs" style="width: 70px;"><i class="fas fa-edit"></i> Edit</button>
														<button data-toggle="modal" data-target="#modal-hapus-banner<?php echo $b->id; ?>" class="btn btn-danger btn-xs" style="width: 70px;"><i class="fas fa-trash-alt"></i> Delete</button>
													</center>
												</td>
											</tr>
										<?php } ?>
									</tbody>
									<tfoot>
										<tr>
											<th>No</th>
											<th>Banner</th>
											<th>Opsi</th>
										</tr>

									</tfoot>
								</table>
							</div>
							<!-- /.card-body -->
						</div>
					<?php } ?>
					<!-- /.card -->
				</div>
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
		<div class="modal fade" id="modal-tambah-banner">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Tambah Banner</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('dashboard/addbanner') ?>">
						<div class="modal-body">
							<div class="card-body">
								<div class="form-group">
									<label>Upload Banner</label>
									<input type="file" accept="image/png, image/jpeg" class="form-control" name="img" id="img" required>
								</div>
							</div>
						</div>
						<div class="modal-footer justify-content-between">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-success">Add</button>
						</div>
					</form>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
		<!-- /.modal -->
		<?php foreach ($banner as $b) { ?>
			<div class="modal fade" id="modal-edit-banner<?php echo $b->id; ?>">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Edit Banner</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('dashboard/editbanner/' . $b->id) ?>">
							<div class="modal-body">
								<div class="card-body">
									<div class="form-group">
										<label>Upload Banner</label>
										<input type="hidden" name="id" value="<?php echo $b->id; ?>">
										<input type="file" accept="image/png, image/jpeg" class="form-control" name="img" id="img" required><br>
										<img src="<?php echo base_url() ?>assets/dist/img/banner/<?php echo $b->nama; ?>" width="400px" alt="">
									</div>
								</div>
							</div>
							<div class="modal-footer justify-content-between">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-info">Update</button>
							</div>
						</form>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<div class="modal fade" id="modal-hapus-banner<?php echo $b->id; ?>">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Hapus Banner</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form role="form" method="post" action="<?php echo base_url('dashboard/delbanner/' . $b->id) ?>">
							<div class="modal-body">
								<div class="card-body">
									<div class="form-group">
										<h5>Apakah anda ingin menghapus banner :</h5>
										<img src="<?php echo base_url() ?>assets/dist/img/banner/<?php echo $b->nama; ?>" width="400px" alt="">
									</div>
								</div>
							</div>
							<div class="modal-footer justify-content-between">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-danger">Delete</button>
							</div>
						</form>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->

		<?php } ?>