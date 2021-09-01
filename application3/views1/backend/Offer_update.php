
  <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>Offer</h1>
                    <ul>
                        <li><a href="href.html">&nbsp;</a></li>
                        <li>Home Page Offer Update</li>
                    </ul>
                </div>
              
                 
                <div class="separator-breadcrumb border-top"></div>

          <div class="row">

            <!-- order-card start -->

            <div class="col-sm-12">

              <div class="card">

             

                <div class="card-body">

                  <form action="<?php echo base_url(); ?>offer_dataupdate" method="post" enctype="multipart/form-data">

                    <?php if( $error=$this->session->flashdata('offer_save')): ?>



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

                      <select class="form-control" name="vendor_id" required="">

                        <?php foreach ($all_venders_list as $key) { ?>

                        <option value="<?php print_r($get_offerbyid[0]['vendor_id']); ?>">

                          <?php $data[ 'vender_view']=$this->Modlogin->vender_view($get_offerbyid[0]['vendor_id']); print_r($data['vender_view'][0]['name']); ?></option>

                        <option value="<?php echo $key->id; ?>">

                          <?php echo $key->name; ?></option>

                        <?php } ?>

                      </select>

                    </div>

                      <?php
                     }

              ?>
                    

                    <div class="form-group">

                      <label for="">Category Name</label>

                      <select class="form-control" name="category_id" required="">

                        <option value="<?php print_r($get_offerbyid[0]['category_id']); ?>">

                          <?php $data[ 'get_category']=$this->Modlogin->get_category($get_offerbyid[0]['category_id']); $array = json_decode(json_encode($data['get_category']), true); print_r($array[0]['name']); ?></option>

                        <?php foreach ($get_category as $key) { ?>

                        <option value="<?php echo $key->id; ?>">

                          <?php echo $key->name; ?></option>

                        <?php } ?>

                      </select>

                    </div>

                    <div class="form-group">

                      <label for="">Sub-Category Name</label>

                      <select class="form-control" name="sub_cat_name" required="">

                        <option value="<?php print_r($get_offerbyid[0]['sub_cat_name']); ?>">

                          <?php $data[ 'get_subcategory']=$this->Modlogin->get_subcategory($get_offerbyid[0]['sub_cat_name']); $array2 = json_decode(json_encode($data['get_subcategory']), true); print_r($array2[0]['name']); ?></option>

                        <?php foreach ($get_subcategory as $key) { ?>

                        <option value="<?php echo $key->id; ?>">

                          <?php echo $key->name; ?></option>

                        <?php } ?>

                      </select>

                    </div>

                   

                    <div class="form-group">

                      <label>Aminities</label>

                      <br/>

                      <?php $i=0; foreach ($get_aminity as $key) { ?>

                      <div class="form-check-inline">

                        <label class="form-check-label">

                          <input type="checkbox" class="form-check-input" value="<?php echo $key->name; ?>" name="amenities[]">

                          <?php echo $key->name; ?>

                        <?php



                        ?>

                        </label>

                      </div>

                      <?php $i++;} ?>

                    </div>

                    <div class="form-group">

                      <label for="">Heading</label>

                      <input type="text" name="heading" class="form-control" value="<?php print_r($get_offerbyid[0]['heading']);  ?>" required="required">

                    </div>

                    <div class="form-group">

                      <label for="">Message</label>

                      <textarea name="message" cols="20" rows="10" class="form-control" value="<?php print_r($get_offerbyid[0]['message']);  ?>" placeholder="Write a message"><?php print_r($get_offerbyid[0][ 'message']); ?>

                        

                      </textarea>

                    </div>

                    <div class="form-group">

                      <img style="width: 20%;" src="<?php echo base_url(); ?>assets/images/vendors/store_img/<?php print_r($get_offerbyid[0]['featured_image']);  ?>">

                      <label for=""></label>

                      <input type="file" name="userfile">

                    </div>

                    <input type="hidden" name="image" value="<?php print_r($get_offerbyid[0]['featured_image']);  ?>" class="form-control" required="required">

                    <input type="hidden" name="id" value="<?php print_r($get_offerbyid[0]['id']);  ?>" class="form-control" required="required">

                    <div class="form-group">

                      <label for="">Discount</label>

                      <input type="text" name="discount" value="<?php print_r($get_offerbyid[0]['discount']);  ?>" class="form-control" required="required">

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