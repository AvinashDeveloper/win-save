
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
                        <li>Account Setup</li>
                     
                    </ul>
                    
                </div>
              
                <div class="separator-breadcrumb border-top"></div>
               

              <div class="row">

                  <div class="col-12">

                     <div class="card">
                        <div class="card-header">
                            <h4>Account Summary</h4>
                        </div>
                <div class="card-body">
                      <div class="row">
                          <div class="col-6">
                              <div class="summary">
                                  <div class="summary_heading">Id</div>
                                  <div class="summary_value">1111</div>
                              </div>
                                 <div class="summary">
                                  <div class="summary_heading">Store Name</div>
                                  <div class="summary_value">Burger King</div>
                              </div>
                                 <div class="summary">
                                  <div class="summary_heading">Category</div>
                                  <div class="summary_value">Food</div>
                              </div>
                                   <div class="summary">
                                  <div class="summary_heading">Sub Category</div>
                                  <div class="summary_value">Fast Food</div>
                              </div>
                               <div class="divider">&nbsp;</div>
                              <h4> Service</h4>
                              <div class="divider">&nbsp;</div>
                                 <div class="summary">
                                  <div class="summary_heading">Offer Plan</div>
                                  <div class="summary_value">Sliver</div>
                              </div>
                                 <div class="summary">
                                  <div class="summary_heading">Classified</div>
                                  <div class="summary_value">Yes</div>
                              </div>
                                   <div class="summary">
                                  <div class="summary_heading">Limited</div>
                                  <div class="summary_value">No</div>
                              </div>
                                 <div class="summary">
                                  <div class="summary_heading">Date Subscription</div>
                                  <div class="summary_value">05/12/2019</div>
                              </div>
                                 <div class="summary">
                                  <div class="summary_heading">Date Expiry</div>
                                  <div class="summary_value">05/12/2020</div>
                              </div>
                          </div>
                           <div class="col-6">
                              <div class="summary">
                                  <div class="summary_heading">Created Date</div>
                                  <div class="summary_value">01/12/2019</div>
                              </div>
                                 <div class="summary">
                                  <div class="summary_heading">Account Approve</div>
                                  <div class="summary_value"> 
                                  
                                         <span class="badge badge-success">Approve</span>/
                                         <span class="badge badge-danger"> Disapprove</span>
                                      </div>
                              </div>
                                 <div class="summary">
                                  <div class="summary_heading">Account Status</div>
                                  <div class="summary_value">
                                        <span class="badge badge-success">Active</span>/
                                           <span class="badge badge-danger">Inactive</span>
                                    
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
             </div>
         </div>


