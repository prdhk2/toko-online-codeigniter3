<main class="container py-4">
    <div class="card shadow">
        <div class="card-header bg-warning text-dark">
            <h3 class="mb-0"><i class="fas fa-clock"></i> Pembayaran Tertunda</h3>
        </div>
        <div class="card-body">
            <div class="alert alert-warning">
                <i class="fas fa-info-circle"></i> Pembayaran Anda masih dalam proses verifikasi.
            </div>
            
            <div class="border p-3 mb-3">
                <h5>Detail Pesanan</h5>
                <p><strong>ID Pesanan:</strong> <?= $order_id ?? 'N/A' ?></p>
                <p><strong>Metode Pembayaran:</strong> <?= $payment_method ?? 'N/A' ?></p>
                <p><strong>Tanggal:</strong> <?= date('d/m/Y H:i') ?></p>
                <p><strong>Status:</strong> <span class="badge bg-warning">Pending</span></p>
            </div>
            
            <div class="alert alert-info">
                Silakan selesaikan pembayaran dalam 24 jam untuk menghindari pembatalan otomatis.
            </div>
            
            <a href="<?= base_url('payment/retry/'.$order_id) ?>" class="btn btn-warning">
                <i class="fas fa-credit-card"></i> Coba Bayar Lagi
            </a>
            <a href="<?= base_url('orders') ?>" class="btn btn-outline-secondary">
                <i class="fas fa-list"></i> Lihat Daftar Pesanan
            </a>
        </div>
    </div>
</main>