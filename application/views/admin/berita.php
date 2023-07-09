<div class="container-fluid py-4">
    <p class="h4"><?= $title; ?></p>

    <button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#newBeritaModal">Tambah Berita</button>
    <div class="card">
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Judul Berita</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Deskripsi Berita</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Keterangan Berita</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Gambar</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Gambar</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($berita as $b) : ?>
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-xs"><?= $i; ?></h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0"><?= $b['judul_berita']; ?></p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0"><?= $b['deskripsi_berita']; ?></p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">
                                    <?php
                                    $keterangan_berita = $b['keterangan_berita'];
                                    $words = explode(' ', $keterangan_berita);

                                    $new_keterangan_berita = '';
                                    for ($j = 0; $j < count($words); $j++) {
                                        $new_keterangan_berita .= $words[$j];
                                        if (($j + 1) % 10 == 0) {
                                            $new_keterangan_berita .= '<br>';
                                        } else {
                                            $new_keterangan_berita .= ' ';
                                        }
                                    }

                                    echo $new_keterangan_berita;
                                    ?>
                                </p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0"><?= $b['tanggal_berita']; ?></p>
                            </td>
                            <td>
                                <div class="author align-items-center">
                                    <img src="<?= base_url('assets/img/gambar_berita/') . $b['image_berita'] ?>" alt="..." class="avatar shadow">
                                    <div class="name ps-3">
                                    </div>
                            </td>
                            <td>
                                <?php if (isset($b['image_berita2']) && $b['image_berita2'] != '') : ?>
                                    <div class="author align-items-center">
                                        <img src="<?= base_url('assets/img/gambar_berita/') . $b['image_berita2'] ?>" alt="..." class="avatar shadow">
                                        <div class="name ps-3">
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </td>


                            <td class="align-middle text-center text-sm">
                                <span class="badge badge-sm badge-success">
                                    <a href="<?= base_url('admin/edit_berita/' . $b['id_berita']) ?>" class="badge bg-gradient-success">edit</a>
                                    <a href="<?= base_url('admin/delete_berita/' . $b['id_berita']) ?>" class="badge bg-gradient-danger">delete</a>
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
<div class="modal fade" id="newBeritaModal" tabindex="-1" role="dialog" aria-labelledby="newBeritaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newBeritaModalLabel">Tambahkan Berita</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('admin/berita'); ?>
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
                            <label for="exampleFormControlTextarea1">Keterangan Berita</label>
                            <textarea class="form-control" name="keterangan_berita" id="keterangan_berita" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <input type="file" class="form-control" id="image_berita" name="image_berita" placeholder="Tambah Gambar">
                        </div>

                        <div class="form-group">
                            <input type="file" class="form-control" id="image_berita2" name="image_berita2" placeholder="Tambah Gambar">
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn bg-gradient-primary">Simpan</button>
            </div>
            <?= form_close() ?>

        </div>
    </div>
</div>