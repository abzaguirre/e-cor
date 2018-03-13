<!--============================
PACKAGES
=============================-->
<style>
    .image-fit{
        padding:5px;
        object-fit: contain;
    }
    .image-fit img{
        width:55px;
        height:55px;
        border-radius: 50%;
    }
</style>
<div class="content">
    <?php include 'show_error.php'; ?>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a class = "text-info" href="<?= base_url() ?>eventplanner/">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Transactions</li>
    </ol>
    <div class = "row">
        <div class="col-md-12">
            <div class = "card">
                <div class="card-header">
                    <strong>Accepted Transaction</strong>
                </div>
                <div class = "card-body">
                    <?php if (empty($acceptedTransaction)): ?>
                        <center>
                            <i class = "fa fa-birthday-cake fa-5x text-muted"></i><br/>
                            <span class = "text-muted" style = "font-size:32px;">No Paid Transactions</span>
                        </center>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table table-striped datatable-class">
                                <thead>
                                    <tr>
                                        <th>Client</th>
                                        <th>Availed Package</th>
                                        <th>Payment</th>
                                        <th>Payment Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($acceptedTransaction as $transaction): ?>
                                        <?php $total_price = get_cost($transaction->packages_id) ?>
                                        <tr>
                                            <td class="text-nowrap"><?= $transaction->client_firstname . " " . $transaction->client_lastname ?></td>
                                            <td><?= $transaction->packages_name ?></td>
                                            <td>₱ <?= $total_price ?></td>
                                            <td><?= $transaction->transaction_isPaid == 0 ? "Not Paid" : "Paid"; ?></td>
                                            <td class = "text-center">
                                                <div class="btn-group" role="group" aria-label="Actions">
                                                    <a href = "<?= base_url() ?>transactions/show_transaction_exec/<?= $transaction->transaction_id ?>" class="btn btn-info">Show Information</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class = "row">
        <div class="col-md-12">
            <div class = "card">
                <div class="card-header">
                    <strong>Recently Finished Transaction</strong>
                </div>
                <div class = "card-body">
                    <?php if (!empty($transactionsInactive)): ?>
                        <div class="table-responsive">
                            <table class="table table-striped datatable-class">
                                <thead>
                                    <tr>
                                        <th>Client</th>
                                        <th>Availed Package</th>
                                        <th>Received Payment</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($transactionsInactive as $transaction): ?>
                                        <?php $total_price = get_cost($transaction->packages_id) ?>
                                        <tr>
                                            <td class="text-nowrap"><?= $transaction->client_firstname . " " . $transaction->client_lastname ?></td>
                                            <td><?= $transaction->packages_name ?></td>
                                            <td>₱ <?= $total_price ?></td>
                                            <td class = "text-center">
                                                <div class="btn-group" role="group" aria-label="Actions">
                                                    <a href = "<?= base_url() ?>transactions/show_transaction_exec/<?= $transaction->transaction_id ?>" class="btn btn-info">Show Information</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <div class = "text-center">
                            <i class = "fa fa-exclamation-circle fa-5x"></i><br/>
                            <h3>No Pending Requests</h3>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>