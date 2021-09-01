
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
    width: 200px;
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
  div#example_wrapper > .row:first-child {
    top:70px!important;

  }
  @media screen {
    #printSection {
      display: none;
    }
  }

  @media print {
    body * {
      visibility:hidden;
    }
    #printSection, #printSection * {
      visibility:visible;
    }
    #printSection {
      position:absolute;
      left:0;
      top:0;
    }
  }
</style>
<?php $vendor_id = $this->uri->segment(4);?>
<!-- =============== Left side End ================-->
<div class="main-content-wrap sidenav-open d-flex flex-column">
  <!-- ============ Body content start ============= -->
  <div class="main-content">
    <div class="breadcrumb">
      <h1 class="mr-2">Manange</h1>
      <ul>
        <li><a href="#">Vendor</a></li>
        <li>Billing & Invoice</li>
      </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            Billing & Invoice
          </div>
          <div class="card-body">
            <div class="table-responsive" style="height: auto;">
              <table class="table" id="example">
                <thead>
                  <tr>
                    <td>Order No.</td>
                    <th>Date</th>
                    <th>Salesman</th>
                    <th>Product</th>
                    <th>Detail </th>
                    <th>Price</th>
                    <th>Number Of Unit</th>
                    <th>Discount</th>
                    <th>Sub Total</th>
                    <th>Vat 5%</th>
                    <th>Total</th>
                    <th>Preview & Print</th>
                  </tr>
                </thead>
                <tbody>
                    <?php 
                        $i = 1;
                        if(!empty($billing_details)){
                            foreach ($billing_details as $value) {
                                $subtotal = $value['amount'] - $value['discount'];
                                $total_vat = (($subtotal * $value['vat']) / 100);
                                $total = $subtotal + $total_vat;
                                $offer_detail = getCatgoryTypeString($value['plan_id']).'-'.date('m/d/yy',(int)$value['start_date']).'-'.date('m/d/yy',(int)$value['expire_date']);
                                $detail = $value['campain_name'] ? $value['campain_name'] : $offer_detail;
                    ?>
                    <tr>
                        <td><?php echo $value['order_id']; ?></td>
                        <td><?php echo date('m/d/yy',strtotime($value['create_date'])); ?></td>
                        <td><?php echo ucwords($value['salesman']); ?></td>
                        <td><?php echo $value['product']; ?></td>
                        <td><?php echo $detail; ?></td>
                        <td><?php echo $value['amount']; ?></td>
                        <td><?php echo $value['no_unit'] ? $value['no_unit'] : 0; ?></td>
                        <td><?php echo $value['discount']; ?></td>
                        <td><?php echo $subtotal; ?></td>
                        <td><?php echo $value['vat'].' %'; ?></td>
                        <td><?php echo $total; ?></td>
                        <td><button class="btn btn-dark" data-toggle="modal" data-target="#bill_p" onclick="setInvoice('<?php echo $value['row_id'];?>','<?php echo $vendor_id;?>');">Preview</button></td>
                    </tr>
                    <?php $i++; }} ?>
                <tbody>
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
    <img src="../../dist-assets/images/products/headphone-1.jpg" alt="">
  </div>

</div>
</div>

</div>
<!-- PAGINATION CONTROL -->
</div>

