
<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">Navigation</li>

            <li class="nav-item">
                <a href="<?= base_url() ?>Client" class="nav-link <?= base_url(uri_string()) == base_url() . "Client" ? "active" : ""; ?>">
                    <i class="icon icon-speedometer"></i> Dashboard
                </a>    
            </li>

            <li class="nav-item">
                <a href="<?= base_url() ?>ClientReservation" class="nav-link <?= strpos(base_url(uri_string()), base_url() . "ClientReservation") !== FALSE ? "active" : ""; ?>">
                    <i class="fa fa-book"></i> Event Reservation
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url() ?>ClientTransactions" class="nav-link <?= strpos(base_url(uri_string()), base_url() . "ClientTransactions") !== FALSE ? "active" : ""; ?>">
                    <i class="fa fa-exchange"></i> Transactions
                </a>
            </li>
        </ul>
    </nav>
</div>