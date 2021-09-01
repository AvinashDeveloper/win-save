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
        <li>Add New User</li>
      </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <div id="accordion">
      <div class="card">
        <div class="card-header">
          <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
            1. Add New User
          </a>
        </div>
        <div id="collapseTwo" class="collapse show" data-parent="#accordion">
          <div class="card-body">
            <div class="">
              <form action="<?php echo base_url();?>backend/Users/saveUsers" method="POST">
                <div class="row">
                  <div class="col-4">

                    <div class="form-group">
                      <label for=""> Name</label>
                      <input type="text" name="user_name" id="user_name" class="form-control" placeholder="User Name">
                    </div>
                    <div class="form-group">
                      <label for=""> Mobile Number</label>
                      <input type="Number" name="user_mobile" id="user_mobile" class="form-control" placeholder="Mobile Number">
                    </div>
                    <div class="form-group">
                      <label for="">Country</label>
                      <select class="form-control" name="user_country" id="user_country">
                        <?php echo country(); ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Gender</label>
                      <select class="form-control" name="user_gender" id="user_gender">
                        <?php echo get_gender(); ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="">Membership Type</label>
                      <select class="form-control" name="membership_type" id="membership_type">
                          <option value="">Select Membership</option>
                          <option value="free">Free</option>
                          <option value="paid">Paid</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="">Discount</label>
                      <input type="text" name="discount" readonly id="discount" class="form-control" placeholder="discount">
                    </div>
                    <div class="form-group">
                      <label for="">Starting Date</label>
                      <input type="date" name="strat_date" id="strat_date" class="form-control" placeholder="Starting date">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label for=""> Email</label>
                      <input type="email" name="user_email" id="user_email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                      <label for="">Age</label>
                      <input type="number" name="user_age" id="user_age" class="form-control" placeholder="Age">
                    </div>
                    <div class="form-group">
                      <label for="">City</label>
                      <select class="form-control" name="user_city" id="user_city">
                        <?php echo city(); ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="">Currency Preference</label>
                      <select class="form-control" name="user_currency" id="user_currency">
                        <?php echo currencyType(); ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="">Plan Type</label>
                      <select class="form-control" name="plan_type" id="plan_type">
                        <?php echo user_subscription_plan(); ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="">Vat</label>
                      <input type="text" name="vat" id="vat" class="form-control" value="<?php echo getVat();?>" placeholder="Vat" readonly>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Password</label>
                      <input type="password" name="user_password" id="user_password" class="form-control" placeholder="password">
                    </div>
                    <div class="form-group">
                      <label for="">Date Of Birth</label>
                      <input type="date" name="user_dob" id="user_dob" class="form-control" placeholder="Date Of Birth">
                    </div>
                    <div class="form-group">
                      <label for="">Nationality</label>
                      <select class="form-control" name="user_nationality" id="user_nationality">
                        <?php echo getNationality(); ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="">Status</label>
                      <select class="form-control" name="user_status" id="user_status">
                        <?php echo status(); ?>
                      </select>
                    </div>
                    
                    <div class="form-group">
                      <label for="">Amount</label>
                      <input type="text" name="amount" id="amount" class="form-control" readonly placeholder="Amount">
                    </div>
                    <div class="form-group">
                      <label for="">Payment</label>
                      <input type="text" placeholder="Payment" class="form-control" readonly name="payment" id="payment">
                    </div>
                    <div class="form-group">
                      <label for="">End Date</label>
                      <input type="date" name="end_date" id="end_date" class="form-control" placeholder="End date">
                    </div>

                  </div>
                  <div class="col-12">

                    <div class="form-group">
                      <label for="">Expired Account</label>
                      <select name="expired_acc" id="expired_acc" class="form-control" placeholder="Expired Account">
                        <option value="">Select Expire Account</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option> 
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="">Residence</label>
                      <textarea class="form-control" name="user_residence" id="user_residence"></textarea>
                    </div>
                    <button type="submit" class="btn btn-dark float-right" id="addUser">Add User</button>

                  </div>
                </div>
              </form>
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
<div class="modal" id="rnew_contacts">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Renew  User Subcription</h4>
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
   $("#plan_type").on('change',function(){
     var planId = $("#plan_type").val();
     var vat = $("#vat").val();
     $.ajax({
      type : "POST",
      url : "<?php echo base_url();?>backend/Users/getPlaninfo",
      data : {planId : planId},
      success : function(res){
        var ress = JSON.parse(res);
        console.log(ress.result[0]);
        var offer_amount = (ress.result[0].offer_amount * vat) / 100;
        $("#discount").val(ress.result[0].discount);
        $("#amount").val(ress.result[0].main_amount);
        $("#payment").val(offer_amount);
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