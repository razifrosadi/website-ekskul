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
                                    <option value="<?= $e->ekskul_id; ?>" <?php if ($e->id_pelatih == $e->id_ekskul) echo 'selected'; ?>><?= $e->nama_ekskul; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="deskripsi_pelatih" name="deskripsi_pelatih" placeholder="Deskripsi" value="<?= $p->deskripsi_pelatih ?>">
                        </div>

                        <div class="form-group">
                            <input type="file" class="form-control" name="image_pelatih">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn bg-gradient-primary">Save Change</button>
            </div>
            <?= form_close() ?>
        <?php } ?>
    </div>
</div>