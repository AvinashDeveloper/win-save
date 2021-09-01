
  <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>Update</h1>
                    <ul>
                  
                        <li>Venders</li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>
               <div class="row">
                
                  <!-- order-card start -->
                  <div class="col-sm-12">
                  
                     <div class="card tabs-card">
                        <div class="card-block p-0">
                           <!-- Nav tabs -->
                      <div class="container">

<div class="form-sec p-4">

 <?php  echo form_open_multipart('updateVenders')?>
<?php if( $error = $this->session->flashdata('cr_ac')): ?>
        <div class="form-group">
              <div class="input-icon">
        <div class="alert alert-dismissible alert-success" id="successMessage">
          <?php echo $error; ?>
        </div>
      </div>
    </div>
  <?php endif; ?>
  <div class="row">
  <div class="col-sm-4">
    <div class="form-group">
      <label>Name:</label>
      <input type="text" class="form-control" required="" name="name" id="name" placeholder="Enter Name" value="<?php print_r($vender_view[0]['name']); ?>" >
    </div>
  </div>
  <div class="col-sm-4">
    <div class="form-group">
      <label>E-mail:</label>
      <input type="email" class="form-control" required="" name="email" id="name" placeholder="Enter Email" value="<?php print_r($vender_view[0]['email']); ?>">
    </div>
  </div>
  <div class="col-sm-4">
    <div class="form-group">
      <label>Contact:</label>
      <input type="number" class="form-control" required="" name="contact" id="name" placeholder="Enter Contact" value="<?php print_r($vender_view[0]['contact']); ?>">
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-4">
    <div class="form-group">
      <label>Password:</label>
      <input type="text" class="form-control" required="" name="password" id="name" placeholder="Enter Password" value="<?php print_r($vender_view[0]['password']); ?>" >
    </div>
  </div>
  <div class="col-sm-4">
    <div class="form-group">
      <label>City:</label>
      <input type="text" class="form-control" required="" name="city" id="name" placeholder="Enter City" value="<?php print_r($vender_view[0]['city']); ?>">
    </div>
  </div>
  <div class="col-sm-4">
    <div class="form-group">
      <label>Address:</label>
      <textarea name="address" value="<?php print_r($vender_view[0]['address']); ?>" class="form-control"  placeholder="Enter Your Address"  required="required"><?php print_r($vender_view[0]['address']); ?></textarea>
    </div>
  </div>
</div>
    
  <div class="row">
  <div class="col-sm-4">
    <div class="form-group">
              <img src="<?php echo base_url();  ?>assets/images/vendors/store_img/<?php print_r($vender_view[0]['featured_image']); ?>">
              <label for="prof" class="btn btn-default">Profile image</label>

              <input type="file" value="" name="files[]"  id="prof">

            </div>
  </div>
  <input type="hidden" name="id" value="<?php print_r($vender_view[0]['id']); ?>">
  <div class="col-sm-4">
    <div class="form-group">
              <img src="<?php echo base_url();  ?>assets/images/vendors/store_img/<?php print_r($vender_view[0]['logo_image']); ?>">
              <label for="nationalprof" class="btn btn-default">Logo Image</label>

              <input type="file" value="" name="files[]"  id="nationalprof">

            </div>
  </div>
  <div class="col-sm-4">
   <div class="form-group">
              <img src="<?php echo base_url();  ?>assets/images/vendors/store_img/<?php print_r($vender_view[0]['business_proof']); ?>">
              <label for="businprof" class="btn btn-default">Business prof</label>

              <input type="file" value="" name="files[]"  id="businprof">

            </div>
  </div>
</div> 
   
  <div class="row">
  <div class="col-sm-4">
    <div class="form-group">
                <img src="<?php echo base_url();  ?>assets/images/vendors/store_img/<?php print_r($vender_view[0]['menu_pdf']); ?>">
              <label for="" class="btn btn-default">Menu prof</label>

              <input type="file" value="" name="files[]" >

            </div>
  </div>
  <div class="col-sm-4">
   
  </div>
  <div class="col-sm-4">
   
  </div>
</div>     
    <input type="submit" name="submit" style="float: right;" value="Update" class="btn btn-success">
  </div>


</div>
                           <!-- Tab panes -->
                         
                        </div>
                     </div>
                  </div>
                  <!-- tabs card end -->
               </div>
            </div>
         </div>

