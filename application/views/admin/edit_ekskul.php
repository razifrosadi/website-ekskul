<div class="container-fluid py-4">
    <div class="row mt-4">
        <?php foreach ($ekskul as $e) { ?>
            <?= form_open_multipart('admin/update'); ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="hidden" name="ekskul_id" value="<?= $e['ekskul_id']; ?>">
                            <input type="text" class="form-control" id="nama_ekskul" name="nama_ekskul" placeholder="Nama Ekstrakurikuler" value="<?= $e['nama_ekskul']; ?>">
                        </div>

                        <div class="form-group">
                            <select class="form-control" name="kategori_ekskul_id" id="kategori_ekskul_id">
                                <option value="">Select Menu</option>
                                <?php foreach ($kategori as $k) : ?>
                                    <option value="<?= $k['id_kategori']; ?>" <?php if ($k['id_kategori'] == $e['kategori_ekskul_id']) echo 'selected'; ?>><?= $k['nama_kategori']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="jadwal_latihan" value="<?= $e['jadwal_latihan']; ?>">
                            <input type="text" class="form-control" id="jadwal_latihan" name="jadwal_Latihan" placeholder="Jadwal Latihan" value="<?= $e['jadwal_latihan']; ?>">
                        </div>

                        <div class="form-group">
                            <select class="form-control" name="ketua_id" id="ketua_id">
                                <option value="" selected>--Pilih Siswa--</option>
                                <?php foreach ($userAll as $u) : ?>
                                    <option value="<?= $u['id']; ?>" <?php if ($u['id'] == $e['ketua_id']) echo 'selected'; ?>><?= $u['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group mb-0 mt-md-0 mt-4">
                            <div class="input-group input-group-static mb-4">
                                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="6" placeholder="Jelaskan deskripsi ekstrakurikuler, maksimal 250 karakter"><?= $e['deskripsi']; ?></textarea>
                            </div>
                            <?= form_error('deskripsi', '<small class="text-danger"">', '</small>') ?>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2">Picture</div>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?= base_url('assets/img/logo_ekskul/') . $e['logo_ekskul']; ?>" class="img-thumbnail">
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="file" name="logo_ekskul" id="logo_ekskul" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn bg-gradient-primary">Simpan Perubahan</button>
            </div>
            <?= form_close() ?>
        <?php } ?>
    </div>
</div>