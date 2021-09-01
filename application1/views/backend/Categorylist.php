<style>
div#example_wrapper > .row:first-child {
    position: absolute;
    top: 73px!important;
    display: flex;
    width: 95%!important;
    flex-direction: row;
    margin:  -2px;
}
</style>


 <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>Category</h1>
                    <ul>
                    
                        <li>Category List</li>
                    </ul>
                </div>
                 <div class="pull-right"> <a href="#category-section" class="btn btn-dark" data-toggle="modal"><i class="fa fa-plus"></i> Add Category</a>
                        </div>
                <div class="separator-breadcrumb border-top"></div>
          <div class="row">
            <!-- order-card start -->
            <div class="col-sm-12">
               <form class="form-horizontal" id="submit">
              <div class="card">
             
                <?php echo form_open_multipart( 'category_save');?>
                <div class="card-body">
                  <table class="table table-bordered table-hover" id="example">
                    <thead>
                    <tr class="text-uppercase">
                      <th>#id</th>
                      <th>Category Name</th>
                      <th>Image</th>
                      <th>Update</th>
                      <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach ($get_category as $key) { ?>
                    <tr>
                      <td>
                        <?php echo $i; ?>
                      </td>
                      <td>
                        <?php echo $key->name; ?></td>
                      <td>
                        <img style="width: 10%;" src="<?php echo base_url(); ?>assets/images/categories/<?php echo $key->featured_image;  ?>" alt="prod img" class="img-fluid">
                      </td>
                      <td><a href="#category-update" id="<?php echo $key->id;  ?>" class="btn btn-success  get_category" data-toggle="modal"><i class="fa fa-plus"></i> Update</a>
                      </td>
                      <td><a href="" id="<?php echo $key->id;  ?>" class="btn btn-danger dlt_category" data-toggle="modal"><i class="fa fa-plus"></i> Delete</a>
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
   
<script>
  $(document).ready(function(){  
              $('.category_save').click(function(){
                  var postData = new FormData($("#modal_form_id")[0]);
                  if($('#name').val()==""){
                    alert("Please Enter Text");
                    exit();
                 }
                 if($('#userfile').val()==""){
                    alert("Please Enter Title");
                    exit();
                 }
                  
                   $.ajax({
                                   type:'POST',
                                   url:'<?php echo base_url(); ?>backend/Login/category_save',
                                   processData: false,
                                   contentType: false,
                                   data : postData,
                                   success:function(data){
                                    alert('Category Save');
                                    setTimeout(function(){
                    location.reload(true);
                    
                  }, 3000);       
                                   }
  
                                });
              });  
         });
</script>
<script>
  $(document).ready(function(){  
            $('.get_category').click(function(){
                
                 var category_id = $(this).attr("id");  
                 $.ajax({  
                      url:"<?php echo base_url(); ?>backend/Login/get_category",  
                      method:"post",  
                      data:{category_id:category_id},  
                      success:function(resonse){
                          var returnedData = JSON.parse(resonse);  
                           $('.name').val(returnedData.name);
                           $('.featured_image').val(returnedData.featured_image);
                           $('.featured_image').html('<img style="width: 20%;" class="img-radius" src="<?php echo base_url(); ?>/assets/images/vendors/store_img/' + returnedData.featured_image + '"" >');
                            
                             $('.id').val(returnedData.id);
  
                         }
                 });  
            });  
       });
</script>
<script>
  $(document).ready(function(){  
              $('.category_update').click(function(){
                  var postData = new FormData($("#modal_form_id2")[0]);
                  if($('.name').val()==""){
                    alert("Please Enter name");
                    exit();
                 }
                
                  
                   $.ajax({
                                   type:'POST',
                                   url:'<?php echo base_url(); ?>backend/Login/category_update',
                                   processData: false,
                                   contentType: false,
                                   data : postData,
                                   success:function(data){
                                    alert('Category Update');
                                    setTimeout(function(){
                    location.reload(true);
                    
                  }, 1000);       
                                   }
  
                                });
              });  
         });
</script>
<script>
  $(document).ready(function(){  
            $('.dlt_category').click(function(){
                 if (!confirm('Are you sure you want to delete this category?')) return false;
                 var category_id = $(this).attr("id");  
                 $.ajax({  
                      url:"<?php echo base_url(); ?>backend/Login/dlt_category",  
                      method:"post",  
                      data:{category_id:category_id},  
                      success:function(resonse){
                          
                        setTimeout(function(){
                    location.reload(true);
                    
                  }, 1000);       
                         }
                 });  
            });  
       });
</script>