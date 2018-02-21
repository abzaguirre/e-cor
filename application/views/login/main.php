<section class="module">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
            </div>
            <div class="col-sm-6">
                <h4 class="font-alt">Login</h4>
                <hr class="divider-w mb-20">
                <style>
                    input{
                        text-transform:none !important;
                    }
                </style>
                <form class="form" action="<?= base_url() ?>login/login_exec/" method="POST">
                    <?php include_once (APPPATH . "views/show_error/show_error.php"); ?>
                    <div class="form-group">
                        <input class="form-control" style="text-transform:none !important;" autofocus="" id="username" type="text" name="username" placeholder="Username"/>
                    </div>
                    <div class="form-group">
                        <input class="form-control" style="text-transform:none !important;" id="password" type="password" name="password" placeholder="Password"/>
                    </div>
                    <hr class="divider-w mb-20">
                    <div class="form-group">
                        <button class="btn btn-round btn-b pull-right">Login</button>
                    </div>
                    <div class="form-group"><span class="font-alt">New to E-Cor? </span><a href="<?= base_url() ?>register" style="color:blue;">Create an account.</a></div>
                    <div class="form-group"><a href="#" style="color:blue;">Forgot Password?</a></div>
                </form>
            </div>
            <div class="col-sm-3">
            </div>
        </div>
    </div>
</section>