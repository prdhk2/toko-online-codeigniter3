<div class="page-wrapper">
    <div class="row">
        <div class="col-12 mx-auto">
            <?php $this->load->view('layouts/frontend/_alert') ?>
        </div>
    </div>

    <div class="page-breadcrumb mb-4">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title" style="color: #2a5bd7; font-weight: 600;">
                    <i class="fas fa-edit me-2"></i> Edit Category
                </h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" style="color: #5c90ff;">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page" style="color: #ff6b6b;"><?= $breadcum; ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm" style="border-radius: 15px; overflow: hidden;">
                <div class="card-header py-3" style="background: linear-gradient(135deg, #5c90ff 0%, #2a5bd7 100%);">
                    <h5 class="mb-0 text-white"><i class="fas fa-tag me-2"></i> Category Details</h5>
                </div>
                <div class="card-body" style="background-color: #f8faff;">
                    <form action="<?= base_url('admin/category/update/' . $content->id) ?>" method="post">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="categoryName" class="form-label fw-bold" style="color: #3e4b5b;">
                                        <i class="fas fa-tag me-1"></i> Category Name
                                    </label>
                                    <input type="text" 
                                           class="form-control form-control-lg" 
                                           id="categoryName" 
                                           name="categoryName" 
                                           placeholder="Enter category name" 
                                           value="<?= htmlspecialchars($content->title) ?>" 
                                           required
                                           style="border-radius: 10px; border: 2px solid #e0e8ff;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="slug" class="form-label fw-bold" style="color: #3e4b5b;">
                                        <i class="fas fa-link me-1"></i> Slug
                                    </label>
                                    <input type="text" 
                                           class="form-control form-control-lg" 
                                           id="categorySlug" 
                                           name="slug" 
                                           placeholder="category-slug" 
                                           value="<?= htmlspecialchars($content->slug) ?>" 
                                           required
                                           style="border-radius: 10px; border: 2px solid #e0e8ff;">
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <a href="<?= base_url('admin/category/index') ?>" class="btn btn-lg me-md-2" style="background-color: #f8f9fa; color:rgb(244, 61, 94) !important; border: 2px solid #5c90ff; border-radius: 10px;">
                                <i class="fas fa-arrow-left me-1"></i> Cancel
                            </a>
                            <button type="submit" class="btn btn-lg text-white" style="background: linear-gradient(135deg, #5c90ff 0%, #2a5bd7 100%); border-radius: 10px; border: none;">
                                <i class="fas fa-save me-1"></i> Update Category
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Custom Styles */
    .form-control:focus, .form-select:focus {
        border-color: #5c90ff !important;
        box-shadow: 0 0 0 0.25rem rgba(92, 144, 255, 0.25);
    }
    
    .card {
        transition: all 0.3s ease;
    }
    
    .card:hover {
        box-shadow: 0 10px 20px rgba(92, 144, 255, 0.15);
    }
    
    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
</style>

<script>
    // Auto generate slug from category name
    document.getElementById('categoryName').addEventListener('input', function() {
        const slug = this.value.toLowerCase()
            .replace(/ /g, '-')
            .replace(/[^\w-]+/g, '');
        document.getElementById('categorySlug').value = slug;
    });
</script>