<br/>
 <div class="row">
        <div class="col-md-12">
           <div class="card">
                        <div class="card-header">
                            <h4>Vendor Profile setup</h4>
                        </div>
                <div class="card-body">   
    <div class="row">
        <div class="col-md-12">
            <!-- Nav tabs category -->
            <ul class="nav nav-tabs faq-cat-tabs">
                <li class=" nav-item"><a class="nav-link active" href="#faq-cat-1" data-toggle="tab"><i class="fa fa-file"></i> Vendor Setup</a></li>
                <li class="nav-item"><a class="nav-link" href="#faq-cat-2" data-toggle="tab"><i class="fa fa-save"></i> Manage Account</a></li>
                <li class="nav-item"><a class="nav-link" href="#faq-cat-3" data-toggle="tab"><i class="fa fa-plus"></i> Store Setup</a></li>
                  <li class="nav-item"><a class="nav-link" href="#faq-cat-4" data-toggle="tab"><i class="fa fa-leaf"></i> Offers</a></li>
                    <li class="nav-item"><a class="nav-link" href="#faq-cat-5" data-toggle="tab"><i class="fa fa-gift"></i> Gift Inventry</a></li>
                  
            </ul>
    
            <!-- Tab panes -->
            <div class="tab-content">
               
               <div class="tab-pane active row" id="faq-cat-1">
                  <div id="accordion">

  <div class="card">
    <div class="card-header">
      <a class="card-link" data-toggle="collapse" href="#collapseOne">
        1. Vendor Details
      </a>
    </div>
    <div id="collapseOne" class="collapse" data-parent="#accordion">
      <div class="card-body">
        <form>
            <div class="row">
                <div class="col-6">
                         <div class="form-group">
                <label for="">Vendor Name En.</label>
                <input type="text" name="vendor_name" class="form-control" value="Food Service Est.">
            </div>
            <div class="form-group">
                <label for="">Commerce Id</label>
                <input type="number" name="commerce_id" class="form-control" value="10018800">
            </div>
             <div class="form-group">
                <label for="">Business Proof</label>
                <input type="file" name="business_proof" class="form-control">
                <img src="" class="img-fluid">
            </div>

                </div>
                <div class="col-6">
                         <div class="dropdown-divider"></div>
              <h5>HQ Address</h5>
               <div class="dropdown-divider"></div>
              <div class="form-group">
                <label for="">City</label>
                <select class="form-control">
                    <option>jeddah</option>
                    <option>Madina</option>
                </select>
            </div>
              <div class="form-group">
                <label for="">Country</label>
                <select class="form-control">
                    <option>Saudi arabia</option>
                    <option>India</option>
                </select>
            </div>
             <div class="form-group">
                <label for="">Business Proof</label>
                <input type="email" name="email" class="form-control" value="food@gmail.com">
            </div>
            <div class="form-group">
                <label for="">Telephone</label>
                <input type="number" name="phone" class="form-control" value="660440">
            </div>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-dark  float-right">Submit</button>
                </div>
            </div>
       
            <br/>
       
        </form>
      </div>
    </div>
  </div>
<br/></br>
  <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
        2. Contacts
      </a>
    </div>
    <div id="collapseTwo" class="collapse" data-parent="#accordion">

      <div class="card-body">
       <div class="">
 <div class="float-right">
     <button class="btn btn-secondary"  data-toggle="modal" data-target="#contacts">+ Add</button>
 </div>
           <table class="table table-bordered table-hover" id="example">
               <tr>
                      <td>#Id</td>
                   <th>Title</th>
                    <th>Name</th>
                     <th>Mobile</th>
                      <th>Email</th>
                       <th>Note</th>
                         <th>Status</th>
                       <th>Reset Password</th>
                       <th>Remove</th>
               </tr>
               <tr>
                      <td>1</td>
                   <td>Admin</td>
                    <td>Ahmad</td>
                     <td>554645</td>
                      <td>mm@gmail.com</td>
                       <td>Note</td>
                       <td><span class="badge badge-success">Active</span>/<span class="badge badge-danger">inactive</span></td>
                       <td><button class="btn btn-info">Reset</button></td>
                       <td><span class="text-danger"><i class="fa fa-close"></i></span></td>
                   </tr>
                       <tr>
                              <td>2</td>
                   <td>Manager</td>
                    <td>Mohammed</td>
                     <td>664434</td>
                      <td>df@gmail.com</td>
                       <td>Note</td>
                       <td><span class="badge badge-success">Active</span>/<span class="badge badge-danger">inactive</span></td>
                       <td><button class="btn btn-info">Reset</button></td>
                       <td><span class="text-danger"><i class="fa fa-close"></i></span></td>
                   </tr>
                       <tr>
                              <td>3</td>
                   <td>Supervisior</td>
                    <td>Ali</td>
                     <td>454354</td>
                      <td>dd@gmail.com</td>
                       <td>Note</td>
                       <td><span class="badge badge-success">Active</span>/<span class="badge badge-danger">inactive</span></td>
                       <td><button class="btn btn-info">Reset</button></td>
                       <td><span class="text-danger"><i class="fa fa-close"></i></span></td>
                   </tr>
                         <tr>
                            <td>4</td>
                   <td>Supervisior 2</td>
                    <td>Abdullah</td>
                     <td>345344</td>
                      <td>abd@gmail.com</td>
                       <td>Note</td>
                       <td><span class="badge badge-success">Active</span>/<span class="badge badge-danger">inactive</span></td>
                       <td><button class="btn btn-info">Reset</button></td>
                       <td><span class="text-danger"><i class="fa fa-close"></i></span></td>
                   </tr>
           </table>
       </div>
      </div>
    </div>
  </div>

 

