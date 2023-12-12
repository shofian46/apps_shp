<nav aria-label="breadcrumb">
  <ol class="breadcrumb d-flex justify-content-end">
    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Dashboard</a></li>
    <li class="breadcrumb-item" aria-current="page">Stock-in</li>
    <li class="breadcrumb-item active" aria-current="page">Add</li>
  </ol>
</nav>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
</div>
<div class="row">
	<form action="" method="POST" class="col-lg-6 col-md col-sm">
		<div class="card shadow-lg">
			<h5 class="card-header">Stock Master Data</h5>
			<div class="card-body">
				<h5 class="card-title">Add New Stock</h5>
				<p class="card-text">Form to add new stock to system</p>
					<?= $this->session->flashdata('message') ?>
					<div class="form-group">
						<label for="kode_stock" class="col-form-label-lg">ID Stock</label>
						<input type="text" class="form-control form-control-md" name="kode_stock" id="kode_stock" value="<?= $stockId; ?>" readonly>
						<?= form_error('kode_stock', '<small class="text-danger">', '</small>') ?>
					</div>
					<div class="form-group">
						<label for="tanggal_masuk" class="col-form-label-lg">Date</label>
						<input type="date" class="form-control form-control-md" name="tanggal_masuk" id="tanggal_masuk" value="<?= !empty($this->input->post('tanggal_masuk')) ? $this->input->post('tanggal_masuk') : date('Y-m-d'); ?>">
						<?= form_error('date', '<small class="text-danger">', '</small>') ?>
					</div>
					<div class="form-group">
						<label for="barang_id" class="col-form-label-lg">Barang</label>
						<select name="barang_id" id="barang_id" class="form-control form-control-md">
							<option value="">--- Choose ---</option>
							<?php foreach($barangId as $brg): ?>
								<option value="<?= $brg['id_barang']; ?>"><?= $brg['nama_barang']; ?></option>
							<?php endforeach; ?>
						</select>
						<?= form_error('barang_id', '<small class="text-danger">', '</small>') ?>
					</div>
					<div class="form-group">
						<label for="satuan" class="col-form-label-lg">Satuan</label>
						<select name="satuan" id="satuan" class="form-control form-control-md">
							<option value="">--- Choose ---</option>
							
						</select>
						<?= form_error('satuan', '<small class="text-danger">', '</small>') ?>
					</div>
					
					<button type="submit" class="btn btn-md btn-primary bg-gradient-primary btn-icon-split mt-4 float-right rounded-pill">
						<span class="icon text-white">
							<i class="fas fa-plus-circle"></i>
						</span>
						<span class="text">Submit</span>
					</button>
			</div>
		</div>
	</form>
</div>
