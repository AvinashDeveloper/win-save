  <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>Offer</h1>
                    <ul>
                        <li><a href="href.html">&nbsp;</a></li>
                        <li>My Offer</li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>
          <div class="row">
            <!-- order-card start -->
            <div class="col-sm-12">
              <div class="card">
                <!-- <div class="card-header">
                  <h4>My Offer</h4>
                </div> -->
                <div class="card-body">
                  <form action="<?php echo base_url() ?>offer-save" method="post" enctype="multipart/form-data">
                    <?php if( $error = $this->session->flashdata('save_offer')): ?>
        <div class="form-group">
              <div class="input-icon">
        <div class="alert alert-dismissible alert-success" id="successMessage">
          <?php echo $error; ?>
        </div>
      </div>
    </div>
  <?php endif; ?>
                    <div class="form-group">
                      <label for="">Offer Title</label>
                      <input type="text" name="offer_title" class="form-control" value="" required="required">
                    </div>
                    <div class="form-group">
                      <label for="">Offer Name</label>
                      <input type="text" name="offer_name" class="form-control" value="" required="required">
                    </div>
                    <div class="form-group">
                      <label for="">Offer Detail</label>
                      <textarea name="offer_detail" class="form-control" value="" required="required"></textarea>
                    </div>
                   <div class="form-group">
                      <label for="">Offer Image</label>
                      <input type="file" name="userfile" value="">
                    </div>


                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-3">
                          <div class="form-group">
                            <label for="">Validate Date</label>
                            <input type="date" name="valid_date" value="" class="form-control" required="required">
                          </div>
                        </div>
                        <div class="col-sm-2" >
                          <div class="form-group">
                            <label for="">Users Limit</label>
                            <input type="number" name="limit_per_user" value="" class="form-control" required="required">
                          </div>
                        </div>
                        <div class="col-sm-2" >
                          <div class="form-group">
                            <label for="">Stock</label>
                            <input type="number" name="stoke" value="" class="form-control" required="required">
                          </div>
                        </div>
                        <div class="col-sm-2" >
                          <div class="form-group">
                            <div class="form-group">
                              <label for="">Used</label>
                              <input type="number" name="used" value="" class="form-control" required="required">
                            </div>
                          </div>
                        </div>

                        <input type="hidden" name="vendor_id" value="<?php
                       $sessiondata = $this->session->userdata('Login'); $array = json_decode(json_encode($sessiondata), True);
                       print_r($array[0]['id']);

                        ?>">
                        <div class="col-sm-2">
                          <div class="form-group">
                            <div class="form-group">
                              <label for="">Amount</label>
                              <input type="number" name="offer_amount" value="" class="form-control" required="required">
                            </div>
                          </div>
                        </div>
                      </div>
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
  