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
    
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #6777ef;
            --secondary-color: #f4f6f9;
            --accent-color: #ff6b6b;
        }
        
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
        }
        
        .payment-container {
            max-width: 800px;
            margin: 40px auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }
        
        .payment-header {
            background: linear-gradient(135deg, var(--primary-color), #8a63ff);
            color: white;
            padding: 25px;
            text-align: center;
        }
        
        .payment-body {
            padding: 30px;
        }
        
        .payment-steps {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            position: relative;
        }
        
        .payment-steps:before {
            content: '';
            position: absolute;
            top: 15px;
            left: 0;
            right: 0;
            height: 2px;
            background: #e0e0e0;
            z-index: 1;
        }
        
        .step {
            text-align: center;
            position: relative;
            z-index: 2;
        }
        
        .step-number {
            width: 32px;
            height: 32px;
            background: #e0e0e0;
            color: #999;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 8px;
            font-weight: bold;
        }
        
        .step.active .step-number {
            background: var(--primary-color);
            color: white;
        }
        
        .step.completed .step-number {
            background: #4caf50;
            color: white;
        }
        
        .step-text {
            font-size: 12px;
            color: #999;
        }
        
        .step.active .step-text,
        .step.completed .step-text {
            color: var(--primary-color);
            font-weight: 500;
        }
        
        .payment-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.03);
            margin-bottom: 20px;
            overflow: hidden;
        }
        
        .payment-methods .btn-method {
            display: block;
            width: 100%;
            padding: 15px;
            text-align: left;
            border: 1px solid #eee;
            border-radius: 8px;
            margin-bottom: 10px;
            transition: all 0.3s;
        }
        
        .payment-methods .btn-method:hover {
            border-color: var(--primary-color);
            background: rgba(103, 119, 239, 0.05);
        }
        
        .payment-methods .btn-method.active {
            border-color: var(--primary-color);
            background: rgba(103, 119, 239, 0.1);
        }
        
        .method-icon {
            width: 40px;
            height: 40px;
            background: #f5f5f5;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: var(--primary-color);
        }
        
        .btn-pay {
            background: linear-gradient(135deg, var(--primary-color), #8a63ff);
            border: none;
            padding: 12px 25px;
            font-weight: 600;
            border-radius: 8px;
            width: 100%;
            margin-top: 20px;
        }
        
        .btn-pay:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }
        
        .payment-footer {
            text-align: center;
            padding: 20px;
            background: var(--secondary-color);
            border-top: 1px solid #eee;
        }
        
        @media (max-width: 576px) {
            .payment-container {
                margin: 0;
                border-radius: 0;
            }
            
            .payment-header {
                padding: 20px 15px;
            }
            
            .payment-body {
                padding: 20px 15px;
            }
        }
    </style>
</head>
<body>
    <div class="payment-container">
        <div class="payment-header">
            <h3><i class="fas fa-lock me-2"></i> Pembayaran Aman</h3>
            <p class="mb-0">Selesaikan pembayaran untuk menyelesaikan pesanan Anda</p>
        </div>
        
        <div class="payment-body">
            <!-- Progress Steps -->
            <div class="payment-steps">
                <div class="step completed">
                    <div class="step-number">1</div>
                    <div class="step-text">Keranjang</div>
                </div>
                <div class="step completed">
                    <div class="step-number">2</div>
                    <div class="step-text">Checkout</div>
                </div>
                <div class="step active">
                    <div class="step-number">3</div>
                    <div class="step-text">Pembayaran</div>
                </div>
            </div>
            
            <!-- Payment Info -->
            <div class="alert alert-info">
                <i class="fas fa-info-circle me-2"></i> Anda akan diarahkan ke halaman pembayaran Midtrans yang aman
            </div>
            
            <!-- Payment Methods -->
            <div class="payment-methods">
                <h5 class="mb-3"><i class="fas fa-credit-card me-2"></i> Metode Pembayaran</h5>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <button class="btn-method active">
                            <div class="d-flex align-items-center">
                                <div class="method-icon">
                                    <i class="fas fa-credit-card"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">Kartu Kredit/Debit</h6>
                                    <small class="text-muted">Visa, Mastercard, JCB</small>
                                </div>
                            </div>
                        </button>
                    </div>
                    <div class="col-md-6 mb-3">
                        <button class="btn-method">
                            <div class="d-flex align-items-center">
                                <div class="method-icon">
                                    <i class="fas fa-mobile-alt"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">E-Wallet</h6>
                                    <small class="text-muted">Gopay, OVO, Dana, LinkAja</small>
                                </div>
                            </div>
                        </button>
                    </div>
                    <div class="col-md-6 mb-3">
                        <button class="btn-method">
                            <div class="d-flex align-items-center">
                                <div class="method-icon">
                                    <i class="fas fa-university"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">Transfer Bank</h6>
                                    <small class="text-muted">BCA, BRI, Mandiri, BNI</small>
                                </div>
                            </div>
                        </button>
                    </div>
                    <div class="col-md-6 mb-3">
                        <button class="btn-method">
                            <div class="d-flex align-items-center">
                                <div class="method-icon">
                                    <i class="fas fa-store"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">Gerai Retail</h6>
                                    <small class="text-muted">Alfamart, Indomaret</small>
                                </div>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Midtrans Payment Button -->
            <button id="pay-button" class="btn btn-pay">
                <i class="fas fa-lock me-2"></i> Lanjutkan ke Pembayaran
            </button>
        </div>
        
        <div class="payment-footer">
            <img src="https://midtrans.com/img/logo_midtrans.png" alt="Midtrans" height="30" class="me-3">
            <img src="https://midtrans.com/img/verified-by-visa.png" alt="Verified by Visa" height="30" class="me-3">
            <img src="https://midtrans.com/img/mastercard-securecode.png" alt="Mastercard SecureCode" height="30">
        </div>
    </div>

    <!-- Midtrans Snap JS -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?= $this->config->item('midtrans_client_key') ?>"></script>
    
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle payment button click
            document.getElementById('pay-button').addEventListener('click', function() {
                // Show loading state
                this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Memproses...';
                this.disabled = true;
                
                // Trigger Snap payment
                snap.pay('<?= $snap_token ?>', {
                    onSuccess: function(result) {
                        window.location.href = '<?= base_url('payment/finish') ?>';
                    },
                    onPending: function(result) {
                        window.location.href = '<?= base_url('payment/unfinish') ?>?order_id=' + result.order_id;
                    },
                    onError: function(result) {
                        window.location.href = '<?= base_url('payment/error') ?>';
                    },
                    onClose: function() {
                        document.getElementById('pay-button').innerHTML = '<i class="fas fa-lock me-2"></i> Lanjutkan ke Pembayaran';
                        document.getElementById('pay-button').disabled = false;
                    }
                });
            });
            
            // Simulate method selection
            document.querySelectorAll('.btn-method').forEach(btn => {
                btn.addEventListener('click', function() {
                    document.querySelectorAll('.btn-method').forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                });
            });
        });
    </script>
</body>
</html>