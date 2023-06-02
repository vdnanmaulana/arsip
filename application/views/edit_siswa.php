<div class="main-content">
    <div class="card">
        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <div class="card-body">
            <h4 class="mb-3"><?php echo $title?></h4>
            <?php echo form_open_multipart('siswa/update');?>
            <div class="row">
                <div class="col-6">
                    <!-- Statrt -->
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input class="form-control" type="text" name="nama" value="<?php echo $siswa->nama ?>" >
                    </div>

                    <div class="form-group">
                        <label>NISN</label>
                        <input class="form-control" type="text" name="nisn" value="<?php echo $siswa->nisn ?>" >
                    </div>

                    <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input class="form-control" type="text" name="tempat_lahir" value="<?php echo $siswa->tempat_lahir ?>" >
                    </div>

                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <div class="input-affix m-b-10">
                            <i class="prefix-icon anticon anticon-calendar"></i>
                            <input type="text" class="form-control datepicker-input" placeholder="Pick a date" name="tanggal_lahir"
                            value="<?php echo $siswa->tanggal_lahir ?>" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Kelas</label>
                        <input class="form-control" type="text" name="kelas" value="<?php echo $siswa->kelas ?>" >
                    </div>
                    <!-- End -->
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label class="font-weight-semibold" for="image">Kartu Keluarga</label>
                        <div class="bubble mb-2">
                            <div class="bubble-wrapper p-5">
                                <img id="previewImageKK" style="height: 120px; width:200px; object-fit:cover" src="<?= base_url('uploads/KK/') ?><?php echo $siswa->file_kk ?>">
                            </div>
                        </div>
                        <div class="custom-file">
                            <input name="file_kk" type="file" class="custom-file-input" id="imageInputKK" >
                            <label class="custom-file-label" for="imageInputKK">Choose file</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-semibold" for="image">Kartu KIP</label>
                        <div class="bubble mb-2">
                            <div class="bubble-wrapper p-5">
                                <img id="previewImageKIP" style="height:120px; width:200px; object-fit:cover" src="<?= base_url('uploads/KIP/') ?><?php echo $siswa->file_kip ?>">
                            </div>
                        </div>
                        <div class="custom-file">
                            <input name="file_kip" type="file" class="custom-file-input" id="imageInputKIP" >
                            <label class="custom-file-label" for="imageInputKIP">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button> 
            </form>
        </div>
    </div>
</div>