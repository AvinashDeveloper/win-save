


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
div#example_wrapper > .row:first-child {
    position: relative!important;
    width: 100%!important;
 
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
                        <li>Accounts</li>
                     
                    </ul>
                    
                </div>
              
                <div class="separator-breadcrumb border-top"></div>
               

        
           <div id="accordion1">

  <div class="card">
  
    <div class="card-header">
      <a class="card-link" data-toggle="collapse" href="#f5">
       1. Account Setup
      </a>
    </div>
    <div id="f5" class="collapse" data-parent="#accordion1">
      <div class="card-body">
       <form>
           <div class="form-group">
               <label class="font-weight-bold">Apporval</label><br/>
              <div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" <?php if ($account_management[0]['status']==1) {
     echo "checked";
    }  ?> class="form-check-input" name="optradio1">Apporve
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" <?php if ($account_management[0]['status']==0) {
     echo "checked";
    }  ?> class="form-check-input" name="optradio2">Disapporve
  </label>
</div>
<div class="form-check-inline disabled">
  <label class="form-check-label">
    <input type="radio" <?php if ($account_management[0]['status']==2) {
     echo "checked";
    }  ?> class="form-check-input" name="optradio3" >Pending
  </label>
</div>
           </div>
             <div class="form-group">
               <label class="font-weight-bold">Status</label><br/>
              <div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" <?php if ($account_management[0]['status']==1) {
     echo "checked";
    }  ?> class="form-check-input" name="active">Active
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" <?php if ($account_management[0]['status']==0) {
     echo "checked";
    }  ?> class="form-check-input" name="inactive">Inactive
  </label>
</div>
<div class="form-check-inline disabled">
  <label class="form-check-label">
    <input type="radio" <?php if ($account_management[0]['status']==3) {
     echo "checked";
    }  ?> class="form-check-input" name="expired" >Expired
  </label>
</div>
           </div>
              <div class="form-group">
               <label class="font-weight-bold">Offers Plans</label><br/>
              <div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="free">Free
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="sliver">Sliver
  </label>
</div>
<div class="form-check-inline disabled">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="gold" >Gold
  </label>
</div>
           </div>
              <div class="form-group">
               <label class="font-weight-bold">Show in feature</label><br/>
              <div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" <?php if ($account_management[0]['feature']==1) {
     echo "checked";
    }  ?> class="form-check-input" name="yes1">Yes
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" <?php if ($account_management[0]['feature']==0) {
     echo "checked";
    }  ?> class="form-check-input" name="no1">no
  </label>
</div>
<div class="form-check-inline disabled">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="expired" >Expired
  </label>
</div>
           </div>
                 <div class="form-group">
               <label class="font-weight-bold">Show in Notification alert</label><br/>
              <div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" <?php if ($account_management[0]['notification']==1) {
     echo "checked";
    }  ?> class="form-check-input" name="yes2">Yes
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" <?php if ($account_management[0]['notification']==0) {
     echo "checked";
    }  ?> class="form-check-input" name="no2">no
  </label>
</div>

           </div>
                 <div class="form-group">
               <label class="font-weight-bold">Classified</label><br/>
              <div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="yes3">Yes
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="no3">no
  </label>
</div>

           </div>
                  <div class="form-group">
               <label class="font-weight-bold">Limited</label><br/>
              <div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="yes4">Yes
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="no4">no
  </label>
</div>

           </div>
           <input type="submit" name="submit" class="btn btn-dark" value="submit">
       </form>
      </div>
    </div>
  </div>
