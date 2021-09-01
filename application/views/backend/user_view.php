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
			<h1 class="mr-2">Users</h1>
			<ul>
				<li><a href="#">Admin</a></li>
				<li>User View</li>
			</ul>
		</div>
		<div class="separator-breadcrumb border-top"></div>
		<div id="accordion">
			<div class="card">
				<div class="card-header">
					<a class="collapsed card-link" data-toggle="collapse" href="#collapse1">
						1. User Profile
					</a>
				</div>
				<div id="collapse1" class="collapse" data-parent="#accordion">
					<div class="card-body">
						<div class="container">
							<form action="" method="POST" id="userInfoForm">
								<div class="row">
									<input type="hidden" name="user_id" id="user_id" value="<?php echo $user_info[0]->id; ?>">
									<div class="col-md-6">
										<div class="form-group">
											<label>Name</label>
											<input type="text" name="user_name" id="user_name" class="form-control" value="<?php echo $user_info[0]->name; ?>">
										</div>
										<div class="form-group">
											<label>Mobile Number</label>
											<input type="number" name="user_mobile" id="user_mobile" class="form-control" value="<?php echo$user_info[0]->contact; ?>">
										</div>
										<div class="form-group">
											<label>E-mail</label>
											<input type="email" name="user_email" id="user_email" class="form-control" value="<?php echo $user_info[0]->email; ?>">
										</div>
										<div class="form-group">
											<label>Password</label>
											<input type="password" name="user_password" id="user_password" value="<?php echo $user_info[0]->pass; ?>" class="form-control">
										</div>
										<div class="form-group">
											<label>Date of Birth</label>
											<input type="date" name="user_dob" id="user_dob" value="<?php echo $user_info[0]->dob; ?>" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Nationality</label>
											<select class="form-control" name="user_nationality" id="user_nationality">
												<?php echo getNationality((int)$user_info[0]->user_nationality);?>
											</select>
										</div>
										<div class="form-group">
											<label>Country of Residence</label>
											<select class="form-control" name="user_country" id="user_country">
											<?php echo country((int)$user_info[0]->user_country); ?>
											</select>
										</div>
										<div class="form-group">
											<label>City</label>
											<select class="form-control" name="user_city" id="user_city">
											<?php echo city((int)$user_info[0]->user_city);?>
											</select>
										</div>
										<div class="form-group">
											<label>Gender</label><br/>
											<select name="user_gender" id="user_gender" class="form-control">
												<?php echo get_gender($user_info[0]->user_gender);?>
											</select>
										</div>
										<div class="form-group">
											<label>currency preference</label>
											<select name="currency" id="currency" class="form-control">
											<?php echo currencyType((int)$user_info[0]->currency); ?>
											</select>
										</div>
									</div>
									<input type="submit" id="user_info_submit" value="submit" class="btn btn-secondary">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<br/>
			<div class="card">
				<div class="card-header">
					<a class="collapsed card-link" data-toggle="collapse" href="#collapse2">
						2. User Account
					</a>
				</div>
				<div id="collapse2" class="collapse" data-parent="#accordion">
					<div class="card-body">
						<form action="">
							<div class="form-group">
								<label>Plan</label><br/>
								<label for="" >
									<input  type="radio" name="Plan" class="custom-radio" <?php if($user_info[0]->main_amount == 0){echo "checked"; }?> >Free
								</label>
								<label for="">
									<input type="radio" name="Plan" <?php if($user_info[0]->main_amount > 0){echo "checked"; }?> class="custom-radio">Paid
								</label>
							</div>
							<div class="form-group">
								<label>Status</label><br/>
								<label for="" >
									<input  type="radio" name="status" value="Active" <?php if($user_info[0]->status == 'Active'){echo "checked"; }?> class="custom-radio user_status">Active
								</label>
								<label for="">
									<input type="radio" name="status" value="Deactive" <?php if($user_info[0]->status == 'Deactive'){echo "checked"; }?> class="custom-radio user_status">Deactive
								</label>
							</div>
						</form>
					</div>
				</div>
			</div>
			<br/>
			<div class="card">
				<div class="card-header">
					<a class="collapsed card-link" data-toggle="collapse" href="#collapse3">
						3. Payments History 
					</a>
				</div>
				<div id="collapse3" class="collapse" data-parent="#accordion">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered table-striped  display">
								<thead>
									<tr>
										<th>Date</th>
										<th>Plan Type</th>
										<th>Amount</th>
										<th>Discount</th>
										<th>Vat</th>
										<th>Total</th>
										<th>Starting Date</th>
										<th>Ending Date</th>
										<th>Subscribed By</th>
									</tr>
								</thead>
								<tbody>
									<?php $i=1;
										if(!empty($transection_info)){
											foreach($transection_info as $value){
									?>
									<tr>
										<td><?php echo date('m/d/yy',strtotime($value['create_date'])); ?></td>
										<td><?php echo user_subscription_plan_name($value['plan_id']); ?></td>
										<td><?php echo $value['main_amount']; ?></td>
										<td><?php echo $value['discount']; ?></td>
										<td><?php echo $value['vat']; ?></td>
										<td><?php echo $value['total_amount']; ?></td>
										<td><?php echo date('m/d/yy',$value['start_date']); ?></td>
										<td><?php echo date('m/d/yy',$value['expire_date']); ?></td>
										<td><?php echo $value['payment_by']; ?></td>
									</tr>
									<?php $i++; }} ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<br/>
			<div class="card">
				<div class="card-header">
					<a class="collapsed card-link" data-toggle="collapse" href="#collapse4">
						4. Claimed Offers 
					</a>
				</div>
				<div id="collapse4" class="collapse" data-parent="#accordion">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered table-striped  display">
								<thead>
									<tr>
										<th>Voucher Code</th>
										<th>Claimed Date</th>
										<th>Store</th>
										<th>City</th>
										<th>Branch</th>
										<th> Offer Type</th>
										<th>Offer Title Eng.</th>
										<th>Saving</th>
									</tr>
								</thead>
								<tbody>
									<?php $i=1; 
										if(!empty($claim_offer)){
											foreach($claim_offer as $value){
									?>
									<tr>
										<td><?php echo $value['voucher_code']; ?></td>
										<td><?php echo date('m/d/yy',$value['claimed_date']); ?></td>
										<td><?php echo $value['store_name']; ?></td>
										<td><?php echo city((int)$value['city']); ?></td>
										<td><?php echo $value['branch_name']; ?></td>
										<td><?php echo getOfferTypeString($value['offer_type_id']); ?></td>
										<td><?php echo $value['offer_title']; ?></td>
										<td><?php echo $value['saving_value']; ?></td>
									</tr>
									<?php $i++; }} ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<br/>
			<div class="card">
				<div class="card-header">
					<a class="collapsed card-link" data-toggle="collapse" href="#collapse5">
						5. Claimed Points
					</a>
				</div>
				<div id="collapse5" class="collapse" data-parent="#accordion">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered table-striped  display">
								<thead>
									<tr>
										<th>Date</th>
										<th>Points</th>
										<th>Type</th>
									</tr>
								</thead>
								<tbody>
									<?php $i=1;
										$total_point = 0;
										if(!empty($claim_point)){
											foreach($claim_point as $value){
												$total_point =  $total_point+$value['reward_points'];
									?>
									<tr>
										<td><?php echo date('m/d/yy',strtotime($value['create_date'])); ?></td>
										<td><?php echo $value['reward_points']; ?></td>
										<td><?php echo $value['point_title']; ?></td>
									</tr>
									<?php $i++; }} ?>
								</tbody>
							</table>
							<div class="d-flex flex-row justify-content-around">
								<dl>
									<dt>Total Points</dt>
									<dd><?php echo $total_point;?></dd>
								</dl>
								<dl>
									<dt>claimed Points</dt>
									<dd>0</dd>
								</dl>
								<dl>
									<dt>Remaining</dt>
									<dd>0</dd>
								</dl>
							</div>
						</div>
					</div>
				</div>
			</div>
			<br/>
			<div class="card">
				<div class="card-header">
					<a class="collapsed card-link" data-toggle="collapse" href="#collapse6">
						6. Redeemed Gifts <?php //echo "<pre>"; print_r($redeem_gift);die; ?>
					</a>
				</div>
				<div id="collapse6" class="collapse" data-parent="#accordion">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered table-striped  display">
								<thead>
									<tr>
										<th>Date</th>
										<th>Level</th>
										<th>Store</th>
										<th>Gift</th>
										<th>Value  </th>
										<th> Status</th>
										<th>Voucher Code  </th>
										<th> Expiry</th>
									</tr>
								</thead>
								<tbody>
									<?php $i=1;
										if(!empty($redeem_gift)){
											foreach($redeem_gift as $value){
									?>
									<tr>
										<td><?php echo date('m/d/yy',$value['create_date']); ?></td>
										<td><?php echo $value['level_number']; ?></td>
										<td><?php echo $value['store_name']; ?></td>
										<td><?php echo $value['gift_name']; ?></td>
										<td><?php echo $value['ig_value']; ?></td>
										<td><?php if($value['claim_status'] == 1){ echo 'Claimed';}else{echo 'Not Claimed';} ?> </td>
										<td><?php echo $value['voucher_code']; ?></td>
										<td><?php echo date('m/d/yy',strtotime($value['ig_timelimit'])); ?></td>
									</tr>
									<?php $i++; }} ?>
								</table>
							</div>
						</div>
					</div>
			</div>
			<br/>
			<div class="card">
				<div class="card-header">
					<a class="collapsed card-link" data-toggle="collapse" href="#collapse7">
						7. Comments Review
					</a>
				</div>
				<div id="collapse7" class="collapse" data-parent="#accordion">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered table-striped  display">
								<thead>
									<tr>
										<th>Date</th>
										<th>Store</th>
										<th>Rated</th>
										<th>Comments</th>
										<th>Flaged comments by vistors  </th>
										<th> Remove</th>
									</tr>
								</thead>
								<tbody>
									<?php $i=1;
										if(!empty($comment_info)){
											foreach($comment_info as $value){
									?>
									<tr>
										<td><?php echo date('m/d/yy',$value['create_date']); ?></td>
										<td><?php echo $value['store_name']; ?></td>
										<td><?php echo $value['ratting']; ?></td>
										<td><?php echo $value['review']; ?></td>
										<td></td>
										<td><i class="fa fa-times text-danger"></i></td>
									</tr>
									<?php $i++; }} ?>
								</table>
							</div>
						</div>
					</div>
			</div>
			<br/>
			<div class="card">
				<div class="card-header">
					<a class="collapsed card-link" data-toggle="collapse" href="#collapse8">
						8. Activity
					</a>
				</div>
				<div id="collapse8" class="collapse" data-parent="#accordion">
					<form action="" method="GET">
						<div class="col-md-4">
							<label>Pick Year</label>
						</div>
						<div class="col-md-8">
							<!-- <input type="text" name="year_filter" id="year_filter" value="<?php echo $years;?>" placeholder="<?php echo date('yy');?>"> 
							<button type="submit" class="btn btn-info">Submit</button> -->
						</div>
					</form>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered table-striped  display">
								<thead>
									<tr>
										<th>Month</th>
										<th>Offer claimed</th>
										<th>Total saving</th>
										<th>View stores</th>
										<th>No of Comments</th>
										<th>No of share</th>
										<th>Claimed points</th>
									</tr>
								</thead>
								<tbody>
									<?php $i=1;
										if(!empty($user_activity)){
											foreach($user_activity as $value){
									?>
									<tr>
										<td><?php echo $value['month']; ?></td>
										<td><?php echo $value['offerClaim']; ?></td>
										<td><?php echo $value['TotalSaving']; ?></td>
										<td><?php echo $value['ViewStore']; ?></td>
										<td><?php echo $value['NoComment']; ?></td>
										<td><?php echo $value['NoShare']; ?></td>
										<td><?php echo $value['pointClaim']; ?></td>
									</tr>
									<?php $i++; } } ?>
								</tfoot>
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
<div class="modal" id="update_contacts">
	<div class="modal-dialog">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Update Manager</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<!-- Modal body -->
			<div class="modal-body">
				<form action="">
					<div class="row">
						<div class="col-6">
							<div class="form-group">
								<label for="">Name</label>
								<input type="text" name="name" class="form-control">
							</div>
							<div class="form-group">
								<label for="">Email</label>
								<input type="email" name="email" class="form-control">
							</div>
							<div class="form-group">
								<label for="">Mobile No.</label>
								<input type="number" name="mobile" class="form-control">
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="">Password</label>
								<input type="Password" name="Password" class="form-control" value="Password">
							</div>
							<div class="form-group">
								<label for="">Manager Roles</label>
								<select class="form-control">
									<option>Roles 1</option>
									<option>Roles 2</option>
									<option>Roles 3</option>
								</select>
							</div>
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
				<h4 class="modal-title">Add Manager</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<!-- Modal body -->
			<div class="modal-body">
				<form action="">
					<div class="row">
						<div class="col-6">
							<div class="form-group">
								<label for="">Name</label>
								<input type="text" name="name" class="form-control">
							</div>
							<div class="form-group">
								<label for="">Email</label>
								<input type="email" name="email" class="form-control">
							</div>
							<div class="form-group">
								<label for="">Mobile No.</label>
								<input type="number" name="mobile" class="form-control">
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="">Password</label>
								<input type="Password" name="Password" class="form-control" value="Password">
							</div>
							<div class="form-group">
								<label for="">Manager Roles</label>
								<select class="form-control">
									<option>Roles 1</option>
									<option>Roles 2</option>
									<option>Roles 3</option>
								</select>
							</div>
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
<?php $this->load->view('backend/Footer');?>

