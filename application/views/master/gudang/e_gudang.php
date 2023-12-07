          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <a href="<?= base_url('master'); ?>" class="btn btn-sm btn-default bg-gradient-light border rouned-0 btn-icon-split mb-4">
            <span class="icon text-white">
              <i class="fas fa-chevron-left"></i>
            </span>
            <span class="text">Back</span>
          </a>
        <div class="row justify-content-center">
          <form action="" method="POST" class="col-lg-5 col-md-6 col-sm-12 p-0">
            <div class="card shadow-lg">
              <h5 class="card-header">Gudang Master Data</h5>
              <div class="card-body">
                <h5 class="card-title">Update Gudang</h5>
                <p class="card-text">Form to update gudang to system</p>
                  <?= $this->session->flashdata('message') ?>
                  <div class="form-group">
                    <input type="hidden" class="form-control form-control-lg" name="gudang_id" value="<?= $gd_old['id_gudang']?>">
                  </div>
                  <div class="form-group">
                    <label for="m_kode_gudang" class="col-form-label-lg">Gudang</label>
                    <input type="text" class="form-control form-control-lg" name="m_kode_gudang" id="m_kode_gudang" value="<?= $gd_old['kode_gudang']?>">
                    <?= form_error('m_kode_gudang', '<small class="text-danger">', '</small>') ?>
                  </div>
                  <div class="form-group">
                    <label for="m_gudang" class="col-form-label-lg">Gudang</label>
                    <input type="text" class="form-control form-control-lg" name="m_gudang" id="m_gudang" value="<?= $gd_old['nama_gudang']?>">
                    <?= form_error('m_gudang', '<small class="text-danger">', '</small>') ?>
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
