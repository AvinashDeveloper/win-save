<style>
    .fright {
    display: flex;
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
                    <h1>Classified</h1>
                    <ul>
                        <li><a href="href.html">Form</a></li>
                        <li>Classified List</li>
                    </ul>
                </div>
                 <div class="fright">
                                <form action="<?php echo base_url(); ?>Classified-offer-create" method="POST">
                         <input  type="submit" class="btn btn-primary" name="submit" value="Create Classified Offer">
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
                              <th>caption</th>
                              <th>section</th>
                              <th>duration</th>
                              <th>region</th>
                              <th>link</th>
                              <th>Image</th>
                              <th>Update</th>
                              <th>Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $i=1;foreach ($classified_list as $key) {?>
                            <tr>
                              <td>
                                <?php echo $i; ?>
                              </td>
                              <td>
                                <?php  $data['vender_view'] =$this->Modlogin->vender_view($key->vendor_id); print_r($data['vender_view'][0]['name']); ?>
                              </td>
                              <td>  <?php echo $key->category_name; ?>
                                </td>
                              <td><?php echo $key->caption; ?>
                                </td>
                              <td>
                                <?php echo $key->section; ?></td>
                              <td>
                                <?php echo $key->duration; ?></td>
                              <td><?php echo $key->region; ?>
                                </td>
                            
                              <td><?php echo $key->link; ?></td>
                              <td><img style="width: 100%;" src="<?php echo base_url(); ?>assets/images/vendors/store_img/<?php  print_r($key->image);  ?>"></td>
                              <td><a class="btn btn-success" href="<?php echo base_url(); ?>classified-update/<?php echo $key->id; ?>">Update</a></td>
                              <td><a class="btn btn-danger" onclick="return confirm('Are you sure?');" href="<?php echo base_url(); ?>cls_offer_delete/<?php echo $key->id; ?>">Delete</a></td>
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