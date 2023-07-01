<div class="container-fluid py-4">
    <p class="h4"><?= $title; ?></p>

    <button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#newInformasiModal"><?= $title ?></button>
    <div class="card">
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Judul Informasi</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Deskripsi Informasi</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Gambar</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($informasi as $in) : ?>
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-xs"><?= $i; ?></h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0"><?= $in['judul_informasi']; ?></p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0"><?= $in['deskripsi_informasi']; ?></p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0"><?= $in['tanggal_informasi']; ?></p>
                            </td>
                            <td>
                                <div class="author align-items-center">
                                    <img src="<?= base_url('assets/img/logo_ekskul/') . $in['image_informasi'] ?>" alt="..." class="avatar shadow">
                                    <div class="name ps-3">
                            </td>

                            <td class="align-middle text-center text-sm">
                                <span class="badge badge-sm badge-success">
                                    <a href="<?= base_url('ketua/edit_tambah_informasi/' . $in['id_informasi']) ?>" class="badge bg-gradient-success">edit</a>
                                    <a href="<?= base_url('ketua/delete_tambah_informasi/' . $in['id_informasi']) ?>" class="badge bg-gradient-danger">delete</a>
                                </span>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="newInformasiModal" tabindex="-1" role="dialog" aria-labelledby="newInformasiModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newInformasiModalLabel">Tambahkan Informasi</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('ketua/tambah_informasi'); ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control" id="judul_informasi" name="judul_informasi" placeholder="Judul Informasi">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="deskripsi_informasi" name="deskripsi_informasi" placeholder="Deskripsi Informasi">
                        </div>
                        <div class="input-group input-group-static my-3">
                            <input type="datetime-local" class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="file" class="form-control" id="image_informasi" name="image_informasi" placeholder="Tambah Gambar">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn bg-gradient-primary">Save Change</button>
            </div>
            <?= form_close() ?>

        </div>
    </div>
</div>