<?php $this->load->view('backend/Header');?>
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
      <h1 class="mr-2">Vendor</h1>
      <ul>
        <li><a href="#">Admin</a></li>
        <li>Manager Roles</li>
      </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <div id="accordion">
      <div class="card">
        <div class="card-header">
          <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
            1. Manager Roles
          </a>
        </div>
        <div id="collapseTwo" class="collapse" data-parent="#accordion">
          <div class="card-body">
            <div class="">
              <div class="float-right">
                <button class="btn btn-secondary"  data-toggle="modal" data-target="#addRoleInfo">+ Add</button>
              </div> 
              <div class="table-responsive">
                <table class="table table-bordered table-striped  display">
                  <thead>
                    <tr>
                      <th>#No</th>
                      <th>Role Name</th>
                      <th>Description</th>
                      <th>Assign</th>
                      <th>View / Edit/ Remove</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1;
                      if(!empty($admin_roles)){
                        foreach($admin_roles as $value){
                    ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <th><?php echo $value['role_name']; ?></th>
                      <td><?php echo $value['role_description']; ?></td>
                      <td><button class="btn btn-info" onclick="setId('<?php echo $value['role_id'];?>');" data-toggle="modal" data-target="#assign_contacts">Assign</button></td>
                      <td><button class="btn btn-success" onclick="getRolesInfo('<?php echo $value['role_id']; ?>');" data-toggle="modal" data-target="#updateRoles">Edit</button></td>
                    </tr>
                    <?php $i++; }} ?>
                  </tbody>
                </table>
              </div>
            </div>
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
</div>
<!-- ============ Search UI Start ============= -->
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
    <div class="list-thumb d-flex">-->
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
</div>
<!-- PAGINATION CONTROL -->
</div>


