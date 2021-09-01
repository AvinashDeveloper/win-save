<div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>Basic</h1>
                    <ul>
                        <li><a href="href.html">Form</a></li>
                        <li>Contact </li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>
          <div class="row">
            <!-- order-card start -->
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Contact us</h4>
                </div>
                <div class="card-body">
                  <form action="<?php echo base_url(); ?>aboutus" method="post" enctype="multipart/form-data">
                   
                    <div class="form-group">
                      <label for="">
                        <?php print_r($get_contactus[0][ 'detail']); ?>
                      </label>
                    </div>
                   
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  