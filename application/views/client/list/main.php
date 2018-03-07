<!--============================
LIST
=============================-->
<?php

function getRatings($var) {
    if ($var < 20) {
        echo '<span id="star_1" class="fa fa-star-o"></span>
                <span id="star_2" class="fa fa-star-o"></span>
                <span id="star_3" class="fa fa-star-o"></span>
                <span id="star_4" class="fa fa-star-o"></span>
                <span id="star_5" class="fa fa-star-o"></span>';
    } else if ($var <= 39 && $var >= 20) {
        echo '<span id="star_1" class="fa fa-star"></span>
                <span id="star_2" class="fa fa-star-o"></span>
                <span id="star_3" class="fa fa-star-o"></span>
                <span id="star_4" class="fa fa-star-o"></span>
                <span id="star_5" class="fa fa-star-o"></span>';
    } else if ($var <= 59 && $var >= 40) {
        echo '<span id="star_1" class="fa fa-star"></span>
                <span id="star_2" class="fa fa-star"></span>
                <span id="star_3" class="fa fa-star-o"></span>
                <span id="star_4" class="fa fa-star-o"></span>
                <span id="star_5" class="fa fa-star-o"></span>';
    } else if ($var <= 79 && $var >= 60) {
        echo '<span id="star_1" class="fa fa-star"></span>
                <span id="star_2" class="fa fa-star"></span>
                <span id="star_3" class="fa fa-star"></span>
                <span id="star_4" class="fa fa-star-o"></span>
                <span id="star_5" class="fa fa-star-o"></span>';
    } else if ($var <= 99 && $var >= 80) {
        echo '<span id="star_1" class="fa fa-star"></span>
                <span id="star_2" class="fa fa-star"></span>
                <span id="star_3" class="fa fa-star"></span>
                <span id="star_4" class="fa fa-star"></span>
                <span id="star_5" class="fa fa-star-o"></span>';
    } else if ($var == 100) {
        echo '<span id="star_1" class="fa fa-star"></span>
                <span id="star_2" class="fa fa-star"></span>
                <span id="star_3" class="fa fa-star"></span>
                <span id="star_4" class="fa fa-star"></span>
                <span id="star_5" class="fa fa-star"></span>';
    }
}

function get_avg($ep_id) {
    $ci = & get_instance();
    $rating_avg = 0;
    $ratings = $ci->List_model->get_ep_info(array("rating.event_planner_id" => $ep_id));
    foreach ($ratings as $rating) {
        $rating_avg += $rating->rating_percentage;
    }
    return $rating_avg / count($ratings);
}
?>
<style>
    .card-title, .card-footer{
        background:rgba(160,160,160,0.3);
    }
</style>
<div class="content">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class = "text-info" href="<?= base_url() ?>Client/">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">List of Event Planners</li>
        </ol>
        <div class="row">
            <?php if (empty($ep)): ?>
                <div class = "col-lg-12">
                    <center>
                        <h4>There are no Event Planners</h4>
                        <i class = "fa fa-exclamation-circle fa-5x" style = "color:#bbb;"></i>
                    </center>
                </div>
            <?php else: ?>
                <?php foreach ($ep as $eps): ?>
                    <?php $ratings = $this->List_model->get_ep_info(array("rating.event_planner_id" => $eps->event_planner_id)); ?>
                    <?php $specialty = $this->List_model->get_ep_specialty(array("event_specialty.event_planner_id" => $eps->event_planner_id)); ?>
                    <?php if (empty($ratings)): ?>
                        <?php $percent = 0; ?>
                    <?php else: ?>
                        <?php $percent = get_avg($ratings[0]->event_planner_id) ?>
                    <?php endif; ?>
                    <div class="col-md-3">
                        <div class="card text-center">
                            <img src="<?= $eps->event_planner_picture ?>" class="img-fluid card-img-top" />
                            <div class="card-title p-1">
                                <div class="star-rating">
                                    <?= getRatings($percent) ?>
                                </div>
                            </div>
                            <div class = "card-body pt-0">
                                <h5><?= $eps->event_planner_lastname . " " . $eps->event_planner_firstname ?></h5>
                                <hr>
                                <h5 style="color:red"><?= $specialty[0]->event_specialty_name; ?></h5>
                                <hr>
                                <p class="lead"><?= $eps->event_planner_intro ?></p>
                            </div>
                            <div class="card-footer">
                                <a href = "#" class = "btn btn-outline-primary btn-md pull-left" data-toggle="modal" data-target=".<?= $eps->event_planner_id; ?>detail"  data-placement="bottom" title="View Full Details"><i class = "fa fa-eye"></i></a>
                                <a href = "#" class = "btn btn-outline-primary btn-md pull-right" title="Choose Event Planner"><i class = "fa fa-hand-o-up"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Detail -->
                    <div class="modal fade <?= $eps->event_planner_id; ?>detail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"><i class = "fa fa-info"></i> Event Planner Info</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class ="col-md-5">
                                            <div class="card text-center">
                                                <img src = "<?= $eps->event_planner_picture ?>" class = "img-fluid"/>
                                                <div class="card-body">
                                                    <div class="star-rating">
                                                        <?= getRatings($percent) ?>
                                                    </div>
                                                    <hr>
                                                    <h5 style="color:red"><?= $specialty[0]->event_specialty_name; ?></h5>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="intro">
                                                        <p class="lead"><?= $eps->event_planner_intro ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>

                                        </div>
                                        <div class ="col-md-7">
                                            <table class = "table table-striped">
                                                <tbody>
                                                    <tr>
                                                        <th>Name: </th>
                                                        <td><?= $eps->event_planner_firstname . " " . $eps->event_planner_lastname ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Contact no.: </th>
                                                        <td><?= $eps->event_planner_contact_no ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Email Address: </th>
                                                        <td><?= $eps->event_planner_email ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Gender: </th>
                                                        <td><?= $eps->event_planner_sex ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Address: </th>
                                                        <td><?= $eps->event_planner_address ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="card mb-3">
                                                <div class ="card-header">
                                                    <i class = "fa fa-comment" ></i> Reviews
                                                </div>
                                                <?php if (empty($ratings)): ?>
                                                    <div class="card-body">
                                                        <center>
                                                            <h4>There are no Reviews for this Event Planner</h4>
                                                            <i class = "fa fa-exclamation-circle fa-5x" style = "color:#bbb;"></i>
                                                        </center>
                                                    </div>
                                                <?php else: ?>
                                                    <?php $remarks = $this->List_model->get_ep_comment(array("event_planner_id" => $ratings[0]->event_planner_id)) ?>

                                                    <?php foreach ($remarks as $remark): ?>

                                                        <div class="card-body small bg-faded">    
                                                            <div class="media">
                                                                <div class = "image-fit">
                                                                    <img class="d-flex mr-3" style = "height:40px;" src="<?= base_url() . $remark->client_picture ?>" alt="">
                                                                </div>

                                                                <div class="media-body">
                                                                    <h6 class="mt-0 mb-1"><?= $remark->client_firstname . " " . $remark->client_lastname ?> </h6>
                                                                    <span class = "text-muted"><?= date('F d, Y \a\t h:m A', $remark->rating_added_at) ?></span><br>
                                                                    <div class = "my-2">
                                                                        <?= $remark->rating_comment ?>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </div><!-- /Comment-->
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>