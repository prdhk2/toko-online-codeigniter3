<div class="page-wrapper">
    <div class="row">
        <div class="col-12 mx-auto">
            <?php $this->load->view('layouts/frontend/_alert') ?>
        </div>
    </div>

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Edit Product</h4>
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
                    <form action="<?= base_url('admin/product/update/' . $content->id) ?>" method="post" enctype="multipart/form-data">
                        <div class="form-row d-flex">
                            <div class="form-group col-md-6 m-1">
                                <label for="productName">Product Name</label>
                                <input type="text" class="form-control" id="productName" name="productName" placeholder="Product Name" value="<?= $content->title ?>" required>
                            </div>
                            <div class="form-group col-md-6 m-1">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control" id="productSlug" name="slug" value="<?= $content->slug ?>" placeholder="Slug" required>
                            </div>
                        </div>
                        <div class="form-group col-12 m-1">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Product Description" required><?= $content->description ?></textarea>
                        </div>
                        <div class="form-row d-flex">
                            <div class="form-group col-md-6 m-1">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" id="price" name="price" placeholder="Price" value="<?= $content->price ?>" required>
                            </div>
                            <div class="form-group col-md-6 m-1">
                                <label for="category">Category</label>
                                <select id="category" name="idCategory" class="form-control" required>
                                    <option value="" selected disabled>Choose category</option>
                                    <?php foreach ($category as $cat): ?>
                                        <option value="<?= $cat->id ?>" <?= $cat->id == $content->id_category ? 'selected' : '' ?>><?= $cat->title ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group m-1">
                            <label for="image">Product Image</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Update Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
