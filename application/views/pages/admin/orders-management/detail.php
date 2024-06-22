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
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">
                    Detail Order
                </div>
                <div class="card-body">
                    <h5>Order Information</h5>
                    <table class="table table-bordered" id="order-details">
                        <tr>
                            <th style="text-align: start;">Invoice</th>
                            <td><?= $order->invoice ?></td>
                        </tr>
                        <tr>
                            <th style="text-align: start;">Order Date</th>
                            <td><?= $order->date ?></td>
                        </tr>
                        <tr>
                            <th style="text-align: start;">Total Amount</th>
                            <td>Rp.<?= number_format($order->total, 0, ',', '.') ?>,-</td>
                        </tr>
                        <tr>
                            <th style="text-align: start;">Customer Name</th>
                            <td><?= $order->name ?></td>
                        </tr>
                        <tr>
                            <th style="text-align: start;">Address</th>
                            <td><?= $order->address ?></td>
                        </tr>
                        <tr>
                            <th style="text-align: start;">Phone</th>
                            <td><?= $order->phone ?></td>
                        </tr>
                    </table>

                    <h6>Order Items</h6>
                    <table class="table table-bordered" id="order-items">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($order_items as $item) : ?>
                                <tr>
                                    <td><?= $item->product_title ?></td>
                                    <td class="text-center">Rp.<?= number_format($item->price, 0, ',', '.') ?>,-</td>
                                    <td class="text-center"><?= $item->qty ?></td>
                                    <td class="text-center">Rp.<?= number_format($item->subtotal, 0, ',', '.') ?>,-</td>
                                </tr>
                            <?php endforeach ?>
                            <tr>
                                <td colspan="3"><strong>Total:</strong></td>
                                <td class="text-center"><strong>Rp.<?= number_format($order->total, 0, ',', '.') ?>,-</strong></td>
                            </tr>
                        </tbody>
                    </table>

                    <?php if ($order_confirm): ?>
                        <h6>Order Confirmation</h6>
                        <table class="table table-bordered">
                            <tr>
                                <th>Account Name</th>
                                <td><?= $order_confirm->account_name ?></td>
                            </tr>
                            <tr>
                                <th>Account Number</th>
                                <td><?= $order_confirm->account_number ?></td>
                            </tr>
                            <tr>
                                <th>Nominal</th>
                                <td>Rp.<?= number_format($order_confirm->nominal, 0, ',', '.') ?>,-</td>
                            </tr>
                            <tr>
                                <th>Note</th>
                                <td><?= $order_confirm->note ?></td>
                            </tr>
                            <tr>
                                <th>Transfer Proof</th>
                                <td>
                                    <img src="<?= base_url("images/confirm/{$order_confirm->image}") ?>" alt="Transfer Proof" class="img-thumbnail" width="300px">
                                </td>
                            </tr>
                        </table>
                        <?php if ($order->status == 'waiting'): ?>
                            <a href="<?= base_url('order/confirm/' . $order->id) ?>" class="btn btn-success" onclick="return confirm('Are you sure you want to confirm this order?')">Confirm Order</a>
                        <?php endif; ?>
                    <?php else: ?>
                        <p>No confirmation found for this order.</p>
                    <?php endif; ?>
                </div>
                <div class="card-footer">
                    <a href="<?= base_url('neworders/newOrders') ?>" class="btn btn-danger text-white"><i class="fas fa-angle-left"></i> Back to Orders</a>
                    <button onclick="printOrderDetails()" class="btn btn-info"><i class="fas fa-print"></i> Print</button>
                </div>
            </div>
        </div>
    </div>
</main>
