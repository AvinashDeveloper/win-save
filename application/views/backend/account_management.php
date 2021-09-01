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

<?php $vandor_id = $this->uri->segment(4); ?>
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
                                    <form action="" method="post">
                                          <div class="form-group">
                                                <label class="font-weight-bold">Apporval</label><br/>
                                                <div class="form-check-inline">
                                                      <label class="form-check-label">
                                                      <input type="radio" <?php if ($account_management[0]['approved_status']==1) {
                                                            echo "checked";
                                                            }  ?> class="form-check-input" name="approved_status" value="1">Apporve
                                                      </label>
                                                </div>
                                                <div class="form-check-inline">
                                                      <label class="form-check-label">
                                                      <input type="radio" 
                                                      <?php if ($account_management[0]['approved_status']==0) {echo "checked";}  ?> class="form-check-input" name="approved_status" value="0" >Disapporve
                                                      </label>
                                                </div>
                                                <div class="form-check-inline disabled">
                                                      <label class="form-check-label">
                                                      <input type="radio" <?php if ($account_management[0]['approved_status']==2) {
                                                            echo "checked";
                                                            }  ?> class="form-check-input" name="approved_status" value="2">Pending
                                                      </label>
                                                </div>
                                          </div>
                                          <div class="form-group">
                                                <label class="font-weight-bold">Status</label><br/>
                                                <div class="form-check-inline">
                                                      <label class="form-check-label">
                                                      <input type="radio" <?php if ($account_management[0]['status']==1) {
                                                            echo "checked";
                                                            }  ?> class="form-check-input" name="status" value="<?php if ($account_management[0]['status']==1) {
                                                                  echo "1";
                                                            }  ?>">Active
                                                      </label>
                                                </div>
                                                <div class="form-check-inline">
                                                      <label class="form-check-label">
                                                      <input type="radio" <?php if ($account_management[0]['status']==0) { echo "checked"; }  ?> class="form-check-input" name="status" value="0">Inactive
                                                      </label>
                                                </div>
                                                <div class="form-check-inline disabled">
                                                      <label class="form-check-label">
                                                      <input type="radio" <?php if ($account_management[0]['status']==2) { echo "checked"; }  ?> class="form-check-input" name="status" value="2">Expired
                                                      </label>
                                                </div>
                                          </div>
                                          <div class="form-group">
                                                <label class="font-weight-bold">Offers Plans </label><br/>
                                                <?php echo planTypeRadio((int)$account_management[0]['plan_id']);?>
                                          </div>
                                          <div class="form-group">
                                                <label class="font-weight-bold">Show in feature</label><br/>
                                                <div class="form-check-inline">
                                                      <label class="form-check-label">
                                                      <input type="radio" <?php if ($account_management[0]['feature']==1) {
                                                            echo "checked";
                                                            }  ?> class="form-check-input" name="feature" value="<?php if ($account_management[0]['feature']==1) {
                                                                  echo "1";
                                                            }  ?>">Yes
                                                      </label>
                                                </div>
                                                <div class="form-check-inline">
                                                      <label class="form-check-label">
                                                      <input type="radio" <?php if ($account_management[0]['feature']==0) {
                                                            echo "checked";
                                                            }  ?> class="form-check-input" name="feature" value="<?php if ($account_management[0]['feature']==0) {
                                                                  echo "0";
                                                            }  ?>">no
                                                      </label>
                                                </div>
                                                <div class="form-check-inline disabled">
                                                      <label class="form-check-label">
                                                      <input type="radio" class="form-check-input" <?php if ($account_management[0]['feature']==2) {
                                                            echo "checked";
                                                            }  ?> name="feature" value="<?php if ($account_management[0]['feature']==2) {
                                                                  echo "2";
                                                            }  ?>">Expired
                                                      </label>
                                                </div>
                                          </div>
                                          <div class="form-group">
                                                <label class="font-weight-bold">Show in Notification alert</label><br/>
                                                <div class="form-check-inline">
                                                      <label class="form-check-label">
                                                      <input onclick="document.getElementById('no').checked = false" type="radio" <?php if ($account_management[0]['notification']==1) {
                                                            echo "checked";
                                                            }  ?> class="form-check-input" id="yes" name="notification" value="<?php if ($account_management[0]['notification']==1) {
                                                                  echo "1";
                                                            }  ?>">Yes
                                                      </label>
                                                </div>
                                                <div class="form-check-inline">
                                                      <label class="form-check-label">
                                                      <input onclick="document.getElementById('no').checked = false" type="radio" <?php if ($account_management[0]['notification']==0) {
                                                            echo "checked";
                                                            }  ?> class="form-check-input" name="notification" value="<?php if ($account_management[0]['notification']==0) {
                                                                  echo "0";
                                                            }  ?>">no
                                                      </label>
                                                </div>
                                          </div>
                                          <div class="form-group">
                                                <label class="font-weight-bold">Classified</label><br/>
                                                <div class="form-check-inline">
                                                      <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="classified_status" <?php if ($account_management[0]['classified_status']==1) { echo "checked";}  ?> value="1">Yes
                                                      </label>
                                                </div>
                                                <div class="form-check-inline">
                                                      <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="classified_status" <?php if ($account_management[0]['classified_status']==0) { echo "checked";}  ?> value='0'>no
                                                      </label>
                                                </div>

                                          </div>
                                          <div class="form-group">
                                                <label class="font-weight-bold">Limited</label><br/>
                                                <div class="form-check-inline">
                                                      <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="limited_status" <?php if ($account_management[0]['limited_status']==1) { echo "checked";}  ?> value='1'>Yes
                                                      </label>
                                                </div>
                                                <div class="form-check-inline">
                                                      <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" <?php if ($account_management[0]['limited_status']==0) { echo "checked";}  ?> name="limited_status" value="0">no
                                                      </label>
                                                </div>
                                          </div>
                                          <input type="submit" name="account_setup" class="btn btn-dark" value="submit">
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
                                          <button class="btn btn-secondary"  data-toggle="modal" data-target="#membership_add">+ Add</button>
                                    </div>
                                    <?php  //print_r($vender_offers);  ?>
                                    <div class="table-responsive" style="height: auto;">
                                          <table class="table table-bordered table-hover display">
                                                <thead>
                                                      <tr>
                                                            <td>#No</td>
                                                            <th>Date</th>
                                                            <th>Salesman</th>
                                                            <th>Plan Type</th>
                                                            <th>Mobile</th>
                                                            <th>Starting Date</th>
                                                            <th>Ending Date</th>
                                                            <th>Price</th>
                                                            <th>Discount</th>
                                                            <th>Sub Total</th>
                                                            <th>Vat %</th>
                                                            <th>Total</th>
                                                            <th>Status</th>
                                                            <th>Update</th>
                                                            <th>Remove</th>
                                                      </tr>
                                                </thead>
                                                <tbody>
                                                      <?php $i=1; $subTotal = ""; $total ="";
                                                      if(!empty($vender_offers)){
                                                            foreach ($vender_offers as $key) {
                                                                  $membership_order_id = $key['membership_order_id'];
                                                                  $subTotal = getDiscount($key['amount'], $key['discount']);
                                                                  $total = getVatPercent($subTotal, $key['vat']);
                                                                  ?>
                                                                  <tr id="membership_row_<?php echo $key['membership_order_id'];?>">
                                                                        <td><?php echo $i;   ?></td>
                                                                        <td><?php echo $key['create_date'];  ?></td>
                                                                        <td><?php echo $key['name']; ?></td>
                                                                        <td><select class="form-control">
                                                                              <?php echo planType((int)$key['plan_id']); ?>
                                                                        </select></td>
                                                                        <td><?php echo $key['mobile']; ?></td>
                                                                        <td><?php echo date('m/d/yy', $key['start_date']); ?></td>
                                                                        <td><?php echo date('m/d/yy', $key['expire_date']); ?></td>
                                                                        <td><?php echo $key['amount']; ?></td>
                                                                        <td><?php echo $key['discount']; ?></td>
                                                                        <td><?php echo $subTotal; ?></td>
                                                                        <td><?php echo $key['vat']." %"; ?></td>
                                                                        <td><?php echo $total; ?></td>

                                                                        <?php if( strtolower($key['status']) == 'active'){?>
                                                                              <td><button class="btn btn-info" onclick="membershipChangeStatus(<?php echo $key['membership_order_id']; ?>);"><?php echo $key['status']; ?></button></td>             
                                                                        <?php }else{
                                                                              ?>
                                                                              <td><button class="btn btn-success" onclick="membershipChangeStatus(<?php echo $key['membership_order_id']; ?>);"><?php echo $key['status']; ?></button></td>  
                                                                        <?php }?>

                                                                        <td><button class="btn btn-success" onclick="getMembershipOrderData('<?php echo $membership_order_id;?>','<?php echo $vandor_id;?>');" data-toggle="modal" data-target="#membership_update">update</button></td>
                                                                        <td><span class="text-danger"  onclick="deleteMRow('<?php echo $key['membership_order_id']; ?>');"><i class="fa fa-close"></i></span></td>
                                                                  </tr>
                                                      <?php  $i++;} }  ?>
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
                                          <button class="btn btn-secondary"  data-toggle="modal" data-target="#classified_add">+ Add</button>
                                    </div>
                                    <div class="table-responsive" style="height: auto;">
                                          <table class="table table-bordered table-hover display">
                                                <thead>
                                                      <tr>
                                                            <td>#No</td>
                                                            <th>Date</th>
                                                            <th>Salesman</th>
                                                            <th>Campain Name</th>
                                                            <th>Description</th>
                                                            <th>Price</th>
                                                            <th>Number of Unit</th>
                                                            <th>Discount</th>
                                                            <th>Sub Total</th>
                                                            <th>Vat 5%</th>
                                                            <th>Total</th>
                                                            <th>Status</th>
                                                            <th>Update</th>
                                                            <th>Remove</th>
                                                      </tr>
                                                </thead>
                                                <tbody>
                                                      <?php  $i=1;
                                                      if(!empty($cls_detail)){
                                                            foreach ($cls_detail as $key) {
                                                                  $sub_total = getDiscount($key['amount'], $key['discount']);
                                                                  $totals = getVatPercent($sub_total, $key['vat']);
                                                                  ?>
                                                                  <tr  id="classified_row_<?php echo $key['classified_order_id'];?>">
                                                                        <td><?php echo $i;   ?></td>
                                                                        <td><?php echo date('m/d/yy',$key['date']);  ?></td>
                                                                        <td><?php echo $key['name']; ?></td>
                                                                        <td><?php echo $key['campain_name'] ?></td>
                                                                        <td><?php  echo $key['description'];  ?></td>
                                                                        <td><?php  echo $key['amount'];  ?></td>
                                                                        <td><?php  echo $key['no_unit'];  ?></td>
                                                                        <td><?php  echo $key['discount'];  ?></td>
                                                                        <td><?php  echo $sub_total; ?></td>
                                                                        <td><?php  echo $key['vat'];  ?></td>
                                                                        <td><?php  echo $totals;  ?></td>

                                                                        <?php if( strtolower($key['status']) == 'active'){?>
                                                                              <td><button class="btn btn-info" onclick="classifiedChangeStatus(<?php echo $key['classified_order_id']; ?>);"><?php echo $key['status']; ?></button></td>             
                                                                        <?php }else{
                                                                              ?>
                                                                              <td><button class="btn btn-success" onclick="classifiedChangeStatus(<?php echo $key['classified_order_id']; ?>);"><?php echo $key['status']; ?></button></td>  
                                                                        <?php }?>

                                                                        <td><button class="btn btn-success" onclick="getClassifiedOrderData('<?php echo $key['classified_order_id'];?>','<?php echo $vandor_id;?>');" data-toggle="modal" data-target="#classified_update">update</button></td>
                                                                        <td><span class="text-danger" onclick="deleteCRow('<?php echo $key['classified_order_id']; ?>');"><i class="fa fa-close"></i></span></td>
                                                                  </tr>
                                                      <?php $i++; }  }?>
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
                                          <button class="btn btn-secondary"  data-toggle="modal" data-target="#limited_add">+ Add</button>
                                    </div>
                                    <div class="table-responsive" style="height: auto;">
                                          <table class="table table-bordered table-hover display">
                                                <thead>
                                                      <tr>
                                                            <td>#No</td>
                                                            <th>Date</th>
                                                            <th>Salesman</th>
                                                            <th>Compain Name</th>
                                                            <th>Description</th>
                                                            <th>Price</th>
                                                            <th>Number of Unit</th>
                                                            <th>Discount</th>
                                                            <th>Sub Total</th>
                                                            <th>Vat 5%</th>
                                                            <th>Total</th>
                                                            <th>Status</th>
                                                            <th>Update</th>
                                                            <th>Remove</th>
                                                      </tr>
                                                </thead>
                                                <tbody>
                                                      <?php  $i=1;
                                                      if(!empty($limited_detail)){
                                                            foreach ($limited_detail as $keyvalue) { 
                                                                  $sub_Total = getDiscount($keyvalue['amount'], $keyvalue['discount']);
                                                                  $_total = getVatPercent($sub_Total, $keyvalue['vat']);
                                                                  ?>
                                                                  <tr id="limited_row_<?php echo $keyvalue['limited_order_id'];?>">
                                                                        <td><?php echo $i;   ?></td>
                                                                        <td><?php echo date('m/d/yy',$keyvalue['date']);  ?></td>
                                                                        <td><?php echo $keyvalue['name']; ?></td>
                                                                        <td><?php echo $keyvalue['campain_name']; ?></td>
                                                                        <td><?php  echo $keyvalue['description'];  ?></td>
                                                                        <td><?php  echo $keyvalue['amount'];  ?></td>
                                                                        <td><?php  echo $keyvalue['no_unit'];  ?></td>
                                                                        <td><?php  echo $keyvalue['discount'];  ?></td>
                                                                        <td><?php  echo $sub_Total;  ?></td>
                                                                        <td><?php  echo $keyvalue['vat'];  ?></td>
                                                                        <td><?php  echo $_total;  ?></td>

                                                                        <?php if( strtolower($keyvalue['status']) == 'active'){?>
                                                                              <td><button class="btn btn-info" onclick="changeStatus(<?php echo $keyvalue['limited_order_id']; ?>);"><?php echo $keyvalue['status']; ?></button></td>             
                                                                        <?php }else{
                                                                              ?>
                                                                              <td><button class="btn btn-success" onclick="changeStatus(<?php echo $keyvalue['limited_order_id']; ?>);"><?php echo $keyvalue['status']; ?></button></td>  
                                                                        <?php }?>

                                                                        <td><button class="btn btn-success" onclick="getLimitedOrderData('<?php echo $keyvalue['limited_order_id'];?>','<?php echo $vandor_id;?>');" data-toggle="modal" data-target="#limited_update">update</button></td>
                                                                        <td><span class="text-danger" onclick="deleteLRow('<?php echo $keyvalue['limited_order_id']; ?>');"><i class="fa fa-close"></i></span></td>
                                                                  </tr>
                                                      <?php $i++; }  }?>
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

