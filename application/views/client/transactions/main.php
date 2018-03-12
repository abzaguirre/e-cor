<!--============================
TRANSACTION
=============================-->
<style>
    .card-title, .card-footer{
        background:rgba(160,160,160,0.3);
    }
</style>
<div class="content">
    <div class="container-fluid">
        <?php include_once (APPPATH . "views/client/includes/show_error.php"); ?>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class = "text-info" href="<?= base_url() ?>Client/">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Transaction</li>
        </ol>
        <div class="card">
            <?php if (!empty($rejected)): ?>
                <div class = "alert alert-danger col-lg-12">
                    <center>
                        <h4><?= $rejected[0]->event_planner_firstname . " " . $rejected[0]->event_planner_lastname ?> rejected your request.</h4>
                        <i class = "fa fa-exclamation-circle fa-5x" style = "color:#bbb;"></i>
                    </center>
                </div>  
            <?php elseif (empty($pending) && empty($transactionsActive)): ?>
                <div class = "col-lg-12">
                    <center>
                        <h4>You have no Transaction yet</h4>
                        <i class = "fa fa-exclamation-circle fa-5x" style = "color:#bbb;"></i>
                    </center>
                </div>     

            <?php else: ?>
                <?php if (!empty($pending)): ?>
                    <div class="card-header">
                        <i class="fa fa-clock-o"></i> Pending Request/s
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped datatable-class">
                                <thead>
                                    <tr>
                                        <th>Client</th>
                                        <th>Availed Package</th>
                                        <th>Schedule</th>
                                        <th>Cost</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pending as $transaction): ?>
                                        <?php $total_price = get_cost($transaction->packages_id) ?>
                                        <tr>
                                            <td class="text-nowrap"><?= $transaction->event_planner_firstname . " " . $transaction->event_planner_lastname ?></td>
                                            <td><?= $transaction->packages_name ?></td>
                                            <td><?= date('M. j, Y : h:m A', $transaction->schedule_startdate) ?> - <?= date('M. j, Y : h:m A', $transaction->schedule_enddate) ?></td>
                                            <td>₱ <?= $total_price ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php elseif (!empty($transactionsActive)): ?>
                    <div class="card-header">
                        <i class="fa fa-exchange"></i> Current Transaction
                    </div>
                    <div class = "card-body">
                        <?php if (empty($transactionsActive)): ?>
                            <center>
                                <i class = "fa fa-birthday-cake fa-5x text-muted"></i><br/>
                                <span class = "text-muted" style = "font-size:32px;">No Active Transactions</span>
                            </center>
                        <?php else: ?>
                            <?php if ($transactionsActive[0]->transaction_isPaid == 0): ?>
                                <center>
                                    <div class="alert alert-info col-6">
                                        <h4><?= $transactionsActive[0]->event_planner_firstname . " " . $transactionsActive[0]->event_planner_lastname ?> accepted your request.</h4>
                                        <h4>You must pay first before you start the Transaction with the Event Planner.</h4>
                                        <button  class="btn btn-success" data-toggle="modal" data-target="#payment_<?= $transactionsActive[0]->transaction_id ?>" title = "Payment">
                                            <i class="fa fa-money"></i> Payment
                                        </button>  
                                    </div>
                                </center>
                            <?php else: ?>
                                <center>
                                    <h1><?= $transactionsActive[0]->event_planner_firstname . " " . $transactionsActive[0]->event_planner_lastname ?></h1>
                                    <div class = "image-fit">
                                        <a href = "<?= base_url() . $transactionsActive[0]->event_planner_picture ?>" data-toggle="lightbox">
                                            <img class="d-flex mx-auto" src="<?= base_url() . $transactionsActive[0]->event_planner_picture ?>"  style = "height:128px; width:128px;" alt = "">
                                        </a>
                                    </div>
                                    <br/>
                                    <h5 class = "mt-2">Event Planner</h5>
                                </center>

                                <div class = "row">
                                    <div class = "col-md-3"></h2>
                                    </div>
                                    <div class = "col-md-6">
                                        <div class = "card">
                                            <div class = "card-header bg-success text-white">
                                                <center>Availed Package</center>
                                            </div>
                                            <div class = "card-body">
                                                <strong><?= $transactionsActive[0]->packages_name; ?></strong>
                                            </div>
                                            <?php $total_price = 0; ?>
                                            <?php $items = $this->Packages_model->get_item_in_packages(array("item.packages_id" => $transactionsActive[0]->packages_id)); ?>
                                            <?php if (!empty($items)): ?>
                                                <?php foreach ($items as $item): ?>
                                                    <?php $total_price += $item->item_price; ?>
                                                    <a class="card-body d-flex justify-content-between align-items-center" style = "cursor:pointer;" data-toggle="collapse" data-target="#collapse_item_<?= $item->item_id ?>">
                                                        <?= $item->item_name ?>
                                                        <div class="text-muted">
                                                            ₱ <?= $item->item_price ?>
                                                        </div>
                                                    </a>
                                                    <div class="collapse" id="collapse_item_<?= $item->item_id ?>">
                                                        <div class="card-body border-0 d-flex justify-content-between align-items-center" style = "background:#ededed;">
                                                            <i><?= $item->item_desc ?></i>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <div class="card-body d-flex justify-content-between align-items-center" >
                                                    <span class = "text-muted">NO ITEMS YET</span>
                                                </div>
                                            <?php endif; ?>
                                            <hr/>
                                            <div class ="card-footer d-flex justify-content-between align-items-center pt-0">
                                                <span>TOTAL:</span>
                                                <div class="text-muted"><strong>₱ <?= $total_price ?></strong></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class = "col-md-3"></div>
                                </div>
                                <center>
                                    <h5>Your Side Notes</h5>
                                    <i class = "text-muted"><?= $transactionsActive[0]->transaction_notes; ?></i>
                                </center>
                                <center class = "mt-5">
                                    <h5>Schedule</h5>
                                    <i class = "text-muted"><?= date("F d, Y - h:i A", $transactionsActive[0]->schedule_startdate); ?></i><br>
                                    <i class = "text-muted">to</i><br>
                                    <i class = "text-muted"><?= date("F d, Y - h:i A", $transactionsActive[0]->schedule_enddate); ?></i>

                                </center>
                                <center class = "mt-5">
                                    <h5>Reserved at</h5>
                                    <i class = "text-muted"><?= date("F d, Y - h:i A", $transactionsActive[0]->transaction_added_at); ?></i>
                                </center>
                                <center class = "mt-5">
                                    <button  class="btn btn-primary" data-toggle="modal" data-target="#resched_<?= $transactionsActive[0]->transaction_id ?>" title = "Reschedule">
                                        <i class="fa fa-calendar"></i> Reschedule
                                    </button>  
                                    <?php if (date("F d, Y - h:i A", $transactionsActive[0]->schedule_enddate) <= date("F d, Y - h:i A")): ?>
                                        <button  class="btn btn-success" data-toggle="modal" data-target="#done_<?= $transactionsActive[0]->transaction_id ?>" title = "Done">
                                            <i class="fa fa-check"></i> Done
                                        </button>  
                                    <?php else: ?>
                                        <button class="btn btn-success" disabled="" title = "The Event is not yet done.">
                                            <i class="fa fa-check"></i> Done
                                        </button>  
                                    <?php endif; ?>
                                    <button  class="btn btn-danger" data-toggle="modal" data-target="#cancel_<?= $transactionsActive[0]->transaction_id ?>" title = "Cancel Event">
                                        <i class="fa fa-times"></i> Cancel Event
                                    </button>  
                                </center>
                            <?php endif; ?>
                        <?php endif; ?>

                    </div>
                    <!--Reschedule-->
                    <div class="modal fade" id="resched_<?= $transactionsActive[0]->transaction_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="<?= base_url() ?>ClientTransactions/resched/<?= $transactionsActive[0]->transaction_id ?>" method="POST">
                                    <div class="modal-header bg-info border-0 text-white">
                                        <h5 class="modal-title text-white">  <i class="fa fa-calendar"></i> Reschedule</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body p-5">
                                        <div class="form-row mt-3">
                                            <div class="col">
                                                <input type="text" name="start" readonly="" class="form_datetime form-control <?= !empty(form_error("start")) ? "is-invalid" : ""; ?>"  value = "<?= set_value("start") ?>" placeholder="Start Date and Time of the Event">
                                                <div class="invalid-feedback"><?= form_error('start') ?></div>
                                            </div>
                                        </div>
                                        <div class="form-row mt-3">
                                            <div class="col">
                                                <input type="text" name="end" readonly="" class="form_datetime form-control <?= !empty(form_error("end")) ? "is-invalid" : ""; ?>"  value = "<?= set_value("end") ?>" placeholder="End Date and Time of the Event">
                                                <div class="invalid-feedback"><?= form_error('end') ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer border-0">
                                        <button type="button" class="btn btn-link" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class = "btn btn-success">Yes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--Done-->
                    <div class="modal fade" id="done_<?= $transactionsActive[0]->transaction_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="<?= base_url() ?>ClientTransactions/done/<?= $transactionsActive[0]->transaction_id ?>" method="POST">
                                    <div class="modal-header bg-success border-0 text-white">
                                        <h5 class="modal-title text-white">  <i class="fa fa-check"></i> Done</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h4>Are you sure your event is done?</h4>
                                    </div>
                                    <div class="modal-footer border-0">
                                        <button type="button" class="btn btn-link" data-dismiss="modal">No</button>
                                        <button type="submit" class = "btn btn-success">Yes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--Cancel-->
                    <div class="modal fade" id="cancel_<?= $transactionsActive[0]->transaction_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="<?= base_url() ?>ClientTransactions/cancel/<?= $transactionsActive[0]->transaction_id ?>" method="POST">
                                    <div class="modal-header bg-danger border-0 text-white">
                                        <h5 class="modal-title text-white">  <i class="fa fa-times"></i> Cancel Event</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <?php if (date("F d, Y", strtotime("+1 week", $transactionsActive[0]->transaction_added_at)) >= date("F d, Y")): ?>
                                            <br>
                                            <h5>It is already 1 week since you had reserved. And you have a 50% refund.</h5>
                                        <?php else: ?>
                                        <?php endif; ?>
                                        <h4>Do you really want to cancel your Event?</h4>
                                    </div>
                                    <div class="modal-footer border-0">
                                        <button type="button" class="btn btn-link" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class = "btn btn-success">Yes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--Payment-->
                    <div class="modal fade" id="payment_<?= $transactionsActive[0]->transaction_id ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-info border-0 text-white">
                                    <h5 class="modal-title text-white">  <i class="fa fa-money"></i>  Payment</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>BPI over-the-counter (OTC)</p>
                                    <p>This service allows client to pay their reservation and other fees over-the-counter in any of over 500 branches of BPI nationwide. Just proceed to the teller's counter and pay your tuition and other fees.</p>
                                    <p>STEPS:</p>
                                    <ol type="1">
                                        <li>Fill out a deposit slip (available at any BPI Branch nationwide) with the following information:</li>
                                        <ol type="a">
                                            <li>Account Number - 002298-0032-52</li>
                                            <li>Account Name - Creative Solutions</li>
                                            <li>Reference No. - your username</li>
                                            <li>Policy/Planholder's Name - your name</li>
                                            <li>Amount</li>
                                        </ol>
                                        <li>Only CASH payment will be accepted by BPI branches.</li>
                                    </ol>

                                </div>
                                <div class="modal-footer border-0">
                                    <button type="button" class="btn btn-link" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
