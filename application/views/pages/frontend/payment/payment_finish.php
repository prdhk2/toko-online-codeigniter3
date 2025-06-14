<main class="container py-4">
    <div class="card shadow">
        <div class="card-header bg-success text-white">
            <h3 class="mb-0"><i class="fas fa-check-circle"></i> Pembayaran Berhasil</h3>
        </div>
        <div class="card-body">
            <div class="alert alert-success">
                <i class="fas fa-check"></i> Pembayaran Anda telah berhasil diproses.
            </div>
            
            <div class="border p-3 mb-3">
                <h5>Detail Pesanan</h5>
                <p><strong>ID Pesanan:</strong> <?= $order_id ?? 'N/A' ?></p>
                <p><strong>Tanggal:</strong> <?= date('d/m/Y H:i') ?></p>
                <p><strong>Status:</strong> <span class="badge bg-success">Sukses</span></p>
            </div>
            
            <a href="<?= base_url('orders/detail/'.$order_id) ?>" class="btn btn-primary">
                <i class="fas fa-receipt"></i> Lihat Detail Pesanan
            </a>
            <a href="<?= base_url() ?>" class="btn btn-outline-secondary">
                <i class="fas fa-home"></i> Kembali ke Beranda
            </a>
        </div>
    </div>
</main>