<!-- Page wrapper -->
<div class="page-wrapper">
    <!-- Breadcrumb -->
    <div class="page-breadcrumb mb-4">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title" style="color: #2a5bd7; font-weight: 600;">
                    <i class="fas fa-tachometer-alt me-2"></i> Dashboard
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

    <!-- Stats Cards -->
    <div class="container-fluid">
        <div class="row mb-4">
            <!-- Dashboard Card -->
            <div class="col-md-6 col-lg-3 mb-3">
                <div class="stat-card bg-white shadow-sm rounded-3 p-4 text-center h-100">
                    <div class="icon-circle mx-auto mb-3" style="background-color: rgba(92, 144, 255, 0.1);">
                        <i class="fas fa-tachometer-alt" style="color: #5c90ff; font-size: 1.5rem;"></i>
                    </div>
                    <h5 style="color: #5c90ff;">Dashboard</h5>
                    <p class="text-muted mb-0">Overview</p>
                </div>
            </div>

            <!-- Total Products Card -->
            <div class="col-md-6 col-lg-3 mb-3">
                <div class="stat-card bg-white shadow-sm rounded-3 p-4 text-center h-100">
                    <div class="icon-circle mx-auto mb-3" style="background-color: rgba(0, 200, 200, 0.1);">
                        <i class="fas fa-box-open" style="color: #00c8c8; font-size: 1.5rem;"></i>
                    </div>
                    <h5 style="color: #00c8c8;">Total Products</h5>
                    <p class="text-muted mb-0"><?= isset($total_products) ? number_format($total_products, 0) : '0' ?></p>
                </div>
            </div>

            <!-- Total Sales Card -->
            <div class="col-md-6 col-lg-3 mb-3">
                <div class="stat-card bg-white shadow-sm rounded-3 p-4 text-center h-100">
                    <div class="icon-circle mx-auto mb-3" style="background-color: rgba(50, 200, 100, 0.1);">
                        <i class="fas fa-shopping-cart" style="color: #32c864; font-size: 1.5rem;"></i>
                    </div>
                    <h5 style="color: #32c864;">Today's Sales</h5>
                    <p class="text-muted mb-0">Rp<?= isset($total_sales) ? number_format($total_sales, 0, ',', '.') : '0' ?></p>
                </div>
            </div>

            <!-- Revenue Card -->
            <div class="col-md-6 col-lg-3 mb-3">
                <div class="stat-card bg-white shadow-sm rounded-3 p-4 text-center h-100">
                    <div class="icon-circle mx-auto mb-3" style="background-color: rgba(255, 107, 107, 0.1);">
                        <i class="fas fa-chart-line" style="color: #ff6b6b; font-size: 1.5rem;"></i>
                    </div>
                    <h5 style="color: #ff6b6b;">Revenue</h5>
                    <p class="text-muted mb-0">Rp<?= isset($monthly_revenue) ? number_format($monthly_revenue, 0, ',', '.') : '0' ?></p>
                </div>
            </div>
        </div>

        <!-- Main Content Row -->
        <div class="row">
            <!-- Admin Profile -->
            <div class="col-lg-6 mb-4">
                <div class="card shadow-sm border-0 h-100" style="border-radius: 10px;">
                    <div class="card-header bg-white border-0">
                        <h5 class="mb-0" style="color: #2a5bd7;">
                            <i class="fas fa-user-circle me-2"></i> Welcome Back, ADMIN!
                        </h5>
                    </div>
                    <div class="card-body">
                        <?php $userImage = $this->session->userdata('image') ? base_url('images/user/' . $this->session->userdata('image')) : base_url('images/user/avatar.png'); ?>
                        <div class="d-flex flex-column flex-md-row align-items-center">
                            <img src="<?= $userImage ?>" 
                                 alt="User" 
                                 class="rounded-circle me-md-4 mb-3 mb-md-0" 
                                 width="150" 
                                 height="150"
                                 style="object-fit: cover; border: 5px solid #f0f4ff;">
                            <div>
                                <h3 class="mb-1" style="color: #2a5bd7;"><?= $this->session->userdata('name'); ?></h3>
                                <p class="text-muted mb-2">
                                    <i class="fas fa-envelope me-2"></i> <?= $this->session->userdata('email'); ?>
                                </p>
                                <a href="<?= base_url('admin/profile') ?>" class="btn btn-sm btn-outline-primary mt-2">
                                    <i class="fas fa-user-edit me-1"></i> View Profile
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Orders Today -->
            <div class="col-lg-6 mb-4">
                <div class="card shadow-sm border-0 h-100" style="border-radius: 10px;">
                    <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">
                        <h5 class="mb-0" style="color: #2a5bd7;">
                            <i class="fas fa-shopping-bag me-2"></i> Orders Today
                        </h5>
                        <a href="<?= base_url('neworders') ?>" class="btn btn-sm btn-outline-primary">
                            View All
                        </a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                            <table class="table table-hover mb-0">
                                <thead style="background-color: #f8faff;">
                                    <tr>
                                        <th>Invoice</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($orders)) : ?>
                                        <?php foreach ($orders as $row) : ?>
                                        <tr>
                                            <td class="fw-bold">#<?= $row->invoice ?></td>
                                            <td>Rp<?= number_format($row->total, 0, ',', '.') ?></td>
                                            <td>
                                                <span class="badge 
                                                    <?= $row->status == 'paid' ? 'bg-success' : '' ?>
                                                    <?= $row->status == 'pending' ? 'bg-warning' : '' ?>
                                                    <?= $row->status == 'cancelled' ? 'bg-danger' : '' ?>
                                                    rounded-pill">
                                                    <?= ucfirst($row->status) ?>
                                                </span>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('neworders/detail/' . $row->id); ?>" 
                                                   class="btn btn-sm btn-primary px-3">
                                                   <i class="fas fa-eye me-1"></i> View
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="4" class="text-center py-4">No orders today</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Custom Styles */
    .stat-card {
        transition: all 0.3s ease;
    }
    
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
    }
    
    .icon-circle {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .table-hover tbody tr:hover {
        background-color: rgba(92, 144, 255, 0.05) !important;
    }
    
    .badge {
        font-weight: 500;
        padding: 5px 10px;
    }
    
    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .card-body > .d-flex {
            flex-direction: column !important;
            text-align: center;
        }
        
        .rounded-circle {
            margin-bottom: 20px;
        }
    }
</style>