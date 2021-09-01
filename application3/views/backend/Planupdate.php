<div class="pcoded-content">
  <div class="pcoded-inner-content">
    <div class="main-body">
      <div class="page-wrapper">
        <div class="page-body">
          <div class="row">
            <!-- order-card start -->
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Subscription Plan update</h4>
                </div>
                <div class="card-body">
                  <form action="<?php echo base_url() ?>plan_update_data" method="post" enctype="multipart/form-data">
                    <?php if( $error=$this->session->flashdata('plan_update')): ?>
                    <div class="form-group">
                      <div class="input-icon">
                        <div class="alert alert-dismissible alert-success" id="successMessage">
                          <?php echo $error; ?>
                        </div>
                      </div>
                    </div>
                    <?php endif; ?>
                    <input type="hidden" name="plan_id" value="<?php print_r($get_plan_detail[0]['plan_id']);  ?>">
                    <div class="row">
                      <div class="col-sm-6" style="background-color:lavender;">
                        <div class="form-group">
                          <label for="">Plan type</label>
                         <input type="text" name="plan_type"  class="form-control" value="<?php print_r($get_plan_detail[0]['plan_type']);  ?>" required="required">
                        </div>
                      </div>
                      <div class="col-sm-6" style="background-color:lavenderblush;">
                        <div class="form-group">
                          <label for="">Price</label>
                          <input type="number" name="plan_price" class="form-control" value="<?php print_r($get_plan_detail[0]['plan_price']);  ?>" required="required">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="">Detail</label>
                      <textarea name="plan_detail" class="form-control" value="<?php print_r($get_plan_detail[0]['plan_detail']);  ?>" required="required"><?php print_r($get_plan_detail[0]['plan_detail']);  ?></textarea>
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
    </div>
  </div>