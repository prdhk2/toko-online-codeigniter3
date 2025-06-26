<div class="page-wrapper">
    <div class="row">
        <div class="col-12 mx-auto">
            <?php $this->load->view('layouts/frontend/_alert') ?>
        </div>
    </div>

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">New Order</h4>
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
    
    <div class="container-fluid" >
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4" >
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Detail Order</h5>
                    </div>
                    <div class="card-body" id="print-area">
                        <div class="mb-4">
                            <h5 class="card-title text-primary">Order Information</h5>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <th width="25%" class="text-start">Invoice</th>
                                        <td><?= $order->invoice ?></td>
                                    </tr>
                                    <tr>
                                        <th class="text-start">Order Date</th>
                                        <td><?= date('d M Y H:i', strtotime($order->date)) ?></td>
                                    </tr>
                                    <tr>
                                        <th class="text-start">Payment Method</th>
                                        <td>BCA Virtual Account</td>
                                    </tr>
                                    <tr>
                                        <th class="text-start">Total Amount</th>
                                        <td>Rp <?= number_format($order->total, 0, ',', '.') ?></td>
                                    </tr>
                                    <tr>
                                        <th class="text-start">Customer Name</th>
                                        <td><?= $order->name ?></td>
                                    </tr>
                                    <tr>
                                        <th class="text-start">Address</th>
                                        <td><?= $order->address ?></td>
                                    </tr>
                                    <tr>
                                        <th class="text-start">Phone</th>
                                        <td><?= $order->phone ?></td>
                                    </tr>
                                    <tr>
                                        <th class="text-start">Status</th>
                                        <td>
                                            <span class="badge bg-<?= 
                                                ($order->status == 'paid') ? 'success' : 
                                                (($order->status == 'waiting') ? 'warning' : 'primary') 
                                            ?>">
                                                <?= ucfirst($order->status) ?>
                                            </span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h5 class="card-title text-primary">Order Items</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>Product</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Quantity</th>
                                            <th class="text-center">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $calculated_total = 0;
                                        foreach ($order_items as $item) : 
                                            $correct_subtotal = $item->product_price * $item->qty;
                                            $calculated_total += $correct_subtotal;
                                        ?>
                                            <tr>
                                                <td><?= $item->product_title ?></td>
                                                <td class="text-center">Rp <?= number_format($item->product_price, 0, ',', '.') ?></td>
                                                <td class="text-center"><?= $item->qty ?></td>
                                                <td class="text-center">Rp <?= number_format($correct_subtotal, 0, ',', '.') ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                        <tr class="table-active">
                                            <td colspan="3" class="text-end"><strong>Total:</strong></td>
                                            <td class="text-center"><strong>Rp <?= number_format($calculated_total, 0, ',', '.') ?></strong></td>
                                        </tr>
                                        <?php if($calculated_total != $order->total): ?>
                                        <tr class="table-warning">
                                            <td colspan="4" class="text-center text-danger">
                                                <i class="fas fa-exclamation-triangle"></i> Warning: Calculated total (Rp <?= number_format($calculated_total, 0, ',', '.') ?>) doesn't match order total (Rp <?= number_format($order->total, 0, ',', '.') ?>)
                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-footer text-center">
                        <a href="<?= $_SERVER['HTTP_REFERER'] ?? base_url('neworders/newOrders') ?>" class="btn btn-secondary me-2">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>
    
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
@media print {
    body, html {
        margin: 0 !important;
        padding: 0 !important;
        width: 100%;
        height: auto;
    }

    #print-area {
        margin: 0 auto !important;
        padding: 0 !important;
        width: 100% !important;
        max-width: 800px; /* Batasi agar kontennya tetap proporsional di tengah */
    }

    .container-fluid, .row, .col-md-12 {
        all: unset !important;
        display: block;
        width: 100% !important;
    }

    .card {
        box-shadow: none !important;
        border: none !important;
    }

    .card-body, .card-header {
        padding: 0 !important;
    }

    .table {
        width: 100% !important;
        margin: 0 !important;
    }

    .breadcrumb,
    .card-footer,
    .btn,
    .page-breadcrumb {
        display: none !important;
    }

    footer, header, nav, aside {
        display: none !important;
    }
}

</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('printBtn')?.addEventListener('click', function () {
        window.print();
    });
});
</script>