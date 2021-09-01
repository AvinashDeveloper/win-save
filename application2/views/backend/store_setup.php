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
				<li>Store Setup</li>

			</ul>

		</div>

		<div class="separator-breadcrumb border-top"></div>



		<div id="accordion3">

			<div class="card">
				<div class="card-header">
					<a class="card-link" data-toggle="collapse" href="#collapseOne">
						Store Details
					</a>
				</div>
				<div id="collapseOne" class="collapse " data-parent="#accordion3">
					<div class="card-body">

						<form method="post" action="">
							<div class="form-group">
								<label>Store Name En.</label>
								<input type="text" name="store_name" value="<?php print_r($store_setup[0]['name']);   ?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Category</label>
								<select class="form-control" required="" name="category_id" id="cat">
									<option value="" >select Category</option>
									<?php echo categoryType((int)$store_setup[0]['category_id']); ?>
									<?php  
									// $cat = explode(",", $store_setup[0]['category_id']);
									// foreach ($cat as $key) { ?>

									<!-- <option value="<?php //echo $key;  ?>"><?php //echo $key;  ?></option>
									<?php //} ?> -->

								</select>
							</div>
							<div class="form-group">
								<label>Sub Category</label>
								<select class="form-control" name="subcat_id" id="sub_cat">
									<option value="">select Sub Category</option>
									<?php   //foreach ($getsubcategory as $key) { ?>
										<!-- <option value="<?php //echo $key->id;  ?>"><?php //echo $key->name;  ?></option> -->
									<?php //} ?>
									<?php echo subCategoryType((int)$store_setup[0]['subcat_id'],$store_setup[0]['category_id']);?>
								</select>
							</div>
							<div class="form-group">
								<label>Aminities / Tag.</label><br/>
								<div class="form-check-inline">
									<?php
									foreach ($vendorAminity as $key) {
										?>
										<label class="form-check-label" for="cehck2">
											<input type="checkbox" name="amities" checked="" class="form-check-input" id="cehck2" name="optradio" value="option2"><?php echo $key->name;  ?>
										</label>
										<?php
									}
									?>
								</div>
							</div>
							<h5>Add Another Language</h5>
							<div class="form-group">
								<label>Store Another Language</label>
								<select class="form-control" name="language">
									<option value="1">Arabic</option>
									<option value="2">English</option>
								</select>
							</div>
							<button class="btn btn-success" type="submit" name="store_detail">submit</button>
						</form>
					</div>
				</div>
			</div>
			<br/>
			<div class="card">
				<div class="card-header">
					<a class="collapsed card-link" data-toggle="collapse" href="#e22">
						Gallery
					</a>
				</div>
				<div id="e22" class="collapse" data-parent="#accordion3">
					<div class="card-body">
						<form method="post" enctype="multipart/form-data" action="">
							<div class="row">
								<div class="col-4">
									<div class="form-group">
										<label>Logo Image</label>
										<div class="avatar-upload">
											<div class="avatar-edit">
												<input type='file' name="logo" id="imageUpload_logo" accept=".png, .jpg, .jpeg"/>
												<input type="hidden" name="logo_image" value="<?php print_r($store_setup[0]['logo_image']);   ?>">
												<label for="imageUpload_logo"></label>
											</div>
											<div class="avatar-preview">
												<div id="imagePreview_logo" >
													<img src="<?php echo base_url();  ?>assets/images/vendors/store_img/<?php print_r($store_setup[0]['logo_image']);   ?>">
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-4">
									<div class="form-group">
										<label>Feature Image</label>
										<div class="avatar-upload">
											<div class="avatar-edit">
												<input type='file' name="featured_image" id="imageUpload_feature" accept=".png, .jpg, .jpeg"/>
												<input type="hidden" name="featured_image" value="<?php print_r($store_setup[0]['featured_image']);   ?>">
												<label for="imageUpload_feature"></label>
											</div>
											<div class="avatar-preview">
												<div id="imagePreview_feature">
													<img src="<?php echo base_url();  ?>assets/images/vendors/store_img/<?php print_r($store_setup[0]['featured_image']);   ?>">
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-4">
									<div class="form-group">
										<label>Menu Pdf</label>
										<div class="avatar-upload">
											<div class="avatar-edit">

												<input type='file' name="menu_pdf" id="imageUpload_menu" accept=".png, .jpg, .jpeg"/>
												<input type="hidden" name="menu_pdf" value="<?php print_r($store_setup[0]['menu_pdf']);   ?>">
												<label for="imageUpload_menu"></label>
											</div>
											<div class="avatar-preview">
												<div id="imagePreview_menu">
													<img src="<?php echo base_url();  ?>assets/images/vendors/store_img/<?php print_r($store_setup[0]['menu_pdf']);   ?>">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<br/><br/>
							<div class="row">
								<?php //$i=1; foreach ($vendorslider as $key1) { ?>
									<div class="col-2">
										<div class="form-group">
											<label>Slider <?php  //echo $i; ?></label>
											<div class="avatar-upload">
												<div class="avatar-edit">
													<input type='file' name="slider[]" id="imageUploadSlider" accept=".png, .jpg, .jpeg" onchange="preview_image();"  multiple />
													<label for="imageUploadSlider"></label>
												</div>
												<div class="avatar-preview">
													<div id="imagePreviewslider">
														
													</div>
												</div>
												<?php $i=1; foreach ($vendorslider as $key1) { ?>
												<div class="avatar-preview">
													<div id="image_preview">
														<img src="<?php echo base_url();  ?>assets/images/vendors/store_img/<?php print_r($key1['slider_img']);   ?>">
													</div>
												</div>
												<?php $i++;}  ?>  
											</div>
										</div>
									</div>
									<?php// $i++;}  ?>  
								</div>

							</div>
							<div>
								<button class="btn btn-dark" type="submit" name="gallery">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<br/>
			<div class="card">
				<div class="card-header">
					<a class="collapsed card-link" data-toggle="collapse" href="#e33">
						Display Info
					</a>
				</div>
				<div id="e33" class="collapse" data-parent="#accordion3" class="form-control">
					<div class="card-body">
						<form action="" method="post">
							<div class="row">
								<div class="col-3">
									<div class="form-group">
										<label>Website</label>
										<input type="text" value="<?php print_r($store_setup[0]['website']);   ?>" name="website" placeholder="Website" class="form-control">
									</div>
								</div>
								<div class="col-3">
									<div class="form-group">
										<label>E-mail</label>
										<input type="text" name="email" placeholder="E-mail" class="form-control" value="<?php print_r($store_setup[0]['email']);   ?>">
									</div>
								</div>
								<div class="col-3">
									<div class="form-group">
										<label>Twitter</label>
										<input type="text" name="twitter" placeholder="Twitter" class="form-control" value="<?php print_r($store_setup[0]['twitter']);   ?>">
									</div>
								</div>
								<div class="col-3">
									<div class="form-group">
										<label>Facebook</label>
										<input type="text" name="facebook" value="<?php print_r($store_setup[0]['facebook']);   ?>" placeholder="Facebook" class="form-control">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-3">
									<div class="form-group">
										<label>Instagram</label>
										<input type="text" name="instagram" placeholder="Instagram" class="form-control" value="<?php print_r($store_setup[0]['instagram']);   ?>">
									</div>
								</div>
								<div class="col-3">
									<div class="form-group">
										<label>Snapchat</label>
										<input type="text" name="snapchat" placeholder="Snapchat" class="form-control" value="<?php print_r($store_setup[0]['snapchat']);   ?>">
									</div>
								</div>
								<div class="col-3">
									<div class="form-group">
										<label>Youtube</label>
										<input type="text" name="youtub" placeholder="Youtube" class="form-control" value="<?php print_r($store_setup[0]['youtub']);   ?>">
									</div>
								</div>
								<div class="col-3">
									<div class="form-group">
										<label>Whatsapp</label>
										<input type="text" value="<?php print_r($store_setup[0]['whatsapp']);   ?>" name="whatsapp" placeholder="Whatsapp" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<label for="">Description En.</label>
										<textarea class="form-control" name="description_en" cols="5" value="<?php print_r($store_setup[0]['description']);   ?>" rows="5"><?php print_r($store_setup[0]['description']);   ?></textarea>
									</div>

								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="">Description Ar.</label>
										<textarea class="form-control" name="description_ar" cols="5" value="<?php print_r($store_setup[0]['description']);   ?>" rows="5"><?php echo translateText($store_setup[0]['description']);   ?></textarea>
									</div>
									<div class="col-12">
										<input type="submit" name="display_info" value="submit" class="btn btn-dark float-right">
									</div>
								</div>


							</div>
						</form>
					</div>
				</div>
			</div>
			<br/>
			<div class="card">
				<div class="card-header">
					<a class="collapsed card-link" data-toggle="collapse" href="#e44">
						Branch
					</a>
				</div>
        		<?php if(!empty($this->session->flashdata('messages'))) { echo $this->session->flashdata('messages'); }?>
				<div id="e44" class="collapse" data-parent="#accordion3">
					<div class="card-body">
						<div class="float-right">
							<button class="btn btn-secondary"  data-toggle="modal" data-target="#add_branch">+ Add</button>
						</div>
						<div class="table-responsive" style="height: auto;">
							<table class="table table-bordered table-hover display">
								<thead>
									<tr>
										<td>#No</td>
										<th>Branch Name En.</th>
										<th>Address En.</th>
										<th>Branch Name Ar.</th>

										<th>Address Ar.</th>
										<th>District</th>
										<th>City</th>
										<th>Region</th>
										<th>Store Hours</th>
										<th>Mobile</th>
										<th>Telephone</th>
										<th>latitude</th>
										<th>longitude</th>
										<th>Pin Number</th>
                    					<th>Update</th>
										<th>Remove</th>
									</tr>
								</thead>
								<tbody>
                  <?php 
				  $vendor_id = $this->uri->segment(4);
				  $i=1;
                  foreach ($vendorBranches as $key) { ?>
										<tr id="row_<?php echo $key->id;?>">
											<td><?php echo $i; ?></td>
											<td><?php  echo $key->branch_name;  ?></td>
											<td><?php  echo $key->address;  ?></td>
											<td><?php  echo translateText($key->branch_name) ? translateText($key->branch_name) : $key->branch_name;  ?></td>
											<td><?php  echo $key->address;  ?></td>
											<td><select class="form-control"><?php  echo country((int)$key->district);  ?></select></td>
											<td><select class="form-control"><?php  echo city((int)$key->city,$key->region);  ?></select></td>
											<td><select class="form-control"><?php  echo region((int)$key->region);  ?></select></td>
										<td><button class="btn btn-success" onclick="setId('<?php echo $key->id?>','<?php echo $key->vendor_id;?>');" data-toggle="modal" data-target="#store_time">Store Time</button></td>
										<td><?php  echo $key->mobile;  ?></td>
										<td><?php  echo $key->telephone;  ?></td>
										<td><?php  echo $key->latitude;  ?></td>
										<td><?php  echo $key->longitude;  ?></td>
										<td><?php  echo $key->pin_number;  ?></td>
                    					<td><button class="btn btn-success" onclick="getUpdateData('<?php echo $key->id?>','<?php echo $key->vendor_id;?>');" data-toggle="modal" data-target="#branch_update">update</button></td>
										<td><span class="text-danger" onclick="deleteRow('<?php echo $key->id; ?>');"><i class="fa fa-close"></i></span></td>
									</tr>
								</tbody>
								<?php  $i++;}  ?>
							</table>
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
<div class="modal" id="add_branch">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add branch</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?php echo base_url('backend/Login/saveStoreBranch/').$this->uri->segment(4);?>" method="POST">
          <div class="row">
            <div class="col-6">
              <!-- <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title" class="form-control" value="title">
              </div> -->
              <div class="form-group">
                <label for="">Branch Name En.</label>
                <input type="text" name="branch_name_en" id="branch_name" class="form-control" placeholder="branch_name">
              </div>
              <div class="form-group">
                <label for="">Branch Name Ar.</label>
                <input type="text" name="branch_name_ar" class="form-control" placeholder="branch_name">
              </div>
              <div class="form-group">
                <label for="">Mobile</label>
                <input type="number" name="mobile" class="form-control" placeholder="Mobile">
              </div>
              <div class="form-group">
                <label for="">Telephone</label>
                <input type="number" name="telephone" class="form-control" placeholder="Telephone">
              </div>
              <div class="form-group">
                <label>District</label>
                <select class="form-control" name="district">
                  <?php echo country(); ?>
                </select>
              </div>
              <div class="form-group">
                <label>City</label>
                <select class="form-control" name="city" id="city">
                  
                </select>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label>Region </label>
                <select class="form-control" name="region" id="region">
                  <?php echo region(); ?>
                </select>
              </div>
              <div class="form-group">
                <label for="">Pin Number</label>
                <input type="number" name="pin_number" class="form-control" placeholder="Pin number">
              </div>
              <!-- <div class="form-group">
                <label for="">Store Hours</label>
                <input type="text" name="store_hours" class="form-control" placeholder="Hours">
              </div> -->
              <div class="form-group">
                <label for="">Latitute</label>
                <input type="text" name="latitude" class="form-control" placeholder="Latitute">
              </div>
              <div class="form-group">
                <label for="">Longitue</label>
                <input type="text" name="longitude" class="form-control" placeholder="Longitue">
              </div>
              <div class="form-group">
                <label for="">Address En.</label>
                <textarea class="form-control" cols="5" rows="5" name="address"></textarea>
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

