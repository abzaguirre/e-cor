
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

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/user/custom/js/sb-admin-datatables.min.js"></script>

<!-- Bootstrap Lightbox-->
<script src = "https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>
<script>
    $(document).on('click', '[data-toggle="lightbox"]', function (event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });
</script>
<!-- SweetAlert -->
<script src = "https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<!-- FullCalendar -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.6.2/fullcalendar.min.js"></script>

<!-- Bootstrap Datepicker -->
<script src="<?= base_url() ?>assets/bootstrap-datepicker/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript">
 var dt = new Date();
 dt.setFullYear(new Date().getFullYear());
 $(document).ready(function () {
     $(".form_datetime").datetimepicker({
         format: 'MM d, yyyy',
         todayBtn: true,
         autoclose: true,
         minView: 2,
         startView: 2,
     });
     $('.form_datetime').datetimepicker('setEndDate', dt);
 });
</script>

<!-- GOOGLE MAPS-->
<script>
    //EMPTY ADDRESS INPUT
    var map;
    var map_data = document.getElementById('google-map');
    function initialize() {
        var address = map_data.dataset.address;
        
        // Set up the map
        var mapOptions = {
            zoom: 17,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            streetViewControl: false,
        };
        
        //find map then put mapOptions 
        map = new google.maps.Map(document.getElementById('google-map'), mapOptions);
        
        var geocoder = new google.maps.Geocoder();
        
        //load map
        google.maps.event.addDomListener(window, 'load', initialize);
        google.maps.event.addDomListener(window, 'load', get_latLng(geocoder, map));
    }
    
    function get_latLng(geocoder, resultsMap){
        var address = map_data.dataset.address;
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
              
            resultsMap.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
              map: resultsMap,
              position: results[0].geometry.location,
              title:address
            });
            
          } else {
            console.log('Geocode was not successful for the following reason: ' + status);
          }
        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyD1VJrwMKjjvTi626jR6pdoaNdIHKEdp0c&callback=initialize"></script>

<!-- GEO COMPLETE -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/geocomplete/1.7.0/jquery.geocomplete.min.js"></script>
<script>
    $(function () {
        $("#geocomplete").geocomplete({
            map: "#google-map",
            details: "form",
            country: 'ph',
        }).bind("geocode:result", function (event, result) {
//            console.log("===== FOOTER =====");
//            console.log(event);
//            console.log(result);
        });
    });
</script>
<script src="<?= base_url() ?>assets/user/custom/js/carbon.js"></script>
<script src="<?= base_url() ?>assets/user/custom/js/demo.js"></script>
</body>
</html>