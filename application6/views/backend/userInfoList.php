<?php $this->load->view('backend/Header');?>
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
                    <h1 class="mr-2">Users</h1>
                    <ul>
                        <li><a href="#">Admin</a></li>
                        <li>User's List</li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>
                  <div id="accordion">
                  <div class="card">
                    <div class="card-header">
                      <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                        1. User List
                      </a>
                    </div>
                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                      <div class="card-body">
                        <div class="">
                          <div class="float-right">
                            <!-- <button class="btn btn-secondary"  data-toggle="modal" data-target="#contacts">+ Add</button> -->
                          </div> 
                          <div class="table-responsive">
                            <table class="table  display">
                              <thead>
                                <tr>
                                  <th>#No</th>
                                  <th>Date of Creation</th>
                                  <th>Name</th>
                                  <th>Email</th>
                                  <th>Mobile Number</th>
                                  <th>Nationality</th>
                                  <th>Gender</th>
                                  <th>Age</th>
                                  <th>Residence</th>
                                  <th>City</th>
                                  <th>Plan</th>
                                  <th>Date Of expiry</th>
                                  <th>Expired Account</th>
                                  <th>Status</th>
                                  <th>Payment(in app/distributer)</th>
                                  <th>View / Edit</th>
                                  <th>Renew</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php $i=1;
                                    if(!empty($all_user_list)){
                                      foreach($all_user_list as $value){
                                ?>
                                <tr>
                                  <td><?php echo $i; ?></td>
                                  <td><?php if(!empty($value->added_date)){echo date('m/d/yy',strtotime($value->added_date));}else{ echo '-';} ?></td>
                                  <td><?php echo $value->name; ?></td>
                                  <td><?php echo $value->email; ?></td>
                                  <td><?php echo $value->contact; ?></td>
                                  <td><?php echo nationalityString($value->user_nationality); ?></td>
                                  <td><?php echo $value->user_gender; ?></td>
                                  <td><?php echo $value->user_age; ?></td>
                                  <td><?php echo $value->address;//countryString($value->user_country); ?></td>
                                  <td><?php echo cityString($value->user_city); ?></td>
                                  <td><?php echo $value->plan_type; ?></td>
                                  <td><?php if(!empty($value->expire_date)){ echo date('m/d/yy',$value->expire_date); }else{echo "-";} ?></td>
                                  <td>No</td>
                                  <?php if( strtolower($value->status) == 'active'){?>
                                  <td>
                                    <span class="badge badge-success">Acitve</span>
                                    <!-- <button class="btn btn-info" onclick="changeStatus(<?php //echo $value->id; ?>);"><?php //echo $value->status; ?></button> -->
                                  </td>             
                                  <?php }else{
                                  ?>
                                  <td>
                                    <span class="badge badge-danger">Deactive</span>
                                    <!-- <button class="btn btn-success" onclick="changeStatus(<?php //echo $value->id; ?>);"><?php //echo $value->status; ?></button> -->
                                  </td>  
                                  <?php }?>
                                  <td><?php echo $value->payment_by ? $value->payment_by : "-"; ?></td>
                                  <td><button class="btn btn-success" onclick="getUserDetails('<?php echo $value->id; ?>');" data-toggle="modal" data-target="#updateUserInfo">Edit</button></td>

                                  <!-- <td><button class="btn btn-info" onclick="getTransactionInfo('<?php //echo $value->transaction_id; ?>');" data-toggle="modal" data-target="#rnewPayment" >Renew</button></td> -->
                                  <td><a class="btn btn-info" href="<?php echo base_url('Renew-users-subscription/').$value->id;?>" >Renew</a></td>
                                  <td><a class="btn btn-info" href="<?php echo base_url('Users-view/').$value->id;?>" >View</a></td>
                                </tr>
                                <?php $i++; } } ?>
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

