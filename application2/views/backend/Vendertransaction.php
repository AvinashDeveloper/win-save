
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
              <h4 class="page-title">Vender Transaction List</h4>
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
                              <th>User name</th>
                              <th>Plan</th>
                              <th>Amount</th>
                              <th>Payment Status</th>
                              <th>Start date</th>
                              <th>Expiry date</th>
                             

                            </tr>
                          </thead>
                          <tbody>
                            <?php $i=1;foreach ($get_vender_membership as $key) {?>
                            <tr>
                              <td>
                                <?php echo $i; ?>
                              </td>
                              <td>
                                <?php 
                                $data['user_view'] =$this->Modlogin->user_view($key->user_id);
                                print_r($data['user_view'][0]['name']);

                                ?>
                              </td>
                              <td>
                                <?php
                                $data['get_userplan'] =$this->Modlogin->get_userplan($key->plan_id);
                                print_r($data['get_userplan'][0]['plan_name']);
                                 ?></td>
                              <td>
                                <?php echo $key->amount; ?></td>
                              <td>
                                <?php echo $key->payment_sts; ?></td>
                             
                             <td>
                                <?php echo date( "d/M/Y", strtotime($key->add_date) ); ?></td>
                              <td>
                                <?php echo date( "d/M/Y", strtotime($key->exp_date) ); ?></td>
                             
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

