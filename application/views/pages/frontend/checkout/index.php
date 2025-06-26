<main role="main" class="container">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0"><i class="fas fa-shopping-cart"></i> Checkout</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('checkout/process') ?>" method="post">
                            <!-- Informasi Pelanggan -->
                            <div class="mb-4">
                                <h5 class="border-bottom pb-2"><i class="fas fa-user"></i> Informasi Pelanggan</h5>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="name" name="name" 
                                            value="<?= $user->name ?? '' ?>" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="phone" class="form-label">No. Telepon</label>
                                        <input type="text" class="form-control" id="phone" name="phone" 
                                            value="<?= $user->phone ?? '' ?>" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" 
                                        value="<?= $user->email ?? '' ?>" required>
                                </div>
                            </div>

                            <!-- Pilihan Alamat -->
                            <div class="mb-4">
                                <h5 class="border-bottom pb-2"><i class="fas fa-map-marker-alt"></i> Pilih Alamat Pengiriman</h5>
                                <div class="address-list">
                                    <?php if(!empty($addresses)): ?>
                                        <?php foreach($addresses as $index => $address): ?>
                                            <div class="card mb-2 address-card <?= $index == 0 ? 'border-primary' : '' ?>">
                                                <div class="card-body">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="address_id" 
                                                            id="address_<?= $address->id ?>" 
                                                            value="<?= $address->id ?>" 
                                                            <?= $index == 0 ? 'checked' : '' ?>>
                                                        <label class="form-check-label" for="address_<?= $address->id ?>">
                                                            <strong>Alamat <?= $index + 1 ?></strong>
                                                            <?php if($index == 0): ?>
                                                                <span class="badge bg-info">Terakhir Dipakai</span>
                                                            <?php endif; ?>
                                                        </label>
                                                    </div>
                                                    <div class="address-details mt-2">
                                                        <p class="mb-1"><?= $address->recipient_name ?></p>
                                                        <p class="mb-1"><?= $address->phone ?></p>
                                                        <p class="mb-1"><?= $address->address_line ?></p>
                                                        <?php if(!empty($address->address_line2)): ?>
                                                            <p class="mb-1"><?= $address->address_detail ?></p>
                                                        <?php endif; ?>
                                                        <p class="mb-1"><?= $address->city ?>, <?= $address->postal_code ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <div class="alert alert-warning">
                                            Anda belum memiliki alamat. Silakan tambahkan alamat di profil Anda.
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="mt-2">
                                    <a href="<?= base_url('address') ?>" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-plus"></i> Tambah Alamat Baru
                                    </a>
                                </div>
                            </div>

                            <!-- Ringkasan Belanja -->
                            <div class="mb-4">
                                <h5 class="border-bottom pb-2"><i class="fas fa-receipt"></i> Ringkasan Belanja</h5>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Produk</th>
                                                <th class="text-end">Harga</th>
                                                <th class="text-center">Qty</th>
                                                <th class="text-end">Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($cart_items as $item): ?>
                                            <tr>
                                                <td>
                                                    <?= $item->title ?>
                                                    <?php if(!empty($item->variant)): ?>
                                                        <br><small class="text-muted">Varian: <?= $item->variant ?></small>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="text-end">Rp <?= number_format($item->price, 0, ',', '.') ?></td>
                                                <td class="text-center"><?= $item->qty ?></td>
                                                <td class="text-end">Rp <?= number_format($item->price * $item->qty, 0, ',', '.') ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        <tfoot class="table-group-divider">
                                            <tr>
                                                <th colspan="3" class="text-end">Total</th>
                                                <th class="text-end">Rp <?= number_format(array_sum(array_map(function($item) { 
                                                    return $item->price * $item->qty; 
                                                }, $cart_items)), 0, ',', '.') ?></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg py-3">
                                    <i class="fas fa-credit-card"></i> Lanjut ke Pembayaran
                                </button>
                                <a href="<?= base_url('cart') ?>" class="btn btn-outline-secondary">
                                    <i class="fas fa-arrow-left"></i> Kembali ke Keranjang
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Sidebar Ringkasan -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary">
                        <h5 class="mb-0"><i class="fas fa-file-invoice"></i> Ringkasan Pesanan</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Subtotal:</span>
                            <span>Rp <?= number_format(array_sum(array_map(function($item) { 
                                return $item->price * $item->qty; 
                            }, $cart_items)), 0, ',', '.') ?></span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Ongkos Kirim:</span>
                            <span class="text-success">Akan dihitung</span>
                        </div>
                        <div class="d-flex justify-content-between fw-bold fs-5 mt-3 pt-2 border-top">
                            <span>Total:</span>
                            <span>Rp <?= number_format(array_sum(array_map(function($item) { 
                                return $item->price * $item->qty; 
                            }, $cart_items)), 0, ',', '.') ?></span>
                        </div>
                    </div>
                </div>
                
                <div class="card shadow-sm mt-3">
                    <div class="card-header bg-primary">
                        <h5 class="mb-0"><i class="fas fa-shield-alt"></i> Pembayaran Aman</h5>
                    </div>
                    <div class="card-body">
                        <p class="small text-muted">
                            <i class="fas fa-lock"></i> Data pembayaran Anda dilindungi dengan enkripsi SSL.
                        </p>
                        <div class="text-center">
                            <img src="<?= base_url("assets/template/img/logo/bca.png");?>" alt="BCA" height="30" class="me-2">
                            <img src="<?= base_url("assets/template/img/logo/permata_bank.png");?>" alt="Permata" height="30" class="me-2">
                            <img src="<?= base_url("assets/template/img/logo/Indomaret.png");?>" alt="Indomaret" height="30" class="me-2">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- CSS Tambahan -->
<style>
    .bg-primary {
        background-color : #5c90ff !important;
        
    }

    .btn-primary {
        background-color: #5c90ff !important;
    }
    .address-card {
        cursor: pointer;
        transition: all 0.2s;
    }
    .address-card:hover {
        border-color: #5c90ff !important;
        background-color: #f8f9fa;
    }
    .address-card .form-check-input {
        margin-top: 0.25rem;
    }
    .address-details {
        padding-left: 1.5rem;
        color: #6c757d;
    }
</style>