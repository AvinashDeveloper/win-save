
<?php $this->load->view('backend/Header'); ?>
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
<!-- =============== Left side End ================-->
  <div class="main-content-wrap sidenav-open d-flex flex-column">
    <!-- ============ Body content start ============= -->
    <div class="main-content">
      <div class="breadcrumb">
        <h1 class="mr-2">Vendor</h1>
        <ul>
          <li><a href="#">Admin</a></li>
          <li>Item Verification</li>
        </ul>
      </div>
      <div class="separator-breadcrumb border-top"></div>
      <div id="accordion">
        <div class="card">
          <div class="card-header">
            <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
              1. New Offer Approval 
            </a>
          </div>
          <div id="collapseTwo" class="collapse" data-parent="#accordion">
            <div class="card-body">
              <div class="">
                <!--  <div class="float-right">
                <button class="btn btn-secondary"  data-toggle="modal" data-target="#contacts">+ Add</button>
                </div> -->
                <div class="table-responsive">
                  <table class="table  display">
                    <thead>
                      <tr>
                        <th>#No</th>
                        <th>Date of Creation</th>
                        <th>Store Name</th>
                        <th>Category</th>
                        <th>Vendor Contact Creater</th>
                        <th>Type</th>
                        <th>Title</th>
                        <th>Saving Value</th>
                        <th>View / Edit</th>
                        <th>Approve</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1; 
                        if(!empty($offerItemInfo)){
                          foreach($offerItemInfo as $value){
                      ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo date('m/d/yy',strtotime($value['add_date'])); ?></td>
                        <td><?php echo $value['store_name']; ?></td>
                        <td><?php echo getCatgoryTypeString($value['category_id']); ?></td>
                        <td><?php echo $value['name']; ?></td>
                        <td><?php echo getOfferTypeString($value['offer_type']); ?></td>
                        <td><?php echo $value['offer_title']; ?></td>
                        <td><?php echo $value['saving_amount']; ?></td>
                        <td><button class="btn btn-success" onclick="getOfferItem('<?php echo $value['id']; ?>','<?php echo $value['vendor_id']; ?>');" data-toggle="modal" data-target="#updateOffers">Update</button></td>
                        <?php if( strtolower($value['status']) == 'active'){?>
                        <td><button class="btn btn-info" onclick="changeStatus(<?php echo $value['id']; ?>);"><?php echo $value['status']; ?></button></td>             
                        <?php }else{
                        ?>
                        <td><button class="btn btn-success" onclick="changeStatus(<?php echo $value['id']; ?>);"><?php echo $value['status']; ?></button></td>  
                        <?php }?>
                      </tr>
                      <?php $i++; }}?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
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
    <!-- <div class="search-results list-horizontal">
    <div class="list-item col-md-12 p-0">
    <div class="card o-hidden flex-row mb-4 d-flex">
    <div class="list-thumb d-flex">-->
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

<!-- Button to Open the Modal -->
<!-- The Modal -->
<div class="modal" id="updateOffers">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update New Offer Approval</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="">
          <div class="row">
            <div class="col-6">
              <input type="hidden" name="vender_id" id="vender_id" value="">
              <input type="hidden" name="offer_item_id" id="offer_item_id" value="">
              <div class="form-group">
                <label for="">Date of Creation</label>
                <input type="date" name="create_date" value="" class="form-control" id="create_date" placeholder="Date of Creation">
              </div>
              <div class="form-group">
                <label for="">Store Name</label>
                <input type="text" name="store_name" value="" id="store_name" class="form-control" placeholder="Store Name">
              </div>
              <div class="form-group">
                <label for="">Catrgory</label>
                <select class="form-control" name="category_id" id="category_id">
                  <?php echo categoryType(); ?>
                </select>
              </div>
              <div class="form-group">
                <label>Vendor Contact Creator</label>
                <input type="text" name="vender_name" id="vender_name" value="" class="form-control" placeholder="Vendor Contact Creator">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="">Type</label>
                <select name="offer_type" id="offer_type" class="form-control" >
                    <?php echo offerType(); ?>
                </select>
              </div>
              <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="offer_title" id="offer_title" class="form-control" value="" placeholder="Title">
              </div>
              <div class="form-group">
                <label for="">Saving Value</label>
                <input type="number" name="saving_amount" id="saving_amount" min='0' value="" class="form-control" placeholder="Saving Value">
              </div>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-dark float-right" id="updateItems">Update</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal" id="addOffers">
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
<?php $this->load->view('backend/Footer');?>

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

  var getOfferItem = function(offer_item_id, vender_id){
    $.ajax({
      type : "POST",
      url : "<?php echo base_url();?>backend/Item_verification/getOfferAprovalInfo",
      data : {offer_item_id:offer_item_id, vender_id:vender_id},
      success:function(data){
        var getInfo = JSON.parse(data);
        $("#vender_id").val(getInfo.result[0].vendor_id);
        $("#offer_item_id").val(getInfo.result[0].id);
        $("#create_date").val(getInfo.result[0].add_date);
        $("#store_name").val(getInfo.result[0].store_name);
        $("#category_id").val(getInfo.result[0].category_id);
        $("#vender_name").val(getInfo.result[0].name);
        $("#offer_type").val(getInfo.result[0].offer_type);
        $("#offer_title").val(getInfo.result[0].offer_title);
        $("#saving_amount").val(getInfo.result[0].saving_amount);
      }
    })
  }

  $("#updateItems").click(function(){
    var vender_id = $("#vender_id").val();
    var offer_item_id = $("#offer_item_id").val();
    var create_date = $("#create_date").val();
    var store_name = $("#store_name").val();
    var category_id = $("#category_id").val();
    var vender_name = $("#vender_name").val();
    var offer_type = $("#offer_type").val();
    var offer_title = $("#offer_title").val();
    var saving_amount = $("#saving_amount").val();

    $.ajax({
      type: 'POST',
      url: '<?php echo base_url();?>backend/Item_verification/offer_update',
      data : {vender_id:vender_id, offer_item_id:offer_item_id, create_date:create_date, store_name:store_name, category_id:category_id, vender_name:vender_name, offer_title:offer_title, offer_type:offer_type,saving_amount:saving_amount},
      success:function(response){
          var res = JSON.parse(resonse);
          alert(res.message);
      }
    });
  })
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