</div>
               </div>
                <div class="tab-pane fade" id="faq-cat-2">
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
    <input type="radio" class="form-check-input" name="optradio1">Apporve
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="optradio2">Disapporve
  </label>
</div>
<div class="form-check-inline disabled">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="optradio3" >Pending
  </label>
</div>
           </div>
             <div class="form-group">
               <label class="font-weight-bold">Status</label><br/>
              <div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="active">Active
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="inactive">Inactive
  </label>
</div>
<div class="form-check-inline disabled">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="expired" >Expired
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
    <input type="radio" class="form-check-input" name="yes1">Yes
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="no1">no
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
    <input type="radio" class="form-check-input" name="yes2">Yes
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="no2">no
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
        <table class="table table-bordered table-hover" id="example">
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
        <table class="table table-bordered table-hover" id="example">
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
        <table class="table table-bordered table-hover" id="example">
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
           </table>
 </div>
      </div>
    </div>
  </div>
</div>
               </div>
                <div class="tab-pane fade" id="faq-cat-3">
                  <div id="accordion3">

  <div class="card">
    <div class="card-header">
      <a class="card-link" data-toggle="collapse" href="#collapseOne">
        Store Details
      </a>
    </div>
    <div id="collapseOne" class="collapse " data-parent="#accordion3">
      <div class="card-body">
        <form>
            <div class="form-group">
                <label>Store Name En.</label>
                <input type="text" name="store_name" value="Burger King" class="form-control">
            </div>
             <div class="form-group">
                <label>Category</label>
               <select class="form-control">
                   <option>Food</option>
                    <option>Clothes</option>
               </select>
            </div>
            <div class="form-group">
                <label>Sub Category</label>
               <select class="form-control">
                   <option>Fast Food</option>
                    <option>Clothes</option>
               </select>
            </div>
             <div class="form-group">
                <label>Amities / Tag.</label><br/>
                 <div class="form-check-inline">
      <label class="form-check-label" for="cehck2">
        <input type="checkbox" class="form-check-input" id="cehck2" name="optradio" value="option2">Outdoor -  Sandwich
      </label>
    </div>
            </div>
            <h5>Add Another Language</h5>
              <div class="form-group">
                <label>Store Another Language</label>
               <select class="form-control">
                   <option>Arabic</option>
                    <option>English</option>
               </select>
            </div>
            <button class="btn btn-success">submit</button>
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
     <form>
        <div class="row">
            <div class="col-4">
                    <div class="form-group">
            <label>Logo Image</label>
                <div class="avatar-upload">
        <div class="avatar-edit">
            <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
            <label for="imageUpload"></label>
        </div>
        <div class="avatar-preview">
            <div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);">
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
            <input type='file' id="imageUpload1" accept=".png, .jpg, .jpeg" />
            <label for="imageUpload1"></label>
        </div>
        <div class="avatar-preview">
            <div id="imagePreview1" style="background-image: url(http://i.pravatar.cc/500?img=7);">
            </div>
        </div>
    </div>
         </div>
            </div>
              <div class="col-4">
                 <div class="form-group">
            <label>Menu Pdf</label>
                <div class="avatar-upload">
        <div class="avatar-edit">
            <input type='file' id="imageUpload1" accept=".png, .jpg, .jpeg" />
            <label for="imageUpload1"></label>
        </div>
        <div class="avatar-preview">
            <div id="imagePreview1" style="background-image: url(http://i.pravatar.cc/500?img=7);">
            </div>
        </div>
    </div>
         </div>
            </div>
        </div>
