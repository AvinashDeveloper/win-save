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
                  <h4>Offer Redeem</h4>
                </div>
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
          
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Offer Detail</h4>
                </div>
                <div class="card-body">
                  <form action="<?php echo base_url(); ?>confirm-order" method="post" enctype="multipart/form-data">
                 
                    <div class="form-group">
                      <label for="">Offer Code:  <?php print_r($check_redeem[0]['generated_code']); ?></label>
                     </div>
                     <input type="hidden" name="count_used" value="<?php print_r($check_redeem[0]['count_used']); ?>">
                     <input type="hidden" name="stoke" value="<?php print_r($check_redeem[0]['stoke']); ?>">
                     <input type="hidden" name="used" value="<?php print_r($check_redeem[0]['used']); ?>">
                      <input type="hidden" name="offer_id" value="<?php print_r($check_redeem[0]['id']); ?>">
                      <input type="hidden" name="user_id" value="<?php print_r($check_redeem[0]['user_id']); ?>">
                      <input type="hidden" name="offer_amount" value="<?php print_r($check_redeem[0]['offer_amount']); ?>">
                      <input type="hidden" name="saving" value="<?php print_r($check_redeem[0]['saving']); ?>">
                      <input type="hidden" name="pointstext" value="<?php print_r($check_redeem[0]['points']); ?>">
                      <input type="hidden" name="point" value="<?php print_r($check_redeem[0]['point']); ?>">
                      <input type="hidden" name="count_used" value="<?php print_r($check_redeem[0]['count_used']); ?>">
                     

                    <div class="form-group">
                      <label for="">Offer Name:  <?php print_r($check_redeem[0]['offer_name']); ?></label>
                    
                    </div>
                    <div class="form-group">
                      <label for="">Offer Title:  <?php print_r($check_redeem[0]['offer_title']); ?></label>
                    
                    </div>
                    <div class="form-group">
                      <label for="">Offer Detail:  <?php print_r($check_redeem[0]['offer_detail']); ?></label>
                    
                    </div>
                     <div class="form-group">
                      <label for="">Offer Valid date:  <?php print_r($check_redeem[0]['valid_date']); ?></label>
                    
                    </div>
                     <div class="form-group">
                      <label for="">Offer stoke:  <?php print_r($check_redeem[0]['stoke']); ?></label>
                    
                    </div>
                     <div class="form-group">
                      <label for="">Offer Amount:  <?php print_r($check_redeem[0]['offer_amount']); ?></label>
                    
                    </div>
                    <div class="form-group">
                      <label for="">Count User:  <?php print_r($check_redeem[0]['count_used']); ?></label>
                    
                    </div>
                     <div class="form-group">
                        <label>Input Points</label>
                     <input type="text" name="input_points" value="" placeholder="Enter Points"  class="form-control input_points">
                    
                    </div>
                   <div class="float-right">
                      <input type="submit" name="cash" value="Pay With Cash" class="btn btn-success">
                      <input type="submit" name="points" value="Pay With Points" class="btn btn-success">
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
 