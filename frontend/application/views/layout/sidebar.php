<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="<?php echo base_url(); ?>assets/images/icon/logo.png" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li>
                    <a href="<?php echo base_url('Ruangan')?>"><i class="fas fa-tachometer-alt"></i>Data Ruangan</a>
                </li>
                <li class="active">
                    <a href="<?php echo base_url('Booking')?>"><i class="fas fa-chart-bar"></i>Manage Booking</a>
                </li>
                <li>
                    <a href="<?php echo base_url('Login/logout')?>"><i class="fas fa-sign-out-alt "></i>Log Out</a>
                </li>
            </ul>
        </nav>
    </div>
</aside>