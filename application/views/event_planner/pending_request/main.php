<!--============================
PENDING REQUEST
=============================-->
<div class="content">
    <?php include 'show_error.php'; ?>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a class = "text-info" href="<?= base_url()?>eventplanner/">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Pending Requests</li>
    </ol>
    <div class = "row">
        <div class="col-md-12">
            <div class = "card">
                <div class="card-header">
                    <strong>Pending Requests</strong>
                </div>
                <div class = "card-body">
                    <?php if(!empty($pending_request)):?>
                        <div class="table-responsive">
                            <table class="table table-striped datatable-class">
                                <thead>
                                    <tr>
                                        <th>Client</th>
                                        <th>Availed Package</th>
                                        <th>Cost</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($pending_request as $transaction):?>
                                        <?php $total_price = get_cost($transaction->packages_id)?>
                                        <tr>
                                            <td class="text-nowrap"><?= $transaction->client_firstname." ".$transaction->client_lastname?></td>
                                            <td><?= $transaction->packages_name?></td>
                                            <td>₱ <?= $total_price?></td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group" aria-label="Actions">
                                                    <a href = "<?= base_url()?>pending_request/reject_pending_transaction/<?= $transaction->transaction_id?>"    class="btn btn-danger">Reject</a>
                                                    <a href = "<?= base_url()?>pending_request/show_pending_transaction_exec/<?= $transaction->transaction_id?>" class="btn btn-info">Show Information</a>
                                                    <a href = "<?= base_url()?>pending_request/accept_pending_transaction/<?= $transaction->transaction_id?>"    class="btn btn-success">Accept</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    <?php else:?>
                    <div class = "text-center">
                        <i class = "fa fa-exclamation-circle fa-5x"></i><br/>
                        <h3>No Pending Requests</h3>
                    </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</div>

