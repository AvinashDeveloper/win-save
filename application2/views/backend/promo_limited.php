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
                    <li>Gift Inventory</li>
                </ul>
        </div>
        <div class="separator-breadcrumb border-top"></div>
        <div class="row">
                <div class="col-12">
                    <div class="card-body">
                            <div class="float-right">
                                <button class="btn btn-secondary"  data-toggle="modal" data-target="#promolimit">+ Add</button>
                            </div>
                            <div class="table-responsive" style="height: auto;">
                                <table class="table table-bordered table-hover" id="example">
                                        <thead>
                                            <tr>
                                                <td>#No</td>
                                                <th>Date of Creation</th>
                                                <th>Image</th>
                                                <th>Pdf</th>
                                                <th>Title EN.</th>
                                                <th>Title AR.</th>
                                                <th>Category</th>
                                                <th>Country</th>
                                                <th>Region</th>
                                                <th>City</th>
                                                <th>Starting Date</th>
                                                <th>Duration</th>
                                                <th>Status</th>
                                                <th>Update</th>
                                                <th>Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php  $i=1;
                                            if(!empty($cls_detail)){
                                            foreach ($cls_detail as $key) { ?>
                                                    <tr>
                                                        <td><?php echo $i;   ?></td>
                                                        <td><?php echo date('m/d/yy',strtotime($key->added_date));  ?></td>
                                                        <td><img src="<?php echo base_url('/assets/images/vendors/promo_limited/');   ?><?php echo $key->image;  ?>"></td>
                                                        <!-- <td><img src="<?php echo base_url('/assets/images/vendors/promo_limited/').$key->pdf;  ?>"></td> -->
                                                        <td><embed src="<?php echo base_url('/assets/images/vendors/promo_limited/').$key->pdf;  ?>" type="application/pdf" width="100px" height="50px" /></td>
                                                        <td><?php  echo $key->title;  ?></td>
                                                        <td><?php  echo translateText($key->title) ? translateText($key->title) : $key->title;  ?></td>
                                                        <td><select class="form-control"><?php  echo categoryType($key->category);  ?></select></td>
                                                        <td><select class="form-control"><?php  echo country($key->country);  ?><select></td>
                                                        <td><select class="form-control"><?php  echo region((int)$key->region);  ?></select></td>
                                                        <td><select class="form-control"><?php  echo city((int)$key->city,$key->region);  ?></select></td>
                                                        <td><?php  echo date('m/d/yy',$key->start_date);  ?></td>
                                                        <td><?php  echo date('m/d/yy',$key->valid_date); ?></td>
                                                        <?php if( strtolower($key->status) == 'active'){?>
                                                        <td><button class="btn btn-info" onclick="changeStatus(<?php echo $key->id; ?>);"><?php echo $key->status; ?></button></td>             
                                                        <?php }else{
                                                        ?>
                                                        <td><button class="btn btn-success" onclick="changeStatus(<?php echo $key->id; ?>);"><?php echo $key->status; ?></button></td>  
                                                        <?php }?>
                                                        <td><button class="btn btn-success" onclick="getPromoLimitedData('<?php echo $key->id; ?>','<?php echo $vendor_id; ?>');" data-toggle="modal" data-target="#promolimit_update">Update</button></td>
                                                        <td><span class="text-danger" onclick="deleteRow('<?php echo $key->id; ?>');"><i class="fa fa-close"></i></span></td>
                                                    </tr>
                                            <?php $i++;} } ?>
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
                  <!-- <div class="search-results list-horizontal">
                  <div class="list-item col-md-12 p-0">
                  <div class="card o-hidden flex-row mb-4 d-flex">
                  <div class="list-thumb d-flex"> -->
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

      <div class="list-item col-md-12 p-0">
            <div class="card o-hidden flex-row mb-4 d-flex">
                  <div class="list-thumb d-flex">
                        <!-- TUMBNAIL -->
                        <img src="../../dist-assets/images/products/headphone-2.jpg" alt="">
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
                                    <span class="badge badge-primary">New</span>
                              </p>
                        </div>
                  </div>
            </div>
      </div>

      <div class="list-item col-md-12 p-0">
            <div class="card o-hidden flex-row mb-4 d-flex">
                  <div class="list-thumb d-flex">
                        <!-- TUMBNAIL -->
                        <img src="../../dist-assets/images/products/headphone-3.jpg" alt="">
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
                                    <span class="badge badge-primary">New</span>
                              </p>
                        </div>
                  </div>
            </div>
      </div>

      <div class="list-item col-md-12 p-0">
            <div class="card o-hidden flex-row mb-4 d-flex">
                  <div class="list-thumb d-flex">
                        <!-- TUMBNAIL -->
                        <img src="../../dist-assets/images/products/headphone-4.jpg" alt="">
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
                                    <span class="badge badge-primary">New</span>
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
<div class="modal" id="promolimit">
      <div class="modal-dialog">
            <div class="modal-content">
                  <!-- Modal Header -->
                  <div class="modal-header">
                        <h4 class="modal-title">Promo Limited</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body">
                        <form action="<?php echo base_url('backend/Manage_vendors/savePromoLimit/').$vendor_id;?>" method="POST"   enctype="multipart/form-data">
                              <div class="row">
                                    <div class="col-6">
                                          <div class="form-group">
                                                <label for="">Title En.</label>
                                                <input type="text" name="title_en" class="form-control" placeholder="Title En.">
                                          </div>
                                          <div class="form-group">
                                                <label for="">Create Date</label>
                                                <input type="date" name="create_date" class="form-control" placeholder="Create date">
                                          </div>
                                          <div class="form-group">
                                                <label for="">Image</label>
                                                <input type="file" name="limit_img" class="form-control" plcaeholder="Image">
                                          </div>
                                          <div class="form-group">
                                                <label for="">Pdf</label>
                                                <input type="file" name="limit_pdf" class="form-control" placeholder="Pdf">
                                          </div>
                                          <div class="form-group">
                                                <label>Starting Date</label>
                                                <input type="date" name="start_date" class="form-control" placeholder="Starting date">
                                          </div>
                                          <div class="form-group">
                                                <label>Duration</label>
                                                <input type="date" name="duration" class="form-control" placeholder="Duration">
                                          </div>
                                    </div>
                                    <div class="col-6">
                                          <div class="form-group">
                                                <label for="">Title Ar.</label>
                                                <input type="text" name="title_ar" class="form-control" placeholder="Title Ar">
                                          </div>
                                          <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" name="status">
                                                      <?php echo status(); ?>
                                                </select>
                                          </div>
                                          <div class="form-group">
                                                <label>Category</label>
                                                <select class="form-control" name="category">
                                                      <?php echo categoryType(); ?>
                                                </select>
                                          </div>
                                          <div class="form-group">
                                                <label>Country</label>
                                                <select class="form-control" name="country">
                                                      <?php echo country(); ?>
                                                </select>
                                          </div>
                                          <div class="form-group">
                                                <label>Region</label>
                                                <select class="form-control" name="region" id="region_l">
                                                      <?php echo region(); ?>
                                                </select>
                                          </div>
                                          <div class="form-group">
                                                <label>City</label>
                                                <select class="form-control" name="city" id="city_l">
                                                      <?php //echo city(); ?>
                                                </select>
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

