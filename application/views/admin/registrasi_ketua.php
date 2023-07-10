<div class="container-fluid py-4">
    <p class="h4"><?= $title; ?></p>

    <?= $this->session->flashdata('message') ?>

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <p class="mt-2" style="margin-bottom: -1px;">Pilih Ekskul</p>

            <form action="registrasi_ketua" method="POST">
                <select class="form-select <?php echo form_error('ekskul') ? 'is-invalid' : ''; ?>" name="ekskul">
                    <option value="" selected>--Pilih Ekskul--</option>
                    <?php foreach ($ekskul as $e) : ?>
                        <option value="<?= $e['ekskul_id'] ?>"><?= $e['nama_ekskul'] ?></option>
                    <?php endforeach; ?>
                </select>

                <p class="mt-2" style="margin-bottom: -1px;">Pilih Ketua</p>
                <select class="form-select <?php echo form_error('ketua') ? 'is-invalid' : ''; ?>" name="ketua">
                    <option value="" selected>--Pilih Siswa--</option>
                    <?php foreach ($userAll as $u) : ?>
                        <option value="<?= $u['id'] ?>"><?= $u['name'] ?></option>
                    <?php endforeach; ?>
                </select>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary mt-3" type="button">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>