<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran - <?= $this->config->item('app_name') ?></title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        /* .container {
            max-width: 800px;
            margin: 40px auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        } */
        /* Main Styles */
        .shadow-custom {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        
        .shadow-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12);
        }
        
        .bg-gradient-success {
            background: linear-gradient(135deg, #0d6efd,rgb(96, 159, 255));
        }
        
        /* Checkmark Animation */
        .checkmark__circle {
            stroke-dasharray: 166;
            stroke-dashoffset: 166;
            stroke-width: 2;
            stroke-miterlimit: 10;
            fill: none;
            animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
        }
        
        .checkmark__check {
            transform-origin: 50% 50%;
            stroke-dasharray: 48;
            stroke-dashoffset: 48;
            stroke-width: 4;
            stroke-miterlimit: 10;
            animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
        }
        
        @keyframes stroke {
            100% { stroke-dashoffset: 0; }
        }
        
        /* Confetti Animation */
        @keyframes confettiFall {
            0% { transform: translateY(-10px) rotate(0deg); opacity: 1; }
            100% { transform: translateY(100px) rotate(360deg); opacity: 0; }
        }
        
        /* Responsive adjustments */
        @media (max-width: 576px) {
            .card-header {
                padding: 1.5rem 1rem;
            }
            .checkmark-animation {
                margin-right: 1rem;
            }
            .checkmark {
                width: 36px;
                height: 36px;
            }
        }
    </style>
</head>
<body>
    <main class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
        <div class="card shadow-custom mx-3" style="max-width: 600px; width: 100%; border-radius: 12px; overflow: hidden; border: none;">
            <!-- Header with gradient -->
            <div class="card-header bg-gradient-success text-white py-4 px-4 position-relative overflow-hidden">
                <div class="position-absolute w-100 h-100 top-0 start-0" id="confetti-container"></div>
                <div class="d-flex align-items-center position-relative">
                    <div class="checkmark-animation me-3">
                        <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52" width="48" height="48">
                            <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" stroke="#fff" stroke-width="2"/>
                            <path class="checkmark__check" fill="none" stroke="#fff" stroke-width="4" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="mb-1 fw-bold fs-3">Pembayaran Berhasil!</h2>
                        <p class="mb-0 opacity-90">Terima kasih atas pembelian Anda</p>
                    </div>
                </div>
            </div>

            <!-- Card Body -->
            <div class="card-body p-4">
                <div class="text-center mb-4">
                    <p class="text-success fw-medium mb-4">
                        <i class="fas fa-check-circle me-2"></i> Pembayaran Anda telah berhasil diproses
                    </p>
                </div>

                <!-- Order details -->
                <div class="bg-light p-3 rounded-3 mb-4">
                    <h6 class="mb-3 fw-semibold"><i class="fas fa-receipt me-2 text-success"></i>Detail Pesanan</h6>
                    <div class="row g-2">
                        <div class="col-md-6">
                            <p class="mb-2"><strong>ID Pesanan:</strong><br>
                            <span class="text-muted"><?= $order->invoice ?? 'N/A' ?></span></p>
                            
                            <p class="mb-0"><strong>Tanggal:</strong><br>
                            <span class="text-muted"><?= date('d/m/Y H:i', strtotime($order->date)) ?></span></p>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-2"><strong>Pengiriman:</strong><br>
                            <span class="text-muted">Sedang diproses</span></p>
                            
                            <p class="mb-0"><strong>Status Pembayaran:</strong><br>
                            <span class="badge bg-success rounded-pill px-3 py-1">Sukses</span></p>
                            <p class="mb-0"><strong>Status Pesanan:</strong><br>
                            <span class="badge bg-success rounded-pill px-3 py-1"><?= ucfirst($order->status) ?></span></p>
                        </div>
                    </div>
                </div>

                <!-- Action buttons -->
                <div class="d-flex flex-column flex-md-row gap-3 justify-content-center">
                    <a href="<?= base_url('orders/detail/'.$order->id) ?>" class="btn btn-primary py-2 px-4 fw-medium">
                        <i class="fas fa-receipt me-2"></i> Lihat Detail Pesanan
                    </a>
                    <a href="<?= base_url() ?>" class="btn btn-outline-secondary py-2 px-4 fw-medium">
                        <i class="fas fa-home me-2"></i> Kembali ke Beranda
                    </a>
                </div>

                <p class="text-center text-muted mt-4 mb-0 small">
                    <i class="fas fa-info-circle me-1"></i> Email konfirmasi telah dikirim ke alamat Anda
                </p>
            </div>
        </div>
    </main>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.getElementById('confetti-container');
        const colors = ['#28a745', '#20c997', '#ffffff', '#f8f9fa', '#e9ecef'];
        
        for (let i = 0; i < 20; i++) {
            const confetti = document.createElement('div');
            confetti.style.position = 'absolute';
            confetti.style.width = `${Math.random() * 8 + 4}px`;
            confetti.style.height = confetti.style.width;
            confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
            confetti.style.borderRadius = '50%';
            confetti.style.left = `${Math.random() * 100}%`;
            confetti.style.top = `${Math.random() * -20}px`;
            confetti.style.opacity = Math.random() * 0.6 + 0.4;
            confetti.style.animation = `confettiFall ${Math.random() * 3 + 2}s linear ${Math.random() * 2}s infinite`;
            
            container.appendChild(confetti);
        }
    });
</script>
</body>
</html>