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
              <div class="card">
                <div class="card-header">
                  <h4>Subscription Plan</h4>
                </div>
                <div class="card-body">
                  <form action="<?php echo base_url() ?>save-plans" method="post" enctype="multipart/form-data">
                    <?php if( $error=$this->session->flashdata('plan_save')): ?>
                    <div class="form-group">
                      <div class="input-icon">
                        <div class="alert alert-dismissible alert-success" id="successMessage">
                          <?php echo $error; ?>
                        </div>
                      </div>
                    </div>
                    <?php endif; ?>
                    <div class="row">
                      <div class="col-sm-6" style="background-color:lavender;">
                        <div class="form-group">
                          <label for="">Plan type</label>
                         <input type="text" name="plan_type"  class="form-control" value="" required="required">
                        </div>
                      </div>
                      <div class="col-sm-6" style="background-color:lavenderblush;">
                        <div class="form-group">
                          <label for="">Price</label>
                          <input type="number" name="plan_price" class="form-control" value="" required="required">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="">Detail</label>
                      <textarea name="plan_detail" class="form-control" value="" required="required"></textarea>
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
 