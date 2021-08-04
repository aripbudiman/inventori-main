<head>

	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
</head>
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">Edit Petugas</h1>

	<div class="row">

		<div class="col-lg-6">

			<!-- Circle Buttons -->
			<div class="card shadow mb-12">
				<div class="card-body">
					<form method="post" action="<?= base_url('Petugas-update') ?>" autocomplete="off">
						<input type="hidden" name="petugas_id" value="<?php echo $petugas->pk_petugas_id ?>">
						<div class="form-group col-lg-12">
							<label>Petugas *</label>
							<input type="text" name="petugas" class="form-control" value="<?php echo $petugas->nama_petugas; ?>">
						</div>

						<div class="form-group col-lg-6">
							<button type="submit" class="btn btn-primary btn-flat">
								<i class="fa fa-pencil"></i> Simpan</button>
							<button type="reset" class="btn btn-info">Reset</button>
						</div>
				</div>
			</div>
		</div>

	</div>

</div>

</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->