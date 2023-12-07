				<!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> &mdash; <?= $role['role'] ?></h1>

          <div class="row">
            <div class="col-lg-3">
              <a href="<?= base_url('admin/role'); ?>" class="btn btn-sm btn-default bg-gradient-light border rouned-0 btn-icon-split mb-4">
                <span class="icon text-white-600">
                  <i class="fas fa-chevron-left"></i>
                </span>
                <span class="text">Back</span>
              </a>
            </div>
          </div>
					<div>
						<?= $this->session->flashdata('message'); ?>
					</div>
          <!-- Data Table Role-->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Role-Access</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover" id="dataTable">
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
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" <?= check_access($role['id'], $m['id']); ?> data-role="<?= $role['id'] ?>" data-menu="<?= $m['id'] ?>">
                          </div>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
