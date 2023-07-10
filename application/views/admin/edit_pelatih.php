<div class="container-fluid py-4">
    <div class="row mt-4">
        <?php foreach ($pelatih as $p) { ?>
            <?= form_open_multipart('admin/update_pelatih'); ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="hidden" name="id_pelatih" value="<?= $p->id_pelatih; ?>">
                            <input type="text" class="form-control" id="nama_pelatih" name="nama_pelatih" placeholder="Nama Ekstrakurikuler" value="<?= $p->nama_pelatih ?>">
                        </div>

                        <div class="form-group">
                            <select class="form-control" name="id_ekskul" id="id_ekskul">
                                <option value="">Select Menu</option>
                                <?php foreach ($ekskul as $e) : ?>
                                    <option value="<?= $e['ekskul_id']; ?>"><?= $e['nama_ekskul']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="deskripsi_pelatih" name="deskripsi_pelatih" placeholder="Deskripsi" value="<?= $p->deskripsi_pelatih ?>">
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2">Picture</div>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?= base_url('assets/img/logo_ekskul/') . $p->image_pelatih ?> ?>" class="img-thumbnail">
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <input type="file" name="image_pelatih" id="image_pelatih" class="form-control">
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