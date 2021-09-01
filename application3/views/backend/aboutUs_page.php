<?php //include('header.php');?>
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
		top:102px!important;

	}
</style>
<!-- =============== Left side End ================-->
<div class="main-content-wrap sidenav-open d-flex flex-column">
	<!-- ============ Body content start ============= -->
	<div class="main-content">
		<div class="breadcrumb">
			<h1 class="mr-2">Basic</h1>
			<ul>
				<li><a href="#">Form</a></li>
				<li>About Us</li>
			</ul>
		</div>
		<div class="separator-breadcrumb border-top"></div>
		<div id="accordion4">
			<div class="card">
				<div class="card-header">
					<a class="card-link" data-toggle="collapse" href="#u88">
						About Us
					</a>
				</div>
				<div id="u88" class="collapse" data-parent="#accordion4">
					<div class="card-body">
						<div class="float-right">
							<button class="btn btn-secondary"  data-toggle="modal" data-target="#aboutUs_add">+ Add</button>
						</div>
						<div class="table-responsive" style="height: auto;">
							<table class="table table-bordered table-hover" id="example">
								<thead>
									<tr>
                                        <th>S.no</th>
                                        <th>Text En</th>
                                        <th>Text Ar</th>
                                        <th>Update</th>
                                        <th>Remove</th>
                                    </tr>	
								</thead>
								<tbody>
									<?php $i=1; 
                                    if(!empty($get_aboutUs)){
                                    foreach($get_aboutUs as $key) { ?>
                                    <tr id="row_<?php echo $key['support_id']; ?>">
										<td><?php echo $i; ?></td>
										<td><?php echo $key['description']; ?></td>
										<td><?php echo translateText($key['description']); ?></td>
										<td><button class="btn btn-success" onclick="getAboutUsData('<?php echo $key['support_id']; ?>');" data-toggle="modal" data-target="#aboutUs_update">Update</button></td>
										<td><span class="text-danger" onclick="deleteRow('<?php echo $key['support_id']; ?>');"><i class="fa fa-close"></i></span></td>
                                    </tr>
                                    <?php $i++;}} ?>
								</tbody>
							</table>
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

</div>
</div>


</div>
<!-- PAGINATION CONTROL -->

</div>


<!-- Button to Open the Modal -->
<!-- The Modal -->
<div class="modal" id="aboutUs_add">
	<div class="modal-dialog">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">About Us Add</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<!-- Modal body -->
			<div class="modal-body">
				<form action="<?php echo base_url();?>backend/Supports/aboutUs_save" method="POST" id="AddForm">
					<div class="row">
						<div class="col-12">
							<div class="form-group">
								<label for="">Text En.</label>
								<textarea name="desc_en" id="AAdesc_en" class="form-control" placeholder="Text En"></textarea>
							</div>
							<div class="form-group">
								<label for="">Text Ar</label>
								<textarea name="desc_ar" id="AAdesc_ar" class="form-control" placeholder="Text Ar"></textarea>
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
<div class="modal" id="aboutUs_update">
	<div class="modal-dialog">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">About Us Update</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<!-- Modal body -->
			<div class="modal-body">
				<form action="<?php //echo base_url('backend/Supports/findUs_update);?>" method="POST">
                    <div class="row">
						<div class="col-12">
                            <input type="hidden" name="about_id" id="AUAboutUs_id" value="">
							<div class="form-group">
								<label for="">Text En</label>
								<textarea name="desc_en" id="AUdesc_en" class="form-control" placeholder="Text En" value=""></textarea>
							</div>
                            <div class="form-group">
								<label>Text Ar</label>
								<textarea  name="desc_ar" id="AUdesc_ar" class="form-control" placeholder="Text Ar" value=""></textarea>
							</div>
						</div>
						<div class="col-12">
							<button type="submit" class="btn btn-dark float-right" id="updateAboutUsData">Update</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php //include('footer.php');?>
<script>
    var getAboutUsData = function(id){
        $.ajax({
        type : 'POST',
        url : '<?php echo base_url();?>backend/Supports/getInfo',
        data : {id : id, type : "about_us"},
        success:function(data){
            var getInfo = JSON.parse(data);
            // console.log(Object.values(getInfo.result));
            $("#AUAboutUs_id").val(getInfo.result[0].support_id);
            $("#AUdesc_en").val(getInfo.result[0].desc_en);
            $("#AUdesc_ar").val(getInfo.result[0].desc_ar);
        }
        });
    }

    $("#updateAboutUsData").on('click',function(){
        var AUAboutUs_id = $("#AUAboutUs_id").val();
        var AUdesc_en = $("#AUdesc_en").val();
        var AUdesc_ar = $("#AUdesc_ar").val();
       
        $.ajax({
            type : 'POST',
            url : '<?php echo base_url();?>backend/Supports/aboutUs_update',
            data : {find_id:AUAboutUs_id,desc_en:AUdesc_en,desc_ar:AUdesc_ar},
            success:function(data){
                var getInfo = JSON.parse(data);
                alert(getInfo.message);
            }
        });
    });

  var deleteRow = function(id) {
    var result = confirm("Want to delete?");
    if (result) {
      var url = '<?php echo base_url(); ?>backend/Manage_vendors/delete_row';  
      $.ajax({
        type: "POST",
        url: url,
        data: {id: id,tbl:'support_all',col_name:'support_id'},
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