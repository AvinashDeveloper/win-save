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
        <li>Renew User</li>
      </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <div id="accordion">
      <div class="card">
        <div class="card-header">
          <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
            1. Renew User
          </a>
        </div>
        <div id="collapseTwo" class="collapse show" data-parent="#accordion">
          <div class="card-body">
            <form action="<?php echo base_url('Renew-users-subscription/').$this->uri->segment(2);?>" method="POST" id="RenewUserForm">
              <b>A summary will display once user search the account</b>
              <div class="row">
                <div class="col-4">
                  <div class="form-group">
                    <label for=""> Name</label>
                    <input type="text" name="user_name" id="user_name" class="form-control" value="<?php echo $user_info[0]->name?>">
                  </div>
                  <div class="form-group">
                    <label for=""> Mobile Number</label>
                    <input type="number" name="user_mobile" id="user_mobile" class="form-control" value="<?php echo $user_info[0]->contact?>">
                  </div>
                  <div class="form-group">
                    <label for="">Date Of Expiry</label>
                    <input type="date" name="expire_date" id="expire_date" class="form-control"  value="<?php echo date('yy-m-d',$user_info[0]->expire_date)?>">
                  </div>
                  <div class="form-group">
                    <label for="">Status</label>
                    <select name="user_status" id="user_status" class="form-control">
                      <?php echo status($user_info[0]->status); ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="user_email" id="user_email" class="form-control" value="<?php echo $user_info[0]->email?>" readonly>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label for="">Age</label>
                    <input type="text" name="user_age" id="user_age" class="form-control" value="<?php echo $user_info[0]->user_age?>">
                  </div>
                  <div class="form-group">
                    <label for="">Nationality</label>
                    <select class="form-control" name="user_nationality" id="user_nationality">
                    <?php echo getNationality((int)$user_info[0]->user_nationality); ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Country of Residence</label>
                    <select class="form-control" name="user_country" id="user_country">
                        <?php echo country((int)$user_info[0]->user_country); ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">City</label>
                    <select class="form-control" name="user_city" id="user_city">
                        <?php echo city((int)$user_info[0]->user_city); ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Gender</label>
                    <select class="form-control" name="user_gender" id="user_gender">
                      <?php echo get_gender($user_info[0]->user_gender); ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="">password</label>
                    <input type="password" name="user_password" id="user_password" class="form-control" value="<?php echo $user_info[0]->pass?>">
                  </div>
                  <div class="form-group">
                    <label for="">Date of Birth</label>
                    <input type="date" name="user_dob" id="user_dob" class="form-control" value="<?php echo $user_info[0]->dob?>">
                  </div>
                  <div class="form-group">
                    <label for="">Payment</label>
                    <select class="form-control" name="payment_by" id="payment_by">
                      <option value="">Choose Payment Method</option>
                      <option value="app" <?php if($user_info[0]->payment_by == 'app'){echo "selected"; }?> >App</option>
                      <option value="distributer" <?php if($user_info[0]->payment_by == 'distributer'){echo "selected"; }?> >Distributer</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Expired Account</label>
                    <select class="form-control" name="expired_acc" id="expired_acc">
                      <option value="">Choose Expired Account</option>
                      <option value="Yes" <?php if($user_info[0]->expire_account == 'Yes'){echo "selected"; }?> >Yes</option>
                      <option value="No" <?php if($user_info[0]->expire_account == 'No'){echo "selected"; }?> >No</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Currency preference</label>
                    <select name="user_currency" id="user_currency" class="form-control" >
                      <?php echo currencyType((int)$user_info[0]->currency); ?>
                    </select>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label for="">Residence</label>
                    <textarea class="form-control" name="user_address" id="user_address" rows="5" cols="5"><?php echo $user_info[0]->address?></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <b>Here a distributer can renew account</b>
              <div class="form-group">
                <label for="">Membership Type</label>
                <select class="form-control" name="membership_type" id="membership_type">
                  <option value="">Select Membership Type</option>
                  <option value="free" <?php if($user_info[0]->main_amount == 0){echo "selected"; }?> >Free</option>
                  <option value="paid" <?php if($user_info[0]->main_amount > 0){echo "selected"; }?>>Paid</option>
                </select>
              </div>
              <div class="form-group">
                <label for="">Status</label>
                <select class="form-control" name="transaction_status" id="transaction_status">
                <?php echo status($user_info[0]->transaction_status); ?>
                </select>
              </div>
              <div class="form-group">
                <label for="">Plan Type</label>
                <select class="form-control" name="plan_id" id="plan_id">
                <?php echo user_subscription_plan((int)$user_info[0]->plan_id)?>
                </select>
              </div>
              <div class="form-group">
                <label for="">Start Date</label>
                <input type="date" name="start_date" id="start_date" class="form-control" value="<?php echo date('yy-m-d',$user_info[0]->start_date);?>" >
              </div>
              <div class="form-group">
                <label for="">Expire Date</label>
                <input type="date" name="end_date" id="end_date" class="form-control" value="<?php echo date('yy-m-d',$user_info[0]->expire_date);?>">
              <div class="form-group">
                <label for="">Amount</label>
                <input type="text" name="main_amount" id="main_amount" class="form-control" value="<?php echo $user_info[0]->main_amount?>" readonly>
              </div>
              <div class="form-group">
                <label for="">Discount</label>
                <input type="text" name="discount" id="discount" class="form-control" value="<?php echo $user_info[0]->discount?>" readonly>
              </div>
              <div class="form-group">
                <label for="">Vat 5%</label>
                <input type="number" name="vat" id="vat" class="form-control" value="<?php echo $user_info[0]->vat?>" readonly>
              </div>
              <div class="form-group">
                <label for="">Total</label>
                <input type="text" name="total_amount" id="total_amount" class="form-control" value="<?php echo $user_info[0]->total_amount?>" readonly>
              </div>
              <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_info[0]->id?>">
              <input type="hidden" name="transection_id" id="transection_id" value="<?php echo $user_info[0]->transaction_id?>">
              <button type="submit" class="btn btn-dark float-right">Submit</button>
            </div>
          </form>
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
<div class="modal" id="rnew_contacts">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Renew  User Subcription</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
    </div>
  </div>
