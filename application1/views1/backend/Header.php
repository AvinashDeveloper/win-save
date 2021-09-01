<!DOCTYPE html>


<?php

$qryd='select * from menus';

$queryd = $this->db->query($qryd);

$resultset = $queryd->result_array(); 
                  
$sessiondata = $this->session->userdata('Login');

$array = json_decode(json_encode($sessiondata), True);

$mn_id = $sessiondata[0]->id;

$type = $sessiondata[0]->type;

if($type=2){

  $qryd='select * from manager_authority where manager_id='.$mn_id;

  $queryd1 = $this->db->query($qryd);

  $resultset1 = $queryd1->result_array(); 


}

$page = basename($_SERVER['PHP_SELF']);

?>

<html lang="en" dir="">



<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Win & Save</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet" />
    <link href="<?php echo base_url();  ?>venders/dist-assets/css/themes/lite-purple.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?php echo base_url();  ?>venders/dist-assets/css/plugins/perfect-scrollbar.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo base_url();  ?>venders/dist-assets/css/plugins/datatables.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <style type="text/css">
     .table-responsive
     {
        height: 80vh;
     }
 </style>
</head>

<body class="text-left">
    <div class="app-admin-wrap layout-sidebar-large">
        <div class="main-header">
            <div class="logo">
                <img src="<?php echo base_url();  ?>venders/images/logo.png" alt="">
            </div>
            <div class="menu-toggle">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div class="d-flex align-items-center">
                <!-- Mega menu -->
               <!--  <div class="dropdown mega-menu d-none d-md-block">
                    <a href="#" class="btn text-muted dropdown-toggle mr-3" id="dropdownMegaMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mega Menu</a>
                    <div class="dropdown-menu text-left" aria-labelledby="dropdownMenuButton">
                        <div class="row m-0">
                            <div class="col-md-4 p-4 bg-img">
                                <h2 class="title">Mega Menu <br> Sidebar</h2>
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Asperiores natus laboriosam fugit, consequatur.
                                </p>
                                <p class="mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Exercitationem odio amet eos dolore suscipit placeat.</p>
                                <button class="btn btn-lg btn-rounded btn-outline-warning">Learn More</button>
                            </div>
                            <div class="col-md-4 p-4">
                                <p class="text-primary text--cap border-bottom-primary d-inline-block">Features</p>
                                <div class="menu-icon-grid w-auto p-0">
                                    <a href="#"><i class="i-Shop-4"></i> Home</a>
                                    <a href="#"><i class="i-Library"></i> UI Kits</a>
                                    <a href="#"><i class="i-Drop"></i> Apps</a>
                                    <a href="#"><i class="i-File-Clipboard-File--Text"></i> Forms</a>
                                    <a href="#"><i class="i-Checked-User"></i> Sessions</a>
                                    <a href="#"><i class="i-Ambulance"></i> Support</a>
                                </div>
                            </div>
                            <div class="col-md-4 p-4">
                                <p class="text-primary text--cap border-bottom-primary d-inline-block">Components</p>
                                <ul class="links">
                                    <li><a href="accordion.php">Accordion</a></li>
                                    <li><a href="alerts.php">Alerts</a></li>
                                    <li><a href="buttons.php">Buttons</a></li>
                                    <li><a href="badges.php">Badges</a></li>
                                    <li><a href="carousel.php">Carousels</a></li>
                                    <li><a href="lists.php">Lists</a></li>
                                    <li><a href="popover.php">Popover</a></li>
                                    <li><a href="tables.php">Tables</a></li>
                                    <li><a href="datatables.php">Datatables</a></li>
                                    <li><a href="modals.php">Modals</a></li>
                                    <li><a href="nouislider.php">Sliders</a></li>
                                    <li><a href="tabs.php">Tabs</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- / Mega menu -->
                <div class="search-bar">
                    <input type="text" placeholder="Search">
                    <i class="search-icon text-muted i-Magnifi-Glass1"></i>
                </div>
            </div>
            <div style="margin: auto"></div>
         
        </div>



  <?php 

                            // 0 type is for admin  

                              if($array[0]['type']==0){

                                ?>

<div class="side-content-wrap">
            <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
                <ul class="navigation-left">
                    <li class="nav-item"><a class="nav-item-hold" href="<?php echo base_url();  ?>dashboard"><i class="nav-icon i-Bar-Chart"></i><span class="nav-text">Dashboard</span></a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item" data-item="uikits"><a class="nav-item-hold" href="#"><i class="nav-icon i-Library"></i><span class="nav-text">Vendors</span></a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item" data-item="extrakits"><a class="nav-item-hold" href="#"><i class="nav-icon i-Suitcase"></i><span class="nav-text">Users</span></a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item" data-item="apps"><a class="nav-item-hold" href="#"><i class="nav-icon i-Computer-Secure"></i><span class="nav-text">Manage Plans</span></a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item" data-item="managers"><a class="nav-item-hold" href="<?php echo base_url(); ?>vender-aminity"><i class="nav-icon i-Computer-Secure"></i><span class="nav-text">Manage Managers</span></a>
                        <div class="triangle"></div>
                    </li>

                     <li class="nav-item" data-item="support"><a class="nav-item-hold" href="<?php echo base_url(); ?>vender-aminity"><i class="nav-icon i-Computer-Secure"></i><span class="nav-text">Support</span></a>
                        <div class="triangle"></div>
                    </li>

                     <li class="nav-item" data-item="manage_ads"><a class="nav-item-hold" href="<?php echo base_url(); ?>vender-aminity"><i class="nav-icon i-Computer-Secure"></i><span class="nav-text">Manage Ads</span></a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item" data-item="category"><a class="nav-item-hold" href="<?php echo base_url(); ?>Inventory-list"><i class="nav-icon i-File-Clipboard-File--Text"></i><span class="nav-text">Category</span></a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item"><a class="nav-item-hold" href="<?php echo base_url(); ?>Order-list"><i class="nav-icon i-File-Clipboard-File--Text"></i><span class="nav-text">Orders</span></a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item"><a class="nav-item-hold" href="<?php echo base_url(); ?>Inventory-list"><i class="nav-icon i-File-Horizontal-Text"></i><span class="nav-text">Inventory</span></a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item"><a class="nav-item-hold" href="<?php echo base_url(); ?>level-list"><i class="nav-icon i-Administrator"></i><span class="nav-text">Manage Level</span></a>
                        <div class="triangle"></div>
                    </li>
                     
                       <li class="nav-item"><a class="nav-item-hold" href="<?php echo base_url(); ?>about-us"><i class="nav-icon i-Administrator"></i><span class="nav-text">About us</span></a>
                        <div class="triangle"></div>
                    </li>

                      <li class="nav-item"><a class="nav-item-hold" href="<?php echo base_url(); ?>contact"><i class="nav-icon i-Administrator"></i><span class="nav-text">Contact us</span></a>
                        <div class="triangle"></div>
                    </li>

                      <li class="nav-item"><a class="nav-item-hold" href="<?php echo base_url(); ?>profile"><i class="nav-icon i-Administrator"></i><span class="nav-text">My Profile</span></a>
                        <div class="triangle"></div>
                    </li>

                      <li class="nav-item"><a class="nav-item-hold" href="<?php echo base_url(); ?>Setting"><i class="nav-icon i-Administrator"></i><span class="nav-text">Points</span></a>
                        <div class="triangle"></div>
                    </li>

                    <li class="nav-item active"><a class="nav-item-hold" href="<?php echo base_url(); ?>backend/Login/logout"><i class="nav-icon i-Double-Tap"></i><span class="nav-text">Logout</span></a>
                        <div class="triangle"></div>
                    </li>
                 
                </ul>
            </div>
            <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
                <!-- Submenu Dashboards-->
                <ul class="childNav" data-parent="managers">
                    <li class="nav-item"><a href="<?php echo base_url(); ?>all-manager"><i class="nav-icon i-Clock-3"></i><span class="item-name">Managers List</span></a></li>
                    <li class="nav-item"><a href="<?php echo base_url(); ?>add-Manager"><i class="nav-icon i-Clock-4"></i><span class="item-name">Add Managers</span></a></li>
                   <!--  <li class="nav-item"><a href="dashboard3.php"><i class="nav-icon i-Over-Time"></i><span class="item-name">Version 3</span></a></li>
                    <li class="nav-item"><a href="dashboard4.php"><i class="nav-icon i-Clock"></i><span class="item-name">Version 4</span></a></li> -->
                </ul>
                <ul class="childNav" data-parent="manage_ads">
                    <li class="nav-item"><a href="<?php echo base_url(); ?>slide-ads"><i class="nav-icon i-File-Clipboard-Text--Image"></i><span class="item-name">Slide Ads</span></a></li>
                    <li class="nav-item"><a href="<?php echo base_url(); ?>Offer-list"><i class="nav-icon i-Split-Vertical"></i><span class="item-name">Feature Deal & Offers</span></a></li>
                    <li class="nav-item"><a href="<?php echo base_url(); ?>Classified-list"><i class="nav-icon i-Receipt-4"></i><span class="item-name">Classified Offers</span></a></li>
                    <li class="nav-item"><a href="<?php echo base_url(); ?>Limited-offer-list"><i class="nav-icon i-Close-Window"></i><span class="item-name">Limited Offers</span></a></li>
                    <li class="nav-item"><a href="<?php echo base_url(); ?>news-save"><i class="nav-icon i-Width-Window"></i><span class="item-name">News and Offers</span></a></li>
                <!--     <li class="nav-item"><a href="tag.input.php"><i class="nav-icon i-Tag-2"></i><span class="item-name">Tag Input</span></a></li>
                    <li class="nav-item"><a href="editor.php"><i class="nav-icon i-Pen-2"></i><span class="item-name">Rich Editor</span></a></li> -->
                </ul>
                <ul class="childNav" data-parent="apps">
                    <li class="nav-item"><a href="<?php echo base_url();  ?>create-plans"><i class="nav-icon i-Add-File"></i><span class="item-name">Create Plans</span></a></li>
                    <li class="nav-item"><a href="<?php echo base_url();  ?>plan-list"><i class="nav-icon i-Email"></i><span class="item-name">Plan List</span></a></li>
                    <li class="nav-item"><a href="manage_accounts.php"><i class="nav-icon i-Speach-Bubble-3"></i><span class="item-name">Manage Acccounts</span></a></li>
                </ul>
                <ul class="childNav" data-parent="category">
                    <li class="nav-item"><a href="<?php echo base_url(); ?>category-list"><i class="nav-icon i-Receipt-4"></i><span class="item-name">Category List</span></a></li>
                   <li class="nav-item"><a href="<?php echo base_url(); ?>sub-category-list"><i class="nav-icon i-Receipt-4"></i><span class="item-name">Sub-Category List</span></a></li>
                    <li class="nav-item"><a href="<?php echo base_url(); ?>aminity-list"><i class="nav-icon i-Receipt-4"></i><span class="item-name">Aminity List <span class="ml-2 badge badge-pill badge-danger">New</span></span></a></li>
                    <!-- <li class="nav-item"><a href="widget-app.php"><i class="nav-icon i-Receipt-4"></i><span class="item-name">Widget App <span class="ml-2 badge badge-pill badge-danger"> New</span></span></a></li>
                    <li class="nav-item"><a href="weather-card.php"><i class="nav-icon i-Receipt-4"></i><span class="item-name">Weather App <span class="ml-2 badge badge-pill badge-danger"> New</span></span></a></li>  -->
                </ul>
                <!-- chartjs-->
              <!--   <ul class="childNav" data-parent="charts">
                    <li class="nav-item"><a href="charts.echarts.php"><i class="nav-icon i-File-Clipboard-Text--Image"></i><span class="item-name">echarts</span></a></li>
                    <li class="nav-item"><a href="charts.chartsjs.php"><i class="nav-icon i-File-Clipboard-Text--Image"></i><span class="item-name">ChartJs</span></a></li>
                    <li class="nav-item dropdown-sidemenu"><a href="#"><i class="nav-icon i-File-Clipboard-Text--Image"></i><span class="item-name">Apex Charts</span><i class="dd-arrow i-Arrow-Down"></i></a>
                        <ul class="submenu">
                            <li><a href="charts.apexAreaCharts.php">Area Charts</a></li>
                            <li><a href="charts.apexBarCharts.php">Bar Charts</a></li>
                            <li><a href="charts.apexBubbleCharts.php">Bubble Charts</a></li>
                            <li><a href="charts.apexColumnCharts.php">Column Charts</a></li>
                            <li><a href="charts.apexCandleStickCharts.php">CandleStick Charts</a></li>
                            <li><a href="charts.apexLineCharts.php">Line Charts</a></li>
                            <li><a href="charts.apexMixCharts.php">Mix Charts</a></li>
                            <li><a href="charts.apexPieDonutCharts.php">PieDonut Charts</a></li>
                            <li><a href="charts.apexRadarCharts.php">Radar Charts</a></li>
                            <li><a href="charts.apexRadialBarCharts.php">RadialBar Charts</a></li>
                            <li><a href="charts.apexScatterCharts.php">Scatter Charts</a></li>
                            <li><a href="charts.apexSparklineCharts.php">Sparkline Charts</a></li>
                        </ul>
                    </li>
                </ul> -->
                <ul class="childNav" data-parent="extrakits">
                     <li class="nav-item"><a href="<?php echo base_url();  ?>add-user"><i class="nav-icon i-Crop-2"></i><span class="item-name">Add User</span></a></li>
                    <li class="nav-item"><a href="<?php echo base_url();  ?>all-users"><i class="nav-icon i-Crop-2"></i><span class="item-name">Users's List</span></a></li>
                     <li class="nav-item"><a href="<?php echo base_url(); ?>User-transaction"><i class="nav-icon i-Loading-3"></i><span class="item-name">User Transitions</span></a></li>
                    <li class="nav-item"><a href="<?php echo base_url(); ?>User-membership"><i class="nav-icon i-Loading-2"></i><span class="item-name">User Memberships</span></a></li>
                    <!-- <li class="nav-item"><a href="toastr.php"><i class="nav-icon i-Bell"></i><span class="item-name">Toastr</span></a></li>
                    <li class="nav-item"><a href="sweet.alerts.php"><i class="nav-icon i-Approved-Window"></i><span class="item-name">Sweet Alerts</span></a></li>
                    <li class="nav-item"><a href="tour.php"><i class="nav-icon i-Plane"></i><span class="item-name">User Tour</span></a></li>
                    <li class="nav-item"><a href="upload.php"><i class="nav-icon i-Data-Upload"></i><span class="item-name">Upload</span></a></li>  -->
                </ul>
                <ul class="childNav" data-parent="uikits">
                     <li class="nav-item"><a  href="<?php echo base_url();  ?>add-vender"><i class="nav-icon i-Bell1"></i><span class="item-name">Add Vender</span></a></li>
                    <li class="nav-item"><a  href="<?php echo base_url();  ?>venders-verification-list"><i class="nav-icon i-Bell1"></i><span class="item-name">New Vendor Verification</span></a></li>
                    <li class="nav-item"><a href="<?php echo base_url();  ?>all-venders"><i class="nav-icon i-Split-Horizontal-2-Window"></i><span class="item-name">All Verify Vendor's</span></a></li>
                    <li class="nav-item"><a href="<?php echo base_url(); ?>Vender-transaction"><i class="nav-icon i-Medal-2"></i><span class="item-name">Vendor Transitions</span></a></li>
                    <li class="nav-item"><a href="<?php echo base_url();  ?>plan-list"><i class="nav-icon i-Cursor-Click"></i><span class="item-name">Vendor Memberships</span></a></li>
                    <!-- <li class="nav-item"><a href="cards.php"><i class="nav-icon i-Line-Chart-2"></i><span class="item-name">Cards</span></a></li> -->
                   <!--  <li class="nav-item"><a href="card.metrics.php"><i class="nav-icon i-ID-Card"></i><span class="item-name">Card Metrics</span></a></li>
                    <li class="nav-item"><a href="carousel.php"><i class="nav-icon i-Video-Photographer"></i><span class="item-name">Carousels</span></a></li>
                    <li class="nav-item"><a href="lists.php"><i class="nav-icon i-Belt-3"></i><span class="item-name">Lists</span></a></li>
                    <li class="nav-item"><a href="pagination.php"><i class="nav-icon i-Arrow-Next"></i><span class="item-name">Paginations</span></a></li>
                    <li class="nav-item"><a href="popover.php"><i class="nav-icon i-Speach-Bubble-2"></i><span class="item-name">Popover</span></a></li>
                    <li class="nav-item"><a href="progressbar.php"><i class="nav-icon i-Loading"></i><span class="item-name">Progressbar</span></a></li>
                    <li class="nav-item"><a href="tables.php"><i class="nav-icon i-File-Horizontal-Text"></i><span class="item-name">Tables</span></a></li>
                    <li class="nav-item"><a href="tabs.php"><i class="nav-icon i-New-Tab"></i><span class="item-name">Tabs</span></a></li>
                    <li class="nav-item"><a href="tooltip.php"><i class="nav-icon i-Speach-Bubble-8"></i><span class="item-name">Tooltip</span></a></li>
                    <li class="nav-item"><a href="modals.php"><i class="nav-icon i-Duplicate-Window"></i><span class="item-name">Modals</span></a></li>
                    <li class="nav-item"><a href="nouislider.php"><i class="nav-icon i-Width-Window"></i><span class="item-name">Sliders</span></a></li> -->
                </ul>
                <ul class="childNav" data-parent="support">
                    <li class="nav-item"><a href="#"><i class="nav-icon i-Checked-User"></i><span class="item-name">Vendor Support</span></a></li>
                    <li class="nav-item"><a href="#"><i class="nav-icon i-Add-User"></i><span class="item-name">User Support</span></a></li>
                    <li class="nav-item"><a href="<?php echo base_url(); ?>help"><i class="nav-icon i-Find-User"></i><span class="item-name">Help</span></a></li>
                     <li class="nav-item"><a href="<?php echo base_url(); ?>rules"><i class="nav-icon i-Find-User"></i><span class="item-name">Rules</span></a></li>
                </ul>
                <ul class="childNav" data-parent="others">
                    <li class="nav-item"><a href="http://demos.ui-lib.com/gull/html/sessions/not-found.php"><i class="nav-icon i-Error-404-Window"></i><span class="item-name">Not Found</span></a></li>
                    <li class="nav-item"><a href="user.profile.php"><i class="nav-icon i-Male"></i><span class="item-name">User Profile</span></a></li>
                    <li class="nav-item"><a class="open" href="blank.php"><i class="nav-icon i-File-Horizontal"></i><span class="item-name">Blank Page</span></a></li>
                </ul>
            </div>
            <div class="sidebar-overlay"></div>
        </div>




                                  <?php } ?>



        <?php 

