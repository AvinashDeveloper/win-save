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
                        <li>Rules</li>
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

                        <h4 class="card-title">All Rules</h4> 

                      </div>

                      <div class="col-xl-6">

                        <div class="pull-right"> <a href="#rule-sections" class="btn btn-dark pull-right" data-toggle="modal"><i class="fa fa-plus"></i> Add New Rule</a>

                        </div>

                      </div>

                    </div>

                </div>

                <?php //echo form_open_multipart( 'category_save');?>

                <div class="card-body">

                  <table class="table table-bordered table-hover" id="example">

                    <thead>

                    <tr class="text-uppercase bg-primary">

                      <th>S.no</th>
                              <th>Rule</th>
                              <th>Delete</th>
                      </tr>

                    </thead>

                    <tbody>

                    <?php $i=1; foreach ($get_rules as $key) { ?>

                    <tr>
                              <td>
                                <?php echo $i; ?>
                              </td>
                            
                              <td>
                                <?php echo $key->text; ?></td>
                             
                              <td><a href="" id="<?php echo $key->id;  ?>" class="btn btn-danger  dlt_rules" data-toggle="modal"><i class="fa fa-plus"></i>Delete</a>

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



<div class="modal" id="rule-sections">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Rule</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
             <div class="row">
               <div class="col-xl-12">
                
                <form enctype="multipart/form-data" id="level"  method="POST" >
                 
                   <div class="form-group">
                     <label>Rule</label>
                     <input type="text" name="rule_name" id="rule_name">
                     
                   </div>
                   
                 </form>
               </div>
             </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger rule_save">submit</button>
      </div>

    </div>
  </div>
</div>
<script>
    $(document).ready(function(){  

              $('.rule_save').click(function(){
                if($('#rule_name').val()==""){
                  alert("Please Enter data..");
                  exit();
               }
               
                  var rule_name = $("#rule_name").val();  
                   
                  $.ajax({

                           type:'POST',

                           url:'<?php echo base_url(); ?>backend/Vender/rule_save',

                            data: {rule_name:rule_name},

                           success:function(data){

                            alert('Rule added');
                            $('#rule-sections').modal('hide');

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

            $('.dlt_rules').click(function(){

                 if (!confirm('Are you sure you want to delete this rule?')) return false;

                 var id = $(this).attr("id");  

                 $.ajax({  

                      url:"<?php echo base_url(); ?>backend/Vender/rule_delete",  

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