<!--============================
EVENT PLANNER DASHBOARD
=============================-->

<div class="content">
    <div class="container-fluid">
        <?php include_once (APPPATH . "views/show_error/show_error.php"); ?>
        <?php if (empty($specialty)): ?>
            <!--ALERT-->
            <div class="alert alert-info" role="alert">
                <h2 class="alert-heading">You are a new Event Planner to E-Cor!</h2>
                <h4>You must enter your Specialty.</h4>
                <button class="btn btn-outline-dark" data-toggle="modal" data-target=".bd-example-modal-lg">Update</button>
            </div>
        <?php else: ?>
            <div class="row">
                <div class="col-md-4">
                    <a href = "<?= base_url() ?>eventplanner/packages_exec/<?= $current_ep->event_planner_id ?>">
                        <div class="card p-4">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="h4 d-block font-weight-normal mb-2"><?= $packages_count; ?></span>
                                    <span class="font-weight-light">Packages</span>
                                </div>
                                <div class="h2 text-muted">
                                    <i class="icon icon-people"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href = "<?= base_url() ?>eventplanner/income">
                        <div class="card p-4">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="h4 d-block font-weight-normal mb-2">₱ <?= $current_ep->event_planner_netIncome ?></span>
                                    <span class="font-weight-light">Net Income</span>
                                </div>

                                <div class="h2 text-muted">
                                    <i class="icon icon-wallet"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href = "<?= base_url() ?>eventplanner/transactions_exec">
                        <div class="card p-4">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="h4 d-block font-weight-normal mb-2"><?= $transactions ?></span>
                                    <span class="font-weight-light">Transactions</span>
                                </div>
                                <div class="h2 text-muted">
                                    <i class="fa fa-birthday-cake"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            My Transactions in Year 2018
                        </div>

                        <div class="card-body p-0">
                            <div class="p-4">
                                <canvas id="myAreaChart" width="100%" height="20"></canvas>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    </div>
</div>
