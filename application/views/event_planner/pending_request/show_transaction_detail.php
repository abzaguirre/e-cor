<!--============================
SHOW TRANSACTION DETAIL
=============================-->
<div class="content">
    <?php include 'show_error.php'; ?>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a class = "text-info" href="<?= base_url() ?>eventplanner/">Dashboard</a></li>
        <li class="breadcrumb-item"><a class = "text-info" href="<?= base_url() ?>pending_request/">Pending Requests</a></li>
        <li class="breadcrumb-item active" aria-current="page">Transaction Detail</li>
    </ol>
    <div class = "row">
        <div class="col-md-12">
            <div class = "card">
                <div class="card-header">
                    <strong>Transaction Detail</strong>
                </div>
                <div class = "card-body">
                    <center>
                        <h1><?= $pending_request[0]->client_firstname . " " . $pending_request[0]->client_lastname ?></h1>
                        <!--<img class = "img-fluid" width = "50" src = "<?= base_url() . $pending_request[0]->client_picture ?>" >-->
                        <div class = "image-fit">
                            <a href = "<?= base_url() . $pending_request[0]->client_picture ?>" data-toggle="lightbox">
                                <img class="d-flex mx-auto" src="<?= base_url() . $pending_request[0]->client_picture ?>"  style = "height:128px; width:128px;" alt = "">
                            </a>
                        </div>
                        <br/>
                        <h5 class = "mt-2">Current Client</h5>
                    </center>

                    <div class = "row">
                        <div class = "col-md-3"></div>
                        <div class = "col-md-6">
                            <div class = "card">
                                <div class = "card-header bg-success text-white">
                                    <center>Availed Package</center>
                                </div>
                                <div class = "card-body">
                                    <strong><?= $pending_request[0]->packages_name; ?></strong>
                                </div>
                                <?php $total_price = 0; ?>
                                <?php $items = $this->Packages_model->get_item_in_packages(array("item.packages_id" => $pending_request[0]->packages_id)); ?>
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
                        <h5>Client's Side Notes</h5>
                        <i class = "text-muted"><?= $pending_request[0]->transaction_notes == ""? "NONE" : $pending_request[0]->transaction_notes?></i>
                    </center>
                    <center class = "mt-5">
                        <h5>Schedule</h5>
                        <i class = "text-muted"><?= date("F d, Y - h:i A", $pending_request[0]->schedule_startdate); ?></i>
                    </center>
                    <center class = "mt-5">
                        <h5>Address</h5>
                        <i class = "text-muted"><?= $pending_request[0]->transaction_address?></i>
                        
                        <div id = "google-map" data-address = "<?= $pending_request[0]->transaction_address?>" class = "border " style="height:100%; min-height:350px;"></div>
                        
                          
                    </center>
                    <center class = "mt-5">
                        <h5>Reserved at</h5>
                        <i class = "text-muted"><?= date("F d, Y - h:i A", $pending_request[0]->transaction_added_at); ?></i>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>