<div class="modal" id="promolimit_update">
    <div class="modal-dialog">
        <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Promo Limited</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="<?php echo base_url('backend/Manage_vendors/updatePromoLimit');?>" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-6">
                                        <div class="form-group">
                                            <label for="">Title En.</label>
                                            <input type="text" name="title_en" value="" id="titleEn_pl" class="form-control" placeholder="title">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Create Date</label>
                                            <input type="date" name="create_date" value="" id="create_date_pl" class="form-control" placeholder=" create date">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Image</label>
                                            <input type="file" name="limit_image" id="limit_img" class="form-control" placeholder="Image">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Pdf</label>
                                            <input type="file" name="limit_pdf"  id="limit_pdf" class="form-control" placeholder="Pdf">
                                        </div>
                                        <div class="form-group">
                                            <label>Starting Date</label>
                                            <input type="date" name="start_date" value="" id="start_date_pl" class="form-control" placeholder="start date">
                                        </div>
                                        <div class="form-group">
                                            <label>Duration</label>
                                            <input type="date" name="valid_date" value="" id="valid_date_pl" class="form-control" placeholder="Duration">
                                        </div>
                                </div>
                                <div class="col-6">
                                        <div class="form-group">
                                            <label for="">Title Ar.</label>
                                            <input type="text" name="title_ar" value="" id="titleAr_pl" class="form-control" placeholder="title">
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status" id="status_pl">
                                                    <?php echo status();?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="form-control" name="category" id="category_pl">
                                                    <?php echo categoryType(); ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Country</label>
                                            <select class="form-control" name="country" id="country_pl">
                                                    <?php echo country(); ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Region</label>
                                            <select class="form-control" name="region" id="region_pl">
                                                    <?php echo region(); ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>City</label>
                                            <select class="form-control" name="city" id="city_pl">
                                                    
                                            </select>
                                        </div>
                                        <input type="hidden" name="promoLimit_id" id="promoLimit_id" value="">
                                        <input type="hidden" name="vendor_id" id="vendor_id_pl" value="">
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
                        <form action="">
                              <div class="row">
                                    <div class="col-6">
                                          <div class="form-group">
                                                <label for="">Title</label>
                                                <input type="text" name="title" class="form-control" value="title">
                                          </div>
                                          <div class="form-group">
                                                <label for="">Name</label>
                                                <input type="text" name="Name" class="form-control" value="Name">
                                          </div>
                                          <div class="form-group">
                                                <label for="">Mobile</label>
                                                <input type="number" name="Name" class="form-control" value="Mobile">
                                          </div>
                                          <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control">
                                                      <option>Active</option>
                                                      <option>Inactive</option>
                                                </select>
                                          </div>
                                    </div>
                                    <div class="col-6">
                                          <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="email" name="Name" class="form-control" value="email">
                                          </div>
                                          <div class="form-group">
                                                <label for="">Note</label>
                                                <textarea class="form-control" cols="5" rows="5"></textarea>
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

