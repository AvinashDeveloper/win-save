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
</style>
<?php $vendor_id = $this->uri->segment(4); ?>
<!-- =============== Left side End ================-->
<div class="main-content-wrap sidenav-open d-flex flex-column">
  <!-- ============ Body content start ============= -->
  <div class="main-content">
    <div class="breadcrumb">
      <h1 class="mr-2">Manange</h1>
      <ul>
        <li><a href="#">Vendor</a></li>
        <li>Offers</li>
      </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <div id="accordion4">
      <div class="card">
        <div class="card-header">
          <a class="card-link" data-toggle="collapse" href="#u88">
            Buy One get One free
          </a>
        </div>
        <div id="u88" class="collapse" data-parent="#accordion4">
          <div class="card-body">
            <div class="float-right">
              <button class="btn btn-secondary"  data-toggle="modal" data-target="#onefreeoffer">+ Add</button>
            </div>
            <div class="table-responsive" style="height: auto;">
              <table class="table table-bordered table-hover display" id="example">
                <thead>
                  <tr>
                    <td>Offer ID</td>
                    <th>Date of Creation</th>
                    <th>Type</th>
                    <th>Title En.</th>
                    <th>Description En..</th>
                    <th>Title Ar..</th>
                    <th>Description Ar...</th>
                    <th>Saving Value SR</th>
                    <th>Quantity</th>
                    <th>limit per user</th>
                    <th>Date of Expiry</th>
                    <th>status</th>
                    <th>Update</th>
                    <th>Remove</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i=1;
                  if(!empty($vender_offers)){
                  foreach ($vender_offers as $key) { ?>
                    <tr id="row_<?php echo $key->id;?>">
                      <td><?php echo $i;  ?></td>
                      <td><?php echo date('m/d/yy',strtotime($key->add_date));  ?></td>
                      <td><?php echo getOfferTypeString($key->offer_type);  ?></td><!-- offerType -->
                      <td><?php echo $key->offer_title;  ?></td>
                      <td><?php echo $key->offer_detail;  ?></td>
                      <td><?php echo translateText($key->offer_title) ? translateText($key->offer_title) : $key->offer_title;  ?></td>
                      <td><?php echo translateText($key->offer_detail)? translateText($key->offer_detail) : $key->offer_detail;  ?></td>
                      <td><?php echo $key->saving_amount;  ?></td>
                      <td><?php echo $key->stoke;  ?></td>
                      <td><?php echo $key->limit_per_user;  ?></td>
                      <td><?php echo date('m/d/yy',strtotime($key->valid_date));  ?></td>
                      <?php if( strtolower($key->status) == 'active'){?>
                      <td><button class="btn btn-info" onclick="changeStatus(<?php echo $key->id; ?>);"><?php echo $key->status; ?></button></td>             
                      <?php }else{
                      ?>
                      <td><button class="btn btn-success" onclick="changeStatus(<?php echo $key->id; ?>);"><?php echo $key->status; ?></button></td>  
                      <?php }?>
                      <td><button class="btn btn-success" onclick="getOffersData('<?php echo $key->id; ?>','<?php echo $vendor_id;?>');" data-toggle="modal" data-target="#onefreeoffer_update">update</button></td>
                      <td><span class="text-danger" onclick="deleteRow('<?php echo $key->id; ?>');"><i class="fa fa-close"></i></span></td>
                    </tr>
                    <?php $i++;}  }?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <br/> 

      <div class="card">
        <div class="card-header">
          <a class="collapsed card-link" data-toggle="collapse" href="#i88">
            Offers Vouchers
          </a>
        </div>
        <div id="i88" class="collapse" data-parent="#accordion4">
          <div class="card-body">
            <div class="float-right">
              <button class="btn btn-secondary"  data-toggle="modal" data-target="#voucher">+ Add</button>
            </div>
            <div class="table-responsive" style="height: auto;">
              <table class="table table-bordered table-hover display" >
                <thead>
                  <tr>
                    <th>#Offer Id</th>
                    <th>Date of Creation</th>
                    <th>Type</th>
                    <th>Voucher Price</th>
                    <th>For Over price</th>
                    <th>Title En..</th>
                    <th>Description En...</th>
                    <th>Title Ar..</th>
                    <th>Description Ar...</th>
                    <th>Saving Value SR</th>
                    <th>Quantity</th>
                    <th>Limit per user</th>
                    <th>Date of expiry</th>
                    <th>Status</th>
                    <th>Update</th>
                    <th>Remove</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $i=1;
                if(!empty($vender_offers_two)){
                foreach ($vender_offers_two as $key) { ?>
                  <tr id="row_<?php echo $key->id;?>">
                    <td><?php echo $i;  ?></td>
                    <td><?php echo date('m/d/yy',strtotime($key->add_date));  ?></td>
                    <td><?php echo getOfferTypeString($key->offer_type);  ?></td>
                    <td><?php echo $key->offer_amount;  ?></td>
                    <td><?php echo $key->main_amount;  ?></td>
                    <td><?php echo $key->offer_title;  ?></td>
                    <td><?php echo $key->offer_detail;  ?></td>
                    <td><?php echo translateText($key->offer_title) ? translateText($key->offer_title) : $key->offer_title;  ?></td>
                    <td><?php echo translateText($key->offer_detail) ? translateText($key->offer_detail) :$key->offer_detail;  ?></td>
                    <td><?php echo $key->saving_amount;  ?></td>
                    <td><?php echo $key->stoke;  ?></td>
                    <td><?php echo $key->limit_per_user;  ?></td>
                    <td><?php echo date('m/d/yy',strtotime($key->valid_date));  ?></td>
                    <?php if( strtolower($key->status) == 'active'){?>
                    <td><button class="btn btn-info" onclick="changeStatus(<?php echo $key->id; ?>);"><?php echo $key->status; ?></button></td>             
                    <?php }else{
                    ?>
                    <td><button class="btn btn-success" onclick="changeStatus(<?php echo $key->id; ?>);"><?php echo $key->status; ?></button></td>  
                    <?php }?>
                    <td><button class="btn btn-success" onclick="getSecondOffersData('<?php echo $key->id; ?>','<?php echo $vendor_id; ?>');" data-toggle="modal" data-target="#voucher_update">update</button></td>
                    <td><span class="text-danger" onclick="deleteRow('<?php echo $key->id; ?>');"><i class="fa fa-close"></i></span></td>
                  </tr>
                  <?php $i++;}  }?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <br/>

      <div class="card">
        <div class="card-header">
          <a class="collapsed card-link" data-toggle="collapse" href="#y66">
            Offers Before and After
          </a>
        </div>
        <div id="y66" class="collapse" data-parent="#accordion4">
          <div class="card-body">
            <div class="float-right">
              <button class="btn btn-secondary"  data-toggle="modal" data-target="#afterbefore">+ Add</button>
            </div>
            <div class="table-responsive" style="height: auto;">
              <table class="table table-bordered table-hover display" >
                <thead>
                  <tr>
                    <th>#Offer Id</th>
                    <th>Date of Creation</th>
                    <th>Type</th>
                    <th>Before Price</th>
                    <th>After Price</th>
                    <th>Title En.</th>
                    <th>Description En..</th>
                    <th>Title Ar..</th>
                    <th>Description Ar...</th>
                    <th>Saving Value SR</th>
                    <th>Quantity</th>
                    <th>Limit per user</th>
                    <th>Date of expiry</th>
                    <th>Status</th>
                    <th>Update</th>
                    <th>Remove</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i=1;
                  if(!empty($vender_offers_three)){
                  foreach ($vender_offers_three as $key) { ?>
                  <tr id="row_<?php echo $key->id;?>">
                    <td><?php echo $i;  ?></td>
                    <td><?php echo date('m/d/yy',strtotime($key->add_date));  ?></td>
                    <td><?php echo getOfferTypeString($key->offer_type);  ?></td>
                    <td><?php echo $key->main_amount;  ?></td>
                    <td><?php echo $key->offer_amount;  ?></td>
                    <td><?php echo $key->offer_title;  ?></td>
                    <td><?php echo $key->offer_detail;  ?></td>
                    <td><?php echo translateText($key->offer_title) ? translateText($key->offer_title) : $key->offer_title;  ?></td>
                    <td><?php echo translateText($key->offer_detail) ? translateText($key->offer_detail) : $key->offer_detail;  ?></td>
                    <td><?php echo $key->saving_amount;  ?></td>
                    <td><?php echo $key->stoke;  ?></td>
                    <td><?php echo $key->limit_per_user;  ?></td>
                    <td><?php echo date('m/d/yy',strtotime($key->valid_date));  ?></td>
                    <?php if( strtolower($key->status) == 'active'){?>
                    <td><button class="btn btn-info" onclick="changeStatus(<?php echo $key->id; ?>);"><?php echo $key->status; ?></button></td>             
                    <?php }else{
                    ?>
                    <td><button class="btn btn-success" onclick="changeStatus(<?php echo $key->id; ?>);"><?php echo $key->status; ?></button></td>  
                    <?php }?>
                    <td><button class="btn btn-success" onclick="getThiredOffersData('<?php echo $key->id; ?>','<?php echo $vendor_id; ?>');" data-toggle="modal" data-target="#afterbefore_update">update</button></td>
                    <td><span class="text-danger" onclick="deleteRow('<?php echo $key->id; ?>');"><i class="fa fa-close"></i></span></td>
                  </tr>
                  <?php $i++;}  }?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <br/>
      
      <div class="card">
        <div class="card-header">
          <a class="collapsed card-link" data-toggle="collapse" href="#sft">
            Offers Percentage Discount
          </a>
        </div>
        <div id="sft" class="collapse" data-parent="#accordion4">
          <div class="card-body">
            <div class="float-right">
              <button class="btn btn-secondary"  data-toggle="modal" data-target="#Percentage">+ Add</button>
            </div>
            <div class="table-responsive" style="height: auto;">
              <table class="table table-bordered table-hover display" >
                <thead>
                  <tr>
                    <th>#Offer Id</th>
                    <th>Date of Creation</th>
                    <th>Type</th>
                    <th>Percentage</th>
                    <th>Over Price</th>
                    <th>Title En.</th>
                    <th>Description En..</th>
                    <th>Title Ar..</th>
                    <th>Description Ar...</th>
                    <th>Saving Value SR</th>
                    <th>Quantity</th>
                    <th>Limit per user</th>
                    <th>Date of expiry</th>
                    <th>Status</th>
                    <th>Update</th>
                    <th>Remove</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i=1;
                  if(!empty($vender_offers_four)){
                  foreach ($vender_offers_four as $key) { ?>
                  <tr id="row_<?php echo $key->id;?>">
                    <td><?php echo $i;  ?></td>
                    <td><?php echo date('m/d/yy',strtotime($key->add_date));  ?></td>
                    <td><?php echo getOfferTypeString($key->offer_type);  ?></td>
                    <td><?php echo $key->percentage;  ?></td>
                    <td><?php echo $key->main_amount;  ?></td>
                    <td><?php echo $key->offer_title;  ?></td>
                    <td><?php echo $key->offer_detail;  ?></td>
                    <td><?php echo translateText($key->offer_title) ? translateText($key->offer_title) : $key->offer_title;  ?></td>
                    <td><?php echo translateText($key->offer_detail) ? translateText($key->offer_detail) : $key->offer_detail;  ?></td>
                    <td><?php echo $key->saving_amount;  ?></td>
                    <td><?php echo $key->stoke;  ?></td>
                    <td><?php echo $key->limit_per_user;  ?></td>
                    <td><?php echo date('m/d/yy',strtotime($key->valid_date));  ?></td>
                    <?php if( strtolower($key->status) == 'active'){?>
                    <td><button class="btn btn-info" onclick="changeStatus(<?php echo $key->id; ?>);"><?php echo $key->status; ?></button></td>             
                    <?php }else{
                    ?>
                    <td><button class="btn btn-success" onclick="changeStatus(<?php echo $key->id; ?>);"><?php echo $key->status; ?></button></td>  
                    <?php }?>
                    <td><button class="btn btn-success" onclick="getFourthOffersData('<?php echo $key->id; ?>','<?php echo $vendor_id; ?>');" data-toggle="modal" data-target="#percentage_update">update</button></td>
                    <td><span class="text-danger" onclick="deleteRow('<?php echo $key->id; ?>');"><i class="fa fa-close"></i></span></td>
                  </tr>
                  <?php $i++;}  }?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <br/>

      <div class="card">
        <div class="card-header">
          <a class="collapsed card-link" data-toggle="collapse" href="#specl">
            Special Offer
          </a>
        </div>
        <div id="specl" class="collapse" data-parent="#accordion4">
          <div class="card-body">
            <div class="float-right">
              <button class="btn btn-secondary"  data-toggle="modal" data-target="#sploffer">+ Add</button>
            </div>
            <div class="table-responsive" style="height: auto;">
              <table class="table table-bordered table-hover display" >
                <thead>
                  <tr>
                    <th>#Offer Id</th>
                    <th>Date of Creation</th>
                    <th>Type</th>
                    <th>Title En.</th>
                    <th>Description En..</th>
                    <th>Title Ar..</th>
                    <th>Description Ar...</th>
                    <th>Saving Value SR</th>
                    <th>Quantity</th>
                    <th>Limit per user</th>
                    <th>Date of expiry</th>
                    <th>Status</th>
                    <th>Update</th>
                    <th>Remove</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i=1;
                  if(!empty($vender_offers_five)){
                  foreach ($vender_offers_five as $key) { ?>
                  <tr id="row_<?php echo $key->id;?>">
                    <td><?php echo $i;  ?></td>
                    <td><?php echo date('m/d/yy',strtotime($key->add_date));  ?></td>
                    <td><?php echo getOfferTypeString($key->offer_type);  ?></td>
                    <td><?php echo $key->offer_title;  ?></td>
                    <td><?php echo $key->offer_detail;  ?></td>
                    <td><?php echo translateText($key->offer_title) ? translateText($key->offer_title) : $key->offer_title;  ?></td>
                    <td><?php echo translateText($key->offer_detail) ? translateText($key->offer_detail) : $key->offer_detail;  ?></td>
                    <td><?php echo $key->saving_amount;  ?></td>
                    <td><?php echo $key->stoke;  ?></td>
                    <td><?php echo $key->limit_per_user;  ?></td>
                    <td><?php echo date('m/d/yy',strtotime($key->valid_date));  ?></td>
                    <?php if( strtolower($key->status) == 'active'){?>
                    <td><button class="btn btn-info" onclick="changeStatus(<?php echo $key->id; ?>);"><?php echo $key->status; ?></button></td>             
                    <?php }else{
                    ?>
                    <td><button class="btn btn-success" onclick="changeStatus(<?php echo $key->id; ?>);"><?php echo $key->status; ?></button></td>  
                    <?php }?>
                    <td><button class="btn btn-success" onclick="getFifthOffersData('<?php echo $key->id; ?>','<?php echo $vendor_id; ?>');" data-toggle="modal" data-target="#sploffer_update">update</button></td>
                    <td><span class="text-danger" onclick="deleteRow('<?php echo $key->id; ?>');"><i class="fa fa-close"></i></span></td>
                  </tr>
                  <?php $i++;}  }?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
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
<div class="list-item col-md-12 p-0">
  <div class="card o-hidden flex-row mb-4 d-flex">
    <div class="list-thumb d-flex">
      <!-- TUMBNAIL -->
      <img src="../../dist-assets/images/products/headphone-2.jpg" alt="">
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
          <span class="badge badge-primary">New</span>
        </p>
      </div>
    </div>
  </div>
