<!--============================
Registration Fee
=============================-->

<div class="content">
    <div class="container-fluid">
        <?php include_once (APPPATH . "views/show_error/show_error.php"); ?>
        <?php include_once ("show_error.php"); ?>
        <div class = "row">
            <div class ="col-md-12">
                <div class ="card">
                    <div class = "card-header">
                        <strong>Newly Registered Event Planners</strong>
                    </div>
                    <div class = "card-body">
                        <?php if (empty($newly_registered_ep)): ?>
                            <center>
                                <i class = "fa fa-users fa-5x text-muted"></i><br/>
                                <h4 class = "mt-3" style = "font-size:24px;">No Newly Registered Event Planners Yet</h4>
                            </center>
                        <?php else: ?>
                            <div class="table-responsive">
                                <table class="table table-striped datatable-class">
                                    <thead>
                                        <tr>
                                            <th>Event Planner</th>
                                            <th>TIN</th>
                                            <th>Username</th>
                                            <th>Contact No.</th>
                                            <th>Email</th>
                                            <th>Added At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($newly_registered_ep as $ep): ?>
                                        <tr>
                                            <td nowrap><?= $ep->event_planner_firstname." ".$ep->event_planner_lastname?></td>
                                            <td nowrap><?= $ep->event_planner_tin?></td>
                                            <td><?= $ep->event_planner_username?></td>
                                            <td><?= $ep->event_planner_contact_no?></td>
                                            <td><?= $ep->event_planner_email?></td>
                                            <td nowrap><?= date("F d, Y - h:i A", $ep->event_planner_added_at)?></td>
                                            <td class = "text-center">
                                                <a href = "#" data-toggle = "modal" data-target = "#activate_<?= $ep->event_planner_id?>" class = "btn btn-success">Activate</a>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="activate_<?= $ep->event_planner_id?>" tabindex="-1" role="dialog" aria-labelledby="activateLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="activateLabel">Activation</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Please make sure that <strong>event planner</strong> (<?= $ep->event_planner_firstname." ".$ep->event_planner_lastname?>) has paid the right amount before activating.
                                                        <br>
                                                        <br>
                                                        <strong>Registration Fee: </strong>₱ 1500
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <a href = "<?= base_url() ?>Admin/registration_payment_exec/<?= $ep->event_planner_id ?>" class="btn btn-success">Paid</a> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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