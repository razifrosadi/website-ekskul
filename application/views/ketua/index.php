<div class="container-fluid py-4">
    <p class="h4"><?= $title; ?></p>

    <div class="card">
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Anggota</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No Whatsapp</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kelas</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ekskul</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Pengalaman</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Sertifikat</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Alasan</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($siswa as $s) : ?>
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-xs"><?= $i; ?></h6>
                                        <p class="text-xs text-secondary mb-0"></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0"><?= $s['nama_lengkap']; ?></p>
                                <p class="text-xs text-secondary mb-0"></p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0"><?= $s['no_wa']; ?></p>
                                <p class="text-xs text-secondary mb-0"></p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0"><?= $s['kelas']; ?></p>
                                <p class="text-xs text-secondary mb-0"></p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0"><?= $s['nama_ekskul']; ?></p>
                                <p class="text-xs text-secondary mb-0"></p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0"><?= $s['pengalaman']; ?></p>
                                <p class="text-xs text-secondary mb-0"></p>
                            </td>
                            <td>
                                <?php if (isset($s['image_sertifikat']) && $s['image_sertifikat'] != '') : ?>
                                    <div class="author align-items-center">
                                        <a href="<?= base_url('assets/img/logo_ekskul/') . $s['image_sertifikat'] ?>" data-fancybox>
                                            <img src="<?= base_url('assets/img/logo_ekskul/') . $s['image_sertifikat'] ?>" alt="..." class="avatar shadow">
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <div class="name ps-3">
                            </td>

                            <td>
                                <p class="text-xs font-weight-bold mb-0"><?= $s['alasan']; ?></p>
                                <p class="text-xs text-secondary mb-0"></p>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <span class="badge badge-sm badge-success">
                                    <a href="<?= base_url('ketua/diterima/' . $s['id_siswa']) ?>" class="badge bg-gradient-success">Terima</a>
                                    <a href="<?= base_url('ketua/ditolak/' . $s['id_siswa']) ?>" class="badge bg-gradient-danger">Tolak</a>
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