<!-- The Modal -->
<div class="modal" id="branch_update">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Update branch</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<!-- Modal body -->
			<div class="modal-body" id="form_input">
				<form action='<?php echo base_url("backend/Login/updateBranchInfo"); ?>' method='POST'>
					<div class='row'>
							<div class='col-6'>
								<div class='form-group'>
										<label for=''>Branch Name En.</label>
										<input type='text' name='branch_name' id="branch_name_en" class='form-control' placeholder='Branch Name' value=''>
								</div>
								<div class='form-group'>
										<label for=''>Branch Name Ar.</label>
										<input type='text' name='branch_name_ar' id="branch_name_ar" class='form-control' value=''>
								</div>
								<div class='form-group'>
										<label for=''>Mobile</label>
										<input type='number' name='mobile' id="mobile" class='form-control' value=''>
								</div>
								<div class='form-group'>
										<label for=''>Telephone</label>
										<input type='number' name='telephone' id="telephone" class='form-control' value=''>
								</div>
								<div class='form-group'>
										<label>District</label>
										<select class='form-control' name='district' id="district">
											<?php echo country(); ?>
										</select>
								</div>
								<div class='form-group'>
										<label>City</label>
										<select class='form-control' name='city' id="city_b">
											<?php echo city(); ?>
										</select>
								</div>
							</div>
							<div class='col-6'>
								<div class='form-group'>
										<label>Region </label>
										<select class='form-control' name='region' id="region_b">
											<?php echo region(); ?>
										</select>
								</div>
								<div class='form-group'>
										<label for=''>Pin Number</label>
										<input type='number' name='pin_number' id="pin_number" class='form-control' value=''>
								</div>
								<!-- <div class='form-group'>
										<label for=''>Store Hours</label>
										<input type='text' name='store_hours' id="store_hours" class='form-control' value=''>
								</div> -->
								<div class='form-group'>
										<label for=''>Latitute</label>
										<input type='text' name='latitude' id="latitude" class='form-control' value=''>
								</div>
								<div class='form-group'>
										<label for=''>Longitue</label>
										<input type='text' name='longitude' id="longitude" class='form-control' value=''>
								</div>
								<div class='form-group'>
										<label for=''>Address En.</label>
										<textarea class='form-control' name='address' id="address" cols='5' rows='5'></textarea>
								</div>
							</div>
							<input type='hidden' name='branch_id' value='' id="branch_id">
							<input type='hidden' name='vendor_id' value='' id="vendor_id">
							<div class='col-12'>
								<button type='submit' class='btn btn-dark float-right'>Update</button>
							</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>