<!-- </div>
</div> -->

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

<!-- </div> -->
<!-- PAGINATION CONTROL -->

<!-- </div> -->
<!-- Button to Open the Modal -->


<!-- The Modal -->
<div class="modal" id="membership_add">
      <div class="modal-dialog">
            <div class="modal-content">
                  <!-- Modal Header -->
                  <div class="modal-header">
                        <h4 class="modal-title">Offer Membership Order</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body">
                        <form action="<?php echo base_url('backend/Login/saveMembershipOrder/').$vandor_id;?>" method="POST" id="MembershipAddForm">
                              <div class="row">
                                    <div class="col-6">
                                          <div class="form-group">
                                                <label for="">Start Date</label>
                                                <input type="date" name="start_date" class="form-control" placeholder="start_date">
                                          </div>
                                          <div class="form-group">
                                                <label for="">Expire Date</label>
                                                <input type="date" name="expire_date" class="form-control" placeholder="expire_date">
                                          </div>
                                          <div class="form-group">
                                                <label for="">Plan Type</label>
                                                <select class="form-control" name="plan_id">
                                                      <?php echo planType();?>
                                                </select>
                                          </div>
                                          <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" name="status">
                                                      <?php echo status();?>
                                                </select>
                                          </div>
                                    </div>
                                    <div class="col-6">
                                          <div class="form-group">
                                                <label for="">Price</label>
                                                <input type="text" name="amount" id="amount" class="form-control" placeholder="price">
                                          </div>
                                          <div class="form-group">
                                                <label for="">Discount</label>
                                                <input type="text" name="discount" id="discount" class="form-control" placeholder="discount">
                                          </div>
                                          <div class="form-group">
                                                <label for="">Subtotal</label>
                                                <input type="text" name="subtotal" id="subtotal" class="form-control" placeholder="Subtotal" readonly>
                                          </div>
                                          <div class="form-group">
                                                <label for="">Vat 5%</label>
                                                <input type="number" name="vat" id="vat" value="5" class="form-control" placeholder="Vat %" readonly>
                                          </div>
                                          <div class="form-group">
                                                <label for="">Total</label>
                                                <input type="text" name="total" id="total" class="form-control" placeholder="total" readonly>
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

