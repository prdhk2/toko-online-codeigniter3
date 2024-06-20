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
                    <form action="<?= base_url('admin/banner/update/' . $banner->id) ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="image">Banner Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                            <img src="<?= base_url('./images/banner/' . $banner->image) ?>" width="100" class="mt-2">
                        </div>
                        <div class="form-group">
                            <label for="is_active">Active</label>
                            <input type="checkbox" id="is_active" name="is_active" value="yes" <?= $banner->is_active === 'yes' ? 'checked' : '' ?>>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Update Banner</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>