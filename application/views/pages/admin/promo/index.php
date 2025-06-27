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
                    <i class="fas fa-tags me-2"></i> Promo List
                </h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" style="color: #5c90ff;">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page" style="color: #ff6b6b;">Promo Management</li>
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
                        <h5 class="mb-0 text-white"><i class="fas fa-percentage me-2"></i> Active Promotions</h5>
                        <a href="<?= base_url('admin/promo/add') ?>" class="btn btn-light btn-sm button-text">
                            <i class="fas fa-plus me-1"></i> Add New
                        </a>
                    </div>
                </div>
                <div class="card-body" style="background-color: #f8faff;">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle" style="border-radius: 10px; overflow: hidden;">
                            <thead class="text-white">
                                <tr>
                                    <th scope="col" style="width: 50px;">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Image</th>
                                    <th scope="col" class="text-center">Discount</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">End Date</th>
                                    <th scope="col" class="text-center">Status</th>
                                    <th scope="col" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($promos as $index => $promo): ?>
                                <tr style="border-bottom: 1px solid #e0e8ff;">
                                    <th scope="row"><?= $index + 1 ?></th>
                                    <td class="fw-bold text-primary"><?= $promo->title ?></td>
                                    <td><?= substr($promo->description, 0, 50) . '...' ?></td>
                                    <td>
                                        <img src="<?= base_url('images/promo/' . $promo->image) ?>" 
                                            alt="<?= $promo->title ?>" 
                                            width="60" height="60" class="rounded"
                                            style="object-fit: cover; border: 2px solid #e0e8ff;">
                                    </td>
                                    <td class="text-center text-success fw-bold"><?= $promo->discount ?>%</td>
                                    <td><?= date('d M Y', strtotime($promo->start_date)) ?></td>
                                    <td><?= date('d M Y', strtotime($promo->end_date)) ?></td>
                                    <td class="text-center">
                                        <span class="badge bg-<?= $promo->is_active ? 'success' : 'secondary' ?>">
                                            <?= $promo->is_active ? 'Active' : 'Inactive' ?>
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?= base_url('admin/promo/edit/' . $promo->id) ?>" 
                                        class="btn btn-sm btn-warning" title="Edit">
                                        <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="<?= base_url('admin/promo/delete/' . $promo->id) ?>" 
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this promo?')"
                                        title="Delete">
                                        <i class="fas fa-trash-alt"></i>
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
</div>

<style>
    .button-text {
        color: black !important;
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
    
    .table tbody td {
        vertical-align: middle;
        background-color: white;
    }
    
    .table tbody tr:hover td {
        background-color: rgba(92, 144, 255, 0.05);
    }
    
    .badge {
        padding: 8px 12px;
        font-weight: 500;
        border-radius: 8px;
        min-width: 80px;
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