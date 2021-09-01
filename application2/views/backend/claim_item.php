<?php //include 'header.php';?>
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
  div#example_wrapper > .row:first-child {
    top:70px!important;

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
        <li>Claim Item</li>
      </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <div id="accordion4">
      
      <div class="card">
        <div class="card-header">
          <a class="card-link" data-toggle="collapse" href="#u88">
            Claimed Offers
          </a>
        </div>
        <div id="u88" class="collapse" data-parent="#accordion4">
          <div class="card-body">
            <div class="table-responsive" style="height: auto;">
              <table class="table table-bordered table-hover display">
                <thead>
                  <tr>
                    <th>voucher code</th>
                    <th>Claimed Date</th>
                    <th>City</th>
                    <th>Branch</th>
                    <th>Offer Type</th>
                    <th>Offer Title Eng</th>
                    <th>User Name</th>
                    <th>Saving</th>
                    <!-- <th>Update</th> -->
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $i = 1;
                    if(!empty($claimed_offers)){
                      foreach($claimed_offers as $offerVal){
                  ?>
                  <tr>
                    <td><?php echo $offerVal['voucher_code']; ?></td>
                    <td><?php echo date('m/d/yy', $offerVal['claimed_date']); ?></td>
                    <td><?php echo $offerVal['city_name;'] ?></td>
                    <td><?php echo $offerVal['branch_name']; ?></td>
                    <td><?php echo getOfferTypeString($offerVal['offer_type']); ?></td>
                    <td><?php echo $offerVal['offer_title']; ?></td>
                    <td><?php echo $offerVal['user_name']; ?></td>
                    <td><?php echo $offerVal['saving_amount']; ?></td>
                    <!-- <td><button class="btn btn-success" data-target="#item1" data-toggle="modal">Update</button></td> -->
                  </tr>
                  <?php $i++; }}?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      
      <br/>
      
      <div class="card">
        <div class="card-header">
          <a class="collapsed card-link" data-toggle="collapse" href="#i88">
            Claimed Gift
          </a>
        </div>
        <div id="i88" class="collapse" data-parent="#accordion4">
          <div class="card-body">
            <div class="table-responsive" style="height: auto;">
              <table class="table table-bordered table-hover display">
                <thead>
                  <tr>
                    <th>voucher code</th>
                    <th>Won Date</th>
                    <th>Claimed Date</th>
                    <th>City</th>
                    <th>Branch</th>
                    <th>Title En.</th>
                    <th>User Name</th>
                    <th>Saving</th>
                    <!-- <th>Update</th> -->
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $i = 1;
                    if(!empty($claimed_gifts)){
                      foreach($claimed_gifts as $giftVal){
                  ?>
                  <tr>
                    <td><?php echo $giftVal['voucher_code']; ?></td>
                    <td><?php echo date('m/d/yy', $giftVal['create_date']); ?></td>
                    <td><?php echo date('m/d/yy',$giftVal['update_date']); ?></td>
                    <td><?php echo $giftVal['city_name']; ?></td>
                    <td><?php echo $giftVal['branch_name']; ?></td>
                    <td><?php echo $giftVal['gift_name']; ?></td>
                    <td><?php echo $giftVal['user_name']; ?></td>
                    <td><?php echo $giftVal['value']; ?></td>
                    <!-- <td><a href="#item2" class="btn btn-success" data-toggle="modal">Update</a></td> -->
                  </tr>
                  <?php $i++; }}?>
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
            Not Claimed Gift
          </a>
        </div>
        <div id="y66" class="collapse" data-parent="#accordion4">
          <div class="card-body">
            <div class="table-responsive" style="height: auto;">
              <table class="table table-bordered table-hover display">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Won Date</th>
                    <th>Title En.</th>
                    <th>User Name</th>
                    <th>Value</th>
                    <th>Date Of Expiry</th>
                    <!-- <th>Update</th> -->
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $i = 1;
                    if(!empty($no_claimed_gifts)){
                      // echo "<pre>";print_r($no_claimed_gifts);die;
                      foreach($no_claimed_gifts as $noGiftVal){
                  ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo date('m/d/yy',$noGiftVal['create_date']); ?></td>
                    <td><?php echo ucwords($noGiftVal['gift_name']); ?></td>
                    <td><?php echo ucwords($noGiftVal['user_name']); ?></td>
                    <td><?php echo $noGiftVal['value']; ?></td>
                    <td><?php echo date('m/d/yy', strtotime($noGiftVal['expire_date'])); ?></td>
                    <!-- <td><a href="#item3" class="btn btn-success" data-toggle="modal">Update</a></td> -->
                  </tr>
                  <?php $i++; }}?>
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
            Inventory Summary
          </a>
        </div>
        <div id="sft" class="collapse" data-parent="#accordion4">
          <div class="card-body">
            <div class="table-responsive" style="height: auto;">
              <table class="table table-bordered table-hover display">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Date of Creation</th>
                    <th>Date Of Expiry</th>
                    <th>Title En.</th>
                    <th>Value</th>
                    <th>Quantity</th>
                    <th>Claimed</th>
                    <th>Not Claimed</th>
                    <th>Remaining</th>
                    <!-- <th>Update</th> -->
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $i = 1;
                    if(!empty($inventory_summary)){
                      foreach ($inventory_summary as $keyValue) {
                  ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $keyValue['create_date']; ?></td>
                    <td><?php echo $keyValue['expiry_date']; ?></td>
                    <td><?php echo $keyValue['title']; ?></td>
                    <td><?php echo $keyValue['value']; ?></td>
                    <td><?php echo $keyValue['quantity']; ?></td>
                    <td><?php echo $keyValue['claimed_count']; ?></td>
                    <td><?php echo $keyValue['not_claimed_count']; ?></td>
                    <td><?php echo $keyValue['remaining']; ?></td>
                    <!-- <td><a href="#item4" class="btn btn-success" data-toggle="modal">Update</a></td> -->
                  </tr>
                  <?php $i++; }} ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <br/>
    </div>
  </div>
  <!-- Footer Start -->
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

