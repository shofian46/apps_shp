          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <a href="<?= base_url('master/bahan'); ?>" class="btn btn-sm btn-default bg-gradient-light border rouned-0 btn-icon-split mb-4">
            <span class="icon text-white">
              <i class="fas fa-chevron-left"></i>
            </span>
            <span class="text">Back</span>
          </a>
          <form action="" method="POST" class="row user">
            <div class="col-lg col-md col-sm-6 p-0 my-2 mx-2 card shadow-lg">
              <h5 class="card-header">Master Data Bahan</h5>
              <div class="card-body">
                <h5 class="card-title">Update Data Bahan</h5>
                <p class="card-text">Form to update data bahan to system</p>
								<div>
									<?= $this->session->flashdata('message') ?>
								</div>
									<div class="form-group">
                    <input type="hidden" class="form-control form-control-lg" id="m_id_bahan" name="m_id_bahan" value="<?= $bhn_old['id_bahan']?>">
                  </div>
                  <div class="form-group">
                    <label for="m_kode_bahan" class="col-form-label-lg">ID Bahan</label>
                    <input type="text" class="form-control form-control-md <?= form_error('m_kode_bahan') ? 'is-invalid': ''; ?>" name="m_kode_bahan" id="m_kode_bahan" value="<?= $bhn_old['kode_bahan']; ?>">
                    <?= form_error('m_kode_bahan', '<small class="text-danger">', '</small>') ?>
                  </div>
                  <div class="form-group">
                    <label for="m_bahan" class="col-form-label-lg">Nama Bahan</label>
                    <input type="text" class="form-control form-control-md <?= form_error('m_bahan') ? 'is-invalid': ''; ?>" name="m_bahan" id="m_bahan" value="<?= $bhn_old['nama_bahan']?>">
                    <?= form_error('m_bahan', '<small class="text-danger">', '</small>') ?>
                  </div>
									<div class="form-group">
										<label for="m_kode_category" class="col-form-label-lg">Category</label>
										<select name="m_kode_category" id="m_kode_category" class="form-control <?= form_error('m_kode_category') ? 'is-invalid' : ''; ?>">
											<option>--- Choose ---</option>
											<?php foreach($categoryId as $cat): ?>
												<option value="<?= $cat['id_category']; ?>" <?= $cat['id_category'] == $bhn_old['id_category'] ? 'selected':''; ?>>--- <?= $cat['nama_category']; ?> ---</option>
											<?php endforeach; ?>
										</select>
										<div class="invalid-feedback">
											<?= form_error('m_kode_warna'); ?>
										</div>
									</div>
              </div>
            </div>
						<div class="col-lg col-md col-sm-6 p-0 my-2 mx-2 card shadow-lg">
              <div class="card-body">
									<div class="form-group">
										<label for="m_kode_warna" class="col-form-label-lg">Warna</label>
										<select name="m_kode_warna" id="m_kode_warna" class="form-control <?= form_error('m_kode_warna') ? 'is-invalid' : ''; ?>">
											<option>--- Choose ---</option>
											<?php foreach($warnaId as $wrn): ?>
												<option value="<?= $wrn['id_warna']; ?>" <?= $wrn['id_warna'] == $bhn_old['id_warna'] ? 'selected':''; ?>>--- <?= $wrn['nama_warna']; ?> ---</option>
											<?php endforeach; ?>
										</select>
										<div class="invalid-feedback">
											<?= form_error('m_kode_warna'); ?>
										</div>
									</div>
									<div class="form-group">
										<label for="satuan" class="col-form-label-lg">Satuan</label>
										<select name="satuan" id="satuan" class="form-control">
											<option value="">--- Choose ---</option>
											<option value="Gr" <?= $bhn_old['satuan'] == 'Gr' ? 'selected':''; ?>>Gr</option>
											<option value="Pcs" <?= $bhn_old['satuan'] == 'Pcs' ? 'selected':''; ?>>Pcs</option>
										</select>
									</div>
									<div class="form-group">
										<label for="m_kode_gudang" class="col-form-label-lg">Kode Gudang</label>
										<select name="m_kode_gudang" id="m_kode_gudang" class="form-control <?= form_error('m_kode_gudang') ? 'is-invalid' : ''; ?>">
											<option>--- Choose ---</option>
											<?php foreach($gudangId as $gd): ?>
												<option value="<?= $gd['id_gudang']; ?>" <?= $gd['id_gudang'] == $bhn_old['id_gudang'] ? 'selected':''; ?>>--- <?= $gd['nama_gudang']; ?> ---</option>
											<?php endforeach; ?>
										</select>
										<div class="invalid-feedback">
											<?= form_error('m_kode_gudang'); ?>
										</div>
									</div>
									<div class="form-group">
										<label for="stok" class="col-form-label-lg">Stock</label>
										<input type="number" name="stok" id="stok" class="form-control" value="<?= $bhn_old['stok']; ?>">
									</div>
                  <button type="submit" class="btn btn-md btn-primary bg-gradient-primary btn-block mt-4 float-right rounded-pill">
                    <span class="text">Change</span>
                  </button>
              </div>
            </div>
          </form>
