


<style>
    .summary {
    display: flex;
    flex-direction: row;
    width: 100%;
}
.summary > div {
    display: flex;
    justify-content: space-between;
    align-content: center;
    width: 100%;
    padding: 10px 0px;
}
.summary > .summary_heading
{
    font-weight: 900;
}
.avatar-upload {
  position: relative;
  max-width: 100%;

}
.avatar-upload .avatar-edit {
  position: absolute;
  right: 12px;
  z-index: 1;
  top: 10px;
}
.avatar-upload .avatar-edit input {
  display: none;
}
.avatar-upload .avatar-edit input + label {
  display: inline-block;
  width: 34px;
  height: 34px;
  margin-bottom: 0;

  background: #FFFFFF;
  border: 1px solid transparent;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
  cursor: pointer;
  font-weight: normal;
  transition: all 0.2s ease-in-out;
}
.avatar-upload .avatar-edit input + label:hover {
  background: #f1f1f1;
  border-color: #d6d6d6;
}
.avatar-upload .avatar-edit input + label:after {
  content: "\f040";
  font-family: 'FontAwesome';
  color: #757575;
  position: absolute;
  top: 10px;
  left: 0;
  right: 0;
  text-align: center;
  margin: auto;
}
.avatar-upload .avatar-preview {
  width: 100%;
  height: 150px;
  position: relative;

  border: 6px solid #F8F8F8;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
}
.avatar-upload .avatar-preview > div {
  width: 100%;
  height: 100%;

  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}

</style>
<!-- =============== Left side End ================-->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1 class="mr-2">Manange</h1>
                    <ul>
                        <li><a href="#">Vendor</a></li>
                        <li>Store Setup</li>
                     
                    </ul>
                    
                </div>
              
                <div class="separator-breadcrumb border-top"></div>
               

        
                  <div id="accordion3">

  <div class="card">
    <div class="card-header">
      <a class="card-link" data-toggle="collapse" href="#collapseOne">
        Store Details
      </a>
    </div>
    <div id="collapseOne" class="collapse " data-parent="#accordion3">
      <div class="card-body">
        
        <form method="post" action="">
            <div class="form-group">
                <label>Store Name En.</label>
                <input type="text" name="store_name" value="<?php print_r($store_setup[0]['name']);   ?>" class="form-control">
            </div>
             <div class="form-group">

                <label>Category</label>
               <select class="form-control" required="" name="category_id">
                   <option value="">select Category</option>
                   <?php  
                   $cat = explode(",", $store_setup[0]['category_id']);
                   foreach ($cat as $key) { 

                    
                    ?>
                    
                    <option value="<?php echo $key;  ?>"><?php echo $key;  ?></option>
                     <?php
                   }
                   ?>
                    
               </select>
            </div>
            <div class="form-group">
                <label>Sub Category</label>
               <select class="form-control" name="subcat_id">
                    <?php  
                 
                   foreach ($getsubcategory as $key) { 

                    
                    ?>
                    
                    <option value="<?php echo $key->id;  ?>"><?php echo $key->name;  ?></option>
                     <?php
                   }
                   ?>
               </select>
            </div>
             <div class="form-group">
                <label>Amities / Tag.</label><br/>
                 <div class="form-check-inline">
                  <?php
                  foreach ($vendorAminity as $key) {
                   ?>
<label class="form-check-label" for="cehck2">
        <input type="checkbox" name="amities" checked="" class="form-check-input" id="cehck2" name="optradio" value="option2"><?php echo $key->name;  ?>
      </label>
                   <?php
                  }

                  ?>
      
    </div>
            </div>
            <h5>Add Another Language</h5>
              <div class="form-group">
                <label>Store Another Language</label>
               <select class="form-control" name="language">
                   <option value="1">Arabic</option>
                    <option value="2">English</option>
               </select>
            </div>
            <button class="btn btn-success" type="submit" name="store_detail">submit</button>
        </form>
      </div>
    </div>
  </div>
