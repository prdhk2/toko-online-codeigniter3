<main role="main" class="container py-4">
    <div class="row">
        <div class="col-md-12 mb-3">
            <?php $this->load->view('layouts/frontend/_alert') ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 mb-4">
            <?php $this->load->view('layouts/frontend/_menu') ?>
        </div>
        
        <div class="col-md-9">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Profil Saya</h4>
                </div>
                
                <div class="card-body">
                    <div class="row">
                        <!-- Profile Picture Section -->
                        <div class="col-md-4 text-center mb-4 mb-md-0">
                            <div class="position-relative">
                                <img src="<?= $content->image ? base_url("images/user/$content->image") : base_url('images/user/avatar.png') ?>" 
                                     class="rounded-circle border border-4 border-primary" 
                                     width="200" height="200" 
                                     alt="Profile Picture">
                                <a href="<?= base_url("profile/update/$content->id") ?>" 
                                   class="btn btn-sm btn-secondary position-absolute bottom-0 end-0 rounded-circle"
                                   title="Ubah Foto">
                                    <i class="fas fa-camera"></i>
                                </a>
                            </div>
                            <h4 class="mt-3 mb-0"><?= $content->name ?></h4>
                            <small class="text-muted">Member since <?= date('M Y', strtotime($content->created_at)) ?></small>
                        </div>
                        
                        <!-- Profile Details Section -->
                        <div class="col-md-8">
                            <div class="card mb-4">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0 text-black">Informasi Pribadi</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label text-muted small mb-1">Nama Lengkap</label>
                                            <p class="mb-0 fs-5"><?= $content->name ?></p>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label text-muted small mb-1">Email</label>
                                            <p class="mb-0 fs-5"><?= $content->email ?></p>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label text-muted small mb-1">Nomor Telepon</label>
                                            <p class="mb-0 fs-5"><?= $content->phone ?? 'Belum diisi' ?></p>
                                        </div>
                                    </div>
                                    <a href="<?= base_url("profile/update/$content->id") ?>" class="btn btn-primary">
                                        <i class="fas fa-edit me-2"></i>Edit Profil
                                    </a>
                                </div>
                            </div>
                            
                            <!-- Address Section -->
                            <div class="card">
                                <div class="card-header bg-light d-flex justify-content-between align-items-center text-black">
                                    <h5 class="mb-0">Alamat Saya</h5>
                                    <a href="<?= base_url('address') ?>" class="btn btn-sm btn-success">
                                        <i class="fas fa-plus me-1"></i>Tambah Alamat
                                    </a>
                                </div>
                                <div class="card-body">
                                    <?php if(!empty($addresses)): ?>
                                        <div class="row">
                                            <?php foreach($addresses as $address): ?>
                                                <div class="col-md-6 mb-3">
                                                    <div class="card h-100 border-primary">
                                                        <div class="card-body">
                                                            <h6 class="card-title text-primary">
                                                                <i class="fas fa-map-marker-alt me-2"></i>Alamat
                                                            </h6>
                                                            <p class="card-text"><?= $address->address_line ?></p>
                                                            <?php if(!empty($address->phone)): ?>
                                                                <p class="card-text small">
                                                                    <i class="fas fa-phone me-2"></i><?= $address->phone ?>
                                                                </p>
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="card-footer bg-transparent">
                                                            <a href="#" class="btn btn-sm btn-outline-primary">
                                                                <i class="fas fa-edit"></i> Edit
                                                            </a>
                                                            <a href="#" class="btn btn-sm btn-outline-danger float-end">
                                                                <i class="fas fa-trash"></i> Hapus
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach ?>
                                        </div>
                                    <?php else: ?>
                                        <div class="text-center py-4">
                                            <i class="fas fa-map-marked-alt fa-3x text-muted mb-3"></i>
                                            <h5 class="text-muted">Belum ada alamat terdaftar</h5>
                                            <p class="text-muted">Tambahkan alamat untuk pengalaman belanja yang lebih baik</p>
                                            <a href="<?= base_url('address') ?>" class="btn btn-primary">
                                                <i class="fas fa-plus me-2"></i>Tambah Alamat Pertama
                                            </a>
                                        </div>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Add this in your head section or layout file -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    .border-primary {
        border-color: #4e73df !important;
    }
    .bg-primary {
        background-color: #4e73df !important;
    }
    .btn-primary {
        background-color: #4e73df;
        border-color: #4e73df;
    }
    .btn-primary:hover {
        background-color: #2e59d9;
        border-color: #2653d4;
    }
</style>