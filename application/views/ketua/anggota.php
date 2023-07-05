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
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Alasan</th>
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
                                <p class="text-xs font-weight-bold mb-0"><?= $s['alasan']; ?></p>
                                <p class="text-xs text-secondary mb-0"></p>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>