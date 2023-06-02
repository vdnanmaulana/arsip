<div class="main-content">
    <?php if($this->session->flashdata('success')) {?>
        <div class="alert alert-success">
            <div class="d-flex align-items-center justify-content-start">
                <span class="alert-icon m-r-20 font-size-30">
                    <i class="anticon anticon-check-circle"></i>
                </span>
                <div>
                    <h5 class="alert-heading">Informasi</h5>
                    <p><?php echo $this->session->flashdata('success');?></p>
                </div>
            </div>
        </div>
<?php }?>
    <div class="card">
        <div class="card-body">
            <h4>Data Siswa</h4>
            <a href="<?= base_url('siswa/add')?>" class="btn btn-primary"><i class="anticon anticon-plus"></i> Tambah</a>

            <div class="table-responsive mt-3">
                <table id="data-table" class="table table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>NISN</th>
                            <th>TTL</th>
                            <th>Kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($data_siswa as $siswa) {?>
                            <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $siswa->nama?></td>
                            <td><?php echo $siswa->nisn?></td>
                            <td><?php echo $siswa->tempat_lahir . ", " . $siswa->tanggal_lahir?></td>
                            <td><?php echo $siswa->kelas ?></td>
                            <td>
                                <a href="<?php base_url()?>/siswa/edit/<?php echo $siswa->id?>" class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                    <i class="anticon anticon-edit"></i>
                                </a>
                                <a href="<?php base_url()?>/siswa/delete/<?php echo $siswa->id?>" class="btn btn-icon btn-hover btn-sm btn-rounded">
                                    <i class="anticon anticon-delete"></i>
                                </a>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>