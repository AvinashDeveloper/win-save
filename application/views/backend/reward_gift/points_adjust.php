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
        <li>Points Adjust</li>
      </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <div id="accordion">
      <div class="card">
        <div class="card-header">
          <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
            1. Points Adjust
          </a>
        </div>
        <div id="collapseTwo" class="collapse" data-parent="#accordion">
          <div class="card-body">
            <div class="">
              <div class="float-right">
                <button class="btn btn-secondary"  data-toggle="modal" data-target="#addPoints">+ Add</button>
              </div> 
              <div class="table-responsive">
                <table class="table  display">
                  <thead>
                    <tr>
                      <th>#No</th>
                      <th>Currency</th>
                      <th>Amount</th>
                      <th>Equip Points</th>
                      <th>Update</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1;
                      if(!empty($points_adjust)){
                        foreach($points_adjust as $value){
                    ?>
                    <tr id="row_<?php echo $value['currency_id']; ?>">
                      <td><?php echo $i; ?></td>
                      <td><?php echo $value['currency_symbol']; ?></td>
                      <td><?php echo $value['currency_amount']; ?></td>
                      <td><?php echo $value['equivalent_point']; ?></td>
                      <td><a class="btn btn-success" onclick="getPointAdjustInfo('<?php echo $value['currency_id']; ?>');" data-toggle="modal" data-target="#updatePoints">Edit</button></a></td>
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
<div class="modal" id="updatePoints">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Points</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
              <div class="col-12 alert alert-warning"  id="Uwarning" role="alert"></div>
              <div class="col-12 alert alert-success" id="Usuccess" role="alert"></div>
        </div>
        <form action="" method="POST" id="UpdateCurrencyPointForm">
          <div class="row">
            <div class="col-6">
              <input type="hidden" name="UcurrencyId" id="UcurrencyId" value="">
              <div class="form-group">
                <label for="">Currency </label>
                <input type="text" name="Ucurrency_symbol" id="Ucurrency_symbol" class="form-control" placeholder="Currency Symbole" value="">
              </div>
              <div class="form-group">
                <label for="">Amount</label>
                <input type="text" name="Ucurrency_amount" id="Ucurrency_amount" class="form-control" placeholder="Currency Amount" value="">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="">Equ. Points</label>
                <input type="text" name="Uequivalent_point" id="Uequivalent_point" class="form-control" placeholder="Equivalent Point" value="">
              </div>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-dark float-right" id="UpdatePoints">Update</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- The Modal -->
<div class="modal" id="addPoints">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Points</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
              <div class="col-12 alert alert-warning"  id="warning" role="alert"></div>
              <div class="col-12 alert alert-success" id="success" role="alert"></div>
        </div>
        <form action="" method="POST" id="AddCurrencyPointForm">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="">Currency </label>
                <input type="text" name="currency_symbole" id="currency_symbole" class="form-control" placeholder="Currency Symbole">
              </div>
              <div class="form-group">
                <label for="">Amount</label>
                <input type="text" name="currency_amount" id="currency_amount" class="form-control" placeholder="Currency Amount">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="">Equivlent Points</label>
                <input type="text" name="equivalent_point" id="equivalent_point" class="form-control" placeholder="Equivlent point">
              </div>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-dark float-right"  id="AddPoints">Save</button>
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

  var getPointAdjustInfo = function(currency_id){
    $.ajax({
      type: 'POST',
      url: '<?php echo base_url();?>backend/Reward_gift/getPointAdjustInfo',
      data : {currency_id:currency_id},
      success:function(response){
        var res = JSON.parse(response);
        $("#Ucurrency_amount").val(res.result[0].currency_amount);
        $("#Ucurrency_symbol").val(res.result[0].currency_symbol);
        $("#Uequivalent_point").val(res.result[0].equivalent_point);
        $("#UcurrencyId").val(res.result[0].currency_id);
      }
    });
  }

  var deleteRow = function(id) {
    var result = confirm("Want to delete?");
    if (result) {
      var url = '<?php echo base_url(); ?>backend/Manage_vendors/delete_row';  
      $.ajax({
        type: "POST",
        url: url,
        data: {id: id,tbl:'currency_setup',col_name:'currency_id'},
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

  // $("#UpdatePoints").click(function(){
    //   var currency_amount = $("#Ucurrency_amount").val();
    //   var currency_symbol = $("#Ucurrency_symbol").val();
    //   var equivalent_point = $("#Uequivalent_point").val();
    //   var currency_id = $("#UcurrencyId").val();

    //   $.ajax({
    //     type: 'POST',
    //     url: '<?php echo base_url();?>backend/Reward_gift/pointAdjust_update',
    //     data : {currency_id:currency_id, currency_amount:currency_amount, currency_symbol:currency_symbol, equivalent_point:equivalent_point},
    //     success:function(response){
    //         var res = JSON.parse(response);
    //         if(res.status == 1){
    //           $("#Usuccess").html(res.message).show();
    //           window.setTimeout(function(){location.reload()},3000)
    //         } else {
    //           $("#Uwarning").html(res.message).show().fadeOut();
    //         }
    //     }
    //   });
  // });
</script>

<script>
  $(document).ready(function() {
    var form = $('#AddCurrencyPointForm');
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
        currency_symbole: {
          required: true
        },
        currency_amount:{
          required : true
        },
        equivalent_point: {
          required: true
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
        var currency_symbole = $("#currency_symbole").val();
        var currency_amount = $("#currency_amount").val();
        var equivalent_point = $("#equivalent_point").val();

        $.ajax({
          type: 'POST',
          url: '<?php echo base_url();?>backend/Reward_gift/pointsAdjust_save',
          data : {currency_symbole:currency_symbole, currency_amount:currency_amount, equivalent_point:equivalent_point},
          success:function(response){
              var res = JSON.parse(resonse);
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

  $(document).ready(function() {
    var form = $('#UpdateCurrencyPointForm');
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
        Ucurrency_amount: {
          required: true
        },
        Ucurrency_symbol:{
          required : true
        },
        Uequivalent_point: {
          required: true
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
        var currency_amount = $("#Ucurrency_amount").val();
        var currency_symbol = $("#Ucurrency_symbol").val();
        var equivalent_point = $("#Uequivalent_point").val();
        var currency_id = $("#UcurrencyId").val();

        $.ajax({
          type: 'POST',
          url: '<?php echo base_url();?>backend/Reward_gift/pointAdjust_update',
          data : {currency_id:currency_id, currency_amount:currency_amount, currency_symbol:currency_symbol, equivalent_point:equivalent_point},
          success:function(response){
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