<br/>
  <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#e22">
        Gallery
      </a>
    </div>
    <div id="e22" class="collapse" data-parent="#accordion3">
      <div class="card-body">
     <form method="post" enctype="multipart/form-data" action="">
        <div class="row">
            <div class="col-4">
                    <div class="form-group">
            <label>Logo Image</label>
                <div class="avatar-upload">
        <div class="avatar-edit">
            <input type='file' name="logo" id="imageUpload" accept=".png, .jpg, .jpeg"/>
            <input type="hidden" name="logo_image" value="<?php print_r($store_setup[0]['logo_image']);   ?>">
            <label for="imageUpload"></label>
        </div>
        <div class="avatar-preview">
            <div id="imagePreview" >
              <img src="<?php echo base_url();  ?>assets/images/vendors/store_img/<?php print_r($store_setup[0]['logo_image']);   ?>">
            </div>
        </div>
    </div>
         </div>
     </div>
      <div class="col-4">
                 <div class="form-group">
            <label>Feature Image</label>
                <div class="avatar-upload">
        <div class="avatar-edit">
            <input type='file' name="featured_image" id="imageUpload1" accept=".png, .jpg, .jpeg"/>
             <input type="hidden" name="featured_image" value="<?php print_r($store_setup[0]['featured_image']);   ?>">
            <label for="imageUpload1"></label>
        </div>
        <div class="avatar-preview">
            <div id="imagePreview1">
              <img src="<?php echo base_url();  ?>assets/images/vendors/store_img/<?php print_r($store_setup[0]['featured_image']);   ?>">
            </div>
        </div>
    </div>
         </div>
            </div>
              <div class="col-4">
                 <div class="form-group">
            <label>Menu Pdf</label><input type='file' name="menu_pdf" />
                <div class="avatar-upload">
        <div class="avatar-edit">
           
            <input type='file' name="" id="imageUpload1" accept=".png, .jpg, .jpeg"/>
            <input type="hidden" name="featured_image" value="<?php print_r($store_setup[0]['menu_pdf']);   ?>">
            <label for="imageUpload1"></label>
        </div>
        <div class="avatar-preview">
            <div id="imagePreview1">
              <img src="<?php echo base_url();  ?>assets/images/vendors/store_img/<?php print_r($store_setup[0]['menu_pdf']);   ?>">
            </div>
        </div>
    </div>
         </div>
            </div>
        </div>
<br/><br/>
            <div class="row">
        <?php $i=1; foreach ($vendorslider as $key1) { ?>
            <div class="col-2">
                    <div class="form-group">
            <label>Slider <?php  echo $i; ?></label>
                <div class="avatar-upload">
        <div class="avatar-edit">
            <input type='file' name="slider[]" id="imageUpload" accept=".png, .jpg, .jpeg" />
            <label for="imageUpload"></label>
        </div>
        <div class="avatar-preview">
            <div id="imagePreview">
              <img src="<?php echo base_url();  ?>assets/images/vendors/store_img/<?php print_r($key1['slider_img']);   ?>">
            </div>
        </div>
    </div>
         </div>
     </div>
          <?php $i++;}  ?>  
            <button class="btn btn-dark" type="submit" name="gallery">Submit</button>
     </div>
            
      </div>
      <div>
        
      </div>
     </form>
      </div>
    </div>
  </div>
