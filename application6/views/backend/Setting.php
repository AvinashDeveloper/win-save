  <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>Points</h1>
                    <ul>
                        <li><a href="href.html">Form</a></li>
                        <li>Add Points Value</li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>



          <div class="row">



            <!-- order-card start -->



            <div class="col-sm-12">



              <div class="card">



             



                <div class="card-body">



                  <form action="<?php echo base_url() ?>save_points" method="post" enctype="multipart/form-data">



                    <?php if( $error=$this->session->flashdata('inventory_save')): ?>



                    <div class="form-group">



                      <div class="input-icon">



                        <div class="alert alert-dismissible alert-success" id="successMessage">



                          <?php echo $error; ?>



                        </div>



                      </div>



                    </div>



                    <?php endif; ?>

                    

                    

                    <div class="row">



                      <div class="col-sm-6">



                        <div class="form-group">

                           <label for="">SAR</label>

                          <input type="text" name="amount" class="form-control" value="<?php echo $data->amount; ?>" required="required"> 

                         

                                   

                        </div>

                       

                      </div>

                      

                      <div class="col-sm-6">



                        <div class="form-group">



                          <label for="">Points</label>



                          <input type="text" name="points" class="form-control" value="<?php echo $data->points; ?>" required="required">

                          <input type="hidden" name="id" value="<?php echo $data->id; ?>">



                        </div>



                      </div>



                    </div>



                     <div class="row">



                      <div class="col-sm-6">



                        <div class="form-group">

                          <label for="">Daily uses point</label>

                          <input type="text" name="daily_uses_point" class="form-control" value="<?php echo $data->daily_uses_point; ?>" required="required"> 

                          

                                   

                        </div>

                       

                      </div>

                      

                      <div class="col-sm-6">



                        <div class="form-group">



                          <label for="">Fisrt offer claim point</label>



                          <input type="text" name="first_offer_clam_point" class="form-control" value="<?php echo $data->first_offer_clam_point; ?>" required="required">

                          



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



 