<br/>
  <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#f6">
        2. Offer Membership Orders
      </a>
    </div>
    <div id="f6" class="collapse" data-parent="#accordion1">
      <div class="card-body">
         <div class="float-right">
     <button class="btn btn-secondary"  data-toggle="modal" data-target="#membership">+ Add</button>
 </div>
 <div class="table-responsive" style="height: auto;">
        <table class="table table-bordered table-hover display">
            <thead>
               <tr>
                      <td>#No</td>
                   <th>Date</th>
                    <th>Plan Type</th>
                     <th>Mobile</th>
                      <th>Starting Date</th>
                       <th>Ending Date</th>
                         <th>Price</th>
                       <th>Discount</th>
                       <th>Sub Total</th>
                        <th>Vat 5%</th>
                       <th>Total</th>
                       <th>Remove</th>
               </tr>
               </thead>
               <tbody>
               <tr>
                      <td>111</td>
                   <td>01/02/2020</td>
                    <td><select>
                        <option>3 Month Sliver</option>
                         <option>3 Month Gold</option>
                    </select></td>
                    <td>54764657</td>
                     <td>01/02/2020</td>
                      <td>01/02/2020</td>
                       <td>500</td>
                        <td>200</td>
                         <td>300</td>
                           <td>15%</td>
                             <td>315</td>
                    
                       <td><span class="text-danger"><i class="fa fa-close"></i></span></td>
                   </tr>
                     <tr>
                      <td>222</td>
                   <td>5/02/2020</td>
                    <td><select>
                        <option>3 Month Sliver</option>
                         <option>3 Month Gold</option>
                    </select></td>
                    <td>54764657</td>
                     <td>01/02/2020</td>
                      <td>01/02/2020</td>
                       <td>500</td>
                        <td>200</td>
                         <td>300</td>
                           <td>15%</td>
                             <td>315</td>
                    
                       <td><span class="text-danger"><i class="fa fa-close"></i></span></td>
                   </tr>
                      <tr>
                      <td>333</td>
                   <td>01/02/2020</td>
                    <td><select>
                        <option>3 Month Sliver</option>
                         <option>3 Month Gold</option>
                    </select></td>
                    <td>54764657</td>
                     <td>21/02/2020</td>
                      <td>01/02/2020</td>
                       <td>500</td>
                        <td>200</td>
                         <td>300</td>
                           <td>15%</td>
                             <td>315</td>
                    
                       <td><span class="text-danger"><i class="fa fa-close"></i></span></td>
                   </tr>
                       <tr>
                      <td>444</td>
                   <td>01/02/2020</td>
                    <td><select>
                          <option>3 Month Gold</option>
                        <option>3 Month Sliver</option>
                       
                    </select></td>
                    <td>54764657</td>
                     <td>01/02/2020</td>
                      <td>01/02/2020</td>
                       <td>500</td>
                        <td>200</td>
                         <td>300</td>
                           <td>15%</td>
                             <td>315</td>
                    
                       <td><span class="text-danger"><i class="fa fa-close"></i></span></td>
                   </tr>
                   </tbody>
           </table>
 </div>
    
      </div>
    </div>
  </div>
<br/>
  <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#f7">
        3. Classified Orders
      </a>
    </div>
    <div id="f7" class="collapse" data-parent="#accordion1">
      <div class="card-body">
       <div class="float-right">
     <button class="btn btn-secondary"  data-toggle="modal" data-target="#membership">+ Add</button>
 </div>
 <div class="table-responsive" style="height: auto;">
        <table class="table table-bordered table-hover display">
            <thead>
               <tr>
                      <td>#No</td>
                   <th>Date</th>
                    <th>Compain Name</th>
                     <th>Description</th>
    
                         <th>Price</th>
                         <th>Number of Unit</th>
                       <th>Discount</th>
                       <th>Sub Total</th>
                        <th>Vat 5%</th>
                       <th>Total</th>
                       <th>Remove</th>
               </tr>
               </thead>
               <tbody>
               <tr>
                      <td>111</td>
                   <td>01/02/2020</td>
                    <td><select>
                        <option>Holiday</option>
                         <option>Season</option>
                    </select></td>
                    <td>Description</td>
                     <td>2555</td>
                      <td>03</td>
                       <td>200</td>
                        <td>1200</td>
                      
                           <td>15%</td>
                             <td>1315</td>
                    
                       <td><span class="text-danger"><i class="fa fa-close"></i></span></td>
                   </tr>
             <tr>
                      <td>111</td>
                   <td>01/02/2020</td>
                    <td><select>
                        <option>Holiday</option>
                         <option>Season</option>
                    </select></td>
                    <td>Description</td>
                     <td>2555</td>
                      <td>03</td>
                       <td>200</td>
                        <td>1200</td>
                      
                           <td>15%</td>
                             <td>1315</td>
                    
                       <td><span class="text-danger"><i class="fa fa-close"></i></span></td>
                   </tr>
                <tr>
                      <td>111</td>
                   <td>01/02/2020</td>
                    <td><select>
                        <option>Holiday</option>
                         <option>Season</option>
                    </select></td>
                    <td>Description</td>
                     <td>2555</td>
                      <td>03</td>
                       <td>200</td>
                        <td>1200</td>
                      
                           <td>15%</td>
                             <td>1315</td>
                    
                       <td><span class="text-danger"><i class="fa fa-close"></i></span></td>
                   </tr>
                 <tr>
                      <td>111</td>
                   <td>01/02/2020</td>
                    <td><select>
                        <option>Holiday</option>
                         <option>Season</option>
                    </select></td>
                    <td>Description</td>
                     <td>2555</td>
                      <td>03</td>
                       <td>200</td>
                        <td>1200</td>
                      
                           <td>15%</td>
                             <td>1315</td>
                    
                       <td><span class="text-danger"><i class="fa fa-close"></i></span></td>
                   </tr>
                   </tbody>
           </table>
 </div>
    
      </div>
    </div>
  </div>

