<!--============================
ADMIN DASHBOARD
=============================-->

<div class="content">
    <div class="container-fluid">
        <?php include_once (APPPATH . "views/show_error/show_error.php"); ?>
        <div class = "row">
            <div class ="col-md-12">
                <div class ="card">
                    <div class="card-header">
                        <strong>Upcoming Unpaid Transaction</strong>
                    </div>
                    <div class = "card-body">
                        <?php if (empty($unpaid_transactions)): ?>
                            <center>
                                <i class = "fa fa-birthday-cake fa-5x text-muted"></i><br/>
                                <h4 class = "mt-3" style = "font-size:24px;">No Upcoming Unpaid Transactions Yet</h4>
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
                                        <?php foreach ($unpaid_transactions as $transaction): ?>
                                            <?php $total_price = get_cost($transaction->packages_id) ?>
                                            <tr>
                                                <td class="text-nowrap"><?= $transaction->client_firstname . " " . $transaction->client_lastname ?></td>
                                                <td><?= $transaction->packages_name ?></td>
                                                <td>₱ <?= $total_price ?></td>
                                                <td><?= $transaction->transaction_isPaid == 0 ? "Not Paid" : "Paid"; ?></td>
                                                <td class = "text-center">
                                                    <div class="btn-group" role="group" aria-label="Actions">
                                                        <a href = "<?= base_url() ?>Admin/show_transaction_exec/<?= $transaction->transaction_id ?>" class="btn btn-info">Show Information</a>
                                                        <a href = "<?= base_url() ?>Admin/payment_exec/<?= $transaction->transaction_id ?>" class="btn btn-success">Payment</a>
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
    </div>
</div>