<!-- The Modal -->
<div class="modal" id="store_time">
	<div class="modal-dialog">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Store Time</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<!-- Modal body -->
			<div class="modal-body">
				<form action="<?php echo base_url('backend/Manage_vendors/store_branch_time'); ?>" method="POST">
					<div class="row">
						<div class="col-12">
							<input type="hidden" name="vendor_id" id="v_id">
							<input type="hidden" name="branch_id" id="b_id">
							<div class="form-group">
								<label for="">Sunday</label>
								<input type="time" name="sun_start" id="sun_start" class="form-control" >
								<input type="time" name="sun_end" id="sun_end" class="form-control" >
							</div>
							<!-- //onclick="getStoreTime('<?php echo $key->id?>','<?php echo $key->vendor_id;?>');" -->

							<div class="form-group">
								<label for="">Monday</label>
								<input type="time" name="mon_start" id="mon_start" class="form-control" >
								<input type="time" name="mon_end" id="mon_end" class="form-control" >
							</div>
							<div class="form-group">
								<label for="">Tuesday</label>
								<input type="time" name="tue_start" id="tue_start" class="form-control" >
								<input type="time" name="tue_end" id="tue_end" class="form-control" >
							</div>
							<div class="form-group">
								<label for="">Wednesday</label>
								<input type="time" name="wed_start" id="wed_start" class="form-control" >
								<input type="time" name="wed_end" id="wed_end" class="form-control" >
							</div>
							<div class="form-group">
								<label for="">Thursday</label>
								<input type="time" name="thu_start" id="thu_start" class="form-control" >
								<input type="time" name="thu_end" id="thu_end" class="form-control" >
							</div>
							<div class="form-group">
								<label for="">Friday</label>
								<input type="time" name="fri_start" id="fri_start" class="form-control" >
								<input type="time" name="fri_end" id="fri_end" class="form-control" >
							</div>
							<div class="form-group">
								<label for="">Saterday</label>
								<input type="time" name="sat_start" id="sat_start" class="form-control" >
								<input type="time" name="sat_end" id="sat_end" class="form-control" >
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