</div>
<!-- The Modal -->
<div class="modal" id="update_contacts">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update  User List</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
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
   $("#plan_id").on('change',function(){
     var planId = $("#plan_id").val();
     var vat = $("#vat").val();
     $.ajax({
      type : "POST",
      url : "<?php echo base_url();?>backend/Users/getPlaninfo",
      data : {planId : planId},
      success : function(res){
        var ress = JSON.parse(res);
        var vat = '<?php echo getVat(); ?>';
        var dis_amount = ress.result[0].main_amount - ress.result[0].discount;
        var offer_amount = (dis_amount * vat) / 100;
        var total_amount = offer_amount + dis_amount;
        $("#discount").val(ress.result[0].discount);
        $("#main_amount").val(ress.result[0].main_amount);
        $("#total_amount").val(total_amount);
        $("#vat").val(vat);
      }
     });
   })
</script>

<script>
    $(document).ready(function() {
			var form = $('#RenewUserForm');
			var errorHandler1 = $('.errorHandler', form);
			var successHandler1 = $('.successHandler', form);
			form.validate({
				errorElement: "span",
				errorClass: 'help-block',
				errorPlacement: function (error, element) {
					if (element.attr("type") == "radio" || element.attr("type") == "checkbox") { 
						error.insertAfter($(element).closest('.form-group').children('div').children().last());
					} else if (element.attr("name") == "dd" || element.attr("name") == "mm" || element.attr("name") == "yyyy") {
						error.insertAfter($(element).closest('.form-group').children('div'));
					} else {
						error.insertAfter(element);
					}
				},
				ignore: "",
				rules: {
					user_name: {
						required: true
					},
					user_email:{
						required : true,
						email :true
					},
					user_mobile: {
						required: true
					},
					user_password:{
						required :true
					},
					expire_date:{
						required :true
					},
					user_status:{
						required :true
					},
					user_age:{
						required :true
					},
					user_nationality:{
						required :true
					},
					user_country:{
						required :true
					},
					user_city:{
						required :true
					},
					user_gender:{
						required :true
					},
					user_dob:{
						required :true
					},
					payment_by:{
						required :true
					},
					expired_acc:{
						required :true
					},
					user_currency:{
						required :true
					},
					user_address:{
						required :true
					},
					membership_type:{
						required :true
					},
					transaction_status:{
						required :true
					},
					plan_id:{
						required :true
					},
					start_date:{
						required :true
					},
					end_date:{
						required :true
					}
				},
				invalidHandler: function (event, validator) { //display error alert on form submit
					successHandler1.hide();
					errorHandler1.show();
				},
				highlight: function (element) {
					$(element).closest('.help-block').removeClass('valid');
					$(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
				},
				unhighlight: function (element) {
					$(element).closest('.form-group').removeClass('has-error');
				},
				success: function (label, element) {
					label.addClass('help-block valid');
					$(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
				},
				submitHandler: function (form) {
					successHandler1.show();
					errorHandler1.hide();
					form.submit();
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