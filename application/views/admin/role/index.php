					<!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <div class="row">
            <div class="col-lg-3">
              <a href="<?= base_url('admin/a_role'); ?>" class="btn btn-primary bg-gradient-primary btn-icon-split rounded-pill mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-patch-plus-fill m-1" viewBox="0 0 16 16">
                  <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zM8.5 6v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0z" />
                </svg>
                <span class="text">New Role</span>
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
                <table class="table table-hover" id="dataTable">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Role Name</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                    <?php
                    $i = 1;
                    foreach ($role as $r) :
                    ?>
                      <tr>
                        <td class="align-middle"><?= $i++; ?></td>
                        <td class="align-middle"><?= $r->role; ?></td>
                        <td class="align-middle text-center">
                          <a href="<?= base_url('admin/roleAccess/') . $r->id ?>" class="btn btn-primary rounded-0 btn-sm text-xs">
                            <span class="icon text-white" title="Edit">
                              <i class="fa fa-eye"></i>
                            </span>
                          </a> |
                          <a href="<?= base_url('admin/e_role/') . $r->id ?>" class="btn btn-info rounded-0 btn-sm text-xs">
                            <span class="icon text-white" title="Edit">
                              <i class="fas fa-edit"></i>
                            </span>
                          </a> |
                          <a href="<?= base_url('admin/d_role/') . $r->id ?>" class="btn btn-danger rounded-0 btn-sm text-xs" onclick="return confirm('Deleted Role will lost forever. Still want to delete?')">
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
