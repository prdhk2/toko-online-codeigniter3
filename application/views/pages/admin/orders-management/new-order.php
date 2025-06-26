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
                    <i class="fas fa-shopping-cart me-2"></i> New Orders
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
                        <h5 class="mb-0 text-white"><i class="fas fa-list-ul me-2"></i> Pending Orders</h5>
                        <div class="d-flex">
                            <div class="input-group input-group-sm me-2" style="width: 300px;">
                                <input type="text" class="form-control" placeholder="Search orders..." id="searchInput">
                                <!-- <button class="btn btn-light" type="button">
                                    <i class="fas fa-search"></i>
                                </button> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="background-color: #f8faff;">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle" style="border-radius: 10px; overflow: hidden;">
                            <thead class="text-white">
                                <tr>
                                    <th scope="col" style="width: 50px;">#</th>
                                    <th scope="col">Invoice</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($orders as $index => $row) : ?>
                                <tr style="border-bottom: 1px solid #e0e8ff;">
                                    <th scope="row" class="fw-bold" style="color: #3e4b5b;"><?= $index + 1 ?></th>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="order-icon me-2" style="width: 40px; height: 40px; background-color: #e0e8ff; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                                <i class="fas fa-receipt" style="font-size: 18px; color: #2a5bd7;"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-0 fw-bold" style="color: #2a5bd7;"><?= $row->invoice ?></h6>
                                                <?php if (!empty($row->date)) : ?>
                                                    <small class="text-muted"><?= date('l, d F Y H:i', strtotime($row->date)) ?></small>
                                                <?php else : ?>
                                                    <small class="text-muted">Time not recorded</small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="customer-info">
                                            <h6 class="mb-0"><?= $row->name ?></h6>
                                            <small class="text-muted"><?= substr($row->address, 0, 20) ?>...</small>
                                        </div>
                                    </td>
                                    <td class="fw-bold" style="color: #ff6b6b;">
                                        Rp<?= number_format($row->total, 0, ',', '.') ?>
                                    </td>
                                    <td>
                                        <?= date('d M Y', strtotime($row->date)) ?>
                                    </td>
                                    <td>
                                        <span class="badge 
                                            <?= $row->status == 'pending' ? 'bg-warning' : 
                                               ($row->status == 'processed' ? 'bg-info' : 
                                               ($row->status == 'shipped' ? 'bg-primary' : 
                                               ($row->status == 'completed' ? 'bg-success' : 'bg-secondary'))) ?>">
                                            <?= ucfirst($row->status) ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2 justify-content-center">
                                            <a href="<?= base_url('neworders/detail/' . $row->id); ?>" 
                                               class="btn btn-sm btn-action btn-primary" 
                                               data-bs-toggle="tooltip" 
                                               title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="<?= base_url('neworders/process/' . $row->id); ?>" 
                                               class="btn btn-sm btn-action btn-success" 
                                               data-bs-toggle="tooltip" 
                                               title="Process Order"
                                               onclick="return confirm('Mark this order as processed?')">
                                                <i class="fas fa-check"></i>
                                            </a>
                                            <a href="<?= base_url('orders/print/'.$row->id) ?>" 
                                                target="_blank"
                                                class="btn btn-sm btn-action btn-info"
                                                data-bs-toggle="tooltip" 
                                                title="Print Invoice">
                                                <i class="fas fa-print"></i>
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
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="text-muted">
                            Showing <?= count($orders) ?> of <?= $total_orders ?> orders
                        </div>
                        <nav aria-label="Page navigation">
                            <?= $pagination ?>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Order Quick View Modal -->
<div class="modal fade" id="quickViewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background: linear-gradient(135deg, #5c90ff 0%, #2a5bd7 100%);">
                <h5 class="modal-title text-white">Order Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="quickViewContent">
                <!-- Content will be loaded via AJAX -->
                <div class="text-center py-5">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
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
    
    .card-footer {
        border-top: 1px solid #e0e8ff;
    }
    
    .order-icon {
        transition: all 0.3s ease;
    }
    
    tr:hover .order-icon {
        background-color: #d0dfff;
        transform: scale(1.05);
    }
    
    .badge {
        padding: 8px 12px;
        font-weight: 500;
        border-radius: 8px;
    }
    
    /* Status badge colors */
    .bg-warning {
        background-color: #ffc107 !important;
        color: #212529;
    }
    
    .bg-info {
        background-color: #0dcaf0 !important;
        color: #fff;
    }
    
    .bg-primary {
        background-color: #2a5bd7 !important;
        color: #fff;
    }
    
    .bg-success {
        background-color: #198754 !important;
        color: #fff;
    }
</style>

<script>
    // Initialize tooltips
    document.addEventListener('DOMContentLoaded', function() {
        // Tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
        
        // Quick view modal
        document.querySelectorAll('.btn-action.btn-primary').forEach(btn => {
            btn.addEventListener('click', function(e) {
                if (!e.target.closest('a')) {
                    e.preventDefault();
                    const orderId = this.getAttribute('href').split('/').pop();
                    fetch(`<?= base_url('neworders/quickview/') ?>${orderId}`)
                        .then(response => response.text())
                        .then(html => {
                            document.getElementById('quickViewContent').innerHTML = html;
                            const modal = new bootstrap.Modal(document.getElementById('quickViewModal'));
                            modal.show();
                        });
                }
            });
        });
        
        // Print invoice
        document.querySelectorAll('.btn-print').forEach(btn => {
            btn.addEventListener('click', function() {
                const invoice = this.getAttribute('data-invoice');
                window.open(`<?= base_url('neworders/print/') ?>${invoice}`, '_blank');
            });
        });
        
        // Search functionality
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const filter = this.value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr');
            
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? '' : 'none';
            });
        });
    });
</script>