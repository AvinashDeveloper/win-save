<style>

    .fright {

    display: flex;

    flex-direction: row;

    width: 100%;

    justify-content: flex-end;

    margin: 5px 0px;

}

</style>

<div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>Inventory</h1>
                    <ul>
                        <li><a href="href.html">Form</a></li>
                        <li>Inventory List</li>
                    </ul>
                </div>
                    <div class="fright">

                                <form action="<?php echo base_url(); ?>inventory" method="POST">

                         <input  type="submit" class="btn btn-primary" name="submit" value="+ Create Inventory">

                      </form>

                          </div>
                <div class="separator-breadcrumb border-top"></div>

          <div class="row">

            <!-- order-card start -->

            <div class="col-sm-12">

           

              <div class="card tabs-card">

                <div class="card-block p-0">

                  <!-- Tab panes -->

                  <div class="card">

                    <div class="card-body" id="home3" role="tabpanel">

                     

                     

                      <div class="table-responsive">

                      

                         

                        <table class="table table-hover" id="example">

                          <thead>

                            <tr class="text-uppercase">

                              <th>S.no</th>

                              <th>Shop Name</th>

                              <th>Gift Name</th>

                              <th>Image</th>

                              <th>Required points</th>

                              <th>Payment(SAR)</th>

                              <th>Stock</th>

                              <th>Used</th>

                              <th>Generated Code</th>

                              <th>Random Number</th>

                              <th>Time Limit</th>

                              <th>Update</th>

                              <th>Delete</th>

                            </tr>

                          </thead>

                          <tbody>

                            <?php  $i=1;foreach ($list as $key) {?>

                            <tr>

                              <td>

                                <?php echo $i; ?>

                              </td>

                              

                              <td>  <?php
                              $data['vender_profile'] =$this->Modlogin->vender_profile($key->shop_name);
                               print_r($data['vender_profile'][0]['name']); ?>

                                </td>

                              <td><?php echo $key->gift_name; ?>

                                </td>

                                <td><img style="width: 100%;" src="<?php echo base_url(); ?>assets/images/vendors/ven_offer/<?php  print_r($key->img);  ?>"></td>

                                <td>

                                <?php echo $key->req_points; ?></td>

                              <td>

                                <?php 
                                $d = $this->ModVender->get_points();
                                print_r($key->req_points/$d[0]['points']);
                                  ?></td>

                              <td>

                                <?php echo $key->stock; ?></td>

                              <td><?php echo $key->used; ?>

                                </td>

                            

                              <td><?php echo $key->generated_code; ?></td>

                              <td><?php echo $key->random_number; ?></td>

                              <td><?php echo $key->time_limit; ?></td>

                              <td><a class="btn btn-success" href="<?php echo base_url(); ?>inventory_update/<?php echo $key->id; ?>">Update</a></td>

                              <td><a class="btn btn-danger" onclick="return confirm('Are you sure?');" href="<?php echo base_url(); ?>inventory_delete/<?php echo $key->id; ?>">Delete</a></td>

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

 



</script>