<br/><br/>
            <div class="row">
        
            <div class="col-2">
                    <div class="form-group">
            <label>Gallery Image 2</label>
                <div class="avatar-upload">
        <div class="avatar-edit">
            <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
            <label for="imageUpload"></label>
        </div>
        <div class="avatar-preview">
            <div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);">
            </div>
        </div>
    </div>
         </div>
     </div>
            <div class="col-2">
                    <div class="form-group">
            <label>Gallery Image 3</label>
                <div class="avatar-upload">
        <div class="avatar-edit">
            <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
            <label for="imageUpload"></label>
        </div>
        <div class="avatar-preview">
            <div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);">
            </div>
        </div>
    </div>
         </div>
     </div>
            <div class="col-2">
                    <div class="form-group">
            <label>Gallery Image 4</label>
                <div class="avatar-upload">
        <div class="avatar-edit">
            <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
            <label for="imageUpload"></label>
        </div>
        <div class="avatar-preview">
            <div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);">
            </div>
        </div>
    </div>
         </div>
     </div>
            <div class="col-2">
                    <div class="form-group">
            <label>Gallery Image 1</label>
                <div class="avatar-upload">
        <div class="avatar-edit">
            <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
            <label for="imageUpload"></label>
        </div>
        <div class="avatar-preview">
            <div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);">
            </div>
        </div>
    </div>
         </div>
     </div>
            <div class="col-2">
                    <div class="form-group">
            <label>Gallery Image 5</label>
                <div class="avatar-upload">
        <div class="avatar-edit">
            <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
            <label for="imageUpload"></label>
        </div>
        <div class="avatar-preview">
            <div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);">
            </div>
        </div>
    </div>
         </div>
     </div>
            <div class="col-2">
                    <div class="form-group">
            <label>Gallery Image 6</label>
                <div class="avatar-upload">
        <div class="avatar-edit">
            <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
            <label for="imageUpload"></label>
        </div>
        <div class="avatar-preview">
            <div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);">
            </div>
        </div>
    </div>
         </div>
     </div>
      </div>
      <div>
          <button class="btn btn-dark">Submit</button>
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
       <form action="">
        <div class="row">
            <div class="col-3">
                 <div class="form-group">
               <label>Website</label>
               <input type="text" name="website" placeholder="Website" class="form-control">
           </div>
            </div>
             <div class="col-3">
                 <div class="form-group">
               <label>E-mail</label>
               <input type="text" name="website" placeholder="E-mail" class="form-control">
           </div>
            </div>
             <div class="col-3">
                 <div class="form-group">
               <label>Twitter</label>
               <input type="text" name="website" placeholder="Twitter" class="form-control">
           </div>
            </div>
             <div class="col-3">
                 <div class="form-group">
               <label>Facebook</label>
               <input type="text" name="website" placeholder="Facebook" class="form-control">
           </div>
            </div>
        </div>

              <div class="row">
            <div class="col-3">
                 <div class="form-group">
               <label>Instagram</label>
               <input type="text" name="website" placeholder="Instagram" class="form-control">
           </div>
            </div>
             <div class="col-3">
                 <div class="form-group">
               <label>Snapchat</label>
               <input type="text" name="website" placeholder="Snapchat" class="form-control">
           </div>
            </div>
             <div class="col-3">
                 <div class="form-group">
               <label>Youtube</label>
               <input type="text" name="website" placeholder="Youtube" class="form-control">
           </div>
            </div>
             <div class="col-3">
                 <div class="form-group">
               <label>Whatsapp</label>
               <input type="text" name="website" placeholder="Whatsapp" class="form-control">
           </div>
            </div>
        </div>
          <div class="row">
            <div class="col-6">
                  <div class="form-group">
                  <label for="">Description En.</label>
                  <textarea class="form-control" cols="5" rows="5"></textarea>
              </div>
           
            </div>
             <div class="col-6">
                  <div class="form-group">
                  <label for="">Description Ar.</label>
                  <textarea class="form-control" cols="5" rows="5"></textarea>
              </div>
              <div class="col-12">
                   <input type="submit" name="" value="submit" class="btn btn-dark float-right">
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
        <table class="table table-bordered table-hover" id="example">
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
</div> 
               </div>
               <div class="tab-pane fade" id="faq-cat-4">
               <div id="accordion4">

  <div class="card">
    <div class="card-header">
      <a class="card-link" data-toggle="collapse" href="#u88">
        Buy One get One free
      </a>
    </div>
    <div id="u88" class="collapse" data-parent="#accordion4">
      <div class="card-body">
        Lorem ipsum..
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#i88">
        Offers Vouchers
      </a>
    </div>
    <div id="i88" class="collapse" data-parent="#accordion4">
      <div class="card-body">
        Lorem ipsum..
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#y66">
        Offers Before and After
      </a>
    </div>
    <div id="y66" class="collapse" data-parent="#accordion4">
      <div class="card-body">
        Lorem ipsum..
      </div>
    </div>
  </div>
   <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#sft">
        Offers Before and After
      </a>
    </div>
    <div id="sft" class="collapse" data-parent="#accordion4">
      <div class="card-body">
        Lorem ipsum..
      </div>
    </div>
  </div>
   <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#654g">
        Offers Before and After
      </a>
    </div>
    <div id="654g" class="collapse" data-parent="#accordion4">
      <div class="card-body">
        Lorem ipsum..
      </div>
    </div>
  </div>