<div class="modal" id="membership_update">
	<div class="modal-dialog">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Offer Membership Order Update</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<!-- Modal body -->
			<div class="modal-body" id="membershipOrderForm">
				<form action='<?php echo base_url(); ?>backend/Login/updateMembershipOrdre' method='POST' id="MembershipUpdateForm">
					<div class='row'><div class='col-6'>
						<div class='form-group'>
								<label for=''>Start Date</label>
								<input type='date' name='start_date' id='M_start_date' class='form-control' placeholder='Start date' value=''>
						</div>
						<div class='form-group'>
								<label for=''>Expire Date</label>
								<input type='date' name='expire_date' id='M_expire_date' class='form-control' placeholder='Expire date' value=''>
						</div>
						<div class='form-group'>
								<label for=''>Plan Type</label>
								<select class='form-control' name='plan_id' id='M_plan_id'>
									<?php echo planType(); ?>
								</select>
						</div>
						<div class='form-group'>
								<label>Status</label>
								<select class='form-control' name='status' id='M_status'>
									<?php echo status();?>
								</select>
						</div>
					</div>
					<div class='col-6'>
						<div class='form-group'>
								<label for=''>Price</label>
								<input type='text' id='M_amount' name='amount' class='form-control' value='' placeholder='Price'>
						</div>
						<div class='form-group'>
								<label for=''>Discount</label>
								<input type='text' id='M_discount' name='discount' class='form-control' value='' placeholder='Discount'>
						</div>
						<div class='form-group'>
								<label for=''>Subtotal</label>
								<input type='text' id='M_subtotal' name='subtotal' class='form-control' value='' placeholder='Subtotal' readonly>
						</div>
						<div class='form-group'>
								<label for=''>Vat 5%</label>
								<input type='number' id='M_vat' name='vat' class='form-control' value='<?php echo getVat(); ?>' placeholder='vat' readonly>
						</div>
						<div class='form-group'>
								<label for=''>Total</label>
								<input type='text' id='M_total' name='total' class='form-control' value='' placeholder='Total' readonly>
						</div>
					</div>
					<input type='hidden' name='membership_order_id' id='M_membership_order_id' value=''> 
					<input type='hidden' name='vendor_id' id='M_vendor_id' value='' >
					<div class='col-12'><button type='submit'  class='btn btn-dark float-right'>Update</button></div></div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal" id="classified_add">
      <div class="modal-dialog">
            <div class="modal-content">
                  <!-- Modal Header -->
                  <div class="modal-header">
                        <h4 class="modal-title">Classified Order</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body">
                        <form action="<?php echo base_url('backend/Login/saveClassifiedOrder/').$vandor_id;?>" method="POST" id="ClassifiedAddForm">
                              <div class="row">
                                    <div class="col-6">
                                          <div class="form-group">
                                                <label for="">Date</label>
                                                <input type="date" name="create_date" class="form-control" placeholder="Date">
                                          </div>
                                          <div class="form-group">
                                                <label for="">Campain name</label>
                                                <input type="text" name="campain_name" class="form-control" placeholder="Campain Name">
                                          </div>
                                          <div class="form-group">
                                                <label for="">Number of Unit</label>
                                                <input type="number" name="no_unit" class="form-control" placeholder="Number of unit">
                                          </div>
                                          <div class="form-group">
                                                <label for="">Description</label>
                                                <textarea class="form-control" cols="5" rows="5" name="description" placeholder="Description"></textarea>
                                          </div>
                                          <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" name="status">
                                                      <?php echo status();?>
                                                </select>
                                          </div>
                                    </div>
                                    <div class="col-6">
                                          <div class="form-group">
                                                <label for="">Price</label>
                                                <input type="text" name="amount" id="c_amount" class="form-control" placeholder="Price">
                                          </div>
                                          <div class="form-group">
                                                <label for="">Discount</label>
                                                <input type="text" name="discount" id="c_discount" class="form-control" placeholder="Discount">
                                          </div>
                                          <div class="form-group">
                                                <label for="">Subtotal</label>
                                                <input type="text" name="subtotal" id="c_subtotal" class="form-control" placeholder="Subtotal" readonly>
                                          </div>
                                          <div class="form-group">
                                                <label for="">Vat 5%</label>
                                                <input type="number" name="vat" id="c_vat" value="5" class="form-control" placeholder="Vat" readonly>
                                          </div>
                                          <div class="form-group">
                                                <label for="">Total</label>
                                                <input type="text" name="total" id="c_total" class="form-control" placeholder="total" readonly>
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