<br/>
  <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#e33">
       Display Info
      </a>
    </div>
    <div id="e33" class="collapse" data-parent="#accordion3" class="form-control">
      <div class="card-body">
       <form action="" method="post">
        <div class="row">
            <div class="col-3">
                 <div class="form-group">
               <label>Website</label>
               <input type="text" value="<?php print_r($store_setup[0]['website']);   ?>" name="website" placeholder="Website" class="form-control">
           </div>
            </div>
             <div class="col-3">
                 <div class="form-group">
               <label>E-mail</label>
               <input type="text" name="email" placeholder="E-mail" class="form-control" value="<?php print_r($store_setup[0]['email']);   ?>">
           </div>
            </div>
             <div class="col-3">
                 <div class="form-group">
               <label>Twitter</label>
               <input type="text" name="twitter" placeholder="Twitter" class="form-control" value="<?php print_r($store_setup[0]['twitter']);   ?>">
           </div>
            </div>
             <div class="col-3">
                 <div class="form-group">
               <label>Facebook</label>
               <input type="text" name="facebook" value="<?php print_r($store_setup[0]['facebook']);   ?>" placeholder="Facebook" class="form-control">
           </div>
            </div>
        </div>

              <div class="row">
            <div class="col-3">
                 <div class="form-group">
               <label>Instagram</label>
               <input type="text" name="instagram" placeholder="Instagram" class="form-control" value="<?php print_r($store_setup[0]['instagram']);   ?>">
           </div>
            </div>
             <div class="col-3">
                 <div class="form-group">
               <label>Snapchat</label>
               <input type="text" name="snapchat" placeholder="Snapchat" class="form-control" value="<?php print_r($store_setup[0]['snapchat']);   ?>">
           </div>
            </div>
             <div class="col-3">
                 <div class="form-group">
               <label>Youtube</label>
               <input type="text" name="youtub" placeholder="Youtube" class="form-control" value="<?php print_r($store_setup[0]['youtub']);   ?>">
           </div>
            </div>
             <div class="col-3">
                 <div class="form-group">
               <label>Whatsapp</label>
               <input type="text" value="<?php print_r($store_setup[0]['whatsapp']);   ?>" name="whatsapp" placeholder="Whatsapp" class="form-control">
           </div>
            </div>
        </div>
          <div class="row">
            <div class="col-6">
                  <div class="form-group">
                  <label for="">Description En.</label>
                  <textarea class="form-control" name="description" cols="5" value="<?php print_r($store_setup[0]['description']);   ?>" rows="5"><?php print_r($store_setup[0]['description']);   ?></textarea>
              </div>
           
            </div>
             <div class="col-6">
                  <div class="form-group">
                  <label for="">Description Ar.</label>
                  <textarea class="form-control" name="description" cols="5" value="<?php print_r($store_setup[0]['description']);   ?>" rows="5"><?php print_r($store_setup[0]['description']);   ?></textarea>
              </div>
              <div class="col-12">
                   <input type="submit" name="display_info" value="submit" class="btn btn-dark float-right">
              </div>
            </div>
            
             
          </div>
       </form>
      </div>
    </div>
  </div>
<br/>
  <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#e44">
      Branch
      </a>
    </div>
    <div id="e44" class="collapse" data-parent="#accordion3">
      <div class="card-body">
         <div class="float-right">
     <button class="btn btn-secondary"  data-toggle="modal" data-target="#membership">+ Add</button>
 </div>
 <div class="table-responsive" style="height: auto;">
        <table class="table table-bordered table-hover display">
            <thead>
               <tr>
                      <td>#No</td>
                   <th>Branch Name En.</th>
                    <th>Address En.</th>
                     <th>Branch Name Ar.</th>
    
                         <th>Address Ar.</th>
                         <th>District</th>
                       <th>City</th>
                       <th>Region</th>
                        <th>Store Hours</th>
                       <th>Mobile</th>
                       <th>Telephone</th>
                          <th>latitude</th>
                       <th>longitude</th>
                       <th>Pin Number</th>
                       <th>Remove</th>
               </tr>
               </thead>
               <tbody>
               <?php foreach ($vendorBranches as $key) { ?>
               <tr>
                      <td><?php echo $i; ?></td>
                   <td><?php  echo $key->branch_name;  ?></td>
                    <td><?php  echo $key->address;  ?></td>
                    <td><?php  echo $key->branch_name;  ?></td>
                     <td><?php  echo $key->address;  ?></td>
                      <td><?php  echo $key->district;  ?>
                      </td>
                       <td><?php  echo $key->city;  ?></td>
                        <td><?php  echo $key->region;  ?></td>
                      
                           <td><?php  echo $key->store_hours;  ?></td>
                             <td><?php  echo $key->mobile;  ?></td>
                             <td><?php  echo $key->telephone;  ?></td>
                             <td><?php  echo $key->latitude;  ?></td>
                             <td><?php  echo $key->longitude;  ?></td>
                             <td><?php  echo $key->pin_number;  ?></td>
                    
                       <td><span class="text-danger"><a onclick="return confirm('Are you sure?');" href="<?php echo base_url(); ?>dlt-branch/<?php  echo $key->id;  ?>"><i class="fa fa-close"></i></a></span></td>
                   </tr>
                   </tbody>
            <?php  $i++;}  ?>
           </table>
 </div>
      </div>
    </div>
  </div>
</div> 


      

  



