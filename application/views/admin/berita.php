<div class="container-fluid py-4">
    <p class="h4"><?= $title; ?></p>

    <button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#newBeritaModal"><?= $title ?></button>
    <div class="card">
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Judul Berita</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Deskripsi Berita</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Gambar</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-xs">1</h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0">Judul Berita</p>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0">Deskripsi Berita</p>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0">Tanggal Berita</p>
                        </td>
                        <td>
                            <div class="author align-items-center">
                                <img src="" alt="..." class="avatar shadow">
                                <div class="name ps-3">
                        </td>

                        <td class="align-middle text-center text-sm">
                            <span class="badge badge-sm badge-success">
                                <a href="" class="badge bg-gradient-success">edit</a>
                                <a href="" class="badge bg-gradient-danger">delete</a>
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="newBeritaModal" tabindex="-1" role="dialog" aria-labelledby="newBeritaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newBeritaModalLabel">Tambahkan Berita</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/berita'); ?>" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" id="judul_berita" name="judul_berita" placeholder="Judul Berita">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="deskripsi_berita" name="deskripsi_berita" placeholder="Deskripsi Berita">
                            </div>
                            <div class="input-group input-group-static my-3">
                                <input type="datetime-local" class="form-control">
                            </div>

                            <div class="form-group">
                                <input type="file" class="form-control" id="image_berita" name="image_berita" placeholder="Tambah Gambar">
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