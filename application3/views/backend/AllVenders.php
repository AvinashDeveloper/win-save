<style>
  th,td{overflow:hidden; white-space:nowrap}
</style>
 <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>New Vendor's</h1>
                    <ul>
                      
                        <li>Verification List</li>
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
                      <div class="table-responsive" style="height: auto;">
                        <table class="table" id="example">
                          <thead>
                            <tr class="text-uppercase">
                              <th>S.no</th>
                              <th>Vender Name</th>
                              <th>Store Name</th>
                              <th>Category</th>
                              <th>Sub category</th>
                              <th>Create On</th>
                             
                              <th>Offers Plan</th>
                              <th>Classified</th>
                              <th>limited</th>
                              <th>Approval</th>
                              <th>Status</th>
                               <th>Edit</th>
                            </tr>
                          </thead>
                          <tbody>
                           <?php $i=1;foreach ($all_venders_list as $key) {?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td><?php echo $key->name; ?></td>
                              <td><?php echo $key->store_name; ?></td>
                              <td><?php   $data['get_categorybyid']=$this->Modlogin->get_categorybyid($key->category_id); print_r($data['get_categorybyid'][0]['name']); ?></td>
                              <!-- <td><?php   //$data['get_subcategorybyid']=$this->Modlogin->get_subcategorybyid($key->subcat_id); echo $data['get_subcategorybyid']; ?></td> -->
                              <td><?php echo subCategoryTypeString($key->subcat_id);?></td>
                              <td><?php echo $key->added_date; ?></td>
                              <td><?php  $key->plan_id; $data['get_plan_detail']=$this->Modlogin->get_plan_detail($key->plan_id); print_r($data['get_plan_detail'][0]['plan_type']); ?></td>
                              <td>
                                <?php  
                                    // $key->plan_id; $data['check_vendercls_offer']=$this->ModVender->check_vendercls_offer($key->id); if ($data['check_vendercls_offer']) {
                                    // echo "Yes";
                                    // }else{echo "No";}
                                    if ($key->classified_status = 1) {
                                      echo "Yes";
                                      }else{echo "No";}
                                ?>
                              </td>
                              <td>
                              <?php  
                                  // $key->plan_id; $data['check_venderlimited_offer']=$this->ModVender->check_venderlimited_offer($key->id); 
                                  // if ($data['check_venderlimited_offer']) {
                                  //   echo "Yes";
                                  // }else{echo "No";}
                                  if ($key->limited_status = 1 ) {
                                    echo "Yes";
                                  }else{echo "No";}
                              ?>
                              </td>
                              <td><?php if ($key->approved_status==1) { echo "Yes"; }else if($key->approved_status==2){echo 'Pending';}else{echo "No";}  ?></td>
                              <td><?php if ($key->status==1) {
                                echo "Active";
                              }else{echo "Block";}  ?></td>
                              
                              <td><a class="btn btn-info" href="<?php echo base_url();  ?>edit-vender/<?php echo $key->id;  ?>">Edit</a></td>
                             
                            </tr>
                            <?php }  ?>
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