<div class="container-fluid py-4">
    <p class="h4"><?= $title; ?></p>
    <?php if (validation_errors()) : ?>
        <div class="alert alert-danger text-white font-weight-bold" role="alert">
            <?= validation_errors(); ?>
        </div>
    <?php endif; ?>

    <button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#newSubMenuModal">Add New Submenu</button>
    <div class="card">
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Title</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Menu</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Url</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Icon</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Active</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($subMenu as $sm) : ?>
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-xs"><?= $i; ?></h6>
                                        <p class="text-xs text-secondary mb-0">
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0"><?= $sm['title']; ?></p>
                                <p class="text-xs text-secondary mb-0">
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0"><?= $sm['menu']; ?></p>
                                <p class="text-xs text-secondary mb-0">
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0"><?= $sm['url']; ?></p>
                                <p class="text-xs text-secondary mb-0">
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">
                                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <?= $sm['icon']; ?>
                                </div>
                                </p>
                                <p class="text-xs text-secondary mb-0">
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0"><?= $sm['is_active']; ?></p>
                                <p class="text-xs text-secondary mb-0">
                            </td>
                            <td class="align-middle text-center text-sm">
                                <span class="badge badge-sm badge-success">
                                    <a href="" class="badge bg-gradient-success">edit</a>
                                    <a href="" class="badge bg-gradient-danger">delete</a>
                                </span>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Add New Menu</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/submenu'); ?>" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group">
                            <input type="text" class="form-control" id="title" name="title" placeholder="Submenu title">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="menu_id" id="menu_id">
                                <option value="">Select Menu</option>
                                <?php foreach ($menu as $m) : ?>
                                    <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon">
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked="is_active">
                                <label class="custom-control-label" for="is_active">Active?</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-gradient-primary">Save Change</button>
                </div>
            </form>
        </div>
    </div>
</div>