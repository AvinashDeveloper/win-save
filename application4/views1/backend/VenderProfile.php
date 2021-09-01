 <div class="main-content-wrap sidenav-open d-flex flex-column">

            <!-- ============ Body content start ============= -->

            <div class="main-content">

                <div class="breadcrumb">

                    <h1>Profile</h1>

                    <ul>

                        <li><a href="href.html">&nbsp;</a></li>

                        <li>Vendor Profile</li>

                    </ul>

                </div>

              

                 

                <div class="separator-breadcrumb border-top"></div>



          <div class="row">



            <!-- order-card start -->



            <div class="col-sm-12">



               <?php if( $error = $this->session->flashdata('profile_save')): ?>



        <div class="form-group">



              <div class="input-icon">



        <div class="alert alert-dismissible alert-success" id="successMessage">



          <?php echo $error; ?>



        </div>



      </div>



    </div>



  <?php endif; ?>



              <div class="container bootstrap snippet">



                <div class="row">



                  <div class="col-sm-10">



                    <h4>Vendor Profile</h4>



                  </div>



                 <form action="<?php echo base_url(); ?>vender_profile_update" method="post" enctype="multipart/form-data"> 



                



               



                </div>



                <div class="row">



                  <?php //print_r($user_view); ?>



                  <div class="col-sm-3" style="margin-top: 200px;">



                    <!--left col-->



                    <div class="text-center">



                      <img src="<?php echo base_url(); ?>assets/images/vendors/store_img/<?php print_r($user_view[0]['featured_image']); ?>" class="avatar img-circle img-thumbnail" alt="avatar">



              



              



              



               <div class="custom-file">



                    <input type="file" class="custom-file-input file-upload" id="customFile" name="userfile">



                    <label class="custom-file-label btn btn-success" for="customFile">Choose file</label>



                  </div>



                    </div>



                    </hr>



                    <br>



               



                  </div>



                  <!--/col-3-->



                  <div class="col-sm-9">



                 



                    <div class="card ">



                        <div class="card-header">



                            <h4 class="card-title">



                                Personal Information



                            </h4>



                        </div>



                      <div class="card-body active" id="home">



                   



                       



                          <div class="form-group">



                            <div class="col-xs-6">



                              <label for="first_name">First name</label>



                              <input type="text" class="form-control" name="name" value="<?php print_r($user_view[0]['name']); ?>" id="first_name" placeholder="first name" title="enter your first name if any.">



                            </div>



                          </div>



                          <input type="hidden" name="image" value="<?php print_r($user_view[0]['featured_image']); ?>">



                         <input type="hidden" name="id" value="<?php print_r($user_view[0]['id']); ?>">



                          <div class="form-group">



                            <div class="col-xs-6">



                              <label for="phone">Phone</label>



                              <input type="text" class="form-control" name="contact" id="phone" value="<?php print_r($user_view[0]['contact']); ?>" placeholder="enter phone" title="enter your phone number if any.">



                            </div>



                          </div>



                          



                          <div class="form-group">



                            <div class="col-xs-6">



                              <label for="email">Email</label>



                              <input type="email" value="<?php print_r($user_view[0]['email']); ?>" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email.">



                            </div>



                          </div>



                          <div class="form-group">



                            <div class="col-xs-6">



                              <label for="email">Location</label>



                              <input type="text" name="address" class="form-control" id="location" value="<?php print_r($user_view[0]['address']); ?>" placeholder="somewhere" title="enter a location">



                            </div>



                          </div>



                          <div class="form-group">



                            <div class="col-xs-6">



                              <label for="password">Password</label>



                              <input value="<?php print_r($user_view[0]['password']); ?>" type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">



                            </div>



                          </div>



                          <div class="form-group">



                            <div class="col-xs-6">



                              <label for="password">Description</label>



                              <textarea value="<?php if($user_view[0]['description'] == ""){echo "";}else{print_r($user_view[0]['description']);} ?>" class="form-control" name="description" id="description" placeholder="Add Description.."><?php if($user_view[0]['description'] == ""){echo "";}else{print_r($user_view[0]['description']);} ?></textarea>



                              



                            </div>



                          </div>

                    </div>

                  </div>



