          <div class="row">
            <div class="col-lg-3">
              <a href="<?= base_url('menu/a_submenu'); ?>" class="btn btn-primary bg-gradient-primary rounded-pill mb-4">
                <span class="text">New Submenu</span>
              </a>
            </div>
          </div>
						<div>
							<?= $this->session->flashdata('message'); ?>
						</div>

          <!-- Data Table Role-->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables <?= $title; ?></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Menu</th>
                      <th>Title</th>
                      <th>Url</th>
                      <th>Icon</th>
                      <th>Active</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                    <?php
                    $i = 1;
                    foreach ($submenu as $sm) :
                    ?>
                      <tr>
                        <td class="align-middle"><?= $i++; ?></td>
                        <td class="align-middle"><?= $sm['menu']; ?></td>
                        <td class="align-middle"><?= $sm['title']; ?></td>
                        <td class="align-middle"><?= $sm['url']; ?></td>
                        <td class="align-middle"><i class="<?= $sm['icon']; ?>"></i></td>
                        <td class="align-middle">
                          <?= $sm['is_active'] == 1 ? '<span class="badge badge-pill badge-primary">active</span>':'<span class="badge badge-pill badge-danger">not actvie</span>' ?>
                        </td>
                        <td class="align-middle text-center">
                          <a href="<?= base_url('menu/e_submenu/') . $sm['id']?>" class="btn btn-info rounded-0 btn-sm text-xs">
                            <span class="icon text-white" title="Edit">
                              <i class="fas fa-edit"></i>
                            </span>
                          </a> |
                          <a href="<?= base_url('menu/d_submenu/') . $sm['id'] ?>" class="btn btn-danger rounded-0 btn-sm text-xs" onclick="return confirm('Deleted Submenu will lost forever. Still want to delete?')">
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