<script>
    // script for update promo limited
    var getPromoLimitedData = function (promoLimit_id,vandor_id){
        $.ajax({
                type:'POST',
                url:'<?php echo base_url(); ?>backend/Manage_vendors/getPromoLimitInfo',
                data :{promoLimitId:promoLimit_id,vandorId:vandor_id},
                success:function(data){
                    var getInfo = JSON.parse(data);
                    console.log(Object.values(getInfo.result));
                    $("#promoLimit_id").val(getInfo.result[0].promoLimit_id);
                    $("#vendor_id_pl").val(getInfo.result[0].vendor_id);
                    $("#create_date_pl").val(getInfo.result[0].added_date);
                    $("#titleEn_pl").val(getInfo.result[0].title_en);
                    $("#titleAr_pl").val(getInfo.result[0].title_ar);
                    $("#category_pl").val(getInfo.result[0].category);
                    $("#country_pl").val(getInfo.result[0].country);
                    $("#region_pl").val(getInfo.result[0].region);
                    $("#city_pl").html(getInfo.result[0].city);
                    $("#status_pl").val(getInfo.result[0].status);
                    $("#valid_date_pl").val(getInfo.result[0].valid_date);
                    $("#start_date_pl").val(getInfo.result[0].start_date); 
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
                            data : {id:id,tbl:'limited_offer',col_name:'id'},
                    })
                    .done(function(result){
                            location.reload(true);
                    });
                }
        }
    // script for delete offers
    var deleteRow = function(id) {
        var result = confirm("Want to delete?");
        if (result) {
                var url = '<?php echo base_url(); ?>backend/Manage_vendors/delete_row';  
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {id: id,tbl:'limited_offer',col_name:'id'},
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
    // script for get city info
    $("#region_l").on('change', function(){
        var region_id = $("#region_l").val();
        $.ajax({
                type : 'POST',
                url : '<?php echo base_url();?>backend/Manage_vendors/getCityInfo',
                data : {regionId : region_id,select : ''},
        })
        .done(function(result){
                $("#city_l").html(result);
        });
    });

    $("#region_pl").on('change', function(){
        var region_id = $("#region_pl").val();
        $.ajax({
                type : 'POST',
                url : '<?php echo base_url();?>backend/Manage_vendors/getCityInfo',
                data : {regionId : region_id,select : ''},
        })
        .done(function(result){
                $("#city_pl").html(result);
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