<div class="modal" id="classified_update">
	<div class="modal-dialog">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Classified Order Update</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<!-- Modal body -->
			<div class="modal-body" id="classifiedOrderForm">
				<form action='<?php echo base_url(); ?>backend/Login/updateClassifiedOrdre' method='POST' id="ClassifiedUpdateForm">
					<div class='row'>
						<div class='col-6'>
								<div class='form-group'>
									<label for=''>Date</label>
									<input type='date' name='create_date' id='C_create_date' class='form-control' value=''>
								</div>
								<div class='form-group'>
									<label for=''>Campain name</label>
									<input type='text' name='campain_name' id='C_campain_name' class='form-control' placeholder='Campain Name' value=''>
								</div>
								<div class='form-group'>
									<label for=''>Number of Unit</label>
									<input type='number' name='no_unit' id='C_no_unit' class='form-control' placeholder='Number of unit' value=''>
								</div>
								<div class='form-group'>
									<label for=''>Description</label>
									<textarea class='form-control' cols='5' rows='5' name='description' id='C_description' placeholder='Description'></textarea>
								</div>
								<div class='form-group'>
									<label>Status</label>
									<select class='form-control' name='status' id='C_status'>
										<?php echo status(); ?>
									</select>
								</div>
						</div>
						<div class='col-6'>
								<div class='form-group'>
									<label for=''>Price</label>
									<input type='text' name='amount' id='cu_amount' class='form-control' value=''>
								</div>
								<div class='form-group'>
									<label for=''>Discount</label>
									<input type='text' name='discount' id='cu_discount' class='form-control' value=''>
								</div>
								<div class='form-group'>
									<label for=''>Subtotal</label>
									<input type='text' name='subtotal' id='cu_subtotal' class='form-control' value='' readonly>
								</div>
								<div class='form-group'>
									<label for=''>Vat 5%</label>
									<input type='number' name='vat' id='cu_vat' value="<?php echo getVat();?>" class='form-control' readonly>
								</div>
								<div class='form-group'>
									<label for=''>Total</label>
									<input type='text' name='total' id='cu_total' class='form-control' value='' readonly>
								</div>
						</div>
						<input type='hidden' value='' name='classified_order_id' id='classified_order_id' > 
						<input type='hidden' name='vendor_id' value='' id='C_vendor_id' >
						<div class='col-12'>
								<button type='submit'  class='btn btn-dark float-right'>Update</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal" id="limited_add">
      <div class="modal-dialog">
            <div class="modal-content">
                  <!-- Modal Header -->
                  <div class="modal-header">
                        <h4 class="modal-title">limited Order</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body">
                        <form action="<?php echo base_url('backend/Login/saveLimitedOrder/').$vandor_id;?>" method="POST" id="LimitedAddForm">
                              <div class="row">
                                    <div class="col-6">
                                          <div class="form-group">
                                                <label for="">Date</label>
                                                <input type="date" name="create_date" class="form-control" placeholder="Date">
                                          </div>
                                          <div class="form-group">
                                                <label for="">Campain name</label>
                                                <input type="text" name="campain_name" class="form-control" placeholder="Campain name">
                                          </div>
                                          <div class="form-group">
                                                <label for="">Number of unit</label>
                                                <input type="number" name="no_unit" class="form-control" placeholder="Number of unit">
                                          </div>
                                          <div class="form-group">
                                                <label for="">Description</label>
                                                <textarea  name="description" cols='5' rows='5' class="form-control" placeholder="Description"></textarea>
                                          </div>
                                          <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" name="status">
                                                      <?php echo status();?>
                                                </select>
                                          </div>
                                    </div>
                                    <div class="col-6">
                                          <div class="form-group">
                                                <label for="">Price</label>
                                                <input type="text" name="amount" id="l_amount" class="form-control" placeholder="Price">
                                          </div>
                                          <div class="form-group">
                                                <label for="">Discount</label>
                                                <input type="text" name="discount" id="l_discount" class="form-control" placeholder="Discount">
                                          </div>
                                          <div class="form-group">
                                                <label for="">Subtotal</label>
                                                <input type="text" name="subtotal" id="l_subtotal" class="form-control" placeholder="Subtotal" readonly>
                                          </div>
                                          <div class="form-group">
                                                <label for="">Vat 5%</label>
                                                <input type="number" name="vat" id="l_vat" value="<?php echo getVat(); ?>" class="form-control" placeholder="Vat" readonly>
                                          </div>
                                          <div class="form-group">
                                                <label for="">Total</label>
                                                <input type="text" name="total" id="l_total" class="form-control" placeholder="Total" readonly>
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

