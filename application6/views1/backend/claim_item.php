
<?php //include 'header.php';?>


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
                        <li>Claim Item</li>
                     
                    </ul>
                    
                </div>
              
                <div class="separator-breadcrumb border-top"></div>
               

        
                  <div id="accordion4">

  <div class="card">
    <div class="card-header">
      <a class="card-link" data-toggle="collapse" href="#u88">
        Claimed Offers
      </a>
    </div>
    <div id="u88" class="collapse" data-parent="#accordion4">
      <div class="card-body">
        <div class="float-right">
     <button class="btn btn-secondary"  data-toggle="modal" data-target="#membership">+ Add</button>
 </div>
 <div class="table-responsive" style="height: auto;">
        <table class="table table-bordered table-hover" id="example">
               <tr>
                      <td>#Offer Id</td>
                   <th>Date of Creation</th>
                    <th>Type</th>
                     <th>Title En.</th>
    
                         <th>Description En..</th>
                         <th>Title Ar..</th>
                      <th>Description Ar...</th>
                         <th>District</th>
                        <th>Store Hours</th>
                       <th>Mobile</th>
                       <th>Telephone</th>
                          <th>latitude</th>
                       <th>longitude</th>
                       <th>Pin Number</th>
                       <th>Remove</th>
               </tr>
               <tr>
                      <td>1</td>
                   <td>Branch Name 1 En.</td>
                    <td>Address En.</td>
                    <td>Branch Name 1 Ar.</td>
                     <td>Address Ar.</td>
                      <td>
                          <select class="form-control">
                              <option>jeddah</option>
                              <option>madina</option>
                          </select>
                      </td>
                       <td>  <select class="form-control">
                              <option>jeddah</option>
                              <option>madina</option>
                          </select></td>
                        <td>  <select class="form-control">
                              <option>jeddah</option>
                              <option>madina</option>
                          </select></td>
                      
                           <td>8 hours</td>
                             <td>903987763</td>
                             <td>676374583</td>
                             <td>85.453.453.34</td>
                             <td>84.43.453.456</td>
                             <td>7873</td>
                    
                       <td><span class="text-danger"><i class="fa fa-close"></i></span></td>
                   </tr>
            <tr>
                      <td>1</td>
                   <td>Branch Name 1 En.</td>
                    <td>Address En.</td>
                    <td>Branch Name 1 Ar.</td>
                     <td>Address Ar.</td>
                      <td>
                          <select class="form-control">
                              <option>jeddah</option>
                              <option>madina</option>
                          </select>
                      </td>
                       <td>  <select class="form-control">
                              <option>jeddah</option>
                              <option>madina</option>
                          </select></td>
                        <td>  <select class="form-control">
                              <option>jeddah</option>
                              <option>madina</option>
                          </select></td>
                      
                           <td>8 hours</td>
                             <td>903987763</td>
                             <td>676374583</td>
                             <td>85.453.453.34</td>
                             <td>84.43.453.456</td>
                             <td>7873</td>
                    
                       <td><span class="text-danger"><i class="fa fa-close"></i></span></td>
                   </tr>
                 <tr>
                      <td>1</td>
                   <td>Branch Name 1 En.</td>
                    <td>Address En.</td>
                    <td>Branch Name 1 Ar.</td>
                     <td>Address Ar.</td>
                      <td>
                          <select class="form-control">
                              <option>jeddah</option>
                              <option>madina</option>
                          </select>
                      </td>
                       <td>  <select class="form-control">
                              <option>jeddah</option>
                              <option>madina</option>
                          </select></td>
                        <td>  <select class="form-control">
                              <option>jeddah</option>
                              <option>madina</option>
                          </select></td>
                      
                           <td>8 hours</td>
                             <td>903987763</td>
                             <td>676374583</td>
                             <td>85.453.453.34</td>
                             <td>84.43.453.456</td>
                             <td>7873</td>
                    
                       <td><span class="text-danger"><i class="fa fa-close"></i></span></td>
                   </tr>
                <tr>
                      <td>1</td>
                   <td>Branch Name 1 En.</td>
                    <td>Address En.</td>
                    <td>Branch Name 1 Ar.</td>
                     <td>Address Ar.</td>
                      <td>
                          <select>
                              <option>jeddah</option>
                              <option>madina</option>
                          </select>
                      </td>
                       <td>  <select >
                              <option>jeddah</option>
                              <option>madina</option>
                          </select></td>
                        <td>  <select >
                              <option>jeddah</option>
                              <option>madina</option>
                          </select></td>
                      
                           <td>8 hours</td>
                             <td>903987763</td>
                             <td>676374583</td>
                             <td>85.453.453.34</td>
                             <td>84.43.453.456</td>
                             <td>7873</td>
                    
                       <td><span class="text-danger"><i class="fa fa-close"></i></span></td>
                   </tr>
           </table>
 </div>
      </div>
    </div>
  </div>