//////////////////////////////////// 2 type is for subadmin////////////////////////////////////////

                           if($array[0]['type']==2){

                             $sum=array();

                             $authority = (explode(',',$array[0]['authority']));

                             $array_authority= $authority;

                              //print_r($authority);

                             ?>

  <div class="side-content-wrap">
            <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
                <ul class="navigation-left">
                    <li class="nav-item"><a class="nav-item-hold" href="<?php echo base_url();  ?>dashboard"><i class="nav-icon i-Bar-Chart"></i><span class="nav-text">Dashboard</span></a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item" data-item="uikits"><a class="nav-item-hold" href="#"><i class="nav-icon i-Library"></i><span class="nav-text">Vendors</span></a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item" data-item="extrakits"><a class="nav-item-hold" href="#"><i class="nav-icon i-Suitcase"></i><span class="nav-text">Users</span></a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item" data-item="apps"><a class="nav-item-hold" href="#"><i class="nav-icon i-Computer-Secure"></i><span class="nav-text">Manage Plans</span></a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item" data-item="managers"><a class="nav-item-hold" href="<?php echo base_url(); ?>vender-aminity"><i class="nav-icon i-Computer-Secure"></i><span class="nav-text">Manage Managers</span></a>
                        <div class="triangle"></div>
                    </li>

                     <li class="nav-item" data-item="support"><a class="nav-item-hold" href="<?php echo base_url(); ?>vender-aminity"><i class="nav-icon i-Computer-Secure"></i><span class="nav-text">Support</span></a>
                        <div class="triangle"></div>
                    </li>

                     <li class="nav-item" data-item="manage_ads"><a class="nav-item-hold" href="<?php echo base_url(); ?>vender-aminity"><i class="nav-icon i-Computer-Secure"></i><span class="nav-text">Manage Ads</span></a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item" data-item="category"><a class="nav-item-hold" href="<?php echo base_url(); ?>Inventory-list"><i class="nav-icon i-File-Clipboard-File--Text"></i><span class="nav-text">Category</span></a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item"><a class="nav-item-hold" href="<?php echo base_url(); ?>Order-list"><i class="nav-icon i-File-Clipboard-File--Text"></i><span class="nav-text">Orders</span></a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item"><a class="nav-item-hold" href="<?php echo base_url(); ?>Inventory-list"><i class="nav-icon i-File-Horizontal-Text"></i><span class="nav-text">Inventory</span></a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item"><a class="nav-item-hold" href="<?php echo base_url(); ?>level-list"><i class="nav-icon i-Administrator"></i><span class="nav-text">Manage Level</span></a>
                        <div class="triangle"></div>
                    </li>
                     
                       <li class="nav-item"><a class="nav-item-hold" href="<?php echo base_url(); ?>about-us"><i class="nav-icon i-Administrator"></i><span class="nav-text">About us</span></a>
                        <div class="triangle"></div>
                    </li>

                      <li class="nav-item"><a class="nav-item-hold" href="<?php echo base_url(); ?>contact"><i class="nav-icon i-Administrator"></i><span class="nav-text">Contact us</span></a>
                        <div class="triangle"></div>
                    </li>

                      <li class="nav-item"><a class="nav-item-hold" href="<?php echo base_url(); ?>profile"><i class="nav-icon i-Administrator"></i><span class="nav-text">My Profile</span></a>
                        <div class="triangle"></div>
                    </li>

                      <li class="nav-item"><a class="nav-item-hold" href="<?php echo base_url(); ?>Setting"><i class="nav-icon i-Administrator"></i><span class="nav-text">Points</span></a>
                        <div class="triangle"></div>
                    </li>

                    <li class="nav-item active"><a class="nav-item-hold" href="<?php echo base_url(); ?>backend/Login/logout"><i class="nav-icon i-Double-Tap"></i><span class="nav-text">Logout</span></a>
                        <div class="triangle"></div>
                    </li>
                  <!--   <li class="nav-item"><a class="nav-item-hold" href="http://demos.ui-lib.com/gull-html-doc/" target="_blank"><i class="nav-icon i-Safe-Box1"></i><span class="nav-text">Doc</span></a>
                        <div class="triangle"></div>
                    </li> -->
                </ul>
            </div>
            <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
                <!-- Submenu Dashboards-->
                <ul class="childNav" data-parent="managers">
                    <li class="nav-item"><a href="<?php echo base_url(); ?>all-manager"><i class="nav-icon i-Clock-3"></i><span class="item-name">Managers Lis</span></a></li>
                    <li class="nav-item"><a href="<?php echo base_url(); ?>add-Manager"><i class="nav-icon i-Clock-4"></i><span class="item-name">Add Managers</span></a></li>
                   <!--  <li class="nav-item"><a href="dashboard3.php"><i class="nav-icon i-Over-Time"></i><span class="item-name">Version 3</span></a></li>
                    <li class="nav-item"><a href="dashboard4.php"><i class="nav-icon i-Clock"></i><span class="item-name">Version 4</span></a></li> -->
                </ul>
                <ul class="childNav" data-parent="manage_ads">
                    <li class="nav-item"><a href="<?php echo base_url(); ?>slide-ads"><i class="nav-icon i-File-Clipboard-Text--Image"></i><span class="item-name">Slide Ads</span></a></li>
                    <li class="nav-item"><a href="<?php echo base_url(); ?>Offer-list"><i class="nav-icon i-Split-Vertical"></i><span class="item-name">Feature Deal & Offers</span></a></li>
                    <li class="nav-item"><a href="<?php echo base_url(); ?>Classified-list"><i class="nav-icon i-Receipt-4"></i><span class="item-name">Classified Offers</span></a></li>
                    <li class="nav-item"><a href="<?php echo base_url(); ?>Limited-offer-list"><i class="nav-icon i-Close-Window"></i><span class="item-name">Limited Offers</span></a></li>
                    <li class="nav-item"><a href="<?php echo base_url(); ?>news-save"><i class="nav-icon i-Width-Window"></i><span class="item-name">News and Offers</span></a></li>
                <!--     <li class="nav-item"><a href="tag.input.php"><i class="nav-icon i-Tag-2"></i><span class="item-name">Tag Input</span></a></li>
                    <li class="nav-item"><a href="editor.php"><i class="nav-icon i-Pen-2"></i><span class="item-name">Rich Editor</span></a></li> -->
                </ul>
                <ul class="childNav" data-parent="apps">
                    <li class="nav-item"><a href="<?php echo base_url();  ?>create-plans"><i class="nav-icon i-Add-File"></i><span class="item-name">Create Plans</span></a></li>
                    <li class="nav-item"><a href="<?php echo base_url();  ?>plan-list"><i class="nav-icon i-Email"></i><span class="item-name">Plan List</span></a></li>
                    <li class="nav-item"><a href="manage_accounts.php"><i class="nav-icon i-Speach-Bubble-3"></i><span class="item-name">Manage Acccounts</span></a></li>
                </ul>
                <ul class="childNav" data-parent="category">
                    <li class="nav-item"><a href="<?php echo base_url(); ?>category-list"><i class="nav-icon i-Receipt-4"></i><span class="item-name">Category List</span></a></li>
                   <li class="nav-item"><a href="<?php echo base_url(); ?>sub-category-list"><i class="nav-icon i-Receipt-4"></i><span class="item-name">Sub-Category List</span></a></li>
                    <li class="nav-item"><a href="<?php echo base_url(); ?>aminity-list"><i class="nav-icon i-Receipt-4"></i><span class="item-name">Aminity List <span class="ml-2 badge badge-pill badge-danger">New</span></span></a></li>
                    <!-- <li class="nav-item"><a href="widget-app.php"><i class="nav-icon i-Receipt-4"></i><span class="item-name">Widget App <span class="ml-2 badge badge-pill badge-danger"> New</span></span></a></li>
                    <li class="nav-item"><a href="weather-card.php"><i class="nav-icon i-Receipt-4"></i><span class="item-name">Weather App <span class="ml-2 badge badge-pill badge-danger"> New</span></span></a></li>  -->
                </ul>
                <!-- chartjs-->
              <!--   <ul class="childNav" data-parent="charts">
                    <li class="nav-item"><a href="charts.echarts.php"><i class="nav-icon i-File-Clipboard-Text--Image"></i><span class="item-name">echarts</span></a></li>
                    <li class="nav-item"><a href="charts.chartsjs.php"><i class="nav-icon i-File-Clipboard-Text--Image"></i><span class="item-name">ChartJs</span></a></li>
                    <li class="nav-item dropdown-sidemenu"><a href="#"><i class="nav-icon i-File-Clipboard-Text--Image"></i><span class="item-name">Apex Charts</span><i class="dd-arrow i-Arrow-Down"></i></a>
                        <ul class="submenu">
                            <li><a href="charts.apexAreaCharts.php">Area Charts</a></li>
                            <li><a href="charts.apexBarCharts.php">Bar Charts</a></li>
                            <li><a href="charts.apexBubbleCharts.php">Bubble Charts</a></li>
                            <li><a href="charts.apexColumnCharts.php">Column Charts</a></li>
                            <li><a href="charts.apexCandleStickCharts.php">CandleStick Charts</a></li>
                            <li><a href="charts.apexLineCharts.php">Line Charts</a></li>
                            <li><a href="charts.apexMixCharts.php">Mix Charts</a></li>
                            <li><a href="charts.apexPieDonutCharts.php">PieDonut Charts</a></li>
                            <li><a href="charts.apexRadarCharts.php">Radar Charts</a></li>
                            <li><a href="charts.apexRadialBarCharts.php">RadialBar Charts</a></li>
                            <li><a href="charts.apexScatterCharts.php">Scatter Charts</a></li>
                            <li><a href="charts.apexSparklineCharts.php">Sparkline Charts</a></li>
                        </ul>
                    </li>
                </ul> -->
                <ul class="childNav" data-parent="extrakits">
                    <li class="nav-item"><a href="<?php echo base_url();  ?>all-users"><i class="nav-icon i-Crop-2"></i><span class="item-name">Users's List</span></a></li>
                     <li class="nav-item"><a href="<?php echo base_url(); ?>User-transaction"><i class="nav-icon i-Loading-3"></i><span class="item-name">User Transitions</span></a></li>
                    <li class="nav-item"><a href="<?php echo base_url(); ?>User-membership"><i class="nav-icon i-Loading-2"></i><span class="item-name">User Memberships</span></a></li>
                    <!-- <li class="nav-item"><a href="toastr.php"><i class="nav-icon i-Bell"></i><span class="item-name">Toastr</span></a></li>
                    <li class="nav-item"><a href="sweet.alerts.php"><i class="nav-icon i-Approved-Window"></i><span class="item-name">Sweet Alerts</span></a></li>
                    <li class="nav-item"><a href="tour.php"><i class="nav-icon i-Plane"></i><span class="item-name">User Tour</span></a></li>
                    <li class="nav-item"><a href="upload.php"><i class="nav-icon i-Data-Upload"></i><span class="item-name">Upload</span></a></li>  -->
                </ul>
                <ul class="childNav" data-parent="uikits">
                    <li class="nav-item"><a  href="<?php echo base_url();  ?>venders-verification-list"><i class="nav-icon i-Bell1"></i><span class="item-name">New Vendor Verification</span></a></li>
                    <li class="nav-item"><a href="<?php echo base_url();  ?>all-venders"><i class="nav-icon i-Split-Horizontal-2-Window"></i><span class="item-name">All Verify Vendor's</span></a></li>
                    <li class="nav-item"><a href="<?php echo base_url(); ?>Vender-transaction"><i class="nav-icon i-Medal-2"></i><span class="item-name">Vendor Transitions</span></a></li>
                    <li class="nav-item"><a href="<?php echo base_url();  ?>plan-list"><i class="nav-icon i-Cursor-Click"></i><span class="item-name">Vendor Memberships</span></a></li>
                    <!-- <li class="nav-item"><a href="cards.php"><i class="nav-icon i-Line-Chart-2"></i><span class="item-name">Cards</span></a></li> -->
                   <!--  <li class="nav-item"><a href="card.metrics.php"><i class="nav-icon i-ID-Card"></i><span class="item-name">Card Metrics</span></a></li>
                    <li class="nav-item"><a href="carousel.php"><i class="nav-icon i-Video-Photographer"></i><span class="item-name">Carousels</span></a></li>
                    <li class="nav-item"><a href="lists.php"><i class="nav-icon i-Belt-3"></i><span class="item-name">Lists</span></a></li>
                    <li class="nav-item"><a href="pagination.php"><i class="nav-icon i-Arrow-Next"></i><span class="item-name">Paginations</span></a></li>
                    <li class="nav-item"><a href="popover.php"><i class="nav-icon i-Speach-Bubble-2"></i><span class="item-name">Popover</span></a></li>
                    <li class="nav-item"><a href="progressbar.php"><i class="nav-icon i-Loading"></i><span class="item-name">Progressbar</span></a></li>
                    <li class="nav-item"><a href="tables.php"><i class="nav-icon i-File-Horizontal-Text"></i><span class="item-name">Tables</span></a></li>
                    <li class="nav-item"><a href="tabs.php"><i class="nav-icon i-New-Tab"></i><span class="item-name">Tabs</span></a></li>
                    <li class="nav-item"><a href="tooltip.php"><i class="nav-icon i-Speach-Bubble-8"></i><span class="item-name">Tooltip</span></a></li>
                    <li class="nav-item"><a href="modals.php"><i class="nav-icon i-Duplicate-Window"></i><span class="item-name">Modals</span></a></li>
                    <li class="nav-item"><a href="nouislider.php"><i class="nav-icon i-Width-Window"></i><span class="item-name">Sliders</span></a></li> -->
                </ul>
                <ul class="childNav" data-parent="sessions">
                    <li class="nav-item"><a href="http://demos.ui-lib.com/gull/html/sessions/signin.php"><i class="nav-icon i-Checked-User"></i><span class="item-name">Sign in</span></a></li>
                    <li class="nav-item"><a href="http://demos.ui-lib.com/gull/html/sessions/signup.php"><i class="nav-icon i-Add-User"></i><span class="item-name">Sign up</span></a></li>
                    <li class="nav-item"><a href="http://demos.ui-lib.com/gull/html/sessions/forgot.php"><i class="nav-icon i-Find-User"></i><span class="item-name">Forgot</span></a></li>
                </ul>
                <ul class="childNav" data-parent="others">
                    <li class="nav-item"><a href="http://demos.ui-lib.com/gull/html/sessions/not-found.php"><i class="nav-icon i-Error-404-Window"></i><span class="item-name">Not Found</span></a></li>
                    <li class="nav-item"><a href="user.profile.php"><i class="nav-icon i-Male"></i><span class="item-name">User Profile</span></a></li>
                    <li class="nav-item"><a class="open" href="blank.php"><i class="nav-icon i-File-Horizontal"></i><span class="item-name">Blank Page</span></a></li>
                </ul>
            </div>
            <div class="sidebar-overlay"></div>
        </div>








       <?php } ?>


             <?php 



                            // 1 type is for Venders  

                         if($array[0]['type']==1){

                          ?>
        <div class="side-content-wrap">
            <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
                <ul class="navigation-left">
                    <li class="nav-item"><a class="nav-item-hold" href="<?php echo base_url();  ?>dashboard"><i class="nav-icon i-Bar-Chart"></i><span class="nav-text">Dashboard</span></a>
                        <div class="triangle"></div>
                    </li>
                    <?php
                     if($array[0]['status']==1){

                          ?>
                    <li class="nav-item" data-item="uikits"><a class="nav-item-hold" href="#"><i class="nav-icon i-Library"></i><span class="nav-text">My Offer</span></a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item" data-item="extrakits"><a class="nav-item-hold" href="#"><i class="nav-icon i-Suitcase"></i><span class="nav-text">Manage Ads</span></a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item" data-item="apps"><a class="nav-item-hold" href="#"><i class="nav-icon i-Computer-Secure"></i><span class="nav-text">My Plans</span></a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item" ><a class="nav-item-hold" href="<?php echo base_url(); ?>vender-aminity"><i class="nav-icon i-Computer-Secure"></i><span class="nav-text">Manage Aminities</span></a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item"><a class="nav-item-hold" href="<?php echo base_url(); ?>Inventory-list"><i class="nav-icon i-File-Clipboard-File--Text"></i><span class="nav-text">Manage Inventory</span></a>
                        <div class="triangle"></div>
                    </li>
                    <?php }  ?>
                    <li class="nav-item"><a class="nav-item-hold" href="<?php  echo base_url();?>vender-profile"><i class="nav-icon i-File-Clipboard-File--Text"></i><span class="nav-text">My Profile</span></a>
                        <div class="triangle"></div>
                    </li>
                    <?php
                     if($array[0]['status']==1){

                          ?>
                    <li class="nav-item"><a class="nav-item-hold" href="<?php echo base_url(); ?>about"><i class="nav-icon i-File-Horizontal-Text"></i><span class="nav-text">About us</span></a>
                        <div class="triangle"></div>
                    </li>
                    <?php }  ?>
                    <li class="nav-item"><a class="nav-item-hold" href="<?php echo base_url(); ?>contact"><i class="nav-icon i-Administrator"></i><span class="nav-text">Contact us</span></a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item active"><a class="nav-item-hold" href="<?php echo base_url(); ?>backend/Login/logout"><i class="nav-icon i-Double-Tap"></i><span class="nav-text">Logout</span></a>
                        <div class="triangle"></div>
                    </li>
                  
                </ul>
            </div>
            <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
                <!-- Submenu Dashboards-->
                <ul class="childNav" data-parent="dashboard">
                    <li class="nav-item"><a href="dashboard1.php"><i class="nav-icon i-Clock-3"></i><span class="item-name">Version 1</span></a></li>
                    <li class="nav-item"><a href="dashboard2.php"><i class="nav-icon i-Clock-4"></i><span class="item-name">Version 2</span></a></li>
                    <li class="nav-item"><a href="dashboard3.php"><i class="nav-icon i-Over-Time"></i><span class="item-name">Version 3</span></a></li>
                    <li class="nav-item"><a href="dashboard4.php"><i class="nav-icon i-Clock"></i><span class="item-name">Version 4</span></a></li>
                </ul>
                <ul class="childNav" data-parent="forms">
                    <li class="nav-item"><a href="form.basic.php"><i class="nav-icon i-File-Clipboard-Text--Image"></i><span class="item-name">Basic Elements</span></a></li>
                    <li class="nav-item"><a href="form.layouts.php"><i class="nav-icon i-Split-Vertical"></i><span class="item-name">Form Layouts</span></a></li>
                    <li class="nav-item"><a href="form.input.group.php"><i class="nav-icon i-Receipt-4"></i><span class="item-name">Input Groups</span></a></li>
                    <li class="nav-item"><a href="form.validation.php"><i class="nav-icon i-Close-Window"></i><span class="item-name">Form Validation</span></a></li>
                    <li class="nav-item"><a href="smart.wizard.php"><i class="nav-icon i-Width-Window"></i><span class="item-name">Smart Wizard</span></a></li>
                    <li class="nav-item"><a href="tag.input.php"><i class="nav-icon i-Tag-2"></i><span class="item-name">Tag Input</span></a></li>
                    <li class="nav-item"><a href="editor.php"><i class="nav-icon i-Pen-2"></i><span class="item-name">Rich Editor</span></a></li>
                </ul>
                <ul class="childNav" data-parent="apps">
                    <li class="nav-item"><a href="<?php echo base_url();  ?>Get-plan"><i class="nav-icon i-Add-File"></i><span class="item-name">Get Plan</span></a></li>
                    <li class="nav-item"><a href="user_transitions.php"><i class="nav-icon i-Email"></i><span class="item-name">My Plan History</span></a></li>
                    <li class="nav-item"><a href="user_memberships.php"><i class="nav-icon i-Speach-Bubble-3"></i><span class="item-name">My Memberships</span></a></li>
                </ul>
                <ul class="childNav" data-parent="widgets">
                    <li class="nav-item"><a href="widget-card.php"><i class="nav-icon i-Receipt-4"></i><span class="item-name">Aminities</span></a></li>
                  <!--   <li class="nav-item"><a href="widget-statistics.php"><i class="nav-icon i-Receipt-4"></i><span class="item-name">widget statistics</span></a></li>
                    <li class="nav-item"><a href="widget-list.php"><i class="nav-icon i-Receipt-4"></i><span class="item-name">Widget List <span class="ml-2 badge badge-pill badge-danger">New</span></span></a></li>
                    <li class="nav-item"><a href="widget-app.php"><i class="nav-icon i-Receipt-4"></i><span class="item-name">Widget App <span class="ml-2 badge badge-pill badge-danger"> New</span></span></a></li>
                    <li class="nav-item"><a href="weather-card.php"><i class="nav-icon i-Receipt-4"></i><span class="item-name">Weather App <span class="ml-2 badge badge-pill badge-danger"> New</span></span></a></li> -->
                </ul>
                <!-- chartjs-->
              <!--   <ul class="childNav" data-parent="charts">
                    <li class="nav-item"><a href="charts.echarts.php"><i class="nav-icon i-File-Clipboard-Text--Image"></i><span class="item-name">echarts</span></a></li>
                    <li class="nav-item"><a href="charts.chartsjs.php"><i class="nav-icon i-File-Clipboard-Text--Image"></i><span class="item-name">ChartJs</span></a></li>
                    <li class="nav-item dropdown-sidemenu"><a href="#"><i class="nav-icon i-File-Clipboard-Text--Image"></i><span class="item-name">Apex Charts</span><i class="dd-arrow i-Arrow-Down"></i></a>
                        <ul class="submenu">
                            <li><a href="charts.apexAreaCharts.php">Area Charts</a></li>
                            <li><a href="charts.apexBarCharts.php">Bar Charts</a></li>
                            <li><a href="charts.apexBubbleCharts.php">Bubble Charts</a></li>
                            <li><a href="charts.apexColumnCharts.php">Column Charts</a></li>
                            <li><a href="charts.apexCandleStickCharts.php">CandleStick Charts</a></li>
                            <li><a href="charts.apexLineCharts.php">Line Charts</a></li>
                            <li><a href="charts.apexMixCharts.php">Mix Charts</a></li>
                            <li><a href="charts.apexPieDonutCharts.php">PieDonut Charts</a></li>
                            <li><a href="charts.apexRadarCharts.php">Radar Charts</a></li>
                            <li><a href="charts.apexRadialBarCharts.php">RadialBar Charts</a></li>
                            <li><a href="charts.apexScatterCharts.php">Scatter Charts</a></li>
                            <li><a href="charts.apexSparklineCharts.php">Sparkline Charts</a></li>
                        </ul>
                    </li>
                </ul> -->
                <ul class="childNav" data-parent="extrakits">
                    <li class="nav-item"><a href="<?php echo base_url(); ?>Offer-list"><i class="nav-icon i-Crop-2"></i><span class="item-name">Feature Deal & Offers</span></a></li>
                   <!--  <li class="nav-item"><a href="loaders.php"><i class="nav-icon i-Loading-3"></i><span class="item-name">Loaders</span></a></li>
                    <li class="nav-item"><a href="ladda.button.php"><i class="nav-icon i-Loading-2"></i><span class="item-name">Ladda Buttons</span></a></li>
                    <li class="nav-item"><a href="toastr.php"><i class="nav-icon i-Bell"></i><span class="item-name">Toastr</span></a></li>
                    <li class="nav-item"><a href="sweet.alerts.php"><i class="nav-icon i-Approved-Window"></i><span class="item-name">Sweet Alerts</span></a></li>
                    <li class="nav-item"><a href="tour.php"><i class="nav-icon i-Plane"></i><span class="item-name">User Tour</span></a></li>
                    <li class="nav-item"><a href="upload.php"><i class="nav-icon i-Data-Upload"></i><span class="item-name">Upload</span></a></li> -->
                </ul>
                <ul class="childNav" data-parent="uikits">
                    <li class="nav-item"><a href="<?php echo base_url();  ?>My-offer"><i class="nav-icon i-Bell1"></i><span class="item-name">Create Offer</span></a></li>
                    <li class="nav-item"><a href="<?php echo base_url();  ?>offer-list"><i class="nav-icon i-Split-Horizontal-2-Window"></i><span class="item-name">My Offer List</span></a></li>
                    <li class="nav-item"><a href="<?php echo base_url();  ?>offer-redeem"><i class="nav-icon i-Medal-2"></i><span class="item-name">Offer Redeem</span></a></li>
                    <li class="nav-item"><a href="<?php echo base_url();  ?>My-Redeem"><i class="nav-icon i-Cursor-Click"></i><span class="item-name">My Redeem User List</span></a></li>
                    <!-- <li class="nav-item"><a href="cards.php"><i class="nav-icon i-Line-Chart-2"></i><span class="item-name">Cards</span></a></li> -->
                   <!--  <li class="nav-item"><a href="card.metrics.php"><i class="nav-icon i-ID-Card"></i><span class="item-name">Card Metrics</span></a></li>
                    <li class="nav-item"><a href="carousel.php"><i class="nav-icon i-Video-Photographer"></i><span class="item-name">Carousels</span></a></li>
                    <li class="nav-item"><a href="lists.php"><i class="nav-icon i-Belt-3"></i><span class="item-name">Lists</span></a></li>
                    <li class="nav-item"><a href="pagination.php"><i class="nav-icon i-Arrow-Next"></i><span class="item-name">Paginations</span></a></li>
                    <li class="nav-item"><a href="popover.php"><i class="nav-icon i-Speach-Bubble-2"></i><span class="item-name">Popover</span></a></li>
                    <li class="nav-item"><a href="progressbar.php"><i class="nav-icon i-Loading"></i><span class="item-name">Progressbar</span></a></li>
                    <li class="nav-item"><a href="tables.php"><i class="nav-icon i-File-Horizontal-Text"></i><span class="item-name">Tables</span></a></li>
                    <li class="nav-item"><a href="tabs.php"><i class="nav-icon i-New-Tab"></i><span class="item-name">Tabs</span></a></li>
                    <li class="nav-item"><a href="tooltip.php"><i class="nav-icon i-Speach-Bubble-8"></i><span class="item-name">Tooltip</span></a></li>
                    <li class="nav-item"><a href="modals.php"><i class="nav-icon i-Duplicate-Window"></i><span class="item-name">Modals</span></a></li>
                    <li class="nav-item"><a href="nouislider.php"><i class="nav-icon i-Width-Window"></i><span class="item-name">Sliders</span></a></li> -->
                </ul>
                <ul class="childNav" data-parent="sessions">
                    <li class="nav-item"><a href="http://demos.ui-lib.com/gull/html/sessions/signin.php"><i class="nav-icon i-Checked-User"></i><span class="item-name">Sign in</span></a></li>
                    <li class="nav-item"><a href="http://demos.ui-lib.com/gull/html/sessions/signup.php"><i class="nav-icon i-Add-User"></i><span class="item-name">Sign up</span></a></li>
                    <li class="nav-item"><a href="http://demos.ui-lib.com/gull/html/sessions/forgot.php"><i class="nav-icon i-Find-User"></i><span class="item-name">Forgot</span></a></li>
                </ul>
                <ul class="childNav" data-parent="others">
                    <li class="nav-item"><a href="http://demos.ui-lib.com/gull/html/sessions/not-found.php"><i class="nav-icon i-Error-404-Window"></i><span class="item-name">Not Found</span></a></li>
                    <li class="nav-item"><a href="user.profile.php"><i class="nav-icon i-Male"></i><span class="item-name">User Profile</span></a></li>
                    <li class="nav-item"><a class="open" href="blank.php"><i class="nav-icon i-File-Horizontal"></i><span class="item-name">Blank Page</span></a></li>
                </ul>
            </div>
            <div class="sidebar-overlay"></div>
        </div>

         <?php } ?>
        <!-- =============== Left side End ================-->
        
        
        
        
        
          <!-- The Users Modal -->

                           <div class="modal" id="myModal">

                            <div class="modal-dialog">

                              <div class="modal-content">



                                <!-- Modal Header -->

                                <div class="modal-header">

                                  <h4 class="modal-title name">Vendor</h4>

                                  <button type="button" class="close" data-dismiss="modal">&times;</button>

                                </div>



                                <!-- Modal body -->

                                <div class="modal-body">

                                  <div class="user_detail"></div>

                                  <div class="card user-card">

                                    <div class="card-header">

                                      <h5 class="">Profile</h5>

                                    </div>

                                    <div class="card-block">

                                      <div class="usre-image profile_pic">



                                      </div>

                                      <h6 class="f-w-600 m-t-25 m-b-10">Alessa Robert</h6>

                                      <p class="text-muted">Active | Male | Born 23.05.1992</p>

                                      <hr/>

                                      <p class="text-muted m-t-15">Activity Level: 87%</p>

                                      <ul class="list-unstyled activity-leval">

                                        <li class="active"></li>

                                        <li class="active"></li>

                                        <li class="active"></li>

                                        <li></li>

                                        <li></li>

                                      </ul>

                                      <div class="bg-c-blue counter-block m-t-10 p-20">

                                        <div class="row">

                                          <div class="col-4">

                                            <i class="ti-comments"></i>

                                            <p>1256</p>

                                          </div>

                                          <div class="col-4">

                                            <i class="ti-user"></i>

                                            <p>8562</p>

                                          </div>

                                          <div class="col-4">

                                            <i class="ti-bag"></i>

                                            <p>189</p>

                                          </div>

                                        </div>

                                      </div>

                                      <p class="m-t-15 text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>

                                      <hr/>

                                      <div class="row justify-content-center user-social-link">

                                        <div class="col-auto"><a href="#!"><i class="fa fa-facebook text-facebook"></i></a></div>

                                        <div class="col-auto"><a href="#!"><i class="fa fa-twitter text-twitter"></i></a></div>

                                        <div class="col-auto"><a href="#!"><i class="fa fa-dribbble text-dribbble"></i></a></div>

                                      </div>

                                    </div>

                                  </div>

                                </div>



                                <!-- Modal footer -->

                                <div class="modal-footer">

                                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                                </div>



                              </div>

                            </div>

                          </div>

                          <!-- The Venders Modal -->

                          <div class="modal" id="myModal2">

                            <div class="modal-dialog">

                              <div class="modal-content">



                                <!-- Modal Header -->

                                <div class="modal-header">

                                  <h4 class="modal-title name">Vendor</h4>

                                  <button type="button" class="close" data-dismiss="modal">&times;</button>

                                </div>



                                <!-- Modal body -->

                                <div class="modal-body">

                                  <div class="user_detail"></div>

                                  <div class="card user-card">

                                    <div class="card-header">

                                      <h5 class="">Profile</h5>

                                    </div>

                                    <div class="email"></div>



                                    <div class="national_id"></div>

                                    <div class="business_proof"></div>

                                    <div class="address"></div>

                                    <div class="latitude"></div>

                                    <div class="longitude"></div>

                                    <div class="contact"></div>

                                    <div class="city"></div>

                                    <div class="menu_pdf"></div>

                                    <div class="card-block">

                                      <div class="usre-image profile_pic">



                                      </div>

                                      <h6 class="f-w-600 m-t-25 m-b-10">Alessa Robert</h6>

                                      <p class="text-muted">Active | Male | Born 23.05.1992</p>

                                      <hr/>

                                      <p class="text-muted m-t-15">Activity Level: 87%</p>

                                      <ul class="list-unstyled activity-leval">

                                        <li class="active"></li>

                                        <li class="active"></li>

                                        <li class="active"></li>

                                        <li></li>

                                        <li></li>

                                      </ul>

                                      <div class="bg-c-blue counter-block m-t-10 p-20">

                                        <div class="row">

                                          <div class="col-4">

                                            <i class="ti-comments"></i>

                                            <p>1256</p>

                                          </div>

                                          <div class="col-4">

                                            <i class="ti-user"></i>

                                            <p>8562</p>

                                          </div>

                                          <div class="col-4">

                                            <i class="ti-bag"></i>

                                            <p>189</p>

                                          </div>

                                        </div>

                                      </div>

                                      <p class="m-t-15 text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>

                                      <hr/>

                                      <div class="row justify-content-center user-social-link">

                                        <div class="col-auto"><a href="#!"><i class="fa fa-facebook text-facebook"></i></a></div>

                                        <div class="col-auto"><a href="#!"><i class="fa fa-twitter text-twitter"></i></a></div>

                                        <div class="col-auto"><a href="#!"><i class="fa fa-dribbble text-dribbble"></i></a></div>

                                      </div>

                                    </div>

                                  </div>

                                </div>



                                <!-- Modal footer -->

                                <div class="modal-footer">

                                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                                </div>



                              </div>

                            </div>

                          </div>

                          <!-- News add model -->

                          <div class="modal" id="news-section">

                            <div class="modal-dialog">

                              <div class="modal-content">


   <form enctype="multipart/form-data"  accept-charset="utf-8" name="formname" id="formname"  method="post"  >

                                <!-- Modal Header -->

                                <div class="modal-header">

                                  <h4 class="modal-title">Add News Section</h4>

                                  <button type="button" class="close" data-dismiss="modal">&times;</button>

                                </div>



                                <!-- Modal body -->

                                <div class="modal-body">

                                 <div class="row">



                                   <div class="col-xl-12">

                                     <!-- <form action="#" method="post"> -->

                                  
                                      <div class="form-group news_save" style="display: none;" id="successMessage">





                                       <div class="alert alert-success">

                                        <strong>News Save Successfully.</strong>

                                      </div>

                                    </div>

                                    <div class="form-group">

                                     <label>Title</label>

                                     <input type="text"  name="title" class="form-control title">

                                   </div>

                                   <div class="form-group">

                                     <label>text</label>

                                     <input type="text"  name="text" class="form-control text">

                                   </div>

                                   <div class="form-group">

                                     <label>Image</label>

                                     <input type="file" id="imag"  name="imag" class="form-control imag">

                                   </div> 


                               </div>

                             </div>

                           </div>



                           <!-- Modal footer -->

                           <div class="modal-footer">

                         
                            <input type="submit" value="submit"  onsubmit="hidemodel()" class="btn btn-danger save_news"/>

                          </div>
                          

                                 </form>

                        </div>

                      </div>

                    </div>

                    <!-- News update model -->

                    <div class="modal" id="news-update">

                      <div class="modal-dialog">

                        <div class="modal-content">



                          <!-- Modal Header -->

                          <div class="modal-header">

                            <h4 class="modal-title">Update News Section</h4>

                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                          </div>



                          <!-- Modal body -->

                          <div class="modal-body">

                           <div class="row">



                             <div class="col-xl-12">

                               <form enctype="multipart/form-data"  accept-charset="utf-8" name="formname1" id="formname1"  method="post" action="" >

                                <div class="form-group news_update" style="display: none;" id="successMessage">

                                 <div class="alert alert-success">

                                  <strong>News Update Successfully.</strong>

                                </div>

                              </div>



                              <div class="form-group">

                               <label>Title</label>

                               <input type="text" id="title"  name="title" value="" class="form-control title">

                             </div>

                             <div class="form-group">

                               <label>text</label>



                               <input type="text" id="text" value="" name="text" class="form-control text">

                             </div>

                             <div class="form-group">

                               <label>Image</label>

                               <input type="file" id="imag" name="imag"  value="" class="form-control imag">

                               <div id="id_to"></div>

                             </div>



                           </form>

                         </div>

                       </div>

                     </div>



                     <!-- Modal footer -->

                     <div class="modal-footer">

                      <button type="submit" class="btn btn-danger update_news">submit</button>

                    </div>



                  </div>

                </div>

              </div>

              <!-- category Modal -->

              <div class="modal" id="category-section">

                <div class="modal-dialog">

                  <div class="modal-content">



                    <!-- Modal Header -->

                    <div class="modal-header">

                      <h4 class="modal-title">Add Category</h4>

                      <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>



                    <!-- Modal body -->

                    <div class="modal-body">

                     <div class="row">

                       <div class="col-xl-12">



                        <form enctype="multipart/form-data" id="modal_form_id"  method="POST" >



                         <div class="form-group">

                           <label>Category Name</label>

                           <input type="text" name="name" id="name" class="form-control">

                         </div>



                         <div class="form-group">

                           <label>Image</label>

                           <input type="file" name="userfile" id="userfile" class="form-control">

                         </div>



                       </form>

                     </div>

                   </div>

                 </div>



                 <!-- Modal footer -->

                 <div class="modal-footer">

                  <button type="submit" class="btn btn-danger category_save">submit</button>

                </div>



              </div>

            </div>

          </div>

          <!-- category Modal update-->

          <div class="modal" id="category-update">

            <div class="modal-dialog">

              <div class="modal-content">



                <!-- Modal Header -->

                <div class="modal-header">

                  <h4 class="modal-title">Update Category</h4>

                  <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>



                <!-- Modal body -->

                <div class="modal-body">

                 <div class="row">

                   <div class="col-xl-12">



                    <form enctype="multipart/form-data" id="modal_form_id2"  method="POST" >



                     <div class="form-group">

                       <label>Category Name</label>

                       <input type="text" name="name" id="name" class="form-control name">

                     </div>

                     <input type="hidden" name="id" value="" class="id">

                     <input type="hidden" name="featured_image" value="" class="featured_image">

                     <div class="featured_image"></div>

                     <div class="form-group">

                       <label>Image</label>

                       <input type="file" name="userfile" id="userfile" class="form-control userfile">

                     </div>



                   </form>

                 </div>

               </div>

             </div>



             <!-- Modal footer -->

             <div class="modal-footer">

              <button type="submit" class="btn btn-danger category_update">submit</button>

            </div>



          </div>

        </div>

      </div>

      <!--sub category Modal -->

      <div class="modal" id="sub-category-section">

        <div class="modal-dialog">

          <div class="modal-content">



            <!-- Modal Header -->

            <div class="modal-header">

              <h4 class="modal-title">Add Sub Category</h4>

              <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>



            <!-- Modal body -->

            <div class="modal-body">

             <div class="row">

               <div class="col-xl-12">



                <form enctype="multipart/form-data" id="subcate"  method="POST" >

                  <div class="form-group">

                    <label>Category Name</label>

                    <select class="category_list form-control" name="c_id" id="c_id">

                      <option>Select Category</option>

                    </select>

                  </div>

                  <div class="form-group">

                   <label>Sub Category Name</label>

                   <input type="text" name="name" id="name" class="form-control">

                 </div>



                 <div class="form-group">

                   <label>Image</label>

                   <input type="file" name="userfile" id="userfile" class="form-control">

                 </div>



               </form>

             </div>

           </div>

         </div>



         <!-- Modal footer -->

         <div class="modal-footer">

          <button type="submit" class="btn btn-danger subcategory_save">submit</button>

        </div>



      </div>

    </div>

  </div>

  <!-- subcategory Modal update-->

  <div class="modal" id="subcategory-update">

    <div class="modal-dialog">

      <div class="modal-content">



        <!-- Modal Header -->

        <div class="modal-header">

          <h4 class="modal-title">Update SubCategory</h4>

          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>



        <!-- Modal body -->

        <div class="modal-body">

         <div class="row">

           <div class="col-xl-12">



            <form enctype="multipart/form-data" id="subcateupdate"  method="POST" >

              <div class="form-group">

                <label>Category Name</label>

                <select class="category_list form-control" name="c_id" id="c_id">

                  <option>Select Category</option>

                </select>

              </div>

              <div class="form-group">

               <label>SubCategory Name</label>

               <input type="text" name="name" id="name" class="form-control name">

             </div>

             <input type="hidden" name="id" value="" class="id">

             <input type="hidden" name="featured_image" value="" class="featured_image">

             <div class="featured_image"></div>

             <div class="form-group">

               <label>Image</label>

               <input type="file" name="userfile" id="userfile" class="form-control userfile">

             </div>



           </form>

         </div>

       </div>

     </div>



     <!-- Modal footer -->

     <div class="modal-footer">

      <button type="submit" class="btn btn-danger subcategory_update">submit</button>

    </div>



  </div>

