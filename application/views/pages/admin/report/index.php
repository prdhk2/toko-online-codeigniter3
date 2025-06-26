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
                    <i class="fas fa-chart-line me-2"></i> <?= $title ?>
                </h4>
                <div class="ms-auto text-end">
                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-sm btn-date-range dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-calendar-alt me-1"></i> Date Range
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item active" href="#" data-range="today">Today</a></li>
                            <li><a class="dropdown-item" href="#" data-range="week">This Week</a></li>
                            <li><a class="dropdown-item" href="#" data-range="month">This Month</a></li>
                            <li><a class="dropdown-item" href="#" data-range="year">This Year</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#" data-range="custom">Custom Range</a></li>
                        </ul>
                    </div>

                    <!-- Export Button -->
                    <button class="btn btn-sm btn-export ms-2" id="exportReport">
                        <i class="fas fa-file-export me-1"></i> Export
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Today Sales -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm" style="border-radius: 12px; border-left: 4px solid #28a745;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Today's Sales</h6>
                            <h3 class="mb-0" style="color: #28a745;">Rp <?= number_format($today_sales, 0, ',', '.') ?></h3>
                        </div>
                        <div class="bg-success bg-opacity-10 p-3 rounded">
                            <i class="fas fa-shopping-bag fa-2x" style="color:rgb(255, 255, 255);"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="<?= $today_growth >= 0 ? 'text-success' : 'text-danger' ?>">
                            <i class="fas fa-arrow-<?= $today_growth >= 0 ? 'up' : 'down' ?> me-1"></i>
                            <?= abs($today_growth) ?>% <?= $today_growth >= 0 ? 'increase' : 'decrease' ?> from yesterday
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Monthly Revenue -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm" style="border-radius: 12px; border-left: 4px solid #2a5bd7;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Monthly Revenue</h6>
                            <h3 class="mb-0" style="color: #2a5bd7;">Rp <?= number_format($monthly_revenue, 0, ',', '.') ?></h3>
                        </div>
                        <div class="bg-primary bg-opacity-10 p-3 rounded">
                            <i class="fas fa-chart-bar fa-2x" style="color:rgb(255, 255, 255);"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="<?= $monthly_growth >= 0 ? 'text-success' : 'text-danger' ?>">
                            <i class="fas fa-arrow-<?= $monthly_growth >= 0 ? 'up' : 'down' ?> me-1"></i>
                            <?= abs($monthly_growth) ?>% <?= $monthly_growth >= 0 ? 'growth' : 'decline' ?> from last month
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Transactions -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm" style="border-radius: 12px; border-left: 4px solid #6c757d;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Total Transactions</h6>
                            <h3 class="mb-0" style="color: #6c757d;"><?= number_format($total_transactions, 0, ',', '.') ?></h3>
                        </div>
                        <div class="bg-secondary bg-opacity-10 p-3 rounded">
                            <i class="fas fa-receipt fa-2x" style="color:rgb(255, 255, 255);"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="<?= $transaction_growth >= 0 ? 'text-success' : 'text-danger' ?>">
                            <i class="fas fa-arrow-<?= $transaction_growth >= 0 ? 'up' : 'down' ?> me-1"></i>
                            <?= abs($transaction_growth) ?>% <?= $transaction_growth >= 0 ? 'increase' : 'decrease' ?> from last period
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <!-- Sales Chart -->
        <div class="col-md-8">
            <div class="card border-0 shadow-sm" style="border-radius: 12px;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0">Sales Performance</h5>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-period active" data-period="week">Weekly</button>
                            <button type="button" class="btn btn-sm btn-period" data-period="month">Monthly</button>
                            <button type="button" class="btn btn-sm btn-period" data-period="year">Yearly</button>
                        </div>
                    </div>
                    <div class="chart-container" style="height: 300px;">
                        <canvas id="salesChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Top Products -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm" style="border-radius: 12px;">
                <div class="card-body">
                    <h5 class="mb-3">Top Products</h5>
                    <div class="list-group">
                        <?php foreach ($top_products as $product): ?>
                        <div class="list-group-item border-0 py-2 px-0">
                            <div class="d-flex align-items-center">
                                <img src="<?= base_url('images/product/' . $product->image) ?>" 
                                     alt="<?= $product->title ?>" 
                                     class="rounded me-3" 
                                     width="50" 
                                     height="50" 
                                     style="object-fit: cover;">
                                <div class="flex-grow-1">
                                    <h6 class="mb-0"><?= $product->title ?></h6>
                                    <small class="text-muted"><?= $product->sold ?> sold</small>
                                </div>
                                <span class="badge bg-primary">Rp <?= number_format($product->revenue, 0, ',', '.') ?></span>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Latest Orders Table -->
    <div class="card mt-4 border-0 shadow-sm" style="border-radius: 12px;">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Recent Transactions</h5>
                <a href="<?= base_url('admin/orders') ?>" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Date</th>
                            <th>Invoice</th>
                            <th>Customer</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($latest_orders as $order): ?>
                        <tr>
                            <td><?= date('d M Y H:i', strtotime($order->date)) ?></td>
                            <td><?= $order->invoice ?></td>
                            <td><?= $order->name ?></td>
                            <td>Rp <?= number_format($order->total, 0, ',', '.') ?></td>
                            <td>
                                <span class="badge 
                                    <?= $order->status == 'pending' ? 'bg-warning' : 
                                       ($order->status == 'paid' ? 'bg-info' : 
                                       ($order->status == 'shipped' ? 'bg-primary' : 
                                       ($order->status == 'delivered' ? 'bg-success' : 'bg-secondary'))) ?>">
                                    <?= ucfirst($order->status) ?>
                                </span>
                            </td>
                            <td class="text-end">
                                <a href="<?= base_url('admin/orders/detail/' . $order->id) ?>" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Sales Chart
        const ctx = document.getElementById('salesChart').getContext('2d');
        const salesChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?= json_encode($chart_labels) ?>,
                datasets: [{
                    label: 'Sales',
                    data: <?= json_encode($chart_data) ?>,
                    backgroundColor: 'rgba(42, 91, 215, 0.1)',
                    borderColor: '#2a5bd7',
                    borderWidth: 2,
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { drawBorder: false }
                    },
                    x: {
                        grid: { display: false }
                    }
                }
            }
        });

        // Period switcher
        document.querySelectorAll('[data-period]').forEach(btn => {
            btn.addEventListener('click', function () {
                document.querySelectorAll('[data-period]').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                const period = this.getAttribute('data-period');
                console.log('Switched to ' + period + ' view');
            });
        });

        // Date range selection
        document.querySelectorAll('.dropdown-item[data-range]').forEach(item => {
            item.addEventListener('click', function (e) {
                e.preventDefault();
                const range = this.getAttribute('data-range');
                console.log('Clicked range:', range);

                // Remove previous active
                document.querySelectorAll('.dropdown-item[data-range]').forEach(i => i.classList.remove('active'));
                this.classList.add('active');

                if (range === 'custom') {
                    alert('Custom date range picker akan muncul di sini');
                } else {
                    const url = new URL(window.location.href);
                    url.searchParams.set('range', range);
                    window.location.href = url.toString();
                }

                // Update button text
                document.querySelector('.btn-date-range').innerHTML =
                    `<i class="fas fa-calendar-alt me-1"></i> ${this.textContent}`;

                
            });
        });

        // Export button
        document.getElementById('exportReport')?.addEventListener('click', function () {
            const activeRange = document.querySelector('.dropdown-item.active')?.getAttribute('data-range') || 'all';
            const exportUrl = `/admin/report/export?range=${activeRange}`;
            window.open(exportUrl, '_blank');
        });
    });

