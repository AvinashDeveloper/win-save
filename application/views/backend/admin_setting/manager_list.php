
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
        <li>Manager List</li>
      </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <div id="accordion">
      <div class="card">
        <div class="card-header">
          <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
            1. Manager List
          </a>
        </div>
        <div id="collapseTwo" class="collapse" data-parent="#accordion">
          <div class="card-body">
            <div class="">
              <div class="float-right">
                <button class="btn btn-secondary"  data-toggle="modal" data-target="#addInfo">+ Add</button>
              </div> 
              <div class="table-responsive">
                <table class="table table-bordered table-striped  display">
                  <thead>
                    <tr>
                      <th>#No</th>
                      <th>Name</th>
                      <th>User Name(Email)</th>
                      <th>Mobile</th>
                      <th>Password</th>
                      <th>Manager Roles</th>
                      <th>View / Edit</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1;
                      if(!empty($manager_info)){
                        foreach($manager_info as $value){
                    ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <th><?php echo $value['name']; ?></th>
                      <td><?php echo $value['email']; ?></td>
                      <td><?php echo $value['contact']; ?></td>
                      <td><?php echo $value['pass']; ?></td>
                      <td><?php echo roleString($value['type']); ?></td>
                      <td><button class="btn btn-success" onclick="getMangerInfo('<?php echo $value['id'];?>');" data-toggle="modal" data-target="#updateManagerInfo">Edit</button></td>
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
<div class="modal" id="updateManagerInfo">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Manager</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
            <div class="col-12 alert alert-warning"  id="Uwarning" role="alert"></div>
            <div class="col-12 alert alert-success" id="Usuccess" role="alert"></div>
        </div>
        <form action="" method="POST" id="UpdateManagerForm">
          <div class="row">
            <div class="col-6">
              <input type="hidden" name="contact_id" id="contact_id" value="">
              <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Name">
              </div>
              <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email">
              </div>
              <div class="form-group">
                <label for="">Mobile No.</label>
                <input type="number" name="mobile" id="mobile" class="form-control" placeholder="Mobile No">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
              </div>
              <div class="form-group">
                <label for="">Manager Roles</label>
                <select class="form-control" name="role_id" id="role_id" >
                  <?php echo getAdminRole(); ?>
                </select>
              </div>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-dark float-right" id="UpdateInfo">Update</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- The Modal -->
<div class="modal" id="addInfo">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Manager</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
            <div class="col-12 alert alert-warning"  id="warning" role="alert"></div>
            <div class="col-12 alert alert-success" id="success" role="alert"></div>
        </div>
        <form action="" method="POST" id="AddManagerForm">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="Aname" id="Aname" placeholder="Name" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="Aemail" id="Aemail" placeholder="Email" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Mobile No.</label>
                <input type="number" name="Amobile" id="Amobile" class="form-control">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="Apassword" id="Apassword" class="form-control" placeholder="Password">
              </div>
              <div class="form-group">
                <label for="">Manager Roles</label>
                <select class="form-control" name="Arole_id" id="Arole_id">
                  <?php echo getAdminRole();?>
                </select>
              </div>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-dark float-right" id="AddInfo">Save</button>
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

  var getMangerInfo = function(id){
    $.ajax({
      type : 'POST',
      url : '<?php echo base_url();?>backend/Admin_settings/getMangerInfo',
      data : {id : id},
      success : function(res){
        var ress = JSON.parse(res);
          $('#contact_id').val(ress.result[0].id);
          $("#name").val(ress.result[0].name);
          $("#email").val(ress.result[0].email);
          $("#mobile").val(ress.result[0].contact);
          $("#password").val(ress.result[0].pass);
          $("#role_id").val(ress.result[0].type);
      }
    });
  }

  // $("#AddInfo").click(function(){
  //   var name = $("#Aname").val();
  //   var email = $("#Aemail").val();
  //   var mobile = $("#Amobile").val();
  //   var password = $("#Apassword").val();
  //   var role_id = $("#Arole_id").val();

  //   $.ajax({
  //     type : 'POST',
  //     url : '<?php echo base_url(); ?>backend/Admin_settings/saveManagerinfo',
  //     data : {role_id:role_id,mobile:mobile, name:name, email:email,password:password},
  //     success : function(res){
  //       var ress = JSON.parse(res);
  //       if(ress.status == 1){
  //         $("#success").html(ress.message).show();
  //         window.setTimeout(function(){location.reload()},3000)
  //       } else {
  //         $("#warning").html(ress.message).show().fadeOut();
  //       }
  //     }
  //   });
  // });

  // $("#UpdateInfo").click(function(){
  //   var contact_id = $('#contact_id').val();
  //   var name = $("#name").val();
  //   var email = $("#email").val();
  //   var mobile = $("#mobile").val();
  //   var password = $("#password").val();
  //   var role_id = $("#role_id").val();

  //   $.ajax({
  //     type : 'POST',
  //     url : '<?php echo base_url(); ?>backend/Admin_settings/updateManagerinfo',
  //     data : {role_id:role_id,mobile:mobile, contact_id:contact_id, name:name, email:email,password:password},
  //     success : function(res){
  //       var ress = JSON.parse(res);
  //       if(ress.status == 1){
  //         $("#Usuccess").html(ress.message).show();
  //         window.setTimeout(function(){location.reload()},3000)
  //       } else {
  //         $("#Uwarning").html(ress.message).show().fadeOut();
  //       }
  //     }
  //   });
  // });
</script>

<script>
    $(document).ready(function() {
			var form = $('#AddManagerForm');
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
					Aname: {
						required: true
					},
					Aemail:{
						required : true,
						email :true
					},
					Amobile: {
            required : true,
            digits : true,
            minlength : 10,
            maxlength : 12
					},
					Apassword:{
            required :true,
            minlength : 6
          },
          Arole_id : {
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
          var name = $("#Aname").val();
          var email = $("#Aemail").val();
          var mobile = $("#Amobile").val();
          var password = $("#Apassword").val();
          var role_id = $("#Arole_id").val();

          $.ajax({
            type : 'POST',
            url : '<?php echo base_url(); ?>backend/Admin_settings/saveManagerinfo',
            data : {role_id:role_id,mobile:mobile, name:name, email:email,password:password},
            success : function(res){
              var ress = JSON.parse(res);
              if(ress.status == 1){
                $("#success").html(ress.message).show();
                window.setTimeout(function(){location.reload()},3000)
              } else {
                $("#warning").html(ress.message).show().fadeOut();
              }
            }
          });
				}
			});
    });
    
    $(document).ready(function() {
			var form = $('#UpdateManagerForm');
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
					mobile: {
            required : true,
            digits : true,
            minlength : 10,
            maxlength : 12
					},
					password:{
            required :true,
            minlength : 6
          },
          role_id : {
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
          var contact_id = $('#contact_id').val();
          var name = $("#name").val();
          var email = $("#email").val();
          var mobile = $("#mobile").val();
          var password = $("#password").val();
          var role_id = $("#role_id").val();

          $.ajax({
            type : 'POST',
            url : '<?php echo base_url(); ?>backend/Admin_settings/updateManagerinfo',
            data : {role_id:role_id,mobile:mobile, contact_id:contact_id, name:name, email:email,password:password},
            success : function(res){
              var ress = JSON.parse(res);
              if(ress.status == 1){
                $("#Usuccess").html(ress.message).show();
                window.setTimeout(function(){location.reload()},3000)
              } else {
                $("#Uwarning").html(ress.message).show().fadeOut();
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