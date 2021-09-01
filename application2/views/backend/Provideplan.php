
  <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>Provide Plan To Vender</h1>
                    <ul>
                  
                        <li>Vender Plan</li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>
               <div class="row">
                  <!-- order-card start -->
                  <div class="col-sm-12">
                  
                     <div class="card tabs-card">
                        <div class="card-block p-0">
                           <!-- Nav tabs -->
                      <div class="container">

<div class="form-sec p-4">

 <?php  echo form_open_multipart('save-Manager')?>
<?php if( $error = $this->session->flashdata('save_manager')): ?>
        <div class="form-group">
              <div class="input-icon">
        <div class="alert alert-dismissible alert-success" id="successMessage">
          <?php echo $error; ?>
        </div>
      </div>
    </div>
  <?php endif; ?>
    <div class="form-group">
      <label>Vender Name:</label>
      <select class="form-control" name="vender_id" required="">
        <option value="">Select Vender</option>
        <?php
        foreach ($allVenderslist as $key ) { ?>
        <option value="<?php echo $key->id;  ?>"><?php $data['vender_profile']=$this->Modlogin->vender_profile($key->id); print_r($data['vender_profile'][0]['name']); ?></option>
        <?php  }  ?>
      </select>
    </div>
     <div class="form-group">
      <label>Plan Type:</label>
      <select class="form-control" name="vender_id" required="">
        <option value="">Select Plan type</option>
        <?php
        foreach ($get_plan as $key ) { ?>
        <option value="<?php echo $key->plan_id;  ?>"><?php $data['get_plan_detail'] =$this->Modlogin->get_plan_detail($key->plan_id); print_r($data['get_plan_detail'][0]['plan_type']); ?></option>
        <?php  }  ?>
      </select>
    </div>

   
    
    <input type="submit" name="submit" value="Save" class="btn btn-success">
  </div>


</div>
                           <!-- Tab panes -->
                         
                        </div>
                     </div>
                  </div>
                  <!-- tabs card end -->
               </div>
            </div>
         </div>

