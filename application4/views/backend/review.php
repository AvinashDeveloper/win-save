<?php //include 'header.php';?>
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
    width: 200px;
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
  div#example_wrapper > .row:first-child {
    top:70px!important;

  }
</style>
<?php $vendor_id = $this->uri->segment(4); ?>
<!-- =============== Left side End ================-->
<div class="main-content-wrap sidenav-open d-flex flex-column">
  <!-- ============ Body content start ============= -->
  <div class="main-content">
    <div class="breadcrumb">
      <h1 class="mr-2">Manange</h1>
      <ul>
        <li><a href="#">Vendor</a></li>
        <li>Review</li>
      </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            Rating & Comments
          </div>
          <div class="card-body">
            <div class="table-responsive" style="height: auto;">
              <table class="table table-bordered table-hover" id="example">
                <thead>
                  <tr>
                    <td>Time</td>
                    <th>User</th>
                    <th>Rated</th>
                    <th>Comments</th>
                    <th>Reply By Vendor </th>
                    <th>Submit reply</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $i = 1;
                    if(!empty($report_details)){
                      foreach ($report_details as $value) {
                  ?>
                  <tr>
                    <td><?php echo $value['time'];?></td>
                    <td><?php echo $value['name'];?></td>
                    <td><?php echo $value['ratting'];?></td>
                    <td><?php echo $value['review'];?></td>
                    <td><?php echo $value['vendor_reply'];?></td>
                    <td><button class="btn btn-dark" onclick="setInfo('<?php echo $value['review_id'];?>','<?php echo $value['name'];?>');" data-toggle="modal" data-target="#submit_reply">Submit Reply</button></td>
                  </tr>
                  <?php $i++; }}?>
                </tbody>
              </table>
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
  <img src="../../dist-assets/images/products/headphone-1.jpg" alt="">
</div>

</div>
</div>
</div>
<!-- PAGINATION CONTROL -->

</div>

<!-- The Modal -->
<div class="modal" id="submit_reply">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Rating & Comments</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?php echo base_url('backend/Manage_vendors/setReviewInfo/').$vendor_id; ?>" method="post">
          <div class="row">
            <div class="col-12">
              <input type="hidden" name="parent_id" id="parent_id" >
              <!-- <div class="form-group">
                <label for="">Time</label>
                <input type="time" name="title" class="form-control" placeholder="title">
              </div> -->
              <div class="form-group">
                <label for="">User</label>
                <input type="text" name="name" id="user_name" class="form-control" placeholder="Name" readonly>
              </div>
              <div class="form-group">
                <label for="">Rate</label>
                <input type="number" name="rate" class="form-control" placeholder="Rate">
              </div>
            <!-- </div>
            <div class="col-6"> -->
              <div class="form-group">
                <label for="">Comments</label>
                <textarea class="form-control" name="comment" cols="10" rows="8" placeholder="Comment"></textarea>
              </div>
            </div>
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-dark float-right">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
<?php include 'footer.php';?>

<script>
  var setInfo = function(id, user_name){
    $("#user_name").val(user_name);
    $("#parent_id").val(id);
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