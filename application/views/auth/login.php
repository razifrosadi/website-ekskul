<!-- Navbar Transparent -->
<nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3  navbar-transparent ">
    <div class="container">
        <a class="navbar-brand  text-white " href="landingpage" rel="tooltip" title="Designed and Coded by Creative Tim" data-placement="bottom" target="_blank">
            Website Ekstrakurikuler
        </a>
    </div>
</nav>
<!-- End Navbar -->
<div class="page-header align-items-start min-vh-100" style="background-image: url('<?= base_url('assets/'); ?>img/bg4.png');" loading="lazy">
    <span class="mask bg-gradient-dark opacity-6"></span>
    <div class="container my-auto">
        <div class="row">
            <div class="col-lg-4 col-md-8 col-12 mx-auto">
                <div class="card z-index-0 fadeIn3 fadeInBottom">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                            <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Masuk!</h4>
                            <div class="row mt-3">
                                <div class="col-2 text-center ms-auto">
                                    <a class="btn btn-link px-3" href="javascript:;">
                                        <i class="fa fa-facebook text-white text-lg"></i>
                                    </a>
                                </div>
                                <div class="col-2 text-center px-1">
                                    <a class="btn btn-link px-3" href="javascript:;">
                                        <i class="fa fa-github text-white text-lg"></i>
                                    </a>
                                </div>
                                <div class="col-2 text-center me-auto">
                                    <a class="btn btn-link px-3" href="javascript:;">
                                        <i class="fa fa-google text-white text-lg"></i>
                                    </a>
                                </div>
                                <?= $this->session->flashdata('message'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form role="form" class="text-start" method="post" action="<?= base_url('auth'); ?>">
                            <div class="input-group input-group-outline my-3">
                                <input type="text" class="form-control" id="email" name="email" placeholder="Alamat Email" value="<?= set_value('email'); ?>">
                            </div>
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            <div class="input-group input-group-outline mb-3">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Kata Sandi">
                            </div>
                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                            <div class="form-check form-switch d-flex align-items-center mb-3">
                                <input class="form-check-input" type="checkbox" id="rememberMe" checked>
                                <label class="form-check-label mb-0 ms-3" for="rememberMe">Selau ingat aku</label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Masuk</button>
                            </div>
                            <div class="text-center">
                                <a class="mt-4 text-sm text-center" href="<?= base_url(); ?>auth/registration">
                                    Belum punya akun?
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>