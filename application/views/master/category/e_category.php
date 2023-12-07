          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <a href="<?= base_url('master/category'); ?>" class="btn btn-sm btn-default bg-gradient-light border rouned-0 btn-icon-split mb-4">
            <span class="icon text-white">
              <i class="fas fa-chevron-left"></i>
            </span>
            <span class="text">Back</span>
          </a>
        <div class="row justify-content-center">
          <form action="" method="POST" class="col-lg-5 col-md-6 col-sm-12 p-0">
            <div class="card shadow-lg">
              <h5 class="card-header">Category Master Data</h5>
              <div class="card-body">
                <h5 class="card-title">Update Category</h5>
                <p class="card-text">Form to update category to system</p>
                  <div>
									<?= $this->session->flashdata('message') ?>
									</div>
                  <div class="form-group">
                    <input type="hidden" class="form-control form-control-lg" id="m_id_category" name="m_id_category" value="<?= $cat_old['id_category']?>">
                  </div>
                  <div class="form-group">
                    <label for="m_kode_category" class="col-form-label-lg">ID Category</label>
                    <input type="text" class="form-control form-control-lg" name="m_kode_category" id="m_kode_category" value="<?= $cat_old['kode_category']?>">
                    <?= form_error('m_kode_category', '<small class="text-danger">', '</small>') ?>
                  </div>
                  <div class="form-group">
                    <label for="m_category" class="col-form-label-lg">Category</label>
                    <input type="text" class="form-control form-control-lg" name="m_category" id="m_category" value="<?= $cat_old['nama_category']?>">
                    <?= form_error('m_category', '<small class="text-danger">', '</small>') ?>
                  </div>
                  <button type="submit" class="btn btn-sm btn-primary bg-gradient-primary btn-icon-split mt-4 float-right rounded-pill">
                    <span class="icon text-white">
                      <i class="fas fa-plus-circle"></i>
                    </span>
                    <span class="text">Save</span>
                  </button>
              </div>
            </div>
          </form>
          </div>
