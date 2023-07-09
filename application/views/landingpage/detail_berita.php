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
                <?php foreach ($berita as $b) : ?>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card card-plain">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <a class="d-block blur-shadow-image">
                                    <img src="<?= base_url('assets/img/gambar_berita/') . $b['image_berita']; ?>" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg">
                                </a>
                                <div class="colored-shadow" style="background-image: url(&quot;https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/products/product-1-min.jpg&quot;);"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card card-plain">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <?php if (isset($b['image_berita2']) && $b['image_berita2'] != '') : ?>
                                    <a class="d-block blur-shadow-image">
                                        <img src="<?= base_url('assets/img/gambar_berita/') . $b['image_berita2']; ?>" class="img-fluid shadow border-radius-lg">
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6">
                        <h5>
                            <a href="javascript:;" class="text-dark font-weight-bold"><?= $b['judul_berita']; ?></a>
                        </h5>
                        <h6>
                            <a href="javascript:;" class="text-dark font-weight-bold"><?= $b['tanggal_berita']; ?></a>
                        </h6>
                        <p>
                            <?= $b['deskripsi_berita']; ?>
                        </p>
                        <h7>
                            <?= $b['keterangan_berita']; ?>
                        </h7>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>