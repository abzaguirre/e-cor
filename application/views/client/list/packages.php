<!--============================
PACKAGES
=============================-->
<style>
    .card-title, .card-footer{
        background:rgba(160,160,160,0.3);
    }
</style>
<div class="content">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class = "text-info" href="<?= base_url() ?>Client/">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Event Reservation</li>
        </ol>

        <div class="card">
            <div class="card-header" style="background:rgba(160,160,160,0.3); height:60px;">
                <a href="<?= base_url() ?>ClientReservation"><span style="color:#6699FF; font-size:20px;"><i class="fa fa-book"></i> Event Reservation | </span></a>
                <a href="<?= base_url() ?>ClientReservation/ep_list_exec/<?= $ep_specialty->event_specialty_name ?>"><span style="color:#6699FF; font-size:20px;"><i class="fa fa-book"></i> Event Planners | </span></a>
                <span style="color:grey; font-size:20px;"><i class="fa fa-archive"></i> Packages</span>
            </div>
            <div class="card-body">
                <div class = "row">
                    <?php foreach ($packages_id as $package_id): ?>
                        <?php $package = $this->Packages_model->get_package_info(array("packages_id" => $package_id->packages_id))[0]; ?>
                        <?php $items = $this->Packages_model->get_item_in_packages(array("item.packages_id" => $package_id->packages_id)); ?>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header bg-light">
                                    <strong><?= $package->packages_name ?></strong>
                                    <div class="card-actions">
                                        <a href="#" class="btn" data-toggle="modal" data-target="#package_choose_<?= $package->packages_id ?>" title = "Choose Package">
                                            <i class="fa fa-hand-o-up fa-lg" style="font-size:20px; color:blue;"></i>
                                        </a>
                                    </div>
                                </div>
                                <?php $total_price = 0; ?>
                                <!-- ITEM LISTS -->
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
                                    <span class = "ml-4">TOTAL:</span>
                                    <div class="text-muted"><strong>₱ <?= $total_price ?></strong></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="package_choose_<?= $package->packages_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form action="<?= base_url() ?>ClientReservation/choose_package_exec/<?= $package->packages_id ?>/<?= $schedule_id ?>/<?= $ep_id ?>" method="POST">
                                        <div class="modal-header bg-info border-0 text-white">
                                            <h5 class="modal-title text-white">Are you sure you want to choose this package?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body p-5">
                                            <div class="card">
                                                <div class="card-header bg-dark text-white">
                                                    <i class = "fa fa-archive"></i> <?= $package->packages_name ?>
                                                </div>
                                                <!-- ITEM LISTS -->
                                                <?php if (!empty($items)): ?>
                                                    <?php foreach ($items as $item): ?>
                                                        <div class="card-body d-flex justify-content-between align-items-center" style = "cursor:pointer;" data-toggle="collapse" data-target="#collapse_item_delete<?= $item->item_id ?>">
                                                            <?= $item->item_name ?>
                                                            <div class="text-muted">
                                                                ₱ <?= $item->item_price ?>
                                                            </div>
                                                        </div>
                                                        <div class="card-body border-0 d-flex justify-content-between align-items-center" style = "background:#ededed;">
                                                            <i><?= $item->item_desc ?></i>
                                                        </div>
                                                    <?php endforeach; ?>

                                                <?php else: ?>
                                                    <div class="card-body d-flex justify-content-between align-items-center" >
                                                        <span class = "text-muted">NO ITEMS YET</span>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <div class = "form-row">
                                                <textarea class = "form-control" id = "note"  name = "note" placeholder = "Note for the event planner." rows="2"></textarea>
                                            </div>
                                        </div>

                                        <div class="modal-footer border-0">
                                            <button type="button" class="btn btn-link" data-dismiss="modal">No</button>
                                            <button type="submit" class = "btn btn-success">Yes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>