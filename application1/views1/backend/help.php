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
  <form class="form-horizontal" id="submit">
              <div class="card">

                <div class="card-header">

                

                    <div class="row">

                      <div class="col-xl-6">

                        <h4 class="card-title">All Question Answer</h4> 

                      </div>

                      <div class="col-xl-6">

                        <div class="pull-right"> <a href="#help-sections" class="btn btn-dark pull-right" data-toggle="modal"><i class="fa fa-plus"></i> Add New Q&A</a>

                        </div>

                      </div>

                    </div>

                </div>

                <?php //echo form_open_multipart( 'category_save');?>

                <div class="card-body">

                  <table class="table table-bordered table-hover" id="example">

                    <thead>

                    <tr class="text-uppercase ">

                      <th>S.no</th>
                              <th>Question</th>
                              <th>Answer</th>
                      </tr>

                    </thead>

                    <tbody>

                    <?php $i=1; foreach ($get_help as $key) { ?>

                    <tr>
                              <td>
                                <?php echo $i; ?>
                              </td>
                            
                              <td>
                                <?php echo $key->question; ?></td>
                             <td>
                                <?php echo $key->answer; ?></td>
                              <td><a href="" id="<?php echo $key->id;  ?>" class="btn btn-danger pull-right dlt_help" data-toggle="modal"><i class="fa fa-plus"></i>Delete</a>

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

 

<div class="modal" id="help-sections">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Q&A</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
             <div class="row">
               <div class="col-xl-12">
                
                <form enctype="multipart/form-data" id="level"  method="POST" >
                 
                   <div class="form-group">
                     <label>Question</label>
                     <input type="text" name="qus" id="qus" class="form-control">
                     
                   </div>
                   <div class="form-group">
                     <label>Answer</label>
                     <input type="text" name="ans" id="ans" class="form-control">
                     
                   </div>
                     <button type="submit" class="btn btn-danger help_save">submit</button>
                 </form>
               </div>
             </div>
      </div>

      <!-- Modal footer -->
     

    </div>
  </div>
</div>
<script>
    $(document).ready(function(){  

              $('.help_save').click(function(){
                if($('#qus').val()==""){
                  alert("Please Enter Question");
                  exit();
               }
               if($('#ans').val()==""){
                  alert("Please Enter Answer");
                  exit();
               }
               
                  var qus = $("#qus").val(); 
                  var ans = $("#ans").val();  
                   
                  $.ajax({

                           type:'POST',

                           url:'<?php echo base_url(); ?>backend/Vender/help_save',

                            data: {qus:qus,ans:ans},

                           success:function(data){

                            alert('Help Q&A added');
                            $('#help-sections').modal('hide');

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

            $('.dlt_help').click(function(){

                 if (!confirm('Are you sure you want to delete this?')) return false;

                 var id = $(this).attr("id");  

                 $.ajax({  

                      url:"<?php echo base_url(); ?>backend/Vender/help_delete",  

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