</div>
  
  <!-- ============ Search UI Start ============= -->
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
    <img src="../../dist-assets/images/products/headphone-1.jpg" alt="">
  </div>

</div>
</div>
</div>
<!-- PAGINATION CONTROL -->
</div>


<!-- Button to Open the Modal -->
<!-- The Modal -->
<div class="modal" id="item1">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Claim Offers Update</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <form action="">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="">Voucher Code</label>
                <input type="text" name="title" class="form-control" value="title">
              </div>
              <div class="form-group">
                <label for="">Claimed date</label>
                <input type="date" name="title" class="form-control" value="date">
              </div>
              <div class="form-group">
                <label for="">City</label>
                <select class="form-control">
                  <option>Medina</option>
                  <option>Jeddah</option>
                </select>
              </div>
              <div class="form-group">
                <label for="">Branch</label>
                <input type="number" name="Name" class="form-control" value="Branch">
              </div>
              <div class="form-group">
                <label>Offer type</label>
                <select class="form-control">
                  <option>Gold</option>
                  <option>sliver</option>
                </select>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="">Offer Title</label>
                <input type="text" name="Name" class="form-control" value="Title">
              </div>
              <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="Name" class="form-control" value="Username">
              </div>
              <div class="form-group">
                <label for="">saving</label>
                <input type="text" name="saving" class="form-control" value="saving">
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

<div class="modal" id="item2">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Claim Gift Update</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <form action="">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="">Voucher Code</label>
                <input type="text" name="title" class="form-control" value="title">
              </div>
              <div class="form-group">
                <label for="">Claimed date</label>
                <input type="date" name="title" class="form-control" value="date">
              </div>
              <div class="form-group">
                <label for="">City</label>
                <select class="form-control">
                  <option>Medina</option>
                  <option>Jeddah</option>
                </select>
              </div>
              <div class="form-group">
                <label for="">Branch</label>
                <input type="number" name="Name" class="form-control" value="Branch">
              </div>
              <div class="form-group">
                <label>Offer type</label>
                <select class="form-control">
                  <option>Gold</option>
                  <option>sliver</option>
                </select>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="">Offer Title</label>
                <input type="text" name="Name" class="form-control" value="Title">
              </div>
              <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="Name" class="form-control" value="Username">
              </div>
              <div class="form-group">
                <label for="">saving</label>
                <input type="text" name="saving" class="form-control" value="saving">
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

<div class="modal" id="item3">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Not Claim Offers Update</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <form action="">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="">Voucher Code</label>
                <input type="text" name="title" class="form-control" value="title">
              </div>
              <div class="form-group">
                <label for="">Claimed date</label>
                <input type="date" name="title" class="form-control" value="date">
              </div>
              <div class="form-group">
                <label for="">City</label>
                <select class="form-control">
                  <option>Medina</option>
                  <option>Jeddah</option>
                </select>
              </div>
              <div class="form-group">
                <label for="">Branch</label>
                <input type="number" name="Name" class="form-control" value="Branch">
              </div>
              <div class="form-group">
                <label>Offer type</label>
                <select class="form-control">
                  <option>Gold</option>
                  <option>sliver</option>
                </select>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="">Offer Title</label>
                <input type="text" name="Name" class="form-control" value="Title">
              </div>
              <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="Name" class="form-control" value="Username">
              </div>
              <div class="form-group">
                <label for="">saving</label>
                <input type="text" name="saving" class="form-control" value="saving">
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

<div class="modal" id="item4">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Inventory Summary Update</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <form action="">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="">Date Of Creation</label>
                <input type="date" name="title" class="form-control" value="date">
              </div>
              <div class="form-group">
                <label for="">Date Of Expiry</label>
                <input type="date" name="title" class="form-control" value="date">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="">Offer Title</label>
                <input type="text" name="Name" class="form-control" value="Title">
              </div>
              <div class="form-group">
                <label for="">Value</label>
                <input type="text" name="Value" class="form-control" value="Value">
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

<?php include 'footer.php';?>

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