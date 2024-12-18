<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Dashboard</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?= $breadcum; ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Admin profile Cards  -->
        <!-- ============================================================== -->
        <div class="row mb-5">
            <!-- Column -->
            <div class="col-md-6 col-lg-3">
                <div class="card-hover">
                    <div class="box bg-white text-center">
                        <h1 class="font-light" style="color: #5c90ff !important;"><i class="mdi mdi-view-dashboard"></i></h1>
                        <h6 style="color: #5c90ff !important;">Dashboard</h6>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-3">
                <div class="card-hover">
                    <div class="box bg-white text-center">
                        <h1 class="font-light" style="color: #5c90ff !important;"><i class="mdi mdi-clipboard-text"></i></h1>
                        <h6 style="color: #5c90ff !important;">Total Product</h6>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-3">
                <div class="card-hover">
                    <div class="box bg-white text-center">
                        <h1 class="font-light" style="color: #5c90ff !important;"><i class="mdi mdi-shopping"></i></h1>
                        <h6 style="color: #5c90ff !important;">Total Sales</h6>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-3">
                <div class="card-hover">
                    <div class="box bg-white text-center">
                        <h1 class="font-light" style="color: #5c90ff !important;"><i class="mdi mdi-chart-pie"></i></h1>
                        <h6 style="color: #5c90ff !important;">Revenue</h6>
                    </div>
                </div>
            </div>
        </div>
    <div class="row mt-3">
        <div class="col-6">
            <div class="card justify-content-center">
                <div class="card-header">Welcome Back my Lovely ADMIN !!</div>
                    <div class="card-body">
                    <?php $userImage = $this->session->userdata('image') ?: './images/user/avatar.png'; ?>
                        <div class="d-flex align-items-center">
                        <img src="<?= base_url('./images/user/' . $userImage) ?>" alt="User Image" class="rounded-circle mb-3 bg-light" width="250" height="250">
                            <div class="detail ml-4">
                                <h1><?= $this->session->userdata('name'); ?></h1>
                                <p><?= $this->session->userdata('email'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Admin Profile chart -->
            </div>
            <div class="col-6">
            <div class="card justify-content-center">
                <div class="card-header">Order Today</div>
                    <div class="card-body">
                        <table class="table">
                        <caption>List of Orders Today</caption>
                        <thead>
                            <tr>
                            <th scope="col">Invoice</th>
                            <th scope="col">Total</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($orders as $index => $row) : ?>
                            <tr>
                            <th scope="row"><?= $row->invoice; ?></th>
                            <td><?= $row->total; ?></td>
                            <td><?= $row->status; ?></td>
                            <td>
                                <a href="<?= base_url('neworders/detail/' . $row->id); ?>" class="badge badge-info"><i class="fas fa-eye"></i> View</a>
                            </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Container fluid  -->
    