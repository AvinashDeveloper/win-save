

<div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>Offer</h1>
                    <ul>
          
                        <li>Limited Offer update</li>
                    </ul>
                </div>
              
                <div class="separator-breadcrumb border-top"></div>

               <div class="row">

                  <!-- order-card start -->

                  <div class="col-sm-12">

                          <div class="card">

                       

                            <div class="card-body">

                              <form action="<?php echo base_url(); ?>limited_offer_updatedata" method="post" enctype="multipart/form-data">

                                <?php if( $error = $this->session->flashdata('lmtd_offer_save')): ?>

        <div class="form-group">

              <div class="input-icon">

        <div class="alert alert-dismissible alert-success" id="successMessage">

          <?php echo $error; ?>

        </div>

      </div>

    </div>

  <?php endif; ?>

                              <div class="form-group">

                                <label for="">Vendor Name</label>

                                <select class="form-control" name="vendor_id" required="">

                                  <option value="<?php print_r($get_limited[0]['vendor_id']) ?>"><?php  $data['vender_view'] =$this->Modlogin->vender_view($get_limited[0]['vendor_id']); print_r($data['vender_view'][0]['name']); ?></option>

                       <?php  foreach ($all_venders_list as $key) {  ?>

                               

                               <option value="<?php echo $key->id; ?>"><?php echo $key->name; ?></option>   

                       <?php } ?>

                                </select>

                              </div>

                                <div class="form-group">
                      <label for="">Category Name</label>
                      <select class="form-control" name="category_name" required="">
                        <option value="<?php  print_r($get_limited[0]['category_name'])  ?>"><?php  print_r($get_limited[0]['category_name'])  ?></option>
                        <?php foreach ($get_category as $key) { ?>
                        <option value="<?php echo $key->name; ?>">
                          <?php echo $key->name; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="">Region</label>
                      <select class="form-control get_city" name="region" required="">
                        <option value="<?php  print_r($get_limited[0]['region'])  ?>"><?php  print_r($get_limited[0]['region'])  ?></option>
                        <?php foreach ($get_region as $key) { ?>
                        <option id="<?php echo $key->id; ?>" value="<?php echo $key->region; ?>">
                          <?php echo $key->region; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="">City</label>
                       <select class="form-control city" name="section" required="">
                        <option value="<?php  print_r($get_limited[0]['section'])  ?>"><?php  print_r($get_limited[0]['section'])  ?></option>
                      
                    </select>
                    </div>
                              

                              <input type="hidden" name="id" value="<?php print_r($get_limited[0]['id']) ?>">

                              <input type="hidden" name="images" value="<?php print_r($get_limited[0]['image']) ?>">

                              <input type="hidden" name="pdfs" value="<?php print_r($get_limited[0]['pdf']) ?>">
                               <div class="form-group">

                                <label for="">Shop name</label>

                                <input type="text" name="shop_name" class="form-control" value="<?php print_r($get_limited[0]['shop_name']) ?>" >

                              </div>
                               <div class="form-group">

                                <label for="">Valid Date</label>

                                <input type="date" name="valid_date" class="form-control" value="<?php 
                                print_r($get_limited[0]['valid_date']) ?>" >

                              </div>
                              
                              <div class="form-group">
                                <label for="">Image</label>
                                <img style="width: 10%;" src="<?php echo base_url(); ?>assets/images/limited/<?php print_r($get_limited[0]['image']) ?>">

                              <input type="file" name="files[]">

                              </div>

                              <div class="form-group">

                                <label for="">Pdf</label>

                                <a target="_blank" href="<?php echo base_url(); ?>assets/images/limited/<?php print_r($get_limited[0]['pdf']) ?>">Click here for pdf view</a>

                              <input type="file" name="files[]">

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



<script>
  $(document).ready(function(){  
        $('.get_city').change(function(){
          
              var region_id = $(this).children(":selected").attr("id");
            
          
             $.ajax({  
                  url:"<?php echo base_url(); ?>backend/Login/get_city",  
                  method:"post",  
                  data:{region_id:region_id},  
                  success:function(resonse){
                      
                       $('.city').append(resonse);  
                       
                       
                    
                     }
             });  
        });  
   });
</script>





