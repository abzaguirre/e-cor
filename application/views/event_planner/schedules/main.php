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
<style>
    .fc-event {
        font-size: inherit !important;
        font-weight: bold !important;
        cursor: pointer;
    }
    .fc-future, .fc-today{
        cursor: pointer;
    }
    .fc-widget-content.fc-future, .fc-widget-content.fc-today{
        cursor: pointer;
    }
    .fc-past, .fc-past.fc-other-month{
        background:#ececec;
    }
    .radio{
        display:inline-block;
        width:40px;
        min-height: 10px;
        height: 40px;
        max-height: 40px;
        border-radius: 100%;
        border: 4px solid #fff;
        cursor:pointer;
    }
    .radio.selected{
        border-color:#2e7d32;
    }
    .fc-day-grid-event .fc-time{
        font-weight: normal;
    }
    .fc-time{
        font-weight: normal;
    }
</style>
<script>
    $(document).ready(function () {
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,listWeek'
            },
            handleWindowResize: true,
            weekends: true, // Show weekends
            //navLinks: true,  //can click day/week names to navigate views
            timeFormat: 'hh:mm A',
            editable: false,
            droppable: false,
            eventLimit: true, // allow "more" link when too many events
            displayEventTime: true,
            allDayText: 'Events/Activity',
            allDay: "",
            dayClick: function (date, jsEvent, view) {
                if (moment() > date) {
                    if (moment().date() === date.date()) {
                        //Day clicked is today.
                        //Modify Modal - restrict startdate to current time
                        $('#customEvent').modal('show');
                        $('#event_startdate').val(date.format("MMMM D, YYYY")).removeClass("schedule_datepicker");
                        $('#event_starttime').val(moment().format("h:mm A"));
                        $('#event_title').val("");
                        $('#event_description').val("");
                        $('#event_enddate').val("");
                        $('#event_endtime').val("");
                        $('#sendReq').css({"display": "inline-block"});
                        $('#updateReq').css({"display": "none"});
                        $('#deleteReq').css({"display": "none"});
                        
                        
                    } else {
                        //Day clicked is past
                        //alert("You cannot set a schedule before the current date!");
                        swal("Oops", "You cannot set a schedule before the current date!", "error");
                    }
                } else {
                    //Dayclick is future.
                    //Modify Modal
                    $('#customEvent').modal('show');
                    $('#event_startdate').val(date.format("MMMM D, YYYY"));
                    $('#event_title').val("");
                    $('#event_description').val("");
                    $('#sendReq').css({"display": "inline-block"});
                    $('#updateReq').css({"display": "none"});
                    $('#deleteReq').css({"display": "none"});
                    
                }
            },
            eventClick: function (calEvent, jsEvent, view) {
                $.ajax({
                    "method": "POST",
                    "url": '<?= base_url() ?>' + "Schedules/getsched/",
                    "dataType": "JSON",
                    "data": {
                        'id': calEvent.schedule_id
                    },
                    success: function (res) {
                        console.log(res);
                        $('#customEvent').modal('show');
                        $('#event_title').val("");
                        $('#event_description').val("");
                        $('#event_starttime').val(res[0].starttime);
                        $('#event_startdate').val(res[0].startdate);
                        $('#event_startdate').addClass("schedule_datepicker");
                        
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
                        
                        $('#event_enddate').val(res[0].enddate);
                        $('#event_endtime').val(res[0].endtime);
                        $('#event_id').val(res[0].id);
                        $('#event_title').val(res[0].title);
                        $('#event_description').val(res[0].description);
                        $('#event_color').val(res[0].color);
                        
                        $('.colors .radio').parent().find('.radio').removeClass("selected");
                        switch(res[0].color){
                            case '#3a87ad' :{
                                    $("#_3a87ad").addClass("selected");
                                    break;
                            }
                            case '#1b5e20' :{
                                    $("#_1b5e20").addClass("selected");
                                    break;
                            }
                            case '#fbc02d' :{
                                    $("#_fbc02d").addClass("selected");
                                    break;
                                }
                            case '#d81b60' :{
                                    $("#_d81b60").addClass("selected");
                                    break;
                                }
                            case '#7b1fa2' :{
                                    $("#_7b1fa2").addClass("selected");
                                    break;
                                }
                            case '#1976d2' :{
                                    $("#_1976d2").addClass("selected");
                                    break;
                                }
                            case '#e53935' :{
                                    $("#_e53935").addClass("selected");
                                    break;
                                }
                            case '#00897b' :{
                                    $("#_00897b").addClass("selected");
                                    break;
                                }
                            case '#e65100' :{
                                    $("#_e65100").addClass("selected");
                                    break;
                                }
                            case '#6d4c41' :{
                                    $("#_6d4c41").addClass("selected");
                                    break;
                                }
                            case '#3949ab' :{
                                    $("#_3949ab").addClass("selected");
                                    break;
                                }
                            case '#ffb300' :{
                                    $("#_ffb300").addClass("selected");
                                    break;
                                }
                            default:{
                                    break;
                            }
                        }
                        
                        $('#eventHeader').html("<i class = 'fa fa-calendar'></i> Event Information");
                        $('#sendReq').css({"display": "none"});
                        $('#updateReq').css({"display": "inline-block"});
                        $('#deleteReq').css({"display": "inline-block"});
                    },
                    error: function(res){
                        //alert("something went wrong");
                        swal("Reload", "Something Went Wrong", "error");
                    }
                    
                });
            },
            
            events: {
                method: "POST",
                url: '<?= base_url() ?>' + 'Schedules/getscheds/',
                dataType: 'JSON',
            },
            eventRender: function(event, element) {
                //TOOLTIP
            }
        });

        //BUTTON FUNCTIONS

        $(document).on('click', '#sendReq', function () {
            $.ajax({
                "method": "POST",
                "url": '<?= base_url() ?>' + "Schedules/setreserve/",
                "dataType": "JSON",
                "data": {
                    'schedule_title': $("#event_title").val(),
                    'schedule_desc': $("#event_description").val(),
                    'schedule_color': $("#event_color").val(),
                    'schedule_startdate': $("#event_startdate").val(),
                    'schedule_starttime': $("#event_starttime").val(),
                    'schedule_enddate': $("#event_enddate").val(),
                    'schedule_endtime': $("#event_endtime").val()
                },
                success: function (res) {
                    if (res.success) {
                        swal({title: "Success", text: "Successfully added a schedule", type: "success"},
                            function(){ 
                                location.reload();
                            }
                        );
                    } else {
                        //Errors in form
                        //alert(res.result);
                        swal("Oops", res.result, "error");
                        show_error(res.title, $("#event_title"));
                        show_error(res.startdate, $("#event_startdate"));
                        show_error(res.starttime, $("#event_starttime"));
                        show_error(res.enddate, $("#event_enddate"));
                        show_error(res.endtime, $("#event_endtime"));
                    }
                },
                error: function(res){
                    swal("Reload", "Something Went Wrong", "error");
                    console.log(res);
                }
            });

        });

        $(document).on('click', '#updateReq', function () {
            $.ajax({
                "method": "POST",
                "url": "<?= base_url() ?>" + "Schedules/updatereserve/",
                "dataType": "JSON",
                "data": {
                    'schedule_id': $("#event_id").val(),
                    'schedule_title': $("#event_title").val(),
                    'schedule_desc': $("#event_description").val(),
                    'schedule_color': $("#event_color").val(),
                    'schedule_startdate': $("#event_startdate").val(),
                    'schedule_starttime': $("#event_starttime").val(),
                    'schedule_enddate': $("#event_enddate").val(),
                    'schedule_endtime': $("#event_endtime").val()
                },
                success: function (res) {
                    if (res.success) {
                        swal({title: "Success", text: "Successfully edited a schedule", type: "success"},
                            function(){ 
                                location.reload();
                            }
                        );
                    } else {
                        swal("Oops", res.result, "error");
                        show_error(res.title, $("#event_title"));
                        show_error(res.startdate, $("#event_startdate"));
                        show_error(res.starttime, $("#event_starttime"));
                        show_error(res.enddate, $("#event_enddate"));
                        show_error(res.endtime, $("#event_endtime"));
                    }
                },
                error:function(res){
                    swal("Reload", "Something went wrong!", "error");
                }
            });
        });

        $(document).on('click', '#deleteReq2', function () {
            $.ajax({
                "method": "POST",
                "url": "<?= base_url() ?>" + "Schedules/deletereserve/",
                "dataType": "JSON",
                "data": {
                    'schedule_id': $("#event_id").val()
                },
                success: function (res) {
                    if (res.success) {
                        swal({title: "Success", text: "Successfully cancelled a schedule", type: "info"},
                            function(){ 
                                location.reload();
                            }
                        );
                    } else {
                        swal("Error", res.result, "error");
                    }
                }
            });
        });


    });
