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
                    <i class="fas fa-tags me-2"></i> Category List
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
                        <h5 class="mb-0 text-white"><i class="fas fa-list-ul me-2"></i> All Categories</h5>
                        <a href="<?= base_url('admin/category/add') ?>" class="btn btn-light btn-sm" style="color: black !important">
                            <i class="fas fa-plus-circle me-1"></i> Add New
                        </a>
                    </div>
                </div>
                <div class="card-body" style="background-color: #f8faff;">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle" style="border-radius: 10px; overflow: hidden;">
                            <thead class="text-white">
                                <tr>
                                    <th scope="col" style="width: 50px;">#</th>
                                    <th scope="col">Category</th>
                                    <th scope="col" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($category as $index => $row): ?>
                                <tr style="border-bottom: 1px solid #e0e8ff;">
                                    <th scope="row" class="fw-bold" style="color: #3e4b5b;"><?= $index + 1 ?></th>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="category-icon me-3" style="width: 60px; height: 60px; background-color: #e0e8ff; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                                <i class="fas fa-tag" style="font-size: 24px; color: #2a5bd7;"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-0 fw-bold" style="color: #2a5bd7;"><?= $row->title ?></h6>
                                                <small class="text-muted">Slug: <?= $row->slug ?></small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2 justify-content-center">
                                            <a href="<?= base_url('admin/category/edit/' . $row->id); ?>" 
                                               class="btn btn-sm btn-action btn-warning" 
                                               data-bs-toggle="tooltip" 
                                               title="Edit Category">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a href="<?= base_url('admin/category/delete/' . $row->id); ?>" 
                                               class="btn btn-sm btn-action btn-danger" 
                                               onclick="return confirm('Are you sure you want to delete this category?');"
                                               data-bs-toggle="tooltip" 
                                               title="Delete Category">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
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
        /* background: linear-gradient(135deg, #5c90ff 0%, #2a5bd7 100%); */
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
    
    .card-footer {
        border-top: 1px solid #e0e8ff;
    }
    
    .category-icon {
        transition: all 0.3s ease;
    }
    
    tr:hover .category-icon {
        background-color: #d0dfff;
        transform: scale(1.05);
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