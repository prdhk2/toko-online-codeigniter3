<main role="main" class="container">
    <div class="row">
        <div class="col-md-8">
            <?php $this->load->view('layouts/frontend/_alert') ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Detail Pengiriman
                </div>
                <div class="card-body">
                    <form id="payment-form" action="<?= base_url('checkout/create') ?>" method="POST">
                        <input type="hidden" name="result_type" id="result-type">
                        <input type="hidden" name="result_data" id="result-data">
                        
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" class="form-control" name="name" placeholder="Masukan nama penerima" value="<?= $input->name ?>" required>
                            <?= form_error('name') ?>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <textarea name="address" cols="30" rows="5" class="form-control" required><?= $input->address ?></textarea>
                            <?= form_error('address') ?>
                        </div>
                        <div class="form-group">
                            <label for="">Telepon</label>
                            <input type="text" class="form-control" name="phone" placeholder="Masukan nomor telepon penerima" value="<?= $input->phone ?>" required>
                            <?= form_error('phone') ?>
                        </div>

                        <button class="btn btn-primary" type="submit" id="pay-button">Bayar Sekarang</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            Total
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Produk</th>
                                        <th>Qty</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($cart as $row) : ?>
                                        <tr>
                                            <td><?= $row->title ?></td>
                                            <td><?= $row->qty ?></td>
                                            <td>Rp.<?= number_format($row->price, 0, ',', '.') ?>,-</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Subtotal</td>
                                            <td>Rp.<?= number_format($row->subtotal, 0, ',', '.') ?>,-</td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="2">Total</th>
                                        <th>Rp.<?= number_format(array_sum(array_column($cart, 'subtotal')), 0, ',', '.') ?>,-</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#payment-form').submit(function(event) {
            event.preventDefault();
            var $form = $(this);
            var $button = $('#pay-button');
            
            $button.attr('disabled', true).html('Memproses...');
            
            // Validasi form sebelum proses
            if (!$form[0].checkValidity()) {
                $form[0].reportValidity();
                $button.attr('disabled', false).html('Bayar Sekarang');
                return;
            }
            
            // Ambil data form
            var formData = $form.serialize();
            
            // Kirim data ke server untuk mendapatkan token Snap
            $.ajax({
                url: '<?= site_url('snap/token') ?>',
                type: 'POST',
                data: formData,
                dataType: 'json',
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                success: function(response) {
                    console.log('Response:', response); // Debug response
                    
                    if(response && response.token) {
                        snap.pay(response.token, {
                            onSuccess: function(result) {
                                console.log('success', result);
                                $('#result-type').val('success');
                                $('#result-data').val(JSON.stringify(result));
                                $form.unbind('submit').submit();
                            },
                            onPending: function(result) {
                                console.log('pending', result);
                                $('#result-type').val('pending');
                                $('#result-data').val(JSON.stringify(result));
                                $form.unbind('submit').submit();
                            },
                            onError: function(result) {
                                console.log('error', result);
                                $('#result-type').val('error');
                                $('#result-data').val(JSON.stringify(result));
                                $form.unbind('submit').submit();
                            },
                            onClose: function() {
                                $button.attr('disabled', false).html('Bayar Sekarang');
                            }
                        });
                    } else {
                        console.error('Invalid response:', response);
                        alert('Gagal mendapatkan token pembayaran. Silakan coba lagi.');
                        $button.attr('disabled', false).html('Bayar Sekarang');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', xhr.responseText);
                    try {
                        var err = JSON.parse(xhr.responseText);
                        alert('Error: ' + (err.message || 'Terjadi kesalahan'));
                    } catch (e) {
                        alert('Terjadi kesalahan: ' + error);
                    }
                    $button.attr('disabled', false).html('Bayar Sekarang');
                }
            });
        });
    });
</script>