</script>

<style>
    .card {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    
    .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
    }
    
    .badge {
        padding: 6px 10px;
        font-weight: 500;
        border-radius: 6px;
        background-color: #ff0000;
    }
    
    .table-hover tbody tr:hover {
        background-color: rgba(42, 91, 215, 0.05);
    }
    
    .chart-container {
        position: relative;
    }
        /* Custom button styling */
    .btn-period {
        border: 1px solid #dee2e6; /* Gray border */
        color: #212529 !important; /* Black text */
        background-color: transparent;
        transition: all 0.3s ease;
    }
    
    .btn-period:hover {
        background-color: #f8f9fa; /* Light gray on hover */
        color: #212529 !important;
    }
    
    .btn-period.active {
        background-color: #2a5bd7; /* Primary blue */
        color: white !important;
        border-color: #2a5bd7;
    }
    
    .btn-group .btn-period:not(:last-child) {
        border-right: none; /* Remove double border between buttons */
    }
    
    .btn-group .btn-period:first-child {
        border-top-left-radius: 4px;
        border-bottom-left-radius: 4px;
    }
    
    .btn-group .btn-period:last-child {
        border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;
    }

        /* Date Range Dropdown Button */
    .btn-date-range {
        border: 1px solid #ced4da !important;
        color: #495057 !important;
        background-color: #f8f9fa !important;
    }
    
    .btn-date-range:hover {
        background-color: #e9ecef !important;
        color: #495057 !important;
    }
    
    .btn-date-range:focus {
        box-shadow: 0 0 0 0.25rem rgba(42, 91, 215, 0.25) !important;
    }
    
    /* Export Button */
    .btn-export {
        border: 1px solid #ced4da !important;
        color: #495057 !important;
        background-color: #f8f9fa !important;
    }
    
    .btn-export:hover {
        background-color: #e9ecef !important;
        color: #495057 !important;
    }
    
    /* Dropdown Menu */
    .dropdown-menu {
        border: 1px solid #dee2e6 !important;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1) !important;
    }
    
    .dropdown-item {
        color: #212529 !important;
    }
    
    .dropdown-item:hover {
        background-color: #f8f9fa !important;
        color: #2a5bd7 !important;
    }
    
    /* Active state for dropdown items */
    .dropdown-item.active {
        background-color: #2a5bd7 !important;
        color: white !important;
    }
</style>