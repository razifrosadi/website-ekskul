<div class="container-fluid py-4">
    <p class="h4"><?= $title; ?></p>

    <button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#newPelatihModal">Tambahkan Pelatih</button>
    <div class="card">
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Pelatih</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ekstrakurikuler</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Deskripsi Pelatih</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Gambar</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pelatih as $p) : ?>
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-xs"><?= $i; ?></h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0"><?= $p['nama_pelatih']; ?></p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0"><?= $p['nama_ekskul']; ?></p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0"><?= $p['deskripsi_pelatih']; ?></p>
                            </td>
                            <td>
                                <div class="author align-items-center">
                                    <img src="<?= base_url('assets/img/logo_ekskul/') . $p['image_pelatih'] ?>" alt="..." class="avatar shadow">
                                    <div class="name ps-3">
                            </td>

                            <td class="align-middle text-center text-sm">
                                <span class="badge badge-sm badge-success">
                                    <a href="<?= base_url('admin/edit_pelatih/' . $p['id_pelatih']) ?>" class="badge bg-gradient-success">edit</a>
                                    <a href="<?= base_url('admin/delete_pelatih/' . $p['id_pelatih']) ?>" class="badge bg-gradient-danger">delete</a>
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
<div class="modal fade" id="newPelatihModal" tabindex="-1" role="dialog" aria-labelledby="newPelatihModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newPelatihModalLabel">Tambahkan Pelatih</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('admin/pelatih'); ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama_pelatih" name="nama_pelatih" placeholder="Nama Pelatih">
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
                            <input type="text" class="form-control" id="deskripsi_pelatih" name="deskripsi_pelatih" placeholder="Deskripsi Berita">
                        </div>

                        <div class="form-group">
                            <input type="file" class="form-control" id="image_pelatih" name="image_pelatih" placeholder="Tambah Gambar">
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