<!----------Invoice html------------>
<div id="printThis">
  <div id="bill_p" class="modal fade">
    <div class="modal-dialog modal-lg">
      <!-- Modal Content: begins -->
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" id="gridSystemModalLabel">Invoice</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <!-- Modal Body -->  
        <div class="modal-body" id="print_here">
          <div class="container" id="printableArea">
            <div class="row justify-content-center">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <h3 class="text-center font-weight-bold mb-1">Prem Prakhash</h3>
                    <p class="text-center font-weight-bold mb-0">GSTIN No.: 09AANFB4888NIZH</p>
                    <p class="text-center font-weight-bold"><small class="font-weight-bold">Phone No.: 0120-4571570/7042344100</small></p>
                    <div class="row pb-2 p-2">
                      <div class="col-md-6">
                        <p class="mb-0"><strong>Invoice Number</strong>: IN0010012804</p>
                        <p><strong>Name</strong>: <span id="name"></span></p>            
                      </div>
                      <div class="col-md-6 text-right">
                        <p class="mb-0"><strong>Invoice Date</strong>: 06-April-2020 20:30:34</p>
                        <p><strong>Phone</strong>: 9643208548</p>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-bordered mb-0">
                        <thead>
                          <tr>
                            <th class="text-uppercase small font-weight-bold">SR No.</th>
                            <th class="text-uppercase small font-weight-bold">Item</th>
                            <th class="text-uppercase small font-weight-bold">Qty</th>
                            <th class="text-uppercase small font-weight-bold">Unit Price</th>
                            <th class="text-uppercase small font-weight-bold">Desc</th>
                            <th class="text-uppercase small font-weight-bold">Tax %</th>
                            <th class="text-uppercase small font-weight-bold">Tax Amt.</th>
                            <th class="text-uppercase small font-weight-bold">Total</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td id="campion_name">10 Get item</td>
                            <td id="quantity">23</td>
                            <td id="amount">100.00</td>
                            <td id="discount">00</td>
                            <td id="vat">GST 9%</td>
                            <td id="subtotal">800</td>
                            <td id="total">1800</td>
                          </tr>
                        </tbody>
                        <tfoot class="font-weight-bold small">
                          <tr>
                            <td colspan="2">Total</td>
                            <td>1800</td>
                            <td> </td>
                            <td>0.00</td>
                            <td> </td>
                            <td>900</td>
                            <td>1000</td>
                          </tr>
                          <tr>
                            <td colspan="8">Amount in words: Rs One Thusend Five Hundrate only 
                              <span class="float-right">Balance:2000</span>
                            </td>
                          </tr>
                          <tr>
                            <td colspan="8">Card: 20000</td>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                    <!--table responsive end-->
                    <p class="">Thank you for choosing our service.We look forward to meet you again</p>
                    <p>Money once paid will not we refunded. However, it can be abjected towards any services</p>
                    <p class="font-weight-bold small mt-0">Other T &C Apply</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal Footer -->
        <div class="modal-footer">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
          <button id="btnPrint" type="button" class="btn btn-default">Print</button>
        </div>
      </div>
      <!-- Modal Content: ends -->
    </div>
  </div>
</div>
<!-- Button to Open the Modal -->
<?php include 'footer.php';?>
<script>
  var setInvoice = function(rowId,vendorId){
    $.ajax({
      type : 'POST',
      url : '<?php echo base_url(); ?>backend/Manage_vendors/getBillingInvoice',
      data : {rowId : rowId,vendorId : vendorId},
      success:function(data){
          var getInfo = JSON.parse(data);
          // console.log(Object.values(getInfo.result));
          if(getInfo.result[0].no_unit != 0){
            var qty_amt = getInfo.result[0].no_unit * getInfo.result[0].amount;
          } else{
            var qty_amt = getInfo.result[0].amount;
          }
          var dis_amt = (qty_amt  * getInfo.result[0].discount) / 100;
          var min_amt = getInfo.result[0].amount - dis_amt;
          var vat_amt = (min_amt * getInfo.result[0].vat) / 100;
          var total = min_amt + vat_amt;

          $("#name").val(getInfo.result[0].vendor_name);
          $("#campion_name").val(getInfo.result[0].campain_name);
          $("#amount").val(getInfo.result[0].amount);
          $("#vat").val(getInfo.result[0].vat+" %");
          $("#discount").val(getInfo.result[0].discount);
          $("#quantity").val(getInfo.result[0].no_unit);
          $("#subtotal").val(vat_amt);
          $("#total").val(total);
          
          
				}
    });
  }
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

  document.getElementById("btnPrint").onclick = function () {
    printElement(document.getElementById("print_here"));
  }

  function printElement(elem) {
    var domClone = elem.cloneNode(true);

    var $printSection = document.getElementById("printSection");

    if (!$printSection) {
      var $printSection = document.createElement("div");
      $printSection.id = "printSection";
      document.body.appendChild($printSection);
    }

    $printSection.innerHTML = "";
    $printSection.appendChild(domClone);
    window.print();
  }
</script>