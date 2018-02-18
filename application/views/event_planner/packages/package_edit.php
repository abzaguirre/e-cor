<!--============================
EDIT PACKAGE
=============================-->
<div class="content">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a class = "text-info" href="<?= base_url()?>eventplanner/">Dashboard</a></li>
        <li class="breadcrumb-item"><a class = "text-info" href="<?= base_url()?>eventplanner/packages">Packages</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Package</li>
    </ol>
    <div class = "row">
        <div class = "col-md-2"></div>
        <div class = "col-md-8">
            <div class = "card">
                <div class = "card-header bg-primary text-white">
                    <i class ="fa fa-archive"></i> Edit Package
                </div>
                <div class = "card-body">
                    <div class = "row">
                        <div class = "col-md-12">
                            <div class="form-group">
                                <label for="packages_name" class="form-control-label">Package Name</label>
                                <input type = "text" name = "packages_name" id="packages_name" class="form-control" placeholder = "Package Name" value = "<?= set_value("packages_name", $package->packages_name)?>">
                            </div>
                        </div>
                    </div>
                    <div class = "row">
                        <div class = "col-md-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Item Name</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($items as $item):?>
                                            <tr>
                                                <td><?= $item->item_name?></td>
                                                <td><?= $item->item_desc?></td>
                                                <td><?= $item->item_price?></td>
                                                <td class = "text-center">
                                                    <a href = "#" class = "btn btn-primary" data-toggle = "modal" data-target = "#edit_item_<?= $item->item_id?>">Edit</a>
                                                    <a href = "#" class = "btn btn-danger" data-toggle = "modal" data-target = "#delete_item_<?= $item->item_id?>">Remove</a>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="edit_item_<?= $item->item_id?>" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
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
                                                                        <input type = "text" name = "item_name" id="item_name" class="form-control" placeholder = "Item Name" value = "<?= set_value("item_name", $item->item_name)?>">
                                                                    </div>
                                                                </div>
                                                                <div class = "col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="item_price" class="form-control-label">Item Price</label>
                                                                        <input type = "text" name = "item_price" id="item_price" class="form-control" placeholder = "Item Price" value = "<?= set_value("item_price", $item->item_price)?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class = "row">
                                                                <div class = "col-md-12">
                                                                    <label for="item_desc">Item Description</label>
                                                                    <textarea name = "item_desc" id="item_desc" placeholder = "Item Description" class="form-control" rows="6"><?= set_value("item_desc", $item->item_desc)?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                                            <a href="<?= base_url() ?>eventplanner/item_edit/<?= $item->item_id ?>" class="btn btn-primary">Save changes</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="delete_item_<?= $item->item_id ?>" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger border-0 text-white">
                                                            <h5 class="modal-title text-white">Are you sure you want to remove this item?</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body p-5">
                                                            <div class="card">
                                                                <div class="card-header bg-light d-flex justify-content-between">
                                                                    <strong><?= $item->item_name;?></strong>
                                                                    <div class="text-muted">
                                                                        Php. <?= $item->item_price ?>
                                                                    </div>
                                                                </div>
                                                                <div class = "card-body">
                                                                    <?= $item->item_desc;?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer border-0">
                                                            <button type="button" class="btn btn-link" data-dismiss="modal">No</button>
                                                            <a class = "btn btn-danger" href = "<?= base_url() ?>eventplanner/package_delete/<?= $package->packages_id ?>">Yes</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class = "col-md-2"></div>
    </div>
</div>