</div>
               </div>
                <div class="tab-pane fade" id="faq-cat-5">
                  5
               </div>
            </div>
          </div>
        </div>
 </div>
</div>
</div>
</div>
<br/><br/>
 <div class="row">
        <div class="col-md-12">
           <div class="card">
                        <div class="card-header">
                            <h4>Vendor Billing setup</h4>
                        </div>
                <div class="card-body">   
    <div class="row">
        <div class="col-md-12">
            <!-- Nav tabs category -->
            <ul class="nav nav-tabs faq-cat-tabs">
            
                     <li class="nav-item "><a class="nav-link active" href="#faq-cat-6" data-toggle="tab"><i class="fa fa-openid"></i> Promo Classified</a></li>
                     <li class="nav-item"><a class="nav-link" href="#faq-cat-7" data-toggle="tab"><i class="fa fa-book"></i> Promo Limited</a></li>
                     <li class="nav-item"><a class="nav-link" href="#faq-cat-8" data-toggle="tab"><i class="fa fa-gift"></i> Claimed Items</a></li>
                     <li class="nav-item"><a class="nav-link" href="#faq-cat-9" data-toggle="tab"><i class="fa fa-gift"></i> Statistic</a></li>
                      <li class="nav-item"><a class="nav-link" href="#faq-cat-10" data-toggle="tab"><i class="fa fa-gift"></i> Review</a></li>
                       <li class="nav-item"><a class="nav-link" href="#faq-cat-11" data-toggle="tab"><i class="fa fa-gift"></i> Billing</a></li>
            </ul>
    
               <div class="tab-content">
               
               <div class="tab-pane container active" id="faq-cat-6">
                   h1
               </div>
                <div class="tab-pane fade" id="faq-cat-7">
                   2
               </div>
                <div class="tab-pane fade" id="faq-cat-8">
                   3
               </div>
               <div class="tab-pane fade" id="faq-cat-9">
                  4
               </div>
                <div class="tab-pane fade" id="faq-cat-10">
                  5
               </div>
                <div class="tab-pane fade" id="faq-cat-11">
                  6
               </div>
            </div>
          </div>
        </div>
 </div>
</div>
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