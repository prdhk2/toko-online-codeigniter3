<!-- ============================================================== -->
<!-- Enhanced Admin Sidebar -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar header with user profile -->
        <div class="sidebar-header p-4 text-center">
            <div class="user-profile">
                <img src="<?= base_url('assets/admin/images/users/profile.png') ?>" 
                     class="rounded-circle shadow" 
                     width="80" 
                     alt="User">
                <h5 class="mt-3 mb-1">Admin Panel</h5>
                <small class="text-muted"><?= $this->session->userdata('name') ?></small>
            </div>
        </div>

        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-2">
                <!-- Dashboard -->
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= base_url('admin/dashboard') ?>">
                        <div class="icon-box bg-blue-light">
                            <i class="mdi mdi-view-dashboard text-blue"></i>
                        </div>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                <!-- Products Section -->
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <div class="icon-box bg-teal-light">
                            <i class="mdi mdi-package-variant text-teal"></i>
                        </div>
                        <span class="hide-menu">Products</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="<?= base_url('admin/product/add') ?>" class="sidebar-link">
                                <i class="mdi mdi-plus-circle-outline text-blue"></i>
                                <span>Add Product</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?= base_url('admin/product/index') ?>" class="sidebar-link">
                                <i class="mdi mdi-format-list-bulleted text-blue"></i>
                                <span>Product List</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Categories Section -->
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <div class="icon-box bg-purple-light">
                            <i class="mdi mdi-tag-multiple text-white"></i>
                        </div>
                        <span class="hide-menu">Categories</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="<?= base_url('admin/category/add') ?>" class="sidebar-link">
                                <i class="mdi mdi-plus-circle-outline text-blue"></i>
                                <span>Add Category</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?= base_url('admin/category/index') ?>" class="sidebar-link">
                                <i class="mdi mdi-format-list-bulleted text-blue"></i>
                                <span>Category List</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Orders Section - Fixed with default counts -->
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <div class="icon-box bg-amber-light">
                            <i class="mdi mdi-cart-outline text-amber"></i>
                        </div>
                        <span class="hide-menu">Orders</span>
                        <?php 
                            $pending_orders_count = isset($pending_orders_count) ? $pending_orders_count : 0;
                            $new_orders_count = isset($new_orders_count) ? $new_orders_count : 0;
                        ?>
                        <?php if($pending_orders_count > 0): ?>
                            <span class="badge bg-danger pulse-animation"><?= $pending_orders_count ?></span>
                        <?php endif; ?>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="<?= base_url('neworders/newOrders') ?>" class="sidebar-link">
                                <i class="mdi mdi-alert-circle text-red"></i>
                                <span>New Orders</span>
                                <?php if($new_orders_count > 0): ?>
                                    <span class="badge bg-danger float-end"><?= $new_orders_count ?></span>
                                <?php endif; ?>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?= base_url('neworders/paidOrders') ?>" class="sidebar-link">
                                <i class="mdi mdi-credit-card-check text-green"></i>
                                <span>Paid Orders</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?= base_url('neworders/shippingOrders') ?>" class="sidebar-link">
                                <i class="mdi mdi-truck-delivery text-blue"></i>
                                <span>Shipping</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?= base_url('neworders/deliveredOrders') ?>" class="sidebar-link">
                                <i class="mdi mdi-check-all text-teal"></i>
                                <span>Delivered</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Website Settings -->
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <div class="icon-box bg-red-light">
                            <i class="mdi mdi-settings text-red"></i>
                        </div>
                        <span class="hide-menu">Settings</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="<?= base_url('websetting/index') ?>" class="sidebar-link">
                                <i class="mdi mdi-image text-blue"></i>
                                <span>Banners</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?= base_url('admin/promo') ?>" class="sidebar-link">
                                <i class="mdi mdi-ticket-percent text-purple"></i>
                                <span>Promotions</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- View Store -->
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= base_url('') ?>" target="_blank">
                        <div class="icon-box bg-green-light">
                            <i class="mdi mdi-store text-green"></i>
                        </div>
                        <span class="hide-menu">View Store</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= base_url('admin/report') ?>">
                        <div class="icon-box bg-green-light">
                            <i class="mdi mdi-chart-line text-green"></i>
                        </div>
                        <span class="hide-menu">Reports</span>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>

