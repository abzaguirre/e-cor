<!--============================
SCHEDULES
=============================-->
<style>
    .timepicker{
        overflow: hidden;
    }
    .timepicker .datetimepicker-hours .next,
    .timepicker .datetimepicker-minutes .next > table{
        visibility:hidden;
    }
</style>
<div class="content">
    <?php include 'show_error.php'; ?>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a class = "text-info" href="<?= base_url()?>eventplanner/">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Schedules</li>
    </ol>
    <div class = "row">
        <div class="col-md-12">
            
        </div>
    </div>
    
</div>
<script>
    $(document).ready(function () {
        var dt = new Date();
        dt.setFullYear(new Date().getFullYear());
        //DATE PICKER FOR SCHEDULE
        $(".schedule_datepicker").datetimepicker({
            format: 'MM d, yyyy',
            todayBtn: true,
            autoclose: true,
            minView: 2,
        });
        $('.schedule_datepicker').datetimepicker('setStartDate', dt);

        //TIME PICKER FOR SCHEDULE
        $(".limited-timepicker").datetimepicker({
            format: 'H:ii P',
            autoclose: true,
            minView: 0,
            maxView: 1,
            startView: 1,
            showMeridian: true,
            startDate: new Date(),
        });
        //$('.limited-timepicker').datetimepicker('setStartDate', dt);
        $(".no-limit-timepicker").datetimepicker({
            format: 'H:ii P',
            autoclose: true,
            minView: 0,
            maxView: 1,
            startView: 1,
            showMeridian: true,
        });
    });
</script>