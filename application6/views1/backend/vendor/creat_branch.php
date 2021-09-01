
  <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>Branch</h1>
                    <ul>
                        <li><a href="href.html">&nbsp;</a></li>
                        <li>Add New Branch</li>
                    </ul>
                </div>
              
                 
                <div class="separator-breadcrumb border-top"></div>

          <div class="row">

            <!-- order-card start -->

            <div class="col-sm-12">

              <div class="card">

              
                <div class="card-body">

                  <form action="<?php echo base_url() ?>save-branch" method="post" enctype="multipart/form-data">

                    <?php if( $error=$this->session->flashdata('branch_save')): ?>

                    <div class="form-group">

                      <div class="input-icon">

                        <div class="alert alert-dismissible alert-success" id="successMessage">

                          <?php echo $error; ?>

                        </div>

                      </div>

                    </div>

                    <?php endif; 
                    ?>
                    <div class="row">

                      <div class="col-sm-6">

                        <div class="form-group">

                          <label for="">Store Hours</label>
                          <input type="text" name="store_hours" class="form-control" value="" required="required">
                          <input type="hidden" name="vendor_id" value="<?php echo $session[0]->id ?>">
                                         
                        </div>

                      </div>

                      <div class="col-sm-6">

                        <div class="form-group">

                          <label for="">Mobile Number</label>

                          <input type="number" name="mobile" class="form-control" value="" required="required">

                        </div>

                      </div>

                    </div>

                    <div class="row">

                      <div class="col-sm-6" >

                        <div class="form-group">

                          <label for="">Telephone Number</label>

                         <input type="number" name="phone_num"  class="form-control" value="" >

                        </div>

                      </div>

                      <div class="col-sm-6" >

                        <div class="form-group">

                          <label for="">Region</label>

                          <input type="text" name="region" class="form-control" value="" >

                        </div>

                      </div>

                    </div>
                    <div class="row">

                      <div class="col-sm-6">

                        <div class="form-group">

                          <label for="">City</label>

                         <input type="text" name="city"  class="form-control" id="city" value="" required="required">

                        </div>

                      </div>

                      <div class="col-sm-6">

                        <div class="form-group">

                          <label for="">District</label>

                          <input type="text" name="dict" class="form-control" value="" id="state">

                        </div>

                      </div>

                    </div>

                  <div class="row">

                      <div class="col-sm-6">

                        <div class="form-group">

                          <label for="">Address</label>

                         <input type="textarea" name="address"  class="form-control" id="address" value="" required="">
                        

                        </div>

                      </div>

                      <div class="col-sm-6">

                        <div class="form-group">

                          <label for="">Other Address</label>

                          <input type="text" name="other_add" class="form-control" value="">

                        </div>

                      </div>

                    </div>
                     <div class="row">

                      <div class="col-sm-6">

                        <div class="form-group">

                          <label for="">latitude</label>

                         <input type="text" name="lattitude"  class="form-control" id="latt" value="" required="">
                        

                        </div>

                      </div>

                      <div class="col-sm-6">

                        <div class="form-group">

                          <label for="">Longitude</label>

                          <input type="text" name="logitude" id="long" class="form-control" value="">

                        </div>

                      </div>

                    </div>


                    <div class="float-right">

                      <input type="submit" name="submit" value="submit" class="btn btn-success">

                    </div>

                  </form>

                </div>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

  </div>
  <script type="text/javascript">
    $(document).ready(function(){  
              $('#address').blur(function(){

                var selectedValue = $(this).val();
                var city          = $("#city").val(); 
                var state         = $("#state").val();  
                                 
                   $.ajax({
                           type:'POST',
                           url:'<?php echo base_url(); ?>backend/Vendor/vendors/get_lat_long',
                           data: {data : selectedValue,city : city,state : state},
                           success: function(data) {                            
                            var res = $.parseJSON(data);
                            var latitude = res.results.latitude;
                            var long = res.results.longitude;
                           $("#latt").val(latitude);
                           $("#long").val(long);
                           }
                        });
                      });  
                    });
  </script>
