<div class = "container">
    <div class = "row align-items-center">
        <div class = "col-xs-12 mx-auto text-center my-5">
            <?php if ($status == "success"): ?>
                <h1 class = "display-4">VERIFY YOUR EMAIL NOW!</h1>
            <?php elseif ($status == "failed"): ?>
                <h1 class = "display-4">SOMETHING WENT WRONG IN REGISTRATION</h1>
            <?php endif; ?>
            <a href ="<?= base_url() ?>login" class = "btn btn-primary mt-4">Back to login page</a>
        </div>
    </div>
</div>