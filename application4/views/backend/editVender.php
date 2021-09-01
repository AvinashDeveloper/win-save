<style>

  .summary {

    display: flex;

    flex-direction: row;

    width: 100%;

  }

  .summary > div {

    display: flex;

    justify-content: space-between;

    align-content: center;

    width: 100%;

    padding: 10px 0px;

  }

  .summary > .summary_heading

  {

    font-weight: 900;

  }

  .avatar-upload {

    position: relative;

    max-width: 100%;



  }

  .avatar-upload .avatar-edit {

    position: absolute;

    right: 12px;

    z-index: 1;

    top: 10px;

  }

  .avatar-upload .avatar-edit input {

    display: none;

  }

  .avatar-upload .avatar-edit input + label {

    display: inline-block;

    width: 34px;

    height: 34px;

    margin-bottom: 0;



    background: #FFFFFF;

    border: 1px solid transparent;

    box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);

    cursor: pointer;

    font-weight: normal;

    transition: all 0.2s ease-in-out;

  }

  .avatar-upload .avatar-edit input + label:hover {

    background: #f1f1f1;

    border-color: #d6d6d6;

  }

  .avatar-upload .avatar-edit input + label:after {

    content: "\f040";

    font-family: 'FontAwesome';

    color: #757575;

    position: absolute;

    top: 10px;

    left: 0;

    right: 0;

    text-align: center;

    margin: auto;

  }

  .avatar-upload .avatar-preview {

    width: 100%;

    height: 150px;

    position: relative;



    border: 6px solid #F8F8F8;

    box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);

  }

  .avatar-upload .avatar-preview > div {

    width: 100%;

    height: 100%;



    background-size: cover;

    background-repeat: no-repeat;

    background-position: center;

  }

  .card-icon-bg [class^="i-"] {

    font-size: 3rem;

    color: rgba(187, 187, 187, 0.28);

  }

</style>

<!-- =============== Left side End ================-->