<div class="modal" id="limited_update">
	<div class="modal-dialog">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">limited Order Update</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<!-- Modal body -->
			<div class="modal-body" id="limitedOrderForm">
				<form action='<?php echo base_url(); ?>backend/Login/updateLimitedOrdre' method='POST' id="LimitedUpdateForm">
					<div class='row'>
							<div class='col-6'>
								<div class='form-group'>
										<label for=''>Date</label>
										<input type='date' name='create_date' id='L_create_date' class='form-control' value=''>
								</div>
								<div class='form-group'>
										<label for=''>Campain name</label>
										<input type='text' name='campain_name' id="L_campain_name" class='form-control' placeholder='Campain Name' value=''>
								</div>
								<div class='form-group'>
										<label for=''>Number of Unit</label>
										<input type='number' name='no_unit' id='L_no_unit' class='form-control' placeholder='Number of unit' value=''>
								</div>
								<div class='form-group'>
										<label for=''>Description</label>
										<textarea class='form-control' cols='5' rows='5' name='description' id='L_description' placeholder='Description'></textarea>
								</div>
								<div class='form-group'>
										<label>Status</label>
										<select class='form-control' name='status' id='L_status'>
											<?php echo status(); ?>
										</select>
								</div>
							</div>
							<div class='col-6'>
								<div class='form-group'>
										<label for=''>Price</label>
										<input type='text' name='amount' id='lu_amount' class='form-control' value=''>
								</div>
								<div class='form-group'>
										<label for=''>Discount</label>
										<input type='text' name='discount' id='lu_discount' class='form-control' value=''>
								</div>
								<div class='form-group'>
										<label for=''>Subtotal</label>
										<input type='text' name='subtotal' id='lu_subtotal' class='form-control' value='' readonly>
								</div>
								<div class='form-group'>
										<label for=''>Vat 5%</label>
										<input type='number' name='vat' id='lu_vat' class='form-control' value='<?php echo getVat();?>' readonly>
								</div>
								<div class='form-group'>
										<label for=''>Total</label>
										<input type='text' name='total' id='lu_total' class='form-control' value='' readonly>
								</div>
							</div>
							<input type='hidden' value='' name='limited_order_id' id='limited_order_id' > 
							<input type='hidden' name='vendor_id' id='L_vendor_id' value='' >
							<div class='col-12'>
								<button type='submit'  class='btn btn-dark float-right'>Update</button>
							</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script src="<?php //echo base_url('venders/js/scripts/jquery-ui.min.js')?>"></script>
