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
                    <?php $percent = get_avg($ratings[0]->event_planner_id) ?>
                    <div class="col-md-3">
                        <div class="card text-center">
                            <img src="<?= $ratings[0]->event_planner_picture ?>" class="img-fluid card-img-top" />
                            <div class="card-title p-1">
                                <div class="star-rating">
                                    <?= getRatings($percent) ?>
                                </div>
                            </div>
                            <div class = "card-body pt-0">
                                <h5><?= $ratings[0]->event_planner_lastname . " " . $ratings[0]->event_planner_firstname ?></h5>
                                <hr>
                                <p class="lead"><?= $ratings[0]->event_planner_intro ?></p>
                            </div>
                            <div class="card-footer">
                                <a href = "#" class = "btn btn-outline-primary btn-md" data-toggle="modal" data-target=".<?= $ratings[0]->event_planner_id; ?>detail"  data-placement="bottom" title="View Full Details"><i class = "fa fa-eye"></i></a>
                                <a href = "#" class = "btn btn-outline-primary btn-md" data-toggle="modal" data-target=".<?= $ratings[0]->event_planner_id; ?>reviews"  data-placement="bottom" title="View Reviews"><i class = "fa fa-comments"></i></a>
                                <a href = "#" class = "btn btn-outline-primary btn-md" title="Choose Event Planner"><i class = "fa fa-star"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>