				<nav aria-label="breadcrumb">
					<ol class="breadcrumb d-flex justify-content-end">
						<li class="breadcrumb-item"><a href="<?= base_url(); ?>">Dashboard</a></li>
						<li class="breadcrumb-item" aria-current="page">Role</li>
						<li class="breadcrumb-item active" aria-current="page">Add Role</li>
					</ol>
				</nav>
				<!-- Page Heading -->
				<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

				<a href="<?= base_url('admin/role'); ?>" class="btn btn-sm btn-default bg-gradient-light border rouned-0 btn-icon-split mb-4">
					<span class="icon text-white">
						<i class="fas fa-chevron-left"></i>
					</span>
					<span class="text">Back</span>
				</a>
        <div class="row justify-content-center">
          <form action="" method="POST" class="col-lg-5 col-md-6 col-sm-12 p-0">
            <div class="card rounded-0">
              <h5 class="card-header">Role Master Data</h5>
              <div class="card-body">
                <h5 class="card-title">Add New Role</h5>
                <p class="card-text">Form to add new role to system</p>
                  <?= $this->session->flashdata('message') ?>
                  <div class="form-group">
                    <label for="d_role" class="col-form-label-lg">Role Name</label>
                    <input type="text" class="form-control form-control-lg" name="d_role" id="d_role" value="<?= !empty($this->input->post('d_id')) ? $this->input->post('d_name') : '' ?>">
                    <?= form_error('d_role', '<small class="text-danger">', '</small>') ?>
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
