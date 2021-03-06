<nav class="navbar page-header">
    <a href="#" class="btn btn-link sidebar-mobile-toggle d-md-none mr-auto">
        <i class="fa fa-bars"></i>
    </a>

    <a class="navbar-brand text-center" href="<?= base_url() ?>eventplanner">
        <img  src="<?= base_url() ?>/images/logo/ecor-word-logo.png" alt="logo" height = "25">
    </a>

    <a href="#" class="btn btn-link sidebar-toggle d-md-down-none">
        <i class="fa fa-bars"></i>
    </a>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="<?= base_url() . $admin_picture ?>" class="avatar avatar-sm" alt="logo">
                <span class="small ml-1 d-md-down-none"><?= $admin_username ?></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header">Account</div>

                <a href="#" class="dropdown-item">
                    <i class="fa fa-user"></i> Profile
                </a>

                <a href="#" class="dropdown-item">
                    <i class="fa fa-envelope"></i> Messages
                </a>

                <div class="dropdown-header">Settings</div>

                <a href="#" class="dropdown-item">
                    <i class="fa fa-bell"></i> Notifications
                </a>

                <a href="#" class="dropdown-item">
                    <i class="fa fa-wrench"></i> Settings
                </a>

                <a href="<?= base_url() ?>AdminLogout" class="dropdown-item">
                    <i class="fa fa-lock"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>

<div class="main-container">