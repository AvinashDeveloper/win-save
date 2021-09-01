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
        <h1 class="mr-2">Vendor</h1>
        <ul>
          <li><a href="#">Admin</a></li>
          <li>Plans Management</li>
        </ul>
      </div>
      <div class="separator-breadcrumb border-top"></div>
      <div id="accordion">
        <div class="card">
          <div class="card-header">
            <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
              1. Vendor Plans Management
            </a>
          </div>
          <div id="collapseTwo" class="collapse" data-parent="#accordion">
            <div class="card-body">
              <div class="">
                <div class="float-right">
                  <button class="btn btn-secondary"  data-toggle="modal" data-target="#addMembership">+ Add</button>
                </div> 
                <div class="table-responsive">
                  <table class="table  display">
                    <thead>
                      <tr>
                        <th>#No</th>
                        <th>Plan Type</th>
                        <th>Description</th>
                        <th>Package Detail(Note)</th>
                        <th>Offer Limit</th>
                        <th>Number of Branch Limit</th>
                        <th>Show on Feature</th>
                        <th>Show in Notification Alert</th>
                        <th>Priority Display</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>After Discount</th>
                        <th>View / Edit</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $i=1;
                        if(!empty($v_membershipInfo)){
                          foreach($v_membershipInfo as $value){
                      ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $value['plan_type']; ?></td>
                        <td><?php echo $value['description']; ?></td>
                        <td><?php echo $value['package_details']; ?></td>
                        <td><?php echo $value['offer_limit']; ?></td>
                        <td><?php echo $value['branch_limit']; ?></td>
                        <td><?php echo $value['feature_view']; ?></td>
                        <td><?php echo $value['notification_alert']; ?></td>
                        <td><?php echo $value['priority_display']; ?></td>
                        <td><?php echo $value['main_amount']; ?></td>
                        <td><?php echo $value['discount']; ?></td>
                        <td><?php echo $value['offer_amount']; ?></td>
                        <td><button class="btn btn-success" data-toggle="modal" data-target="#updateMembership" onclick="getMembershipInfo('<?php echo $value['subscription_id']; ?>');">Update</button></td>
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
      <div class="list-thumb d-flex"> -->
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
<div class="modal" id="updateMembership">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Vendor Plans</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
              <div class="col-12 alert alert-warning"  id="Uwarning" role="alert"></div>
              <div class="col-12 alert alert-success" id="Usuccess" role="alert"></div>
        </div>
        <form action="" method="POST" id="UpdateVMembershipForm">
          <div class="row">
            <div class="col-6">
              <input type="hidden" name="subscription_id" id="subscription_id" value="">
              <div class="form-group">
                <label for="">Plan type</label>
                <input type="text" name="Uplan_type" id="Uplan_type" value="" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Description</label>
                <textarea class="form-control" id="Udescription" name="Udescription"></textarea>
              </div>
              <div class="form-group">
                <label for="">Package Details</label>
                <textarea class="form-control" id="Upackage_details" name="Upackage_details"></textarea>
              </div>
              <div class="form-group">
                <label for="">offer_limit</label>
                <input type="text" name="Uoffer_limit" id="Uoffer_limit" class="form-control">
              </div>
              <div class="form-group">
                <label for="">branch_limit</label>
                <input type="text" name="Ubranch_limit" id="Ubranch_limit" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Priorty Listing</label>
                <input type="number" name="Upriority_display" min='1' id="Upriority_display" class="form-control" value="">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="">Show on Feature</label><br/>
                <label>Yes<input type="checkbox" name="Ufeature_view[]" id="feature_yes" class="form-control Ufeature_view" value="Yes"></label>
                <label>No<input type="checkbox" id="feature_no" name="Ufeature_view[]" class="form-control Ufeature_view" value="No"></label>
              </div>
              <div class="form-group">
                <label for="">Show on Notification</label><br/>
                <label>Yes<input type="checkbox" name="Unotification_alert[]" id="notify_yes" class="form-control Unotification_alert" value="yes"></label>
                <label>No<input type="checkbox" name="Unotification_alert[]" id="notify_no" class="form-control Unotification_alert" value="No"></label>
              </div>
              <div class="form-group">
                <label for="">Price</label>
                <input type="text" name="Umain_amount" id="Umain_amount" class="form-control" value="">
              </div>
              <div class="form-group">
                <label for="">Discount</label>
                <input type="text" name="Udiscount" id="Udiscount" class="form-control" value="">
              </div>
              <div class="form-group">
                <label for="">After Discount</label>
                <input type="text" name="Uoffer_amount" id="Uoffer_amount" class="form-control" value="" readonly>
              </div>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-dark float-right" id="UpdateMembership">Update</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal" id="addMembership">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add  Vendor Plans </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
              <div class="col-12 alert alert-warning" id="warning" role="alert"></div>
              <div class="col-12 alert alert-success" id="success" role="alert"></div>
        </div>
        <form action="" method="POST" id="AddVMembershipForm">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="">Plan type</label>
                <input type="text" name="plan_type" id="plan_type" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Description</label>
                <textarea class="form-control" name="description" id="description" placeholder="description"></textarea>
              </div>
              <div class="form-group">
                <label for="">Package Details</label>
                <textarea class="form-control" name="package_details" id="package_details" placeholder="package_details"></textarea>
              </div>
              <div class="form-group">
                <label for="">offer_limit</label>
                <input type="text" name="offer_limit" id="offer_limit" class="form-control">
              </div>
              <div class="form-group">
                <label for="">branch_limit</label>
                <input type="text" name="branch_limit" id="branch_limit" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Priorty Listing</label>
                <input type="number" name="priority" min='1' id="priority" class="form-control" placeholder="priority display">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="">Show on Feature</label><br/>
                <label>Yes<input type="checkbox" name="feature_view[]" class="form-control feature_view" value="Yes"></label>
                <label>No<input type="checkbox" name="feature_view[]" class="form-control feature_view" value="No"></label>
              </div>
              <div class="form-group">
                <label for="">Show on Notification</label><br/>
                <label>Yes<input type="checkbox" name="notification_alert[]" class="form-control notification_alert" value="Yes"></label>
                <label>No<input type="checkbox" name="notification_alert[]" class="form-control notification_alert" value="No"></label>
              </div>
              <div class="form-group">
                <label for="">Price</label>
                <input type="text" name="main_amount" id="main_amount" class="form-control" placeholder="">
              </div>
              <div class="form-group">
                <label for="">Discount</label>
                <input type="text" name="discount" id="discount" class="form-control" placeholder="Discount">
              </div>
              <div class="form-group">
                <label for="">After Discount</label>
                <input type="text" name="offer_amount" id="offer_amount" class="form-control" placeholder="After Discount" value="" readonly>
              </div>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-dark float-right" id="AddMembership">Save</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('backend/Footer');?>
<script>
  $("#success").hide();
  $("#warning").hide();
  $("#Usuccess").hide();
  $("#Uwarning").hide();


  $("#main_amount").on('change',function(){
    var main_amount = $("#main_amount").val();
    var discount = $("#discount").val();
    var offer_amount = main_amount - discount;
    $("#offer_amount").val(offer_amount);
  });
  $("#discount").on('change',function(){
    var main_amount = $("#main_amount").val();
    var discount = $("#discount").val();
    var offer_amount = main_amount - discount;
    $("#offer_amount").val(offer_amount);
  });

  $("#Umain_amount").on('change',function(){
    var main_amount = $("#Umain_amount").val();
    var discount = $("#Udiscount").val();
    var offer_amount = main_amount - discount;
    $("#Uoffer_amount").val(offer_amount);
  });
  $("#Udiscount").on('change',function(){
    var main_amount = $("#Umain_amount").val();
    var discount = $("#Udiscount").val();
    var offer_amount = main_amount - discount;
    $("#Uoffer_amount").val(offer_amount);
  });

  // script for change status
  var changeStatus = function(id){
    var get = confirm("Want to change status?");
    if(get){
      var url =  '<?php echo base_url(); ?>backend/Manage_vendors/changeStatus';
      $.ajax({
        type : 'POST',
        url : url,
        data : {id:id,tbl:'classified',col_name:'id'},
      })
      .done(function(result){
        location.reload(true);
      });
    }
  } 

  // $("#AddMembership").click(function(){
    // var plan_type = $("#plan_type").val();
    // var description = $("#description").val();
    // var package_details = $("#package_details").val();
    // var priority = $("#priority").val();
    // var feature_view = $(".feature_view").val();
    // var notification_alert = $(".notification_alert").val();
    // var main_amount = $("#main_amount").val();
    // var discount = $("#discount").val();
    // var offer_amount = $("#offer_amount").val();
    // var offer_limit = $("#offer_limit").val();
    // var branch_limit = $("#branch_limit").val();
    // $.ajax({
    //   type: 'POST',
    //   url: '<?php echo base_url();?>backend/Membership/VMembership_save',
    //   data : {plan_type:plan_type, description:description, package_details:package_details, priority:priority, feature_view:feature_view, notification_alert:notification_alert, main_amount:main_amount,discount:discount,offer_amount:offer_amount,offer_limit:offer_limit,branch_limit:branch_limit},
    //   success:function(response){
    //       var res = JSON.parse(response);
    //       if(res.status == 1){
    //         $("#success").html(res.message).show();
    //         window.setTimeout(function(){location.reload()},3000)
    //       } else {
    //         $("#warning").html(res.message).show().fadeOut();
    //       }
    //   }
    // });
  // })

  var getMembershipInfo = function(membership_id){
    $.ajax({
      type : "POST",
      url : "<?php echo base_url();?>backend/Membership/getVMembershipInfo",
      data : {membership_id:membership_id},
      success:function(data){
        var getInfo = JSON.parse(data);
        $("#subscription_id").val(getInfo.result[0].subscription_id);
        $("#Uplan_type").val(getInfo.result[0].plan_type);
        $("#Udescription").val(getInfo.result[0].description);
        $("#Upackage_details").val(getInfo.result[0].package_details);
        // $(".Ufeature_view").val(getInfo.result[0].feature_view);
        // $(".Unotification_alert").val(getInfo.result[0].notification_alert);
        $("#Umain_amount").val(getInfo.result[0].main_amount);
        $("#Udiscount").val(getInfo.result[0].discount);
        $("#Uoffer_amount").val(getInfo.result[0].offer_amount);
        $("#Uoffer_limit").val(getInfo.result[0].offer_limit);
        $("#Ubranch_limit").val(getInfo.result[0].branch_limit);
        $("#Upriority_display").val(getInfo.result[0].priority_display);
        if(getInfo.result[0].feature_view == 'Yes'){
          $("#feature_yes").prop('checked', true);
        } else{
          $("#feature_no").prop('checked', true);
        }

        if(getInfo.result[0].notification_alert == 'Yes'){
          $("#notify_yes").prop('checked', true);
        }else{
          $("#notify_no").prop('checked', true);
        }
        
      }
    })
  }

  // $("#UpdateMembership").click(function(){
    // var subscription_id = $("#subscription_id").val();
    // var Uplan_type = $("#Uplan_type").val();
    // var Udescription = $("#Udescription").val();
    // var Upackage_details = $("#Upackage_details").val();
    // var Ufeature_view = $(".Ufeature_view:checked").val();
    // var Unotification_alert = $(".Unotification_alert:checked").val();
    // var Umain_amount = $("#Umain_amount").val();
    // var Udiscount = $("#Udiscount").val();
    // var Uoffer_amount = $("#Uoffer_amount").val();
    // var Uoffer_limit = $("#Uoffer_limit").val();
    // var Ubranch_limit = $("#Ubranch_limit").val();
    // var Upriority_display = $("#Upriority_display").val();

    // $.ajax({
    //   type: 'POST',
    //   url: '<?php echo base_url();?>backend/Membership/VMembership_update',
    //   data : {subscription_id:subscription_id, plan_type:Uplan_type, description:Udescription, package_details:Upackage_details, feature_view:Ufeature_view, discount:Udiscount, notification_alert:Unotification_alert, main_amount:Umain_amount,offer_amount:Uoffer_amount, offer_limit:Uoffer_limit, branch_limit:Ubranch_limit, priority_display:Upriority_display},
    //   success:function(response){
    //       var res = JSON.parse(resonse);
    //       if(res.status == 1){
    //         $("#Usuccess").html(res.message).show();
    //         window.setTimeout(function(){location.reload()},3000)
    //       } else {
    //         $("#Uwarning").html(res.message).show().fadeOut();
    //       }
    //   }
    // });
  // })

  $('.feature_view').on('change', function() {
      $('.feature_view').not(this).prop('checked', false);  
  });

  $('.notification_alert').on('change', function() {
      $('.notification_alert').not(this).prop('checked', false);  
  });

  $('.Ufeature_view').on('change', function() {
      $('.Ufeature_view').not(this).prop('checked', false);  
  });

  $('.Unotification_alert').on('change', function() {
      $('.Unotification_alert').not(this).prop('checked', false);  
  });
</script>

<script>
  $(document).ready(function() {
    var form = $('#UpdateVMembershipForm');
    var errorHandler1 = $('.errorHandler', form);
    var successHandler1 = $('.successHandler', form);
    form.validate({
      errorElement: "span",
      errorClass: 'help-block',
      errorPlacement: function (error, element) {
        if (element.attr("type") == "radio" || element.attr("type") == "checkbox") { 
          error.insertAfter($(element).closest('.form-group'));
          // error.insertAfter($(element).closest('.form-group').children('div').children().last());
        } else if (element.attr("name") == "dd" || element.attr("name") == "mm" || element.attr("name") == "yyyy") {
          error.insertAfter($(element).closest('.form-group').children('div'));
        } else {
          error.insertAfter(element);
        }
      },
      ignore: "",
      rules: {
        Uplan_type: {
          required: true
        },
        Udescription:{
          required : true
        },
        Upackage_details: {
          required: true
        },
        Upriority_display:{
          required :true,
          digits:true
        },
        'Ufeature_view[]':{
          required:true
        },
        'Unotification_alert[]':{
          required:true
        },
        Umain_amount:{
          required:true,
          number:true
        },
        Udiscount:{
          required:true,
          number:true
        },
        Uoffer_limit:{
          required:true,
          digits:true
        },
        Ubranch_limit:{
          required:true
        }
      },
      messages: {
          'Ufeature_view[]': {
              required: "You check at least 1 box"
          },
          'Unotification_alert[]': {
              required: "You check at least 1 box"
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
        var subscription_id = $("#subscription_id").val();
        var Uplan_type = $("#Uplan_type").val();
        var Udescription = $("#Udescription").val();
        var Upackage_details = $("#Upackage_details").val();
        var Ufeature_view = $(".Ufeature_view:checked").val();
        var Unotification_alert = $(".Unotification_alert:checked").val();
        var Umain_amount = $("#Umain_amount").val();
        var Udiscount = $("#Udiscount").val();
        var Uoffer_amount = $("#Uoffer_amount").val();
        var Uoffer_limit = $("#Uoffer_limit").val();
        var Ubranch_limit = $("#Ubranch_limit").val();
        var Upriority_display = $("#Upriority_display").val();

        $.ajax({
          type: 'POST',
          url: '<?php echo base_url();?>backend/Membership/VMembership_update',
          data : {subscription_id:subscription_id, plan_type:Uplan_type, description:Udescription, package_details:Upackage_details, feature_view:Ufeature_view, discount:Udiscount, notification_alert:Unotification_alert, main_amount:Umain_amount,offer_amount:Uoffer_amount, offer_limit:Uoffer_limit, branch_limit:Ubranch_limit, priority_display:Upriority_display},
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
      }
    });
  });

  $(document).ready(function() {
    var form = $('#AddVMembershipForm');
    var errorHandler1 = $('.errorHandler', form);
    var successHandler1 = $('.successHandler', form);
    form.validate({
      errorElement: "span",
      errorClass: 'help-block',
      errorPlacement: function (error, element) {
        if (element.attr("type") == "radio" || element.attr("type") == "checkbox") { 
          error.insertAfter($(element).closest('.form-group'));
          // error.insertAfter($(element).closest('.form-group').children('div').children().last());
        } else if (element.attr("name") == "dd" || element.attr("name") == "mm" || element.attr("name") == "yyyy") {
          error.insertAfter($(element).closest('.form-group').children('div'));
        } else {
          error.insertAfter(element);
        }
      },
      ignore: "",
      rules: {
        plan_type: {
          required: true
        },
        description:{
          required : true
        },
        package_details: {
          required: true
        },
        priority:{
          required :true,
          digits:true
        },
        'feature_view[]':{
          required:true
        },
        'notification_alert[]':{
          required:true
        },
        main_amount:{
          required:true,
          number:true
        },
        discount:{
          required:true,
          number:true
        },
        offer_limit:{
          required:true,
          digits:true
        },
        branch_limit:{
          required:true
        }
      },
      messages: {
          'feature_view[]': {
              required: "You check at least 1 box"
          },
          'notification_alert[]': {
              required: "You check at least 1 box"
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
        var plan_type = $("#plan_type").val();
        var description = $("#description").val();
        var package_details = $("#package_details").val();
        var priority = $("#priority").val();
        var feature_view = $(".feature_view").val();
        var notification_alert = $(".notification_alert").val();
        var main_amount = $("#main_amount").val();
        var discount = $("#discount").val();
        var offer_amount = $("#offer_amount").val();
        var offer_limit = $("#offer_limit").val();
        var branch_limit = $("#branch_limit").val();
      
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url();?>backend/Membership/VMembership_save',
          data : {plan_type:plan_type, description:description, package_details:package_details, priority:priority, feature_view:feature_view, notification_alert:notification_alert, main_amount:main_amount,discount:discount,offer_amount:offer_amount,offer_limit:offer_limit,branch_limit:branch_limit},
          success:function(response){
              var res = JSON.parse(response);
              if(res.status == 1){
                $("#success").html(res.message).show();
                window.setTimeout(function(){location.reload()},3000)
              } else {
                $("#warning").html(res.message).show().fadeOut();
              }
          }
        });
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