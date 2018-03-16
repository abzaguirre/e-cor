<!--============================
CLIENT DASHBOARD
=============================-->

<div class="content">
    <div class="container-fluid">
        <?php include_once (APPPATH . "views/client/includes/show_error.php"); ?>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class = "text-info" href="<?= base_url() ?>Client/">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $current_client->client_firstname . " " . $current_client->client_lastname ?></li>
        </ol>
        <div class="row">

            <div class="col-md-4">
                <br><br>
                <div class="card p-4">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <span class="h4 d-block font-weight-normal mb-2"><?= $packages_count; ?></span>
                            <span class="font-weight-light">Packages</span>
                        </div>
                        <div class="h2 text-muted">
                            <i class="fa fa-archive"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <br><br>
                <div class="card p-4">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <span class="h4 d-block font-weight-normal mb-2"><?= $ep_count; ?></span>
                            <span class="font-weight-light">Event Planners</span>
                        </div>
                        <div class="h2 text-muted">
                            <i class="icon icon-people"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <br><br>
                <div class="card p-4">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <span class="h4 d-block font-weight-normal mb-2"><?= $transactions ?></span>
                            <span class="font-weight-light">My Transactions</span>
                        </div>
                        <div class="h2 text-muted">
                            <i class="fa fa-birthday-cake"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