<script >
	var setId = function(branchId,vandorId){
		$("#b_id").val(branchId);
		$("#v_id").val(vandorId);
		$.ajax({
			type : "POST",
			url : '<?php echo base_url();?>backend/Manage_vendors/getStoreTimeInfo',
			data : { branchId: branchId ,vandorId:vandorId },
			success:function(data){
				var getInfo = JSON.parse(data);
				$("#sun_start").val(getInfo.result.sun_start);
				$("#sun_end").val(getInfo.result.sun_end);
				$("#mon_start").val(getInfo.result.mon_start);
				$("#mon_end").val(getInfo.result.mon_end);
				$("#tue_start").val(getInfo.result.tue_start);
				$("#tue_end").val(getInfo.result.tue_end);
				$("#wed_start").val(getInfo.result.wed_start);
				$("#wed_end").val(getInfo.result.wed_end);
				$("#thu_start").val(getInfo.result.thu_start);
				$("#thu_end").val(getInfo.result.thu_end);
				$("#fri_start").val(getInfo.result.fri_start);
				$("#fri_end").val(getInfo.result.fri_end);
				$("#sat_start").val(getInfo.result.sat_start);
				$("#sat_end").val(getInfo.result.sat_end);
			}
		});	
	}

	var getUpdateData = function(branchId,vandorId){
      $.ajax({
        type:'POST',
        url:'<?php echo base_url(); ?>backend/Login/getBranchInfo',
        data :{branchId:branchId,vandorId:vandorId},
        success:function(data){
			var getInfo = JSON.parse(data);
			console.log(Object.values(getInfo.result));
			$("#branch_id").val(getInfo.result.id);
			$("#branch_name_en").val(getInfo.result.branch_name);
			$("#branch_name_ar").val(getInfo.result.branch_name_ar);
			$("#vendor_id").val(getInfo.result.vendor_id);
			$("#store_hours").val(getInfo.result.store_hours);
			$("#mobile").val(getInfo.result.mobile);
			$("#telephone").val(getInfo.result.telephone);
			$("#pin_number").val(getInfo.result.pin_number);
			$("#region_b").val(getInfo.result.region);
			$("#city").val(getInfo.result.city);
			$("#district").val(getInfo.result.district);
			$("#address").val(getInfo.result.address);
			$("#other_adress").val(getInfo.result.other_adress);
			$("#latitude").val(getInfo.result.latitude);
			$("#longitude").val(getInfo.result.longitude);
			$("#status").val(getInfo.result.status);
			$("#add_date").val(getInfo.result.add_date); 
        }
      });
	}

	// script for delete offers
	var deleteRow = function(id) {
		var result = confirm("Want to delete?");
		if (result) {
			var url = '<?php echo base_url(); ?>backend/Manage_vendors/delete_row';  
			$.ajax({
				type: "POST",
				url: url,
				data: {id: id,tbl:'vendor_offers',col_name:'id'},
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
	var deleteImg = function(id) {
		var result = confirm("Want to delete?");
		if (result) {
			var url = '<?php echo base_url(); ?>backend/Manage_vendors/delete_row';  
				$.ajax({
					type: "POST",
					url: url,
					data: {id: id,tbl:'vendor_slider',col_name:'id'},
				})
				.done(function(result){
					var result = JSON.parse(result);
					if( parseInt(result.status) == 1 ) {
							$('#img_'+id).hide();
					}
					var message = result.message;
					alert(message);
				}); 
		}
	};
	// script for get city info
    $("#region").on('change', function(){
        var region_id = $("#region").val();
        $.ajax({
                type : 'POST',
                url : '<?php echo base_url();?>backend/Manage_vendors/getCityInfo',
                data : {regionId : region_id,select : ''},
        })
        .done(function(result){
                $("#city").html(result);
        });
    });

    $("#region_b").on('change', function(){
        var region_id = $("#region_b").val();
        $.ajax({
                type : 'POST',
                url : '<?php echo base_url();?>backend/Manage_vendors/getCityInfo',
                data : {regionId : region_id,select : ''},
        })
        .done(function(result){
                $("#city_b").html(result);
        });
    });

	$("#cat").on('change', function(){
        var cat_id = $("#cat").val();
        $.ajax({
                type : 'POST',
                url : '<?php echo base_url();?>backend/Manage_vendors/getSubCatInfo',
                data : {cat_id : cat_id,select : ''},
        })
        .done(function(result){
                $("#sub_cat").html(result);
        });
    });
</script>

<script type="text/javascript">
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#imagePreview_menu').css('background-image', 'url('+e.target.result +')');
				$('#imagePreview_menu').hide();
				$('#imagePreview_menu').fadeIn(650);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	$("#imageUpload_menu").change(function() {
		readURL(this);
	});

	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#imagePreview_feature').css('background-image', 'url('+e.target.result +')');
				$('#imagePreview_feature').hide();
				$('#imagePreview_feature').fadeIn(650);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	$("#imageUpload_feature").change(function() {
		readURL(this);
	});

	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#imagePreview_logo').css('background-image', 'url('+e.target.result +')');
				$('#imagePreview_logo').hide();
				$('#imagePreview_logo').fadeIn(650);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	$("#imageUpload_logo").change(function() {
		readURL(this);
	});
	
	function preview_image() 
	{
		var total_file=document.getElementById("imageUploadSlider").files.length;
		for(var i=0;i<total_file;i++)
		{
			$('#imagePreviewslider').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'><br>");
		}
	}

</script>