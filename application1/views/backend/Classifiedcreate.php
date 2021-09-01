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
              <div class="card">
                <div class="card-header">
                  <h4>Classified Offer</h4>
                </div>
                <div class="card-body">
                  <form action="<?php echo base_url(); ?>cls_offer_save" method="post" enctype="multipart/form-data">
                    <?php if( $error=$this->session->flashdata('offer_save')): ?>
                    <div class="form-group">
                      <div class="input-icon">
                        <div class="alert alert-dismissible alert-success" id="successMessage">
                          <?php echo $error; ?>
                        </div>
                      </div>
                    </div>
                    <?php endif; ?>
                    <div class="form-group">
                      <label for="">Vendor Name</label>
                      <select class="form-control" name="vendor_id" required="">
                        <option value="">Select Vendor name</option>
                        <?php foreach ($all_venders_list as $key) { ?>
                        <option value="<?php echo $key->id; ?>">
                          <?php echo $key->name; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="">Category Name</label>
                      <select class="form-control" name="category_name" required="">
                        <option value="">Select Category</option>
                        <?php foreach ($get_category as $key) { ?>
                        <option value="<?php echo $key->name; ?>">
                          <?php echo $key->name; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="">Region</label>
                      <select class="form-control get_city" name="region" required="">
                        <option value="">Select Region</option>
                        <?php foreach ($get_region as $key) { ?>
                        <option id="<?php echo $key->id; ?>" value="<?php echo $key->region; ?>">
                          <?php echo $key->region; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="">City</label>
                       <select class="form-control city" name="section" required="">
                        <option value="">First Select Region</option>
                      
                    </select>
                    </div>
                    <div class="form-group">
                      <label for="">caption</label>
                      <input type="text" name="caption" class="form-control" value="">
                    </div>
                    <div class="form-group">
                      <label for=""></label>
                      <input type="file" name="userfile">
                    </div>
                    <div class="form-group">
                      <label for="">duration</label>
                      <input type="date" name="duration" value="" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                      <label for="">link</label>
                      <input type="text" name="link" value="" class="form-control" required="required">
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
   
  <script>
  $(document).ready(function(){  
        $('.get_city').change(function(){
          
              var region_id = $(this).children(":selected").attr("id");
            
          
             $.ajax({  
                  url:"<?php echo base_url(); ?>backend/Login/get_city",  
                  method:"post",  
                  data:{region_id:region_id},  
                  success:function(resonse){
                      
                       $('.city').append(resonse);  
                       
                       
                    
                     }
             });  
        });  
   });
</script>