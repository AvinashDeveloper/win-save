<?php
$sessiondata = $this->session->userdata('Login'); $array = json_decode(json_encode($sessiondata), True);

?>
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
                  <h4>Get Plan</h4>
                </div>
                <div class="card-body">
                  <form action="<?php echo base_url() ?>provide-plan" method="post" enctype="multipart/form-data">
                    <?php if( $error=$this->session->flashdata('plan_save')): ?>
                    <div class="form-group">
                      <div class="input-icon">
                        <div class="alert alert-dismissible alert-success" id="successMessage">
                          <?php echo $error; ?>
                        </div>
                      </div>
                    </div>
                    <?php endif; ?>
                    <div class="row">
                      <input type="hidden" name="user_id" value="<?php print_r($array[0]['id']);  ?>">
                      <input type="hidden" name="type" value="<?php print_r($array[0]['type']);  ?>">
                      <div class="col-sm-6" style="background-color:lavender;">
                        <div class="form-group">
                          <label for="">Plan type</label>
                          <select class="form-control my_plan" name="plan_id" required="">
                            <option value="">--Please Select Plan type--</option>
                            <?php foreach ($get_plan as $key) { ?>
                            <option value="<?php echo $key->plan_id ?>"><?php echo $key->plan_type ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-6" style="background-color:lavenderblush;">
                        <div class="form-group">
                          <label for="">Price</label>
                          <input type="number" readonly="" name="amount" class="form-control plan_price" value="" required="required">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="">Detail</label>
                      <textarea name="plan_detail" readonly="" class="form-control plan_detail" value="" required="required"></textarea>
                    </div>
                    <div class="float-right">
                      <input type="submit" name="submit" value="Get Plan" class="btn btn-success">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
   
  <script>
   $('.my_plan').change(function(){
   
    var plan_type = $(this).val();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>myplan_detail",
        data: "plan_type="+plan_type,
        success: function(resonse) {
          var returnedData = JSON.parse(resonse);  
             $('.plan_price').val(returnedData.plan_price); 
             $('.plan_detail').val(returnedData.plan_detail);   
            
        }
    });
    });
    </script>