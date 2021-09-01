  <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>Basic</h1>
                    <ul>
                        <li><a href="href.html">Form</a></li>
                        <li>Basic</li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>
          <div class="row">
            <!-- order-card start -->
            <div class="col-sm-12">
               <?php if( $error = $this->session->flashdata('profile_save')): ?>
        <div class="form-group">
              <div class="input-icon">
        <div class="alert alert-dismissible alert-success" id="successMessage">
          <?php echo $error; ?>
        </div>
      </div>
    </div>
  </div>
</div>
  <?php endif; ?>
              <div class="container bootstrap snippet">
                   <form action="<?php echo base_url(); ?>vender_profile_update" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-sm-10">
                    <h4>Admin Profile</h4>
                  </div>
               
                
               
                </div>
                <div class="row">

                  <div class="col-sm-3">
                    <!--left col-->
                    <div class="text-center">
                      <img src="<?php echo base_url(); ?>upload/<?php print_r($user_view[0]['featured_image']); ?>" class="avatar img-circle img-thumbnail" alt="avatar">
              
              
              
               <div class="custom-file">
    <input type="file" class="custom-file-input file-upload" id="customFile" name="userfile">
    <label class="custom-file-label btn btn-success" for="customFile">Choose file</label>
  </div>
                    </div>
                  
               
                  </div>
                  <!--/col-3-->
                  <div class="col-sm-9">
                 
                    <div class="card ">
                        <div class="card-header">
                            <h4 class="card-title">
                                Profile Information
                            </h4>
                        </div>
                      <div class="card-body active" id="home">
                   
                       
                          <div class="form-group">
                            <div class="col-xs-6">
                              <label for="first_name">First name</label>
                              <input type="text" class="form-control" name="name" value=" <?php print_r($user_view[0]['name']); ?>" id="first_name" placeholder="first name" title="enter your first name if any.">
                            </div>
                          </div>
                          <input type="hidden" name="image" value="<?php print_r($user_view[0]['featured_image']); ?>">
                         <input type="hidden" name="id" value="<?php print_r($user_view[0]['id']); ?>">
                          <div class="form-group">
                            <div class="col-xs-6">
                              <label for="phone">Phone</label>
                              <input type="text" class="form-control" name="contact" id="phone" value=" <?php print_r($user_view[0]['contact']); ?>" placeholder="enter phone" title="enter your phone number if any.">
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <div class="col-xs-6">
                              <label for="email">Email</label>
                              <input type="email" value="<?php print_r($user_view[0]['email']); ?>" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email.">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-xs-6">
                              <label for="email">Location</label>
                              <input type="text" name="address" class="form-control" id="location" value="<?php print_r($user_view[0]['address']); ?>" placeholder="somewhere" title="enter a location">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-xs-6">
                              <label for="password">Password</label>
                              <input value="<?php print_r($user_view[0]['password']); ?>" type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-xs-6">
                              <label for="email">National Id</label>
                              <a href="<?php echo base_url(); ?>upload/<?php print_r($user_view[0]['national_id']); ?>" target="_blank">National Id For Click Here</a>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-xs-6">
                              <label for="email">Business Proof</label>
                              <a href="<?php echo base_url(); ?>upload/<?php print_r($user_view[0]['business_proof']); ?>" target="_blank">Business Proof For Click Here</a>
                            </div>
                          </div>
                        
                          <div class="form-group">
                            <div class="col-xs-12">
                              <br>
                              <button class="btn btn-success" type="submit"><i class="fa fa-check"></i> Save</button>
                              <button class="btn btn-default" type="reset"><i class="fa fa-refresh"></i> Reset</button>
                            </div>
                          </div>
                      
                     
                      </div>
              
                            </div>
                          </div>
                      
                      </div>
                    </form>
                    </div>
              
                </div>
              </div>

                    <!--/tab-pane-->
   