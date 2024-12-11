<div class="page-wrapper">
    <div class="row">
        <div class="col-12 mx-auto">
            <?php $this->load->view('layouts/frontend/_alert') ?>
        </div>
    </div>

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">List Product</h4>
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
                        <caption>List of Products</caption>
                        <thead>
                            <tr class="header-table">
                                <th scope="col">#</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Product Image</th>
                                <th scope="col">Price</th>
                                <th scope="col">Description</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($content as $index => $row) : ?>
                            <tr>
                                <th scope="row"><?= $index + 1 ?></th>
                                <td><?= $row->title ?></td>
                                <td><?= $row->slug ?></td>
                                <td><img src="<?= base_url('./images/product/' . $row->image) ?>" alt="<?= $row->title ?>" width="100"></td>
                                <td>Rp.<?= number_format($row->price, 0, ',', '.') ?></td>
                                <td>
                                    <?php 
                                    $description = trim_text($row->description, 10);
                                    echo $description;
                                    if (str_word_count($row->description) > 10) {
                                        echo ' <a href="' . base_url('product/detail/' . $row->id) . '">Read More</a>';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <div class="d-flex gap-2 justify-content-center align-items-center">
                                        <a href="<?= base_url('product/detail/' . $row->id); ?>" class="btn btn-sm btn-info d-flex align-items-center">
                                            <i class="fas fa-eye me-1"></i> Detail
                                        </a>
                                        <a href="<?= base_url('admin/product/edit/' . $row->id); ?>" class="btn btn-sm btn-warning d-flex align-items-center">
                                            <i class="fas fa-pencil-alt me-1"></i> Edit
                                        </a>
                                        <a href="<?= base_url('admin/product/delete/' . $row->id); ?>" class="btn btn-sm btn-danger d-flex align-items-center" onclick="return confirm('Are you sure you want to delete this product?');">
                                            <i class="fas fa-trash me-1"></i> Delete
                                        </a>
                                    </div>
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