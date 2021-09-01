<style>
    .detail
    {
        display: inline-flex;
    height: 140px;
    white-space: normal;
    width: 400px;
    padding: 10px 15px;    
    }
</style>

  <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>Vendor</h1>
                    <ul>
                        <li><a href="href.html">Offer</a></li>
                        <li>Offer List</li>
                    </ul>
                </div>
                <!-- <div class="separator-breadcrumb border-top"></div> -->
          <div class="row">
            <!-- order-card start -->
            <div class="col-sm-12">
         
              <div class="card tabs-card">
                <div class="card-block">
                  <!-- Tab panes -->
                  <div class="tab-content card-block">
                    <div class="tab-pane active" id="home3" role="tabpanel">
                      <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="example">
                          <thead>
                            <tr class="text-uppercase">
                              <th>S.no</th>
                              <th>Offer Title</th>
                              <th>Offer Name</th>
                              <th>Offer Detail</th>
                              <th>Offer Image</th>
                              <th>Validate Date</th>
                              <th>Users Limit</th>
                              <th>Stock</th>
                              <th>Used</th>
                              <th>Amount</th>
                              <th>Update</th>
                              <th>Delete</th>
                              <th>View</th>

                            </tr>
                          </thead>
                          <tbody>
                            <?php $i=1;foreach ($get_offer as $key) {?>
                            <tr>
                              <td>
                                <?php echo $i; ?>
                              </td>
                            
                              <td>
                                <?php echo $key->offer_title; ?></td>
                              <td>
                                <?php echo $key->offer_name; ?></td>
                              <td class="detail">
                                <?php echo $key->offer_detail; ?></td>
                                  <td>
                                <img style="width: 100%;border-radius: 7px;" src="<?php echo base_url();  ?>assets/images/vendors/ven_offer/<?php echo $key->offer_img;  ?>">
                              </td>
                              <td>
                                <?php echo date( "d/M/Y", strtotime($key->valid_date) ); ?></td>
                              <td>
                                <?php echo $key->limit_per_user; ?></td>
                              <td>
                                <?php echo $key->stoke; ?></td>
                             
                              <td><?php echo $key->used; ?>
                              </td>
                              <td><?php echo $key->offer_amount;?>
                              </td>
                              <td><a class="btn btn-success btn-sm" href="<?php echo base_url(); ?>My-offer-update/<?php echo $key->id; ?>" name="" id="<?php echo $key->id; ?>">Update</a>
                              <td><a class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>My-offer-delete/<?php echo $key->id; ?>" onclick="return confirm('Are you sure You Want to delete this offer?')" name="" id="<?php echo $key->id; ?>">Delete</a></td>
                              <td><a href="#Vender_offer" id="<?php echo $key->id;  ?>" data-toggle="modal" class="view_myoffer"><span class="ti-eye"></span></a>
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
        $('.view_myoffer').click(function(){
            
             var offer_id = $(this).attr("id"); 
             
             $.ajax({  
                  url:"<?php echo base_url(); ?>backend/Vender/my_offer_view",  
                  method:"post",  
                  data:{offer_id:offer_id},  
                  success:function(resonse){
                       var returnedData = JSON.parse(resonse);  
                       $('.offer_title').html(returnedData.offer_title);  
                       $('.offer_name').html(returnedData.offer_name);  
                       $('.offer_detail').html(returnedData.offer_detail);  
                       $('.valid_date').html(returnedData.valid_date);  
                       $('.limit_per_user').html(returnedData.limit_per_user);  
                       $('.stoke').html(returnedData.stoke);  
                       $('.used').html(returnedData.used);  
                       $('.offer_amount').html(returnedData.offer_amount);
                       $('.add_date').html(returnedData.add_date);
                       $('.status').html(returnedData.status);
                      
                       if(returnedData.offer_img!==""){
                       $('.offer_img').html('<img style="width: 100%;" class="img-radius" src="<?php echo base_url(); ?>upload/' + returnedData.offer_img + '"" >');
                     }else{
                        $('.offer_img').html('<img class="img-radius" src="<?php echo base_url(); ?>upload/no_image.png "" >');
                      
                  }  
                     }
             });  
        });  
   });
</script>