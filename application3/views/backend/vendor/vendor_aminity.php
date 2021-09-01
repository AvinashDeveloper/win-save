<style>

div#example_wrapper > .row:first-child {

    position: absolute;

    top: 73px!important;

    display: flex;

    width: 95%!important;

    flex-direction: row;

    margin: -2px;

}

</style>

  <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>Aminity</h1>
                    <ul>
                        <li><a href="href.html">&nbsp;</a></li>
                        <li>Aminity List</li>
                    </ul>
                </div>
             
                 
                <div class="separator-breadcrumb border-top"></div>

          <div class="row">

            <!-- order-card start -->

            <div class="col-sm-12">

              <div class="card">

                <div class="card-header">

                  <form class="form-horizontal" id="submit">

                    <div class="row">

                    

                      <div class="col-xl-6">

                        <div class="pull-right"> <a href="#aminity-sections" class="btn btn-dark pull-right get_amt" data-toggle="modal"><i class="fa fa-plus"></i> + Add Aminity</a>

                        </div>

                      </div>

                    </div>

                </div>

                <?php echo form_open_multipart( 'category_save');?>

                <div class="card-body">

                  <table class="table table-bordered table-hover" id="example">

                    <thead>

                    <tr class="text-uppercase">

                      <th>#id</th>

                      <th>Aminity Name</th>

                      <th>Image</th>

                      <th>Delete</th>

                    </tr>

                    </thead>

                    <tbody>

                    <?php $i=1; foreach ($get_aminity as $key) { ?>

                    <tr>

                      <td>

                        <?php echo $i; ?>

                      </td>

                      <td>

                        <?php echo $key->name; ?></td>

                      <td>

                        <img style="width: 10%;" src="<?php echo base_url(); ?>assets/images/categories/<?php echo $key->featured_image;  ?>" alt="prod img" class="img-fluid">

                      </td>
                      <td><a href="" id="<?php echo $key->id;  ?>" class="btn btn-danger pull-right dlt_aminity" data-toggle="modal"><i class="fa fa-plus"></i>Delete</a>

                      </td>

                    </tr>

                     

                    <?php $i++;} ?>

                    </tbody>

                  </table>

                </div>

              </div>

              </form>

            </div>

          </div>

          <!-- tabs card end -->

        </div>

      </div>

    </div>

  </div>

</div>
<!--Aminity Modal -->
<div class="modal" id="aminity-sections">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Aminity</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
             <div class="row">
               <div class="col-xl-12">
                
                <form enctype="multipart/form-data" id="aminity"  method="POST" >
                 
                   <div class="form-group">
                     <label>Aminity Name</label>
                     <div id="amt_names"></div>
                   </div>

                 </form>
               </div>
             </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger aminity_save">submit</button>
      </div>

    </div>
  </div>
</div>
<script>

  $(document).ready(function(){  

            $('.get_amt').click(function(){

                  

                 $.ajax({  

                      url:"<?php echo base_url(); ?>backend/Vendor/Vendors/get_all_aminity",  

                      method:"post",  

                      

                      success:function(resonse){
                        console.log(resonse);
                        $('#amt_names').html(resonse);

                        }

                 });  

            });  

       });

</script>

<script>

  $(document).ready(function(){  

              $('.aminity_save').click(function(){
                  var arr=[];
                  $("input:checkbox[name*=amt]:checked").each(function(){
                       arr.push($(this).val());
                  });
                  var p = $('input.amt').serializeArray();
                  var postData = $("input[name=amt]").val();
                  console.log(arr);
                  $.ajax({

                           type:'POST',

                           url:'<?php echo base_url(); ?>backend/Vendor/Vendors/aminity_save',

                            data: {option : arr},

                           success:function(data){

                            alert('Aminity Save');
                            $('#aminity-sections').modal('hide');

                             

                           }



                        });

              });  

         });

</script>

<script>

  $(document).ready(function(){  

            $('.get_subcategory').click(function(){

                

                 var subcategory_id = $(this).attr("id");  

                 $.ajax({  

                      url:"<?php echo base_url(); ?>backend/Login/get_aminity",  

                      method:"post",  

                      data:{subcategory_id:subcategory_id},  

                      success:function(resonse){

                          var returnedData = JSON.parse(resonse);  

                           $('.name').val(returnedData.name);

                           $('.featured_image').val(returnedData.featured_image);

                           $('.featured_image').html('<img style="width: 20%;" class="img-radius" src="<?php echo base_url(); ?>/assets/images/categories/' + returnedData.featured_image + '"" >');

                            

                             $('.id').val(returnedData.id);

  

                         }

                 });  

            });  

       });

</script>

<script>

  $(document).ready(function(){  

            $('.dlt_aminity').click(function(){

                 if (!confirm('Are you sure you want to delete this aminity?')) return false;

                 var aminity_id = $(this).attr("id");  

                 $.ajax({  

                      url:"<?php echo base_url(); ?>backend/Vendor/Vendors/delete_aminity",  

                      method:"post",  

                      data:{aminity_id:aminity_id},  

                      success:function(resonse){
                        // alert(resonse);
                          

                        setTimeout(function(){

                    location.reload(true);

                    

                  }, 1000);       

                 }

                 });  

            });  

       });

</script>