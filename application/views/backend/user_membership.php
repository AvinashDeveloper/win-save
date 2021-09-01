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
          <li>Plans Management</li>
        </ul>
      </div>
      <div class="separator-breadcrumb border-top"></div>
      <div id="accordion">
        <div class="card">
          <div class="card-header">
            <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
              1. Users Plans Management
            </a>
          </div>
          <div id="collapseTwo" class="collapse" data-parent="#accordion">
            <div class="card-body">
              <div class="">
                <div class="float-right">
                  <button class="btn btn-secondary"  data-toggle="modal" data-target="#addUMembership">+ Add</button>
                </div> 
                <div class="table-responsive">
                  <table class="table  display">
                    <thead>
                      <tr>
                        <th>#No</th>
                        <th>Plan English</th>
                        <th>Description English</th>
                        <th>Plan Arabic</th>
                        <th>Description Arabic</th>
                        <th>Subscription Time Limit</th>
                        <th>Claim Offers</th>
                        <th>Collect Points</th>
                        <th>Redeem Gifts</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>After Discount</th>
                        <th>View / Edit</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1;
                        if(!empty($u_membershipInfo)){
                          foreach($u_membershipInfo as $value){
                      ?>
                      <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $value['plan_type']; ?></td>
                        <td><?php echo $value['description']; ?></td>
                        <td><?php echo translateText($value['plan_type']); ?></td>
                        <td><?php echo translateText($value['description']); ?></td>
                        <td><?php echo $value['subscription_limit']; ?></td>
                        <td><?php echo $value['offer_claim']; ?></td>
                        <td><?php echo $value['collect_point']; ?></td>
                        <td><?php echo $value['redeem_gift']; ?></td>
                        <td><?php echo $value['main_amount']; ?></td>
                        <td><?php echo $value['discount']; ?></td>
                        <td><?php echo $value['offer_amount']; ?></td>
                        <td><button class="btn btn-success" onclick="getMembershipInfo('<?php echo $value['subscription_id']; ?>');" data-toggle="modal" data-target="#updateUMembership">Update</button></td>
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
<div class="modal" id="updateUMembership">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update User Plans</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
              <div class="col-12 alert alert-warning"  id="Uwarning" role="alert"></div>
              <div class="col-12 alert alert-success" id="Usuccess" role="alert"></div>
        </div>
        <form action="" method="POST" id="UpdateUMembershipForm">
          <div class="row">
            <div class="col-6">
              <input type="hidden" name="subscription_id" id="subscription_id" value="">
              <div class="form-group">
                <label for="">Plan English</label>
                <input type="text" name="Uplan_type_en" id="Uplan_type_en" value="" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Plan Arabic</label>
                <input type="text" name="Uplan_type_ar" id="Uplan_type_ar" value="" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Description English</label>
                <textarea class="form-control" name="Udescription_en" id="Udescription_en"></textarea>
              </div>
              <div class="form-group">
                <label for="">Description Arabic</label>
                <textarea class="form-control" name="Udescription_ar" id="Udescription_ar"></textarea>
              </div>
              <div class="form-group">
                <label for="">Subscription Time Limit</label>
                <input type="text" class="form-control" name="Usubscription_limit" id="Usubscription_limit" value="">
              </div>
              <!-- <div class="form-group">
                <label for="">Priorty Listing</label>
                <input type="number" name="Saving" class="form-control" value="">
              </div> -->
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="">Collect Points</label><br/>
                <label>Yes<input type="checkbox" name="Ucollect_point[]" id="collect_point_yes" class="form-control Ucollect_point" value="Yes"></label>
                <label>No<input type="checkbox" name="Ucollect_point[]" id="collect_point_no" class="form-control Ucollect_point" value="No"></label>
              </div>
              <div class="form-group">
                <label for="">Claim Offers</label><br/>
                <label>Yes<input type="checkbox" name="Uoffer_claim[]" id="offer_claim_yes" class="form-control Uoffer_claim" value="Yes"></label>
                <label>No<input type="checkbox" name="Uoffer_claim[]" id="offer_claim_no" class="form-control Uoffer_claim" value="No"></label>
              </div>
              <div class="form-group">
                <label for="">Redeem Gifts</label><br/>
                <label>Yes<input type="checkbox" name="Uredeem_gift[]" id="redeem_gift_yes" class="form-control Uredeem_gift" value="Yes"></label>
                <label>No<input type="checkbox" name="Uredeem_gift[]" id="redeem_gift_no" class="form-control Uredeem_gift" value="No"></label>
              </div>
              <div class="form-group">
                <label for="">Price</label>
                <input type="number" name="Umain_amount" id="Umain_amount" class="form-control" value="">
              </div>
              <div class="form-group">
                <label for="">Discount</label>
                <input type="number" name="Udiscount" id="Udiscount" class="form-control" value="">
              </div>
              <div class="form-group">
                <label for="">After Discount</label>
                <input type="number" name="Uoffer_amount" id="Uoffer_amount" class="form-control" value="" readonly>
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
<div class="modal" id="addUMembership">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add  User Plans </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
              <div class="col-12 alert alert-warning"  id="warning" role="alert"></div>
              <div class="col-12 alert alert-success" id="success" role="alert"></div>
        </div>
        <form action="" method="POST" id="AddUMembershipForm">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="">Plan English</label>
                <input type="text" name="plan_type_en" id="plan_type_en" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Plan Arabic</label>
                <input type="text" name="plan_type_en" id="plan_type_ar" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Description English</label>
                <textarea class="form-control" name="description_en" id="description_en"></textarea>
              </div>
              <div class="form-group">
                <label for="">Description Arabic</label>
                <textarea class="form-control" name="description_ar" id="description_ar"></textarea>
              </div>
              <div class="form-group">
                <label for="">Subscription Time Limit</label>
                <input tpye="text" class="form-control" name="subscription_limit" id="subscription_limit"></textarea>
              </div>
              <!-- <div class="form-group">
                <label for="">Priorty Listing</label>
                <input type="number" name="Saving" class="form-control" value="">
              </div> -->
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="">Collect Points</label><br/>
                <label>Yes<input type="checkbox" name="collect_point[]" class="form-control collect_point" value="Yes"></label>
                <label>No<input type="checkbox" name="collect_point[]" class="form-control collect_point" value="No"></label>
              </div>
              <div class="form-group">
                <label for="">Claim Offers</label><br/>
                <label>Yes<input type="checkbox" name="offer_claim[]" class="form-control offer_claim" value="Yes"></label>
                <label>No<input type="checkbox" name="offer_claim[]" class="form-control offer_claim" value="No"></label>
              </div>
              <div class="form-group">
                <label for="">Redeem Gifts</label><br/>
                <label>Yes<input type="checkbox" name="redeem_gift[]" class="form-control redeem_gift" value="Yes"></label>
                <label>No<input type="checkbox" name="redeem_gift[]" class="form-control redeem_gift" value="No"></label>
              </div>
              <div class="form-group">
                <label for="">Price</label>
                <input type="text" name="main_amount" id="main_amount" class="form-control main_amount">
              </div>
              <div class="form-group">
                <label for="">Discount</label>
                <input type="text" name="discount" id="discount" class="form-control discount" >
              </div>
              <div class="form-group">
                <label for="">After Discount</label>
                <input type="text" name="offer_amount" id="offer_amount" class="form-control offer_amount" readonly>
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
  $(document).ready(function(){
    $("#success").hide();
    $("#warning").hide();
    $("#Usuccess").hide();
    $("#Uwarning").hide();
  });

  $(".main_amount").on('change',function(){
    var main_amount = $(".main_amount").val();
    var discount = $(".discount").val();
    var offer_amount = main_amount - discount;
    $(".offer_amount").val(offer_amount);
  });
  $(".discount").on('change',function(){
    var main_amount = $(".main_amount").val();
    var discount = $(".discount").val();
    var offer_amount = main_amount - discount;
    $(".offer_amount").val(offer_amount);
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

  var getMembershipInfo = function(membership_id){
    $.ajax({
      type : "POST",
      url : "<?php echo base_url();?>backend/Membership/getUMembershipInfo",
      data : {membership_id:membership_id},
      success:function(data){
        var getInfo = JSON.parse(data);
        // console.log(getInfo.result);
        $("#subscription_id").val(getInfo.result[0].subscription_id);
        $("#Uplan_type_en").val(getInfo.result[0].plan_type_en);
        $("#Udescription_en").val(getInfo.result[0].description_en);
        $("#Uplan_type_ar").val(getInfo.result[0].plan_type_ar);
        $("#Udescription_ar").val(getInfo.result[0].description_ar);
        $("#Usubscription_limit").val(getInfo.result[0].subscription_limit);
        // $(".Uoffer_claim").val(getInfo.result[0].offer_claim);
        // $(".Ucollect_point").val(getInfo.result[0].collect_point);
        // $(".Uredeem_gift").val(getInfo.result[0].redeem_gift);
        $("#Udiscount").val(getInfo.result[0].discount);
        $("#Uoffer_amount").val(getInfo.result[0].offer_amount);
        $("#Umain_amount").val(getInfo.result[0].main_amount);
        if(getInfo.result[0].offer_claim == 'Yes'){
          $("#offer_claim_yes").prop('checked', true);
        } else{
          $("#offer_claim_no").prop('checked', true);
        }

        if(getInfo.result[0].redeem_gift == 'Yes'){
          $("#redeem_gift_yes").prop('checked', true);
        } else{
          $("#redeem_gift_no").prop('checked', true);
        }

        if(getInfo.result[0].collect_point == 'Yes'){
          $("#collect_point_yes").prop('checked', true);
        }else{
          $("#collect_point_no").prop('checked', true);
        }
       
      }
    })
  }

  $('.Uredeem_gift').on('change', function() {
      $('.Uredeem_gift').not(this).prop('checked', false);  
  });

  $('.Ucollect_point').on('change', function() {
      $('.Ucollect_point').not(this).prop('checked', false);  
  });

  $('.Uoffer_claim').on('change', function() {
      $('.Uoffer_claim').not(this).prop('checked', false);  
  });

  $('.redeem_gift').on('change', function() {
      $('.redeem_gift').not(this).prop('checked', false);  
  });

  $('.collect_point').on('change', function() {
      $('.collect_point').not(this).prop('checked', false);  
  });

  $('.offer_claim').on('change', function() {
      $('.offer_claim').not(this).prop('checked', false);  
  });
</script>

<script>
  $(document).ready(function() {
    var form = $('#UpdateUMembershipForm');
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
        Uplan_type_en: {
          required: true
        },
        Udescription_en:{
          required : true
        },
        Usubscription_limit: {
          required: true
        },
        'Uredeem_gift[]':{
          required :true
        },
        'Uoffer_claim[]':{
          required :true
        },
        'Ucollect_point[]':{
          required :true
        },
        Umain_amount:{
          required :true
        },
        Udiscount:{
          required :true
        }
      },
      messages: {
          'Uredeem_gift[]': {
              required: "You check at least 1 box"
          },
          'Uoffer_claim[]': {
              required: "You check at least 1 box"
          },
          'Ucollect_point[]': {
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
        var plan_type_en = $("#Uplan_type_en").val();
        var plan_type_ar = $("#Uplan_type_ar").val();
        var description_en = $("#Udescription_en").val();
        var description_ar = $("#Udescription_ar").val();
        var subscription_limit = $("#Usubscription_limit").val();
        var offer_claim = $(".Uoffer_claim:checked").val();
        var collect_point = $(".Ucollect_point:checked").val();
        var redeem_gift = $(".Uredeem_gift:checked").val();
        var main_amount = $("#Umain_amount").val();
        var discount = $("#Udiscount").val();
        var offer_amount = $("#Uoffer_amount").val();

        $.ajax({
          type: 'POST',
          url: '<?php echo base_url();?>backend/Membership/UMembership_update',
          data : {subscription_id:subscription_id, plan_type_en:plan_type_en,plan_type_ar:plan_type_ar, description_en:description_en, description_ar:description_ar, subscription_limit:subscription_limit, offer_claim:offer_claim, collect_point:collect_point, redeem_gift:redeem_gift, main_amount:main_amount,discount:discount,offer_amount:offer_amount},
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
    var form = $('#AddUMembershipForm');
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
        plan_type_en: {
          required: true
        },
        description_en:{
          required : true
        },
        subscription_limit: {
          required: true
        },
        main_amount:{
          required :true
        },
        discount:{
          required :true
        },
        'offer_claim[]':{
          required :true
        },
        'collect_point[]':{
          required :true
        },
        'redeem_gift[]':{
          required :true
        }
      },
      messages: {
          'redeem_gift[]': {
              required: "You check at least 1 box"
          },
          'offer_claim[]': {
              required: "You check at least 1 box"
          },
          'collect_point[]': {
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
        var plan_type_en = $("#plan_type_en").val();
        var plan_type_ar = $("#plan_type_ar").val();
        var description_en = $("#description_en").val();
        var description_ar = $("#description_ar").val();
        var subscription_limit = $("#subscription_limit").val();
        var offer_claim = $(".offer_claim:checked").val();
        var collect_point = $(".collect_point:checked").val();
        var redeem_gift = $(".redeem_gift:checked").val();
        var main_amount = $("#main_amount").val();
        var discount = $("#discount").val();
        var offer_amount = $("#offer_amount").val();
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url();?>backend/Membership/UMembership_save',
          data : {plan_type_en:plan_type_en,plan_type_ar:plan_type_ar, description_en:description_en, description_ar:description_ar, subscription_limit:subscription_limit, offer_claim:offer_claim, collect_point:collect_point, redeem_gift:redeem_gift, main_amount:main_amount,discount:discount,offer_amount:offer_amount},
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