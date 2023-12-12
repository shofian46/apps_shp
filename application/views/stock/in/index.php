<nav aria-label="breadcrumb">
  <ol class="breadcrumb d-flex justify-content-end">
    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Stock-in</li>
  </ol>
</nav>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
</div>

<div class="container-fluid">
	<div class="my-2">
		<!-- Button trigger modal -->
		<a href="<?= base_url('stock/in/add'); ?>" class="btn btn-primary bg-gradient-primary rounded-pill">
			Create Stock
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
							<th>Tanggal</th>
							<th>Nama Barang</th>
							<th>Satuan</th>
							<th>Gudang</th>
							<th>Stock Barang</th>
							<th>Stock Pakai</th>
							<th>Total</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						 
					</tbody>
				</table>
			</div>
		</div>
	</div>
		</div>
	</div>
	
</div>
