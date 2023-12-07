<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
</div>
<div class="container-fluid">
	<div class="my-2">
		<!-- Button trigger modal -->
		<a href="<?= base_url('menu/a_menu'); ?>" class="btn btn-outline-primary rounded-pill">
			Create Menu
		</a>
	</div>
	<div class="row">
		<div class="col-sm-10">
		<div>
			<?= $this->session->flashdata('message'); ?>
		</div>
		<div class="card shadow-lg border-bottom-info">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-info">DataTables <?= $title; ?></h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-hover" id="tb_menu">
					<thead>
						<tr>
							<th>#</th>
							<th>Menu</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1;
						foreach ($menu as $m) :
						?>
							<tr>
								<td class="align-middle"><?= $i++; ?></td>
								<td class="align-middle"><?= $m['menu']; ?></td>
								<td class="align-middle text-center">
									<a href="<?= base_url('menu/e_menu/') . $m['id']?>" class="btn btn-info rounded-0 btn-sm text-xs">
										<span class="icon text-white" title="Edit">
											<i class="fas fa-edit"></i>
										</span>
									</a> |
									<a href="<?= base_url('menu/d_menu/') . $m['id'] ?>" class="btn btn-danger rounded-0 btn-sm text-xs" onclick="return confirm('Deleted Menu will lost forever. Still want to delete?')">
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


<!-- Modal -->
<div class="modal fade" id="menuModal" data-backdrop="static" tabindex="-1" aria-labelledby="menuModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="menuModalLabel">Form Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
			<form action="" method="post" id="formRecordMenu">
				<div class="modal-body">
					<div class="form-group">
						<label for="menu">Nama Menu</label>
						<input type="text" class="form-control" id="menu" name="menu">
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary btn-block" id="add_menu">Save</button>
					<button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Close</button>
				</div>
			</form>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editMenuModal" data-backdrop="static" tabindex="-1" aria-labelledby="editMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editMenuModalLabel">Form Update Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
			<form action="" method="post" id="EditForm">
				<input type="hidden" name="edit_id" id="edit_id" value="">
				<div class="modal-body">
					<div class="form-group">
						<label for="edit_menu">Nama Menu</label>
						<input type="text" class="form-control" id="edit_menu" name="edit_menu">
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary btn-block" id="update_menu">Update</button>
					<button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Close</button>
				</div>
			</form>
    </div>
  </div>
</div>
