<!-- Side Nav START -->
<div class="side-nav">
    <div class="side-nav-inner">
        <ul class="side-nav-menu scrollable">
            <li class="nav-item dropdown open">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-pie-chart"></i>
                    </span>
                    <span class="title">Menu Utama</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li <?php if ($this->uri->segment(1) == '') echo 'class="active"'; ?>>
                        <a href="<?php echo base_url('/') ?>">Dashboard</a>
                    </li>
                    <li <?php if ($this->uri->segment(1) == 'siswa') echo 'class="active"'; ?>>
                        <a href="<?php echo base_url('siswa') ?>">Data Siswa</a>
                    </li>
                    <li <?php if ($this->uri->segment(1) == 'guru') echo 'class="active"'; ?>>
                        <a href="<?php echo base_url('guru') ?>">Data Guru</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-setting"></i>
                    </span>
                    <span class="title">Pengaturan</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="">Tambah Kategori</a>
                    </li>
                    <li>
                        <a href="">Coba</a>
                    </li>
                </ul>
            </li>
            <!-- <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-file"></i>
                    </span>
                    <span class="title">Kategori</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="nav-item dropdown">
                        <a href="javascript:void(0);">
                            <span>Level 1</span>
                            <span class="arrow">
                                <i class="arrow-icon"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="">Level 2.1</a>
                            </li>
                            <li>
                                <a href="">Level 2.2</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li> -->
        </ul>
    </div>
</div>
<!-- Side Nav END -->
<div class="page-container">

<!-- Content Wrapper START -->
<!-- Content Wrapper START -->