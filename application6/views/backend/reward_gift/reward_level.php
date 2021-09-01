
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
      <h1 class="mr-2">Rewards And Gift</h1>
      <ul>
        <li><a href="#">Admin</a></li>
        <li>Reward Level</li>
      </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <div id="accordion">
      <div class="card">
        <div class="card-header">
          <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
            1. Rewards Level
          </a>
        </div>
        <div id="collapseTwo" class="collapse" data-parent="#accordion">
          <div class="card-body">
            <div class="">
              <div class="float-right">
              <?php if($level_count <= 6){?>
                <button class="btn btn-secondary"  data-toggle="modal" data-target="#addLevels">+ Add</button>
              <?php } ?>
              </div> 
              <div class="table-responsive">
                <table class="table  display">
                  <thead>
                    <tr>
                      <th>#No</th>
                      <th>Level</th>
                      <th>Level Name En.</th>
                      <th>Gift Description En.</th>
                      <th>Level Name Ar.</th>
                      <th>Gift Description Ar.</th>
                      <th>Gift Value</th>
                      <th>Required Point</th>
                      <th>View / Edit</th>
                      <th>Assign Gifts from inventory</th>
                      <th>Manage Gifts level</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1;
                      if(!empty($level_info)){
                        foreach($level_info as $value){
                    ?>
                    <tr id="row_<?php echo $value['level_id']; ?>">
                      <td><?php echo $i; ?></td>
                      <td><?php echo $value['level_number']; ?></td>
                      <td><?php echo $value['level_name']; ?></td>
                      <td><?php echo $value['gift_description']; ?></td>
                      <td><?php echo translateText($value['level_name']); ?></td>
                      <td><?php echo translateText($value['gift_description']); ?></td>
                      <td><?php echo $value['gift_values']; ?></td>
                      <td><?php echo $value['required_points']; ?></td>
                      <td><button class="btn btn-success" onclick="getRewardLevelInfo('<?php echo $value['level_id']?>');" data-toggle="modal" data-target="#updateLevels">Edit</button></td>
                      <td><a class="btn btn-info" href="<?php echo base_url(); ?>Gift-senario" >Assign Gifts</a></td>
                      <td><a class="btn btn-warning" href="<?php echo base_url(); ?>Manage-gift">Manage Gifts</a></td>
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
<div class="modal" id="updateLevels">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Rewards Level</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
      <div class="row">
              <div class="col-12 alert alert-warning"  id="Uwarning" role="alert"></div>
              <div class="col-12 alert alert-success" id="Usuccess" role="alert"></div>
        </div>
        <form action="" method="POST">
          <div class="row">
            <div class="col-6">
              <input type="hidden" name="Ulevel_id" id="Ulevel_id" value="">
              <div class="form-group">
                <label for="">Level</label>
                <input type="text" class="form-control" name="Ulevel_number" value="" id="Ulevel_number">
              </div>
              <div class="form-group">
                <label for="">Level Name English</label>
                <input type="text" class="form-control" name="Ulevel_name_en" value="" id="Ulevel_name_en" placeholder="Level Name English">
              </div>
              <div class="form-group">
                <label for="">Gift Value</label>
                <input type="text" class="form-control" name="Ugift_values" value="" id="Ugift_values" placeholder="Gift Values">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="">Level Name Arabic</label>
                <input type="text" name="Ulevel_name_ar" id="Ulevel_name_ar" value="" class="form-control" placeholder="Level Name Arabic">
              </div>
              <div class="form-group">
                <label for="">Description</label>
                <textarea name="Ugift_description_en" id="Ugift_description_en" class="form-control" placeholder="Description"></textarea>
              </div>
              <div class="form-group">
                <label for="">Required Point</label>
                <input type="text" name="Urequired_points" value="" id="Urequired_points" class="form-control" placeholder="Required points">
              </div>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-dark float-right" id="UpdateRewardLevel">Save</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



<!-- The Modal -->
<div class="modal" id="addLevels">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Country</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
              <div class="col-12 alert alert-warning"  id="warning" role="alert"></div>
              <div class="col-12 alert alert-success" id="success" role="alert"></div>
        </div>
        <form action="" method="POST">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="">Level</label>
                <input type="text" class="form-control" name="level_number" id="level_number">
              </div>
              <div class="form-group">
                <label for="">Level Name English</label>
                <input type="text" class="form-control" name="level_name_en" id="level_name_en" placeholder="Level Name English">
              </div>
              <div class="form-group">
                <label for="">Gift Value</label>
                <input type="text" class="form-control" name="gift_values" id="gift_values" placeholder="Gift Values">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="">Level Name Arabic</label>
                <input type="text" name="level_name_ar" id="level_name_ar" class="form-control" placeholder="Level Name Arabic">
              </div>
              <div class="form-group">
                <label for="">Description</label>
                <textarea name="gift_description" id="gift_description" class="form-control" placeholder="Description"></textarea>
              </div>
              <div class="form-group">
                <label for="">Required Point</label>
                <input type="text" name="required_points" id="required_points" class="form-control" placeholder="Required points">
              </div>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-dark float-right" id="AddLevels">Save</button>
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

  $("#AddLevels").click(function(){
    var level_name_en = $("#level_name_en").val();
    var level_name_ar = $("#level_name_ar").val();
    var gift_description = $("#gift_description").val();
    var level_number = $("#level_number").val();
    var required_points = $("#required_points").val();
    var gift_values = $("#gift_values").val();

    $.ajax({
      type: 'POST',
      url: '<?php echo base_url();?>backend/Reward_gift/rewardLevel_save',
      data : {level_name_en:level_name_en, level_name_ar:level_name_ar, gift_description:gift_description, level_number:level_number,gift_values:gift_values,required_points:required_points},
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
  });

  var getRewardLevelInfo = function(level_id){
    $.ajax({
      type: 'POST',
      url: '<?php echo base_url();?>backend/Reward_gift/getRewardLevelInfo',
      data : {level_id:level_id},
      success:function(response){
        var res = JSON.parse(response);
        $("#Ulevel_name_en").val(res.result[0].level_name_en);
        $("#Ulevel_name_ar").val(res.result[0].level_name_ar);
        $("#Ugift_description_en").val(res.result[0].gift_description_en);
        // $("#Ugift_description_ar").val(res.result[0].gift_description_ar);
        $("#Ulevel_number").val(res.result[0].level_number);
        $("#Urequired_points").val(res.result[0].required_points);
        $("#Ugift_values").val(res.result[0].gift_values);
        $("#Ulevel_id").val(res.result[0].level_id);
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
        data: {id: id,tbl:'points_setup',col_name:'point_setup_id'},
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

  $("#UpdateRewardLevel").click(function(){
    var level_name_en = $("#Ulevel_name_en").val();
    var level_name_ar = $("#Ulevel_name_ar").val();
    var gift_description_en = $("#Ugift_description_en").val();
    var level_number = $("#Ulevel_number").val();
    var required_points = $("#Urequired_points").val();
    var gift_values = $("#Ugift_values").val();
    var level_id = $("#Ulevel_id").val();

    $.ajax({
      type: 'POST',
      url: '<?php echo base_url();?>backend/Reward_gift/rewardLevel_update',
      data : {level_id:level_id, level_name_en:level_name_en, level_name_ar:level_name_ar, gift_description_en:gift_description_en, level_number:level_number,gift_values:gift_values,required_points:required_points},
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