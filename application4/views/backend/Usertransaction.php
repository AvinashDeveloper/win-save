<div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>Transaction</h1>
                    <ul>
                        <li><a href="href.html">Form</a></li>
                        <li>User Transaction List</li>
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
                              <th>User name</th>
                              <th>Plan</th>
                              <th>Amount</th>
                              <th>Payment Status</th>
                              <th>Start date</th>
                              <th>Expiry date</th>
                             

                            </tr>
                          </thead>
                          <tbody>
                            <?php $i=1;foreach ($get_user_membership as $key) {?>
                            <tr>
                              <td>
                                <?php echo $i; ?>
                              </td>
                              <td>
                                <?php 
                                $data['user_view'] =$this->Modlogin->user_view($key->user_id);
                                print_r($data['user_view'][0]['name']);

                                ?>
                              </td>
                              <td>
                                <?php
                                $data['get_userplan'] =$this->Modlogin->get_userplan($key->plan_id);
                                print_r($data['get_userplan'][0]['plan_name']);
                                 ?></td>
                              <td>
                                <?php echo $key->amount; ?></td>
                              <td>
                                <?php echo $key->payment_sts; ?></td>
                             
                             <td>
                                <?php echo date( "d/M/Y", strtotime($key->add_date) ); ?></td>
                              <td>
                                <?php echo date( "d/M/Y", strtotime($key->exp_date) ); ?></td>
                             
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