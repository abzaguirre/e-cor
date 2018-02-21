<style>
    .footer {
        position: relative;
        bottom: 0;
    }
</style>
<footer class="footer bg-violet">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <p class="copyright font-alt" style="color:black">&copy; 2018&nbsp; <span style="color:white;">E-COR</span>, All Rights Reserved</p>
            </div>
            <div class="col-sm-6">
                <div class="footer-social-links" style="color:black">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="scroll-up"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>
</main>

<!--  
   JavaScripts
   =============================================
-->
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
<!-- BOOTSTRAP -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.bundle.min.js" integrity="sha384-VspmFJ2uqRrKr3en+IG0cIq1Cl/v/PHneDw6SQZYgrcr8ZZmZoQ3zhuGfMnSR/F2" crossorigin="anonymous"></script>

<script src="<?= base_url() ?>assets/main/lib/wow/dist/wow.js"></script>
<script src="<?= base_url() ?>assets/main/lib/jquery.mb.ytplayer/dist/jquery.mb.YTPlayer.js"></script>
<script src="<?= base_url() ?>assets/main/lib/isotope/dist/isotope.pkgd.js"></script>
<script src="<?= base_url() ?>assets/main/lib/imagesloaded/imagesloaded.pkgd.js"></script>
<script src="<?= base_url() ?>assets/main/lib/flexslider/jquery.flexslider.js"></script>
<script src="<?= base_url() ?>assets/main/lib/owl.carousel/dist/owl.carousel.min.js"></script>
<script src="<?= base_url() ?>assets/main/lib/smoothscroll.js"></script>
<script src="<?= base_url() ?>assets/main/lib/magnific-popup/dist/jquery.magnific-popup.js"></script>
<script src="<?= base_url() ?>assets/main/lib/simple-text-rotator/jquery.simple-text-rotator.min.js"></script>
<script src="<?= base_url() ?>assets/main/js/plugins.js"></script>
<script src="<?= base_url() ?>assets/main/js/main.js"></script>
<script src="<?= base_url() ?>assets/bootstrap-datepicker/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript">
    var dt = new Date();
    dt.setFullYear(new Date().getFullYear() - 18);
    $(document).ready(function () {
        $(".form_datetime").datetimepicker({
            format: 'MM dd, yyyy',
            todayBtn: true,
            autoclose: true,
            minView: 2,
        });
        $('.form_datetime').datetimepicker('setEndDate', dt);
    });

</script>  
</body>
</html>