<br/><br/>

                     <div class="card ">



                        <div class="card-header">



                            <h4 class="card-title">



                                Social Information



                            </h4>



                        </div>



                      <div class="card-body" >

                          <div class="form-group">



                            <div class="col-xs-6">



                              <label for="Website">Website</label>



                              <input value="<?php if($user_view[0]['website'] == ""){echo "";}else{print_r($user_view[0]['website']);} ?>" type="text" class="form-control" name="website" id="website" placeholder="Enter your website link">



                            </div>



                          </div>



                          <div class="form-group">



                            <div class="col-xs-6">



                              <label for="password">Facebook</label>



                              <input value="<?php if($user_view[0]['facebook'] == ""){echo "";}else{print_r($user_view[0]['facebook']);} ?>" type="text" class="form-control" name="facebook" id="facebook" placeholder="Enter your facebook link">



                            </div>



                          </div>



                          <div class="form-group">



                            <div class="col-xs-6">



                              <label for="password">Instagram</label>



                              <input value="<?php if($user_view[0]['instagram'] == ""){echo "";}else{print_r($user_view[0]['instagram']);} ?>" type="text" class="form-control" name="instagram" id="instagram" placeholder="Enter your instagram link">



                            </div>



                          </div>



                          <div class="form-group">



                            <div class="col-xs-6">



                              <label for="password">Snapchat</label>



                              <input value="<?php if($user_view[0]['snapchat'] == ""){echo "";}else{print_r($user_view[0]['snapchat']);} ?>" type="text" class="form-control" name="snapchat" id="snapchat" placeholder="Enter your snapchat link">



                            </div>



                          </div>

                      </div>

                    </div>

<br/><br/>

  <div class="card ">



                        <div class="card-header">



                            <h4 class="card-title">



                                Documents



                            </h4>



                        </div>



                      <div class="card-body" >





                          <div class="form-group">



                            <div class="col-xs-6">



                              <label for="email">Logo Image</label>



                              <a href="<?php echo base_url(); ?>upload/<?php print_r($user_view[0]['logo_image']); ?>" target="_blank"> Click Here To View</a>



                              <img src="<?php echo base_url(); ?>assets/images/vendors/store_img/<?php print_r($user_view[0]['logo_image']); ?>" class="avatar img-circle img-thumbnail" height="100" width="100" alt="avatar">



                            </div>



                          </div>



                          <div class="form-group">



                            <div class="col-xs-6">



                              <label for="email">Business Proof</label>



                              <a href="<?php echo base_url(); ?>upload/<?php print_r($user_view[0]['business_proof']); ?>" target="_blank">Business Proof For Click Here</a>



                            </div>



                          </div>



                          <div class="form-group">



                            <div class="col-xs-6">



                              <?php



                              foreach ($ven_sliders as $value) {



                                ?>







                               <img src="<?php echo base_url(); ?>assets/images/slider/<?php echo $value->slider_img ?>" class="avatar img-circle img-thumbnail" height="100" width="100" alt="avatar">



                              <?php } 



                              ?>



                              <label for="email">Add Banner Images</label>



                              <input type="file"  name="banners[]"   multiple="multiple" size="20">



                              







                            </div>



                          </div>



                          <!-- add branch here -->



                         <div class="form-group">



                            <div class="col-xs-6">



                              <?php



                              foreach ($vendor_branch as $ven_br) {



                                // print_r($ven_br);



                             



                               ?>



                              <label for="branch"><b>Saved Branch :</b><a href="<?php echo base_url(); ?>show-branch/<?php echo $ven_br->id; ?>"><?php echo $ven_br->address;  ?></a>  <a onclick="return confirm('Are you sure?');" class="btn-danger" href="<?php echo base_url(); ?>dlt-branch/<?php echo $ven_br->id; ?>">Delete Branch</a></label><br>



                            <?php } ?>



                              <label for="branch">Add Branch</label>



                              <a href="<?php echo base_url(); ?>Create-branch" target="_blank">Click Here</a>



                            </div>



                          </div>



                          </div>

                        </div>



                          <div class="form-group">



                            <div class="col-xs-12">



                              <br>



                              <button class="btn btn-success" type="submit" id="sub"><i class="fa fa-check"></i> Save</button>



                              <button class="btn btn-default" type="reset"><i class="fa fa-refresh"></i> Reset</button>



                            </div>



                          </div>



                        </form>



                       



                        <hr>



                      </div>



                      <!--/tab-pane-->



                

                            </div>



                          </div>



                        </form>



                      </div>



                    </div>



                    <!--/tab-pane-->



                  </div>



                  <!--/tab-content-->



                </div>



                <!--/col-9-->



              </div>



              <!--/row-->



            </div>



          </div>



        </div>



      </div>



    </div>



  </div>



</div>



<!-- ajax to add banners into vendor slider -->



 <script type="text/javascript">



    $(document).ready(function(){  



              $('#sub').change(function(){



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