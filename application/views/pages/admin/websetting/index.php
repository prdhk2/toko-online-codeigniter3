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
                    <i class="fas fa-images me-2"></i> Banner Settings
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
                        <h5 class="mb-0 text-white"><i class="fas fa-list-ul me-2"></i> Banner List</h5>
                        <a href="<?= base_url('admin/banner/add') ?>" class="btn btn-light btn-sm" style="color: black !important">
                            <i class="fas fa-plus-circle me-1"></i> Add New Banner
                        </a>
                    </div>
                </div>
                <div class="card-body" style="background-color: #f8faff;">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle" style="border-radius: 10px; overflow: hidden;">
                            <thead class="text-white">
                                <tr>
                                    <th scope="col" style="width: 50px;">#</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Upload Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($banner as $index => $row) : ?>
                                <tr style="border-bottom: 1px solid #e0e8ff;">
                                    <th scope="row" class="fw-bold" style="color: #3e4b5b;"><?= $index + 1 ?></th>
                                    <td>
                                        <img src="<?= base_url('./images/banner/' . $row->image) ?>" 
                                             class="rounded" 
                                             width="120" 
                                             height="70" 
                                             style="object-fit: cover; border: 2px solid #e0e8ff;">
                                    </td>
                                    <td>
                                        <?= date('d M Y', strtotime($row->uploaded_at)) ?>
                                        <small class="d-block text-muted"><?= date('H:i', strtotime($row->uploaded_at)) ?></small>
                                    </td>
                                    <td>
                                        <span class="badge <?= $row->is_active ? 'bg-success' : 'bg-secondary' ?>">
                                            <?= $row->is_active ? 'Active' : 'Inactive' ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2 justify-content-center">
                                            <a href="<?= base_url('admin/banner/edit/' . $row->id) ?>" 
                                               class="btn btn-sm btn-action btn-warning" 
                                               data-bs-toggle="tooltip" 
                                               title="Edit Banner">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a href="<?= base_url('admin/banner/delete/' . $row->id) ?>" 
                                               class="btn btn-sm btn-action btn-danger" 
                                               onclick="return confirm('Are you sure you want to delete this banner?');"
                                               data-bs-toggle="tooltip" 
                                               title="Delete Banner">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            <button class="btn btn-sm btn-action <?= $row->is_active ? 'btn-info' : 'btn-secondary' ?> btn-toggle" 
                                               data-bs-toggle="tooltip" 
                                               title="<?= $row->is_active ? 'Deactivate' : 'Activate' ?>"
                                               data-id="<?= $row->id ?>">
                                                <i class="fas fa-power-off"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
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
    
    .badge {
        padding: 8px 12px;
        font-weight: 500;
        border-radius: 8px;
    }
</style>

<script>
    // Initialize tooltips
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
        
        // Toggle active status
        document.querySelectorAll('.btn-toggle').forEach(btn => {
            btn.addEventListener('click', function() {
                const bannerId = this.getAttribute('data-id');
                fetch(`<?= base_url('admin/banner/toggle/') ?>${bannerId}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            const badge = this.closest('tr').querySelector('.badge');
                            const isActive = data.is_active;
                            
                            // Update badge
                            badge.className = isActive ? 'badge bg-success' : 'badge bg-secondary';
                            badge.textContent = isActive ? 'Active' : 'Inactive';
                            
                            // Update button
                            this.className = isActive ? 'btn btn-sm btn-action btn-info btn-toggle' : 'btn btn-sm btn-action btn-secondary btn-toggle';
                            this.setAttribute('title', isActive ? 'Deactivate' : 'Activate');
                            
                            // Update tooltip
                            const tooltip = bootstrap.Tooltip.getInstance(this);
                            tooltip.setContent({'.tooltip-inner': isActive ? 'Deactivate' : 'Activate'});
                        }
                    });
            });
        });
    });
</script>