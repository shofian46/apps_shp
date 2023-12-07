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
                <h5 class="card-title">Updated Role</h5>
                <p class="card-text">Form to update new role to system</p>
								<div>
									<?= $this->session->flashdata('message') ?>
								</div>
                  <div class="form-group">
                    <input type="hidden" class="form-control-plaintext" name="r_id" value="<?= $r_old['id']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="d_role" class="col-form-label-lg">Role Name</label>
                    <input type="text" class="form-control form-control-lg" name="d_role" id="d_role" value="<?= $r_old['role']; ?>">
                    <?= form_error('d_role', '<small class="text-danger">', '</small>') ?>
                  </div>
                  <button type="submit" class="btn btn-sm btn-primary bg-gradient-primary btn-icon-split mt-4 float-right rounded-0">
                    <span class="icon text-white">
                      <i class="fas fa-plus-circle"></i>
                    </span>
                    <span class="text">Submit</span>
                  </button>
              </div>
            </div>
          </form>
          </div>
