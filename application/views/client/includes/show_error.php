<style>
    .alert-dismissible {
        text-align: left !important;
        padding-right: 30px;
    }
</style>
<?php if (!empty($this->session->flashdata("err_1"))): ?>
    <div class="err_msg alert alert-danger alert-dismissible fade show" role="alert">
        <strong><i class = "fa fa-exclamation"></i></strong> <?= $this->session->flashdata("err_1"); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
<?php if (!empty($this->session->flashdata("err_2"))): ?>
    <div class="err_msg alert alert-danger alert-dismissible fade show" role="alert">
        <strong><i class = "fa fa-exclamation"></i></strong> <?= $this->session->flashdata("err_2"); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
<?php if (!empty($this->session->flashdata("err_3"))): ?>
    <div class="err_msg alert alert-danger alert-dismissible fade show" role="alert">
        <strong><i class = "fa fa-exclamation"></i></strong> <?= $this->session->flashdata("err_3"); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
<?php if (!empty($this->session->flashdata("err_4"))): ?>
    <div class="err_msg alert alert-danger alert-dismissible fade show" role="alert">
        <strong><i class = "fa fa-exclamation"></i></strong> <?= $this->session->flashdata("err_4"); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<?php if (!empty($this->session->flashdata("err_5"))): ?>
    <div class="err_msg alert alert-danger alert-dismissible fade show" role="alert">
        <strong><i class = "fa fa-exclamation"></i></strong> <?= $this->session->flashdata("err_5"); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<?php if (!empty($this->session->flashdata("reserve"))): ?>
    <div class="alert alert-dismissible alert-success alert-fixed mx-auto animated fadeInDownBig">
        <?= $this->session->flashdata("reserve") ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<?php if (!empty($this->session->flashdata("resched"))): ?>
    <div class="alert alert-dismissible alert-success alert-fixed mx-auto animated fadeInDownBig">
        <?= $this->session->flashdata("resched") ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<?php if (!empty($this->session->flashdata("cancel"))): ?>
    <div class="alert alert-dismissible alert-success alert-fixed mx-auto animated fadeInDownBig">
        <?= $this->session->flashdata("cancel") ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>