
  <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>Update</h1>
                    <ul>
                  
                        <li>Users</li>
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
  <form class="signup-form" enctype="multipart/form-data" method="POST" action="<?php echo base_url();  ?>user_pdate/<?php print_r($user_view[0]['id']); ?>">

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
      <input type="text" class="form-control" required="" name="name" id="name" placeholder="Enter Name" value="<?php print_r($user_view[0]['name']); ?>" >
    </div>
  </div>
  <div class="col-sm-4">
    <div class="form-group">
      <label>E-mail:</label>
      <input type="email" class="form-control" required="" name="email" id="name" placeholder="Enter Email" value="<?php print_r($user_view[0]['email']); ?>">
    </div>
  </div>
  <div class="col-sm-4">
    <div class="form-group">
      <label>Contact:</label>
      <input type="number" class="form-control" required="" name="contact" id="name" placeholder="Enter Contact" value="<?php print_r($user_view[0]['contact']); ?>">
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-4">
    <div class="form-group">
      <label>Password:</label>
      <input type="text" class="form-control" required="" name="pass" id="name" placeholder="Enter Password" value="<?php print_r($user_view[0]['pass']); ?>" >
    </div>
  </div>
  <input type="hidden" value="<?php print_r($user_view[0]['id']); ?>" name="id">
  <div class="col-sm-4">
   <div class="form-group">

              <label for="prof" class="btn btn-default">Profile image</label>
             <img style="width: 100%;height:100px;border-radius: 7px;object-fit:contain;" src="<?php echo base_url();  ?>upload/image/<?php print_r($user_view[0]['profile_pic']); ?>">
              <input type="file" value="" name="userfile"  id="prof">

            </div>
  </div>
  <div class="col-sm-4">
    <div class="form-group">
      <label>Address:</label>
      <textarea name="address" value="<?php print_r($user_view[0]['address']); ?>" class="form-control"  placeholder="Enter Your Address"  required="required"><?php print_r($user_view[0]['address']); ?></textarea>
    </div>
  </div>
</div>
    
 
    <input type="submit" name="submit" style="float: right;" value="Save" class="btn btn-success">
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

