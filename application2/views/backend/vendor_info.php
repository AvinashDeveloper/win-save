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
      <h1 class="mr-2">Manange</h1>
      <ul>
        <li><a href="#">Vendor</a></li>
        <li>Details</li>

      </ul>

    </div>

    <div class="separator-breadcrumb border-top"></div>



    <div id="accordion">

      <div class="card">
        <div class="card-header">
          <a class="card-link" data-toggle="collapse" href="#collapseOne">
            1. Vendor Details
          </a>
        </div>
        <div id="collapseOne" class="collapse" data-parent="#accordion">
          <div class="card-body">
            <form action="" method="post" enctype='multipart/form-data'>

              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label for="">Vendor Name En.</label>
                    <input type="text" name="name" class="form-control" value="<?php print_r($store_setup[0]['name']);  ?>">
                  </div>
                  <div class="form-group">
                    <label for="">Commerce Id</label>
                    <input type="number" name="id" class="form-control" value="<?php print_r($store_setup[0]['id']);  ?>">
                  </div>
                  <div class="form-group">
                    <label for="">Business Proof</label>
                    <input type="file" name="business_proof"  class="form-control">
                    <input type="hidden" name="business_proof" value="<?php print_r($store_setup[0]['business_proof']);  ?>">
                    <img src="<?php  echo base_url();  ?>assets/images/vendors/store_img/<?php print_r($store_setup[0]['business_proof']);  ?>" class="img-fluid">
                  </div>

                </div>
                <div class="col-6">
                  <div class="dropdown-divider"></div>
                  <h5>HQ Address</h5>
                  <div class="dropdown-divider"></div>
                  <div class="form-group">
                    <label for="">City</label>
                    <select class="form-control" name="city">
                      <option value="jeddah">jeddah</option>
                      <option value="Madina">Madina</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Country</label>
                    <select class="form-control" name="country">
                      <option value="Saudi arabia">Saudi arabia</option>
                      <option value="India">India</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" value="<?php print_r($store_setup[0]['email']);  ?>">
                  </div>
                  <div class="form-group">
                    <label for="">Telephone</label>
                    <input type="number" name="contact" class="form-control" value="<?php print_r($store_setup[0]['contact']);  ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <button type="submit" class="btn btn-dark  float-right" name="vender_detail">Submit</button>
                </div>
              </div>

              <br/>

            </form>
          </div>
        </div>
      </div>
      <br/></br>
      <div class="card">
        <div class="card-header">
          <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
            2. Contacts
          </a>
        </div>
        <div id="collapseTwo" class="collapse" data-parent="#accordion">

          <div class="card-body">
            <div class="">
              <div class="float-right">
                <button class="btn btn-secondary addbutton"  data-toggle="modal" data-target="#contacts">+ Add</button>
              </div>

              <div class="table-responsive" style="height:auto;">
                <table class="table table-bordered table-hover display" >
                  <thead>
                    <tr>
                      <th>#Id</th>
                      <th>Title</th>
                      <th>Name</th>
                      <th>Mobile</th>
                      <th>Email</th>
                      <th>Note</th>
                      <th>Status</th>
                      <th>Reset Password</th>
                      <th>Update</th>
                      <th>Remove</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1;

                    foreach ($ven_contacts as $key) { ?>
                      <tr>
                        <td><?php  echo $i;?></td>
                        <td><?php echo $key->title;  ?></td>
                        <td><?php echo $key->name;  ?></td>
                        <td><?php echo $key->contact;  ?></td>
                        <td><?php echo $key->email;  ?></td>
                        <td><?php echo $key->note;  ?></td>
                        <?php if( strtolower($key->status) == 'active'){?>
                        <td><button class="btn btn-info" onclick="changeStatus(<?php echo $key->v_contact_id; ?>);"><?php echo $key->status; ?></button></td>             
                        <?php }else{
                        ?>
                        <td><button class="btn btn-success" onclick="changeStatus(<?php echo $key->v_contact_id; ?>);"><?php echo $key->status; ?></button></td>  
                        <?php }?>
                        <td><button class="btn btn-info" data-toggle="modal" data-target="#reset_password">Reset</button></td>
                        <td><button class="btn btn-success" onclick="getUpdateData('<?php echo $key->v_contact_id?>','<?php echo $key->v_id;?>');" data-toggle="modal" data-target="#contacts_update">update</button></td>
                        <td><a onclick="return confirm('Are you sure?');" href="<?php echo base_url(); ?>backend/Login/contat_delete/<?php echo $key->v_contact_id; ?>/<?php echo $this->uri->segment(4);  ?>"><span class="text-danger"><i class="fa fa-close"></i></span></a></td>
                      </tr>
                      <?php  $i++;} ?>  
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- Footer Start -->
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
  <div class="search-results list-horizontal">
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
<div class="modal" id="contacts">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Contacts</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="" id="modal_form_id" method="POST">
          <div class="row">
            <div class="col-6">

              <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title" class="form-control c_title" value="" >
              </div>
              <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control c_name" value="">
              </div>
              <div class="form-group">
                <label for="">Mobile</label>
                <input type="number" name="contact" class="form-control c_contact" value="">
              </div>
              <div class="form-group">
                <label>Status</label>
                <select class="form-control c_status" name="c_status">
                  <option value="1">Active</option>
                  <option value="0">Inactive</option>
                </select>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control c_email" value="">
              </div>
              <div class="form-group">
                <label for="">Note</label>
                <textarea class="form-control c_note" cols="5" rows="5" name="note"></textarea>
              </div>
              <input type="hidden" name="" class="v_id" value="<?php echo $this->uri->segment(4);  ?>">

            </div>
            <div class="col-12">
              <button type="button" class="btn btn-dark float-right contactSave">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- the Modal -->
