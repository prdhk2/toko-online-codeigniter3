<div class="page-wrapper">
    <div class="row">
        <div class="col-12 mx-auto">
            <?php $this->load->view('layouts/frontend/_alert') ?>
        </div>
    </div>

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Add Category</h4>
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
                    <form action="<?= base_url('category/store') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-row d-flex">
                            <div class="form-group col-md-6 m-1">
                                <label for="categoryName">Category Name</label>
                                <input type="text" class="form-control" id="categoryName" name="categoryName" placeholder="Category Name" required>
                            </div>
                            <div class="form-group col-md-6 m-1">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control" id="categorySlug" name="slug" placeholder="Slug" required>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary mt-3">Add Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>