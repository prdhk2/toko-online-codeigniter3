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
                    <i class="fas fa-boxes me-2"></i> Product List
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
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 text-white"><i class="fas fa-list-ul me-2"></i> All Products</h5>
                        <a href="<?= base_url('admin/product/add') ?>" class="btn btn-light btn-sm" style="color: black !important">
                            <i class="fas fa-plus-circle me-1"></i> Add New
                        </a>
                    </div>
                </div>
                <div class="card-body" style="background-color: #f8faff;">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle" style="border-radius: 10px; overflow: hidden;">
                            <thead class="text-white" style="">
                                <tr>
                                    <th scope="col" style="width: 50px;">#</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Description</th>
                                    <th scope="col" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($content as $index => $row) : ?>
                                <tr style="border-bottom: 1px solid #e0e8ff;">
                                    <th scope="row" class="fw-bold" style="color: #3e4b5b;"><?= $index + 1 ?></th>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="<?= base_url('./images/product/' . $row->image) ?>" 
                                                 alt="<?= $row->title ?>" 
                                                 class="rounded me-3" 
                                                 width="60" 
                                                 height="60" 
                                                 style="object-fit: cover; border: 2px solid #e0e8ff;">
                                            <div>
                                                <h6 class="mb-0 fw-bold" style="color: #2a5bd7;"><?= $row->title ?></h6>
                                                <small class="text-muted"><?= $row->slug ?></small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="fw-bold" style="color: #ff6b6b;">
                                        Rp<?= number_format($row->price, 0, ',', '.') ?>
                                    </td>
                                    <td>
                                        <div class="product-description">
                                            <?php 
                                            $description = trim_text($row->description, 15);
                                            echo $description;
                                            if (str_word_count($row->description) > 15) {
                                                echo ' <a href="' . base_url('product/detail/' . $row->id) . '" class="text-primary">Read More</a>';
                                            }
                                            ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2 justify-content-center">
                                            <a href="<?= base_url('product/detail/' . $row->id); ?>" 
                                               class="btn btn-sm btn-action btn-info" 
                                               data-bs-toggle="tooltip" 
                                               title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="<?= base_url('admin/product/edit/' . $row->id); ?>" 
                                               class="btn btn-sm btn-action btn-warning" 
                                               data-bs-toggle="tooltip" 
                                               title="Edit Product">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a href="<?= base_url('admin/product/delete/' . $row->id); ?>" 
                                               class="btn btn-sm btn-action btn-danger" 
                                               onclick="return confirm('Are you sure you want to delete this product?');"
                                               data-bs-toggle="tooltip" 
                                               title="Delete Product">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-white py-3">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center mb-0">
                            <!-- Pagination links would go here -->
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Custom Styles */
    .table {
        border-collapse: separate;
        border-spacing: 0;
    }
    
    .table thead th {
        border: none;
        padding: 15px;
        font-weight: 600;
    }
    
    .table tbody td {
        padding: 15px;
        vertical-align: middle;
        background-color: white;
    }
    
    .table tbody tr:hover td {
        background-color: rgba(92, 144, 255, 0.05);
    }
    
    .btn-action {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }
    
    .btn-action:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }
    
    .product-description {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    
    .card-footer {
        border-top: 1px solid #e0e8ff;
    }
</style>

<script>
    // Initialize tooltips
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>