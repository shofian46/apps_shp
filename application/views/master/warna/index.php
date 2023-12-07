<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
</div>
<div class="container-fluid">
	<div class="my-2">
		<!-- Button trigger modal -->
		<a href="<?= base_url('master/a_warna'); ?>" class="btn btn-primary bg-gradient-primary rounded-pill">
			Create Warna
		</a>
	</div>
	<div class="row">
		<div class="col-sm-10">
		<div>
			<?= $this->session->flashdata('message'); ?>
		</div>
		<div class="card shadow-lg border-bottom-primary">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">DataTables <?= $title; ?></h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-hover" id="tb_gudang">
					<thead>
						<tr>
							<th>#</th>
							<th>ID Warna</th>
							<th>Nama Warna</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1;
						foreach ($warna as $wrn) :
						?>
							<tr>
								<td class="align-middle"><?= $i++; ?></td>
								<td class="align-middle"><?= $wrn['kode_warna']; ?></td>
								<td class="align-middle"><?= $wrn['nama_warna']; ?></td>
								<td class="align-middle text-center">
									<a href="<?= base_url('master/e_warna/') . $wrn['id_warna']?>" class="btn btn-info rounded-0 btn-sm text-xs">
										<span class="icon text-white" title="Edit">
											<i class="fas fa-edit"></i>
										</span>
									</a> |
									<a href="<?= base_url('master/d_warna/') . $wrn['id_warna'] ?>" class="btn btn-danger rounded-0 btn-sm text-xs" onclick="return confirm('Deleted Warna will lost forever. Still want to delete?')">
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
