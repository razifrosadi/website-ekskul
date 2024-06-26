<header class="header-2">
    <div class="page-header min-vh-75 relative" style="background-image: url('<?= base_url('assets/'); ?>img/curved-images/curved0.jpg')">
        <span class="mask bg-gradient-primary opacity-4"></span>
        <div class="container">
            <div class="row">
                <div class="col-lg-7 text-center mx-auto">
                    <h1 class="text-white pt-3 mt-n5">Website Ekstrakurikuler</h1>
                    <p class="lead text-white mt-3">SMA NEGERI 1 CISAAT</p>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="card card-body shadow-xl mx-3 mx-md-4 mt-n6">
    <section class="py-5">
        <div class="container">
            <div class="row">
                <?php $count = 0; ?>
                <?php foreach ($kategori as $k) : ?>
                    <?php foreach ($ekskul as $e) : ?>
                        <?php if ($e['kategori_ekskul_id'] == $k['id_kategori']) { ?>
                            <div class="col-12 col-md-6 col-lg-4 mb-4">
                                <div class="card" style="height: 100%;">
                                    <div class="card-body text-center">
                                        <a class="d-block blur-shadow-image" style="height: 200px; overflow: hidden;">
                                            <img src="<?= base_url('assets/img/logo_ekskul/') . $e['logo_ekskul'] ?>" alt="img-colored-shadow" class="img-fluid border-radius-lg" style="object-fit: contain; width: 100%; height: 100%;">
                                        </a>
                                        <h5 class="font-weight-normal mt-3">
                                            <?= $e['nama_ekskul']; ?>
                                        </h5>

                                        <a href="<?= base_url('landingpage/deskripsi_ekskul/') . $e['ekskul_id'] ?>" class="text-primary icon-move-right">Baca selengkapnya
                                            <i class="fas fa-arrow-right text-sm ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php $count++; ?>
                        <?php } ?>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>