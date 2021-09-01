<div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>Plans</h1>
                    <ul>
                        <li><a href="href.html">Form</a></li>
                        <li>All Plan List</li>
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
                        
                       <div class="row">
                        <div class="col-12">
                            <form action="<?php echo base_url();  ?>create-plans">
                          <input style="float: right;" type="submit" class="btn btn-primary" name="" value="+ Create Plan">   
                        </form>
                        </div>   
                        
                          
                        </div>
                        <br>
                        <table class="table table-hover" id="example">

                          <thead>

                            <tr class="text-uppercase">

                              <th>S.no</th>

                              <th>Plan TYpe</th>

                              <th>Price</th>

                              <th>Detail</th>

                             

                              <th>Update</th>

                              <th>Delete</th>



                            </tr>

                          </thead>

                          <tbody>

                            <?php $i=1;foreach ($get_plan as $key) {?>

                            <tr>

                              <td>

                                <?php echo $i; ?>

                              </td>

                            

                              <td>

                                <?php echo $key->plan_type;  ?></td>

                              <td>

                                <?php echo $key->plan_price; ?></td>

                              <td>

                                <?php echo $key->plan_detail; ?></td>



                               <td><a href="<?php echo base_url(); ?>plan-update/<?php echo $key->plan_id; ?>">Update</a></td>

                              <td><a onclick="return confirm('Are you sure?');" href="<?php echo base_url(); ?>plan-delete/<?php echo $key->plan_id; ?>">Delete</a></td>

                              

                          

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