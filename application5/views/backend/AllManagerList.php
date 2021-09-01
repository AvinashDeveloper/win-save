 <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>Manage</h1>
                    <ul>
                  
                        <li> Manager List</li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>

          <div class="row">

            <!-- order-card start -->

            <div class="col-sm-12">

          

              <div class="card tabs-card">

                <div class="card-block p-0">

                  <!-- Tab panes -->

                  <div class="tab-content card-block">

                    <div class="tab-pane active" id="home3" role="tabpanel">

                      <div class="table-responsive">

                        <table class="table table-hover" id="example">

                          <thead>

                            <tr class="text-uppercase">

                              <th>S.no</th>

                              <th>Image</th>

                              <th>Name</th>

                              <th>E-mail</th>

                              <th>Address</th>
                              <th>Permission</th>

                              <th>Contact</th>

                              <th>City</th>

                              <th>Create On</th>

                              <th>Status</th>

                              <th>View More</th>

                              <th>Update</th>



                            </tr>

                          </thead>

                          <tbody>

                            <?php $i=1;foreach ($all_manager_list as $key) {?>

                            <tr>

                              <td>

                                <?php echo $i; ?>

                              </td>

                              <td>

                                <img style="width: 100%;border-radius: 7px;" src="<?php echo base_url();  ?>assets/images/vendors/store_img/<?php echo $key->profile_pic;  ?>">

                              </td>

                              <td>

                                <?php echo $key->name; ?></td>

                              <td>

                                <?php echo $key->email; ?></td>

                              <td>

                                <?php echo $key->address; ?></td>
                                <td><?php
                                 if($key->authority!==""){
                                   $Permission = explode(",", $key->authority);

                                 if(in_array("1", $Permission)){ echo "vendor "; }
                                 if(in_array("2", $Permission)){ echo "user "; }
                                 if(in_array("3", $Permission)){ echo "Manage Accounts "; }
                                 if(in_array("4", $Permission)){ echo "Manage Managers "; }
                                 if(in_array("5", $Permission)){ echo "Support "; }
                                 if(in_array("6", $Permission)){ echo "Manage Ads "; }
                                 if(in_array("7", $Permission)){ echo "Category "; }
                                 if(in_array("8", $Permission)){ echo "About us "; }
                                 if(in_array("9", $Permission)){ echo "Contact us "; }
                                 if(in_array("10", $Permission)){ echo "My Profile "; }
                                 if(in_array("11", $Permission)){ echo "Setting "; }
                                 }else{
                                  echo "No Permission";
                                 }
                                  ?></td>

                              <td>

                                <?php echo $key->contact; ?></td>

                              <td>

                                <?php echo $key->location; ?></td>

                              <td>

                                <?php echo date( "d/M/Y", strtotime($key->added_date) ); ?></td>

                              <td>

                                <form action="<?php echo base_url(); ?>backend/Login/status_update" method="POST">

                                  <input type="hidden" name="id" value="<?php echo $key->id; ?>">

                                   <input type="hidden" name="path" value="all-manager">

                                  <input type="hidden" name="status" value="<?php if ($key->status==1) { echo " 0 ";}else{ echo "1 ";}

                ?>" ">

                <input type="submit" name=" " class="btn btn-<?php if ($key->status==1) { echo "success";}else{ echo "danger";} ?>" value="

                                  <?php if ($key->status==1) { echo "Apporved";}else{ echo "Disapporved";} ?>"></form>

                              </td>

                              <td><a href="#myModal" id="<?php echo $key->id;  ?>" data-toggle="modal" class="view_manager btn btn-info"><span class="ti-eye"></span>View</a>

                              </td>

                              <td>

                           <a href="<?php echo base_url() . "update-Manager/" . $key->id; ?>" class='btn btn-success'><i class='fa fa-pencil' aria-hidden='true'></i>&nbspUpdate</a>

                          </td>

                            </tr>

                            <?php $i++;} ?>

                          </tbody>

                        </table>

                      </div>

                    </div>

                  </div>

                </div>

              </div>

            </div>

            <!-- tabs card end -->

          </div>

        </div>

      </div>



<script>

  $(document).ready(function(){  

          $('.view_manager').click(function(){

            

               var user_id = $(this).attr("id"); 

               

               $.ajax({  

                    url:"<?php echo base_url(); ?>backend/Login/user_view",  

                    method:"post",  

                    data:{user_id:user_id},  

                    success:function(resonse){

                         var returnedData = JSON.parse(resonse);  

                         $('.name').html(returnedData.name);  

                         if(returnedData.profile_pic!==""){

                         $('.profile_pic').html('<img class="img-radius" src="<?php echo base_url(); ?>assets/images/vendors/store_img/' + returnedData.profile_pic + '"" >');

                       }else{

                          $('.profile_pic').html('<img class="img-radius" src="<?php echo base_url(); ?>upload/no_image.png "" >');

                        

                    }  

                       }

               });  

          });  

     });

</script>