<div class="container-fluid py-4">
    <p class="h4"><?= $title; ?></p>
    <?= form_error('ekskul', '<div class="alert alert-danger text-white font-weight-bold" role="alert">', '</div>'); ?>
    <?= $this->session->flashdata('message'); ?>

    <button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#newMenuModal">Add New Menu</button>
    <div class="card">
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Ekskul</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kategori</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Logo Ekstrakurikuler</th>
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
                                        <p class="text-xs text-secondary mb-0">john@creative-tim.com</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0"><?= $e['nama_ekskul']; ?></p>
                                <p class="text-xs text-secondary mb-0">Organization</p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0"><?= $e['nama_kategori']; ?></p>
                                <p class="text-xs text-secondary mb-0">Organization</p>
                            </td>
                            <td>
                                <div class="author align-items-center">
                                    <img src="<?= base_url('assets/img/') . $e['logo_ekskul'] ?>" alt="..." class="avatar shadow">
                                    <div class="name ps-3">
                            </td>

                            <td class="align-middle text-center text-sm">
                                <span class="badge badge-sm badge-success">
                                    <a href="" class="badge bg-gradient-success">edit</a>
                                    <a href="" class="badge bg-gradient-danger">delete</a>
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
            <form action="<?= base_url('admin/add_new_ekskul'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" id="nama_ekskul" name="nama_ekskul" placeholder="Nama Ekstrakurikuler">
                            </div>

                            <div class="form-group">
                                <select class="form-control" name="kategori_ekskul_id" id="kategori_ekskul_id">
                                    <option value="">Select Menu</option>
                                    <?php foreach ($kategori as $k) : ?>
                                        <option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <select class="form-control" name="ketua_id" id="ketua_id">
                                    <option value="">Select Menu</option>
                                    <?php foreach ($ketua as $kt) : ?>
                                        <option value="<?= $kt['id']; ?>"><?= $kt['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="file" class="form-control" id="logo_ekskul" name="logo_ekskul" placeholder="Logo Ekstrakurikuler">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-gradient-primary">Save Change</button>
                </div>
            </form>

        </div>
    </div>
</div>