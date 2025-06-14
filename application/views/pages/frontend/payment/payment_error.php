<main class="container py-4">
    <div class="card shadow">
        <div class="card-header bg-danger text-white">
            <h3 class="mb-0"><i class="fas fa-times-circle"></i> Pembayaran Gagal</h3>
        </div>
        <div class="card-body">
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-triangle"></i> Proses pembayaran tidak berhasil diselesaikan.
            </div>
            
            <div class="border p-3 mb-3">
                <h5>Detail Pesanan</h5>
                <p><strong>ID Pesanan:</strong> <?= $order_id ?? 'N/A' ?></p>
                <p><strong>Tanggal:</strong> <?= date('d/m/Y H:i') ?></p>
                <p><strong>Status:</strong> <span class="badge bg-danger">Gagal</span></p>
            </div>
            
            <div class="alert alert-info">
                Silakan coba lagi atau hubungi tim support kami jika masalah berlanjut.
            </div>
            
            <a href="<?= base_url('checkout/retry/'.$order_id) ?>" class="btn btn-danger">
                <i class="fas fa-redo"></i> Coba Lagi
            </a>
            <a href="<?= base_url('contact') ?>" class="btn btn-outline-secondary">
                <i class="fas fa-headset"></i> Hubungi Support
            </a>
        </div>
    </div>
</main>