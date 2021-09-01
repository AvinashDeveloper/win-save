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

                  <h4>My Offer Update</h4>

                </div>

                <div class="card-body">

                  <form action="<?php echo base_url() ?>backend/Vender/update_Myoffer" method="post" enctype="multipart/form-data">

                    <?php if( $error = $this->session->flashdata('update_Myoffer')): ?>

        <div class="form-group">

              <div class="input-icon">

        <div class="alert alert-dismissible alert-success" id="successMessage">

          <?php echo $error; ?>

        </div>

      </div>

    </div>

  <?php endif; ?>

<input type="hidden" name="id" value="<?php print_r($myoffer_view[0]['id']);  ?>">

                    <div class="form-group">

                      <label for="">Offer Title</label>

                      <input type="text" name="offer_title" class="form-control" value="<?php print_r($myoffer_view[0]['offer_title']);  ?>" required="required">

                    </div>

                    <div class="form-group">

                      <label for="">Offer Name</label>

                      <input type="text" name="offer_name" class="form-control" value="<?php print_r($myoffer_view[0]['offer_name']);  ?>" required="required">

                    </div>

                    <div class="form-group">

                      <label for="">Offer Detail</label>

                      <textarea name="offer_detail" class="form-control" value="<?php print_r($myoffer_view[0]['offer_detail']);  ?>" required="required"><?php print_r($myoffer_view[0]['offer_detail']);  ?></textarea>

                    </div>

                    <div class="form-group">

                      <label for="">Offer Image</label>



                      <input type="file" name="userfile" value="">

                       <img style="width: 10%;" src="<?php echo base_url(); ?>assets/images/vendors/ven_offer/<?php print_r($myoffer_view[0]['offer_img']);  ?>">

                       <input type="hidden" name="images" value="<?php print_r($myoffer_view[0]['offer_img']);  ?>">

                    </div>

                    <div class="form-group">

                      <div class="row">

                        <div class="col-sm-3" style="background-color:lavender;">

                          <div class="form-group">

                            <label for="">Validate Date</label>

                            <input type="date" name="valid_date" value="<?php print_r($myoffer_view[0]['valid_date']);  ?>" class="form-control" required="required">

                          </div>

                        </div>

                        <div class="col-sm-2" style="background-color:lavenderblush;">

                          <div class="form-group">

                            <label for="">Users Limit</label>

                            <input type="number" name="limit_per_user" value="<?php print_r($myoffer_view[0]['limit_per_user']);  ?>" class="form-control" required="required">

                          </div>

                        </div>

                        <div class="col-sm-2" style="background-color:lavender;">

                          <div class="form-group">

                            <label for="">Stock</label>

                            <input type="number" name="stoke" value="<?php print_r($myoffer_view[0]['stoke']);  ?>" class="form-control" required="required">

                          </div>

                        </div>

                        <div class="col-sm-2" style="background-color:lavender;">

                          <div class="form-group">

                            <div class="form-group">

                              <label for="">Used</label>

                              <input type="number" name="used" value="<?php print_r($myoffer_view[0]['used']);  ?>" class="form-control" required="required">

                            </div>

                          </div>

                        </div>



                        <input type="hidden" name="vendor_id" value="<?php

                       $sessiondata = $this->session->userdata('Login'); $array = json_decode(json_encode($sessiondata), True);

                       print_r($array[0]['id']);



                        ?>">

                        <div class="col-sm-2" style="background-color:lavender;">

                          <div class="form-group">

                            <div class="form-group">

                              <label for="">Amount</label>

                              <input type="number" name="offer_amount" value="<?php print_r($myoffer_view[0]['offer_amount']);  ?>" class="form-control" required="required">

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

    </div>

  </div>