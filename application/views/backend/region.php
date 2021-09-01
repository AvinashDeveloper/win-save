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
    <h1 class="mr-2">Setting</h1>
    <ul>
        <li><a href="#">Admin</a></li>
        <li>Region</li>
    </ul>
</div>
<div class="separator-breadcrumb border-top"></div>
<div id="accordion">
    <div class="card">
        <div class="card-header">
            <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
            1. Region 
            </a>
        </div>
        <div id="collapseTwo" class="collapse" data-parent="#accordion">
            <div class="card-body">
                <div class="">
                    <div class="float-right">
                        <button class="btn btn-secondary"  data-toggle="modal" data-target="#addRegion">+ Add</button>
                    </div> 
                    <div class="table-responsive">
                        <table class="table  display">
                            <thead>
                                <tr>
                                    <th>#No</th>
                                    <th>Country English</th>
                                    <th>Region English</th>
                                    <th>Region Arabic</th>
                                    <th>Priorty Listing</th>
                                    <th>Update</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $i="1";
                                    if(!empty($get_region)){
                                        foreach($get_region as $value){
                                ?>
                                <tr id="row_<?php echo $value['id']; ?>">
                                    <td><?php echo $i; ?></td>
                                    <th><?php echo countryString($value['country_id']); ?></th>
                                    <td><?php echo $value['region']; ?></td>
                                    <td><?php echo translateText($value['region']); ?></td>
                                    <td><?php echo $value['priority']; ?></td>
                                    <td><button class="btn btn-success" onclick="getRegionInfo('<?php echo $value['id']; ?>');" data-toggle="modal" data-target="#updateRegion" > Update</button></td>
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
<div class="modal" id="updateRegion">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Update Region</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 alert alert-warning"  id="Uwarning" role="alert"></div>
                    <div class="col-12 alert alert-success" id="Usuccess" role="alert"></div>
                </div>
                <form action="" method="POST" id="UpdateRegionForm">
                    <div class="row">
                        <input type="hidden" name="region_id" id="regionId" value="">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Country English</label>
                                <select class="form-control" id="u_country_id" name="country_id">
                                    <option value="">Select country</option>
                                    <?php echo country();?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Region English</label>
                                <input type="text" id="u_region_name_en" class="form-control" name="region_name_en" value="">
                            </div>
                            <div class="form-group">
                                <label for="">Region Arabic</label>
                                <input type="text" class="form-control" name="region_name_ar" id="u_region_name_ar" value="">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Priorty Listing</label>
                                <input type="number" name="priority" min="1" id="u_priority" class="form-control" placeholder="Priorty Listing" value="">
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-dark float-right" id="UpdateRegion">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="addRegion">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Region</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 alert alert-warning"  id="warning" role="alert"></div>
                    <div class="col-12 alert alert-success" id="success" role="alert"></div>
                </div>
                <form action="" method="POST" id="AddRegionForm">
                    <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                        <label for="">Country English</label>
                            <select class="form-control" name="contry_id" id="a_country_id">
                                <option value="">Select country</option>
                                <?php echo country();?>
                            </select>
                        </div>
                        <div class="form-group">
                        <label for="">Region English</label>
                        <input type="text" name="region_name_en" id="region_name_en"  class="form-control" placeholder="region english">
                        </div>
                        <div class="form-group">
                            <label for="">Region Arabic</label>
                            <input type="text" name="region_name_ar" id="region_name_ar" class="form-control" placeholder="region arabic">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Priorty Listing</label>
                            <input type="number" name="priority" id="a_priority" class="form-control" placeholder="Priorty Listing">
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-dark float-right" id="AddRegion">Save</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php //include '../footer.php';?>
<script>
    $("#success").hide();
    $("#warning").hide();
    $("#Usuccess").hide();
    $("#Uwarning").hide();

    // $("#AddRegion").click(function() {
    //     var region_name_en = $("#region_name_en").val();
    //     var region_name_ar = $("#region_name_ar").val(); 
    //     var a_priority = $("#a_priority").val();
    //     var a_country_id = $("#a_country_id").val();

    //     $.ajax({
    //         type : 'POST',
    //         url : '<?php echo base_url();?>backend/Settings/region_save',
    //         data : {country_id: a_country_id, region_name_en:region_name_en, region_name_ar:region_name_ar, priority:a_priority},
    //         success:function(data){
    //             var getInfo = JSON.parse(data);
    //             alert(getInfo.message);
    //         }
    //     });
    // });

    var getRegionInfo = function(ids){
        $.ajax({
            type : 'POST',
            url : '<?php echo base_url();?>backend/Settings/getRegionInfo',
            data : {ids : ids},
            success:function(data){
                var getInfo = JSON.parse(data);
                $("#regionId").val(getInfo.result[0].id);
                $("#u_region_name_en").val(getInfo.result[0].region_name_en);
                $("#u_region_name_ar").val(getInfo.result[0].region_name_ar);
                $("#u_country_id").val(getInfo.result[0].country_id);
                $("#u_priority").val(getInfo.result[0].priority);
            }
        });
    }

    // $("#UpdateRegion").click(function() {
    //     var u_region_name_en = $("#u_region_name_en").val();
    //     var u_region_name_ar = $("#u_region_name_ar").val();
    //     var u_priority = $("#u_priority").val();
    //     var u_country_id = $("#u_country_id").val();
    //     var regionId = $("#regionId").val();

    //     $.ajax({
    //         type : 'POST',
    //         url : '<?php echo base_url();?>backend/Settings/region_update',
    //         data : {region_id: regionId, region_name_ar:u_region_name_ar, region_name_en:u_region_name_en, priority:u_priority, country_id:u_country_id},
    //         success:function(data){
    //             var getInfo = JSON.parse(data);
    //             alert(getInfo.message);
    //         }
    //     });
    // });
</script>

<script>
        $(document).ready(function() {
			var form = $('#AddRegionForm');
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
					region_name_en: {
						required: true
					},
					a_priority:{
						required : true
					},
					a_country_id: {
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
                    var region_name_en = $("#region_name_en").val();
                    var region_name_ar = $("#region_name_ar").val(); 
                    var a_priority = $("#a_priority").val();
                    var a_country_id = $("#a_country_id").val();

                    $.ajax({
                        type : 'POST',
                        url : '<?php echo base_url();?>backend/Settings/region_save',
                        data : {country_id: a_country_id, region_name_en:region_name_en, region_name_ar:region_name_ar, priority:a_priority},
                        success:function(data){
                            var ress = JSON.parse(data);
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
			var form = $('#UpdateRegionForm');
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
					u_region_name_en: {
						required: true
					},
					u_priority:{
						required : true
					},
					u_country_id: {
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
                    var u_region_name_en = $("#u_region_name_en").val();
                    var u_region_name_ar = $("#u_region_name_ar").val();
                    var u_priority = $("#u_priority").val();
                    var u_country_id = $("#u_country_id").val();
                    var regionId = $("#regionId").val();

                    $.ajax({
                        type : 'POST',
                        url : '<?php echo base_url();?>backend/Settings/region_update',
                        data : {region_id: regionId, region_name_ar:u_region_name_ar, region_name_en:u_region_name_en, priority:u_priority, country_id:u_country_id},
                        success:function(data){
                            var ress = JSON.parse(data);
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