<div class="main-content-wrap sidenav-open d-flex flex-column">

  <!-- ============ Body content start ============= -->

  <div class="main-content">

    <div class="breadcrumb">

      <h1 class="mr-2">Manange</h1>

      <ul>

        <li><a href="#">Vendor</a></li>

        <li>Account Setup</li>

      </ul>

    </div>
    <div class="separator-breadcrumb border-top"></div>

    <div class="row">
      <div class="col-12">
        <div id="accordion4">

          <div class="card">

            <div class="card-header">

              <a class="collapsed card-link" data-toggle="collapse" href="#sft">

                Account Summary

              </a>

            </div>

            <div id="sft" class="collapse show" data-parent="#accordion4">

              <div class="card-body">

                <div class="row">

                  <div class="col-6">

                    <div class="summary">

                      <div class="summary_heading">Id</div>

                      <div class="summary_value"><?php print_r($ac_summery[0]['id']);  ?></div>

                    </div>

                    <div class="summary">

                      <div class="summary_heading">Store Name</div>

                      <div class="summary_value"><?php print_r($ac_summery[0]['name']);  ?></div>

                    </div>

                    <div class="summary">

                      <div class="summary_heading">Category</div>

                      <div class="summary_value">Food</div>

                    </div>

                    <div class="summary">

                      <div class="summary_heading">Sub Category</div>

                      <div class="summary_value">Fast Food</div>

                    </div>

                  </div>



                  <div class="col-6">

                    <div class="summary ">

                      <div class="summary_heading">Created Date</div>

                      <div class="summary_value"><?php print_r($ac_summery[0]['added_date']);  ?></div>

                    </div>

                    <div class="summary">

                      <div class="summary_heading">Account Approve</div>

                      <div class="summary_value"> 


                        <?php if ($ac_summery[0]['approved_status']==1) {?>
                          <span class="badge badge-success">
                            <?php  echo "Approve"; ?>
                          </span>
                        <?php }else if ($ac_summery[0]['approved_status']==2) {?>
                          <span class="badge badge-danger">
                            <?php  echo "Pending"; ?>
                          </span>
                        <?php }else { ?>
                          <span class="badge badge-info"><?php 
                          echo "Disapprove";
                          ?></span>
                        <?php }  ?>

                      </div>

                    </div>

                    <div class="summary ">

                      <div class="summary_heading">Account Status</div>

                      <div class="summary_value">
                        <?php if ($ac_summery[0]['status']==1) {?>
                          <span class="badge badge-success">
                            <?php echo "Active";
                            ?></span>
                          <?php }else if ($ac_summery[0]['status']==2) {?>
                          <span class="badge badge-danger">
                            <?php echo "Blocked";
                            ?></span>
                          <?php }else { ?>

                            <span class="badge badge-info"><?php  
                            echo "Deactive";
                            ?></span>
                          <?php }  ?>



                        </div>

                      </div>

                    </div>



                  </div>

                  <div class="divider">&nbsp;</div>

                  <h4> Service</h4>

                  <div class="divider">&nbsp;</div>
                  <?php if ($ac_summery[0]['plan_id']>0) { ?>
                    <div class="d-flex flex-row w-100">

                      <div class="summary flex-column">

                        <div class="summary_heading">Offer Plan</div>

                        <div class="summary_value"><?php  $plan_detail = $this->ModVender->plan_detail($ac_summery[0]['plan_id']); print_r($plan_detail[0]['plan_type']);?></div>

                      </div>

                      <div class="summary flex-column">

                        <div class="summary_heading">Classified</div>

                        <div class="summary_value">
                            <?php if($ac_summery[0]['classified_status'] = 1){echo "Yes";}else{echo "No";} ?>
                        </div>

                      </div>

                      <div class="summary flex-column">

                        <div class="summary_heading">Limited</div>

                        <?php if($ac_summery[0]['limited_status'] = 1){echo "Yes";}else{echo "No";} ?>

                      </div>

                      <div class="summary flex-column">

                        <div class="summary_heading">Date Subscription</div>

                        <div class="summary_value">05/12/2019</div>

                      </div>

                      <div class="summary flex-column">

                        <div class="summary_heading">Date Expiry</div>

                        <div class="summary_value">05/12/2020</div>

                      </div>

                    </div>

                  </div>
                <?php }else {echo "Sorry You Have No Service Plan Activeted";}  ?>

              </div>

            </div>

            <br/>

            <div class="card">

              <div class="card-header">

                <a class="collapsed card-link" data-toggle="collapse" href="#gdg">

                  Vendor Profile Setup

                </a>

              </div>

              <div id="gdg" class="collapse" data-parent="#accordion4">

                <div class="card-body">

                  <div class="row">



                    <!-- ICON BG-->

                    <div class="col-lg-3 col-md-6 col-sm-6">

                      <a href="<?php echo base_url();  ?>backend/Login/vendor_info/<?php print_r($ac_summery[0]['id']);  ?>">

                        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">

                          <div class="card-body text-center"><i class="i-Add-User"></i>

                            <div class="content">

                              <p class="text-muted mt-2 mb-0">Vendor Setup</p>



                            </div>

                          </div>

                        </div>

                      </a>

                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">

                      <a href="<?php echo base_url();  ?>backend/Login/account_management/<?php print_r($ac_summery[0]['id']);  ?>">

                        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">

                          <div class="card-body text-center"><i class="i-Financial"></i>

                            <div class="content">

                              <p class="text-muted mt-2 mb-0">Management Account</p>



                            </div>

                          </div>

                        </div>

                      </a>

                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">

                      <a href="<?php echo base_url();  ?>backend/Login/store_setup/<?php print_r($ac_summery[0]['id']);  ?>">

                        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">

                          <div class="card-body text-center"><i class="i-Checkout-Basket"></i>

                            <div class="content">

                              <p class="text-muted mt-2 mb-0">Store Setup</p>



                            </div>

                          </div>

                        </div>

                      </a>

                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">

                      <a href="<?php echo base_url();  ?>backend/Login/v_offers/<?php print_r($ac_summery[0]['id']);  ?>">

                        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">

                          <div class="card-body text-center"><i class="i-Money-2"></i>

                            <div class="content">

                              <p class="text-muted mt-2 mb-0">Offers</p>



                            </div>

                          </div>

                        </div>

                      </a>

                    </div>

                  </div>

                  <div class="row">



                    <!-- ICON BG-->

                    <div class="col-lg-3 col-md-6 col-sm-6">

                      <a href="<?php echo base_url();  ?>backend/Login/gift_inventory/<?php print_r($ac_summery[0]['id']);  ?>">

                        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">

                          <div class="card-body text-center"><i class="i-Tourch"></i>

                            <div class="content">

                              <p class="text-muted mt-2 mb-0">Gift Inventory</p>



                            </div>

                          </div>

                        </div>

                      </a>

                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">

                      <a href="<?php echo base_url();  ?>backend/Login/promo_classified/<?php print_r($ac_summery[0]['id']);  ?>">

                        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">

                          <div class="card-body text-center"><i class="i-Width-Window"></i>

                            <div class="content">

                              <p class="text-muted mt-2 mb-0">Promo Classified</p>



                            </div>

                          </div>

                        </div>

                      </a>

                    </div>



                    <div class="col-lg-3 col-md-6 col-sm-6">

                      <a href="<?php echo base_url();  ?>backend/Login/promo_limited/<?php print_r($ac_summery[0]['id']);  ?>">

                        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">

                          <div class="card-body text-center"><i class="i-Tag"></i>

                            <div class="content">

                              <p class="text-muted mt-2 mb-0">Promo Limited</p>



                            </div>

                          </div>

                        </div>

                      </a>

                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">

                      <a href="<?php echo base_url();  ?>backend/Login/claim_item/<?php print_r($ac_summery[0]['id']);  ?>">

                        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">

                          <div class="card-body text-center"><i class="i-Windows-2"></i>

                            <div class="content">

                              <p class="text-muted mt-2 mb-0">Claimed Items</p>



                            </div>

                          </div>

                        </div>

                      </a>

                    </div>

                  </div>

                  <div class="row">



                    <!-- ICON BG-->

                    <div class="col-lg-3 col-md-6 col-sm-6">

                      <a href="<?php echo base_url();  ?>backend/Login/report/<?php print_r($ac_summery[0]['id']);  ?>">

                        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">

                          <div class="card-body text-center"><i class="i-Calendar-4"></i>

                            <div class="content">

                              <p class="text-muted mt-2 mb-0">Report</p>



                            </div>

                          </div>

                        </div>

                      </a>

                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">

                      <a href="<?php echo base_url();  ?>backend/Login/review/<?php print_r($ac_summery[0]['id']);  ?>">

                        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">

                          <div class="card-body text-center"><i class="i-Address-Book-2"></i>

                            <div class="content">

                              <p class="text-muted mt-2 mb-0">Review</p>



                            </div>

                          </div>

                        </div>

                      </a>

                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">

                      <a href="<?php echo base_url();  ?>backend/Login/billing/<?php print_r($ac_summery[0]['id']);  ?>">

                        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">

                          <div class="card-body text-center"><i class="i-Billing"></i>

                            <div class="content">

                              <p class="text-muted mt-2 mb-0">Billing</p>



                            </div>

                          </div>

                        </div>

                      </a>

                    </div>



                  </div>

                </div>

              </div>

            </div> 

          </div>



          <!--   -->




        </div>



      </div>

      <br/><br/>



    </div><!-- Footer Start -->

    <div class="flex-grow-1"></div>

    <div class="app-footer">

      <div class="row">

        <div class="col-md-9">

          <p><strong>Hotbit</strong></p>

          <P>Hotbit came into the existence with the aspirations to develop customize creative mobile apps that can cater the requirements of clients in a cost-effective manner. The company was started by two zealous engineers who always wanted to bring the change by proving real-world solutions to stand out from the rest of competitors. With a hope to reach beyond clouds and big plans whirling in the mind, we made our way out and blossomed up with many successful business apps. Our excellent industry based approach helps to deliver ground breaking mobile apps which helped the client to come up with the proficient business.</P>

        </div>

      </div>

      <div class="footer-bottom border-top pt-3 d-flex flex-column flex-sm-row align-items-center">

        <a class="btn btn-primary text-white btn-rounded" href="https://www.hotbitinfotech.com" target="_blank">Hotbit India</a>

        <span class="flex-grow-1"></span>

        <div class="d-flex align-items-center">

          <img class="logo" src="../../dist-assets/images/logo.png" alt="">

          <div>

            <p class="m-0">&copy; 2018 Win & Save</p>

            <p class="m-0">All rights reserved</p>

          </div>

        </div>

      </div>

    </div>

  </div>

