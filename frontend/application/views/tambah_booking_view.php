<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('layout/head.php')?>
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="<?php echo base_url(); ?>assets/images/icon/logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a href="/"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="../records"><i class="fas fa-chart-bar"></i>Records</a>
                        </li>
                        <li class="active">
                            <a href="../records/add"><i class="fas fa-plus-square"></i>Add Records</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <?php $this->load->view('layout/sidebar.php')?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row"> 
                            <div class="col-lg-12">
                                <h2 class="title-1 m-b-25">Booking ruangan</h2>
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                        </div>
                                        <div class="card-body card-block">
                                            <?php //echo form_open('../frontend/Ruangan/tambahRuanganAction', 'enctype="multipart/form-data" method="post" class="form-horizontal"'); ?>
                                            <form method="post" action="<?php echo base_url('Booking/tambahBookingAction') ?>">
                                                <div class="form-group">
                                                    <label class="control-label mb-1">RUANGAN*</label>
                                                    <select type="text" name="ruangan" class="form-control" required>
                                                        <option value="">- Pilih Ruangan -</option>
                                                        <?php foreach($data as $value) { ?>
                                                        <option value="<?= $value['kode_ruangan']?>"><?= $value['nama_ruangan']?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class=" form-control-label">AGENDA*</label>
                                                    <input type="text" name="agenda" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class=" form-control-label">TANGGAL*</label>
                                                    <input type="date" name="date" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class=" form-control-label">MULAI*</label>
                                                    <input type="time" name="time_start" min="07:30" max="16:00" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class=" form-control-label">BERAKHIR*</label>
                                                    <input type="time" name="time_end" min="07:30" max="17:00" class="form-control" required>
                                                </div>
                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-dot-circle-o"></i> Submit
                                                    </button>
                                                    <button type="reset" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-ban"></i> Reset
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
            </div>

    </div>

    <?php $this->load->view('layout/javascript.php')?>

</body>

</html>
<!-- end document-->
