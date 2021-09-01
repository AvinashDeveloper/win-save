<div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>Inventory</h1>
                    <ul>
                        
                        <li>Update Inventory</li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>



          <div class="row">



            <!-- order-card start -->



            <div class="col-sm-12">



              <div class="card">



               



                <div class="card-body">



                  <form action="<?php echo base_url() ?>update_inventory" method="post" enctype="multipart/form-data">



                    <?php if( $error=$this->session->flashdata('update_inventory')): ?>



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

                          <input type="hidden" name="id" value="<?php print_r($this->uri->segment(2));?>" >
                          <input type="hidden" name="Shop_name" value="<?php print_r($all_inventory_list[0]['shop_name']);?>" >
                          
                         <input type="text" name="" class="form-control" value="<?php $data['vender_profile'] =$this->Modlogin->vender_profile($all_inventory_list[0]['shop_name']);
                               print_r($data['vender_profile'][0]['name']);?>" readonly>

                           

                           

                        </div>



                      </div>



                      <div class="col-sm-6">



                        <div class="form-group">



                          <label for="">Gift Name</label>



                          <input type="text" name="gift_name" class="form-control" value="<?php print_r($all_inventory_list[0]['gift_name']);?>" required="required">



                        </div>



                      </div>



                    </div>



                    <div class="row">



                      <div class="col-sm-6" >



                        <div class="form-group">



                          

                          <img src="<?php echo base_url(); ?>assets/images/vendors/ven_offer/<?php print_r($all_inventory_list[0]['img']);?>" class="avatar img-circle img-thumbnail" alt="avatar">

                         <input type="file" name="userfile"  class="form-control">
                         <input type="hidden" name="images" value="<?php print_r($all_inventory_list[0]['img']);?>">


                        </div>



                      </div>



                      <div class="col-sm-6" >



                        <div class="form-group">



                          <label for="">Required Amount</label>



                          <input type="text" name="req_points" class="form-control" value="<?php $d = $this->ModVender->get_points(); print_r($all_inventory_list[0]['req_points'])/10;?>" required="required">




                        </div>



                      </div>



                    </div>

                    <div class="row">



                      <div class="col-sm-6">



                        <div class="form-group">



                          <label for="">Stock</label>



                         <input type="number" name="stock"  class="form-control" value="<?php print_r($all_inventory_list[0]['stock']);?>" required="required">



                        </div>



                      </div>



                      <div class="col-sm-6">



                        <div class="form-group">



                          <label for="">Used offer</label>



                          <input type="number" name="used" class="form-control" value="<?php print_r($all_inventory_list[0]['used']);?>" readonly>



                        </div>



                      </div>



                    </div>



                  <div class="row">



                      <div class="col-sm-6">



                        <div class="form-group">



                          <label for="">Generated Code</label>



                         <input type="text" name="generated_code"  class="form-control" id="gen_code" value="<?php print_r($all_inventory_list[0]['generated_code']);?>" >

                         <input type="hidden" name="random_number"  class="form-control" value="<?php print_r($all_inventory_list[0]['generated_code']);?>">



                        </div>



                      </div>



                      <div class="col-sm-6">



                        <div class="form-group">



                          <label for="">Time Limit</label>



                          <input type="date" name="time_limit" class="form-control" value="<?php print_r($all_inventory_list[0]['time_limit']);?>" required="required">



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