<style>
/* ==================== */
/* Bold & Elegant Sidebar Styling */
/* ==================== */
.left-sidebar {
    background: #ffffff;
    box-shadow: 5px 0 25px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    border-right: none;
}

.sidebar-header {
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    margin-bottom: 15px;
    background: linear-gradient(135deg, #5c90ff 0%, #2a5bd7 100%);
    margin: -1px -1px 15px -1px;
    padding: 25px 15px;
}

.user-profile img {
    border: 3px solid rgba(255,255,255,0.2);
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
    transition: all 0.3s ease;
}

.user-profile h5 {
    color: white;
    font-weight: 600;
}

.user-profile small {
    color: rgba(255,255,255,0.7) !important;
}

.sidebar-link {
    padding: 12px 20px;
    border-radius: 8px;
    margin: 5px 10px;
    font-weight: 500;
    color: #3e4b5b;
}

.sidebar-link:hover, .sidebar-link.active {
    background: linear-gradient(90deg, rgba(92,144,255,0.1) 0%, rgba(92,144,255,0) 100%);
    color: #2a5bd7;
    transform: translateX(5px);
}

.icon-box {
    width: 38px;
    height: 38px;
    border-radius: 10px;
    margin-right: 15px;
}

/* Color Definitions */
.bg-blue-light { background: rgb(92, 144, 255); }
.text-blue { color: #5c90ff; }
.bg-teal-light { background: rgb(0, 200, 200); }
.text-teal { color: #00c8c8; }
.bg-purple-light { background: rgb(149, 100, 255); }
.text-purple { color: #9664ff; }
.bg-amber-light { background: rgb(255, 179, 0); }
.text-amber { color: #ffb400; }
.bg-red-light { background: rgb(255, 80, 80); }
.text-red { color: #ff5050; }
.bg-green-light { background: rgb(50, 200, 100); }
.text-green { color: #32c864; }

/* Badge Styling */
.badge {
    font-size: 0.7rem;
    padding: 4px 7px;
    font-weight: 600;
    border-radius: 10px;
}

.bg-danger {
    background: linear-gradient(135deg, #ff4f4f 0%, #d72a2a 100%) !important;
}

/* Pulse Animation for Notifications */
.pulse-animation {
    animation: pulse 2s infinite;
    box-shadow: 0 0 0 0 rgba(255, 0, 0, 0.7);
}

@keyframes pulse {
    0% { box-shadow: 0 0 0 0 rgba(255, 0, 0, 0.7); }
    70% { box-shadow: 0 0 0 10px rgba(255, 0, 0, 0); }
    100% { box-shadow: 0 0 0 0 rgba(255, 0, 0, 0); }
}

/* Submenu Styling */
.first-level .sidebar-link {
    padding: 10px 15px 10px 45px;
    font-size: 0.9rem;
    position: relative;
}

.first-level .sidebar-link:before {
    content: "";
    position: absolute;
    left: 30px;
    top: 50%;
    transform: translateY(-50%);
    width: 5px;
    height: 5px;
    border-radius: 50%;
    background: #5c90ff;
}

.first-level .sidebar-link i {
    margin-right: 10px;
    font-size: 1.2rem;
}

/* Arrow Animation */
.has-arrow::after {
    right: 25px;
    transition: all 0.3s ease;
}

.sidebar-item.show > .has-arrow::after {
    transform: translateY(-50%) rotate(90deg);
}
</style>

<script>
$(document).ready(function() {
    // Initialize sidebar
    $('.sidebar-link').each(function() {
        if (this.href === window.location.href) {
            $(this).addClass('active');
            $(this).parents('.sidebar-item').addClass('active show');
        }
    });

    // Smooth submenu toggle
    $('.has-arrow').on('click', function(e) {
        e.preventDefault();
        $(this).parent().toggleClass('show');
        $(this).attr('aria-expanded', $(this).parent().hasClass('show'));
    });
});
</script>