          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <a href="<?= base_url('menu'); ?>" class="btn btn-sm btn-default bg-gradient-light border rouned-0 btn-icon-split mb-4">
            <span class="icon text-white">
              <i class="fas fa-chevron-left"></i>
            </span>
            <span class="text">Back</span>
          </a>
        <div class="row justify-content-center">
          <form action="" method="POST" class="col-lg-5 col-md-6 col-sm-12 p-0">
            <div class="card shadow-lg">
              <h5 class="card-header">Menu Master Data</h5>
              <div class="card-body">
                <h5 class="card-title">Update Menu</h5>
                <p class="card-text">Form to update menu to system</p>
                  <?= $this->session->flashdata('message') ?>
                  <div class="form-group">
                    <input type="hidden" class="form-control form-control-lg" name="m_id" value="<?= $m_old['id']?>">
                  </div>
                  <div class="form-group">
                    <label for="m_menu" class="col-form-label-lg">Menu</label>
                    <input type="text" class="form-control form-control-lg" name="m_menu" id="m_menu" value="<?= $m_old['menu']?>">
                    <?= form_error('m_menu', '<small class="text-danger">', '</small>') ?>
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
