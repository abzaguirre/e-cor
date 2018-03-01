
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form class="form" action="<?= base_url() ?>eventplanner/specialty" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa fa-info-circle"></i> Specialty</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input class="form-control <?= !empty(form_error("specialtyName")) ? "is-invalid" : ""; ?>" autofocus="" type="text" name="specialtyName" placeholder="Specialty"  value = "<?= set_value("specialtyName") ?>"/>
                    <div class="invalid-feedback"><?= form_error('specialtyName') ?></div><br>
                    <div class="form-group">
                        <textarea class="form-control <?= !empty(form_error("description")) ? "is-invalid" : ""; ?>" id="description" name = "description" rows="3" placeholder="Specialty Description"></textarea>
                        <div class="invalid-feedback"><?= form_error('description') ?></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js"></script>
<!-- SweetAlert -->
<script src = "https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script src="<?= base_url() ?>assets/user/custom/js/carbon.js"></script>
<script src="<?= base_url() ?>assets/user/custom/js/demo.js"></script>
</body>
</html>