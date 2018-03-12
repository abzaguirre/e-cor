<style>
    .alert-fixed {
        position:fixed; 
        top: 20px; 
        left: 10%; 
        width: 80%;
        z-index:9999; 
        border-radius:0px
    }
</style>
<?php if (!empty($this->session->flashdata("show_flash_success"))): ?>
    <div class="alert alert-dismissible alert-success alert-fixed animated fadeInDownBig">
        <strong><i class = "fa fa-check-circle"></i></strong> <?= $this->session->flashdata("show_flash_success") ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
<?php if (!empty($this->session->flashdata("show_flash_failed"))): ?>
    <div class="alert alert-dismissible alert-danger alert-fixed mx-auto animated fadeInDownBig">
        <?= $this->session->flashdata("show_flash_failed") ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>