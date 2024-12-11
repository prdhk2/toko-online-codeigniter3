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
        <div class="col-12">
            <div class="card mx-auto">
                <div class="card-body">
                    <table class="table">
                        <caption>List of New Orders</caption>
                        <thead>
                            <tr class="header-table">
                                <th scope="col">#</th>
                                <th scope="col">Invoice</th>
                                <th scope="col">Customers</th>
                                <th scope="col">Total Rp.</th>
                                <th scope="col">Date Order</th>
                                <th scope="col">Address</th>
                                <th scope="col">Order Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orders as $index => $row) : ?>
                            <tr>
                                <td><?= $index + 1 ; ?></td>
                                <td><?= $row->invoice ; ?></td>
                                <td><?= $row->name ; ?></td>
                                <td>Rp.<?= number_format($row->total, 0, ',', '.') ?></td>
                                <td><?= $row->date ; ?></td>
                                <td><?= $row->address ; ?></td>
                                <td><?= $row->status ; ?></td>
                                <td>
                                    <a href="<?= base_url('neworders/detail/' . $row->id); ?>" class="btn btn-sm btn-primary d-flex align-items-center"><i class="fas fa-eye me-1"></i> Detail Order</a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>