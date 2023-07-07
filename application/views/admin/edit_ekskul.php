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