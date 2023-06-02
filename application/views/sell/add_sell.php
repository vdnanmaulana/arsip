<!-- Page Container START -->
<div class="page-container">

    <div class="main-content">

        <?php echo form_open_multipart('manage_sell/save_data', array('id' => 'savedata')); ?>
        <div class="page-header no-gutters has-tab">
            <div class="d-md-flex m-b-15 align-items-center justify-content-between">
                <div class="media align-items-center m-b-15">
                    <!-- <div class="avatar avatar-image rounded" style="height: 70px; width: 70px">
                            <img src="<?= base_url() ?>assets/images/netflix.png" alt="">
                        </div> -->
                    <div class="m-l-15">
                        <h4 class="m-b-0">Tambah Penjualan</h4>
                        <p class="text-muted m-b-0">Tambah data penjualan</p>
                    </div>
                </div>
                <div class="m-b-15">
                    <button class="btn btn-primary">
                        <i class="anticon anticon-save"></i>
                        <span>Simpan</span>
                    </button>
                </div>
            </div>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#product-edit-basic">Info Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#product-edit-option">Opsi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#product-edit-description">Catatan Tambahan</a>
                </li>
            </ul>
        </div>
        <div class="tab-content m-t-15">
            <div class="tab-pane fade show active" id="product-edit-basic">
                <?php echo $this->session->flashdata('error');
                ?>
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label class="font-weight-semibold" for="image">Gambar</label>
                            <div class="bubble mb-2">
                                <div class="bubble-wrapper p-5">
                                    <img id="previewImage" style="height:200px; width:200px; object-fit:cover" src="<?= base_url() ?>assets/images/netflix.png">
                                </div>
                            </div>
                            <div class="custom-file">
                                <input name="image" type="file" class="custom-file-input" id="imageInput">
                                <label class="custom-file-label" for="imageInput">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-semibold" for="customer_name">Nama Customer</label>
                            <input type="text" class="form-control" name="customer_name" placeholder="Nama Customer">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-semibold" for="ecommerce_acc">Username Shopee/Tokped/Dll</label>
                            <input type="text" class="form-control" name="ecommerce_acc" placeholder="Username Shopee/Tokped/Dll">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-semibold" for="username">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-semibold" for="password">Password Akun</label>
                            <input type="text" class="form-control" name="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-semibold" for="phone">Nomor HP Customer</label>
                            <input type="text" class="form-control" name="phone" placeholder="Nomor HP Customer">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-semibold" for="customer_email">Email Customer</label>
                            <input type="text" class="form-control" name="customer_email" placeholder="Email Customer">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-semibold" for="id_category">Produk digital yang dibeli?</label>
                            <select class="custom-select" name="id_category">
                                <option value="Netflix" selected>Netflix</option>
                                <option value="Zulu">Zulu</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-semibold" for="id_type">Type</label>
                            <select class="custom-select" name="id_type">
                                <option value="Sharing" selected>Sharing</option>
                                <option value="Private">Private</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-semibold" for="status">Status</label>
                            <select class="custom-select" name="status">
                                <option value="inStock" selected>Aktif</option>
                                <option value="outOfStock">Nonaktif</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="product-edit-option">
                <div class="card">
                    <div class="card-body">

                        <div class="alert alert-primary">
                            <div class="d-flex justify-content-start align-items-center">
                                <span class="alert-icon m-r-20 font-size-30">
                                    <i class="anticon anticon-info-circle"></i>
                                </span>
                                <div>
                                    <h5 class="alert-heading">Informasi</h5>
                                    <p>Fitur tanggal kadaluarsa berdasarkan produk dan tipe akun dalam proses pengembangan.</p>
                                    <p>Informasi tanggal kadaluarsa akan muncul dibawah tanggal mulai dan tanggal akhir.</p>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="font-weight-semibold" for="start_date">Tanggal Mulai</label>
                            <input type="date" class="form-control" name="start_date" placeholder="Nama Produk">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-semibold" for="exp_date">Tanggal Selesai</label>
                            <input type="date" class="form-control" name="exp_date" placeholder="Nama Produk">
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="product-edit-description">
                <div class="card">
                    <div class="card-body">
                        <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <?php echo form_close() ?>
    </div>


    <!-- Content Wrapper END -->