<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice <?= $order->invoice ?></title>
    <style>
        /* Base Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            line-height: 1.6;
        }
        
        .invoice-container {
            max-width: 800px;
            margin: 20px auto;
            background: white;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0,0,0,0.08);
            overflow: hidden;
        }
        
        /* Header Section */
        .invoice-header {
            background: linear-gradient(135deg, #03a9f4 0%, #2a5bd7 100%);
            color: white;
            padding: 25px 30px;
            position: relative;
        }
        
        .invoice-header:after {
            content: "";
            position: absolute;
            bottom: -10px;
            left: 0;
            right: 0;
            height: 10px;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none"><path fill="rgba(255,255,255,0.9)" d="M0,0V100c0,0,224.4,35.1,500,0C775.6,35.1,1000,100,1000,100V0H0z"></path></svg>');
            background-size: 100% 100%;
        }
        
        .invoice-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .invoice-title h2 {
            margin: 0;
            font-size: 24px;
            font-weight: 700;
        }
        
        .invoice-number {
            font-size: 18px;
            background: rgba(255,255,255,0.2);
            padding: 8px 15px;
            border-radius: 20px;
        }
        
        /* Store Info */
        .store-info {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        
        .store-logo {
            width: 120px;
            height: 120px;
            background-color: white;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        
        .store-logo img {
            max-width: 80%;
            max-height: 80%;
        }
        
        .store-details {
            flex: 1;
            padding-left: 25px;
        }
        
        .store-name {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 5px;
        }
        
        .store-address {
            font-size: 14px;
            opacity: 0.9;
        }
        
        /* Order Info */
        .order-info {
            padding: 25px 30px;
            background: white;
        }
        
        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 25px;
        }
        
        .info-box {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
        }
        
        .info-label {
            font-size: 12px;
            text-transform: uppercase;
            color: #666;
            margin-bottom: 5px;
            font-weight: 600;
        }
        
        .info-value {
            font-size: 16px;
            font-weight: 500;
        }
        
        .status-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
        }
        
        .status-paid {
            background: #d4edda;
            color: #155724;
        }
        
        /* Items Table */
        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        .items-table th {
            background: #f1f3f5;
            padding: 12px 15px;
            text-align: left;
            font-size: 14px;
            color: #555;
        }
        
        .items-table td {
            padding: 15px;
            border-bottom: 1px solid #eee;
            vertical-align: top;
        }
        
        .product-name {
            font-weight: 500;
        }
        
        .text-right {
            text-align: right;
        }
        
        .text-center {
            text-align: center;
        }
        
        .total-row {
            background: #f8f9fa;
            font-weight: 600;
        }
        
        /* Footer */
        .invoice-footer {
            padding: 20px 30px;
            background: #f8f9fa;
            border-top: 1px solid #eee;
            text-align: center;
            font-size: 14px;
            color: #666;
        }
        
        /* Print Styles */
        @media print {
            body {
                background: white;
                padding: 0;
                margin: 0;
                font-size: 12px;
            }
            
            .invoice-container {
                box-shadow: none;
                border-radius: 0;
                margin: 0;
                max-width: 100%;
            }
            
            .no-print {
                display: none !important;
            }
            
            .invoice-header {
                padding: 15px 20px;
            }
            
            .order-info {
                padding: 15px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <!-- Header -->
        <div class="invoice-header">
            <div class="invoice-title">
                <h2>INVOICE</h2>
                <div class="invoice-number"><?= $order->invoice ?></div>
            </div>
            
            <div class="store-info">
                <div class="store-logo">
                    <img src="<?= base_url('assets/images/logo.png') ?>" alt="BakulSayur Logo">
                </div>
                <div class="store-details">
                    <div class="store-name">BakulSayur</div>
                    <div class="store-address">
                        Jl. Raya Bekasi No. 123<br>
                        Jakarta, Indonesia<br>
                        Phone: (021) 1234-5678<br>
                        Email: info@bakulsayur.com
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Order Information -->
        <div class="order-info">
            <div class="info-grid">
                <div class="info-box">
                    <div class="info-label">Order Date</div>
                    <div class="info-value"><?= date('d M Y H:i', strtotime($order->date)) ?></div>
                </div>
                <div class="info-box">
                    <div class="info-label">Payment Method</div>
                    <div class="info-value">BCA Virtual Account</div>
                </div>
                <div class="info-box">
                    <div class="info-label">Customer Name</div>
                    <div class="info-value"><?= $order->name ?></div>
                </div>
                <div class="info-box">
                    <div class="info-label">Order Status</div>
                    <div class="info-value">
                        <span class="status-badge status-<?= $order->status ?>">
                            <?= ucfirst($order->status) ?>
                        </span>
                    </div>
                </div>
            </div>
            
            <!-- Order Items -->
            <table class="items-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th class="text-right">Price</th>
                        <th class="text-center">Qty</th>
                        <th class="text-right">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($order_items as $item) : ?>
                    <tr>
                        <td class="product-name"><?= $item->product_title ?></td>
                        <td class="text-right">Rp<?= number_format($item->product_price, 0, ',', '.') ?></td>
                        <td class="text-center"><?= $item->qty ?></td>
                        <td class="text-right">Rp<?= number_format($item->subtotal, 0, ',', '.') ?></td>
                    </tr>
                    <?php endforeach ?>
                    
                    <tr class="total-row">
                        <td colspan="3" class="text-right"><strong>Total</strong></td>
                        <td class="text-right"><strong>Rp<?= number_format($order->total, 0, ',', '.') ?></strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <!-- Footer -->
        <div class="invoice-footer">
            <p>Thank you for shopping with BakulSayur</p>
            <p>Invoice generated on <?= date('d M Y H:i') ?></p>
        </div>
    </div>
    
    <!-- Back button (hidden when printing) -->
    <div class="no-print" style="text-align: center; margin: 20px 0;">
        <button onclick="window.print()" class="btn-print" style="background: #2a5bd7; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; font-size: 16px;">
            <i class="fas fa-print"></i> Print Invoice
        </button>
        <a href="<?= $_SERVER['HTTP_REFERER'] ?? base_url('neworders/newOrders') ?>" style="display: inline-block; margin-left: 10px; padding: 10px 20px; background: #6c757d; color: white; text-decoration: none; border-radius: 5px;">
            <i class="fas fa-arrow-left"></i> Back to Orders
        </a>
    </div>
    
    <script>
        // Auto print if needed
        function printInvoice() {
            window.print();
        }
        
        // Uncomment to auto print when page loads
        // window.onload = printInvoice;
    </script>
</body>
</html>