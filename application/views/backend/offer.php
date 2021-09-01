

  <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>Offer</h1>
                    <ul>
                  
                        <li>Home Page Offer</li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>

     <div class="row">

      <!-- order-card start -->

      <div class="col-sm-12">

        <div class="card">


          <div class="card-body">

            <form action="<?php echo base_url(); ?>offer_save" method="post" enctype="multipart/form-data">

              <?php if( $error = $this->session->flashdata('offer_save')): ?>

                <div class="form-group">

                  <div class="input-icon">

                    <div class="alert alert-dismissible alert-success" id="successMessage">

                      <?php echo $error; ?>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
              <?php
              $array = json_decode(json_encode($this->session->userdata('Login')), true);
             
                if($array[0]['type']==1){
                       ?>
                      <div class="form-group">
                <label for="">Vendor Name</label>
                <input type="hidden" name="vendor_id" value="<?php echo $array[0]['id'];    ?>">
                <input type="text" readonly="" name="" class="form-control" value="<?php echo $array[0]['name'];    ?>">
                
              </div>
              <div class="form-group">
                <!--                   <label>Vendor Image</label><br/> -->
                <div class="form-group " id="">
                 <img src="<?php echo base_url(); ?>assets/images/vendors/store_img/<?php print_r($array[0]['featured_image']); ?>" class="avatar img-circle img-thumbnail" height="100" width="100" alt="avatar">
                </div>
              </div>

                       <?php
                     }else{
                      ?>
                    <div class="form-group">
                <label for="">Vendor Name</label>
                <select class="form-control" name="vendor_id" required="" id="vendor_img">
                  <option value="">Select Vendor name</option>
                  <?php  
                  foreach ($all_venders_list as $key) { ?>
                  <option value="<?php echo $key->id; ?>"><?php echo $key->name;?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <!--                     <label>Vendor Image</label><br/> -->
                <div class="form-group " id="get_img">

                </div>
              </div>

                      <?php
                     }

              ?>
             

              <div class="form-group">
                <label for="">Category Name</label>
                <select class="form-control" name="category_id" id="category" required="">
                  <option value="">Select Category name</option>
                  <?php  foreach ($get_category as $key) {  ?>
                    <option value="<?php echo $key->id; ?>"><?php echo $key->name; ?></option>   
                  <?php } ?>
                </select>

              </div>

              <div class="form-group " id="subCat_label">
                <label><b>Sub Category:</b></label>
                <div class="form-check-inline" id="get_sub">
                </div>
              </div>


              <div class="form-group">
                <label>Aminities</label><br/>
                <div class="form-group " id="amt_label">
                  <br />
                  <div class="form-check-inline" id="get_amt">
                  </div>
                </div>
              </div>

                <div class="form-group">
                  <label for="">Heading</label>
                  <input type="text" name="heading" class="form-control" value="" required="required">
                </div>
                <div class="form-group">
                  <label for="">Message</label>
                  <textarea  name="message" cols="20" rows="10" class="form-control" placeholder="Write a message"></textarea>
                </div>
                   <!--  <div class="form-group">
                      <label for=""></label>
                      <input type="file" name="userfile">
                    </div> -->
                              <!-- <div class="form-group">
                                <label for="">Discount</label>
                                <input type="text" name="discount" value="" class="form-control" required="required">

                              </div> -->

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

             
            <!-- jcode to get subcategory on basis of category -->
            <script type="text/javascript">
              $(document).ready(function(){  
                $('#category').change(function(){
                  var selectedValue = $(this).val(); 
                  var a = [];             
                  $.ajax({
                   type:'POST',
                   url:'<?php echo base_url(); ?>backend/vender/get_subcategory',
                   data: {option : selectedValue},
                   success: function(response) {
                            // $("#gen_code").val(data);
                            console.log(response);

                            $('#subCat_label').append('<label for=""></label>');
                            $('#get_sub').html(response);
                           // var data = JSON.parse(response);
                               //  for(i in response){
                               //     a.push(response[i].name);

                               // }

                            // $.each(response, function(index){                              
                            //     console.log(response[index].name);
                            //    // $('#get_sub').append('<input type="checkbox" id="sonu"/> ' + data[index].name + '<br />');
                            // });
                          }
                        });
                });  
              });

            </script>
            <script type="text/javascript">
              $(document).ready(function(){  
                $('#category').change(function(){
                  var selectedValue = $(this).val(); 
                  var a = [];             
                  $.ajax({
                   type:'POST',
                   url:'<?php echo base_url(); ?>backend/vender/get_amt',
                   data: {option : selectedValue},
                   success: function(response) {
                            // $("#gen_code").val(data);
                            console.log(response);

                            $('#amt_label').append('<label for="">  </label>');
                            $('#get_amt').html(response);
                           // var data = JSON.parse(response);
                               //  for(i in response){
                               //     a.push(response[i].name);

                               // }

                            // $.each(response, function(index){                              
                            //     console.log(response[index].name);
                            //    // $('#get_sub').append('<input type="checkbox" id="sonu"/> ' + data[index].name + '<br />');
                            // });
                          }
                        });
                });  
              });
            </script>

            <script type="text/javascript">
              $(document).ready(function(){  
                $('#vendor_img').change(function(){
                  var vendor_image = $(this).val(); 
                  var a = [];             
                  $.ajax({
                   type:'POST',
                   url:'<?php echo base_url(); ?>backend/vender/get_vendor_img',
                   data: {vendor_image : vendor_image},
                   success: function(response) {
                            // $("#gen_code").val(data);
                            console.log(response);

                            $('#img_label').append('<label for="">Vender Image </label>');
                            $('#get_img').html(response);
                          }
                        });
                });  
              });
            </script>




