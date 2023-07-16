<div class="container-fluid py-4">
    <p class="h4"><?= $title; ?></p>
    <div class="row mt-4">
        <?php foreach ($getinformasi as $if) : ?>
            <div class="col-md-6">
                <div class="card card-profile card-plain">
                    <div class="row">
                        <div class="col-lg-5">
                            <a href="javascript:;">
                                <div class="position-relative">
                                    <div class="blur-shadow-image">
                                        <img class="w-100 rounded-3 shadow-lg" src="<?= base_url('assets/img/logo_ekskul/') . $if['image_informasi'] ?>">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-7 ps-0 my-auto">
                            <div class="card-body text-left">
                                <div class="p-md-0 pt-3">
                                    <h5 class="font-weight-bolder mb-0"><?= $if['judul_informasi']; ?></h5>
                                    <p class="text-uppercase text-sm font-weight-bold mb-2"><?= $if['tanggal_informasi']; ?></p>
                                </div>
                                <p class="mb-4"><?= $if['deskripsi_informasi']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>