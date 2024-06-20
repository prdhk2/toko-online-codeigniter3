<div class="page-wrapper">
    <div class="row">
        <div class="col-12 mx-auto">
            <?php $this->load->view('layouts/frontend/_alert') ?>
        </div>
    </div>

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Promo List</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Promo List</li>
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
                        x<a href="<?= base_url('admin/promo/add') ?>" class="btn btn-primary">Add Promo</a>
                    </div>
                    
                    <table class="table">
                        <caption>List of Promos</caption>
                        <thead>
                            <tr class="header-table">
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Image</th>
                                <th scope="col">Discount</th>
                                <th scope="col">Start Date</th>
                                <th scope="col">End Date</th>
                                <th scope="col">Active</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($promos as $index => $promo) : ?>
                            <tr>
                                <th scope="row"><?= $index + 1 ?></th>
                                <td><?= $promo->title ?></td>
                                <td><?= substr($promo->description, 0, 50) . '...' ?></td>
                                <td><img src="<?= base_url('images/promo/' . $promo->image) ?>" width="100"></td>
                                <td><?= $promo->discount ?>%</td>
                                <td><?= $promo->start_date ?></td>
                                <td><?= $promo->end_date ?></td>
                                <td><?= $promo->is_active ?></td>
                                <td>
                                    <a href="<?= base_url('admin/promo/edit/' . $promo->id) ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i> Edit</a>
                                    <a href="<?= base_url('admin/promo/delete/' . $promo->id) ?>" class="btn btn-primary" onclick="return confirm('Are you sure you want to delete this promo?');"><i class="fas fa-trash"></i> Delete</a>
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
