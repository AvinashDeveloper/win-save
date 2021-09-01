
<div class="main-content-wrap sidenav-open d-flex flex-column">
  <!-- ============ Body content start ============= -->
  <div class="main-content">
    <div class="breadcrumb">
      <h1>Add</h1>
      <ul>

        <li>Venders</li>
      </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <div class="row">
      <!-- order-card start -->
      <div class="col-sm-12">
        <div class="card tabs-card">
          <div class="card-block p-0">
            <!-- Nav tabs -->
            <div class="container">
              <div class="form-sec p-4">
                <?php  //echo form_open_multipart('vender_account')?>
                <?php if( $error = $this->session->flashdata('cr_ac')): ?>
                  <div class="form-group">
                    <div class="input-icon">
                      <div class="alert alert-dismissible alert-success" id="successMessage">
                        <?php echo $error; ?>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>
                <form action="" method="POST" id="AddVendorForm">
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Name:</label>
                        <input type="text" class="form-control" required="" name="name" id="name" placeholder="Enter Name" value="" >
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>E-mail:</label>
                        <input type="email" class="form-control" required="" name="email" id="name" placeholder="Enter Email" value="">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Contact:</label>
                        <input type="number" class="form-control" required="" name="contact" id="name" placeholder="Enter Contact" value="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Password:</label>
                        <input type="password" class="form-control" required="" name="password" id="name" placeholder="Enter Password" value="" >
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>City:</label>
                        <input type="text" class="form-control" required="" name="v_city" id="name" placeholder="Enter City" value="">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Address:</label>
                        <textarea name="address" class="form-control"  placeholder="Enter Your Address"  required="required"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="prof" class="btn btn-default">Profile image</label>
                        <input type="file" value="" name="files[]"  id="prof">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">

                        <label for="nationalprof" class="btn btn-default">Logo Image</label>

                        <input type="file" value="" name="files[]"  id="nationalprof">

                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">

                        <label for="businprof" class="btn btn-default">Business prof</label>

                        <input type="file" value="" name="files[]"  id="businprof">

                      </div>
                    </div>
                  </div> 
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">

                        <label for="" class="btn btn-default">Menu prof</label>

                        <input type="file" value="" name="files[]" >

                      </div>
                    </div>
                    <div class="col-sm-4">

                    </div>
                    <div class="col-sm-4">

                    </div>
                  </div>
                  <hr>
                  <h2>Branch Detail</h2>  
                  <div class="row"><!-- order-card start -->
                    <div class="col-sm-12">
                      <div class="card">
                        <div class="card-body">
                          <?php if( $error=$this->session->flashdata('branch_save')): ?>
                            <div class="form-group">
                              <div class="input-icon">
                                <div class="alert alert-dismissible alert-success" id="successMessage">
                                  <?php echo $error; ?>
                                </div>
                              </div>
                            </div>
                          <?php endif; ?>
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label for="">Branch name</label>
                                <input type="text" name="branch_name" class="form-control" value="" required="required">
                              </div>
                            </div>
                            <div class="col-sm-6" >
                              <div class="form-group">
                                <label for="">Region</label>
                                <select name="region" id="region" class="form-control" >
                                  <?php echo region();?>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-6" >
                              <div class="form-group">
                                <label for="">Telephone Number</label>
                                <input type="number" name="phone_num"  class="form-control" value="" >
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label for="">City</label>
                                <select name="city"  class="form-control" id="city" value="" required="required">
                                  <?php echo city();?>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label for="">Mobile Number</label>
                                <input type="number" name="mobile" class="form-control" value="" required="required">
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label for="">District</label>
                                <input type="text" name="dict" class="form-control" value="" id="state">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label for="">Address</label>
                                <input type="textarea" name="address"  class="form-control" id="address" value="" required="">
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label for="">Other Address</label>
                                <input type="text" name="other_add" class="form-control" value="">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label for="">latitude</label>
                                <input type="text" name="lattitude"  class="form-control" id="latt" value="" required="">
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label for="">Longitude</label>
                                <input type="text" name="logitude" id="long" class="form-control" value="">
                              </div>
                            </div>
                          </div>
                          <div class="float-right">
                            <input type="submit" name="submit" value="submit" class="btn btn-success">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <!-- Tab panes -->
            </div>
          </div>
        </div>
        <!-- tabs card end -->
      </div>
    </div>
  </div>


<script>
  $("#region").on('change', function(){
    var region_id = $("#region").val();
    $.ajax({
      type : 'POST',
      url : '<?php echo base_url();?>backend/Manage_vendors/getCityInfo',
      data : {regionId : region_id,select : ''},
    })
    .done(function(result){
      $("#city").html(result);
    });
  });
</script>

<script>
  $(document).ready(function() {
    var form = $('#AddVendorForm');
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
        name: {
          required: true
        },
        email:{
          required : true,
          email :true
        },
        contact: {
          required :true,
          minlength:10,
          maxlength:12
        },
        password:{
          required :true,
          minlength:6
        },
        v_city:{
          required :true
        },
        address:{
          required :true
        },
        branch_name:{
          required :true
        },
        phone_num:{
          required :true,
          minlength:10,
          maxlength:12
        },
        mobile:{
          required :true,
          minlength:10,
          maxlength:12
        },
        region:{
          required :true
        },
        city:{
          required :true
        },
        dict:{
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
  $(document).ready(function(){  
    $('#address').blur(function(){

      var selectedValue = $(this).val();
      var city          = $("#city").val(); 
      var state         = $("#state").val();  

      $.ajax({
        type:'POST',
        url:'<?php echo base_url(); ?>backend/Vendor/vendors/get_lat_long',
        data: {data : selectedValue,city : city,state : state},
        success: function(data) {                            
          var res = $.parseJSON(data);
          var latitude = res.results.latitude;
          var long = res.results.longitude;
          $("#latt").val(latitude);
          $("#long").val(long);
        }
      });
    });  
  });
</script>
