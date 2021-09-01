    <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>Basic</h1>
                    <ul>
                        <li><a href="href.html">Form</a></li>
                        <li>My Redeem List</li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>
          <div class="row">
            <!-- order-card start -->
            <div class="col-sm-12">
    
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
                              <th>Offer Title</th>
                              <th>Offer Name</th>
                              <th>Offer Detail</th>
                              <th>Offer Image</th>
                              <th>Valid date</th>
                              <th>User Limit</th>
                              <th>Stock</th>
                              <th>Used</th>
                              <th>Offer amount</th>
                              <th>Point</th>

                            </tr>
                          </thead>
                          <tbody>
                            <?php $i=1;foreach ($my_redeem as $key) {?>
                            <tr>
                              <td>
                                <?php echo $i; ?>
                              </td>
                              <td>
                               <?php echo $key->offer_title; ?></td>
                              <td>
                                <?php echo $key->offer_name; ?></td>
                              <td>
                                <?php echo $key->offer_detail; ?></td>
                              <td>
                                <?php echo $key->offer_img; ?></td>
                              <td>
                                <?php echo date( "d/M/Y", strtotime($key->valid_date) ); ?></td>
                              <td>
                                <?php echo $key->limit_per_user; ?></td>
                              <td><?php echo $key->stoke; ?>
                                </td>
                              <td><?php echo $key->used; ?>
                               </td>
                              <td><?php echo $key->offer_amount; ?>
                              </td>
                              <td><?php echo $key->point; ?></td>
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
   
