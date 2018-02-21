<section class="module">
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-8" style="margin-top:-100px;">
                <h4 class="font-alt">Register</h4>
                <hr class="divider-w mb-20">
                <style>
                    input{
                        text-transform:none !important;
                    }
                </style>
                <form class="form" action="<?= base_url() ?>register/register_submit" method="POST">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <input class="form-control <?= !empty(form_error("lastname")) ? "is-invalid" : ""; ?>" autofocus="" type="text" name="lastname" placeholder="Lastname"  value = "<?= set_value("lastname") ?>"/>
                                <div class="invalid-feedback"><?= form_error('lastname') ?></div>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control <?= !empty(form_error("firstname")) ? "is-invalid" : ""; ?>" type="text" name="firstname" placeholder="Firstname" value = "<?= set_value("firstname") ?>"/>
                                <div class="invalid-feedback"><?= form_error('firstname') ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="form-control <?= !empty(form_error("username")) ? "is-invalid" : ""; ?>" id="username" type="text" name="username" placeholder="Username" value = "<?= set_value("username") ?>"/>
                        <div class="invalid-feedback"><?= form_error('username') ?></div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <input class="form-control <?= !empty(form_error("password")) ? "is-invalid" : ""; ?>" type="password" name="password" placeholder="Password" value = "<?= set_value("password") ?>"/>
                                <div class="invalid-feedback"><?= form_error('password') ?></div>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control <?= !empty(form_error("conpassword")) ? "is-invalid" : ""; ?>"  type="password" name="conpassword" placeholder="Confirm Password" value = "<?= set_value("conpassword") ?>"/>
                                <div class="invalid-feedback"><?= form_error('conpassword') ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" name="bday" class="form_datetime form-control <?= !empty(form_error("bday")) ? "is-invalid" : ""; ?>" placeholder="Birthday" readonly="" value = "<?= set_value("bday") ?>">
                        <div class="invalid-feedback"><?= form_error('bday') ?></div>
                    </div>
                    <div class="form-row mb-3"> 
                        <div class="col"></div>
                        <div class="col">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gender" value="Male" checked>
                                Male
                            </label>
                        </div>
                        <div class="col"></div>
                        <div class="col">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gender" value="Female" >
                                Female
                            </label>
                        </div>
                        <div class="col"></div>
                    </div>
                    <div class="form-group">
                        <input class="form-control <?= !empty(form_error("phone")) ? "is-invalid" : ""; ?>" type="text" name="phone" placeholder="Phone Number" value = "<?= set_value("phone") ?>"/>
                        <div class="invalid-feedback"><?= form_error('phone') ?></div>
                    </div>
                    <div class="form-group">
                        <input class="form-control <?= !empty(form_error("email")) ? "is-invalid" : ""; ?>" type="email" name="email" placeholder="Email Address" value = "<?= set_value("email") ?>"/>
                        <div class="invalid-feedback"><?= form_error('email') ?></div>
                    </div>
                    <div class="form-group">
                        <input type="text" id = "geocomplete" name = "address" class="form-control <?= !empty(form_error("address")) ? "is-invalid" : ""; ?>" placeholder="Address" aria-label="Address"  value = "<?= set_value("address") ?>">
                        <div class="invalid-feedback"><?= form_error('address') ?></div>
                    </div>
                    <div class ="form-row mb-3">
                        <div class ="col-lg-12 text-center" style = "height:400px;">
                            <div id = "google-map" style="height:100%; min-height:250px;"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class ="mx-auto">
                            <?= $widget ?>
                            <?= $script ?>
                        </div>
                    </div>
                    <hr class="divider-w mb-20">
                    <div class="form-check">
                        <input class="form-check-input <?= !empty(form_error("accept")) ? "is-invalid" : ""; ?>" style="margin-top:3px;" type="checkbox" name="accept" value="1">
                        <label class=" form-check-label">
                            I agree to the <a href="#" style="color:blue;">Terms and Conditions.</a>
                        </label>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-round btn-b pull-right">Submit</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-2">
            </div>
        </div>
    </div>
</section>