</script>
<div class="content">
    <?php include 'show_error.php'; ?>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a class = "text-info" href="<?= base_url()?>eventplanner/">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Schedules</li>
    </ol>
    <div class = "row">
        <div class="col-md-12">
            <div id="calendar"></div>
        </div>
    </div>
</div>

<!-- Modal For Adding Events -->
<div class="modal fade" id="customEvent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form id ="eventForm" method = "POST" role = "form">
        <input type ="hidden" name = "event_id" id = "event_id"/>
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eventHeader"><i class = "fa fa-calendar-plus-o"></i> Add an Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body validate-fields">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="event_title">Title</label>
                            <input type="text" class="form-control" id="event_title" name = "event_title" placeholder="Title">
                        </div>
                        <div class="form-group col-md-6 ">
                            <label for="event_color">Color</label>
                            <div class="colors text-center">
                                <div id = "_3a87ad" class = "radio selected" style = "background:#3a87ad;" data-value="#3a87ad"></div>
                                <div id = "_1b5e20" class = "radio " style = "background:#1b5e20;" data-value="#1b5e20"></div>
                                <div id = "_fbc02d" class = "radio " style = "background:#fbc02d;" data-value="#fbc02d"></div>
                                <div id = "_d81b60" class = "radio " style = "background:#d81b60;" data-value="#d81b60"></div>
                                <div id = "_7b1fa2" class = "radio " style = "background:#7b1fa2;" data-value="#7b1fa2"></div>
                                <div id = "_1976d2" class = "radio " style = "background:#1976d2;" data-value="#1976d2"></div>
                                <br>
                                <div id = "_e53935" class = "radio " style = "background:#e53935;" data-value="#e53935"></div>
                                <div id = "_00897b" class = "radio " style = "background:#00897b;" data-value="#00897b"></div>
                                <div id = "_e65100" class = "radio " style = "background:#e65100;" data-value="#e65100"></div>
                                <div id = "_6d4c41" class = "radio " style = "background:#6d4c41;" data-value="#6d4c41"></div>
                                <div id = "_3949ab" class = "radio " style = "background:#3949ab;" data-value="#3949ab"></div>
                                <div id = "_ffb300" class = "radio " style = "background:#ffb300;" data-value="#ffb300"></div>
                                <input type="hidden" id="event_color" name="event_color" value = "#3a87ad"/>
                            </div>
                        </div>
                    </div>
                    <div class = "form-row">
                        <div class = "col-md-6 form-group">
                            <label for="event_startdate">Start Date</label>
                            <input type = "text" id = "event_startdate" name = "event_startdate" class = "form-control" readonly=""/>
                        </div>
                        <div class = "col-md-6 form-group">
                            <label for="event_starttime">Start Time</label>
                            <input type = "text" id = "event_starttime" name = "event_starttime" class = "form-control no-limit-timepicker" placeholder = "Start Time" readonly="" required/>
                        </div>
                    </div>
                    <div class = "form-row">
                        <div class = "col-md-6 form-group">
                            <label for="event_enddate">End Date</label>
                            <input type = "text" id = "event_enddate" name = "event_enddate" class = "form-control schedule_datepicker" placeholder = "End Date" readonly="" required/>
                        </div>
                        <div class = "col-md-6 form-group">
                            <label for="event_endtime">End Time</label>
                            <input type = "text" id = "event_endtime" name = "event_endtime" class = "form-control no-limit-timepicker" placeholder = "End Time" readonly="" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="event_description">Description</label>
                        <textarea class="form-control" id="event_description" name ="event_description" placeholder="Description"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id = "sendReq" class="btn btn-primary"><i class = "fa fa-plus"></i> Create Event</button>
                    <button type="button" id = "deleteReq" data-toggle = "modal" data-target = "#delete_sched" class="btn btn-danger"><i class = "fa fa-ban"></i> Cancel Event</button>
                    <button type="button" id = "updateReq" class="btn btn-primary"><i class = "fa fa-pencil"></i> Reschedule Event</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- Cancel Event Modal-->
<div class="modal fade" id="delete_sched" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Canceling Event</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Canceling Event will remove the event from the schedules. Click "Proceed" to remove event.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal" style = "cursor: pointer;">Cancel</button>
                <a class="btn btn-primary" id = "deleteReq2">Proceed</a>
            </div>
        </div>
    </div>
</div>
<script>
    $('.colors .radio').click(function () {
        $(this).parent().find('.radio').removeClass('selected');
        $(this).addClass('selected');
        var val = $(this).attr('data-value');
        $(this).parent().find('input').val(val);
    });
</script>

<!-- RESET FORM ON MODAL CLOSE -->
<script>
     $('.modal').on('hidden.bs.modal', function(){
        $(this).find('input').siblings(".invalid-feedback").remove();
        $(this).find('input').removeClass("is-invalid");
     });
</script>


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