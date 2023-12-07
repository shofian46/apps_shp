          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <a href="<?= base_url('master/barang'); ?>" class="btn btn-sm btn-default bg-gradient-light border rouned-0 btn-icon-split mb-4">
            <span class="icon text-white">
              <i class="fas fa-chevron-left"></i>
            </span>
            <span class="text">Back</span>
          </a>
        <div class="row justify-content-center">
          <form action="" method="POST" class="col-lg-5 col-md-6 col-sm-12 p-0">
            <div class="card shadow-lg">
              <h5 class="card-header">Master Data Barang</h5>
              <div class="card-body">
                <h5 class="card-title">Update Data Barang</h5>
                <p class="card-text">Form to update data barang to system</p>
								<div>
									<?= $this->session->flashdata('message') ?>
								</div>
									<div class="form-group">
                    <input type="hidden" class="form-control form-control-lg" id="m_id_barang" name="m_id_barang" value="<?= $brg_old['id_barang']?>">
                  </div>
                  <div class="form-group">
                    <label for="m_kode_barang" class="col-form-label-lg">ID Barang</label>
                    <input type="text" class="form-control form-control-md <?= form_error('m_kode_barang') ? 'is-invalid': ''; ?>" name="m_kode_barang" id="m_kode_barang" value="<?= $brg_old['kode_barang']; ?>">
                    <?= form_error('m_kode_barang', '<small class="text-danger">', '</small>') ?>
                  </div>
                  <div class="form-group">
                    <label for="m_barang" class="col-form-label-lg">Nama Barang</label>
                    <input type="text" class="form-control form-control-md <?= form_error('m_barang') ? 'is-invalid': ''; ?>" name="m_barang" id="m_barang" value="<?= $brg_old['nama_barang']?>">
                    <?= form_error('m_barang', '<small class="text-danger">', '</small>') ?>
                  </div>
											<div class="form-group">
												<label for="m_kode_warna" class="col-form-label-lg">Kode Warna</label>
												<select name="m_kode_warna" id="m_kode_warna" class="form-control <?= form_error('m_kode_warna') ? 'is-invalid' : ''; ?>">
													<option>--- Choose ---</option>
													<?php foreach ($warnaId as $wrn) : ?>
                              <option value="<?= $wrn['id_warna'] ?>" <?php if ($wrn['id_warna'] ==  $brg_old['warna_id']) {
																echo 'selected';
															}; ?>><?= $wrn['nama_warna'] ?>
															</option>
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
													<option value="Gr" <?= $brg_old['satuan'] == 'Gr' ? 'selected' : ''; ?>>Gr</option>
													<option value="Pcs" <?= $brg_old['satuan'] == 'Pcs' ? 'selected' : ''; ?>>Pcs</option>
												</select>
											</div>
									<div class="form-group">
										<label for="m_kode_gudang" class="col-form-label-lg">Kode Gudang</label>
										<select name="m_kode_gudang" id="m_kode_gudang" class="form-control <?= form_error('m_kode_gudang') ? 'is-invalid' : ''; ?>">
											<option>--- Choose ---</option>
											<?php foreach($gudangId as $gd): ?>
												<option value="<?= $gd['id_gudang']; ?>" <?= $gd['id_gudang'] == $brg_old['gudang_id'] ? 'selected': ''; ?>>--- <?= $gd['nama_gudang']; ?> ---</option>
											<?php endforeach; ?>
										</select>
										<div class="invalid-feedback">
											<?= form_error('m_kode_gudang'); ?>
										</div>
									</div>
									<div class="form-group">
										<label for="stok" class="col-form-label-lg">Stock</label>
										<input type="number" name="stok" id="stok" class="form-control" value="<?= $brg_old['stok']; ?>">
									</div>
                  <button type="submit" class="btn btn-sm btn-primary bg-gradient-primary btn-icon-split mt-4 float-right rounded-pill">
                    <span class="icon text-white">
                      <i class="fas fa-plus-circle"></i>
                    </span>
                    <span class="text">Change</span>
                  </button>
              </div>
            </div>
          </form>
				</div>
