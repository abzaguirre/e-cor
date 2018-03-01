<style>
    .alert-dismissible {
        text-align: left !important;
        padding-right: 30px;
    }
</style>
<?php //print_r($this->session->flashdata("err_1"));?>

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
<?php if (!empty($this->session->flashdata("err_6"))): ?>
    <div class="err_msg alert alert-success alert-dismissible fade show" role="alert">
        <strong><i class = "fa fa-exclamation"></i></strong> <?= $this->session->flashdata("err_6"); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
<?php if (!empty($this->session->flashdata("err_7"))): ?>
    <div class="err_msg alert alert-danger alert-dismissible fade show" role="alert">
        <strong><i class = "fa fa-exclamation"></i></strong> <?= $this->session->flashdata("err_7"); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
<?php if (!empty($this->session->flashdata("err_8"))): ?>
    <div class="err_msg alert alert-success alert-dismissible fade show" role="alert">
        <strong><i class = "fa fa-exclamation"></i></strong> <?= $this->session->flashdata("err_8"); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>