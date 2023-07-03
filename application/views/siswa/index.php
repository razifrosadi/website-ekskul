<div class="container-fluid py-4">
    <p class="h4"><?= $title; ?></p>
    <?= form_error('siswa', '<div class="alert alert-danger text-white font-weight-bold" role="alert">', '</div>'); ?>
    <?= $this->session->flashdata('message'); ?>
    <div class="page-header min-vh-100">
        <div class="container">
            <div class="row">
                <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
                    <div class="position-relative h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('./assets/img/illustrations/illustration-signin.jpg'); background-size: cover;" loading="lazy"></div>
                </div>
                <div class="col-xl-5 col-lg-6 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
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
                            <form role="form" class="text-start" method="post" action="<?= base_url('siswa'); ?>">
                                <div class="card-body p-0 my-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-group input-group-static mb-4">
                                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap">
                                            </div>
                                        </div>
                                        <div class="col-md-6 ps-md-2">
                                            <div class="input-group input-group-static mb-4">
                                                <input type="text" class="form-control" id="no_wa" name="no_wa" placeholder="No Whatsapp">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 ps-md-2">
                                            <select class="form-control" name="kelas" id="kelas">
                                                <option value="">Select menu</option>
                                                <?php foreach ($kelas as $kl) : ?>
                                                    <option value="<?= $kl['id_kelas']; ?>"><?= $kl['kelas']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6 ps-md-2">
                                            <select class="form-control" name="ekskul" id="ekskul">
                                                <option value="">Select menu</option>
                                                <?php foreach ($ekskul as $e) : ?>
                                                    <option value="<?= $e['ekskul_id']; ?>"><?= $e['nama_ekskul']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-group mb-0 mt-md-0 mt-4">
                                        <div class="input-group input-group-static mb-4">
                                            <textarea class="form-control" name="alasan" id="alasan" rows="6" placeholder="Jelaskan alasan kamu, kenapa mau bergabung ekstrakurikuler tersebut! maksimal 250 karakter"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn bg-gradient-primary mt-3 mb-0">DAFTAR</button>
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


</div>