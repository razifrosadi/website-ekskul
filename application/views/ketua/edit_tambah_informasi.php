<div class="container-fluid py-4">
    <div class="row mt-4">
        <?php foreach ($tambah_informasi as $in) { ?>
            <?= form_open_multipart('ketua/update_tambah_informasi'); ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="hidden" name="id_informasi" value="<?= $in->id_informasi; ?>">
                            <input type="text" class="form-control" id="judul_informasi" name="judul_informasi" placeholder="Judul informasi" value="<?= $in->judul_informasi ?>">
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" id="deskripsi_informasi" name="deskripsi_informasi" placeholder="Deskripsi informasi" value="<?= $in->deskripsi_informasi ?>">
                            </div>

                            <div class="input-group input-group-static my-3">
                                <input type="datetime-local" class="form-control" id="tanggal_informasi" name="tanggal_informasi">
                            </div>


                            <div class="form-group row">
                                <div class="col-sm-2">Picture</div>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img src="<?= base_url('assets/img/logo_ekskul/') . $in->image_informasi ?>" class="img-thumbnail">
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="form-group">
                                                <input type="file" name="image_informasi" id="image_informasi" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
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