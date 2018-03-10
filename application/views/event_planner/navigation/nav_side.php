<?php 
    function get_cost($package_id){
        $ci =& get_instance();
        $total_price = 0; 
        $items = $ci->Packages_model->get_item_in_packages(array("item.packages_id" => $package_id));
        foreach($items as $item){
            $total_price += $item->item_price;
        }
        return $total_price;
    }
?>
<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">Navigation</li>

            <li class="nav-item">
                <a href="<?= base_url()?>Eventplanner" class="nav-link <?= base_url(uri_string()) == base_url()."eventplanner" ? "active":"" ;?>">
                    <i class="icon icon-speedometer"></i> Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a href="<?= base_url()?>Eventplanner/packages_exec/<?= $current_ep->event_planner_id?>" class="nav-link <?= strpos(base_url(uri_string()), base_url()."eventplanner/packages") !== FALSE || strpos(base_url(uri_string()), base_url()."eventplanner/package_edit") !== FALSE ? "active":"" ;?>">
                    <i class="fa fa-archive"></i> Packages
                </a>
            </li>
            
            <li class="nav-item">
                <a href="<?= base_url()?>Eventplanner/transactions_exec/<?= $current_ep->event_planner_id?>" class="nav-link <?= strpos(base_url(uri_string()), base_url()."transactions") !== FALSE? "active":"" ;?>">
                    <i class="fa fa-birthday-cake"></i> Transactions
                </a>
            </li>
            
            <li class="nav-item">
                <a href="<?= base_url()?>Eventplanner/pending_request_exec" class="nav-link <?= strpos(base_url(uri_string()), base_url()."pending_request") !== FALSE? "active":"" ;?>">
                    <i class="fa fa-plus-square"></i> Pending Request 
                </a>
            </li>
            
            <li class="nav-item">
                <a href="<?= base_url()?>Eventplanner/schedules_exec" class="nav-link <?= strpos(base_url(uri_string()), base_url()."schedules") !== FALSE? "active":"" ;?>">
                    <i class="fa fa-calendar"></i> Schedules
                </a>
            </li>
        </ul>
    </nav>
</div>