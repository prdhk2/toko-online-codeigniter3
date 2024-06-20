<div class="page-wrapper">
    <div class="row">
        <div class="col-12 mx-auto">
            <?php $this->load->view('layouts/frontend/_alert') ?>
        </div>
    </div>

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">List Category</h4>
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
                    <table class="table">
                        <caption>List of Categories</caption>
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($category as $category): ?>
                            <tr>
                            <td scope="row"><?= $category->id; ?></th>
                            <td><?= $category->title; ?></td>
                            <td>
                                <a href="<?= base_url('admin/category/edit/' . $category->id); ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i> Edit</a>
                                <a href="<?= base_url('admin/category/delete/' . $category->id); ?>" class="btn btn-primary" onclick="return confirm('Are you sure you want to delete this category?');">
                                    <i class="fas fa-trash"></i> Delete
                                </a>
                            </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>