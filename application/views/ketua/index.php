<div class="container-fluid py-4">
    <p class="h4"><?= $title; ?></p>
    <?= form_error('menu', '<div class="alert alert-danger text-white font-weight-bold" role="alert">', '</div>'); ?>
    <?= $this->session->flashdata('message'); ?>

    <div class="card">
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Anggota</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kelas</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-xs">1</h6>
                                    <p class="text-xs text-secondary mb-0">john@creative-tim.com</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0">Nama Anggota</p>
                            <p class="text-xs text-secondary mb-0">Organization</p>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0">Kelas</p>
                            <p class="text-xs text-secondary mb-0">Organization</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <span class="badge badge-sm badge-success">
                                <a href="" class="badge bg-gradient-success">Terima</a>
                                <a href="" class="badge bg-gradient-danger">Tolak</a>
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>