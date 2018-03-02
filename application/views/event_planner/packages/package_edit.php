<!--============================
EDIT PACKAGE
=============================-->

<?php if(!empty($items)):?>
<?php foreach($items as $item):?>
<script>
    $(document).ready(function(){
        $(document).on('click', '#item_edit_<?= $item->item_id?>', function () {
            $.ajax({
                "method": "POST",
                "url": '<?= base_url() ?>' + "eventplanner/item_edit_ajax/<?= $item->item_id?>",
                "dataType": "JSON",
                "data": {
                    'item_name': $("#item_name_<?= $item->item_id?>").val(),
                    'item_price': $("#item_price_<?= $item->item_id?>").val(),
                    'item_desc': $("#item_desc_<?= $item->item_id?>").val(),
                },
                success: function (res) {
                    if (res.success) {
                        console.log(res);
                        location.reload();
                    } else {
                        //Errors in form
                        //alert(res.result);
                        console.log(res);
                    }
                },
                error: function(res){
                    swal("Reload", "Something Went Wrong", "error");
                }
            });
        });
    });
    
</script>

<?php endforeach;?>
<?php endif;?>
<div class="content">
    <?php include 'show_error.php'; ?>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a class = "text-info" href="<?= base_url() ?>eventplanner/">Dashboard</a></li>
        <li class="breadcrumb-item"><a class = "text-info" href="<?= base_url() ?>eventplanner/packages">Packages</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Package</li>
    </ol>
    <div class = "row">
        <div class = "col-md-2"></div>
        <div class = "col-md-8">
            <div class = "card">
                <form action = "<?= base_url() ?>eventplanner/package_edit_name/<?= $package->packages_id ?>" method = "POST">
                    <div class = "card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <span><i class ="fa fa-archive"></i> Edit Package</span>
                        <div class = "btn-group">
                            <button type = "submit" class = "btn btn-primary" title = "Save Package Name"><i class = "fa fa-floppy-o"></i></button>
                            <a href = "<?= base_url() ?>eventplanner/packages" class = "btn btn-primary" title = "Close"><i class = "fa fa-times"></i></a>
                        </div>
                    </div>

                    <div class = "card-body">
                        <div class = "row">
                            <div class = "col-md-12">
                                <div class="form-group">
                                    <label for="packages_name" class="form-control-label">Package Name</label>
                                    <input type = "text" name = "packages_name" id="packages_name" class="form-control" placeholder = "Package Name" value = "<?= set_value("packages_name", $package->packages_name) ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class = "card-body">
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
                                        <?php if (empty($items)): ?>
                                            <tr>
                                                <td colspan="4" class = "text-center">No Items Yet</td>
                                            </tr>
                                        <?php else: ?>
                                            <?php foreach ($items as $item): ?>
                                                <tr>
                                                    <td><?= $item->item_name ?></td>
                                                    <td><?= $item->item_desc ?></td>
                                                    <td><?= $item->item_price ?></td>
                                                    <td class = "text-center">
                                                        <a href = "#" class = "btn btn-primary" data-toggle = "modal" data-target = "#edit_item_<?= $item->item_id ?>">Edit</a>
                                                        <a href = "#" class = "btn btn-danger" data-toggle = "modal" data-target = "#delete_item_<?= $item->item_id ?>">Remove</a>
                                                    </td>
                                                </tr>
                                            <div class="modal fade" id="edit_item_<?= $item->item_id ?>" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary text-white">
                                                            <h5 class="modal-title">Edit Item</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <input type = "hidden" name = "item_id_<?= $item->item_id ?>" value = "<?= $item->item_id ?>" data-item = ""/>
                                                            <div class = "row">
                                                                <div class = "col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="item_name_<?= $item->item_id ?>" class="form-control-label">Item Name</label>
                                                                        <input type = "text" name = "item_name_<?= $item->item_id ?>" id="item_name_<?= $item->item_id ?>" class="form-control" placeholder = "Item Name" value = "<?= set_value("item_name", $item->item_name) ?>">
                                                                    </div>
                                                                </div>
                                                                <div class = "col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="item_price_<?= $item->item_id ?>" class="form-control-label">Item Price</label>
                                                                        <input type = "text" name = "item_price_<?= $item->item_id ?>" id="item_price_<?= $item->item_id ?>" class="form-control" placeholder = "Item Price" value = "<?= set_value("item_price", $item->item_price) ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class = "row">
                                                                <div class = "col-md-12">
                                                                    <label for="item_desc_<?= $item->item_id ?>">Item Description</label>
                                                                    <textarea name = "item_desc_<?= $item->item_id ?>" id="item_desc_<?= $item->item_id ?>" placeholder = "Item Description" class="form-control" rows="6"><?= set_value("item_desc", $item->item_desc) ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary" id = "item_edit_<?= $item->item_id ?>">Save changes</button>
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
                                                                    <strong><?= $item->item_name; ?></strong>
                                                                    <div class="text-muted">
                                                                        ₱ <?= $item->item_price ?>
                                                                    </div>
                                                                </div>
                                                                <div class = "card-body" style = "background:#ededed;">
                                                                    <?= $item->item_desc; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer border-0">
                                                            <button type="button" class="btn btn-link" data-dismiss="modal">No</button>
                                                            <a class = "btn btn-danger" href = "<?= base_url() ?>eventplanner/item_delete/<?= $item->item_id ?>">Yes</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                    <tr>
                                        <td colspan = "4" class="text-center">
                                            <button class = "btn btn-success btn-block" data-toggle = "modal" data-target = "#add_item"><i class = "fa fa-plus"></i> Add Item</button>
                                        </td>
                                    </tr>
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
<div class="modal fade" id="add_item" tabindex="-1" role="dialog">
    <form action = "<?= base_url() ?>eventplanner/item_add/<?= $package->packages_id ?>" method = "POST">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success border-0 text-white">
                    <h5 class="modal-title text-white">Add Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-5">
                    <div class = "row">
                        <div class = "col-md-6">
                            <div class="form-group">
                                <label for="item_name" class="form-control-label">Item Name</label>
                                <input type = "text" name = "item_name" id="item_name" class="form-control" placeholder = "Item Name" value = "">
                            </div>
                        </div>
                        <div class = "col-md-6">
                            <div class="form-group">
                                <label for="item_price" class="form-control-label">Item Price</label>
                                <input type = "text" name = "item_price" id="item_price" class="form-control" placeholder = "Item Price" value = "">
                            </div>
                        </div>
                    </div>
                    <div class = "row">
                        <div class = "col-md-12">
                            <label for="item_desc">Item Description</label>
                            <textarea name = "item_desc" id="item_desc" placeholder = "Item Description" class="form-control" rows="6"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Add Item</button>                               
                </div>
            </div>
        </div>
    </form>
</div>