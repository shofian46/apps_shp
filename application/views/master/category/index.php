<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
</div>
<div class="container-fluid">
	<div class="my-2">
		<!-- Button trigger modal -->
		<a href="<?= base_url('master/a_category'); ?>" class="btn btn-danger bg-gradient-danger rounded-pill">
			Create Category
		</a>
	</div>
	<div class="row">
		<div class="col-sm-10">
		<div>
			<?= $this->session->flashdata('message'); ?>
		</div>
		<div class="card shadow-lg border-bottom-danger">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-danger">DataTables <?= $title; ?></h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-hover" id="tb_gudang">
					<thead>
						<tr>
							<th>#</th>
							<th>ID Category</th>
							<th>Nama Category</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1;
						foreach ($category as $c) :
						?>
							<tr>
								<td class="align-middle"><?= $i++; ?></td>
								<td class="align-middle"><?= $c['kode_category']; ?></td>
								<td class="align-middle"><?= $c['nama_category']; ?></td>
								<td class="align-middle text-center">
									<a href="<?= base_url('master/e_category/') . $c['id_category']?>" class="btn btn-info rounded-0 btn-sm text-xs">
										<span class="icon text-white" title="Edit">
											<i class="fas fa-edit"></i>
										</span>
									</a> |
									<a href="<?= base_url('master/d_category/') . $c['id_category'] ?>" class="btn btn-danger rounded-0 btn-sm text-xs" onclick="return confirm('Deleted Category will lost forever. Still want to delete?')">
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
