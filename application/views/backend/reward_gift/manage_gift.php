
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
      <h1 class="mr-2">Rewards & Gifts</h1>
      <ul>
        <li><a href="#">Admin</a></li>
        <li>Manage Gifts</li>
      </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <div id="accordion">
      <div class="card">
        <div class="card-header">
          <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
            1. Manage Gifts
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
                      <th colspan="3"></th>
                      <th colspan="4" style="text-align: center;">Gift 1</th>
                      <th colspan="4" style="text-align: center;">Gift 2</th>
                      <th colspan="4" style="text-align: center;">Gift 3</th>
                      <th colspan="2"></th>
                    </tr>
                    <tr>
                      <th>Level No.</th>
                      <th>Level Gift Value</th>
                      <th>Senario</th>
                      <th>Vendor</th>
                      <th>Gift</th>
                      <th>Remained</th>
                      <th>Value</th>
                      <th>Vendor</th>
                      <th>Gift</th>
                      <th>Remained</th>
                      <th>Value</th>
                      <th>Vendor</th>
                      <th>Gift</th>
                      <th>Remained</th>
                      <th>Value</th>
                      <th>Total Gift Value</th>
                      <th>View / Edit</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1;
                      if(!empty($maganed_gift)){
                        foreach($maganed_gift as $value){
                          $total = $value['gift_one_value']+$value['gift_two_value']+$value['gift_three_value'];
                    ?>
                    <tr>
                      <td><?php echo $value['level_number']; ?></td>
                      <td><?php echo $value['gift_values']; ?></td>
                      <td><?php echo $value['senario_number']; ?></td>
                      <td><?php echo $value['vender_one_name']; ?></td>
                      <td><?php echo $value['gift_one_name']; ?></td>
                      <td><?php echo $value['gift_one_remaining']; ?></td>
                      <td><?php echo $value['gift_one_value']; ?></td>
                      <td><?php echo $value['vender_two_name']; ?></td>
                      <td><?php echo $value['gift_two_name']; ?></td>
                      <td><?php echo $value['gift_two_remaining']; ?></td>
                      <td><?php echo $value['gift_two_value']; ?></td>
                      <td><?php echo $value['vender_three_name']; ?></td>
                      <td><?php echo $value['gift_three_name']; ?></td>
                      <td><?php echo $value['gift_three_remaining']; ?></td>
                      <td><?php echo $value['gift_three_value']; ?></td>
                      <td><?php echo $total; ?></td>
                      <td><button class="btn btn-success" onclick="getScenarioInfo('<?php echo $value['senario_id']; ?>');" data-toggle="modal" data-target="#updateScenario">Edit</button></td>
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
<div class="modal" id="updateScenario">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Manage Gifts</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
            <div class="col-12 alert alert-warning"  id="Uwarning" role="alert"></div>
            <div class="col-12 alert alert-success" id="Usuccess" role="alert"></div>
        </div>
        <form action="" method="POST" id="UpdateScenarioForm">
          <div class="row">
            <div class="col-4">
              <input type="hidden" name="senario_id" id="senario_id" value="">
              <div class="form-group">
                <label for="">Senario</label>
                <input type="text" id="senario_no" name="senario_no" class="form-control" value="">
              </div>
              <div class="form-group">
                <label for="">Category</label>
                <select name="category_one" id="category_one" class="form-control" placeholder="Category">
                    <option value=""> Select Category</option>
                    <?php echo categoryType(); ?>
                </select>
              </div>
              <div class="form-group">
                <label for="">Vendor</label>
                <select name="vendor_one" id="vendor_one" class="form-control" plcaholder="Vendor">
                  <?php echo getVendors(); ?>
                </select>
              </div>
              <div class="form-group">
                <label for="">Gift Name</label>
                <select name="gift_name_one" id="gift_name_one" class="form-control" placeholder="Gift Name">
                  <?php echo getGiftInfo(); ?>
                </select>
              </div>
              <div class="form-group">
                <label for="">Value</label>
                <input type="text" name="value_one" id="value_one" class="form-control" placeholder="Gift value" readonly>
              </div>
              <div class="form-group">
                <label for="">Remained</label>
                <input type="text" name="remain_one" id="remain_one" class="form-control" readonly>
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label for="">Level</label>
                <select class="form-control" name="level_id" id="level_id">
                  <?php echo getLevel(); ?>
                </select>
              </div>
              <div class="form-group">
                <label for="">Category</label>
                <select name="category_two" id="category_two" class="form-control" placeholder="Category">
                  <option value="">Select category</option>
                  <?php echo categoryType(); ?>
                </select>
              </div>
              <div class="form-group">
                <label for="">Vendor</label>
                <select name="vendor_two" id="vendor_two" class="form-control" placeholder="Vendor">
                  <?php echo getVendors(); ?>
                </select>
              </div>
              <div class="form-group">
                <label for="">Gift Name</label>
                <select name="gift_name_two" id="gift_name_two" class="form-control" value="Gift Name">
                  <?php echo getGiftInfo(); ?>
                </select>
              </div>
              <div class="form-group">
                <label for="">Value</label>
                <input type="text" name="value_two" id="value_two" class="form-control" placeholder="Gift value" readonly>
              </div>
              <div class="form-group">
                <label for="">Remained</label>
                <input type="text" name="remain_two" id="remain_two" class="form-control" readonly>
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label for="">Level Gift Value</label>
                <input type="text" name="lavel_value" id="lavel_value" class="form-control" readonly>
              </div>
              <div class="form-group">
                <label for="">Category</label>
                <select name="category_three" id="category_three" class="form-control" placeholder="Category">
                  <option value="">Select category</option>
                  <?php echo categoryType(); ?>
                </select>
              </div>
              <div class="form-group">
                <label for="">Vendor</label>
                <select name="vendor_three" id="vendor_three" class="form-control" placeholder="Vendor">
                  <?php echo getVendors(); ?>
                </select>
              </div>
              <div class="form-group">
                <label for="">Gift Name</label>
                <select name="gift_name_three" id="gift_name_three" class="form-control" value="Gift Name">
                  <?php echo getGiftInfo();?>
                </select>
              </div>
              <div class="form-group">
                <label for="">Value</label>
                <input type="text" name="value_three" id="value_three" class="form-control" placeholder="Gift value" readonly>
              </div>
              <div class="form-group">
                <label for="">Remained</label>
                <input type="text" name="remain_three" id="remain_three" class="form-control" readonly>
              </div>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-dark float-right" id="UpdateScenario">Update</button>
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
        <h4 class="modal-title">Add Country</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <form action="">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="">Nationality English</label>
                <select class="form-control">
                  <option>Category 1</option>
                  <option>Category 2</option>
                  <option>Category 3</option>
                </select>
              </div>
              <div class="form-group">
                <label for="">Nationality Arabic</label>
                <select class="form-control">
                  <option>Category 1</option>
                  <option>Category 2</option>
                  <option>Category 3</option>
                </select>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="">Upload image</label>
                <input type="file" name="Saving" class="form-control" value="Priorty Listing">
              </div>
              <div class="form-group">
                <label for="">Priorty Listing</label>
                <input type="number" name="Saving" class="form-control" value="Priorty Listing">
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
<?php $this->load->view('backend/Footer');?>

<script>
  // $(document).ready(function(){
    $("#success").hide();
    $("#warning").hide();
    $("#Usuccess").hide();
    $("#Uwarning").hide();
  // });


  var getScenarioInfo = function(senario_id){
    $.ajax({
      type : 'POST',
      url : "<?php echo base_url();?>backend/Reward_gift/getSenarioInfo",
      data : {senario_id : senario_id},
      success : function(response){
        var res = JSON.parse(response);
        // console.log(res.result);
        $("#gift_name_one").val(res.result[0].gift_one_id);
        $("#category_one").val(res.result[0].category_one_id);
        $("#remain_one").val(res.result[0].gift_one_remaining);
        $("#value_one").val(res.result[0].gift_one_value);

        $("#gift_name_three").val(res.result[0].gift_three_id);
        $("#category_three").val(res.result[0].category_three_id);
        $("#remain_three").val(res.result[0].gift_three_remaining);
        $("#value_three").val(res.result[0].gift_three_value);
        
        $("#gift_name_two").val(res.result[0].gift_two_id);
        $("#category_two").val(res.result[0].category_two_id);
        $("#remain_two").val(res.result[0].gift_two_remaining);
        $("#value_two").val(res.result[0].gift_two_value);
        
        $("#lavel_value").val(res.result[0].gift_values);
        $("#level_id").val(res.result[0].level_id);
        $("#senario_id").val(res.result[0].senario_id);
        $("#senario_no").val(res.result[0].senario_number);
        
        $("#vendor_one").val(res.result[0].vendor_one_id);
        $("#vendor_three").val(res.result[0].vendor_three_id);
        $("#vendor_two").val(res.result[0].vendor_two_id);
      }
    });
  }

  $("#level_id").on('change',function(){
    var levelId = $("#level_id option:selected").val();
    $.ajax({
      type : 'POST',
      url : '<?php echo base_url();?>backend/Reward_gift/get_levelInfo',
      data : {levelId : levelId},
      success : function(response){
        var res = JSON.parse(response);
        $("#lavel_value").val(res.result[0]['gift_values']);
      }
    });
  });

  $("#category_one").on('change',function(){
      var category_id = $("#category_one option:selected").val();
      $.ajax({
        type : 'POST',
        url : '<?php echo base_url();?>backend/Reward_gift/get_vendorInfo',
        data : {category_id : category_id,select:""},
        success : function(response){
          // var res = JSON.parse(response);
          $('#vendor_one').html(response);
          $("#gift_name_one").val('');
          $("#value_one").val('');
          $("#remain_one").val('');
        }
      });
  });

  $("#vendor_one").on('change',function(){
      var vendor_id = $("#vendor_one option:selected").val();
      $.ajax({
        type : 'POST',
        url : '<?php echo base_url();?>backend/Reward_gift/get_giftInfo',
        data : {vendor_id : vendor_id,select:""},
        success : function(response){
          // var res = JSON.parse(response);
          $('#gift_name_one').html(response);
        }
      });
  });

  $("#gift_name_one").on('change',function(){
      var gift_id = $("#gift_name_one option:selected").val();
      $.ajax({
        type : 'POST',
        url : '<?php echo base_url();?>backend/Reward_gift/get_giftDetails',
        data : {gift_id : gift_id},
        success : function(response){
          var res = JSON.parse(response);
          remain = res.result[0].stock-res.result[0].used;
          $("#remain_one").val(remain);
          $("#value_one").val(res.result[0].value);
        }
      });
  });

  $("#category_two").on('change',function(){
      var category_id = $("#category_two option:selected").val();
      $.ajax({
        type : 'POST',
        url : '<?php echo base_url();?>backend/Reward_gift/get_vendorInfo',
        data : {category_id : category_id,select:""},
        success : function(response){
          // var res = JSON.parse(response);
          $('#vendor_two').html(response);
          $("#gift_name_two").val('');
          $("#value_two").val('');
          $("#remain_two").val('');
        }
      });
  });

  $("#vendor_two").on('change',function(){
      var vendor_id = $("#vendor_two option:selected").val();
      $.ajax({
        type : 'POST',
        url : '<?php echo base_url();?>backend/Reward_gift/get_giftInfo',
        data : {vendor_id : vendor_id,select:""},
        success : function(response){
          // var res = JSON.parse(response);
          $('#gift_name_two').html(response);
        }
      });
  });

  $("#gift_name_two").on('change',function(){
      var gift_id = $("#gift_name_two option:selected").val();
      $.ajax({
        type : 'POST',
        url : '<?php echo base_url();?>backend/Reward_gift/get_giftDetails',
        data : {gift_id : gift_id},
        success : function(response){
          var res = JSON.parse(response);
          var remain = res.result[0].stock-res.result[0].used;
          $("#remain_two").val(remain);
          $("#value_two").val(res.result[0].value);
        }
      });
  });

  $("#category_three").on('change',function(){
      var category_id = $("#category_three option:selected").val();
      $.ajax({
        type : 'POST',
        url : '<?php echo base_url();?>backend/Reward_gift/get_vendorInfo',
        data : {category_id : category_id,select:""},
        success : function(response){
          // var res = JSON.parse(response);
          $('#vendor_three').html(response);
          $("#gift_name_three").val('');
          $("#value_three").val('');
          $("#remain_three").val('');
        }
      });
  });

  $("#vendor_three").on('change',function(){
      var vendor_id = $("#vendor_three option:selected").val();
      $.ajax({
        type : 'POST',
        url : '<?php echo base_url();?>backend/Reward_gift/get_giftInfo',
        data : {vendor_id : vendor_id,select:""},
        success : function(response){
          // var res = JSON.parse(response);
          $('#gift_name_three').html(response);
        }
      });
  });

  $("#gift_name_three").on('change',function(){
      var gift_id = $("#gift_name_three option:selected").val();
      $.ajax({
        type : 'POST',
        url : '<?php echo base_url();?>backend/Reward_gift/get_giftDetails',
        data : {gift_id : gift_id},
        success : function(response){
          var res = JSON.parse(response);
          // $("#quantity_one").val(res.result[0].stock);
          var remain = res.result[0].stock-res.result[0].used;
          $("#remain_three").val(remain);
          $("#value_three").val(res.result[0].value);
        }
      });
  });

  // $("#UpdateScenario").click(function(){
    //   var senario_id = $("#senario_id").val();
    //   var senario_no = $("#senario_no").val();
    //   var level_id = $("#level_id").val();
    //   var lavel_value = $("#lavel_value").val();

    //   var category_one = $("#category_one").val();
    //   var category_two = $("#category_two").val();
    //   var category_three = $("#category_three").val();

    //   var vendor_one = $("#vendor_one").val();
    //   var vendor_two = $("#vendor_two").val();
    //   var vendor_three = $("#vendor_three").val();

    //   var gift_name_one = $("#gift_name_one").val();
    //   var gift_name_two = $("#gift_name_two").val();
    //   var gift_name_three = $("#gift_name_three").val();
      
    //   var value_one = $("#value_one").val();
    //   var value_two = $("#value_two").val();
    //   var value_three = $("#value_three").val();

    //   var remain_one = $("#remain_one").val();
    //   var remain_two = $("#remain_two").val();
    //   var remain_three = $("#remain_three").val();

    //   $.ajax({
    //     type : 'POST',
    //     url : "<?php echo base_url();?>backend/Reward_gift/updateScnarioInfo",
    //     data : {senario_id:senario_id, senario_no:senario_no, category_one:category_one, category_two:category_two, category_three:category_three, vendor_one:vendor_one, vendor_two:vendor_two, vendor_three:vendor_three, gift_name_one:gift_name_one, gift_name_three:gift_name_three, gift_name_two:gift_name_two, value_one:value_one, value_two:value_two, value_three:value_three, remain_one:remain_one, remain_two:remain_two, remain_three:remain_three, level_id:level_id, lavel_value:lavel_value},
    //     success : function(response){
    //       var res = JSON.parse(response);
    //       if(res.status == 1){
    //         $("#Usuccess").html(res.message).show();
    //         window.setTimeout(function(){location.reload()},3000)
    //       } else {
    //         $("#Uwarning").html(res.message).show().fadeOut();
    //       }
    //     }
    //   });
  // })
</script>

<script>
  $(document).ready(function() {
    var form = $('#UpdateScenarioForm');
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
        senario_no: {
          required: true
        },
        level_id:{
          required : true
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
        var senario_id = $("#senario_id").val();
        var senario_no = $("#senario_no").val();
        var level_id = $("#level_id").val();
        var lavel_value = $("#lavel_value").val();

        var category_one = $("#category_one").val();
        var category_two = $("#category_two").val();
        var category_three = $("#category_three").val();

        var vendor_one = $("#vendor_one").val();
        var vendor_two = $("#vendor_two").val();
        var vendor_three = $("#vendor_three").val();

        var gift_name_one = $("#gift_name_one").val();
        var gift_name_two = $("#gift_name_two").val();
        var gift_name_three = $("#gift_name_three").val();
        
        var value_one = $("#value_one").val();
        var value_two = $("#value_two").val();
        var value_three = $("#value_three").val();

        var remain_one = $("#remain_one").val();
        var remain_two = $("#remain_two").val();
        var remain_three = $("#remain_three").val();

        $.ajax({
          type : 'POST',
          url : "<?php echo base_url();?>backend/Reward_gift/updateScnarioInfo",
          data : {senario_id:senario_id, senario_no:senario_no, category_one:category_one, category_two:category_two, category_three:category_three, vendor_one:vendor_one, vendor_two:vendor_two, vendor_three:vendor_three, gift_name_one:gift_name_one, gift_name_three:gift_name_three, gift_name_two:gift_name_two, value_one:value_one, value_two:value_two, value_three:value_three, remain_one:remain_one, remain_two:remain_two, remain_three:remain_three, level_id:level_id, lavel_value:lavel_value},
          success : function(response){
            var res = JSON.parse(response);
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