<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin BakulSayur</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <!-- <link href="<?= base_url(); ?>admin/assets/libs/flot/css/float-chart.css" rel="stylesheet"> -->
    <link href="<?= base_url(); ?>admin/dist/css/style.min.css" rel="stylesheet">
    
    <!-- Preloader CSS -->
    <style>
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255,255,255,0.9);
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .spinner {
            width: 70px;
            height: 70px;
            border: 5px solid #f3f3f3;
            border-top: 5px solid #5c90ff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>

<body>
<!-- Preloader -->
<div class="preloader">
    <div class="spinner"></div>
</div>

<div id="main-wrapper">
    <!-- Enhanced Header -->
    <header class="topbar bg-white shadow-sm">
        <nav class="navbar navbar-expand-md">
            <div class="container-fluid">
                <!-- Brand/Logo -->
                <div class="d-flex align-items-center">
                    <button class="btn sidebar-toggler me-3" type="button">
                        <i class="fas fa-bars text-primary"></i>
                    </button>
                    <a class="navbar-brand" href="<?= base_url('admin/dashboard'); ?>">
                        <div class="d-flex align-items-center">
                            <img src="<?= base_url('assets/img/logo.png') ?>" height="30" alt="Logo" class="me-2">
                            <span class="fw-bold text-primary">Administrator</span>
                        </div>
                    </a>
                </div>

                <!-- Right Navigation -->
                <div class="navbar-collapse">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown ms-2"> <!-- Added position-static here -->
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                                <div class="position-relative">
                                    <img src="<?= base_url('admin/assets/images/users/1.jpg') ?>" class="rounded-circle" width="40" alt="User">
                                    <span class="position-absolute bottom-0 end-0 bg-success rounded-circle border border-2 border-white" style="width: 12px; height: 12px;"></span>
                                </div>
                                <span class="ms-2 d-none d-lg-inline">Admin</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">

                                <div class="dropdown-header text-center p-3 bg-light">
                                    <img src="<?= base_url('admin/assets/images/users/1.jpg') ?>" class="rounded-circle mb-2" width="80" alt="User">
                                    <h6 class="mb-0">Admin User</h6>
                                    <small class="text-muted">admin@bakulsayur.com</small>
                                </div>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">
                                    <i class="fas fa-user me-2"></i> My Profile
                                </a>
                                <a href="#" class="dropdown-item">
                                    <i class="fas fa-cog me-2"></i> Settings
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="<?= base_url('logout') ?>" class="dropdown-item text-danger">
                                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
<!-- Custom CSS for Header -->
<style>
    /* Header Styles */
    .topbar {
        height: 70px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        z-index: 1000;
    }
    
    .search-bar {
        flex: 1;
        max-width: 500px;
    }
    
    .search-input {
        padding-left: 40px;
        border-radius: 20px;
        border: 1px solid #e0e0e0;
    }
    
    .search-btn {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        background: transparent;
        border: none;
        color: #6c757d;
    }

    .navbar-nav .dropdown {
        position: relative; /* Changed from relative to static */
    }
    
    /* Ensure header doesn't create overflow */
    .topbar {
        overflow: visible !important;
    }
    
    /* Make sure dropdown appears above everything */
    .dropdown-menu {
        width: 250px;
        z-index: 1050 !important;
    }
    /* Make sure header has proper z-index */
    .header-navbar {
        position: relative;
        z-index: 100;
    }
    
    .icon-circle {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .nav-link {
        padding: 0.5rem 1rem;
    }
    
    .badge {
        font-size: 0.6rem;
        padding: 0.25rem 0.4rem;
    }
    
    .notification-list a:hover, .message-list a:hover {
        background-color: #f8f9fa;
    }
    
    .sidebar-toggler {
        border: none;
        background: transparent;
        font-size: 1.25rem;
    }
</style>

<!-- JavaScript -->
<!-- jQuery jika kamu butuh $ -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS (untuk dropdown) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- File JS custom kamu -->
<script src="<?= base_url('assets/js/chart-page-init.js') ?>"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Remove preloader when page loads
    window.addEventListener('load', function() {
        document.querySelector('.preloader').style.opacity = '0';
        setTimeout(function() {
            document.querySelector('.preloader').style.display = 'none';
        }, 500);
    });
    
    // Toggle sidebar
    document.querySelector('.sidebar-toggler').addEventListener('click', function() {
        document.body.classList.toggle('sidebar-collapsed');
    });
</script>