<script>
	// script code for update membership order
	var getMembershipOrderData = function(orderId,vandorId){
		$.ajax({
				type:'POST',
				url:'<?php echo base_url(); ?>backend/Login/getMembershipOrderInfo',
				data :{orderId:orderId,vandorId:vandorId},
				success:function(data){
					var getInfo = JSON.parse(data);
					// console.log(getInfo.result);
					$("#M_start_date").val(getInfo.result.start_date);
					$("#M_expire_date").val(getInfo.result.expire_date);
					$("#M_plan_id").val(getInfo.result.plan_id);
					$("#M_status").val(getInfo.result.status);
					$("#M_amount").val(getInfo.result.amount);
					$("#M_discount").val(getInfo.result.discount);
					$("#M_subtotal").val(getInfo.result.subTotal);
					$("#M_vat").val(getInfo.result.vat);
					$("#M_total").val(getInfo.result.total);
					$("#M_membership_order_id").val(getInfo.result.membership_order_id);
					$("#M_vendor_id").val(getInfo.result.vendor_id);
				}
		});
	} 

	// script code for update classified order
	var getClassifiedOrderData = function(classifiedOrderId,vandorId){
		$.ajax({
			type:'POST',
			url:'<?php echo base_url(); ?>backend/Login/getClassifiedOrderInfo',
			data :{classifiedOrderId:classifiedOrderId,vandorId:vandorId},
			success:function(data){
				var getInfo = JSON.parse(data);
				// console.log(getInfo.result);
				$("#C_create_date").val(getInfo.result.date);
				$("#C_campain_name").val(getInfo.result.campain_name);
				$("#C_no_unit").val(getInfo.result.no_unit);
				$("#C_description").val(getInfo.result.description);
				$("#C_status").val(getInfo.result.status);
				$("#cu_amount").val(getInfo.result.amount);
				$("#cu_discount").val(getInfo.result.discount);
				$("#cu_subtotal").val(getInfo.result.subTotal);
				$("#cu_vat").val(getInfo.result.vat);
				$("#cu_total").val(getInfo.result.total);
				$("#classified_order_id").val(getInfo.result.classified_order_id);
				$("#C_vendor_id").val(getInfo.result.vendor_id); 
			}
		});
	} 

	// script code for update classified order
	var getLimitedOrderData = function(limitedOrderId,vandorId){
		$.ajax({
			type:'POST',
			url:'<?php echo base_url(); ?>backend/Login/getLimitedOrderInfo',
			data :{limitedOrderId:limitedOrderId,vandorId:vandorId},
			success:function(data){
				var getInfo = JSON.parse(data);
				// console.log(getInfo.result.limited_order_id);
				$("#L_create_date").val(getInfo.result.date);
				$("#L_campain_name").val(getInfo.result.campain_name);
				$("#L_no_unit").val(getInfo.result.no_unit);
				$("#L_description").val(getInfo.result.description);
				$("#L_status").val(getInfo.result.status);
				$("#lu_amount").val(getInfo.result.amount);
				$("#lu_discount").val(getInfo.result.discount);
				$("#lu_subtotal").val(getInfo.result.subTotal);
				$("#lu_vat").val(getInfo.result.vat);
				$("#lu_total").val(getInfo.result.total);
				$("#limited_order_id").val(getInfo.result.limited_order_id);
				$("#L_vendor_id").val(getInfo.result.vendor_id);
			}
		});
	}

	// script for change status of limited order
	var changeStatus = function(id){
		var get = confirm("Want to change status?");
		if(get){
				var url =  '<?php echo base_url(); ?>backend/Login/changeStatus';
				$.ajax({
					type : 'POST',
					url : url,
					data : {'id':id,tbl:'limited_orders'},
				})
				.done(function(result){
					location.reload(true);
				});
		}
	}
	// script for change status of classified order
	var classifiedChangeStatus = function(id){
		var get = confirm("Want to change status?");
		if(get){
				var url =  '<?php echo base_url(); ?>backend/Login/changeStatus';
				$.ajax({
					type : 'POST',
					url : url,
					data : {'id':id,tbl:'classified_orders'},
				})
				.done(function(result){
					location.reload(true);
				});
		}
	}
	// script for change status of membership order
	var membershipChangeStatus = function(id){
		var get = confirm("Want to change status?");
		if(get){
				var url =  '<?php echo base_url(); ?>backend/Login/changeStatus';
				$.ajax({
					type : 'POST',
					url : url,
					data : {'id':id,tbl:'offer_membership_orders'},
				})
				.done(function(result){
					location.reload(true);
				});
		}
	}

	// script for delete limited order
	var deleteLRow = function(id) {
		var result = confirm("Want to delete?");
		if (result) {
				//Logic to delete the item
				var url = '<?php echo base_url(); ?>backend/Login/delete_row';  
				$.ajax({
					type: "POST",
					url: url,
					data: {'id': id,tbl:'limited_orders'},
				})
				.done(function(result){
					var result = JSON.parse(result);
					if( parseInt(result.status) == 1 ) {
							$('#limited_row_'+id).hide();
					}
					var message = result.message;
					alert(message);''
				}); 
		}
	};

	// script for delete classified order
	var deleteCRow = function(id) {
		var result = confirm("Want to delete?");
		if (result) {
				//Logic to delete the item
				var url = '<?php echo base_url(); ?>backend/Login/delete_row';  
				$.ajax({
					type: "POST",
					url: url,
					data: {'id': id,tbl:'classified_orders'},
				})
				.done(function(result){
					var result = JSON.parse(result);
					if( parseInt(result.status) == 1 ) {
							$('#classified_row_'+id).hide();
					}
					var message = result.message;
					alert(message);''
				}); 
		}
	};

	// script for delete membership order
	var deleteMRow = function(id) {
		var result = confirm("Want to delete?");
		if (result) {
				//Logic to delete the item
				var url = '<?php echo base_url(); ?>backend/Login/delete_row';  
				$.ajax({
					type: "POST",
					url: url,
					data: {'id': id,tbl:'offer_membership_orders'},
				})
				.done(function(result){
					var result = JSON.parse(result);
					if( parseInt(result.status) == 1 ) {
							$('#membership_row_'+id).hide();
					}
					var message = result.message;
					alert(message);''
				}); 
		}
	};
