<div class="page-wrapper">
    <div class="row">
        <div class="col-12 mx-auto">
            <?php $this->load->view('layouts/frontend/_alert') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title" style="color: #2a5bd7;">Add Product</h4>
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
    <div class="row">
        <div class="col-12">
            <div class="card mx-auto border-0 shadow-sm" style="border-radius: 5px; overflow: hidden;">
                <div class="card-header py-3" style="background: linear-gradient(135deg, #5c90ff 0%, #2a5bd7 100%); border-radius: 5px 5px 0 0; overflow: hidden;">
                    <h5 class="mb-0 text-white"><i class="fas fa-plus-circle me-2"></i> Product Information</h5>
                </div>
                <div class="card-body" style="background-color: #f8faff;">
                    <form action="<?= base_url('product/store') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-row d-flex">
                            <div class="form-group col-md-6 m-1">
                                <label for="productName" class="form-label fw-bold" style="color: #3e4b5b;">Product Name</label>
                                <input type="text" class="form-control form-control-lg" id="productName" name="productName" placeholder="Enter product name" required 
                                       style="border-radius: 10px; border: 2px solid #e0e8ff;">
                            </div>
                            <div class="form-group col-md-6 m-1">
                                <label for="slug" class="form-label fw-bold" style="color: #3e4b5b;">Slug</label>
                                <input type="text" class="form-control form-control-lg" id="productSlug" name="slug" placeholder="product-slug" required 
                                       style="border-radius: 10px; border: 2px solid #e0e8ff;">
                            </div>
                        </div>
                        <div class="form-group col-12 m-1">
                            <label for="description" class="form-label fw-bold" style="color: #3e4b5b;">Description</label>
                            <textarea class="form-control form-control-lg" id="description" name="description" rows="4" placeholder="Product description..." required 
                                      style="border-radius: 10px; border: 2px solid #e0e8ff; resize: none;"></textarea>
                        </div>
                        <div class="form-row d-flex">
                            <div class="form-group col-md-6 m-1">
                                <label for="price" class="form-label fw-bold" style="color: #3e4b5b;">Price</label>
                                <div class="input-group">
                                    <span class="input-group-text" style="background-color: #e0e8ff; border: 2px solid #e0e8ff;">Rp</span>
                                    <input type="number" class="form-control form-control-lg" id="price" name="price" placeholder="0" required 
                                           style="border-radius: 0 10px 10px 0; border: 2px solid #e0e8ff;">
                                </div>
                            </div>
                            <div class="form-group col-md-6 m-1">
                                <label for="category" class="form-label fw-bold" style="color: #3e4b5b;">Category</label>
                                <select id="category" name="idCategory" class="form-select form-control-lg" required 
                                        style="border-radius: 10px; border: 2px solid #e0e8ff;">
                                    <option value="" selected disabled>Choose category</option>
                                    <?php foreach ($category as $category): ?>
                                        <option value="<?= $category->id ?>"><?= $category->title ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group m-1">
                            <label for="image" class="form-label fw-bold" style="color: #3e4b5b;">Product Image</label>
                            <div class="file-upload-wrapper">
                                <input type="file" class="form-control form-control-lg" id="image" name="image" required 
                                       style="border-radius: 10px; border: 2px dashed #5c90ff; padding: 15px; background-color: rgba(92, 144, 255, 0.05);"
                                       onchange="previewImage(this)">
                                <small class="text-muted d-block mt-1"><i class="fas fa-info-circle me-1" style="color: #ff6b6b;"></i> JPEG, PNG, JPG (Max 2MB)</small>
                                <div id="imagePreview" class="mt-3 text-center" style="display: none;">
                                    <img id="preview" src="#" alt="Preview" style="max-width: 200px; max-height: 200px; border-radius: 10px; border: 2px solid #e0e8ff;"/>
                                </div>
                            </div>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <button type="reset" class="btn btn-lg me-md-2" style="color:rgb(244, 61, 94) !important; background-color: #f8f9fa; border: 2px solid #5c90ff; border-radius: 10px;">
                                <i class="fas fa-undo me-1"></i> Reset
                            </button>
                            <button type="submit" class="btn btn-lg text-white" style="background: linear-gradient(135deg, #5c90ff 0%, #2a5bd7 100%); border-radius: 10px; border: none;">
                                <i class="fas fa-plus-circle me-1"></i> Add Product
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
    .page-breadcrumb {
        background-color: #f8faff;
        padding: 15px 0;
        margin-bottom: 25px;
        border-radius: 10px;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: #5c90ff !important;
        box-shadow: 0 0 0 0.25rem rgba(92, 144, 255, 0.25);
    }
    
    .file-upload-wrapper {
        position: relative;
    }
    
    .file-upload-wrapper:hover {
        cursor: pointer;
    }
    
    .card {
        transition: all 0.3s ease;
    }
    
    .card:hover {
        box-shadow: 0 10px 20px rgba(92, 144, 255, 0.15);
    }
</style>

<script>
    // Image preview function
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').style.display = 'block';
                document.getElementById('preview').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    // Auto generate slug from product name
    document.getElementById('productName').addEventListener('input', function() {
        const slug = this.value.toLowerCase()
            .replace(/ /g, '-')
            .replace(/[^\w-]+/g, '');
        document.getElementById('productSlug').value = slug;
    });
</script>