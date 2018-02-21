<!--============================
PACKAGES
=============================-->
<div class="content">
    <?php include 'show_error.php'; ?>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a class = "text-info" href="<?= base_url() ?>eventplanner/">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Packages</li>
    </ol>
    <div class ="row my-3">
        <div class = "col-md-12 text-center">
            <button class = "btn btn-success" data-toggle = "modal" data-target = "#add_packages"><i class = "fa fa-plus"></i> Add Package</button>
        </div>
    </div>
    <div class="modal fade" id="add_packages" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <form action = "<?= base_url() ?>eventplanner/package_add" method = "POST">
                <div class="modal-content">
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title">Add Package</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class = "row">
                            <div class = "col-md-12">
                                <div class="form-group">
                                    <label for="package_name" class="form-control-label">Package Name</label>
                                    <input type = "text" name = "package_name" id="package_name" class="form-control" placeholder = "Package Name" value = "">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                        <button type="submit" href="#" class="btn btn-success">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class = "row">
        <?php foreach ($packages_id as $package_id): ?>
            <?php $package = $this->Packages_model->get_package_info(array("packages_id" => $package_id->packages_id))[0]; ?>
            <?php $items = $this->Packages_model->get_item_in_packages(array("item.packages_id" => $package_id->packages_id)); ?>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-light">
                        <strong><?= $package->packages_name ?></strong>
                        <div class="card-actions">
                            <a href="<?= base_url() ?>eventplanner/package_edit_exec/<?= $package->packages_id ?>" class="btn" title = "Edit Package">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a href="#" class="btn" data-toggle="modal" data-target="#package_delete_<?= $package->packages_id ?>" title = "Remove Package">
                                <i class="fa fa-trash"></i>
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
                                    Php. <?= $item->item_price ?>
                                </div>
                            </a>
                            <div class="collapse" id="collapse_item_<?= $item->item_id ?>">
                                <div class="card-body border-0 d-flex justify-content-between align-items-center" style = "background:#ededed;">
                                    <i><?= $item->item_desc ?></i>
                                    <div class="text-muted">
                                        <a href = "#" data-toggle = "modal" data-target = "#edit_item_<?= $item->item_id ?>" title = "Edit Item" class="btn">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="edit_item_<?= $item->item_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action = "<?= base_url() ?>eventplanner/item_edit/<?= $item->item_id ?>" method = "POST">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary text-white">
                                                <h5 class="modal-title">Edit Item</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <div class = "row">
                                                    <div class = "col-md-6">
                                                        <div class="form-group">
                                                            <label for="item_name" class="form-control-label">Item Name</label>
                                                            <input type = "text" name = "item_name" id="item_name" class="form-control" placeholder = "Item Name" value = "<?= set_value("item_name", $item->item_name) ?>">
                                                        </div>
                                                    </div>
                                                    <div class = "col-md-6">
                                                        <div class="form-group">
                                                            <label for="item_price" class="form-control-label">Item Price</label>
                                                            <input type = "text" name = "item_price" id="item_price" class="form-control" placeholder = "Item Price" value = "<?= set_value("item_price", $item->item_price) ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class = "row">
                                                    <div class = "col-md-12">
                                                        <label for="item_desc">Item Description</label>
                                                        <textarea name = "item_desc" id="item_desc" placeholder = "Item Description" class="form-control" rows="6"><?= set_value("item_desc", $item->item_desc) ?></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                                <button type="submit" href="#" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </form>
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
                        <div class="text-muted"><strong>Php. <?= $total_price ?></strong></div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="package_delete_<?= $package->packages_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-danger border-0 text-white">
                            <h5 class="modal-title text-white">Are you sure you want to remove this package?</h5>
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
                                                Php. <?= $item->item_price ?>
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
                        </div>
                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-link" data-dismiss="modal">No</button>
                            <a class = "btn btn-danger" href = "<?= base_url() ?>eventplanner/package_delete/<?= $package->packages_id ?>">Yes</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>