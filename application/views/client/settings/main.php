<!--============================
Settingss
=============================-->

<div class="content">
    <div class="container-fluid">
        <?php include_once (APPPATH . "views/client/includes/show_error.php"); ?>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class = "text-info" href="<?= base_url() ?>Client/">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Settings</li>
        </ol>
        <div class="card">
            <div class="card-header">
                <i class="fa fa-lock"></i> Login Settings
            </div>
            <div class="card-body container-fluid">

                <div class="row">

                    <div class="col-md-12">
                        <div id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="card">
                                <a data-toggle="collapse" data-parent="#accordion" style="text-decoration: none;" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">                                    <div class="card-header" role="tab" id="headingOne">
                                        <h5 class="mb-0">
                                            Change Username
                                        </h5>
                                    </div>
                                </a>

                                <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="card-block">
                                        <form class="form" action="<?= base_url() ?>ClientSettings/username_submit/" method="POST">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <br>
                                                    <div class="form-group col-md-12 <?php if (!empty(form_error("client_curusername"))): ?>has-danger<?php else: ?>has-success<?php endif; ?>">
                                                        <label for="client_curusername" class=form-control-label">Current Username: </label>
                                                        <input type="text" name="client_curusername" value = "<?= set_value("client_curusername", $current_client->client_username); ?>"  readonly="" class="form-control <?php if (!empty(form_error("client_curusername"))): ?>is-invalid<?php else: ?><?php endif; ?>">
                                                        <div class="invalid-feedback"><?= form_error('client_curusername') ?></div>
                                                    </div>
                                                    <div class="form-group col-md-12 <?php if (!empty(form_error("client_username"))): ?>has-danger<?php else: ?>has-success<?php endif; ?>">
                                                        <label for="client_username" class=form-control-label">New Username: </label>
                                                        <input type="text" name="client_username" value = "<?= set_value("client_username"); ?>"  class="form-control <?php if (!empty(form_error("client_username"))): ?>is-invalid<?php else: ?><?php endif; ?>">
                                                        <div class="invalid-feedback"><?= form_error('client_username') ?></div>
                                                    </div>
                                                    <center>
                                                        <button class="btn btn-success" > 
                                                            <i class="fa fa-send fa-lg"></i> Submit
                                                        </button>
                                                    </center>
                                                    <br>
                                                </div>

                                            </div>
                                        </form>  
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <a class="collapsed" data-toggle="collapse" style="text-decoration: none;" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <div class="card-header" role="tab" id="headingTwo">
                                        <h5 class="mb-0">
                                            Change Password
                                        </h5>
                                    </div>
                                </a>

                                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="card-block">
                                        <form class="form" action="<?= base_url() ?>ClientSettings/password_submit/" method="POST">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <br>
                                                    <div class="form-group col-md-12 <?php if (!empty(form_error("client_curusername"))): ?>has-danger<?php else: ?>has-success<?php endif; ?>">
                                                        <label for="client_password" class=form-control-label">New Password: </label>
                                                        <input type="password" name="client_password" class="form-control <?php if (!empty(form_error("client_password"))): ?>is-invalid<?php else: ?><?php endif; ?>">
                                                        <div class="invalid-feedback"><?= form_error('client_password') ?></div>
                                                    </div>
                                                    <div class="form-group col-md-12 <?php if (!empty(form_error("client_conpassword"))): ?>has-danger<?php else: ?>has-success<?php endif; ?>">
                                                        <label for="client_conpassword" class=form-control-label">Confirm Password: </label>
                                                        <input type="password" name="client_conpassword"  class="form-control <?php if (!empty(form_error("client_conpassword"))): ?>is-invalid<?php else: ?><?php endif; ?>">
                                                        <div class="invalid-feedback"><?= form_error('client_conpassword') ?></div>
                                                    </div>
                                                    <center>
                                                        <button class="btn btn-success" > 
                                                            <i class="fa fa-send fa-lg"></i> Submit
                                                        </button>
                                                    </center>
                                                    <br>
                                                </div>

                                            </div>
                                        </form>      
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
