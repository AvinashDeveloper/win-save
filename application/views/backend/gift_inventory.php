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
     <button class="btn btn-secondary"  data-toggle="modal" data-target="#inventory">+ Add</button>
 </div>
 <div class="table-responsive" style="height: auto;">
 
        <table class="table table-bordered table-hover" id="example">
            <thead>
               <tr>
                      <td>#No</td>
                   <th>Date of Creation</th>
                    <th>Image</th>
                     <th>Title EN.</th>
    
                         <th>Description EN.</th>
                             <th>Title AR.</th>
    
                         <th>Description AR.</th>
                         <th>Value</th>
                       <th>Quantity</th>
                       
                       <th>Total</th>
                            <th>Time Limit</th>
                       <th>Status</th>
                       <th>Remove</th>
               </tr>
          </thead>
          <tbody>
               <?php $i=1;
               foreach ($gift_inventory as $key) { ?>
               <tr id="row_<?php echo $key->gift_id;?>">
                      <td><?php echo $i;  ?></td>
                   <td><?php echo $key->added_date;  ?></td>
                    <td><img src="<?php echo base_url('assets/images/vendors/ven_offer/');   ?><?php echo $key->img;?>"></td>
                    <td><?php echo $key->gift_name;?></td>
                     <td><?php echo $key->gift_description;//gift_detail;?></td>
                      <td><?php echo translateText($key->gift_name);?></td>
                     <td><?php echo translateText($key->gift_description);//gift_detail;?></td>
                        <td><?php echo $key->value ;?></td>
                      
                           <td><?php echo $key->stock ;?></td>
                             <td><?php echo$key->value* $key->stock ;?></td>
                    <td><?php echo $key->time_limit ;?></td>

                      <?php if( strtolower($key->igStatus) == 'active'){?>
                      <td><button class="btn btn-info" onclick="changeStatus(<?php echo $key->gift_id; ?>);"><?php echo $key->igStatus; ?></button></td>             
                      <?php }else{
                      ?>
                      <td><button class="btn btn-success" onclick="changeStatus(<?php echo $key->gift_id; ?>);"><?php echo $key->igStatus; ?></button></td>  
                      <?php }?>
                      <td><span class="text-danger" onclick="deleteRow('<?php echo $key->gift_id; ?>');"><i class="fa fa-close"></i></span></td>

                   </tr>
          
            
          <?php  $i++;}  ?>
          </tbody>
           </table>
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
    </div><!-- ============ Search UI Start ============= -->
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
<div class="modal" id="inventory">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Gift Inventory</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?php echo base_url();?>backend/Login/saveGiftinventory/<?php echo $this->uri->segment(4);?>" method="POST"  enctype="multipart/form-data" id="GiftInventoryAddForm">
          <div class="row">
            <div class="col-6">

              <div class="form-group">
                <label for="">Title En.</label>
                <input type="text" name="title_en" id="title_en" class="form-control" placeholder="title English">
              </div>

              <div class="form-group">
                <label for="">quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control" placeholder="Quantity">
              </div>
              
              <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="gift_image" class="form-control" >
              </div>

             <!--  <div class="form-group">
                <label for="">Date</label>
                <input type="date" name="date" class="form-control" value="date">
              </div> -->

              <div class="form-group">
                <label for="">Time Limit</label>
                <input type="date" name="time_limit" class="form-control" placeholder="time limit">
              </div>
              
              <div class="form-group">
                <label for="">Description English</label>
                <textarea class="form-control" cols="5" rows="5" name="description_en" id="description_en"></textarea>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="">Title Ar.</label>
                <input type="text" name="title_ar" id="title_ar" class="form-control" placeholder="title Arabic">
              </div>

              <div class="form-group">
                <label for="">Value</label>
                <input type="text" name="value" id="value" class="form-control" placeholder="Value">
              </div>
              
              <div class="form-group">
                <label for="">Total</label>
                <input type="text" name="total" id="total" class="form-control" placeholder="Total" readonly>
              </div>
              
              
              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status">
                  <?php echo status();?>
                </select>
              </div>

              <div class="form-group">
                <label for="">Description Arabic</label>
                <textarea class="form-control" cols="5" rows="5" name="description_ar" id="description_ar"></textarea>
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

<div class="modal" id="update_inventory">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Gift Inventory</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="" method="POST" id="GiftInventoryUpdateForm">
        <div class="row">
            <div class="col-6">
                   <div class="form-group">
                <label for="">Title En.</label>
                <input type="text" name="title_en" class="form-control" placeholder="title English">
            </div>
                <div class="form-group">
                <label for="">Title Ar.</label>
                <input type="text" name="title_ar" class="form-control" placeholder="title Arabic">
            </div>
               <div class="form-group">
                <label for="">Date</label>
                <input type="date" name="date" class="form-control" placeholder="date">
            </div>
             <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="img" class="form-control" placeholder="Image">
            </div>
              <div class="form-group">
                <label for="">Value</label>
                <input type="number" name="value" class="form-control" placeholder="Value">
            </div>
           <div class="form-group">
                <label for="">Description English</label>
            <textarea class="form-control" cols="5" rows="5" name="description_en"></textarea>
            </div>
            </div>
             <div class="col-6">
                   <div class="form-group">
                <label for="">quantity</label>
                <input type="number" name="stoke" class="form-control" placeholder="quantity">
            </div>
             <div class="form-group">
                <label for="">Total</label>
                <input type="number" name="total" class="form-control" placeholder="total">
            </div>
            <div class="form-group">
                <label for="">Time Limit</label>
                <input type="date" name="valid_date" class="form-control" placeholder="time limit">
            </div>
              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status">
                    <?php echo status();?>
                </select>
            </div>
           
              <div class="form-group">
                <label for="">Description Arabic</label>
            <textarea class="form-control" cols="5" rows="5" name="description_ar"></textarea>
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
    $("#quantity").on('change',function(){
      var value = $("#value").val();
      var quantity = $("#quantity").val();
      if(value != ""){
        var total = value * quantity;
        $("#total").val(total);
      }
    });
    $("#value").on('change',function(){
      var value = $("#value").val();
      var quantity = $("#quantity").val();
      if(quantity != ""){
        var total = value * quantity;
        $("#total").val(total);
      }
    });

    // script for change status
    var changeStatus = function(id){
			var get = confirm("Want to change status?");
			if(get){
				var url =  '<?php echo base_url(); ?>backend/Manage_vendors/changeStatus';
				$.ajax({
					type : 'POST',
					url : url,
					data : {id:id,tbl:'inventory_gift',col_name:'id'},
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
					data: {id: id,tbl:'inventory_gift',col_name:'id'},
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
</script>

<script>
  $(document).ready(function() {
    var form = $('#GiftInventoryAddForm');
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
        title_en: {
          required: true
        },
        quantity:{
          required : true,
          digits:true
        },
        time_limit: {
          required: true
        },
        description_en:{
          required :true
        },
        value:{
          required :true,
          number:true
        },
        status:{
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

  $(document).ready(function() {
    var form = $('#GiftInventoryUpdateForm');
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
          required: true
        },
        password:{
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