</script>

<script>
	// script code for membership order add
	$('#discount').on('change', function (){
		var amount= $("#amount").val();
		var discount = $("#discount").val();
		if(amount != ""){
			//   var discountAmount = (amount * discount) / 100;
				var totalDiscount = amount - discount;
				$("#subtotal").val(totalDiscount);
		}
	});
	$("#discount").on('change', function(){
		var amount= $("#amount").val();
		var discount = $("#discount").val();
		var vat = $("#vat").val();
		if((amount != "") && (discount != "")){
			//   var discountAmount = (amount * discount) / 100;
				var subTotalDiscount = amount - discount;

				var vatAmount = (subTotalDiscount * vat) / 100;
				var totalAmount = subTotalDiscount + vatAmount;
				$("#total").val(totalAmount);
		}
	});
      $("#amount").on("change", function(){
            $("#discount").val('');
            $("#subtotal").val('');
            $("#total").val('');
      });
	// script code for membership order add   
	// script code for membership order update
	$('#M_discount').on('change', function (){
		var amount= $("#M_amount").val();
		var discount = $("#M_discount").val();
		if(amount != ""){
			//   var discountAmount = (amount * discount) / 100;
				var totalDiscount = amount - discount;
				$("#M_subtotal").val(totalDiscount);
		}
	});
	$("#M_discount").on('change', function(){
		var amount= $("#M_amount").val();
		var discount = $("#M_discount").val();
		var vat = $("#M_vat").val();
		if((amount != "") && (discount != "")){
			//   var discountAmount = (amount * discount) / 100;
				var subTotalDiscount = amount - discount;

				var vatAmount = (subTotalDiscount * vat) / 100;
				var totalAmount = subTotalDiscount + vatAmount;
				$("#M_total").val(totalAmount);
		}
	});
      $("#M_amount").on("change", function(){
            $("#M_discount").val('');
            $("#M_subtotal").val('');
            $("#M_total").val('');
      });
	// script code for membership order update      

	// script code for classified order add
	$('#c_discount').on('change', function (){
		var amount= $("#c_amount").val();
		var discount = $("#c_discount").val();
		if(amount != ""){
			//   var discountAmount = (amount * discount) / 100;
				var totalDiscount = amount - discount;
				$("#c_subtotal").val(totalDiscount);
		}
	});
	$("#c_discount").on('change', function(){
		var amount= $("#c_amount").val();
		var discount = $("#c_discount").val();
		var vat = $("#c_vat").val();
		if((amount != "") && (discount != "")){
			//   var discountAmount = (amount * discount) / 100;
				var subTotalDiscount = amount - discount;

				var vatAmount = (subTotalDiscount * vat) / 100;
				var totalAmount = subTotalDiscount + vatAmount;
				$("#c_total").val(totalAmount);
		}
	});
      $("#c_amount").on("change", function(){
            $("#c_discount").val('');
            $("#c_subtotal").val('');
            $("#c_total").val('');
      });
	// script code for classified order add
	// script code for classified order update
	$('#cu_discount').on('change', function (){
		var amount= $("#cu_amount").val();
		var discount = $("#cu_discount").val();
		if(amount != ""){
			//   var discountAmount = (amount * discount) / 100;
				var totalDiscount = amount - discount;
				$("#cu_subtotal").val(totalDiscount);
		}
	});
	$("#cu_discount").on('change', function(){
		var amount= $("#cu_amount").val();
		var discount = $("#cu_discount").val();
		var vat = $("#cu_vat").val();
		if((amount != "") && (discount != "")){
			//   var discountAmount = (amount * discount) / 100;
				var subTotalDiscount = amount - discount;

				var vatAmount = (subTotalDiscount * vat) / 100;
				var totalAmount = subTotalDiscount + vatAmount;
				$("#cu_total").val(totalAmount);
		}
	});
      $("#cu_amount").on("change", function(){
            $("#cu_discount").val('');
            $("#cu_subtotal").val('');
            $("#cu_total").val('');
      });
	// script code for classified order update

	// script code for limited order add
	$('#l_discount').on('change', function (){
		var amount= $("#l_amount").val();
		var discount = $("#l_discount").val();
		if(amount != ""){
			//   var discountAmount = (amount * discount) / 100;
				var totalDiscount = amount - discount;
				$("#l_subtotal").val(totalDiscount);
		}
	});
	$("#l_discount").on('change', function(){
		var amount= $("#l_amount").val();
		var discount = $("#l_discount").val();
		var vat = $("#l_vat").val();
		if((amount != "") && (discount != "")){
			//   var discountAmount = (amount * discount) / 100;
				var subTotalDiscount = amount - discount;

				var vatAmount = (subTotalDiscount * vat) / 100;
				var totalAmount = subTotalDiscount + vatAmount;
				$("#l_total").val(totalAmount);
		}
	});
      $("#l_amount").on("change", function(){
            $("#l_discount").val('');
            $("#l_subtotal").val('');
            $("#l_total").val('');
      });
	// script code for limited order add
	// script code for limited order update
	$('#lu_discount').on('change', function (){
		var amount= $("#lu_amount").val();
		var discount = $("#lu_discount").val();
		if(amount != ""){
			//   var discountAmount = (amount * discount) / 100;
				var totalDiscount = amount - discount;
				$("#lu_subtotal").val(totalDiscount);
		}
	});
	$("#lu_discount").on('change', function(){
		var amount= $("#lu_amount").val();
		var discount = $("#lu_discount").val();
		var vat = $("#lu_vat").val();
		if((amount != "") && (discount != "")){
			//   var discountAmount = (amount * discount) / 100;
				var subTotalDiscount = amount - discount;

				var vatAmount = (subTotalDiscount * vat) / 100;
				var totalAmount = subTotalDiscount + vatAmount;
				$("#lu_total").val(totalAmount);
		}
	});
      $("#lu_amount").on("change", function(){
            $("#lu_discount").val('');
            $("#lu_subtotal").val('');
            $("#lu_total").val('');
      });
	// script code for limited order update 
