<div class="container-fluid py-4">
    <p class="h4"><?= $title; ?></p>
    <?= form_error('siswa', '<div class="alert alert-danger text-white font-weight-bold" role="alert">', '</div>'); ?>
    <?= $this->session->flashdata('message'); ?>
    <div class="page-header">
        <div class="row">
            <div class="col-md-8">
                <div class="card d-flex blur justify-content-center shadow-lg my-sm-0 my-sm-6 mt-8 mb-5">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg p-3">
                            <h3 class="text-white text-primary mb-0">Formulir Pendaftaran Ekstrakurikuler</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="pb-3">
                            Lengkapi Identitasmu Disini!
                        </p>
                        <form class="text-start" method="post" action="daftar">
                            <div class="card-body p-0 my-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group input-group-static mb-4">
                                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?php echo $user['name']; ?>" disabled>
                                        </div>
                                        <?= form_error('nama_lengkap', '<small class="text-danger"">', '</small>') ?>
                                    </div>
                                    <div class="col-md-6 ps-md-2">
                                        <div class="input-group input-group-static mb-4">
                                            <input type="text" class="form-control" id="no_wa" name="no_wa" placeholder="No Whatsapp" disabled>
                                        </div>
                                        <?= form_error('no_wa', '<small class="text-danger"">', '</small>') ?>
                                    </div>

                                    <div class="form-group col-md-6 ps-md-2">
                                        <select class="form-select <?php echo form_error('kelas') ? 'is-invalid' : ''; ?>" name="kelas" disabled>
                                            <option value="">Select menu</option>
                                            <?php foreach ($kelas as $kl) : ?>
                                                <option value="<?= $kl['id_kelas']; ?>"><?= $kl['kelas']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 ps-md-2">
                                        <select class="form-select <?php echo form_error('ekskul') ? 'is-invalid' : ''; ?>" name="ekskul" disabled>
                                            <option value="">Select menu</option>
                                            <?php foreach ($ekskul as $e) : ?>
                                                <option value="<?= $e['ekskul_id']; ?>"><?= $e['nama_ekskul']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group mb-0 mt-md-0 mt-4">
                                    <div class="input-group input-group-static mb-4">
                                        <textarea class="form-control" name="alasan" id="alasan" rows="6" placeholder="Jelaskan alasan kamu, kenapa mau bergabung ekstrakurikuler tersebut! maksimal 250 karakter" disabled></textarea>
                                    </div>
                                    <?= form_error('alasan', '<small class="text-danger"">', '</small>') ?>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn bg-gradient-primary mt-3 mb-0" disabled>DAFTAR</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>