</div>
<div class="list-item col-md-12 p-0">
  <div class="card o-hidden flex-row mb-4 d-flex">
    <div class="list-thumb d-flex">
      <!-- TUMBNAIL -->
      <img src="../../dist-assets/images/products/headphone-3.jpg" alt="">
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
          <span class="badge badge-primary">New</span>
        </p>
      </div>
    </div>
  </div>
</div>
<div class="list-item col-md-12 p-0">
  <div class="card o-hidden flex-row mb-4 d-flex">
    <div class="list-thumb d-flex">
      <!-- TUMBNAIL -->
      <img src="../../dist-assets/images/products/headphone-4.jpg" alt="">
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
          <span class="badge badge-primary">New</span>
        </p>
      </div>
    </div>
  </div>
</div>
</div>
<!-- PAGINATION CONTROL -->
</div>

<!-- Button to Open the Modal -->
  <!-- The Modal offer one-->
  <div class="modal" id="onefreeoffer">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Buy One get One free</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <form action="<?php echo base_url('backend/Manage_vendors/saveOffers/').$vendor_id;?>" method="POST">
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="">Create Date</label>
                  <input type="date" name="create_date" class="form-control" >
                </div>
                <div class="form-group">
                  <label for="">Type</label>
                  <input type="hidden" name="offer_type" value="1">
                  <select class="form-control" name="offer_type" disabled>
                    <?php echo offerType(1);?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Title En.</label>
                  <input type="text" name="title_en" class="form-control" placeholder="Title English" >
                </div>
                <div class="form-group">
                  <label>Description En.</label>
                  <textarea class="form-control" name="desc_en" placeholder="Description En."></textarea>
                </div>
                <div class="form-group">
                  <label for="">Title Ar.</label>
                  <input type="text" name="title_ar" class="form-control" placeholder="Title ar">
                </div>
                <div class="form-group">
                  <label>Description Ar.</label>
                  <textarea class="form-control" name="desc_ar" placeholder="Description Ar."></textarea>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="">Saving Value</label>
                  <input type="text" name="saving_amount" class="form-control" placeholder="Saving Value">
                </div>
                <div class="form-group">
                  <label for="">Quantity</label>
                  <input type="number" name="stoke" class="form-control" placeholder="Quantity">
                </div>
                <div class="form-group">
                  <label for="">Limit per user</label>
                  <input type="number" name="limit_per_user" class="form-control" value="Limit per User">
                </div>
                <div class="form-group">
                  <label for="">Date of Expiry</label>
                  <input type="date" name="valid_date" class="form-control" placeholder="Date of Expiry">
                </div>
                <div class="form-group">
                  <label for="">Status</label>
                  <select class="form-control" name="status">
                    <?php echo status();?>
                  </select>
                </div>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-dark float-right">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- The Modal offer two-->
  <div class="modal" id="voucher">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Offer Voucher</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <form action="<?php echo base_url('backend/Manage_vendors/saveOffers/').$vendor_id;?>" method="POST">
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="">Create Date</label>
                  <input type="date" name="create_date" class="form-control" placeholder="create date" >
                </div>
                <div class="form-group">
                  <label for="">Type</label>
                  <input type="hidden" name="offer_type" value="2">
                  <select class="form-control" name="offer_type" disabled>
                    <?php echo offerType(2);?>
                  </select>
                </div>
                
                <div class="form-group">
                  <label for="">Title En.</label>
                  <input type="text" name="title_en" class="form-control" placeholder="Title En.">
                </div>
                <div class="form-group">
                  <label>Description En.</label>
                  <textarea class="form-control" name="desc_en" placeholder="Description En."></textarea>
                </div>
                <div class="form-group">
                  <label for="">Title Ar.</label>
                  <input type="text" name="title_ar" class="form-control" placeholder="Title ar">
                </div>
                <div class="form-group">
                  <label>Description Ar.</label>
                  <textarea class="form-control" name="desc_ar" placeholder="Description ar"></textarea>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="">For Over Price</label>
                  <input type="text" name="main_amount" id="v_main_amount" class="form-control" placeholder="over price" >
                </div>
                <div class="form-group">
                  <label for="">Voucher Price</label>
                  <input type="text" name="offer_amount" id="v_offer_amount" class="form-control" placeholder="Voucher Price">
                </div>
                <div class="form-group">
                  <label for="">Saving Value</label>
                  <input type="text" name="saving_amount" id="v_saving_amount" class="form-control" placeholder="Saving Value" readonly>
                </div>
                <div class="form-group">
                  <label for="">quantity</label>
                  <input type="number" name="stoke" class="form-control" placeholder="Quantity">
                </div>
                <div class="form-group">
                  <label for="">Limit per user</label>
                  <input type="number" name="limit_per_user" class="form-control" placeholder="Limit per User">
                </div>
                <div class="form-group">
                  <label for="">Date of Expiry</label>
                  <input type="date" name="valid_date" class="form-control" placeholder="Date of expire">
                </div>
                <div class="form-group">
                  <label for="">Status</label>
                  <select class="form-control" name="status">
                        <?php echo status();?>
                  </select>
                </div>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-dark float-right">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- The Modal offer three-->
  <div class="modal" id="afterbefore">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Offer before & After</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <form action="<?php echo base_url('backend/Manage_vendors/saveOffers/').$vendor_id;?>" method="POST">
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="">Create Date</label>
                  <input type="date" name="create_date" class="form-control" placeholder="Create date">
                </div>
                <div class="form-group">
                  <label for="">Type</label>
                  <input type="hidden" name="offer_type" value="3">
                  <select class="form-control" name="offer_type" disabled>
                    <?php echo offerType(3);?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Title En.</label>
                  <input type="text" name="title_en" class="form-control" placeholder="Title En." >
                </div>
                <div class="form-group">
                  <label>Description En.</label>
                  <textarea class="form-control" name="desc_en" placeholder="Description En"></textarea>
                </div>
                <div class="form-group">
                  <label for="">Title Ar.</label>
                  <input type="text" name="title_ar" class="form-control" placeholder="Title ar">
                </div>
                <div class="form-group">
                  <label>Description Ar.</label>
                  <textarea class="form-control" name="desc_ar" placeholder="Description ar"></textarea>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="">Before Price</label>
                  <input type="text" name="main_amount" id="ba_main_amount" class="form-control" placeholder="Before Price" >
                </div>
                <div class="form-group">
                  <label for="">After price</label>
                  <input type="text" name="offer_amount" id="ba_offer_amount" class="form-control" placeholder="After price">
                </div>
                <div class="form-group">
                  <label for="">Saving Value</label>
                  <input type="text" name="saving_amount" id="ba_saving_amount" class="form-control" placeholder="saving value" readonly>
                </div>
                <div class="form-group">
                  <label for="">quantity</label>
                  <input type="number" name="stoke" class="form-control" placeholder="Quantity">
                </div>
                <div class="form-group">
                  <label for="">Limit per user</label>
                  <input type="number" name="limit_per_user" class="form-control" placeholder="Limit per user">
                </div>
                <div class="form-group">
                  <label for="">Date of Expiry</label>
                  <input type="date" name="valid_date" class="form-control" value="Date of Expiry">
                </div>
                <div class="form-group">
                  <label for="">Status</label>
                  <select class="form-control" name="status">
                    <?php echo status();?>
                  </select>
                </div>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-dark float-right">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- The Modal offer four-->
  <div class="modal" id="Percentage">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Offers Percentage Discount</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <form action="<?php echo base_url('backend/Manage_vendors/saveOffers/').$vendor_id;?>" method="POST">
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="">Create Date</label>
                  <input type="date" name="create_date" class="form-control" >
                </div>
                <div class="form-group">
                  <label for="">Type</label>
                  <input type="hidden" name="offer_type" value="4" >
                  <select class="form-control" name="offer_type" disabled>
                    <?php echo offerType(4);?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Title En.</label>
                  <input type="text" name="title_en" class="form-control" placeholder="Title En">
                </div>
                <div class="form-group">
                  <label>Description En.</label>
                  <textarea class="form-control" name="desc_en" placeholder="Description En"></textarea>
                </div>
                <div class="form-group">
                  <label for="">Title Ar.</label>
                  <input type="text" name="title_ar" class="form-control" placeholder="Title ar">
                </div>
                <div class="form-group">
                  <label>Description Ar.</label>
                  <textarea class="form-control" name="desc_ar" placeholder="Description ar"></textarea>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="">Over Price</label>
                  <input type="text" name="main_amount" id="p_main_amount" class="form-control" placeholder="Over Price">
                </div>
                <div class="form-group">
                  <label for="">Percentage</label>
                  <input type="text" name="percentage" id="p_percentage" class="form-control" placeholder="Percantage" >
                </div>
                <div class="form-group">
                  <label for="">Saving Value</label>
                  <input type="text" name="saving_amount" id="p_saving_amount" class="form-control" placeholder="saving value" readonly>
                </div>
                <div class="form-group">
                  <label for="">quantity</label>
                  <input type="number" name="stoke" class="form-control" placeholder="quantity">
                </div>
                <div class="form-group">
                  <label for="">Limit per user</label>
                  <input type="number" name="limit_per_user" class="form-control" placeholder="limit_per_user">
                </div>
                <div class="form-group">
                  <label for="">Date of Expiry</label>
                  <input type="date" name="valid_date" class="form-control" placeholder="Date of Expiry">
                </div>
                <div class="form-group">
                  <label for="">Status</label>
                  <select class="form-control" name="status">
                    <?php echo status();?>
                  </select>
                </div>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-dark float-right">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- The Modal offer five-->
  <div class="modal" id="sploffer">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Special Offer</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <form action="<?php echo base_url('backend/Manage_vendors/saveOffers/').$vendor_id;?>" method="POST">
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="">Create Date</label>
                  <input type="date" name="create_date" class="form-control" placeholder="Create date">
                </div>
                <div class="form-group">
                  <label for="">Type</label>
                  <input type="hidden" name="offer_type" value="5">
                  <select class="form-control" name="offer_type" disabled>
                    <?php echo offerType(5);?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Title En.</label>
                  <input type="text" name="title_en" class="form-control" placeholder="Title En.">
                </div>
                <div class="form-group">
                  <label>Description En.</label>
                  <textarea class="form-control" name="desc_en" placeholder="Description En."></textarea>
                </div>
                <div class="form-group">
                  <label for="">Title Ar.</label>
                  <input type="text" name="title_ar" class="form-control" placeholder="Title Ar.">
                </div>
                <div class="form-group">
                  <label>Description Ar.</label>
                  <textarea class="form-control" name="desc_ar" placeholder="Description Ar."></textarea>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="">Saving Value</label>
                  <input type="text" name="saving_amount" class="form-control" placeholder="Saving Value">
                </div>
                <div class="form-group">
                  <label for="">quantity</label>
                  <input type="number" name="stoke" class="form-control" placeholder="Quantity">
                </div>
                <div class="form-group">
                  <label for="">Limit per user</label>
                  <input type="number" name="limit_per_user" class="form-control" placeholder="limit per user">
                </div>
                <div class="form-group">
                  <label for="">Date of Expiry</label>
                  <input type="date" name="valid_date" class="form-control" placeholder="Date of Expiry">
                </div>
                <div class="form-group">
                  <label for="">Status</label>
                  <select class="form-control" name="status">
                    <?php echo status();?>
                  </select>
                </div>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-dark float-right">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- The modal for update offer one -->
  <div class="modal" id="onefreeoffer_update">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Buy One get One free</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <form action="<?php echo base_url('backend/Manage_vendors/updateOffersInfo/').$vendor_id;?>" method="POST">
            <div class="row">
              <div class="col-6">
                <input type="hidden" name="offer_id" id="offerId_1">
                <input type="hidden" name="vendor_id" id="vendorId_1">
                <div class="form-group">
                  <label for="">Create Date</label>
                  <input type="date" name="create_date" id="create_dt_1" class="form-control" >
                </div>
                <div class="form-group">
                  <label for="">Type</label>
                  <input type="hidden" name="offer_type" value="1">
                  <select class="form-control" name="offer_type" disabled>
                    <?php echo offerType(1);?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Title En.</label>
                  <input type="text" name="title_en" id="title_en_1" value="" class="form-control" >
                </div>
                <div class="form-group">
                  <label>Description En.</label>
                  <textarea class="form-control" name="desc_en" id="desc_en_1"></textarea>
                </div>
                <div class="form-group">
                  <label for="">Title Ar.</label>
                  <input type="text" name="title_ar" id="title_ar_1" class="form-control" value="" placeholder="title_ar">
                </div>
                <div class="form-group">
                  <label>Description Ar.</label>
                  <textarea class="form-control" name="desc_ar" id="desc_ar_1"></textarea>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="">Saving Value</label>
                  <input type="text" name="saving_amount" id="saving_amount_1" class="form-control" value="">
                </div>
                <div class="form-group">
                  <label for="">quantity</label>
                  <input type="number" name="stoke" id="stoke_1" class="form-control" value="">
                </div>
                <div class="form-group">
                  <label for="">Limit per user</label>
                  <input type="number" name="limit_per_user" id="limit_1" class="form-control" value="">
                </div>
                <div class="form-group">
                  <label for="">Date of Expiry</label>
                  <input type="date" name="valid_date" id="valid_date_1" class="form-control" value="">
                </div>
                <div class="form-group">
                  <label for="">Status</label>
                  <select class="form-control" name="status" id="status_1">
                    <?php echo status();?>
                  </select>
                </div>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-dark float-right">Update</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- The Modal update offer two-->
  <div class="modal" id="voucher_update">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Offer Voucher</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <form action="<?php echo base_url('backend/Manage_vendors/updateOffersInfo');?>" method="POST">
            <div class="row">
              <div class="col-6">
                <input type="hidden" name="offer_id" id="offerId_2" value="">
                <input type="hidden" name="vendor_id" id="vendorId_2" value="">
                <div class="form-group">
                  <label for="">Create Date</label>
                  <input type="date" value="" name="create_date" id="create_dt_2" class="form-control" placeholder="create date" >
                </div>
                <div class="form-group">
                  <label for="">Type</label>
                  <input type="hidden" name="offer_type" value="2">
                  <select class="form-control" name="offer_type" disabled>
                    <?php echo offerType(2);?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Title En.</label>
                  <input type="text" value="" name="title_en" id="title_en_2" class="form-control" placeholder="Title En.">
                </div>
                <div class="form-group">
                  <label>Description En.</label>
                  <textarea class="form-control" name="desc_en" id="desc_en_2" placeholder="Description En."></textarea>
                </div>
                <div class="form-group">
                  <label for="">Title Ar.</label>
                  <input type="text" name="title_ar" value="" id="title_ar_2" class="form-control" placeholder="Title ar">
                </div>
                <div class="form-group">
                  <label>Description Ar.</label>
                  <textarea class="form-control" name="desc_ar" id="desc_ar_2" placeholder="Description ar"></textarea>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="">For Over Price</label>
                  <input type="text" value="" name="main_amount" id="main_amount_2" class="form-control" placeholder="over price" >
                </div>
                <div class="form-group">
                  <label for="">Voucher Price</label>
                  <input type="text" value="" name="offer_amount" id="offer_amount_2" class="form-control" placeholder="Voucher Price">
                </div>
                <div class="form-group">
                  <label for="">Saving Value</label>
                  <input type="text" value="" name="saving_amount" id="saving_amount_2" class="form-control" placeholder="Saving Value" readonly>
                </div>
                <div class="form-group">
                  <label for="">quantity</label>
                  <input type="number" value="" name="stoke" id="stoke_2" class="form-control" placeholder="Quantity">
                </div>
                <div class="form-group">
                  <label for="">Limit per user</label>
                  <input type="number" value="" name="limit_per_user" id="limit_2" class="form-control" placeholder="Limit per User">
                </div>
                <div class="form-group">
                  <label for="">Date of Expiry</label>
                  <input type="date" value="" name="valid_date" id="valid_date_2" class="form-control" placeholder="Date of expire">
                </div>
                <div class="form-group">
                  <label for="">Status</label>
                  <select class="form-control" name="status" id="status_2" >
                        <?php echo status();?>
                  </select>
                </div>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-dark float-right">Update</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- The Modal update offer three-->
  <div class="modal" id="afterbefore_update">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Offer before & After</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <form action="<?php echo base_url('backend/Manage_vendors/updateOffersInfo');?>" method="POST">
            <div class="row">
              <div class="col-6">
                <input type="hidden" name="offer_id" id="offerId_3" value="">
                <input type="hidden" name="vendor_id" id="vendorId_3" value="">
                <div class="form-group">
                  <label for="">Create Date</label>
                  <input type="date" name="create_date" id="create_dt_3" class="form-control" placeholder="Create date">
                </div>
                <div class="form-group">
                  <label for="">Type</label>
                  <input type="hidden" name="offer_type" value="3">
                  <select class="form-control" name="offer_type" disabled>
                    <?php echo offerType(3);?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Title En.</label>
                  <input type="text" name="title_en" id="title_en_3" value="" class="form-control" placeholder="Title En." >
                </div>
                <div class="form-group">
                  <label>Description En.</label>
                  <textarea class="form-control" id="desc_en_3"  name="desc_en" placeholder="Description En"></textarea>
                </div>
                <div class="form-group">
                  <label for="">Title Ar.</label>
                  <input type="text" name="title_ar" id="title_ar_3" value="" class="form-control" placeholder="Title ar">
                </div>
                <div class="form-group">
                  <label>Description Ar.</label>
                  <textarea class="form-control" id="desc_ar_3" name="desc_ar" placeholder="Description ar"></textarea>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="">Before Price</label>
                  <input type="text" id="main_amount_3" value="" name="main_amount" class="form-control" placeholder="Before Price" >
                </div>
                <div class="form-group">
                  <label for="">After price</label>
                  <input type="text" name="offer_amount" id="offer_amount_3" value="" class="form-control" placeholder="After price">
                </div>
                <div class="form-group">
                  <label for="">Saving Value</label>
                  <input type="text" name="saving_amount" id="saving_amount_3" value="" class="form-control" placeholder="saving value" readonly>
                </div>
                <div class="form-group">
                  <label for="">quantity</label>
                  <input type="number" name="stoke" id="stoke_3" value="" class="form-control" placeholder="Quantity">
                </div>
                <div class="form-group">
                  <label for="">Limit per user</label>
                  <input type="number" name="limit_per_user" id="limit_3" value="" class="form-control" placeholder="Limit per user">
                </div>
                <div class="form-group">
                  <label for="">Date of Expiry</label>
                  <input type="date" name="valid_date" id="valid_date_3" value="" class="form-control" value="Date of Expiry">
                </div>
                <div class="form-group">
                  <label for="">Status</label>
                  <select class="form-control" name="status" id="status_3">
                    <?php echo status();?>
                  </select>
                </div>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-dark float-right">Update</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- The Modal update offer four-->
  <div class="modal" id="percentage_update">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Offers Percentage Discount</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <form action="<?php echo base_url('backend/Manage_vendors/updateOffersInfo');?>" method="POST">
            <div class="row">
              <div class="col-6">
                <input type="hidden" name="offer_id" id="offerId_4" value="">
                <input type="hidden" name="vendor_id" id="vendorId_4" value="">
                <div class="form-group">
                  <label for="">Create Date</label>
                  <input type="date" name="create_date" id="create_dt_4" value="" class="form-control" >
                </div>
                <div class="form-group">
                  <label for="">Type</label>
                  <input type="hidden" name="offer_type" value="4" >
                  <select class="form-control" name="offer_type" disabled>
                    <?php echo offerType(4);?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Title En.</label>
                  <input type="text" name="title_en" id="title_en_4" value="" class="form-control" placeholder="Title En">
                </div>
                <div class="form-group">
                  <label>Description En.</label>
                  <textarea class="form-control" name="desc_en" id="desc_en_4" placeholder="Description En"></textarea>
                </div>
                <div class="form-group">
                  <label for="">Title Ar.</label>
                  <input type="text" name="title_ar" id="title_ar_4" value="" class="form-control" placeholder="Title ar">
                </div>
                <div class="form-group">
                  <label>Description Ar.</label>
                  <textarea class="form-control" name="desc_ar" id="desc_ar_4" placeholder="Description ar"></textarea>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="">Over Price</label>
                  <input type="text" name="main_amount" id="main_amount_4" value="" class="form-control" placeholder="Over Price">
                </div>
                <div class="form-group">
                  <label for="">Percentage</label>
                  <input type="text" name="percentage" id="percentage_4" value="" class="form-control" placeholder="Percantage" >
                </div>
                <div class="form-group">
                  <label for="">Saving Value</label>
                  <input type="text" name="saving_amount" id="saving_amount_4" value="" class="form-control" placeholder="saving value" readonly>
                </div>
                <div class="form-group">
                  <label for="">quantity</label>
                  <input type="number" name="stoke" id="stoke_4" value="" class="form-control" placeholder="quantity">
                </div>
                <div class="form-group">
                  <label for="">Limit per user</label>
                  <input type="number" name="limit_per_user" id="limit_4" value="" class="form-control" placeholder="limit_per_user">
                </div>
                <div class="form-group">
                  <label for="">Date of Expiry</label>
                  <input type="date" name="valid_date" id="valid_date_4" class="form-control" placeholder="Date of Expiry">
                </div>
                <div class="form-group">
                  <label for="">Status</label>
                  <select class="form-control" name="status" id="status_4">
                    <?php echo status();?>
                  </select>
                </div>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-dark float-right">Update</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- The Modal update offer five-->
  <div class="modal" id="sploffer_update">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Special Offer</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <form action="<?php echo base_url('backend/Manage_vendors/updateOffersInfo');?>" method="POST">
            <div class="row">
              <div class="col-6">
                <input type="hidden" name="offer_id" id="offerId_5" value="">
                <input type="hidden" name="vendor_id" id="vendorId_5" value="">
                <div class="form-group">
                  <label for="">Create Date</label>
                  <input type="date" name="create_date" id="create_dt_5" value="" class="form-control" placeholder="Create date">
                </div>
                <div class="form-group">
                  <label for="">Type</label>
                  <input type="hidden" name="offer_type" id="offer_type_5" value="5">
                  <select class="form-control" name="offer_type" disabled>
                    <?php echo offerType(5);?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Title En.</label>
                  <input type="text" name="title_en" id="title_en_5" value="" class="form-control" placeholder="Title En.">
                </div>
                <div class="form-group">
                  <label>Description En.</label>
                  <textarea class="form-control" name="desc_en" id="desc_en_5" placeholder="Description En."></textarea>
                </div>
                <div class="form-group">
                  <label for="">Title Ar.</label>
                  <input type="text" name="title_ar" id="title_ar_5" value="" class="form-control" placeholder="Title Ar.">
                </div>
                <div class="form-group">
                  <label>Description Ar.</label>
                  <textarea class="form-control" name="desc_ar" id="desc_ar_5" placeholder="Description Ar."></textarea>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="">Saving Value</label>
                  <input type="text" name="saving_amount" id="saving_amount_5" value="" class="form-control" placeholder="Saving Value">
                </div>
                <div class="form-group">
                  <label for="">quantity</label>
                  <input type="number" name="stoke" id="stoke_5" value="" class="form-control" placeholder="Quantity">
                </div>
                <div class="form-group">
                  <label for="">Limit per user</label>
                  <input type="number" name="limit_per_user" id="limit_5" value="" class="form-control" placeholder="limit per user">
                </div>
                <div class="form-group">
                  <label for="">Date of Expiry</label>
                  <input type="date" name="valid_date" id="valid_date_5" value="" class="form-control" placeholder="Date of Expiry">
                </div>
                <div class="form-group">
                  <label for="">Status</label>
                  <select class="form-control" name="status" id="status_5">
                    <?php echo status();?>
                  </select>
                </div>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-dark float-right">Update</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- The Modal -->
  <div class="modal" id="contacts">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Contacts</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <form action="">
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="">Title</label>
                  <input type="text" name="title" class="form-control" value="title">
                </div>
                <div class="form-group">
                  <label for="">Name</label>
                  <input type="text" name="Name" class="form-control" value="Name">
                </div>
                <div class="form-group">
                  <label for="">Mobile</label>
                  <input type="number" name="Name" class="form-control" value="Mobile">
                </div>
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control">
                    <option>Active</option>
                    <option>Inactive</option>
                  </select>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="">Email</label>
                  <input type="email" name="Name" class="form-control" value="email">
                </div>
                <div class="form-group">
                  <label for="">Note</label>
                  <textarea class="form-control" cols="5" rows="5"></textarea>
                </div>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-dark float-right">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<!-- Button to Open the Modal -->

