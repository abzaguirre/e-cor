

</div>
</div>
<!-- GOOGLE MAPS-->
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyD1VJrwMKjjvTi626jR6pdoaNdIHKEdp0c"></script>
<script>
    //EMPTY ADDRESS INPUT
    var map;
    function initialize() {
        // Set up the map
        var mapOptions = {
            zoom: 18,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            streetViewControl: false,
        };
        map = new google.maps.Map(document.getElementById('google-map'), mapOptions);
        google.maps.event.addDomListener(window, 'load', initialize);
    }
</script>
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
<script src="<?= base_url() ?>assets/bootstrap-datepicker/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript">
    var dt = new Date();
    dt.setFullYear(new Date().getFullYear());
    $(document).ready(function () {
        $(".form_datetime").datetimepicker({
            format: 'MM d, yyyy  H:ii P',
            todayBtn: true,
            autoclose: true,
        });
        $('.form_datetime').datetimepicker('setStartDate', dt);
    });
</script>
<!-- Core plugin JavaScript-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js"></script>
<!-- SweetAlert -->
<script src = "https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script src="<?= base_url() ?>assets/user/custom/js/carbon.js"></script>
<script src="<?= base_url() ?>assets/user/custom/js/demo.js"></script>
</body>
</html>