<script>
	// $("#user_info_submit").click(function(e){
	// 	e.preventDefault();
	// 	var postData = new FormData($("#userInfoForm")[0]);
	// 	$.ajax({
	// 		type:'POST',
	// 		url:'<?php echo base_url();?>backend/Users/updateUserInfo',
	// 		processData: false,
	// 		cache: false,
	// 		contentType: false,
	// 		data : postData,
	// 		success:function(data){
	// 			var ress = JSON.parse(data);
	// 			alert(ress.message);  
	// 		}
	// 	});
	// });

	$(".user_status").click(function(){
		var status = $("input[name='status']:checked"). val();
		var user_id = '<?php echo $user_info[0]->id;?>';
		$.ajax({
			type : 'POST',
			url : '<?php echo base_url()?>backend/Users/UpdateStatus',
			data : {status: status,user_id: user_id},
			success : function(res){
				var ress = JSON.parse(res);
				alert(ress.message);
			}
		})
	});
</script>

<script>
	$(document).ready(function() {
		var form = $('#userInfoForm');
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
				user_name: {
					required: true
				},
				user_email:{
					required : true,
					email :true
				},
				user_mobile: {
					required: true,
					minlength:10,
					maxlength:12
				},
				user_password:{
					required :true,
					minlength:6
				},
				user_dob:{
					required:true
				},
				user_nationality:{
					required:true
				},
				user_country:{
					required:true
				},
				user_city:{
					required:true
				},
				user_gender:{
					required:true
				},
				currency:{
					required:true
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
				var postData = new FormData($("#userInfoForm")[0]);
				$.ajax({
					type:'POST',
					url:'<?php echo base_url();?>backend/Users/updateUserInfo',
					processData: false,
					cache: false,
					contentType: false,
					data : postData,
					success:function(data){
						var ress = JSON.parse(data);
						// alert(ress.message); 
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

	$('.display').dataTable( {
		"ordering": false
	} );
</script>