<br/>
  <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#i88">
       Claimed Gift
      </a>
    </div>
    <div id="i88" class="collapse" data-parent="#accordion4">
      <div class="card-body">
        Lorem ipsum..
      </div>
    </div>
  </div>
<br/>
  <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#y66">
        Not Claimed Gift
      </a>
    </div>
    <div id="y66" class="collapse" data-parent="#accordion4">
      <div class="card-body">
        Lorem ipsum..
      </div>
    </div>
  </div>
  <br/>
   <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#sft">
       Inventory Summary
      </a>
    </div>
    <div id="sft" class="collapse" data-parent="#accordion4">
      <div class="card-body">
        Lorem ipsum..
      </div>
    </div>
  </div>
  <br/>
 

</div>

      

  




</div>
            </div><!-- Footer Start -->
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
                    <div class="flex-grow-1 pl-2 d-flex">
                        <div class="card-body align-self-center d-flex flex-column justify-content-between align-items-lg-center flex-lg-row">
                            <!-- OTHER DATA -->
                            <a href="#" class="w-40 w-sm-100">
                                <div class="item-title">Headphone 1</div>
                            </a>
                            <p class="m-0 text-muted text-small w-15 w-sm-100">Gadget</p>
                            <p class="m-0 text-muted text-small w-15 w-sm-100"><small>SAR</small> 300
                                <del class="text-secondary"><small>SAR</small> 400</del>
                            </p>
                            <p class="m-0 text-muted text-small w-15 w-sm-100 d-none d-lg-block item-badges">
                                <span class="badge badge-danger">Sale</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="list-item col-md-12 p-0">
                <div class="card o-hidden flex-row mb-4 d-flex">
                    <div class="list-thumb d-flex">
                        <!-- TUMBNAIL -->
                        <img src="../../dist-assets/images/products/headphone-2.jpg" alt="">
                    </div>
                    <div class="flex-grow-1 pl-2 d-flex">
                        <div class="card-body align-self-center d-flex flex-column justify-content-between align-items-lg-center flex-lg-row">
                            <!-- OTHER DATA -->
                            <a href="#" class="w-40 w-sm-100">
                                <div class="item-title">Headphone 1</div>
                            </a>
                            <p class="m-0 text-muted text-small w-15 w-sm-100">Gadget</p>
                            <p class="m-0 text-muted text-small w-15 w-sm-100"><small>SAR</small> 300
                                <del class="text-secondary"><small>SAR</small> 400</del>
                            </p>
                            <p class="m-0 text-muted text-small w-15 w-sm-100 d-none d-lg-block item-badges">
                                <span class="badge badge-primary">New</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="list-item col-md-12 p-0">
                <div class="card o-hidden flex-row mb-4 d-flex">
                    <div class="list-thumb d-flex">
                        <!-- TUMBNAIL -->
                        <img src="../../dist-assets/images/products/headphone-3.jpg" alt="">
                    </div>
                    <div class="flex-grow-1 pl-2 d-flex">
                        <div class="card-body align-self-center d-flex flex-column justify-content-between align-items-lg-center flex-lg-row">
                            <!-- OTHER DATA -->
                            <a href="#" class="w-40 w-sm-100">
                                <div class="item-title">Headphone 1</div>
                            </a>
                            <p class="m-0 text-muted text-small w-15 w-sm-100">Gadget</p>
                            <p class="m-0 text-muted text-small w-15 w-sm-100"><small>SAR</small> 300
                                <del class="text-secondary"><small>SAR</small> 400</del>
                            </p>
                            <p class="m-0 text-muted text-small w-15 w-sm-100 d-none d-lg-block item-badges">
                                <span class="badge badge-primary">New</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="list-item col-md-12 p-0">
                <div class="card o-hidden flex-row mb-4 d-flex">
                    <div class="list-thumb d-flex">
                        <!-- TUMBNAIL -->
                        <img src="../../dist-assets/images/products/headphone-4.jpg" alt="">
                    </div>
                    <div class="flex-grow-1 pl-2 d-flex">
                        <div class="card-body align-self-center d-flex flex-column justify-content-between align-items-lg-center flex-lg-row">
                            <!-- OTHER DATA -->
                            <a href="#" class="w-40 w-sm-100">
                                <div class="item-title">Headphone 1</div>
                            </a>
                            <p class="m-0 text-muted text-small w-15 w-sm-100">Gadget</p>
                            <p class="m-0 text-muted text-small w-15 w-sm-100"><small>SAR</small> 300
                                <del class="text-secondary"><small>SAR</small> 400</del>
                            </p>
                            <p class="m-0 text-muted text-small w-15 w-sm-100 d-none d-lg-block item-badges">
                                <span class="badge badge-primary">New</span>
                            </p>
                        </div>
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
<?php include 'footer.php';?>

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