</div>

</div>

<!-- Vender Offer Modal -->

<div class="modal" id="Vender_offer">

  <div class="modal-dialog modal-lg">

    <div class="modal-content">



      <!-- Modal Header -->

      <div class="modal-header">

        <h4 class="modal-title">Offer Detail</h4>

        <button type="button" class="close" data-dismiss="modal">&times;</button>

      </div>



      <!-- Modal body -->

      <div class="modal-body">

       <div class="row">

         <div class="col-xl-12">



          <form enctype="multipart/form-data" id="subcateupdate"  method="POST" >



            <div class="row">

              <div class="col-xl-4">

                <div  class="offer_img"></div>

              </div>

              <div class="col-xl-8">

               <div class="view_information">

                 <div>offer title:</div> 

                 <div class="offer_title"></div>

               </div>



               <div class="view_information"> <div>offer_name:</div><div class="offer_name"></div></div>

               <div class="view_information"> <div>offer_detail:</div><div class="offer_detail"></div></div>

               <div class="view_information"> <div>valid_date:</div><div class="valid_date"></div></div>

               <div class="view_information"><div>limit_per_user:</div><div class="limit_per_user"></div></div>

               <div class="view_information"><div>stoke:</div><div class="stoke"></div></div>

               <div class="view_information"><div>used:</div><div class="used"></div></div>

               <div class="view_information"><div>offer_amount:</div><div class="offer_amount"></div></div>

               <div class="view_information"> <div>add_date:</div><div class="add_date"></div></div>

               <div class="view_information"> <div>status:</div><div class="status"></div></div>

             </div>

           </div>

         </div>







       </form>

     </div>

   </div>

 </div>