<script>
    // script for change status
    var changeStatus = function(id){
			var get = confirm("Want to change status?");
			if(get){
				var url =  '<?php echo base_url(); ?>backend/Manage_vendors/changeStatus';
				$.ajax({
					type : 'POST',
					url : url,
					data : {id:id,tbl:'vendor_offers',col_name:'id'},
				})
				.done(function(result){
					location.reload(true);
				});
			}
		}
    // script for delete offers
		var deleteRow = function(id) {
			var result = confirm("Want to delete?");
			if (result) {
			  var url = '<?php echo base_url(); ?>backend/Manage_vendors/delete_row';  
				$.ajax({
					type: "POST",
					url: url,
					data: {id: id,tbl:'vendor_offers',col_name:'id'},
				})
				.done(function(result){
					var result = JSON.parse(result);
					if( parseInt(result.status) == 1 ) {
						$('#row_'+id).hide();
					}
					var message = result.message;
					alert(message);
				}); 
			}
		};
    // script code for update offer type one
		var getOffersData = function(offerId,vandorId){
			$.ajax({
				type:'POST',
				url:'<?php echo base_url(); ?>backend/Manage_vendors/getOffersInfo',
				data :{offerId:offerId,vandorId:vandorId},
				success:function(data){
          var getInfo = JSON.parse(data);
          // console.log(Object.values(getInfo.result));
          $("#offerId_1").val(getInfo.result[0].id);
          $("#vendorId_1").val(getInfo.result[0].vendor_id);
          $("#create_dt_1").val(getInfo.result[0].add_date);
          $("#type_1").val(getInfo.result[0].offer_type);
          $("#title_en_1").val(getInfo.result[0].offer_title_en);
          $("#desc_en_1").val(getInfo.result[0].offer_detail_en);
          $("#title_ar_1").val(getInfo.result[0].offer_title_ar);
          $("#desc_ar_1").val(getInfo.result[0].offer_detail_ar);
          $("#saving_amount_1").val(getInfo.result[0].saving_amount);
          $("#stoke_1").val(getInfo.result[0].stoke);
          $("#valid_date_1").val(getInfo.result[0].valid_date);
          $("#status_1").val(getInfo.result[0].status);
          $("#limit_1").val(getInfo.result[0].limit_per_user);   
				}
			});
		} 

    // script code for update offer type two
		var getSecondOffersData = function(offerId,vandorId){
			$.ajax({
				type:'POST',
				url:'<?php echo base_url(); ?>backend/Manage_vendors/getOffersInfo',
				data :{offerId:offerId,vandorId:vandorId},
				success:function(data){
          var getInfo = JSON.parse(data);
          // console.log(Object.values(getInfo.result));
          $("#offerId_2").val(getInfo.result[0].id);
          $("#vendorId_2").val(getInfo.result[0].vendor_id);
          $("#create_dt_2").val(getInfo.result[0].add_date);
          $("#type_2").val(getInfo.result[0].offer_type);
          $("#title_en_2").val(getInfo.result[0].offer_title_en);
          $("#desc_en_2").val(getInfo.result[0].offer_detail_en);
          $("#title_ar_2").val(getInfo.result[0].offer_title_ar);
          $("#desc_ar_2").val(getInfo.result[0].offer_detail_ar);
          $("#saving_amount_2").val(getInfo.result[0].saving_amount);
          $("#stoke_2").val(getInfo.result[0].stoke);
          $("#valid_date_2").val(getInfo.result[0].valid_date);
          $("#status_2").val(getInfo.result[0].status);
          $("#limit_2").val(getInfo.result[0].limit_per_user);
          $("#main_amount_2").val(getInfo.result[0].main_amount);
          $("#offer_amount_2").val(getInfo.result[0].offer_amount);   
				}
			});
		}

    // script code for update offer type three
		var getThiredOffersData = function(offerId,vandorId){
			$.ajax({
				type:'POST',
				url:'<?php echo base_url(); ?>backend/Manage_vendors/getOffersInfo',
				data :{offerId:offerId,vandorId:vandorId},
				success:function(data){
          var getInfo = JSON.parse(data);
          // console.log(Object.values(getInfo.result));
          $("#offerId_3").val(getInfo.result[0].id);
          $("#vendorId_3").val(getInfo.result[0].vendor_id);
          $("#create_dt_3").val(getInfo.result[0].add_date);
          $("#type_3").val(getInfo.result[0].offer_type);
          $("#title_en_3").val(getInfo.result[0].offer_title_en);
          $("#desc_en_3").val(getInfo.result[0].offer_detail_en);
          $("#title_ar_3").val(getInfo.result[0].offer_title_ar);
          $("#desc_ar_3").val(getInfo.result[0].offer_detail_ar);
          $("#saving_amount_3").val(getInfo.result[0].saving_amount);
          $("#stoke_3").val(getInfo.result[0].stoke);
          $("#valid_date_3").val(getInfo.result[0].valid_date);
          $("#status_3").val(getInfo.result[0].status);
          $("#limit_3").val(getInfo.result[0].limit_per_user);
          $("#main_amount_3").val(getInfo.result[0].main_amount);
          $("#offer_amount_3").val(getInfo.result[0].offer_amount); 
				}
			});
		} 

    // script code for update offer type four
		var getFourthOffersData = function(offerId,vandorId){
			$.ajax({
				type:'POST',
				url:'<?php echo base_url(); ?>backend/Manage_vendors/getOffersInfo',
				data :{offerId:offerId,vandorId:vandorId},
				success:function(data){
          var getInfo = JSON.parse(data);
          // console.log(Object.values(getInfo.result));
          // $("#type_4").val(getInfo.result[0].offer_type);
          $("#offerId_4").val(getInfo.result[0].id);
          $("#vendorId_4").val(getInfo.result[0].vendor_id);
          $("#create_dt_4").val(getInfo.result[0].add_date);
          $("#title_en_4").val(getInfo.result[0].offer_title_en);
          $("#desc_en_4").val(getInfo.result[0].offer_detail_en);
          $("#title_ar_4").val(getInfo.result[0].offer_title_ar);
          $("#desc_ar_4").val(getInfo.result[0].offer_detail_ar);
          $("#saving_amount_4").val(getInfo.result[0].saving_amount);
          $("#stoke_4").val(getInfo.result[0].stoke);
          $("#valid_date_4").val(getInfo.result[0].valid_date);
          $("#status_4").val(getInfo.result[0].status);
          $("#limit_4").val(getInfo.result[0].limit_per_user);
          $("#percentage_4").val(getInfo.result[0].percentage);
          $("#main_amount_4").val(getInfo.result[0].main_amount);
				}
			});
		} 

    // script code for update offer type fifth
		var getFifthOffersData = function(offerId,vandorId){
			$.ajax({
				type:'POST',
				url:'<?php echo base_url(); ?>backend/Manage_vendors/getOffersInfo',
				data :{offerId:offerId,vandorId:vandorId},
				success:function(data){
          var getInfo = JSON.parse(data);
          // console.log(Object.values(getInfo.result));
          $("#offerId_5").val(getInfo.result[0].id);
          $("#vendorId_5").val(getInfo.result[0].vendor_id);
          $("#create_dt_5").val(getInfo.result[0].add_date);
          // $("#type_5").val(getInfo.result[0].offer_type);
          $("#title_en_5").val(getInfo.result[0].offer_title_en);
          $("#desc_en_5").val(getInfo.result[0].offer_detail_en);
          $("#title_ar_5").val(getInfo.result[0].offer_title_ar);
          $("#desc_ar_5").val(getInfo.result[0].offer_detail_ar);
          $("#saving_amount_5").val(getInfo.result[0].saving_amount);
          $("#stoke_5").val(getInfo.result[0].stoke);
          $("#valid_date_5").val(getInfo.result[0].valid_date);
          $("#status_5").val(getInfo.result[0].status);
          $("#limit_5").val(getInfo.result[0].limit_per_user);
          // $("#percentage_5").val(getInfo.result[0].percentage);
          // $("#main_amount_5").val(getInfo.result[0].main_amount); 
				}
			});
		} 

    // script code for calculate voucher offer
    $("#v_offer_amount").on('change',function() {
      var v_main_amount = $("#v_main_amount").val();
      var v_offer_amount = $("#v_offer_amount").val();
      var total = "";
      if(v_main_amount == ""){
        $("#v_offer_amount").val("");
        alert("Please enter For Over Price before Voucher Price.");
      } else {
        total = v_main_amount - v_offer_amount;
        $("#v_saving_amount").val(total);
      }
    });
    $("#v_main_amount").on('change',function() {
      $("#v_offer_amount").val('');
      $("#v_saving_amount").val('');
    });
    $("#offer_amount_2").on('change',function() {
      var v_main_amount = $("#main_amount_2").val();
      var v_offer_amount = $("#offer_amount_2").val();
      var total = "";
      if(v_main_amount == ""){
        $("#offer_amount_2").val("");
        alert("Please enter For Over Price before Voucher Price.");
      } else {
        total = v_main_amount - v_offer_amount;
        $("#saving_amount_2").val(total);
      }
    });
    $("#main_amount_2").on('change',function() {
      $("#offer_amount_2").val('');
      $("#saving_amount_2").val('');
    });

    // script code for calculate before&after offer
    $("#ba_offer_amount").on('change',function() {
      var v_main_amount = $("#ba_main_amount").val();
      var v_offer_amount = $("#ba_offer_amount").val();
      var total = "";
      if(v_main_amount == ""){
        $("#ba_offer_amount").val("");
        alert("Please enter Before Price before After Price.");
      } else {
        total = v_main_amount - v_offer_amount;
        $("#ba_saving_amount").val(total);
      }
    });
    $("#ba_main_amount").on('change',function() {
      $("#ba_offer_amount").val('');
      $("#ba_saving_amount").val('');
    });
    $("#offer_amount_3").on('change',function() {
      var v_main_amount = $("#main_amount_3").val();
      var v_offer_amount = $("#offer_amount_3").val();
      var total = "";
      if(v_main_amount == ""){
        $("#offer_amount_3").val("");
        alert("Please enter Before Price before After Price.");
      } else {
        total = v_main_amount - v_offer_amount;
        $("#saving_amount_3").val(total);
      }
    });
    $("#main_amount_3").on('change',function() {
      $("#offer_amount_3").val('');
      $("#saving_amount_3").val('');
    });
 
    // script code for calculate percentage offer
    $("#p_percentage").on('change',function() {
      var v_main_amount = $("#p_main_amount").val();
      var v_offer_amount = $("#p_percentage").val();
      var total = "";
      if(v_main_amount == ""){
        $("#p_percentage").val("");
        alert("Please enter Before Price before After Price.");
      } else {
        total =  v_main_amount * v_offer_amount;
        // total = v_main_amount - v_offer_amount;
        $("#p_saving_amount").val(total);
      }
    });
    $("#p_main_amount").on('change',function() {
      $("#p_offer_amount").val('');
      $("#p_saving_amount").val('');
    });
    $("#offer_amount_4").on('change',function() {
      var v_main_amount = $("#main_amount_4").val();
      var v_offer_amount = $("#offer_amount_4").val();
      var total = "";
      if(v_main_amount == ""){
        $("#offer_amount_4").val("");
        alert("Please enter Before Price before After Price.");
      } else {
        total =  v_main_amount * offer_amount_4;
        // total = main_amount_4 - v_offer_amount;
        $("#saving_amount_4").val(total);
      }
    });
    $("#main_amount_4").on('change',function() {
      $("#offer_amount_4").val('');
      $("#saving_amount_4").val('');
    });

</script>

<script type="text/javascript">
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#imagePreview').css('background-image', 'url('+e.target.result +')');
        $('#imagePreview').hide();
        $('#imagePreview').fadeIn(650);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $("#imageUpload").change(function() {
    readURL(this);
  });

  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#imagePreview1').css('background-image', 'url('+e.target.result +')');
        $('#imagePreview1').hide();
        $('#imagePreview1').fadeIn(650);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $("#imageUpload1").change(function() {
    readURL(this);
  });
</script>