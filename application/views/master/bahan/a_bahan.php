<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<a href="<?= base_url('master/barang'); ?>" class="btn btn-sm btn-default bg-gradient-light border rouned-0 btn-icon-split mb-4">
	<span class="icon text-white">
		<i class="fas fa-chevron-left"></i>
	</span>
	<span class="text">Back</span>
</a>
<form action="" method="POST" class="col-lg col-md col-sm px-2">
	<div class="row">
		<div class="col-sm-6 col-lg my-2 mx-2 card shadow-lg">
			<h5 class="card-header">Master Data Bahan</h5>
			<div class="card-body">
			<h5 class="card-title">Add New Bahan</h5>
			<p class="card-text">Form to add new bahan to system</p>
					<?= $this->session->flashdata('message') ?>
				<div class="form-group">
						<label for="m_kode_bahan" class="col-form-label-lg">ID Bahan</label>
						<input type="text" class="form-control form-control-md <?= form_error('m_kode_bahan') ? 'is-invalid': ''; ?>" name="m_kode_bahan" id="m_kode_bahan" value="<?= $barangId; ?>" readonly>
						<?= form_error('m_kode_bahan', '<small class="text-danger">', '</small>') ?>
				</div>
				<div class="form-group">
					<label for="m_bahan" class="col-form-label-lg">Nama Bahan</label>
					<input type="text" class="form-control form-control-md <?= form_error('m_bahan') ? 'is-invalid': ''; ?>" name="m_bahan" id="m_bahan" value="<?= set_value('m_bahan')?>">
					<?= form_error('m_bahan', '<small class="text-danger">', '</small>') ?>
				</div>
				<div class="form-group">
					<label for="m_kode_category" class="col-form-label-lg">Category</label>
					<select name="m_kode_category" id="m_kode_category" class="form-control <?= form_error('m_kode_category') ? 'is-invalid' : ''; ?>">
						<option>--- Choose ---</option>
						<?php foreach($categoryId as $cat): ?>
							<option value="<?= $cat['id_category']; ?>">--- <?= $cat['nama_category']; ?> ---</option>
						<?php endforeach; ?>
					</select>
					<div class="invalid-feedback">
						<?= form_error('m_kode_warna'); ?>
					</div>
				</div>
				<div class="form-group">
					<label for="m_kode_warna" class="col-form-label-lg">Warna</label>
					<select name="m_kode_warna" id="m_kode_warna" class="form-control <?= form_error('m_kode_warna') ? 'is-invalid' : ''; ?>">
						<option>--- Choose ---</option>
						<?php foreach($warnaId as $wrn): ?>
							<option value="<?= $wrn['id_warna']; ?>">--- <?= $wrn['nama_warna']; ?> ---</option>
						<?php endforeach; ?>
					</select>
					<div class="invalid-feedback">
						<?= form_error('m_kode_warna'); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-lg my-2 mx-2 card shadow-lgg pt-0">
			<div class="card-body">
				<div class="form-group">
					<label for="satuan" class="col-form-label-lg">Satuan</label>
					<select name="satuan" id="satuan" class="form-control">
						<option value="">--- Choose ---</option>
						<option value="Gr">Gr</option>
						<option value="Pcs">Pcs</option>
					</select>
				</div>

				<div class="form-group">
					<label for="m_kode_gudang" class="col-form-label-lg">Kode Gudang</label>
					<select name="m_kode_gudang" id="m_kode_gudang" class="form-control <?= form_error('m_kode_gudang') ? 'is-invalid' : ''; ?>">
						<option>--- Choose ---</option>
						<?php foreach($gudangId as $gd): ?>
							<option value="<?= $gd['id_gudang']; ?>">--- <?= $gd['nama_gudang']; ?> ---</option>
						<?php endforeach; ?>
					</select>
					<div class="invalid-feedback">
						<?= form_error('m_kode_gudang'); ?>
					</div>
				</div>
				<div class="form-group">
					<label for="stok" class="col-form-label-lg">Stock</label>
					<input type="number" name="stok" id="stok" class="form-control">
				</div>
				<button type="submit" class="btn btn-sm btn-primary bg-gradient-primary btn-icon-split mt-4 float-right rounded-pill">
					<span class="icon text-white">
						<i class="fas fa-plus-circle"></i>
					</span>
					<span class="text">Save</span>
				</button>
			</div>
		</div>
	</div>
</form>

