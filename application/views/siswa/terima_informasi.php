<div class="container-fluid py-4">
    <p class="h4"><?= $title; ?></p>
    <div class="row mt-4">
        <?php foreach ($informasi as $in) : ?>
            <div class="col-lg-5">
                <div class="card h-100 p-3">
                    <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: url('<?= base_url('assets/img/logo_ekskul/') . $in['image_informasi'] ?>');">
                        <span class="mask bg-gradient-dark"></span>
                        <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                            <h5 class="text-white font-weight-bolder mb-4 pt-2"><?= $in['judul_informasi']; ?></h5>
                            <p class="text-white"><?= $in['deskripsi_informasi']; ?></p>
                            <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="<?= base_url('siswa/detail_informasi/' . $in['id_informasi']) ?>">
                                Read More
                                <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>