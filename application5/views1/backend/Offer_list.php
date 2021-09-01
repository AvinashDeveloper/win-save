<style>

    .fright {

    display: inline-flex;

    flex-direction: row;

    width: 100%;

    justify-content: flex-end;

    margin: 5px 0px;

}

</style>

  <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>Offer</h1>
                    <ul>
                        <li><a href="href.html">&nbsp;</a></li>
                        <li>Offer List</li>
                    </ul>
                </div>
                <div class="fright">

                          <form action="<?php echo base_url(); ?>Offer" method="POST">

                         <input  type="submit" class="btn btn-primary" name="submit" value=" + Create Offer">

                      </form>

                          </div>
                 
                <div class="separator-breadcrumb border-top"></div>
     
          <div class="row">

            <!-- order-card start -->

            <div class="col-sm-12">


              <div class="card tabs-card">

                <div class="card-block p-0">

                  <!-- Tab panes -->

                  <div class="card">

                    <div class="card-body" id="home3" role="tabpanel">

                     

                     

                      <div class="table-responsive">

                          

                         

                        <table class="table table-hover" id="example">

                          <thead>

                            <tr class="text-uppercase">

                              <th>S.no</th>

                              <th>Vendor</th>

                              <th>Category</th>

                              <th>Sub Category</th>

                              <th>Heading</th>

                              <th>Rating</th>

                              <th>Aminities</th>

                              <th>Image</th>

                              <th>discount</th>

                              <th>Update</th>

                              <th>Delete</th>

                            </tr>

                          </thead>

                          <tbody>

                            <?php $i=1;foreach ($get_offer as $key) {?>

                            <tr>

                              <td>

                                <?php echo $i; ?>

                              </td>

                              <td>

                              <?php  $data['vender_view'] = $this->Modlogin->vender_view($key->vendor_id); print_r($data['vender_view'][0]['name']); ?>

                              </td>

                              <td> <?php  $data['get_categorybyid'] = $this->Modlogin->get_categorybyid($key->category_id); print_r($data['get_categorybyid'][0]['name']); ?>

                                </td>

                              <td><?php  print_r($key->sub_cat_name); ?>

                                </td>

                              <td>

                                <?php echo $key->heading; ?></td>

                                 

                                 <td><a href="#RatingmyModal" id="<?php echo $key->id;  ?>" data-toggle="modal" class="view_rating"><?php echo $key->ratting; ?></a>

                              </td>

                              <td>

                                <?php echo $key->aminities; ?></td>
                              
                              <td><img style="width: 100%;" src="<?php echo base_url(); ?>assets/images/vendors/store_img/<?php echo $key->featured_image; ?>">

                                </td>

                            

                              <td><?php echo $key->discount; ?></td>

                              <td><a class="btn btn-success" href="<?php echo base_url(); ?>offer-update/<?php echo $key->id; ?>">Update</a></td>

                              <td><a class="btn btn-danger" onclick="return confirm('Are you sure?');" href="<?php echo base_url(); ?>offer-delete/<?php echo $key->id; ?>">Delete</a></td>

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

        $('.view_user').click(function(){

          

             var user_id = $(this).attr("id"); 

             

             $.ajax({  

                  url:"<?php echo base_url(); ?>backend/Login/user_view",  

                  method:"post",  

                  data:{user_id:user_id},  

                  success:function(resonse){

                       var returnedData = JSON.parse(resonse);  

                       $('.name').html(returnedData.name);  

                       if(returnedData.profile_pic!==""){

                       $('.profile_pic').html('<img class="img-radius" src="<?php echo base_url(); ?>upload/' + returnedData.profile_pic + '"" >');

                     }else{

                        $('.profile_pic').html('<img class="img-radius" src="<?php echo base_url(); ?>upload/no_image.png "" >');

                      

                  }  

                     }

             });  

        });  

   });

</script>

<script>

  $(document).ready(function(){  

        $('.view_rating').click(function(){

          

             var offer_id = $(this).attr("id"); 

             

             $.ajax({  

                  url:"<?php echo base_url(); ?>backend/Login/user_ratings",  

                  method:"post",  

                  data:{offer_id:offer_id},  

                  success:function(resonse){

                       var returnedData = JSON.parse(resonse); 

                       $('.review').html(returnedData.review);

                      }

             });  

        });  

   });

</script>