<!-- Footer Start -->
            <div class="flex-grow-1"></div>
            <div class="app-footer">
                <div class="row">
                    <div class="col-md-9">
                        <p><strong>Hotbit</strong></p>
                        <P>Hotbit came into the existence with the aspirations to develop customize creative mobile apps that can cater the requirements of clients in a cost-effective manner. The company was started by two zealous engineers who always wanted to bring the change by proving real-world solutions to stand out from the rest of competitors. With a hope to reach beyond clouds and big plans whirling in the mind, we made our way out and blossomed up with many successful business apps. Our excellent industry based approach helps to deliver ground breaking mobile apps which helped the client to come up with the proficient business.</P>
                    </div>
                </div>
                <div class="footer-bottom border-top pt-3 d-flex flex-column flex-sm-row align-items-center">
                    <a class="btn btn-primary text-white btn-rounded" href="https://www.hotbitinfotech.com" target="_blank">Hotbit India</a>
                    <span class="flex-grow-1"></span>
                    <div class="d-flex align-items-center">
                        <img class="logo" src="../../dist-assets/images/logo.png" alt="">
                        <div>
                            <p class="m-0">&copy; 2018 Win & Save</p>
                            <p class="m-0">All rights reserved</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- ============ Search UI Start ============= -->
    <div class="search-ui">
        <div class="search-header">
            <img src="../../dist-assets/images/logo.png" alt="" class="logo">
            <button class="search-close btn btn-icon bg-transparent float-right mt-2">
                <i class="i-Close-Window text-22 text-muted"></i>
            </button>
        </div>
        <input type="text" placeholder="Type here" class="search-input" autofocus>
        <div class="search-title">
            <span class="text-muted">Search results</span>
        </div>
       <!-- <div class="search-results list-horizontal">
            <div class="list-item col-md-12 p-0">
                <div class="card o-hidden flex-row mb-4 d-flex">
                    <div class="list-thumb d-flex">
                        <!-- TUMBNAIL -->
                        <img src="../../dist-assets/images/products/headphone-1.jpg" alt="">
                    </div>
                  
                </div>
            </div>
          
        </div>
        <!-- PAGINATION CONTROL -->
     
    </div>
    
       




       <!-- Button to Open the Modal -->


<!-- The Modal -->
<div class="modal" id="contacts">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Contacts</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="">
        <div class="row">
            <div class="col-6">
                
                   <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title" class="form-control" value="title">
            </div>
               <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="Name" class="form-control" value="Name">
            </div>
              <div class="form-group">
                <label for="">Mobile</label>
                <input type="number" name="Name" class="form-control" value="Mobile">
            </div>
              <div class="form-group">
                <label>Status</label>
                <select class="form-control">
                    <option>Active</option>
                    <option>Inactive</option>
                </select>
            </div>
            </div>
             <div class="col-6">
                     <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="Name" class="form-control" value="email">
            </div>
             <div class="form-group">
                <label for="">Note</label>
            <textarea class="form-control" cols="5" rows="5"></textarea>
            </div>
          
             </div>
             <div class="col-12">
                   <button type="submit" class="btn btn-dark float-right">Submit</button>
             </div>
           
        </div>
       
         
       </form>
      </div>


    </div>
  </div>
</div>




<!-- The Modal -->
<div class="modal" id="contacts">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Contacts</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="">
        <div class="row">
            <div class="col-6">
                
                   <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title" class="form-control" value="title">
            </div>
               <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="Name" class="form-control" value="Name">
            </div>
              <div class="form-group">
                <label for="">Mobile</label>
                <input type="number" name="Name" class="form-control" value="Mobile">
            </div>
              <div class="form-group">
                <label>Status</label>
                <select class="form-control">
                    <option>Active</option>
                    <option>Inactive</option>
                </select>
            </div>
            </div>
             <div class="col-6">
                     <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="Name" class="form-control" value="email">
            </div>
             <div class="form-group">
                <label for="">Note</label>
            <textarea class="form-control" cols="5" rows="5"></textarea>
            </div>
          
             </div>
             <div class="col-12">
                   <button type="submit" class="btn btn-dark float-right">Submit</button>
             </div>
           
        </div>
       
         
       </form>
      </div>


    </div>
  </div>
</div>


<script type="text/javascript">
    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});

    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview1').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview1').hide();
            $('#imagePreview1').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload1").change(function() {
    readURL(this);
});
</script>