<!-- Button to Open the Modal -->
<!-- The Modal -->
<div class="modal" id="updateRoles">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Role</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
            <div class="col-12 alert alert-warning"  id="Uwarning" role="alert"></div>
            <div class="col-12 alert alert-success" id="Usuccess" role="alert"></div>
        </div>
        <form action="" method="POST" id="RoleUpdateForm">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <input type="hidden" name="role_id" id="role_id" value="">
                <label for="">Role Name</label>
                <input type="text" name="role_name" class="form-control" id="role_name" value="" readonly>
              </div>
              <div class="form-group">
                <label for="">Description</label>
                <textarea rows="5" name="role_descriptions" id="role_descriptions" value="" class="form-control">
                </textarea>
              </div>
              <!-- <div class="form-group">
                <div style="column-count: 2">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="bk" name="vehicle"  value="View Vendor Setup">View Vendor Setup
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="cr" name="vehicle"  value="View Mange Account">View Mange Account
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="cr" name="vehicle"  value="View Store setup">View Store setup
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="cr" name="vehicle"  value="View offer types">View offer types
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="cr" name="vehicle"  value="View inventory">View inventory
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="cr" name="vehicle"  value="View Classified">View Classified
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="cr" name="vehicle"  value="View inventory">View inventory
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="cr" name="vehicle"  value="View Limited">View Limited
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="cr" name="vehicle"  value="View Claimed Items">View Claimed Items
                    </label>
                  </div>
                </div>
              </div> -->
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-dark float-right" id="UpdateRoleInfo">Update</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- The Modal -->
<div class="modal" id="assign_contacts">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Assign Role</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <form action="<?php echo base_url();?>backend/Admin_settings/assign_permision" method="POST">
          <div class="row">
            <div class="col-12">
              <div class="table-responsive" style="height: 80vh;">
                <table class="table table-bordered table-striped  display">
                  <!-- <thead> -->
                    <tr>
                      <th>#No</th>
                      <th>Assignment</th>
                      <th>View</th>
                      <th>Edit</th>
                      <th>Add</th>
                      <th>Delete</th>
                    </tr> 
                  <!-- </thead>
                  <tbody> -->
                    <tr>
                      <td>00</td>
                      <td>Dashboard</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="dashboard[]" id="dash_view" value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="dashboard[]" id="dash_edit" value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="dashboard[]" id="dash_add" value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="dashboard[]" id="dash_del" val="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr class="table-dark">
                      <th>01</th>
                      <th>Vendors</th>
                      <th>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="vendor_view" name="vendor[]"  value="view">View 
                          </label>
                        </div>
                      </th>
                      <th>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="vendor_edit" name="vendor[]"  value="edit">Edit 
                          </label>
                        </div>
                      </th>
                      <th>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="vendor_add" name="vendor[]"  value="add">Add 
                          </label>
                        </div> 
                      </th>
                      <th>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="vendor_del" name="vendor[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </th>
                    </tr>
                    <tr>
                      <td>A</td>
                      <td>Add New Vendor</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="addV_view" name="add_vendor[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="addV_edit" name="add_vendor[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="addV_add" name="add_vendor[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="addV_del" name="add_vendor[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td>C</td>
                      <td>Vendor List</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="listV_view" name="list_vendor[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="listV_edit" name="list_vendor[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="listV_add" name="list_vendor[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="listV_del" name="list_vendor[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td>D</td>
                      <td>New vendor approval</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="approvV_view" name="approv_vendor[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="approvV_edit" name="approv_vendor[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="approvV_add" name="approv_vendor[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="approvV_del" name="approv_vendor[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td>E</td>
                      <td>Vendor setup</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="setupV_view" name="setup_vendor[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="setupV_edit" name="setup_vendor[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="setupV_add" name="setup_vendor[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="setupV_del" name="setup_vendor[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr class="table-dark">
                      <th>02</th>
                      <th>Vendors item verification</th>
                      <th>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="itemV_view" name="item_vendor[]"  value="view">View 
                          </label>
                        </div>
                      </th>
                      <th>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="itemV_edit" name="item_vendor[]"  value="edit">Edit 
                          </label>
                        </div>
                      </th>
                      <th>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="itemV_add" name="item_vendor[]"  value="add">Add 
                          </label>
                        </div> 
                      </th>
                      <th>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="itemV_del" name="item_vendor[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </th>
                    </tr>
                    <tr>
                      <td>A</td>
                      <td>New Offer</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="offer_view" name="new_offer[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="offer_edit" name="new_offer[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="offer_add" name="new_offer[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="offer_del" name="new_offer[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td>B</td>
                      <td>New Classified</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="classified_view" name="classified[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="classified_edit" name="classified[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="classified_add" name="classified[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="classified_del" name="classified[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td>C</td>
                      <td>New Limited</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="limited_view" name="limited[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="limited_edit" name="limited[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="limited_add" name="limited[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="limited_del" name="limited[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td>D</td>
                      <td>New Inventory</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="inventory_view" name="inventory[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="inventory_edit" name="inventory[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="inventory_add" name="inventory[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="inventory_del" name="inventory[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr class="table-dark">
                      <th>03</th>
                      <th>Users</th>
                      <th>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="user_view" name="users[]"  value="view">View 
                          </label>
                        </div>
                      </th>
                      <th>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="user_edit" name="users[]"  value="edit">Edit 
                          </label>
                        </div>
                      </th>
                      <th>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="user_add" name="users[]"  value="add">Add 
                          </label>
                        </div> 
                      </th>
                      <th>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="user_del" name="users[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </th>
                    </tr>
                    <tr>
                      <td>A</td>
                      <td>Add New User</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="addUser_view" name="new_add_user[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="addUser_edit" name="new_add_user[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="addUser_add" name="new_add_user[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="addUser_del" name="new_add_user[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td>B</td>
                      <td>Renew User</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="renew_user_view" name="renew_user[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="renew_user_edit" name="renew_user[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="renew_user_add" name="renew_user[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="renew_user_del" name="renew_user[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td>C</td>
                      <td>User Edit</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="edit_user_view" name="edit_user[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="edit_user_edit" name="edit_user[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="edit_user_add" name="edit_user[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="edit_user_del" name="edit_user[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td>D</td>
                      <td>User List</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="user_list_view" name="user_list[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="user_list_edit" name="user_list[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="user_list_add" name="user_list[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="user_list_del" name="user_list[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td>E</td>
                      <td>User Transition</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="user_transition_view" name="user_transition[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="user_transition_edit" name="user_transition[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="user_transition_add" name="user_transition[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="user_transition_del" name="user_transition[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td>F</td>
                      <td>User List Comment Review</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="user_review_view" name="user_review[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="user_review_edit" name="user_review[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="user_review_add" name="user_review[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="user_review_del" name="user_review[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr class="table-dark">
                      <th>03</th>
                      <th>Reward And Gift</th>
                      <th>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="reward_view" name="reward[]"  value="view">View 
                          </label>
                        </div>
                      </th>
                      <th>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="reward_edit" name="reward[]"  value="edit">Edit 
                          </label>
                        </div>
                      </th>
                      <th>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="reward_add" name="reward[]"  value="add">Add 
                          </label>
                        </div> 
                      </th>
                      <th>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="reward_del" name="reward[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </th>
                    </tr>
                    <tr>
                      <td>A</td>
                      <td>Reward Level</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="level_view" name="level[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="level_edit" name="level[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="level_add" name="level[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="level_del" name="level[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td>B</td>
                      <td>Assign Gift Scenario</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="scenario_view" name="scenario[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="scenario_edit" name="scenario[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="scenario_add" name="scenario[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="scenario_del" name="scenario[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td>C</td>
                      <td>Manage Gift</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="manage_gift_view" name="manage_gift[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="manage_gift_edit" name="manage_gift[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="manage_gift_add" name="manage_gift[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="manage_gift_del" name="manage_gift[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td>D</td>
                      <td>Inventory Tracking</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="tracking_view" name="tracking[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="tracking_edit" name="tracking[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="tracking_add" name="tracking[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="tracking_del" name="tracking[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td>E</td>
                      <td>Point Claiming Setup</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="claim_setup_view" name="claim_setup[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="claim_setup_edit" name="claim_setup[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="claim_setup_add" name="claim_setup[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="claim_setup_del" name="claim_setup[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr class="table-dark">
                      <th>04</th>
                      <th>List Records</th>
                      <th>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="list_record_view" name="list_record[]"  value="view">View 
                          </label>
                        </div>
                      </th>
                      <th>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="list_record_edit" name="list_record[]"  value="edit">Edit 
                          </label>
                        </div>
                      </th>
                      <th>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="list_record_add" name="list_record[]"  value="add">Add 
                          </label>
                        </div> 
                      </th>
                      <th>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="list_record_del" name="list_record[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </th>
                    </tr>
                    <tr>
                      <td>A</td>
                      <td>Users Record</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="user_record_view" name="user_record[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="user_record_edit" name="user_record[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="user_record_add" name="user_record[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="user_record_del" name="user_record[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td>B</td>
                      <td>Vendor Record</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="vendor_record_view" name="vendor_record[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="vendor_record_edit" name="vendor_record[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="vendor_record_add" name="vendor_record[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="vendor_record_del" name="vendor_record[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td>C</td>
                      <td>Offer Record</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="offer_record_view" name="offer_record[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="offer_record_edit" name="offer_record[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="offer_record_add" name="offer_record[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="offer_record_del" name="offer_record[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td>D</td>
                      <td>Classified Record</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="classified_record_view" name="classified_record[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="classified_record_edit" name="classified_record[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="classified_record_add" name="classified_record[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="classified_record_del" name="classified_record[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td>E</td>
                      <td>Limited Record</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="limited_record_view" name="limited_record[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="limited_record_edit" name="limited_record[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="limited_record_add" name="limited_record[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="limited_record_del" name="limited_record[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td>F</td>
                      <td>Claimed Gift Record</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="claim_record_view" name="claim_record[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="claim_record_edit" name="claim_record[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="claim_record_add" name="claim_record[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="claim_record_del" name="claim_record[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td>G</td>
                      <td>Unclaimed Gift Record</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="unclaim_record_view" name="unclaim_record[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="unclaim_record_edit" name="unclaim_record[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="unclaim_record_add" name="unclaim_record[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="unclaim_record_del" name="unclaim_record[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td>D</td>
                      <td>Inventory Record</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="inventory_record_view" name="inventory_record[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="inventory_record_edit" name="inventory_record[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="inventory_record_add" name="inventory_record[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="inventory_record_del" name="inventory_record[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td>H</td>
                      <td>Comment Record</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="comment_record_view" name="comment_record[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="comment_record_edit" name="comment_record[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="comment_record_add" name="comment_record[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="comment_record_del" name="comment_record[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr class="table-dark">
                      <th>06</th>
                      <th>Reports</th>
                      <th>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="report_view" name="report[]"  value="view">View 
                          </label>
                        </div>
                      </th>
                      <th>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="report_edit" name="report[]"  value="edit">Edit 
                          </label>
                        </div>
                      </th>
                      <th>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="report_add" name="report[]"  value="add">Add 
                          </label>
                        </div> 
                      </th>
                      <th>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="report_del" name="report[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </th>
                    </tr>
                    <tr>
                      <td>A</td>
                      <td>Monthly Summery</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="month_report_view" name="month_report[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="month_report_edit" name="month_report[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="month_report_add" name="month_report[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="month_report_del" name="month_report[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td>B</td>
                      <td>Users Activity</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="user_activity_view" name="user_activity[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="user_activity_edit" name="user_activity[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="user_activity_add" name="user_activity[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="user_activity_del" name="user_activity[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td>C</td>
                      <td>Vendor Activity</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="vendor_activity_view" name="vendor_activity[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="vendor_activity_edit" name="vendor_activity[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="vendor_activity_add" name="vendor_activity[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="vendor_activity_del" name="vendor_activity[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td>D</td>
                      <td>Users Purchase</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="user_purchase_view" name="user_purchase[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="user_purchase_edit" name="user_purchase[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="user_purchase_add" name="user_purchase[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="user_purchase_del" name="user_purchase[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td>E</td>
                      <td>Vendor Purchase</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="vendor_purchase_view" name="vendor_purchase[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="vendor_purchase_edit" name="vendor_purchase[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="vendor_purchase_add" name="vendor_purchase[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="vendor_purchase_del" name="vendor_purchase[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr class="table-dark">
                      <th>07</th>
                      <th>Slides and Alerts</th>
                      <th>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="slide_alert_view" name="slide_alert[]"  value="view">View 
                          </label>
                        </div>
                      </th>
                      <th>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="slide_alert_edit" name="slide_alert[]"  value="edit">Edit 
                          </label>
                        </div>
                      </th>
                      <th>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="slide_alert_add" name="slide_alert[]"  value="add">Add 
                          </label>
                        </div> 
                      </th>
                      <th>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="slide_alert_del" name="slide_alert[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </th>
                    </tr>
                    <tr>
                      <td>A</td>
                      <td>Slide Ads</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="slide_ad_view" name="slide_ad[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="slide_ad_edit" name="slide_ad[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="slide_ad_add" name="slide_ad[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="slide_ad_del" name="slide_ad[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td>B</td>
                      <td>News Alerts</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="news_alert_view" name="news_alert[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="news_alert_edit" name="news_alert[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="news_alert_add" name="news_alert[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="news_alert_del" name="news_alert[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr class="table-dark">
                      <th>08</th>
                      <th>Category</th>
                      <th>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="category_view" name="category[]"  value="view">View 
                          </label>
                        </div>
                      </th>
                      <th>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="category_edit" name="category[]"  value="edit">Edit 
                          </label>
                        </div>
                      </th>
                      <th>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="category_add" name="category[]"  value="add">Add 
                          </label>
                        </div> 
                      </th>
                      <th>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="category_del" name="category[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </th>
                    </tr>
                    <tr>
                      <td>A</td>
                      <td>Category List</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="category_list_view" name="category_list[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="category_list_edit" name="category_list[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="category_list_add" name="category_list[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="category_list_del" name="category_list[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td>B</td>
                      <td>Sub Category List</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="subcategory_list_view" name="subcategory_list[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="subcategory_list_edit" name="subcategory_list[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="subcategory_list_add" name="subcategory_list[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="subcategory_list_del" name="subcategory_list[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td>C</td>
                      <td>Aminity List</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="aminity_list_view" name="aminity_list[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="aminity_list_edit" name="aminity_list[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="aminity_list_add" name="aminity_list[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="aminity_list_del" name="aminity_list[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr class="table-dark">
                      <th>09</th>
                      <th>Settings</th>
                      <th>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="settings_view" name="settings[]"  value="view">View 
                          </label>
                        </div>
                      </th>
                      <th>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="settings_edit" name="settings[]"  value="edit">Edit 
                          </label>
                        </div>
                      </th>
                      <th>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="settings_add" name="settings[]"  value="add">Add 
                          </label>
                        </div> 
                      </th>
                      <th>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="settings_del" name="settings[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </th>
                    </tr>
                    <tr>
                      <td>A</td>
                      <td>Nationality</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="nationality_view" name="nationality[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="nationality_edit" name="nationality[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="nationality_add" name="nationality[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="nationality_del" name="nationality[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td>B</td>
                      <td>Country</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="country_view" name="country[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="country_edit" name="country[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="country_add" name="country[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="country_del" name="country[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td>C</td>
                      <td>Region</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="region_view" name="region[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="region_edit" name="region[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="region_add" name="region[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="region_del" name="region[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td>D</td>
                      <td>City</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="city_view" name="city[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="city_edit" name="city[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="city_add" name="city[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="city_del" name="city[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td>E</td>
                      <td>District</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="district_view" name="district[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="district_edit" name="district[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="district_add" name="district[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="district_del" name="district[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr class="table-dark">
                      <th>10</th>
                      <th>Plans Management</th>
                      <th>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="plan_management_view" name="plan_management[]"  value="view">View 
                          </label>
                        </div>
                      </th>
                      <th>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="plan_management_edit" name="plan_management[]"  value="edit">Edit 
                          </label>
                        </div>
                      </th>
                      <th>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="plan_management_add" name="plan_management[]"  value="add">Add 
                          </label>
                        </div> 
                      </th>
                      <th>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="plan_management_del" name="plan_management[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </th>
                    </tr>
                    <tr>
                      <td>A</td>
                      <td>Vendor Membership</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="vendor_mambership_view" name="vendor_mambership[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="vendor_mambership_edit" name="vendor_mambership[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="vendor_mambership_add" name="vendor_mambership[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="vendor_mambership_del" name="vendor_mambership[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td>B</td>
                      <td>Users Membership</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="user_membership_view" name="user_membership[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="user_membership_edit" name="user_membership[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="user_membership_add" name="user_membership[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="user_membership_del" name="user_membership[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td>C</td>
                      <td>Offer Type Setup</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="offer_setup_view" name="offer_setup[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="offer_setup_edit" name="offer_setup[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="offer_setup_add" name="offer_setup[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="offer_setup_del" name="offer_setup[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td>D</td>
                      <td>Classified Setup</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="classified_setup_view" name="classified_setup[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="classified_setup_edit" name="classified_setup[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="classified_setup_add" name="classified_setup[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="classified_setup_del" name="classified_setup[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td>E</td>
                      <td>Limited Setup</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="limited_setup_view" name="limited_setup[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="limited_setup_edit" name="limited_setup[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="limited_setup_add" name="limited_setup[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="limited_setup_del" name="limited_setup[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr class="table-dark">
                      <th>11</th>
                      <th>Admin Management</th>
                      <th>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="admin_management_view" name="admin_management[]"  value="view">View 
                          </label>
                        </div>
                      </th>
                      <th>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="admin_management_edit" name="admin_management[]"  value="edit">Edit 
                          </label>
                        </div>
                      </th>
                      <th>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="admin_management_add" name="admin_management[]"  value="add">Add 
                          </label>
                        </div> 
                      </th>
                      <th>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="admin_management_del" name="admin_management[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </th>
                    </tr>
                    <tr>
                      <td>A</td>
                      <td>Vendor Contect Roles</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="vendor_contact_role_view" name="vendor_contact_role[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="vendor_contact_role_edit" name="vendor_contact_role[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="vendor_contact_role_add" name="vendor_contact_role[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="vendor_contact_role_del" name="vendor_contact_role[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td>B</td>
                      <td>Manage Roles</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="manage_role_view" name="manage_role[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="manage_role_edit" name="manage_role[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="manage_role_add" name="manage_role[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="manage_role_del" name="manage_role[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td>C</td>
                      <td>Manager List</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="manager_list_view" name="manager_list[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="manager_list_edit" name="manager_list[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="manager_list_add" name="manager_list[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="manager_list_del" name="manager_list[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td>D</td>
                      <td>My Profile</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="my_profile_view" name="my_profile[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="my_profile_edit" name="my_profile[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="my_profile_add" name="my_profile[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="my_profile_del" name="my_profile[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr class="table-dark">
                      <th>12</th>
                      <th>System Setup</th>
                      <th>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="system_setup_view" name="system_setup[]"  value="view">View 
                          </label>
                        </div>
                      </th>
                      <th>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="system_setup_edit" name="system_setup[]"  value="edit">Edit 
                          </label>
                        </div>
                      </th>
                      <th>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="system_setup_add" name="system_setup[]"  value="add">Add 
                          </label>
                        </div> 
                      </th>
                      <th>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="system_setup_del" name="system_setup[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </th>
                    </tr>
                    <tr>
                      <td>A</td>
                      <td>Vat Setup</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="vat_setup_view" name="vat_setup[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="vat_setup_edit" name="vat_setup[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="vat_setup_add" name="vat_setup[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="vat_setup_del" name="vat_setup[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td>B</td>
                      <td>Currency Setup</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="currency_setup_view" name="currency_setup[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="currency_setup_edit" name="currency_setup[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="currency_setup_add" name="currency_setup[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="currency_setup_del" name="currency_setup[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td>C</td>
                      <td>Merge Store Branch With Google Map</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="google_map_view" name="google_map[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="google_map_edit" name="google_map[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="google_map_add" name="google_map[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="google_map_del" name="google_map[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr class="table-dark">
                      <th>13</th>
                      <th>Support</th>
                      <th>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="support_view" name="support[]"  value="view">View 
                          </label>
                        </div>
                      </th>
                      <th>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="support_edit" name="support[]"  value="edit">Edit 
                          </label>
                        </div>
                      </th>
                      <th>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="support_add" name="support[]"  value="add">Add 
                          </label>
                        </div> 
                      </th>
                      <th>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="support_del" name="support[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </th>
                    </tr>
                    <tr>
                      <td>A</td>
                      <td>Help Instruction</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="help_view" name="help[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="help_edit" name="help[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="help_add" name="help[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="help_del" name="help[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td>B</td>
                      <td>Rules of use</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="rules_view" name="rules[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="rules_edit" name="rules[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="rules_add" name="rules[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="rules_del" name="rules[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td>C</td>
                      <td>Find us on</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="find_us_view" name="find_us[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="find_us_edit" name="find_us[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="find_us_add" name="find_us[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="find_us_del" name="find_us[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td>D</td>
                      <td>My Profile</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="my_profile_view" name="my_profile[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="my_profile_edit" name="my_profile[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="my_profile_add" name="my_profile[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="my_profile_del" name="my_profile[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td>E</td>
                      <td>Contact Us</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="contact_us_view" name="contact_us[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="contact_us_edit" name="contact_us[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="contact_us_add" name="contact_us[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="contact_us_del" name="contact_us[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td>F</td>
                      <td>For Vendors</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="for_vendor_view" name="for_vendor[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="for_vendor_edit" name="for_vendor[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="for_vendor_add" name="for_vendor[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="for_vendor_del" name="for_vendor[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td>G</td>
                      <td>About Us</td>
                      <td>  
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="about_us_view" name="about_us[]"  value="view">View 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="about_us_edit" name="about_us[]"  value="edit">Edit 
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="about_us_add" name="about_us[]"  value="add">Add 
                          </label>
                        </div> 
                      </td>
                      <td>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="about_us_del" name="about_us[]"  value="delete">Delete 
                          </label>
                        </div> 
                      </td>
                    </tr>
                  <!-- </tbody> -->
                </table>
              </div>
            </div>
            <input type="hidden" name="role_ids" id="role_ids" value="" >
            <div class="col-12">
              <button type="submit" class="btn btn-dark float-right" id="assignAA">Assign Role</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- The Modal -->
<div class="modal" id="addRoleInfo">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Role</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
            <div class="col-12 alert alert-warning"  id="warning" role="alert"></div>
            <div class="col-12 alert alert-success" id="success" role="alert"></div>
        </div>
        <form action="" method="POST" id="RoleAddForm">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="">Role Name</label>
                <input type="text" class="form-control" id="Arole_name" name="Arole_name">
              </div>
              <div class="form-group">
                <label for="">Description</label>
                <textarea id="Arole_descriptions" rows="5" name="Arole_descriptions" class="form-control"></textarea>
              </div>
              <!-- <div class="form-group">
                <div style="column-count: 2">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="bk" name="vehicle"  value="View Vendor Setup">View Vendor Setup
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="cr" name="vehicle"  value="View Mange Account">View Mange Account
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="cr" name="vehicle"  value="View Store setup">View Store setup
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="cr" name="vehicle"  value="View offer types">View offer types
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="cr" name="vehicle"  value="View inventory">View inventory
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="cr" name="vehicle"  value="View Classified">View Classified
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="cr" name="vehicle"  value="View inventory">View inventory
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="cr" name="vehicle"  value="View Limited">View Limited
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="cr" name="vehicle"  value="View Claimed Items">View Claimed Items
                    </label>
                  </div>
                </div>
              </div> -->
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-dark float-right" id="AddRoleInfo">Save</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('backend/Footer');?>
<script>
    $("#success").hide();
    $("#warning").hide();
    $("#Usuccess").hide();
    $("#Uwarning").hide();
  
  var setId = function(role_id){
      $("#role_ids").val(role_id);
      $.ajax({
        type : 'POST',
        url : '<?php echo base_url(); ?>backend/Admin_settings/getAssignPermission',
        data : {role_id:role_id},
        success : function(ress){
          var res = JSON.parse(ress);
          console.log(res);
          alert(res);
        }
      });
  }

  $("#assign").click(function(e){
    var dashboard = [];
    $.each($("input[name='dashboard']:checked"), function(){
      dashboard.push($(this).val());
    });
    alert(dashboard)
  });

  var getRolesInfo = function(role_id){
    $.ajax({
      type : 'POST',
      url : '<?php echo base_url();?>backend/Admin_settings/getRoleInfo',
      data : {role_id : role_id, role_type : 'admin'},
      success : function(res){
        var ress = JSON.parse(res);
        $("#role_id").val(ress.result[0].role_id);
        $("#role_name").val(ress.result[0].role_name);
        $("#role_descriptions").val(ress.result[0].role_description);
        // $("#role_id").val(ress.result[0].role_id);
      }
    });
  }

  // $("#AddRoleInfo").click(function(){
  //   var role_description = $('#Arole_descriptions').val();
  //   var role_name = $("#Arole_name").val();

  //   $.ajax({
  //     type : 'POST',
  //     url : '<?php echo base_url(); ?>backend/Admin_settings/save_role_info',
  //     data : {role_type:'admin', role_description:role_description, role_name:role_name},
  //     success : function(res){
  //       var ress = JSON.parse(res);
  //       if(ress.status == 1){
  //         $("#success").html(ress.message).show();
  //         window.setTimeout(function(){location.reload()},3000)
  //       } else {
  //         $("#warning").html(ress.message).show().fadeOut();
  //       }
  //     }
  //   });
  // });

  // $("#UpdateRoleInfo").click(function(){
  //   var role_description = $('#role_descriptions').val();
  //   var role_id = $("#role_id").val();
  //   var role_name = $("#role_name").val();

  //   $.ajax({
  //     type : 'POST',
  //     url : '<?php echo base_url(); ?>backend/Admin_settings/update_role_info',
  //     data : {role_type:'admin', role_description:role_description, role_id:role_id, role_name:role_name},
  //     success : function(res){
  //       var ress = JSON.parse(res);
  //       if(ress.status == 1){
  //         $("#Usuccess").html(ress.message).show();
  //         window.setTimeout(function(){location.reload()},3000)
  //       } else {
  //         $("#Uwarning").html(ress.message).show().fadeOut();
  //       }
  //     }
  //   });
  // });
</script>
<script>
    $(document).ready(function() {
			var form = $('#RoleAddForm');
			var errorHandler1 = $('.errorHandler', form);
			var successHandler1 = $('.successHandler', form);
			form.validate({
				errorElement: "span",
				errorClass: 'help-block',
				errorPlacement: function (error, element) {
					if (element.attr("type") == "radio" || element.attr("type") == "checkbox") { 
						error.insertAfter($(element).closest('.form-group').children('div').children().last());
					} else if (element.attr("name") == "dd" || element.attr("name") == "mm" || element.attr("name") == "yyyy") {
						error.insertAfter($(element).closest('.form-group').children('div'));
					} else {
						error.insertAfter(element);
					}
				},
				ignore: "",
				rules: {
					Arole_name: {
						required: true
					},
					Arole_descriptions:{
						required : true
					}
				},
				invalidHandler: function (event, validator) { //display error alert on form submit
					successHandler1.hide();
					errorHandler1.show();
				},
				highlight: function (element) {
					$(element).closest('.help-block').removeClass('valid');
					$(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
				},
				unhighlight: function (element) {
					$(element).closest('.form-group').removeClass('has-error');
				},
				success: function (label, element) {
					label.addClass('help-block valid');
					$(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
				},
				submitHandler: function (form) {
					successHandler1.show();
					errorHandler1.hide();
          form.submit();
          var role_description = $('#Arole_descriptions').val();
          var role_name = $("#Arole_name").val();
          $.ajax({
            type : 'POST',
            url : '<?php echo base_url(); ?>backend/Admin_settings/save_role_info',
            data : {role_type:'admin', role_description:role_description, role_name:role_name},
            success : function(res){
              var ress = JSON.parse(res);
              if(ress.status == 1){
                $("#success").html(ress.message).show();
                window.setTimeout(function(){location.reload()},3000)
              } else {
                $("#warning").html(ress.message).show().fadeOut();
              }
            }
          });
				}
			});
    });
    
    $(document).ready(function() {
			var form = $('#RoleUpdateForm');
			var errorHandler1 = $('.errorHandler', form);
			var successHandler1 = $('.successHandler', form);
			form.validate({
				errorElement: "span",
				errorClass: 'help-block',
				errorPlacement: function (error, element) {
					if (element.attr("type") == "radio" || element.attr("type") == "checkbox") { 
						error.insertAfter($(element).closest('.form-group').children('div').children().last());
					} else if (element.attr("name") == "dd" || element.attr("name") == "mm" || element.attr("name") == "yyyy") {
						error.insertAfter($(element).closest('.form-group').children('div'));
					} else {
						error.insertAfter(element);
					}
				},
				ignore: "",
				rules: {
					role_name: {
						required: true
					},
					role_descriptions:{
						required : true
					}
				},
				invalidHandler: function (event, validator) { //display error alert on form submit
					successHandler1.hide();
					errorHandler1.show();
				},
				highlight: function (element) {
					$(element).closest('.help-block').removeClass('valid');
					$(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
				},
				unhighlight: function (element) {
					$(element).closest('.form-group').removeClass('has-error');
				},
				success: function (label, element) {
					label.addClass('help-block valid');
					$(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
				},
				submitHandler: function (form) {
					successHandler1.show();
					errorHandler1.hide();
          form.submit();
          var role_description = $('#role_descriptions').val();
          var role_id = $("#role_id").val();
          var role_name = $("#role_name").val();

          $.ajax({
            type : 'POST',
            url : '<?php echo base_url(); ?>backend/Admin_settings/update_role_info',
            data : {role_type:'admin', role_description:role_description, role_id:role_id, role_name:role_name},
            success : function(res){
              var ress = JSON.parse(res);
              if(ress.status == 1){
                $("#Usuccess").html(ress.message).show();
                window.setTimeout(function(){location.reload()},3000)
              } else {
                $("#Uwarning").html(ress.message).show().fadeOut();
              }
            }
          });
				}
			});
		});
</script>
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