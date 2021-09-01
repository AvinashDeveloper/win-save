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
        <li>Monthly Summary</li>
      </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <div id="accordion">
      <div class="card">
        <div class="card-header">
          <a class="collapsed card-link" data-toggle="collapse" href="#collapse1">
            1. Monthly Summary
          </a>
        </div>
        <div id="collapse1" class="collapse" data-parent="#accordion">
          <div class="card-header">
            <div class="col-md-4">
              <form>
                <div class="row">
                  <div class="col-md-4">
                    <label>Pick Year</label>
                  </div>
                  <div class="col-md-8">
                    <select class="form-control">
                      <label>Year</label>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                      <option>2019</option>
                      <option>2020</option>
                    </select>
                  </div>
                </div> 
              </form>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped  display">
                <thead>
                  <tr>
                    <th>Month</th>
                    <th>User Subscription Value</th>
                    <th>vendor subscription Value</th>
                    <th>Classified sales</th>
                    <th>Limited Sales</th>
                    <th>Total sale</th>
                    <th>Value of inventory added</th>
                    <th>Redeemed gifts value</th>
                    <th>Gifts Remaining value</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Jan-2020</td>
                    <td>1000</td>
                    <td>50</td>
                    <td>20</td>
                    <td>20</td>
                    <td>1090</td>
                    <td>50</td>
                    <td>50</td>
                    <td>500</td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Total</th>
                    <th>6000</th>
                    <th>150</th>
                    <th>50</th>
                    <th>30</th>
                    <th>6230</th>
                    <th>150</th>
                    <th>1200</th>
                    <th>1200</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
      <br/>
      <div class="card">
        <div class="card-header">
          <a class="collapsed card-link" data-toggle="collapse" href="#collapse2">
            2. Users
          </a>
        </div>
        <div id="collapse2" class="collapse" data-parent="#accordion">
          <div class="col-md-4">
            <form>
              <div class="row">
                <div class="col-md-4">
                  <label>Pick Year</label>
                </div>
                <div class="col-md-8">
                  <select class="form-control">
                    <label>Year</label>
                    <option>2016</option>
                    <option>2017</option>
                    <option>2018</option>
                    <option>2019</option>
                    <option>2020</option>
                  </select>
                </div>
              </div> 
            </form>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped  display">
                <thead>
                  <tr>
                    <th>Month</th>
                    <th>Download App</th>
                    <th>Free Users</th>
                    <th>Expired users</th>
                    <th>subscribed users</th>
                    <th>total subscription value</th>
                    <th>Total Number of offers redeemed</th>
                    <th>Total amount saved from offers</th>
                    <th>Total points redeemed</th>
                    <th>Number of gifts redeemed</th>
                    <th>total gift value redeemed</th>
                    <th>store paged view</th>
                    <th>Total shared links</th>
                    <th> Total store rated</th>
                    <th> Total comments submission</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; 
                    $T_freeUser =  0;
                    $T_ExpireUser = 0;
                    $T_SubscribeUser = 0;
                    $T_SubscribeUserValue = 0;
                    $T_offerRedeem = 0;
                    $T_offerRedeemValue = 0;
                    $T_pointRedeem = 0;
                    $T_giftRedeem = 0;
                    $T_giftValueRedeem = 0;
                    $T_StoreView = 0;
                    $T_LinkShare = 0;
                    $T_CommentStore = 0;
                    $T_RatedStore = 0;
                    $T_CommentStore =0;
                    if(!empty($users)){
                      foreach ($users as $value) {
                        $T_freeUser = $T_freeUser + $value['freeUser'];
                        $T_ExpireUser = $T_ExpireUser + $value['ExpireUser'];
                        $T_SubscribeUser = $T_SubscribeUser +$value['SubscribeUser'];
                        $T_SubscribeUserValue = $T_SubscribeUserValue + $value['SubscribeUserValue'];
                        $T_offerRedeem = $T_offerRedeem +$value['offerRedeem'];
                        $T_offerRedeemValue = $T_offerRedeemValue +$value['offerRedeemValue'];
                        $T_pointRedeem = $T_pointRedeem + $value['pointRedeem'];
                        $T_giftRedeem = $T_giftRedeem +$value['giftRedeem'];
                        $T_giftValueRedeem = $T_giftValueRedeem +$value['giftValueRedeem'];
                        $T_StoreView = $T_StoreView +$value['StoreView'];
                        $T_LinkShare = $T_LinkShare +$value['LinkShare'];
                        $T_RatedStore = $T_RatedStore + $value['RatedStore'];
                        $T_CommentStore = $T_CommentStore +$value['CommentStore'];
                  ?>
                  <tr>
                    <td><?php echo $value['month']; ?></td>
                    <td><?php //echo $value['']; ?></td>
                    <td><?php echo $value['freeUser']; ?></td>
                    <td><?php echo $value['ExpireUser']; ?></td>
                    <td><?php echo $value['SubscribeUser']; ?></td>
                    <td><?php echo $value['SubscribeUserValue']; ?></td>
                    <td><?php echo $value['offerRedeem']; ?></td>
                    <td><?php echo $value['offerRedeemValue']; ?></td>
                    <td><?php echo $value['pointRedeem']; ?></td>
                    <td><?php echo $value['giftRedeem']; ?></td>
                    <td><?php echo $value['giftRedeem']; ?></td>
                    <td><?php echo $value['giftValueRedeem']; ?></td>
                    <td><?php echo $value['StoreView']; ?></td>
                    <td><?php echo $value['LinkShare']; ?></td>
                    <td><?php echo $value['RatedStore']; ?></td>
                    <td><?php echo $value['CommentStore']; ?></td>
                  </tr>
                  <?php $i++; }} ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Total</th>
                    <th><?php //echo $T_freeUser; ?></th>
                    <th><?php echo $T_freeUser; ?></th>
                    <th><?php echo $T_ExpireUser; ?></th>
                    <th><?php echo $T_SubscribeUser; ?></th>
                    <th><?php echo $T_SubscribeUserValue; ?></th>
                    <th><?php echo $T_offerRedeem; ?></th>
                    <th><?php echo $T_offerRedeemValue; ?></th>
                    <th><?php echo $T_pointRedeem; ?></th>
                    <th><?php echo $T_giftRedeem; ?></th>
                    <th><?php echo $T_giftValueRedeem; ?></th>
                    <th><?php echo $T_StoreView; ?></th>
                    <th><?php echo $T_LinkShare; ?></th>
                    <th><?php echo $T_RatedStore; ?></th>
                    <th><?php echo $T_CommentStore; ?></th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
      <br/>
      <div class="card">
        <div class="card-header">
          <a class="collapsed card-link" data-toggle="collapse" href="#collapse3">
            3. Vendor Offers
          </a>
        </div>
        <div id="collapse3" class="collapse" data-parent="#accordion">
          <div class="col-md-4">
            <form>
              <div class="row">
                <div class="col-md-4">
                  <label>Pick Year</label>
                </div>
                <div class="col-md-8">
                  <select class="form-control">
                    <label>Year</label>
                    <option>2016</option>
                    <option>2017</option>
                    <option>2018</option>
                    <option>2019</option>
                    <option>2020</option>
                  </select>
                </div>
              </div> 
            </form>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped  display">
                <thead>
                  <tr>
                    <th>Month</th>
                    <th>Free Vendors</th>
                    <th>Expired venders</th>
                    <th>subscribed vendors</th>
                    <th>Total subscription spent</th>
                    <th>Store view</th>
                    <th>No of Rated</th>
                    <th>No of Comments</th>
                    <th>store share</th>
                    <th> offer redeemed</th>
                    <th> Total Saving</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; 
                    $T_freeVendor = 0;
                    $T_ExpireVendor = 0;
                    $T_SubscribeVendor = 0;
                    $T_SubscribeValue = 0;
                    $T_storeView = 0;
                    $T_NoRated = 0;
                    $T_NoComment = 0;
                    $T_storeShare = 0;
                    $T_OfferRedeem = 0;
                    $T_OfferSaving = 0;

                    if(!empty($Offers)){
                      foreach ($Offers as $value) {
                        $T_freeVendor =  $T_freeVendor + $value['freeVendor'];
                        $T_ExpireVendor = $T_ExpireVendor + $value['ExpireVendor'];
                        $T_SubscribeVendor = $T_SubscribeVendor + $value['SubscribeVendor'];
                        $T_SubscribeValue = $T_SubscribeValue + $value['SubscribeValue'];
                        $T_storeView = $T_storeView + $value['storeView'];
                        $T_NoRated = $T_NoRated + $value['NoRated'];
                        $T_NoComment = $T_NoComment + $value['NoComment'];
                        $T_storeShare = $T_storeShare + $value['storeShare'];
                        $T_OfferRedeem = $T_OfferRedeem + $value['OfferRedeem'];
                        $T_OfferSaving = $T_OfferSaving + $value['OfferSaving'];
                  ?>
                  <tr>
                    <td><?php echo $value['month']; ?></td>
                    <td><?php echo $value['freeVendor']; ?></td>
                    <td><?php echo $value['ExpireVendor']; ?></td>
                    <td><?php echo $value['SubscribeVendor']; ?></td>
                    <td><?php echo $value['SubscribeValue']; ?></td>
                    <td><?php echo $value['storeView']; ?></td>
                    <td><?php echo $value['NoRated']; ?></td>
                    <td><?php echo $value['NoComment']; ?></td>
                    <td><?php echo $value['storeShare']; ?></td>
                    <td><?php echo $value['OfferRedeem']; ?></td>
                    <td><?php echo $value['OfferSaving']; ?></td>
                  </tr>
                  <?php $i++; }} ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Total</th>
                    <th><?php echo $T_freeVendor; ?></th>
                    <th><?php echo $T_ExpireVendor; ?></th>
                    <th><?php echo $T_SubscribeVendor; ?></th>
                    <th><?php echo $T_SubscribeValue; ?></th>
                    <th><?php echo $T_storeView; ?></th>
                    <th><?php echo $T_NoRated; ?></th>
                    <th><?php echo $T_NoComment; ?></th>
                    <th><?php echo $T_storeShare; ?></th>
                    <th><?php echo $T_OfferRedeem; ?></th>
                    <th><?php echo $T_OfferSaving; ?></th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
      <br/>
      <div class="card">
        <div class="card-header">
          <a class="collapsed card-link" data-toggle="collapse" href="#collapse4">
            4. Vendor Gift
          </a>
        </div>
        <div id="collapse4" class="collapse" data-parent="#accordion">
          <form>
            <div class="row">
              <div class="col-md-4">
                <label>Pick Year</label>
              </div>
              <div class="col-md-8">
                <select class="form-control">
                  <label>Year</label>
                  <option>2016</option>
                  <option>2017</option>
                  <option>2018</option>
                  <option>2019</option>
                  <option>2020</option>
                </select>
              </div>
            </div> 
          </form>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped  display">
                <thead>
                  <tr>
                    <th>Month</th>
                    <th>Added quantity of gifts</th>
                    <th>quantity of gifts redeemed</th>
                    <th>quantity of gifts remained</th>
                    <th>total valued gifts</th>
                    <th> value of redeemed gifts</th>
                    <th>Gifts Remaining value</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1;
                    $totalQuantity = 0;
                    $totalUsed = 0;
                    $totalReamin = 0;
                    $totalValue= 0;
                    $totalRedeemValue = 0;
                    $totalRemainValue = 0;
                    if(!empty($Gifts)){
                      foreach($Gifts as $value){
                        $totalQuantity = $totalQuantity + $value['quantityGift'];
                        $totalUsed = $totalUsed + $value['redeemGift'];
                        $totalReamin = $totalReamin + $value['remainGift'];
                        $totalValue= $totalValue + $value['valueGift'];
                        $totalRedeemValue = $totalRedeemValue + $value['redeemValue'];
                        $totalRemainValue = $totalRemainValue + $value['remainValue'];
                  ?>
                  <tr>
                    <td><?php echo $value['month']; ?></td>
                    <td><?php echo $value['quantityGift']; ?></td>
                    <td><?php echo $value['redeemGift']; ?></td>
                    <td><?php echo $value['remainGift']; ?></td>
                    <td><?php echo $value['valueGift']; ?></td>
                    <td><?php echo $value['redeemValue']; ?></td>
                    <td><?php echo $value['remainValue']; ?></td>
                  </tr>
                  <?php $i++; }} ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Total</th>
                    <th><?php echo $totalQuantity; ?></th>
                    <th><?php echo $totalUsed; ?></th>
                    <th><?php echo $totalReamin; ?></th>
                    <th><?php echo $totalValue; ?></th>
                    <th><?php echo $totalRedeemValue; ?></th>
                    <th><?php echo $totalRemainValue; ?></th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
      <br/>
      <div class="card">
        <div class="card-header">
          <a class="collapsed card-link" data-toggle="collapse" href="#collapse5">
            5. Vendor Classified
          </a>
        </div>
        <div id="collapse5" class="collapse" data-parent="#accordion">
          <form>
            <div class="row">
              <div class="col-md-4">
                <label>Pick Year</label>
              </div>
              <div class="col-md-8">
                <select class="form-control">
                  <label>Year</label>
                  <option>2016</option>
                  <option>2017</option>
                  <option>2018</option>
                  <option>2019</option>
                  <option>2020</option>
                </select>
              </div>
            </div> 
          </form>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped  display">
                <thead>
                  <tr>
                    <th>Month</th>
                    <th>Number of Classified added</th>
                    <th>Total number of unit</th>
                    <th>Total Classified spent</th>
                    <th>Number view</th>
                    <th> click link</th>
                    <th>number of share</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1;
                    $totalclassified = 0;
                    $totalUnit = 0;
                    $totalSpent = 0;
                    $totalShare = 0;
                    $totalLink = 0;
                    $totalView = 0;
                    if(!empty($classified)){
                      foreach ($classified as $value) {
                        $totalclassified = $totalclassified + $value['classifiedCount'];
                        $totalUnit = $totalUnit + $value['classifiedUnit'];
                        $totalSpent = $totalSpent + $value['classifiedSpent'];
                        $totalView = $totalView + $value['classifiedViews'];
                        $totalLink = $totalLink + $value['classifiedLink'];
                        $totalShare = $totalShare + $value['classifiedShare'];

                  ?>
                  <tr>
                    <td><?php echo $value['month']; ?></td>
                    <td><?php echo $value['classifiedCount'] ? $value['classifiedCount'] : 0; ?></td>
                    <td><?php echo $value['classifiedUnit'] ? $value['classifiedUnit'] : 0; ?></td>
                    <td><?php echo $value['classifiedSpent'] ? $value['classifiedSpent'] : 0; ?></td>
                    <td><?php echo $value['classifiedViews'] ? $value['classifiedViews'] : 0; ?></td>
                    <td><?php echo $value['classifiedLink'] ? $value['classifiedLink'] : 0; ?></td>
                    <td><?php echo $value['classifiedShare'] ? $value['classifiedShare'] : 0; ?></td>
                  </tr>
                  <?php $i++; } } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Total</th>
                    <th><?php echo $totalclassified; ?></th>
                    <th><?php echo $totalUnit; ?></th>
                    <th><?php echo $totalSpent; ?></th>
                    <th><?php echo $totalView; ?></th>
                    <th><?php echo $totalLink; ?></th>
                    <th><?php echo $totalShare; ?></th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
      <br/>
      <div class="card">
        <div class="card-header">
          <a class="collapsed card-link" data-toggle="collapse" href="#collapse6">
            6. Vendor Limited
          </a>
        </div>
        <div id="collapse6" class="collapse" data-parent="#accordion">
          <form>
            <div class="row">
              <div class="col-md-4">
                <label>Pick Year</label>
              </div>
              <div class="col-md-8">
                <select class="form-control">
                  <label>Year</label>
                  <option>2016</option>
                  <option>2017</option>
                  <option>2018</option>
                  <option>2019</option>
                  <option>2020</option>
                </select>
              </div>
            </div> 
          </form>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped  display">
                <thead>
                  <tr>
                    <th>Month</th>
                    <th>Number of limited added</th>
                    <th>Number view</th>
                    <th>Total Limited spent</th>
                    <th>number of share</th>
                    <th> Total number of unit</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; 
                    $totalLimited = 0;
                    $totalUnit = 0;
                    $totalSpent = 0;
                    $totalShare = 0;
                    $totalView = 0;
                    if(!empty($limited)){                      
                      foreach($limited as $value){
                        $totalUnit = $totalUnit + $value['limitedUnit'];
                        $totalSpent = $totalSpent + $value['limitedSpent'];
                        $totalShare = $totalShare + $value['limitedShare'];
                        $totalView = $totalView + $value['limitedViews'];
                        $totalLimited = $totalLimited+$value['limitedCount'];
                  ?>
                  <tr>
                    <td><?php echo $value['month']; ?></td>
                    <td><?php echo $value['limitedCount']; ?></td>
                    <td><?php echo $value['limitedViews'] ? $value['limitedViews'] : 0; ?></td>
                    <td><?php echo $value['limitedSpent'] ? $value['limitedSpent'] : 0; ?></td>
                    <td><?php echo $value['limitedShare'] ? $value['limitedShare'] : 0; ?></td>
                    <td><?php echo $value['limitedUnit'] ? $value['limitedUnit'] : 0; ?></td>
                  </tr>
                  <?php $i++; }} ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Total</th>
                    <th><?php echo $totalLimited; ?></th>
                    <th><?php echo $totalView; ?></th>
                    <th><?php echo $totalSpent; ?></th>
                    <th><?php echo $totalShare; ?></th>
                    <th><?php echo $totalUnit; ?></th>
                  </tr>
                </tfoot>
              </table>
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
<div class="modal" id="update_contacts">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Manager</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <form action="">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Mobile No.</label>
                <input type="number" name="mobile" class="form-control">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="">Password</label>
                <input type="Password" name="Password" class="form-control" value="Password">
              </div>
              <div class="form-group">
                <label for="">Manager Roles</label>
                <select class="form-control">
                  <option>Roles 1</option>
                  <option>Roles 2</option>
                  <option>Roles 3</option>
                </select>
              </div>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-dark float-right">Update</button>
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
        <h4 class="modal-title">Add Manager</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <form action="">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Mobile No.</label>
                <input type="number" name="mobile" class="form-control">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="">Password</label>
                <input type="Password" name="Password" class="form-control" value="Password">
              </div>
              <div class="form-group">
                <label for="">Manager Roles</label>
                <select class="form-control">
                  <option>Roles 1</option>
                  <option>Roles 2</option>
                  <option>Roles 3</option>
                </select>
              </div>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-dark float-right">Update</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('backend/Footer');?>

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

  $('.display').dataTable( {
    "ordering": false
  } );
</script>