<!--============================
EVENT PLANNER PAYMENT
=============================-->

<div class="content">
    <div class="container-fluid">
        <?php include_once (APPPATH . "views/show_error/show_error.php"); ?>
        <?php include_once ("show_error.php"); ?>
        <div class = "row">
            <div class ="col-md-12">
                <div class ="card">
                    <div class="card-header">
                        <strong>Unpaid Event Planners</strong>
                    </div>
                    <div class = "card-body">
                        <?php if (empty($unpaid_ep)): ?>
                            <center>
                                <i class = "fa fa-money fa-5x text-muted"></i><br/>
                                <h4 class = "mt-3" style = "font-size:24px;">No Unpaid Event Planners Yet</h4>
                            </center>
                        <?php else: ?>
                            <div class="table-responsive">
                                <form role = "form">
                                <table class="table table-striped datatable-class">
                                    <thead>
                                        <tr>
                                            <th>Event Planner</th>
                                            <th>Client</th>
                                            <th>Availed Package</th>
                                            <th>Payment</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($unpaid_ep as $transaction): ?>
                                            <?php $total_boundary = get_cost($transaction->packages_id) * 0.9;?>
                                            <tr>
                                                <td class="text-nowrap"><?= $transaction->event_planner_firstname . " " . $transaction->event_planner_lastname ?></td>
                                                <td class="text-nowrap"><?= $transaction->client_firstname . " " . $transaction->client_lastname ?></td>
                                                <td><?= $transaction->packages_name ?></td>
                                                <td>₱ <?= $total_boundary ?></td>
                                                <td class = "text-center">
                                                    <div class="btn-group" role="group" aria-label="Actions">
                                                        <a href = "#" class="btn btn-success" data-toggle="modal" data-target="#payment_<?= $transaction->transaction_id?>" >Payment</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- Modal -->
                                            <div class="modal fade" id="payment_<?= $transaction->transaction_id?>" tabindex="-1" role="dialog" aria-labelledby="paymentLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="paymentLabel">Payment</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Please make sure that you have paid the <strong>event planner</strong> (<?= $transaction->event_planner_firstname." ".$transaction->event_planner_lastname?>) had paid you the right amount before clicking the "Paid" button. 
                                                            <br>
                                                            <br>
                                                            <strong>Payment: </strong>₱ <?= $total_boundary ?>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <a href = "<?= base_url() ?>Admin/payment_by_admin_exec/<?= $transaction->transaction_id ?>/<?=$total_boundary?>" class="btn btn-success">Paid</a> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                </form>
                            </div>
                        <?php endif; ?>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>