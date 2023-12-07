<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
</div>
<div class="container-fluid">
	<div class="my-2">
		<!-- Button trigger modal -->
		<a href="<?= base_url('master/a_gudang'); ?>" class="btn btn-success bg-gradient-success rounded-pill">
			Create Gudang
		</a>
	</div>
	<div class="row">
		<div class="col-sm-10">
		<div>
			<?= $this->session->flashdata('message'); ?>
		</div>
		<div class="card shadow-lg border-bottom-success">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-success">DataTables <?= $title; ?></h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-hover" id="tb_gudang">
					<thead>
						<tr>
							<th>#</th>
							<th>ID Gudang</th>
							<th>Nama Gudang</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1;
						foreach ($gudang as $g) :
						?>
							<tr>
								<td class="align-middle"><?= $i++; ?></td>
								<td class="align-middle"><?= $g['kode_gudang']; ?></td>
								<td class="align-middle"><?= $g['nama_gudang']; ?></td>
								<td class="align-middle text-center">
									<a href="<?= base_url('master/e_gudang/') . $g['id_gudang']?>" class="btn btn-info rounded-0 btn-sm text-xs">
										<span class="icon text-white" title="Edit">
											<i class="fas fa-edit"></i>
										</span>
									</a> |
									<a href="<?= base_url('master/d_gudang/') . $g['id_gudang'] ?>" class="btn btn-danger rounded-0 btn-sm text-xs" onclick="return confirm('Deleted Gudang will lost forever. Still want to delete?')">
										<span class="icon text-white" title="Delete">
											<i class="fas fa-trash-alt"></i>
										</span>
									</a>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
		</div>
	</div>
	
</div>