</div><!-- ============ Search UI Start ============= -->

<div class="search-ui">

  <div class="search-header">

    <img src="../../dist-assets/images/logo.png" alt="" class="logo">

    <button class="search-close btn btn-icon bg-transparent float-right mt-2">

      <i class="i-Close-Window text-22 text-muted"></i>

    </button>

  </div>

  <input type="text" placeholder="Type here" class="search-input" autofocus>

  <div class="search-title">

    <span class="text-muted">Search results</span>

  </div>

<!-- <div class="search-results list-horizontal">

<div class="list-item col-md-12 p-0">

<div class="card o-hidden flex-row mb-4 d-flex">

<div class="list-thumb d-flex">

  <!-- TUMBNAIL -->

  <img src="../../dist-assets/images/products/headphone-1.jpg" alt="">

</div>

<div class="flex-grow-1 pl-2 d-flex">

  <div class="card-body align-self-center d-flex flex-column justify-content-between align-items-lg-center flex-lg-row">

    <!-- OTHER DATA -->

    <a href="#" class="w-40 w-sm-100">

      <div class="item-title">Headphone 1</div>

    </a>

    <p class="m-0 text-muted text-small w-15 w-sm-100">Gadget</p>

    <p class="m-0 text-muted text-small w-15 w-sm-100"><small>SAR</small> 300

      <del class="text-secondary"><small>SAR</small> 400</del>

    </p>

    <p class="m-0 text-muted text-small w-15 w-sm-100 d-none d-lg-block item-badges">

      <span class="badge badge-danger">Sale</span>

    </p>

  </div>

</div>

</div>

</div>

</div>

<!-- PAGINATION CONTROL -->

</div>





