<div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>Membership</h1>
                    <ul>
                        <li><a href="href.html">Form</a></li>
                        <li>User Membership Plan List</li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>
          <div class="row">
            <!-- order-card start -->
            <div class="col-sm-12">
              <h4 class="page-title"></h4>
              <div class="card tabs-card">
                <div class="card-block p-0">
                  <!-- Tab panes -->
                  <div class="tab-content card-block">
                    <div class="tab-pane active" id="home3" role="tabpanel">
                      <div class="table-responsive">
                        <table class="table table-hover" id="example">
                          <thead>
                            <tr class="text-uppercase">
                              <th>S.no</th>
                              <th>Plan name</th>
                              <th>Plan detail</th>
                              <th>Amount</th>
                              <th>No of days</th>
                              <th>Update</th>
                            
                             

                            </tr>
                          </thead>
                          <tbody>
                            <?php $i=1;foreach ($get_user_plan as $key) {?>
                            <tr>
                              <td>
                                <?php echo $i; ?>
                              </td>
                              <td>
                                <?php echo $key->plan_name; ?>
                              </td>
                              
                                <td><?php echo $key->plan_detail; ?></td>
                              <td>
                                <?php echo $key->subscription_amount; ?></td>
                              <td>
                                <?php echo $key->no_of_days; ?></td>
                                <td><a class="btn btn-success" href="<?php echo base_url();  ?>User-membership-update">Update Membership</a></td>
                            
                             
                            </tr>
                            <?php $i++;} ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- tabs card end -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
