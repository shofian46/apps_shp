          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <a href="<?= base_url('menu/submenu'); ?>" class="btn btn-sm btn-default bg-gradient-light border rouned-0 btn-icon-split mb-4">
            <span class="icon text-white">
              <i class="fas fa-chevron-left"></i>
            </span>
            <span class="text">Back</span>
          </a>
        <div class="row justify-content-center">
          <form action="" method="POST" class="col-lg-5 col-md-6 col-sm-12 p-0">
            <div class="card shadow-lg">
              <h5 class="card-header">Submenu Master Data</h5>
              <div class="card-body">
                <h5 class="card-title">Add New Submenu</h5>
                <p class="card-text">Form to add new submenu to system</p>
                  <?= $this->session->flashdata('message') ?>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label for="m_menu" class="col-form-label">Menu</label>
                        <select name="m_id" id="m_id" class="form-control">
                          <option value="">-- Choose --</option>
                          <?php foreach($menu as $m): ?>
                            <option value="<?= $m['id']; ?>">-- <?= $m['menu']; ?> --</option>
                          <?php endforeach; ?>
                        </select>
                        <?= form_error('m_id', '<small class="text-danger">', '</small>') ?>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="m_title" class="col-form-label">Title</label>
                        <input type="text" class="form-control" name="m_title" id="m_title" value="<?= set_value('m_title')?>">
                        <?= form_error('m_title', '<small class="text-danger">', '</small>') ?>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label for="m_url" class="col-form-label">Url</label>
                        <input type="text" class="form-control" name="m_url" id="m_url" value="<?= set_value('m_url')?>">
                        <?= form_error('m_url', '<small class="text-danger">', '</small>') ?>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="icon" class="col-form-label">Icon</label>
                        <select class="form-control" name="icon" id="icon">
                          <option value="">--Select---</option>
                          <option value="fa fa-fw fa-chevron-right">fa-chevron-right </option>
                          <option value="fas fa-fw fa-circle">fa-circle</option>
                          <option value="fas fa-fw fa-fire">fa-fire</option>
                          <option value="far fa-fw fa-user">fa-user</option>
                          <option value="fas fa-fw fa-folder">fa-folder</option>
                          <option value="fas fa-fw fa-folder-open">fa-folder-open</option>
                          <option value="fa fa-fw fa-cog">fa-cog</option>
                        </select>
                        <?= form_error('icon', '<small class="text-danger">', '</small>') ?>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="is_active">Active</label>
                    <select class="form-control" name="is_active" id="is_active">
                      <option value="">--Select---</option>
                      <option value="1">Active </option>
                      <option value="0">Not Active</option>
                    </select>
                    <?= form_error('is_active', '<small class="text-danger">', '</small>') ?>
                  </div>
                  <button type="submit" class="btn btn-sm btn-success bg-gradient-success btn-icon-split mt-4 float-right rounded-pill">
                    <span class="icon text-white">
                      <i class="fas fa-plus-circle"></i>
                    </span>
                    <span class="text">Save</span>
                  </button>
              </div>
            </div>
          </form>
          </div>
