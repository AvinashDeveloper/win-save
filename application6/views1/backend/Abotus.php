  <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>Basic</h1>
                    <ul>
                        <li><a href="href.html">Form</a></li>
                        <li>About us</li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>
          <div class="row">
            <!-- order-card start -->
            <div class="col-sm-12">
              <div class="card">
             

                <div class="card-body">
                  <form action="<?php echo base_url(); ?>aboutus" method="post" enctype="multipart/form-data">
                    <?php if( $error=$this->session->flashdata('about_us')): ?>
                    <div class="form-group">
                      <div class="input-icon">
                        <div class="alert alert-dismissible alert-success" id="successMessage">
                          <?php echo $error; ?>
                        </div>
                      </div>
                    </div>
                    <?php endif; ?>
                    <div class="form-group">
                      <label for="">Heading</label>
                      <input type="text" name="heading" class="form-control" value="<?php print_r($get_aboutus[0]['heading']); ?>" required="required">
                      <input type="hidden" name="id" value="1">
                    </div>
                     <div class="form-group">
                      <label for="">Description</label>
                     <textarea name="description" cols="10" rows="10" class="form-control" value=" <?php print_r($get_aboutus[0]['description']); ?>"> <?php print_r($get_aboutus[0]['description']); ?></textarea>
                    </div>
                   
                    <div class="float-right">
                      <input type="submit" name="submit" value="submit" class="btn btn-success">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
   