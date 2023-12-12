<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
</div>
<div class="container-fluid">
	<div class="my-2">
		<!-- Button trigger modal -->
		<a href="<?= base_url('master/a_barang'); ?>" class="btn btn-warning bg-gradient-warning rounded-pill">
			Create Barang
		</a>
	</div>
	<div class="row">
		<div>
			<?= $this->session->flashdata('message'); ?>
		</div>
		<div class="col-sm-12 col-lg card shadow-lg border-bottom-warning">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-warning">DataTables <?= $title; ?></h6>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-hover" id="tb_gudang">
						<thead>
							<tr>
								<th>#</th>
								<th>Kode Barang</th>
								<th>Nama Barang</th>
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
								foreach($barang->result_array() as $brg) : ?>
									<td><?= $i++; ?></td>
									<td><?= $brg['kode_barang']; ?></td>
									<td><?= $brg['nama_barang']; ?></td>
									<td><?= $brg['warna_name']; ?></td>
									<td><?= $brg['satuan']; ?></td>
									<td><?= $brg['gudang_name']; ?></td>
									<td><?= $brg['stok']; ?></td>
									<td class="align-middle text-center">
										<a href="<?= base_url('master/e_barang/') . $brg['id_barang']?>" class="btn btn-warning rounded-0 btn-sm text-xs">
											<span class="icon text-white" title="Edit">
												<i class="fas fa-edit"></i>
											</span>
										</a> |
										<a href="<?= base_url('master/d_barang/') . $brg['id_barang'] ?>" class="btn btn-danger rounded-0 btn-sm text-xs" onclick="return confirm('Deleted Barang will lost forever. Still want to delete?')">
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
	