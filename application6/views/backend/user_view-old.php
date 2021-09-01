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
							<form action="">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Name</label>
											<input type="text" name="name" class="form-control">
										</div>
										<div class="form-group">
											<label>Mobile Number</label>
											<input type="number" name="mobile_number" class="form-control">
										</div>
										<div class="form-group">
											<label>E-mail</label>
											<input type="email" name="email" class="form-control">
										</div>
										<div class="form-group">
											<label>Password</label>
											<input type="password" name="password" class="form-control">
										</div>
										<div class="form-group">
											<label>Date of Birth</label>
											<input type="date" name="dob" class="form-control">
										</div>
										<input type="submit" name="" value="submit" class="btn btn-secondary">
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Nationality</label>
											<select class="form-control">
												<option>Nationality 1</option>
												<option>Nationality 2</option>
												<option>Nationality 3</option>
												<option>Nationality 4</option>
											</select>
										</div>
										<div class="form-group">
											<label>Country of Residence</label>
											<select class="form-control">
												<option>city1</option>
												<option>city2</option>
												<option>city3</option>
												<option>city4</option>
											</select>
										</div>
										<div class="form-group">
											<label>City</label>
											<select class="form-control">
												<option>city1</option>
												<option>city2</option>
												<option>city3</option>
												<option>city4</option>
											</select>
										</div>
										<div class="form-group">
											<label>Gender</label><br/>
											<label for="" >
												<input  type="radio" name="gender" class="custom-radio">
												Male
											</label>
											<label for="">Female
												<input type="radio" name="gender" class="custom-radio">
											</label>
										</div>
										<div class="form-group">
											<label>currency preference</label>
											<input type="text" name="name" class="form-control">
										</div>
									</div>
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
									<input  type="radio" name="Plan" class="custom-radio">
									Free
								</label>
								<label for="">Paid
									<input type="radio" name="Plan" class="custom-radio">
								</label>
							</div>
							<div class="form-group">
								<label>Status</label><br/>
								<label for="" >
									<input  type="radio" name="Status" class="custom-radio">
									Active
								</label>
								<label for="">Inactive
									<input type="radio" name="Status" class="custom-radio">
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
									<tr>
										<td>01/01/2019</td>
										<td>1 Year Subscription</td>
										<td>150</td>
										<td>50</td>
										<td>05</td>
										<td>105</td>
										<td>1/1/2019</td>
										<td>31/12/2019</td>
										<td>In App</td>
									</tr>
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
									<tr>
										<td>4450</td>
										<td>4/1/2020</td>
										<td>Burger king</td>
										<td>Jeddah</td>
										<td>Main St.</td>
										<td>buy one get one</td>
										<td>buy one meal get one meal free</td>
										<td>30</td>
									</tr>
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
									<tr>
										<td>4/1/2020</td>
										<td>50</td>
										<td>Register</td>
									</tr>
									<tr>
										<td>4/1/2020</td>
										<td>30</td>
										<td>Offer</td>
									</tr>
									<tr>
										<td>4/1/2020</td>
										<td>10</td>
										<td>Daily</td>
									</tr>
									<tr>
										<td>4/1/2020</td>
										<td>10</td>
										<td>Daily</td>
									</tr>
								</tbody>
							</table>
							<div class="d-flex flex-row justify-content-around">
								<dl>
									<dt>Total Points</dt>
									<dd>100</dd>
								</dl>
								<dl>
									<dt>claimed Points</dt>
									<dd>50</dd>
								</dl>
								<dl>
									<dt>Remaining</dt>
									<dd>50</dd>
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
						6. Redeemed Gifts
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
									<tr>
										<td>4/1/2020</td>
										<td>100</td>
										<td>Burger king</td>
										<td>Meal</td>
										<td>30  </td>
										<td>Claimed </td>
										<td>6363</td>
										<td>31/12/2021</td>
									</tr>
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
										<tr>
											<td>4/1/2020</td>
											<td>Burger king</td>
											<td>4</td>
											<td>Great offers </td>
											<td>x </td>
											<td><i class="fa fa-times text-danger"></i></td>
										</tr>
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
							<form>
								<div class="col-md-4">
									<label>Pick Year</label>
								</div>
								<div class="col-md-8">
									<select class="form-control">
										<label>Year</label>
										<option>2016</option>
										<option>2017</option>
										<option>2018</option>
										<option>2019</option>
										<option>2020</option>
									</select>
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
											<tr>
												<td>Jan-2020</td>
												<td>1000</td>
												<td>50</td>
												<td>20</td>
												<td>20</td>
												<td>1090</td>
												<td>50</td>
											</tr>
											<tr>
												<td>Feb-2020</td>
												<td>1000</td>
												<td>50</td>
												<td>20</td>
												<td>20</td>
												<td>1090</td>
												<td>50</td>
											</tr>
											<tr>
												<td>Mar-2020</td>
												<td>1000</td>
												<td>50</td>
												<td>20</td>
												<td>20</td>
												<td>1090</td>
												<td>50</td>
											</tr>
											<tr>
												<td>Apr-2020</td>
												<td>1000</td>
												<td>50</td>
												<td>20</td>
												<td>20</td>
												<td>1090</td>
												<td>50</td>
											</tr>
											<tr>
												<td>May-2020</td>
												<td>1000</td>
												<td>50</td>
												<td>20</td>
												<td>20</td>
												<td>1090</td>
												<td>50</td>
											</tr>
											<tr>
												<td>Jun-2020</td>
												<td>1000</td>
												<td>50</td>
												<td>20</td>
												<td>20</td>
												<td>1090</td>
												<td>50</td>
											</tr>
											<tr>
												<td>July-2020</td>
												<td>1000</td>
												<td>50</td>
												<td>20</td>
												<td>20</td>
												<td>1090</td>
												<td>50</td>
											</tr>
											<tr>
												<td>Aug-2020</td>
												<td>1000</td>
												<td>50</td>
												<td>20</td>
												<td>20</td>
												<td>1090</td>
												<td>50</td>
											</tr>
											<tr>
												<td>Sep-2020</td>
												<td>1000</td>
												<td>50</td>
												<td>20</td>
												<td>20</td>
												<td>1090</td>
												<td>50</td>
											</tr>
											<tr>
												<td>Oct-2020</td>
												<td>1000</td>
												<td>50</td>
												<td>20</td>
												<td>20</td>
												<td>1090</td>
												<td>50</td>
											</tr>
											<tr>
												<td>Nov-2020</td>
												<td>1000</td>
												<td>50</td>
												<td>20</td>
												<td>20</td>
												<td>1090</td>
												<td>50</td>
											</tr>
											<tr>
												<td>Dec-2020</td>
												<td>1000</td>
												<td>50</td>
												<td>20</td>
												<td>20</td>
												<td>1090</td>
												<td>50</td>
											</tr>
										</tbody>
										<tfoot>
											<tr>
												<th>Total</th>
												<th>6000</th>
												<th>150</th>
												<th>50</th>
												<th>30</th>
												<th>6230</th>
												<th>150</th>
											</tr>
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