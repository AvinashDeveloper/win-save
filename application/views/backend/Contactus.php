 <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea'});</script>
<div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>Contact</h1>
                    <ul>
                     
                        <li>Contact us</li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>
          <div class="row">
            <!-- order-card start -->
            <div class="col-sm-12">
              <div class="card">
                

                <div class="card-body">
                  <form action="<?php echo base_url(); ?>contactus" method="post" enctype="multipart/form-data">
                    <?php if( $error=$this->session->flashdata('contact_us')): ?>
                    <div class="form-group">
                      <div class="input-icon">
                        <div class="alert alert-dismissible alert-success" id="successMessage">
                          <?php echo $error; ?>
                        </div>
                      </div>
                    </div>
                    <?php endif; ?>
                     <input type="hidden" name="id" value="1">
                     <div class="form-group">
                      <label for="">Description</label>
                     <textarea name="detail" class="form-control" value=" <?php print_r($get_contactus[0]['detail']); ?>"> <?php print_r($get_contactus[0]['detail']); ?></textarea>
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
  