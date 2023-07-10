<div class="container-fluid py-4">
    <p class="h4"><?= $title; ?></p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pengguna</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Tanggal gabung</th>
                            <th>Status</th>
                            <th>gambar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_user as $users) :
                        ?>
                            <tr>
                                <td><?= $users['name']; ?></td>
                                <td><?= $users['email']; ?></td>
                                <td><?= date('d F Y', $users['date_created']); ?></td>

                                <td><?= $users['role']; ?></td>

                                <td><?= $users['image']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>