</script>

<script>
      $(document).ready(function() {
            var form = $('#LimitedUpdateForm');
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
                        create_date: {
                              required: true
                        },
                        campain_name:{
                              required : true
                        },
                        no_unit: {
                              required: true,
                              digits:true
                        },
                        description:{
                              required :true
                        },
                        status:{
                              required :true
                        },
                        amount:{
                              required :true,
                              number:true
                        },
                        discount:{
                              required :true,
                              number: true
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
                  }
            });
      });

      $(document).ready(function() {
            var form = $('#LimitedAddForm');
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
                        create_date: {
                              required: true
                        },
                        campain_name:{
                              required : true
                        },
                        no_unit: {
                              required: true,
                              digits:true
                        },
                        description:{
                              required :true
                        },
                        status:{
                              required :true
                        },
                        amount:{
                              required :true,
                              number:true
                        },
                        discount:{
                              required :true,
                              number: true
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
                  }
            });
      });

      $(document).ready(function() {
            var form = $('#ClassifiedUpdateForm');
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
                        create_date: {
                              required: true
                        },
                        campain_name:{
                              required : true,
                              email :true
                        },
                        no_unit: {
                              required: true,
                              digits:true
                        },
                        description:{
                              required :true
                        },
                        status:{
                              required :true
                        },
                        amount:{
                              required :true,
                              number:true
                        },
                        discount:{
                              required :true,
                              number:true
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
                  }
            });
      });

      $(document).ready(function() {
            var form = $('#ClassifiedAddForm');
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
                        create_date: {
                              required: true
                        },
                        campain_name:{
                              required : true,
                              email :true
                        },
                        no_unit: {
                              required: true,
                              digits:true
                        },
                        description:{
                              required :true
                        },
                        status:{
                              required :true
                        },
                        amount:{
                              required :true,
                              number:true
                        },
                        discount:{
                              required :true,
                              number:true
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
                  }
            });
      });

      $(document).ready(function() {
            var form = $('#MembershipUpdateForm');
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
                        start_date: {
                              required: true
                        },
                        expire_date:{
                              required : true
                        },
                        plan_id: {
                              required: true
                        },
                        status:{
                              required :true
                        },
                        amount:{
                              required :true,
                              number:true
                        },
                        discount:{
                              required :true,
                              number:true
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
                  }
            });
      });

      $(document).ready(function() {
            var form = $('#MembershipAddForm');
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
                        start_date: {
                              required: true
                        },
                        expire_date:{
                              required : true
                        },
                        plan_id: {
                              required: true
                        },
                        status:{
                              required :true
                        },
                        amount:{
                              required :true,
                              number:true
                        },
                        discount:{
                              required :true,
                              number:true
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