</div>

</div>

</div>

<!--Aminity Modal -->

<div class="modal" id="aminity-section">

  <div class="modal-dialog">

    <div class="modal-content">



      <!-- Modal Header -->

      <div class="modal-header">

        <h4 class="modal-title">Add Aminity</h4>

        <button type="button" class="close" data-dismiss="modal">&times;</button>

      </div>



      <!-- Modal body -->

      <div class="modal-body">

       <div class="row">

         <div class="col-xl-12">



          <form enctype="multipart/form-data" id="aminity"  method="POST" >

            <div class="form-group">

              <label>Category Name</label>

              <select class="category_list form-control" name="c_id" id="c_id">

                <option>Select Category</option>

              </select>

            </div>

            <div class="form-group">

             <label>Aminity Name</label>

             <input type="text" name="name" id="name" class="form-control">

           </div>



           <div class="form-group">

             <label>Image</label>

             <input type="file" name="userfile" id="userfile" class="form-control">

           </div>



         </form>

       </div>

     </div>

   </div>



   <!-- Modal footer -->

   <div class="modal-footer">

    <button type="submit" class="btn btn-danger aminity_save">submit</button>

  </div>



</div>

</div>

</div>

<!-- aminity update Modal update-->

<div class="modal" id="aminity-update">

  <div class="modal-dialog">

    <div class="modal-content">



      <!-- Modal Header -->

      <div class="modal-header">

        <h4 class="modal-title">Update Aminity</h4>

        <button type="button" class="close" data-dismiss="modal">&times;</button>

      </div>



      <!-- Modal body -->

      <div class="modal-body">

       <div class="row">

         <div class="col-xl-12">



          <form enctype="multipart/form-data" id="aminityupdate"  method="POST" >

            <div class="form-group">

              <label>Category Name</label>

              <select class="category_list form-control" name="c_id" id="c_id">

                <option>Select Category</option>

              </select>

            </div>

            <div class="form-group">

             <label>SubCategory Name</label>

             <input type="text" name="name" id="name" class="form-control name">

           </div>

           <input type="hidden" name="id" value="" class="id">

           <input type="hidden" name="featured_image" value="" class="featured_image">

           <div class="featured_image"></div>

           <div class="form-group">

             <label>Image</label>

             <input type="file" name="userfile" id="userfile" class="form-control userfile">

           </div>



         </form>

       </div>

     </div>

   </div>



   <!-- Modal footer -->

   <div class="modal-footer">

    <button type="submit" class="btn btn-danger aminity_update">submit</button>

  </div>



</div>

</div>

</div>

<!-- Rating Modal -->

<div class="modal" id="RatingmyModal">

  <div class="modal-dialog">

    <div class="modal-content">



      <!-- Modal Header -->

      <div class="modal-header">

        <h4 class="modal-title">User Rating Detail</h4>

        <button type="button" class="close" data-dismiss="modal">&times;</button>

      </div>



      <!-- Modal body -->

      <div class="modal-body">

       <div class="row">

         <div class="col-xl-12">



          <form enctype="multipart/form-data" id="aminityupdate"  method="POST" >



           <div class="form-group">

             <label class="review"></label>



           </div>





         </form>

       </div>

     </div>

   </div>





 </div>

</div>

</div>

<script>
    
    function hidemodel()
    {
        document.getElementById(news-section).style.display="none";
    }
    
    
</script>