<br/>
  <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#f8">
       4. Limited Orders
      </a>
    </div>
    <div id="f8" class="collapse" data-parent="#accordion1">
      <div class="card-body">
           <div class="float-right">
     <button class="btn btn-secondary"  data-toggle="modal" data-target="#membership">+ Add</button>
 </div>
 <div class="table-responsive" style="height: auto;">
        <table class="table table-bordered table-hover display" >
            <thead>
               <tr>
                      <td>#No</td>
                   <th>Date</th>
                    <th>Compain Name</th>
                     <th>Description</th>
    
                         <th>Price</th>
                         <th>Number of Unit</th>
                       <th>Discount</th>
                       <th>Sub Total</th>
                        <th>Vat 5%</th>
                       <th>Total</th>
                       <th>Remove</th>
               </tr>
               </thead>
               <tbody>
               <tr>
                      <td>111</td>
                   <td>01/02/2020</td>
                    <td><select>
                        <option>Holiday</option>
                         <option>Season</option>
                    </select></td>
                    <td>Description</td>
                     <td>2555</td>
                      <td>03</td>
                       <td>200</td>
                        <td>1200</td>
                      
                           <td>15%</td>
                             <td>1315</td>
                    
                       <td><span class="text-danger"><i class="fa fa-close"></i></span></td>
                   </tr>
             <tr>
                      <td>111</td>
                   <td>01/02/2020</td>
                    <td><select>
                        <option>Holiday</option>
                         <option>Season</option>
                    </select></td>
                    <td>Description</td>
                     <td>2555</td>
                      <td>03</td>
                       <td>200</td>
                        <td>1200</td>
                      
                           <td>15%</td>
                             <td>1315</td>
                    
                       <td><span class="text-danger"><i class="fa fa-close"></i></span></td>
                   </tr>
                <tr>
                      <td>111</td>
                   <td>01/02/2020</td>
                    <td><select>
                        <option>Holiday</option>
                         <option>Season</option>
                    </select></td>
                    <td>Description</td>
                     <td>2555</td>
                      <td>03</td>
                       <td>200</td>
                        <td>1200</td>
                      
                           <td>15%</td>
                             <td>1315</td>
                    
                       <td><span class="text-danger"><i class="fa fa-close"></i></span></td>
                   </tr>
                 <tr>
                      <td>111</td>
                   <td>01/02/2020</td>
                    <td><select>
                        <option>Holiday</option>
                         <option>Season</option>
                    </select></td>
                    <td>Description</td>
                     <td>2555</td>
                      <td>03</td>
                       <td>200</td>
                        <td>1200</td>
                      
                           <td>15%</td>
                             <td>1315</td>
                    
                       <td><span class="text-danger"><i class="fa fa-close"></i></span></td>
                   </tr>
                   </tbody>
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