<div class="container py-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><i class="fas fa-map-marker-alt"></i> Tambah Alamat Baru</h4>
        </div>
        <div class="card-body">
            <form id="addressForm" action="<?= base_url('address/store') ?>" method="post">
                <input type="hidden" name="from_checkout" value="<?= isset($from_checkout) ? 1 : 0 ?>">
                
                <!-- Informasi Penerima -->
                <div class="mb-4">
                    <h5 class="text-primary"><i class="fas fa-user"></i> Informasi Penerima</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama Penerima <span class="text-danger">*</span></label>
                            <input type="text" name="recipient_name" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">No. Telepon <span class="text-danger">*</span></label>
                            <input type="tel" name="phone" class="form-control" required>
                        </div>
                    </div>
                </div>

                <!-- Detail Alamat -->
                <div class="mb-4">
                    <h5 class="text-primary"><i class="fas fa-home"></i> Detail Alamat</h5>
                    <div class="mb-3">
                        <label class="form-label">Alamat Lengkap <span class="text-danger">*</span></label>
                        <textarea name="address_line1" class="form-control" rows="2" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Detail Tambahan</label>
                        <textarea name="address_line2" class="form-control" rows="2"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Provinsi <span class="text-danger">*</span></label>
                            <select name="province_id" id="province" class="form-select" required>
                                <option value="">Pilih Provinsi</option>
                                <?php foreach($provinces as $province): ?>
                                    <option value="<?= $province->id ?>"><?= $province->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Kota/Kabupaten <span class="text-danger">*</span></label>
                            <select name="city_id" id="city" class="form-select" disabled required>
                                <option value="">Pilih Kota</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Kecamatan <span class="text-danger">*</span></label>
                            <select name="district_id" id="district" class="form-select" disabled required>
                                <option value="">Pilih Kecamatan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Kode Pos <span class="text-danger">*</span></label>
                            <input type="text" name="postal_code" id="postal_code" class="form-control" required>
                        </div>
                    </div>
                </div>

                <!-- Pengaturan Alamat -->
                <div class="mb-4">
                    <h5 class="text-primary"><i class="fas fa-cog"></i> Pengaturan Alamat</h5>
                    <div class="form-check">
                        <input type="checkbox" name="is_primary" id="is_primary" class="form-check-input">
                        <label for="is_primary" class="form-check-label">Jadikan sebagai alamat utama</label>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="<?= isset($from_checkout) ? base_url('checkout') : base_url('profile/addresses') ?>" 
                       class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan Alamat
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Load kota berdasarkan provinsi
    $('#province').change(function() {
        var provinceId = $(this).val();
        $('#city').prop('disabled', !provinceId);
        $('#district').prop('disabled', true).html('<option value="">Pilih Kecamatan</option>');
        $('#postal_code').val('');
        
        if (provinceId) {
            $.ajax({
                url: '<?= base_url("address/get_cities") ?>',
                type: 'POST',
                data: { province_id: provinceId },
                dataType: 'json',
                success: function(cities) {
                    var options = '<option value="">Pilih Kota</option>';
                    $.each(cities, function(key, city) {
                        options += '<option value="'+city.id+'">'+city.name+'</option>';
                    });
                    $('#city').html(options);
                }
            });
        }
    });

    // Load kecamatan berdasarkan kota
    $('#city').change(function() {
        var cityId = $(this).val();
        $('#district').prop('disabled', !cityId);
        $('#postal_code').val('');
        
        if (cityId) {
            $.ajax({
                url: '<?= base_url("address/get_districts") ?>',
                type: 'POST',
                data: { city_id: cityId },
                dataType: 'json',
                success: function(districts) {
                    var options = '<option value="">Pilih Kecamatan</option>';
                    $.each(districts, function(key, district) {
                        options += '<option value="'+district.id+'">'+district.name+'</option>';
                    });
                    $('#district').html(options);
                }
            });
        }
    });

    // Auto-fill kode pos
    $('#district').change(function() {
        var districtId = $(this).val();
        if (districtId) {
            $.ajax({
                url: '<?= base_url("region/get_postal_code") ?>',
                type: 'POST',
                data: { district_id: districtId },
                success: function(postalCode) {
                    $('#postal_code').val(postalCode);
                }
            });
        }
    });
});
</script>