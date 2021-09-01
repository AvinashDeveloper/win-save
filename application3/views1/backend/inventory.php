  <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>Basic</h1>
                    <ul>
                        <li><a href="href.html">Offer</a></li>
                        <li>Inventory</li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>



          <div class="row">



            <!-- order-card start -->



            <div class="col-sm-12">



              <div class="card">



                <div class="card-header">



                  <h4>Add Inventory</h4>



                </div>



                <div class="card-body">



                  <form action="<?php echo base_url() ?>save-inventory" method="post" enctype="multipart/form-data">



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



                          <label for="">Shop Name</label>

                           <?php //print_r($sess);

                           $type = $sess[0]->type;

                           if($type != 1){

                            ?>

                          <select name="Shop_name"  class="form-control" id="venders" required="required">

                            <?php 

                            foreach ($all_venders_list as $value) {

                            ?>

                            <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>

                            <?php

                            }

                            ?>

                          </select>  

                          <?php } else{?>   

                          <input type="text" value="<?php echo $sess[0]->name; ?>" class="form-control" id="venders" readonly="" name="Shop_name">  

                          <?php } ?>         

                        </div>



                      </div>



                      <div class="col-sm-6">



                        <div class="form-group">



                          <label for="">Gift Name</label>



                          <input type="text" name="gift_name" class="form-control" value="" required="required">



                        </div>



                      </div>



                    </div>



                    <div class="row">



                      <div class="col-sm-6" >



                        <div class="form-group">



                          <label for="">Image</label>



                         <input type="file" name="gift_image"  class="form-control" value="" required="required">



                        </div>



                      </div>



                      <div class="col-sm-6" >



                        <div class="form-group">



                          <label for="">Gift Price SAR</label>



                          <input type="text" name="req_point" class="form-control" value="" required="required">



                        </div>



                      </div>



                    </div>

                    <div class="row">



                      <div class="col-sm-6">



                        <div class="form-group">



                          <label for="">Stock</label>



                         <input type="number" name="stock"  class="form-control" value="0" required="required">



                        </div>



                      </div>



                      <div class="col-sm-6">



                        <div class="form-group">



                          <label for="">Used offer</label>



                          <input type="number" name="used_offer" class="form-control" value="0" readonly="">



                        </div>



                      </div>



                    </div>



                  <div class="row">



                      <div class="col-sm-6">



                        <div class="form-group">



                          <label for="">Generated Code</label>



                         <input type="text" readonly="" name="gen_code"  class="form-control" id="gen_code" value="<?php  echo $sess[0]->generated_code; ?>" >

                         <input type="hidden" name="random_code"  class="form-control" value="<?php  echo $sess[0]->generated_code; ?>">



                        </div>



                      </div>



                      <div class="col-sm-6">



                        <div class="form-group">



                          <label for="">Time Limit</label>



                          <input type="date" name="time_limit" class="form-control" value="" required="required">



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

  <script type="text/javascript">

    $(document).ready(function(){  

              $('#venders').change(function(){

                var selectedValue = $(this).val(); 

                                 

                   $.ajax({

                           type:'POST',

                           url:'<?php echo base_url(); ?>backend/vender/get_generated_code',

                           data: {option : selectedValue},

                           success: function(data) {

                            $("#gen_code").val(data);

                            console.log(data);

                           

                           }

                        });

                      });  

                    });

  </script>