<div class="modal" id="reset_password">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Reset Password</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form id="modal_form_id2" method="POST">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="">Old Password</label>
                <input type="password" name="old_password"id="old_password" class="form-control c_title" value="" >
              </div>
              <div class="form-group">
                <label for="">New Password</label>
                <input type="password" name="new_password" id="new_password" class="form-control c_name" value="">
              </div>
              <div class="form-group">
                <label for="">Confirm Paasword</label>
                <input type="password" name="confirm_password" id="confirm_password" class="form-control c_contact" value="">
              </div>
            </div>
            <div class="col-12">
              <button type="button" class="btn btn-dark float-right"  onclick="updatePassword('<?php echo $key->v_contact_id?>','<?php echo $key->v_id;?>');">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal" id="contacts_update">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Contacts</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" id="form_input">
        <form action="<?php echo base_url(); ?>backend/Login/updateContactInfo" id='modal_form_id2' method='POST'>
          <div class='row'>
                <div class='col-6'>
                      <div class='form-group'>
                            <label for=''>Title</label>
                            <input type='text' name='title' id='title_' class='form-control c_title' value='' >
                      </div>
                      <div class='form-group'>
                            <label for=''>Name</label>
                            <input type='text' name='name' id='name_' class='form-control c_name' value=''>
                      </div>
                      <div class='form-group'>
                            <label for=''>Mobile</label>
                            <input type='number' name='contact' id='contact' class='form-control c_contact' value=''>
                      </div>
                      <div class='form-group'>
                            <label>Status</label>
                            <select class='form-control c_status' name='c_status' id='status'>
                                  <?php echo status(); ?>
                            </select>
                      </div>
                </div>
                <div class='col-6'>
                      <div class='form-group'>
                            <label for=''>Email</label>
                            <input type='email' name='email' id='email' class='form-control c_email' value=''>
                      </div>
                      <div class='form-group'>
                            <label for=''>Note</label>
                            <textarea class='form-control c_note' cols='5' rows='5' name='note' id='note'></textarea>
                      </div>
                      <input type='hidden' name='v_id' class='v_id' id='v_id' value=''>
                      <input type='hidden' name='v_contact_id' id='v_contact_id' class='v_contact_id' value=''>            
                </div>
                <div class='col-12'>
                      <button type='submit' class='btn btn-dark float-right'>Update</button>
                </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  // script for get vendor contact info
  var getUpdateData = function(contactId,vandorId){
      $.ajax({
        type:'POST',
        url:'<?php echo base_url(); ?>backend/Login/getContactInfo',
        data :{contactId:contactId,vandorId:vandorId},
        success:function(data){
          var getInfo = JSON.parse(data);
          // console.log(Object.values(getInfo.result));
          // alert(getInfo.result[0].note);
          $("#title_").val(getInfo.result[0].title);
          $("#v_contact_id").val(getInfo.result[0].v_contact_id);
          $("#v_id").val(getInfo.result[0].v_id);
          $("#name_").val(getInfo.result[0].name);
          $("#contact").val(getInfo.result[0].contact);
          $("#email").val(getInfo.result[0].email);
          $("#note").val(getInfo.result[0].note);
          $("#status").val(getInfo.result[0].status);
          // $("#form_input").html(data);    
        }
      });
  }

  // script for reset password
  var updatePassword = function(contactId,vandorId){
    var old_password = $("#old_password").val();
    var new_password = $("#new_password").val();
    var confirm_password = $("#confirm_password").val();

    $.ajax({
      type : 'POST',
      url : '<?php echo base_url();?>backend/Login/resetContactPassword',
      data : {contactId:contactId,vandorId:vandorId,old_password:old_password,new_password:new_password,confirm_password:confirm_password},
      success:function(data){
        var value = JSON.parse(data);
        if(value.status == 1){
          alert(value.message);
          location.reload();
        } else {
          alert(value.message);
        }
      }
    });
  }

  // script for change status
  var changeStatus = function(id){
    var get = confirm("Want to change status?");
    if(get){
      var url =  '<?php echo base_url(); ?>backend/Manage_vendors/changeStatus';
      $.ajax({
        type : 'POST',
        url : url,
        data : {id:id,tbl:'vender_contact',col_name:'v_contact_id'},
      })
      .done(function(result){
        location.reload(true);
      });
    }
  }
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

<script>
  $(document).ready(function(){  
    $('.contactSave').click(function(){
      var name = $('.c_name').val();
      if (name=="") {alert('Enter Name');exit();}
      var title = $('.c_title').val();
      if (title=="") {alert('Enter title');exit();}
      var contact = $('.c_contact').val();
      if (contact=="") {alert('Enter contact');exit();}
      var email = $('.c_email').val();
      if (email=="") {alert('Enter email');exit();}
      var note = $('.c_note').val();
      if (note=="") {alert('Enter note');exit();}
      var status = $('.c_status').val();
      if (status=="") {alert('Enter status');exit();}
      var v_id = $('.v_id').val();
      $.ajax({
        type:'POST',
        url:'<?php echo base_url(); ?>backend/Login/vender_contact',

        data :{title:title,name:name,contact:contact,email:email,note:note,status:status,v_id:v_id},
        success:function(data){
          alert('Contact Save');
          setTimeout(function(){
            location.reload(true);

          }, 3000);       
        }
      });
    });  
  });
</script>