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
                    <i class="fas fa-truck-fast me-2"></i> Delivered Orders
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
                        <h5 class="mb-0 text-white"><i class="fas fa-list-ul me-2"></i> Completed Deliveries</h5>
                        <div class="d-flex">
                            <div class="input-group input-group-sm me-2" style="width: 200px;">
                                <input type="text" class="form-control" placeholder="Search deliveries..." id="searchInput">
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-success btn-sm dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-filter me-1"></i> Filter
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="filterDropdown">
                                    <li><a class="dropdown-item" href="#" data-filter="all">All Deliveries</a></li>
                                    <li><a class="dropdown-item" href="#" data-filter="today">Today</a></li>
                                    <li><a class="dropdown-item" href="#" data-filter="week">This Week</a></li>
                                    <li><a class="dropdown-item" href="#" data-filter="month">This Month</a></li>
                                </ul>
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
                                    <th scope="col">Delivery Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($orders as $index => $row) : ?>
                                <tr style="border-bottom: 1px solid #e0e8ff;" data-date="<?= date('Y-m-d', strtotime($row->date)) ?>">
                                    <th scope="row" class="fw-bold" style="color: #3e4b5b;"><?= $index + 1 ?></th>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="order-icon me-2" style="width: 40px; height: 40px; background-color: #e0e8ff; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                                <i class="fas fa-truck-ramp-box" style="font-size: 18px; color: #6a11cb;"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-0 fw-bold" style="color: #2a5bd7;"><?= $row->invoice ?></h6>
                                                <small class="text-muted"><?= date('l, d F Y H:i', strtotime($row->date)) ?></small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="customer-info">
                                            <h6 class="mb-0"><?= $row->name ?></h6>
                                            <small class="text-muted"><?= substr($row->address, 0, 20) ?>...</small>
                                        </div>
                                    </td>
                                    <td class="fw-bold" style="color: #6a11cb;">
                                        Rp<?= number_format($row->total, 0, ',', '.') ?>
                                    </td>
                                    <td>
                                        <?= date('d M Y', strtotime($row->date)) ?>
                                        <small class="d-block text-muted">Delivered</small>
                                    </td>
                                    <td>
                                        <span class="badge bg-success">
                                            <i class="fas fa-check-circle me-1"></i> <?= ucfirst($row->status) ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2 justify-content-center">
                                            <a href="<?= base_url('orders/detail/' . $row->id); ?>" 
                                               class="btn btn-sm btn-action btn-primary" 
                                               data-bs-toggle="tooltip" 
                                               title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <button class="btn btn-sm btn-action btn-info btn-print" 
                                               data-bs-toggle="tooltip" 
                                               title="Print Invoice"
                                               data-invoice="<?= $row->invoice ?>">
                                                <i class="fas fa-print"></i>
                                            </button>
                                            <button class="btn btn-sm btn-action btn-success btn-review" 
                                               data-bs-toggle="tooltip" 
                                               title="View Review"
                                               data-order-id="<?= $row->id ?>">
                                                <i class="fas fa-star"></i>
                                            </button>
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
                            Showing <?= count($orders) ?> of <?= $total_orders ?> deliveries
                        </div>
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center mb-0">
                                <?= $pagination ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Review Modal -->
<div class="modal fade" id="reviewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);">
                <h5 class="modal-title text-white">Customer Review</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="reviewContent">
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
        background-color: rgba(106, 17, 203, 0.05);
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
        background-color: #e6d5f7;
        transform: scale(1.05);
    }
    
    .badge {
        padding: 8px 12px;
        font-weight: 500;
        border-radius: 8px;
    }
    
    .bg-success {
        background-color: #28a745 !important;
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
        
        // Print invoice
        document.querySelectorAll('.btn-print').forEach(btn => {
            btn.addEventListener('click', function() {
                const invoice = this.getAttribute('data-invoice');
                window.open(`<?= base_url('orders/print/') ?>${invoice}`, '_blank');
            });
        });
        
        // View review
        document.querySelectorAll('.btn-review').forEach(btn => {
            btn.addEventListener('click', function() {
                const orderId = this.getAttribute('data-order-id');
                fetch(`<?= base_url('orders/review/') ?>${orderId}`)
                    .then(response => response.text())
                    .then(html => {
                        document.getElementById('reviewContent').innerHTML = html;
                        const modal = new bootstrap.Modal(document.getElementById('reviewModal'));
                        modal.show();
                    });
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
        
        // Filter functionality
        document.querySelectorAll('[data-filter]').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                const filter = this.getAttribute('data-filter');
                const rows = document.querySelectorAll('tbody tr');
                const today = new Date().toISOString().split('T')[0];
                
                rows.forEach(row => {
                    const rowDate = row.getAttribute('data-date');
                    let showRow = true;
                    
                    if (filter === 'today') {
                        showRow = rowDate === today;
                    } else if (filter === 'week') {
                        const oneWeekAgo = new Date();
                        oneWeekAgo.setDate(oneWeekAgo.getDate() - 7);
                        showRow = new Date(rowDate) >= oneWeekAgo;
                    } else if (filter === 'month') {
                        const oneMonthAgo = new Date();
                        oneMonthAgo.setMonth(oneMonthAgo.getMonth() - 1);
                        showRow = new Date(rowDate) >= oneMonthAgo;
                    }
                    
                    row.style.display = showRow ? '' : 'none';
                });
            });
        });
    });
</script>