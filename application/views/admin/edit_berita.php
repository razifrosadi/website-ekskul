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
                                <label for="exampleFormControlTextarea1">Keterangan Berita</label>
                                <textarea class="form-control" name="keterangan_berita" id="keterangan_berita" rows="6" value="<?= $b->keterangan_berita ?>"></textarea>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-2">Picture</div>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img src="<?= base_url('assets/img/gambar_berita/') . $b->image_berita ?>" class="img-thumbnail">
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="form-group">
                                                <input type="file" name="image_berita" id="image_berita" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2">Picture</div>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img src="<?= base_url('assets/img/gambar_berita/') . $b->image_berita2 ?>" class="img-thumbnail">
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="form-group">
                                                <input type="file" name="image_berita2" id="image_berita" class="form-control">
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
</div>