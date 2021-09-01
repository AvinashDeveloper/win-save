
  <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>Add</h1>
                    <ul>
                  
                        <li>Manager List</li>
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
      <label>Name:</label>
      <input type="text" class="form-control" required="" name="name" id="name" placeholder="Enter Name" value="">
    </div>
    <div class="form-group">
      <label>Email:</label>
      <input type="email" class="form-control" name="email" required="" id="name" placeholder="Enter Email" value="">
    </div>
    <div class="form-group">
      <label>Password:</label>
      <input type="password" class="form-control" name="password" required="" id="name" placeholder="Enter Password" value="">
    </div>
    <div class="form-group">
      <label>Phone No.:</label>
      <input type="text" class="form-control" name="contact" required="" id="phone" placeholder="Enter Phone no." value="">
    </div>
   <div class="form-group">
      <label>Address:</label>
      <textarea value=""  name="address" class="form-control" id="iq" placeholder="Enter Address"></textarea>
    </div>
    
   <div class="form-group">
      <label>Location:</label>
      <textarea value="" name="location" class="form-control" id="iq" placeholder="Enter your Issues/query"></textarea>
    </div>
    <div class="form-group">
      <label>Image:</label>
      <input type="file" name="userfile" class="form-control">
    </div>
    <div class="form-group">
      <label>Authority:</label>
      <table>
        <tr>
          <td>Venders:</td>
          <td><input type="checkbox" name="authority[]" value="1" ></td>
          <td>Users:</td>
          <td><input type="checkbox" name="authority[]" value="2" ></td>
          <td>Manage Accounts:</td>
          <td><input type="checkbox" name="authority[]" value="3" ></td>
          <td>Manage Managers:</td>
          <td><input type="checkbox" name="authority[]" value="4" ></td>
          <td>Support:</td>
          <td><input type="checkbox" name="authority[]" value="5" ></td>
          <td>Manage Ads:</td>
          <td><input type="checkbox" name="authority[]" value="6" ></td>
          <td>Category:</td>
          <td><input type="checkbox" name="authority[]" value="7" ></td>
         
        </tr>
        <tr>

           <td>About us:</td>
          <td><input type="checkbox" name="authority[]" value="8" ></td>
          <td>Contact us:</td>
          <td><input type="checkbox" name="authority[]" value="9" ></td>
          <td>My Profile:</td>
          <td><input type="checkbox" name="authority[]" value="10" ></td>
          <td>Setting:</td>
          <td><input type="checkbox" name="authority[]" value="11" ></td>
          <td>Inventory:</td>
          <td><input type="checkbox" name="authority[]" value="12" ></td>
        </tr>
      </table>
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

