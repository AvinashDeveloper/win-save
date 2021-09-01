<div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>List</h1>
                    <ul>
          
                        <li>Vender List</li>
                    </ul>
                </div>
              
                <div class="separator-breadcrumb border-top"></div>
          <div class="row">
            <!-- order-card start -->
            <div class="col-sm-12">
              <h4 class="page-title"><?php  $data['vender_view'] =$this->Modlogin->vender_view($this->uri->segment(2));
                               print_r($data['vender_view'][0]['name']); ?>Vender List</h4>
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
                              <th>Vender Name</th>
                              <th>User name</th>
                              <th>Offer Name</th>
                              <th>Voucher Code</th>
                              <th>Saving</th>
                              <th>Points</th>
                              <th>Add Date</th>
                              
                              
                            </tr>
                          </thead>
                          <tbody>
                            <?php  $i=1;foreach ($vender_order_list as $key) {?>
                            <tr>
                              <td>
                                <?php echo $i; ?>
                              </td>
                              <td>
                               <?php
                               $data['vender_view'] =$this->Modlogin->vender_view($key->vendor_id);
                               print_r($data['vender_view'][0]['name']);
                                   ?>
                              </td>
                              <td>
                                <a href="<?php echo base_url();  ?>user-order/<?php  echo $key->user_id; ?>"><?php
                                $data['user_view'] =$this->Modlogin->user_view($key->user_id);
                                 print_r($data['user_view'][0]['name']); ?></a></td>
                              <td>
                                <?php

                               $data['myoffer_view'] =$this->ModVender->myoffer_view($key->vendor_offer_id);
                               print_r($data['myoffer_view'][0]['offer_title']);
                                   ?>
                                </td>
                              <td>
                                <?php echo $key->voucher_code; ?></td>
                              <td>
                                <?php echo $key->saving; ?></td>
                              <td>
                                <?php echo $key->points; ?></td>
                              <td>
                                <?php echo date( "d/M/Y", strtotime($key->add_date) ); ?></td>
                              
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
                       $('.profile_pic').html('<img class="img-radius" src="<?php echo base_url(); ?>upload/image/' + returnedData.profile_pic + '"" >');
                     }else{
                        $('.profile_pic').html('<img class="img-radius" src="<?php echo base_url(); ?>upload/no_image.png "" >');
                      
                  }  
                     }
             });  
        });  
   });
</script>