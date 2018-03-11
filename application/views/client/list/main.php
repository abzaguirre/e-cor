<!--============================
RESERVATION
=============================-->
<style>
    .card-title, .card-footer{
        background:rgba(160,160,160,0.3);
    }
</style>
<div class="content">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class = "text-info" href="<?= base_url() ?>Client/">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Event Reservation</li>
        </ol>

        <div class="card">

            <div class="card-header" style="background:rgba(160,160,160,0.3); height:60px;">
                <span style="color:#6699FF; font-size:20px;"><i class="fa fa-book"></i> Event Reservation</span>
            </div>
            <div class="card-body">
                <div class = "row">
                    <div class = "col-md-2"></div>
                    <div class = "col-md-8">
                        <form method="POST" action="<?= $this->config->base_url() ?>ClientReservation/schedule_add">
                            <div class = "card">
                                <div class = "card-body">
                                    <div class="form-row">
                                        <div class="col">
                                            <input class="form-control <?= !empty(form_error("title")) ? "is-invalid" : ""; ?>" type="text" name="title" placeholder="Event Title (e.g. Birthday)" value = "<?= set_value("title") ?>">
                                            <div class="invalid-feedback"><?= form_error('title') ?></div>
                                            <br>
                                        </div>
                                    </div>
                                    <div class = "form-row">
                                        <textarea class = "form-control <?= !empty(form_error("description")) ? "is-invalid" : ""; ?>" id = "description"  name = "description" placeholder = "Description." rows="2"><?= set_value("description") ?></textarea>
                                        <div class="invalid-feedback"><?= form_error('description') ?></div>
                                    </div>
                                    <div class="form-row mt-3">
                                        <div class="col">
                                            <input type="text" name="start" readonly="" class="form_datetime form-control <?= !empty(form_error("start")) ? "is-invalid" : ""; ?>"  value = "<?= set_value("start") ?>" placeholder="Start Date and Time of the Event">
                                            <div class="invalid-feedback"><?= form_error('start') ?></div>
                                        </div>
                                    </div>
                                    <div class="form-row mt-3">
                                        <div class="col">
                                            <input type="text" name="end" readonly="" class="form_datetime form-control <?= !empty(form_error("end")) ? "is-invalid" : ""; ?>"  value = "<?= set_value("end") ?>" placeholder="End Date and Time of the Event">
                                            <div class="invalid-feedback"><?= form_error('end') ?></div>
                                        </div>
                                    </div>
                                    <div class="form-row mb-3 mt-3">
                                        <div class = "col">
                                            <input type="text" id = "geocomplete" name = "address" class="form-control <?= !empty(form_error("address")) ? "is-invalid" : ""; ?>" value = "<?= set_value("address") ?>" placeholder="Address of Event" aria-label="Address" value = "" >
                                            <div class="invalid-feedback"><?= form_error('address') ?></div>
                                        </div>
                                    </div>
                                    <div class ="form-row mb-3">
                                        <div class ="col-lg-12 text-center" style = "height:400px;">
                                            <div id = "google-map" style="height:100%; min-height:250px;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class = "col text-center">
                                            <button type ="reset" class = "btn btn-outline-danger">Reset</button>&emsp;
                                            <button type ="submit" class = "btn btn-outline-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class = "col-md-2"></div>
                </div>
            </div>
        </div>
    </div>
</div>