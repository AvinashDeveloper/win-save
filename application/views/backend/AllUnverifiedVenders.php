<style>
.table-responsive {
    display: inline-block;
    width: 100%;
    overflow-x: auto;
    margin: 30px 0px;
}    
    
</style>
 <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>Basic</h1>
                    <ul>
                        <li><a href="href.html">Form</a></li>
                        <li>Basic</li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>
          <div class="row">
            <!-- order-card start -->
            <div class="col-sm-12">
              <h4 class="page-title">New Vendor's Verification List</h4>
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
                              <th>Contact</th>
                             
                              <th>Create On</th>
                              <th>Created by</th>
                              <th>Expire date</th>
                              <th>Approved Status</th>
                              <th>View More</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $i=1;foreach ($all_unverifiedvenders_list as $key) {?>
                            <tr>
                              <td>
                                <?php echo $i; ?>
                              </td>
                              <td>
                                <img style="width: 100%;border-radius: 7px;" src="<?php echo base_url();  ?>assets/images/vendors/store_img/<?php echo $key->featured_image;  ?>">
                              </td>
                              <td>
                                <?php echo $key->name; ?></td>
                              <td>
                                <?php echo $key->email; ?></td>
                              <td>
                                <?php echo $key->address; ?></td>
                              <td>
                                <?php echo $key->contact; ?></td>
                              
                              <td><?php echo date( "d/M/Y", strtotime($key->added_date) ); ?></td>
                              <td><?php echo user_details($key->created_by)['user_name']; ?></td>
                              <td><?php if(!empty(get_vendorplan($key->id)[0]['expire_date'])){echo date('m/d/yy',get_vendorplan($key->id)[0]['expire_date']); }else{echo "-";}?></td>

                               <td>
                                <form action="<?php echo base_url(); ?>backend/Login/venstatus_update" method="POST">
                                  <input type="hidden" name="id" value="<?php echo $key->id; ?>">
                                  <input type="hidden" name="status" value="<?php if ($key->approved_status==1) { echo "0";}else if($key->approved_status==2) { echo "1";}else{ echo "1";}?>" ">
                                  <input type="submit"  class="btn btn-<?php if ($key->approved_status==1){echo "danger";}else{echo "success";}?>" value="<?php if ($key->approved_status==1) { echo "Disapporved";}else{ echo "Apporved";} ?>">
                                </form>
                              </td>
                              <td><a href="#myModal2" id="<?php echo $key->id;  ?>" data-toggle="modal" class="view_vender"><span class="ti-eye"></span></a>
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
        $('.view_vender').click(function(){
          
             var user_id = $(this).attr("id"); 
             
             $.ajax({  
                  url:"<?php echo base_url(); ?>backend/Login/vender_view",  
                  method:"post",  
                  data:{user_id:user_id},  
                  success:function(resonse){
                       var returnedData = JSON.parse(resonse);  
                       $('.name').html(returnedData.name); 
                       $('.email').html(returnedData.email);  
                       $('.address').html(returnedData.address); 
                       $('.latitude').html(returnedData.latitude);
                       $('.longitude').html(returnedData.longitude);
                       $('.contact').html(returnedData.contact);
                       $('.city').html(returnedData.city);
                       $('.menu_pdf').html(returnedData.menu_pdf);
                       $('.national_id').html('<a target="_blank" href="<?php echo base_url(); ?>upload/' + returnedData.national_id + '"" >National Id For Click Here</a>');
                       $('.business_proof').html('<a target="_blank" href="<?php echo base_url(); ?>upload/' + returnedData.business_proof + '"" >Business Proof for click here</a>');
                       if(returnedData.profile_pic!==""){
                       $('.profile_pic').html('<img class="img-radius" src="<?php echo base_url(); ?>upload/' + returnedData.featured_image + '"" >');
                     }else{
                        $('.profile_pic').html('<img class="img-radius" src="<?php echo base_url(); ?>upload/no_image.png "" >');
                      
                  }  
                     }
             });  
        });  
   });
</script>