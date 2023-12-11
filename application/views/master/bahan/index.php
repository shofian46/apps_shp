<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
</div>
<div class="container-fluid">
	<div class="my-2">
		<!-- Button trigger modal -->
		<a href="<?= base_url('master/a_bahan'); ?>" class="btn btn-primary bg-gradient-primary rounded-pill">
			Create Bahan
		</a>
	</div>
	<div class="row">
		<div class="col-sm">
		<div>
			<?= $this->session->flashdata('message'); ?>
		</div>
		<div class="card shadow-lg border-bottom-primary" width="100">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">DataTables <?= $title; ?></h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-hover" id="tb_gudang">
					<thead>
						<tr>
							<th>#</th>
							<th>Kode Bahan</th>
							<th>Nama Bahan</th>
							<th>Category</th>
							<th>Warna</th>
							<th>Satuan</th>
							<th>Gudang</th>
							<th>Stock</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<?php
							$i = 1;
							foreach($bahan->result_array() as $bhn) : ?>
								<td><?= $i++; ?></td>
								<td><?= $bhn['kode_bahan']; ?></td>
								<td><?= $bhn['nama_bahan']; ?></td>
								<td><?= $bhn['category_name']; ?></td>
								<td><?= $bhn['warna_name']; ?></td>
								<td><?= $bhn['satuan']; ?></td>
								<td><?= $bhn['gudang_name']; ?></td>
								<td><?= $bhn['stok']; ?></td>
								<td class="align-middle text-center">
									<a href="<?= base_url('master/e_bahan/') . $bhn['id_bahan']?>" class="btn btn-warning rounded-0 btn-sm text-xs">
										<span class="icon text-white" title="Edit">
											<i class="fas fa-edit"></i>
										</span>
									</a> |
									<a href="<?= base_url('master/d_bahan/') . $bhn['id_bahan'] ?>" class="btn btn-danger rounded-0 btn-sm text-xs" onclick="return confirm('Deleted Bahan will lost forever. Still want to delete?')">
										<span class="icon text-white" title="Delete">
											<i class="fas fa-trash-alt"></i>
										</span>
									</a>
								</td>
								<?php endforeach; ?>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
		</div>
	</div>
	
</div>
