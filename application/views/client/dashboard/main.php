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
    </div>
</div>
