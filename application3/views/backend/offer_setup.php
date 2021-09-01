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
        <h1 class="mr-2">Offer</h1>
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
              1. Offer Type Setup
            </a>
          </div>
          <div id="collapseTwo" class="collapse" data-parent="#accordion">
            <div class="card-body">
              <div class="">
                <div class="float-right">
                  <!-- <button class="btn btn-secondary"  data-toggle="modal" data-target="#addOfferSetup">+ Add</button> -->
                </div> 
                <div class="table-responsive">
                  <table class="table  display">
                    <thead>
                      <tr>
                        <th>#No</th>
                        <th>Offers Type</th>
                        <th>Description English</th>
                        <th>Description Arabic</th>
                        <th>Display Icon</th>
                        <th>View / Edit</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1;
                        if(!empty($o_membershipInfo)){
                          foreach($o_membershipInfo as $value){
                      ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $value['offer_type']; ?></td>
                        <td><?php echo $value['description']; ?></td>
                        <td><?php echo translateText($value['description']); ?></td>
                        <td><img src="<?php echo base_url('/assets/images/offer_plan/').$value['setup_image']; ?>" alt="display_icon" width="100px" height="auto"></td>
                        <td><button class="btn btn-success" onclick="getOfferSetupInfo('<?php echo $value['setup_id']; ?>');" data-toggle="modal" data-target="#updateOfferSetup">Update</button></td>
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
<div class="modal" id="updateOfferSetup">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update offer Plans</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
              <div class="col-12 alert alert-warning"  id="Uwarning" role="alert"></div>
              <div class="col-12 alert alert-success" id="Usuccess" role="alert"></div>
        </div>
        <form action="" method="POST" id="OfferSetupUpdateForm">
          <div class="row">
            <div class="col-6">
            <input type="hidden" name="setup_id" id="setup_id" value="">
              <div class="form-group">
                <label for="">Offer type</label>
                <input type="text" name="offer_type" id="Uoffer_type" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Display English</label>
                <textarea class="form-control" name="description_en" id="Udescription_en" ></textarea>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="">Display Arabic</label>
                <textarea class="form-control" name="description_ar" id="Udescription_ar"></textarea>
              </div>
              <div class="form-group">
                <label for="">Display icon</label>
                <input type="file" name="setup_image" id="Usetup_image" class="form-control" value="">
                <img src="" id="image_file" width="100px" height="auto">
              </div>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-dark float-right" id="UpdateOfferSetup">Update</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal" id="addOfferSetup">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add  Offer Plans </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
              <div class="col-12 alert alert-warning"  id="warning" role="alert"></div>
              <div class="col-12 alert alert-success" id="success" role="alert"></div>
        </div>
        <form action="" method="POST" id="OfferSetupAddForm">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="">Offer type</label>
                <input type="text" name="offer_type" id="offer_type" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Display English</label>
                <textarea class="form-control" name="description_en" id="description_en"></textarea>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="">Display Arabic</label>
                <textarea class="form-control" name="description_ar" id="description_ar"></textarea>
              </div>
              <div class="form-group">
                <label for="">Display icon</label>
                <input type="file" name="setup_image" id="setup_image" class="form-control" >
              </div>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-dark float-right" id="AddOfferSetup">Save</button>
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

  $("#AddOfferSetup").click(function(e){
    e.preventDefault();
		var postData = new FormData($("#OfferSetupAddForm")[0]);
    $.ajax({
      type: 'POST',
      url: '<?php echo base_url();?>backend/Membership/OfferSetup_save',
      processData: false,
      cache: false,
      contentType: false,
      data : postData,
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
  })

  var getOfferSetupInfo = function(setup_id){
    $.ajax({
      type : "POST",
      url : "<?php echo base_url();?>backend/Membership/getOfferSetupInfo",
      data : {setup_id:setup_id},
      success:function(data){
        var getInfo = JSON.parse(data);
        // console.log(getInfo.result);
        $("#setup_id").val(getInfo.result[0].setup_id);
        $("#Uoffer_type").val(getInfo.result[0].offer_type);
        $("#Udescription_en").val(getInfo.result[0].description_en);
        $("#Udescription_ar").val(getInfo.result[0].description_ar);
        $("#image_file").attr('src', getInfo.result[0].setup_image);
      }
    })
  }

  $("#UpdateOfferSetup").click(function(e){
    e.preventDefault();
		var postData = new FormData($("#OfferSetupUpdateForm")[0]);
    $.ajax({
      type: 'POST',
      url: '<?php echo base_url();?>backend/Membership/offerSetup_update',
      processData: false,
      cache: false,
      contentType: false,
      data : postData,
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