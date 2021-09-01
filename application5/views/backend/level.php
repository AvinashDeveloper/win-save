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
                    <h1>Level</h1>
                    <ul>
                        <li><a href="href.html">Form</a></li>
                        <li>Level List</li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>

          <div class="row">

            <!-- order-card start -->

            <div class="col-sm-12">
     <form class="form-horizontal" id="submit">
              <div class="card">

                <div class="card-header">

             

                    <div class="row">

                      <div class="col-xl-6">

                        <h4 class="card-title">Level List</h4> 

                      </div>

                      <div class="col-xl-6">

                        <div class="pull-right"> <a href="#level-sections" class="btn btn-dark pull-right" data-toggle="modal"><i class="fa fa-plus"></i> Add Level</a>

                        </div>

                      </div>

                    </div>

                </div>

                <?php echo form_open_multipart( 'category_save');?>

                <div class="card-body">

                  <table class="table table-bordered table-hover" id="example">

                    <thead>

                    <tr class="text-uppercase">

                      <th>S.no</th>
                              <th>Level Name</th>
                              <th>Offer Title</th>
                              <th>Required Points</th>
                              <th>Delete</th>

                    </tr>

                    </thead>

                    <tbody>

                    <?php $i=1; foreach ($get_level as $key) { ?>

                    <tr>
                              <td>
                                <?php echo $i; ?>
                              </td>
                            
                              <td>
                                <?php echo $key->level_name; ?></td>
                              <td>
                                <?php echo $key->offer_title; ?></td>
                              <td>
                                <?php echo $key->req_points; ?></td>
                              
                            
                              <td><a href="" id="<?php echo $key->id;  ?>" class="btn btn-danger pull-right dlt_level" data-toggle="modal"><i class="fa fa-plus"></i>Delete</a>

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



<div class="modal" id="level-sections">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Level</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
             <div class="row">
               <div class="col-xl-12">
                
                <form enctype="multipart/form-data" id="level"  method="POST" >
                 
                   <div class="form-group">
                     <label>Level Name</label>
                     <input type="text" name="level_name" id="level_name">
                     
                   </div>
                    <div class="form-group">
                     <label>Offer Title</label>
                     <input type="text" name="offer_title" id="offer_title">
                   </div>
                    <div class="form-group">
                     <label>Required points</label>
                     <input type="number" name="req_points" id="req_points">
                   </div>

                 </form>
               </div>
             </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger level_save">submit</button>
      </div>

    </div>
  </div>
</div>
<script>
    $(document).ready(function(){  

              $('.level_save').click(function(){
                if($('#level_name').val()==""){
                  alert("Please Enter level name");
                  exit();
               }
               if($('#offer_title').val()==""){
                  alert("Please Enter offer title");
                  exit();
               }
               if($('#req_point').val()==""){
                  alert("Please Enter required point");
                  exit();
               }
                  var level_name = $("#level_name").val();  
                  var offer_title = $("#offer_title").val();
                  var req_points = $("#req_points").val();    
                  $.ajax({

                           type:'POST',

                           url:'<?php echo base_url(); ?>backend/Vender/level_save',

                            data: {level_name:level_name,offer_title:offer_title,req_point:req_points},

                           success:function(data){

                            alert('Level Saved');
                            $('#level-sections').modal('hide');

                             setTimeout(function(){

                    location.reload(true);

                    

                  }, 1000);  

                           }



                        });

              });  

         
         });
</script>
<script type="text/javascript">
  $(document).ready(function(){  

            $('.dlt_level').click(function(){

                 if (!confirm('Are you sure you want to delete this Level?')) return false;

                 var id = $(this).attr("id");  

                 $.ajax({  

                      url:"<?php echo base_url(); ?>backend/Vender/level_delete",  

                      method:"post",  

                      data:{id:id},  

                      success:function(resonse){

                          

                        setTimeout(function(){

                    location.reload(true);

                    

                  }, 1000);       

                         }

                 });  

            });  

       });
</script>