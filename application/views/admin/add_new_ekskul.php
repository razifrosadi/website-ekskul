<div class="container-fluid py-4">
    <p class="h4"><?= $title; ?></p>

    <?= $this->session->flashdata('message') ?>

    <button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#newMenuModal"><?= $title ?></button>
    <div class="card">
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Ekskul</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kategori</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jadwal</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Deskripsi</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Logo</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($ekskul as $e) : ?>
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-xs"><?= $i; ?></h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0"><?= $e['nama_ekskul']; ?></p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0"><?= $e['nama_kategori']; ?></p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0"><?= $e['jadwal_latihan']; ?></p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0"><?= implode(' ', array_slice(explode(' ', $e['deskripsi']), 0, 5)); ?>....</p>
                            </td>
                            <td>
                                <div class="author align-items-center">
                                    <img src="<?= base_url('assets/img/logo_ekskul/') . $e['logo_ekskul'] ?>" alt="..." class="avatar shadow">
                                    <div class="name ps-3">
                            </td>

                            <td class="align-middle text-center text-sm">
                                <span class="badge badge-sm badge-success">
                                    <a href="<?= base_url('admin/edit_ekskul/' . $e['ekskul_id']) ?>" class="badge bg-gradient-success">edit</a>
                                    <a href="<?= base_url('admin/delete/' . $e['ekskul_id']) ?>" class="badge bg-gradient-danger">delete</a>
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
<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Add New Menu</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('admin/add_new_ekskul'); ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama_ekskul" name="nama_ekskul" placeholder="Nama Ekstrakurikuler">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="jadwal_latihan" name="jadwal_latihan" placeholder="Jadwal Latihan">
                        </div>

                        <div class="form-group">
                            <select class="form-control" name="kategori_ekskul_id" id="kategori_ekskul_id">
                                <option value="">Select Menu</option>
                                <?php foreach ($kategori as $k) : ?>
                                    <option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group mb-0 mt-md-0 mt-4">
                            <div class="input-group input-group-static mb-4">
                                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="6" placeholder="Jelaskan deskripsi ekstrakurikuler, maksimal 250 karakter"></textarea>
                            </div>
                            <?= form_error('deskripsi', '<small class="text-danger"">', '</small>') ?>
                        </div>

                        <div class="form-group">
                            <input type="file" class="form-control" name="logo_ekskul" placeholder="Logo Ekstrakurikuler">
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