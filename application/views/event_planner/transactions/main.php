<!--============================
PACKAGES
=============================-->

<?php 
    function get_cost($package_id){
        $ci =& get_instance();
        $total_price = 0; 
        $items = $ci->Packages_model->get_item_in_packages(array("item.packages_id" => $package_id));
        foreach($items as $item){
            $total_price += $item->item_price;
        }
        return $total_price;
    }
?>
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
        <li class="breadcrumb-item"><a class = "text-info" href="<?= base_url()?>eventplanner/">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Transactions</li>
    </ol>
    <div class = "row">
        <div class="col-md-12">
            <div class = "card">
                <div class="card-header">
                    <strong>Current Transaction</strong>
                </div>
                <div class = "card-body">
                    <?php if(empty($transactionsActive)):?>
                        <center>
                            <i class = "fa fa-birthday-cake fa-5x text-muted"></i><br/>
                            <span class = "text-muted" style = "font-size:32px;">No Active Transactions</span>
                        </center>
                    <?php else:?>
                        
                        <center>
                            <h1><?= $transactionsActive[0]->client_firstname." ".$transactionsActive[0]->client_lastname?></h1>
                            <!--<img class = "img-fluid" width = "50" src = "<?= base_url().$transactionsActive[0]->client_picture?>" >-->
                            <div class = "image-fit">
                                <a href = "<?= base_url().$transactionsActive[0]->client_picture?>" data-toggle="lightbox">
                                    <img class="d-flex mx-auto" src="<?= base_url().$transactionsActive[0]->client_picture?>"  style = "height:128px; width:128px;" alt = "">
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
                                        <strong><?=$transactionsActive[0]->packages_name;?></strong>
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
                                        <?php endforeach;?>
                                    <?php else:?>
                                        <div class="card-body d-flex justify-content-between align-items-center" >
                                            <span class = "text-muted">NO ITEMS YET</span>
                                        </div>
                                    <?php endif;?>
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
                        <i class = "text-muted"><?=$transactionsActive[0]->transaction_notes;?></i>
                    </center>
                    <center class = "mt-5">
                        <h5>Schedule</h5>
                        <i class = "text-muted"><?= date("F d, Y - h:i A", $transactionsActive[0]->schedule_startdate);?></i>
                    </center>
                    <center class = "mt-5">
                        <h5>Reserved at</h5>
                        <i class = "text-muted"><?= date("F d, Y - h:i A", $transactionsActive[0]->transaction_added_at);?></i>
                    </center>
                    <center class = "mt-5">
                        <a class = "btn btn-danger" href = "<?= base_url()?>Transactions/cancel_transaction/<?=$transactionsActive[0]->transaction_id?>">Cancel Transaction</a>
                        <a class = "btn btn-success" href = "<?= base_url()?>Transactions/done_transaction/<?=$transactionsActive[0]->transaction_id?>">Done Transaction</a>
                    </center>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
    <div class = "row">
        <div class="col-md-12">
            <div class = "card">
                <div class="card-header">
                    <strong>Recent Transaction</strong>
                </div>
                <div class = "card-body">
                    <?php if(!empty($transactionsInactive)):?>
                        <div class="table-responsive">
                            <table class="table table-striped datatable-class">
                                <thead>
                                    <tr>
                                        <th>Transaction ID</th>
                                        <th>Client</th>
                                        <th>Availed Package</th>
                                        <th>Cost</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($transactionsInactive as $transaction):?>
                                        <?php $total_price = get_cost($transaction->packages_id)?>
                                        <tr>
                                            <td><?= $transaction->transaction_id?></td>
                                            <td class="text-nowrap"><?= $transaction->client_firstname." ".$transaction->client_lastname?></td>
                                            <td><?= $transaction->packages_name?></td>
                                            <td>₱ <?= $total_price?></td>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    <?php else:?>
                        <!-- NO RECENT TRANSACTION -->
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</div>