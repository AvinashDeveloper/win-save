    <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>Redeem</h1>
                    <ul>
                        <li><a href="href.html">Form</a></li>
                        <li>Offer Redeem</li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>
          <div class="row">
            <!-- order-card start -->
           
            <div class="col-sm-12">
              <div class="card">
                 <?php if( $error=$this->session->flashdata('confirm_order')): ?>
                    <div class="form-group">
                      <div class="input-icon">
                        <div class="alert alert-dismissible alert-success" id="successMessage">
                          <?php echo $error; ?>
                        </div>
                      </div>
                    </div>
                    <?php endif; ?>
                   
           
                <div class="card-body">
                  <form action="<?php echo base_url(); ?>checkRedeem" method="post" enctype="multipart/form-data">
                   
                    <div class="form-group">
                      <label for="">Enter User Code</label>
                     <input type="number" name="generated_code" placeholder="Enter User Code" class="form-control" value="">
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
  