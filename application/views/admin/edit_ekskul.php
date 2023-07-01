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
                            <input type="file" class="form-control" name="logo_ekskul">
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