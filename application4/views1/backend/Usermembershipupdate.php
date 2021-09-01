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
                  <h4>User Plan Update</h4>
                </div>

                <div class="card-body">
                  <form action="<?php echo base_url(); ?>user_plan_update" method="post" enctype="multipart/form-data">
                    <?php if( $error=$this->session->flashdata('user_plan')): ?>
                    <div class="form-group">
                      <div class="input-icon">
                        <div class="alert alert-dismissible alert-success" id="successMessage">
                          <?php echo $error; ?>
                        </div>
                      </div>
                    </div>
                    <?php endif; ?>
                   
                    <div class="form-group">
                      <label for="">Plan name</label>
                      <input type="text" name="plan_name" class="form-control" value="<?php print_r($get_userplan[0]['plan_name']); ?>" required="required">
                      <input type="hidden" name="id" value="1">
                    </div>
                     <div class="form-group">
                      <label for="">Detail</label>
                     <textarea name="plan_detail" class="form-control" value=" <?php print_r($get_userplan[0]['plan_detail']); ?>"><?php print_r($get_userplan[0]['plan_detail']); ?> </textarea>
                    </div>
                    <div class="form-group">
                      <label for="">Plan Amount</label>
                      <input type="text" name="subscription_amount" class="form-control" value="<?php print_r($get_userplan[0]['subscription_amount']); ?>" required="required">
                      <input type="hidden" name="id" value="1">
                    </div>
                    <div class="form-group">
                    <label for="">No of days</label>
                      <input type="text" name="no_of_days" class="form-control" value="<?php print_r($get_userplan[0]['no_of_days']); ?>" required="required">
                      <input type="hidden" name="id" value="1">
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