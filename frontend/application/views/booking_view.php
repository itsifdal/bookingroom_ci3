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
                        <li class="active">
                            <a href="values"><i class="fas fa-chart-bar"></i>values</a>
                        </li>
                        <li>
                            <a href="values/add"><i class="fas fa-plus-square"></i>Add values</a>
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
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                        </div>
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
                                <h2 class="title-1 m-b-25">LIST BOOKING</h2>
                                <a href="<?php echo base_url('Booking/tambahBooking')?>">
                                    <button class="btn btn-info">Booking Ruangan</button>
                                </a>
                                <hr>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                        
                                            <tr>
                                                <th>KODE RUANGAN</th>
                                                <th>BOOKED BY</th>
                                                <th>NO BOOKING</th>
                                                <th>AGENDA</th>
                                                <th>DATE</th>
                                                <th>MULAI</th>
                                                <th>BERAKHIR</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($data as $key => $value) { ?>
                                            <tr>
                                                <td><?php echo $value['kode_ruangan']; ?></td>
                                                <td>
                                                    <?php echo $value['id_user']; ?>
                                                </td>
                                                <td><?php echo $value['no_booking']; ?></td>
                                                <td><?php echo $value['agenda']; ?></td>
                                                <td><?php echo $value['date']; ?></td>
                                                <td><?php echo $value['time_start']; ?></td>
                                                <td><?php echo $value['time_end']; ?></td>
                                                <td><a href="<?php echo base_url()?>Ruangan/editRuangan/<?php echo $value['kode_ruangan']; ?>"><i class="fa fa-edit"></i></a></td>
                                                <td><a href="<?php echo base_url()?>Ruangan/hapusRuangan/<?php echo $value['kode_ruangan']; ?>"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
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
