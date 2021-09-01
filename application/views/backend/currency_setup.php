
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
      <h1 class="mr-2">System Setup</h1>
      <ul>
        <li><a href="#">Admin</a></li>
        <li>Currency Setup</li>

      </ul>

    </div>

    <div class="separator-breadcrumb border-top"></div>
    <div id="accordion">
      <div class="card">
        <div class="card-header">
          <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
            1. Currency setup
          </a>
        </div>
        <div id="collapseTwo" class="collapse" data-parent="#accordion">

          <div class="card-body">
            <div class="">
              <div class="float-right">
                <button class="btn btn-secondary" data-toggle="modal" data-target="#addCurrency">+ Add</button>
              </div> 
              <div class="table-responsive">
                <table class="table  display">
                  <thead>
                    <tr>
                      <th>#No</th>
                      <th>Currency</th>
                      <th>Default Country</th>
                      <th>Symbol En.</th>
                      <th>Symbol Ar.</th>
                      <th>Adjust to Saudi Riyal</th>
                      <th>Update</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1;
                    if(!empty($currency_info)){
                      foreach($currency_info as $value){
                        ?>
                        <tr id="row_<?php echo $value['currency_id']; ?>">
                          <td><?php echo $i; ?></td>
                          <td><?php echo ucwords($value['currency_name']); ?></td>
                          <td><?php echo $value['currency_country_name'];?>
<!-- <select class="form-control">
<option>saudi Arabia</option>
<option>Usa</option>
</select> -->
</td>
<td><?php echo $value['currency_symbol']; ?></td>
<td><?php echo translateText($value['currency_symbol']); ?></td>
<td><?php echo $value['adjust_currency']; ?></td>
<td><a class="btn btn-success" onclick="getCurrencyInfo('<?php echo $value['currency_id']; ?>');" data-toggle="modal" data-target="#updateCurrency">Updatet</button></a></td>
<td><span class="text-danger" onclick="deleteRow('<?php echo $value['currency_id']; ?>');"><i class="fa fa-close"></i></span></td>
</tr>
<?php $i++; }} ?>
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
<div class="modal" id="updateCurrency">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Currency</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
              <div class="col-12 alert alert-warning"  id="Uwarning" role="alert"></div>
              <div class="col-12 alert alert-success" id="Usuccess" role="alert"></div>
        </div>
        <form action="" method="POST" id="UpdateCurrencyForm">
          <div class="row">
            <div class="col-6">
              <input type="hidden" name="UcurrencyId" id="UcurrencyId" value="">
              <div class="form-group">
                <label for="">Currency </label>
                <input type="text" name="Ucurrency_name" id="Ucurrency_name" value="" class="form-control" placeholder="Currency Name">
              </div>
              <div class="form-group">
                <label for="">Currency Symbol</label>
                <input type="text" name="Ucurrency_symbol" id="Ucurrency_symbol" class="form-control" placeholder="Currency Symbol" value="">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="">Currency Country</label>
                <select class="form-control" name="Ucurrency_country" id="Ucurrency_country">
                  <option value="">Select Country</option>
                  <?php echo country(); ?>
                </select>
              </div>
              <div class="form-group">
                <label for="">Adjust Currency (to SR)</label>
                <input type="text" name="Uadjust_currency" id="Uadjust_currency" class="form-control" placeholder="Adjust Currency" value="">
              </div>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-dark float-right" id="UpdateCurrency">Update</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- The Modal -->
<div class="modal" id="addCurrency">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Currency</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
              <div class="col-12 alert alert-warning"  id="warning" role="alert"></div>
              <div class="col-12 alert alert-success" id="success" role="alert"></div>
        </div>
        <form action="" method="POST" id="AddCurrencyForm">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="">Currency </label>
                <input type="text" name="currency_name" id="currency_name" class="form-control" placeholder="Currency Name">
              </div>
              <div class="form-group">
                <label for="">Currency Symbol</label>
                <input type="text" name="currency_symbol" id="currency_symbol" class="form-control" placeholder="Currency Symbol">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="">Currency Country</label>
                <select class="form-control" name="currency_country" id="currency_country">
                  <option value="">Select Country</option>
                  <?php echo country(); ?>
                </select>
              </div>
              <div class="form-group">
                <label for="">Adjust Currency (to SR)</label>
                <input type="text" name="adjust_currency" id="adjust_currency" class="form-control" placeholder="Adjust Currency">
              </div>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-dark float-right" id="ADDCurrency">Save</button>
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

  var getCurrencyInfo = function(currency_id){
    $.ajax({
      type: 'POST',
      url: '<?php echo base_url();?>backend/Settings/getCurrencyInfo',
      data : {currency_id:currency_id},
      success:function(response){
        var res = JSON.parse(response);
        $("#Ucurrency_name").val(res.result[0].currency_name);
        $("#Ucurrency_symbol").val(res.result[0].currency_symbol);
        $("#Ucurrency_country").val(res.result[0].currency_country);
        $("#Uadjust_currency").val(res.result[0].adjust_currency);
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

  // $("#UpdateCurrency").click(function(){
  //   var currency_name = $("#Ucurrency_name").val();
  //   var currency_symbol = $("#Ucurrency_symbol").val();
  //   var currency_country = $("#Ucurrency_country").val();
  //   var adjust_currency = $("#Uadjust_currency").val();
  //   var currency_id = $("#UcurrencyId").val();

  //   $.ajax({
  //     type: 'POST',
  //     url: '<?php echo base_url();?>backend/Settings/currency_update',
  //     data : {currency_id:currency_id, currency_name:currency_name, currency_symbol:currency_symbol, currency_country:currency_country, adjust_currency:adjust_currency},
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
    var form = $('#AddCurrencyForm');
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
        currency_name: {
          required: true
        },
        currency_symbol:{
          required : true
        },
        currency_country: {
          required: true
        },
        adjust_currency:{
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
        var currency_name = $("#currency_name").val();
        var currency_symbol = $("#currency_symbol").val();
        var currency_country = $("#currency_country").val();
        var adjust_currency = $("#adjust_currency").val();

        $.ajax({
          type: 'POST',
          url: '<?php echo base_url();?>backend/Settings/currency_save',
          data : {currency_name:currency_name, currency_symbol:currency_symbol, currency_country:currency_country, adjust_currency:adjust_currency},
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

  $(document).ready(function() {
    var form = $('#UpdateCurrencyForm');
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
        Ucurrency_name: {
          required: true
        },
        Ucurrency_symbol:{
          required : true
        },
        Ucurrency_country: {
          required: true
        },
        Uadjust_currency:{
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
        var currency_name = $("#Ucurrency_name").val();
        var currency_symbol = $("#Ucurrency_symbol").val();
        var currency_country = $("#Ucurrency_country").val();
        var adjust_currency = $("#Uadjust_currency").val();
        var currency_id = $("#UcurrencyId").val();

        $.ajax({
          type: 'POST',
          url: '<?php echo base_url();?>backend/Settings/currency_update',
          data : {currency_id:currency_id, currency_name:currency_name, currency_symbol:currency_symbol, currency_country:currency_country, adjust_currency:adjust_currency},
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