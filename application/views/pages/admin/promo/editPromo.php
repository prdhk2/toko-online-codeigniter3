<div class="page-wrapper">
    <div class="row">
        <div class="col-12 mx-auto">
            <?php $this->load->view('layouts/frontend/_alert') ?>
        </div>
    </div>

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Edit Promo</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Promo</li>
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
                    <form action="<?= base_url('admin/promo/update/' . $promo->id) ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?= $promo->title ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="5" required><?= $promo->description ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                            <img src="<?= base_url('images/promo/' . $promo->image) ?>" width="100" class="mt-3">
                        </div>
                        <div class="form-group">
                            <label for="discount">Discount</label>
                            <input type="number" class="form-control" id="discount" name="discount" step="0.01" value="<?= $promo->discount ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" value="<?= $promo->start_date ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="end_date">End Date</label>
                            <input type="date" class="form-control" id="end_date" name="end_date" value="<?= $promo->end_date ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="is_active">Active</label>
                            <input type="checkbox" id="is_active" name="is_active" value="yes" <?= $promo->is_active === 'yes' ? 'checked' : '' ?>>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select class="form-control" id="category_id" name="category_id" required>
                                <!-- Populate categories dynamically -->
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?= $category->id ?>" <?= $promo->category_id == $category->id ? 'selected' : '' ?>><?= $category->title ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Update Promo</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
