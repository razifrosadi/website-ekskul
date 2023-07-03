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

    <!-- -------- START Features w/ icons and text on left & gradient title and text on right -------- -->
    <section class="py-sm-7 py-5 position-relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 my-auto">
                    <h3 class="mt-5 mt-lg-0">Sejarah Singkat SMAN 1 CISAAT</h3>
                    <p class="pe-5">SMA Negeri 1 Cisaat mulai berdiri tanggal 16 Juli 1979. Pada awal berdirinya proses belajar mengajar dilaksanakan di SMP Negeri Cisaat. Pada tanggal 10 Juni 1981 gedung SMA Negeri 1 Cisaat diresmikan oleh Menteri Pendidikan dan Kebudayaan Dr.Daud Yusuf, berlokasi di Jl. Veteran Km.3 Desa Cibolang Kecamatan Cisaat.
                        Seiring dengan adanya pemekaran wilayah di Kecamatan Cisaat, Kabupaten Sukabumi sejak tahun 2000 SMA Negeri 1 Cisaat termasuk ke dalam wilayah Kecamanatan Gunung Guruh Kabupaten Sukabumi. Namun nama sekolah tetap SMA Negeri 1 Cisaat</p>
                    <a href="javascript:;" class="text-primary icon-move-right">More about us
                        <i class="fas fa-arrow-right text-sm ms-1"></i>
                    </a>
                </div>
                <div class="col-lg-6 mt-lg-0 mt-5 ps-lg-0 ps-0">
                    <div class="p-3 info-horizontal">
                        <div class="icon icon-shape  bg-gradient-primary shadow-primary text-center">
                            <i class="fas fa-ship opacity-10"></i>
                        </div>
                        <div class="description ps-3">
                            <p class="mb-0">Pengembangan Skill Dan Karakter<br>Pengembangan soft skills dan karakter melalui projek penguatan pancasila.</p>
                        </div>
                    </div>

                    <div class="p-3 info-horizontal">
                        <div class="icon icon-shape  bg-gradient-primary shadow-primary text-center">
                            <i class="fas fa-handshake opacity-10"></i>
                        </div>
                        <div class="description ps-3">
                            <p class="mb-0">Fokus Pada Materi Esensial<br>Fokus pada materi esensial, relevan, dan mendalam sehingga ada waktu cukup untuk membangun kreatifitas dan inovasi peserta didik dalam mencapai kompetensi dasar seperti numerasi dan literasi</p>
                        </div>
                    </div>
                    <div class="p-3 info-horizontal">
                        <div class="icon icon-shape  bg-gradient-primary shadow-primary text-center">
                            <i class="fas fa-hourglass opacity-10"></i>
                        </div>
                        <div class="description ps-3">
                            <p class="mb-0">Pembelajaran Yang Fleksibel<br> Keleluasan bagi guru untuk melakukan pembelajaran yang sesuai dengan tahap capaian dan perkembangan masing-masing peserta didik dan melakukan penyusaian dengan konteks dan muatan lokal.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- -------- END Features w/ icons and text on left & gradient title and text on right -------- -->


    <!-- START Blogs w/ 4 cards w/ image & text & link -->
    <section class="py-sm-7 py-5 position-relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="mb-5">Ada berita apa hari ini?</h3>
                </div>
            </div>
            <div class="row">
                <?php foreach ($berita as $b) : ?>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card card-plain">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <a class="d-block blur-shadow-image">
                                    <img src="<?= base_url('assets/img/logo_ekskul/') . $b['image_berita']; ?>" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg">
                                </a>
                                <div class="colored-shadow" style="background-image: url(&quot;https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/products/product-1-min.jpg&quot;);"></div>
                            </div>
                            <div class="card-body px-0">
                                <h5>
                                    <a href="javascript:;" class="text-dark font-weight-bold"><?= $b['judul_berita']; ?></a>
                                </h5>
                                <p>
                                    <?= $b['deskripsi_berita']; ?>
                                </p>
                                <a href="javascript:;" class="text-primary icon-move-right">Read More
                                    <i class="fas fa-arrow-right text-xs ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>



    <!-- END Blogs w/ 4 cards w/ image & text & link -->

    <!-- profil ekskul -->


    <section class="py-5">
        <div class="container">
            <div class="row">
                <?php foreach ($kategori as $k) : ?>
                    <div class="col-lg-4 col-md-6 my-4">
                        <div class="card">
                            <!-- Konten card -->
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <a class="d-block blur-shadow-image">
                                    <img src="https://images.unsplash.com/photo-1544717302-de2939b7ef71?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" alt="img-colored-shadow" class="img-fluid border-radius-lg">
                                </a>
                            </div>
                            <div class="card-body text-center">
                                <h5 class="font-weight-normal">
                                    <a href="javascript:;">Ekstrakurikuler <?= $k['nama_kategori']; ?></a>
                                </h5>
                                <p class="mb-0">
                                    Website visitors today demand a frictionless user expericence — especially when using search. Because of the hight standards.
                                </p>
                                <div class="d-flex justify-content-end align-items-center">
                                    <a href="javascript:;" class="text-primary icon-move-right">Let's start
                                        <i class="fas fa-arrow-right text-xs ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>


            </div>
        </div>
    </section>



    <!-- -------- START Features w/ pattern background & stats & rocket -------- -->
    <section class="pb-5 position-relative bg-gradient-primary mx-n3">
        <div class="container">
            <div class="row">
                <div class="col-md-8 text-start mb-5 mt-5">
                    <h3 class="text-white z-index-1 position-relative">Pelatih Ekstrakurikuler</h3>
                    <p class="text-white opacity-8 mb-0">There’s nothing I really wanted to do in life that I wasn’t able to get good at. That’s my skill.</p>
                </div>
            </div>
            <div class="row">
                <?php foreach ($pelatih as $p) : ?>
                    <div class="col-lg-6 col-12">
                        <div class="card card-profile mt-4">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-12 mt-n5">
                                    <a href="javascript:;">

                                        <div class="blur-shadow-avatar" style="margin-left: 20px; margin-top: 20px;">
                                            <img class="avatar avatar-xxl shadow-lg" src="<?= base_url('assets/img/logo_ekskul/') . $p['image_pelatih'] ?>">
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-8 col-md-6 col-12 my-auto">
                                    <div class="card-body ps-lg-0">
                                        <h5 class="mb-0"><?= $p['nama_pelatih']; ?></h5>
                                        <h6 class="text-primary"><?= $p['nama_ekskul']; ?></h6>
                                        <p class="mb-0"><?= $p['deskripsi_pelatih']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- -------- END Features w/ pattern background & stats & rocket -------- -->

    <!-- -------- START HEADER 8 w/ card over right bg image ------- -->
    <section>
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
                                <form id="contact-form" method="post" autocomplete="off">
                                    <div class="card-body p-0 my-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group input-group-static mb-4">
                                                    <input type="email" class="form-control" placeholder="Full Name">
                                                </div>
                                            </div>
                                            <div class="col-md-6 ps-md-2">
                                                <div class="input-group input-group-static mb-4">
                                                    <input type="email" class="form-control" placeholder="hello@creative-tim.com">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6 ps-md-2">
                                                <select class="form-control" name="kategori_ekskul_id" id="kategori_ekskul_id">
                                                    <option value="">Kelas</option>
                                                    <option value=""></option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6 ps-md-2">
                                                <select class="form-control" name="kategori_ekskul_id" id="kategori_ekskul_id">
                                                    <option value="">Ekskul</option>
                                                    <option value=""></option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-group mb-0 mt-md-0 mt-4">
                                            <div class="input-group input-group-static mb-4">
                                                <textarea name="message" class="form-control" id="message" rows="6" placeholder="Jelaskan alasan kamu, kenapa mau bergabung ekstrakurikuler tersebut! maksimal 250 karakter"></textarea>
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
    </section>
    <!-- -------- END HEADER 8 w/ card over right bg image ------- -->
</div>