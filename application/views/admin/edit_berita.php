<div class="container-fluid py-4">
    <div class="row mt-4">
        <?php foreach ($berita as $b) { ?>
            <?= form_open_multipart('admin/update_berita'); ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="hidden" name="id_berita" value="<?= $b->id_berita; ?>">
                            <input type="text" class="form-control" id="judul_berita" name="judul_berita" placeholder="Judul berita" value="<?= $b->judul_berita ?>">
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" id="deskripsi_berita" name="deskripsi_berita" placeholder="Deskripsi berita" value="<?= $b->deskripsi_berita ?>">
                            </div>

                            <div class="input-group input-group-static my-3">
                                <input type="datetime-local" class="form-control" value="<?= $b->tanggal_berita ?>">
                            </div>

                            <div class="form-group">
                                <input type="file" class="form-control" name="image_berita" placeholder="Gambar berita" value="<?= $b->image_berita ?>">
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
</div>