<!-- Button to Open the Modal -->
<!-- The Modal -->
<div class="modal" id="rnewPayment">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Renew  User Subcription</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
          <form action="" method="POST">
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <input type="hidden" name="transaction_id" id="transaction_id" value="">
                  <label for="">Plan Type</label>
                  <select class="form-control" name="plan_id" id="plan_id">
                    <option value="">Select Plan</option>
                    <?php ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Starting Date</label>
                  <input type="date" name="start_date" id="start_date" class="form-control" placeholder="Start Date">
                </div>
                <div class="form-group">
                  <label for="">End Date</label>
                  <input type="date" name="expire_date" id="expire_date" class="form-control" placeholder="End Date">
                </div>  
                <div class="form-group">
                    <label for="">Payment By</label>
                    <select class="form-control" name="payment_by" id="payment_by">
                      <option value="">Select Payment by</option>
                      <option value="app">App</option>
                      <option value="distributer">Ahmed</option>
                    </select>
                </div>
                <div class="form-group">
                  <label for="">Expired Account</label>
                  <input type="text" name="expired_account" id="expired_account" class="form-control" placeholder="Expired Account">
                </div>
                <!-- <div class="form-group">
                  <label for="">Membership Type</label>
                  <select class="form-control">
                      <option>Free</option>
                      <option>Paid</option>
                  </select>
                </div> -->
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="">Amount</label>
                  <input type="text" name="main_amount" id="main_amount" class="form-control" placeholder="Amount">
                </div>
                <div class="form-group">
                  <label for="">Discount</label>
                  <input type="text" name="discount" id="discount" class="form-control" placeholder="Discount">
                </div>
                <div class="form-group">
                  <label for="">Vat</label>
                  <input type="text" name="vat" id="vat" class="form-control" placeholder="Vat" readonly>
                </div>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-dark float-right" id="UpdateTransaction">Update</button>
              </div>
          </div>
        </form>
        </div>
      </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal" id="updateUserInfo">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update  User List</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
              <div class="col-12 alert alert-warning"  id="Uwarning" role="alert"></div>
              <div class="col-12 alert alert-success" id="Usuccess" role="alert"></div>
        </div>
        <form action="" method="POST">
          <div class="row">
            <div class="col-4">
                <input type="hidden" name="user_id" id="user_id" value="">
                <div class="form-group">
                    <label for=""> Name</label>
                    <input type="text" name="user_name" id="user_name" value="" class="form-control" value="Store Name">
                </div>
                <div class="form-group">
                    <label for=""> Mobile Number</label>
                    <input type="Number" name="user_mobile" id="user_mobile" value="" class="form-control" placeholder="Mobile Number">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="user_password" id="user_password" value="" class="form-control" placeholder="password">
                </div>
                <div class="form-group">
                    <label for="">Date Of Birth</label>
                    <input type="date" name="user_dob" class="form-control" id="user_dob" value="" placeholder="Date Of Birth">
                </div>
                <div class="form-group">
                    <label for="">Currency Preference</label>
                    <select class="form-control" name="user_currency" id="user_currency">
                        <option value=""> Select Currency</option>
                        <?php echo currencyType(); ?>
                    </select>
                </div>
                <!-- <div class="form-group">
                    <label for="">Discount</label>
                    <input type="number" name="Saving" class="form-control" value="Saving Value">
                </div> -->
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="">Age</label>
                    <input type="number" name="user_age" id="user_age" class="form-control" placeholder="Age">
                </div>        
                <div class="form-group">
                    <label for="">City</label>
                    <select class="form-control" name="user_city" id="user_city">
                      <option value="">Select City</option>
                      <?php echo city(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Residence</label>
                    <textarea class="form-control" name="user_address" id="user_address"></textarea>
                </div>
                <!-- <div class="form-group">
                    <label for="">Plan Type</label>
                    <select class="form-control">
                      <option>Plan 1</option>
                      <option>Plan 2</option>
                      <option>Plan 3</option>
                    </select>
                </div> -->
                <!-- <div class="form-group">
                    <label for="">Starting Date</label>
                    <input type="number" name="Saving" class="form-control" value="Saving Value">
                </div> -->
                <!-- <div class="form-group">
                    <label for="">End Date</label>
                    <input type="number" name="Saving" class="form-control" value="Saving Value">
                </div> -->
                <!-- <div class="form-group">
                    <label for="">Vat</label>
                    <input type="number" name="Saving" class="form-control" value="Vat">
                </div>            -->
            </div>
             <div class="col-md-4">
                <div class="form-group">
                    <label for="">Nationality</label>
                    <select class="form-control" name="user_nationality" id="user_nationality">
                      <option value="">Select Nationality </option>
                      <?php echo getNationality(); ?>
                    </select>
                </div>
                <div class="form-group">
                  <label>Gender</label>
                  <select class="form-control" name="user_gender" id="user_gender">
                    <option value="">Select Gender</option>
                    <?php echo get_gender(); ?>
                  </select>
                </div>
                <div class="form-group">
                    <label for="">Status</label>
                    <select class="form-control" name="user_status" id="user_status">
                        <option value="">Select Status </option>
                        <?php echo status(); ?>
                    </select>
                </div>
                <!-- <div class="form-group">
                    <label for="">Payment</label>
                    <select class="form-control">
                      <option>App</option>
                      <option>Ahmed</option>
                    </select>
                </div> -->
                <!-- <div class="form-group">
                    <label for="">Membership Type</label>
                    <select class="form-control">
                      <option>Free</option>
                      <option>Paid</option>
                    </select>
                </div> -->
                <!-- <div class="form-group">
                    <label for="">Amount</label>
                    <input type="number" name="Saving" class="form-control" value="Saving Value">
                </div> -->
             </div>
             <div class="col-12">
                <!-- <div class="form-group">
                    <label for="">Expired Account</label>
                    <input type="number" name="Expired" class="form-control" value="Expired Account">
                </div> -->
                <button type="submit" class="btn btn-dark float-right" id="UpdateUserDetails">Update</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal" id="contacts">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add New Users</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

    <div class="modal-body">
        <form action="">
        <div class="row">
            <div class="col-4">
                
                
               <div class="form-group">
                <label for=""> Name</label>
                <input type="text" name="Name" class="form-control" value="Store Name">
            </div>
           
             <div class="form-group">
                <label for=""> Mobile Number</label>
                <input type="Number" name="mobile_number" class="form-control" value="Mobile Number">
            </div>
                <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="Name" class="form-control" value="password">
            </div>
                <div class="form-group">
                <label for="">Date Of Birth</label>
                <input type="date" name="Name" class="form-control" value="Date Of Birth">
            </div>
             <div class="form-group">
                <label for="">Currency Preference</label>
                 <select class="form-control">
                 <option>Currency 1</option>
                  <option>Currency 2</option>
                   <option>Currency 3</option>
               </select>
            </div>
                <div class="form-group">
                <label for="">Discount</label>
              <input type="number" name="Saving" class="form-control" value="Saving Value">
            </div>
            </div>
             <div class="col-4">
                     <div class="form-group">
                <label for="">Age</label>
                <input type="number" name="type" class="form-control" value="Type">
            </div>
             
             <div class="form-group">
                <label for="">City</label>
               <select class="form-control">
                 <option>City 1</option>
                  <option>City 2</option>
                   <option>City 3</option>
               </select>
            </div>
             <div class="form-group">
                <label for="">Plan Type</label>
               <select class="form-control">
                 <option>Plan 1</option>
                  <option>Plan 2</option>
                   <option>Plan 3</option>
               </select>
            </div>
             <div class="form-group">
                <label for="">Starting Date</label>
              <input type="number" name="Saving" class="form-control" value="Saving Value">
            </div>

             <div class="form-group">
                <label for="">End Date</label>
              <input type="number" name="Saving" class="form-control" value="Saving Value">
            </div>

           <div class="form-group">
                <label for="">Vat</label>
              <input type="number" name="Saving" class="form-control" value="Vat">
            </div>
           
           
             </div>
             <div class="col-md-4">
                 <div class="form-group">
                <label for="">Nationality</label>
               <select class="form-control">
                 <option>Nationality 1</option>
                  <option>Nationality 2</option>
                   <option>Nationality 3</option>
               </select>
            </div>
              <div class="form-group">
                <label>Gender</label>
                <select class="form-control">
                 <option>Male</option>
                  <option>Female</option>
                   <option>Other</option>
               </select>
            </div>
                   <div class="form-group">
                <label for="">Status</label>
               <select class="form-control">
                 <option>Active</option>
                  <option>Inactive</option>
                  
               </select>
            </div>
            <div class="form-group">
                <label for="">Payment</label>
               <select class="form-control">
                 <option>App</option>
                  <option>Ahmed</option>
                  
               </select>
            </div>
               <div class="form-group">
                <label for="">Membership Type</label>
               <select class="form-control">
                 <option>Free</option>
                  <option>Paid</option>
                  
               </select>
            </div>
                <div class="form-group">
                <label for="">Amount</label>
              <input type="number" name="Saving" class="form-control" value="Saving Value">
            </div>
             </div>
             <div class="col-12">
                  <div class="form-group">
                <label for="">Expired Account</label>
              <input type="number" name="Expired" class="form-control" value="Expired Account">
            </div>
              <div class="form-group">
                <label for="">Residence</label>
       <textarea class="form-control"></textarea>
            </div>
                   <button type="submit" class="btn btn-dark float-right">Update</button>
             </div>
           
        </div>
       
         
       </form>
      </div>


    </div>
  </div>
</div>

<?php $this->load->view('backend/Footer');?>
<script>
   $(document).ready(function(){
    $("#success").hide();
    $("#warning").hide();
    $("#Usuccess").hide();
    $("#Uwarning").hide();
  });

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

  var getUserDetails = function(user_id){
    $.ajax({
      type : "POST",
      url : "<?php echo base_url();?>backend/Users/getUserBasicInfo",
      data : {user_id:user_id},
      success:function(data){
        var getInfo = JSON.parse(data);
        $("#user_id").val(getInfo.result[0].user_id);
        $("#user_name").val(getInfo.result[0].user_name);
        $("#user_address").val(getInfo.result[0].user_address);
        $("#user_mobile").val(getInfo.result[0].user_mobile);
        $("#user_nationality").val(getInfo.result[0].user_nationality);
        $("#user_gender").val(getInfo.result[0].user_gender);
        $("#user_age").val(getInfo.result[0].user_age);
        $("#user_city").val(getInfo.result[0].user_city);
        $("#user_status").val(getInfo.result[0].status);
        $("#user_password").val(getInfo.result[0].user_password);
        $("#user_currency").val(getInfo.result[0].user_currency);
        $("#user_dob").val(getInfo.result[0].user_dob);
      }
    })
  }

  var getTransactionInfo = function(transaction_id){
    $.ajax({
      type : "POST",
      url : "<?php echo base_url();?>backend/Users/getUserTransactionInfo",
      data : {transaction_id:transaction_id},
      success:function(data){
        var getInfo = JSON.parse(data);
        $("#transaction_id").val(getInfo.result[0].transaction_id);
        $("#main_amount").val(getInfo.result[0].main_amount);
        $("#discount").val(getInfo.result[0].discount);
        $("#vat").val(getInfo.result[0].vat);
        $("#start_date").val(getInfo.result[0].start_date);
        $("#expire_date").val(getInfo.result[0].expire_date);
        $("#payment_by").val(getInfo.result[0].payment_by);
      }
    });
  }

  $("#UpdateTransaction").click(function(){
    var transaction_id = $("#transaction_id").val();
    var main_amount = $("#main_amount").val();
    var discount = $("#discount").val();
    var vat = $("#vat").val();
    var start_date = $("#start_date").val();
    var expire_date = $("#expire_date").val();
    var payment_by = $("#payment_by").val();

    $.ajax({
      type: 'POST',
      url: '<?php echo base_url();?>backend/Users/updateUserDetails',
      data : {transaction_id:transaction_id, main_amount:main_amount, discount:discount, user_mobile:user_mobile, vat:vat, start_date:start_date, expire_date:expire_date, payment_by:payment_by},
      success:function(response){
        var res = JSON.parse(resonse);
          if(res.status == 1){
            $("#Usuccess").html(res.message).show();
            window.setTimeout(function(){location.reload()},3000)
          } else {
            $("#Uwarning").html(res.message).show().fadeOut();
          }
      }
    });
  })

  $("#UpdateUserDetails").click(function(){
    var user_id = $("#user_id").val();
    var user_name = $("#user_name").val();
    var user_address = $("#user_address").val();
    var user_mobile = $("#user_mobile").val();
    var user_nationality = $("#user_nationality").val();
    var user_gender = $("#user_gender").val();
    var user_age = $("#user_age").val();
    var user_city = $("#user_city").val();
    var user_status = $("#user_status").val();
    var user_password = $("#user_password").val();
    var user_currency = $("#user_currency").val();
    var user_dob = $("#user_dob").val();

    $.ajax({
      type: 'POST',
      url: '<?php echo base_url();?>backend/Users/updateUserDetails',
      data : {user_id:user_id, user_name:user_name, user_address:user_address, user_mobile:user_mobile, user_nationality:user_nationality, user_gender:user_gender, user_age:user_age, user_city:user_city,user_status:user_status,user_dob:user_dob, user_currency:user_currency, user_password:user_password},
      success:function(response){
        var res = JSON.parse(resonse);
          if(res.status == 1){
            $("#Usuccess").html(res.message).show();
            window.setTimeout(function(){location.reload()},3000)
          } else {
            $("#Uwarning").html(res.message).show().fadeOut();
          }
      }
    });
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