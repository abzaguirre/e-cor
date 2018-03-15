<!--============================
PROFILE
=============================-->

<div class="content">
    <div class="container-fluid">
        <?php include_once (APPPATH . "views/client/includes/show_error.php"); ?>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class = "text-info" href="<?= base_url() ?>Eventplanner/">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profile</li>
        </ol>
        <div class="row">
            <div class="col-md-3">   
                <div class="card ">
                    <div class="card-header">
                        <center>
                            <img src="<?= base_url() . $current_ep->event_planner_picture ?>" class="img-fluid img-circle">
                        </center>
                    </div>
                    <div class="card-body" style="margin-top:-20px;">
                        <center>
                            <div class="card-title">
                                <hr>
                                <h4><?= $current_ep->event_planner_firstname . " " . $current_ep->event_planner_lastname ?></h4>
                            </div>
                            <ul class="list-group list-group-flush ">
                                <li class="list-group-item"><?= $current_ep->event_planner_email ?></li>
                                <li class="list-group-item"><?= $current_ep->event_planner_contact_no ?></li>
                            </ul>
                        </center>
                    </div>
                </div>
                <br>
            </div> 
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h5><i class="fa fa-user"></i> About</h5>
                    </div>
                    <div class="card-body">
                        <a class="btn btn-outline-info pull-right" href="<?= base_url() ?>EventplannerProfile/edit_profile"><i class="fa fa-pencil"></i> Edit Profile</a>

                        <table style="margin-top:55px;" class = "table table-responsive-md table-hover">
                            <tbody>
                                <tr>
                                    <th>Username: </th>
                                    <td><?= $current_ep->event_planner_username ?></td>
                                </tr>
                                <tr>
                                    <th>Firstname: </th>
                                    <td><?= $current_ep->event_planner_firstname ?></td>
                                </tr>
                                <tr>
                                    <th>Lastname: </th>
                                    <td><?= $current_ep->event_planner_lastname ?></td>
                                </tr>
                                <tr>
                                    <th>Birthday: </th>
                                    <td><?= date("F d, Y", $current_ep->event_planner_bday); ?></td>
                                </tr>
                                <tr>
                                    <th>Gender:</th>
                                    <td><?= $current_ep->event_planner_sex ?></td>
                                </tr>
                                <tr>
                                    <th>Address: </th>
                                    <td><?= $current_ep->event_planner_address ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
