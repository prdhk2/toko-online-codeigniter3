<div class="page-wrapper">
    <div class="row">
        <div class="col-12 mx-auto">
            <?php $this->load->view('layouts/frontend/_alert') ?>
        </div>
    </div>

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Banner Setting</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?= $breadcum; ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card mx-auto">
                <div class="card-body">
                    <div class="col-2 mb-3">
                        <a href="<?= base_url('admin/banner/add') ?>" class="btn btn-primary">Add Banner</a>
                    </div>
                    <table class="table">
                        <caption>List of Banner Store</caption>
                        <thead>
                            <tr class="header-table">
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Upload Date</th>
                                <th scope="col">Active</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($banner as $index => $row) : ?>
                            <tr>
                                <th scope="row"><?= $index + 1 ?></th>
                                <td><img src="<?= base_url('./images/banner/' . $row->image) ?>" width="100"></td>
                                <td><?= $row->uploaded_at ?></td>
                                <td><?= $row->is_active ?></td>
                                <td>
                                    <a href="<?= base_url('admin/banner/edit/' . $row->id) ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i> Edit</a>
                                    <a href="<?= base_url('admin/banner/delete/' . $row->id) ?>" class="btn btn-primary" onclick="return confirm('Are you sure you want to delete this banner?');"><i class="fas fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>