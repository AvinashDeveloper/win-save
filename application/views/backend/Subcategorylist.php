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
                    <h1>Sub Category</h1>
                    <ul>
                        <li><a href="href.html">Form</a></li>
                        <li>Sub category List</li>
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
                       
                      </div>
                      <div class="col-xl-6">
                        <div class="pull-right"> <a href="#sub-category-section" class="btn btn-dark pull-right send_category" data-toggle="modal"><i class="fa fa-plus"></i> Add Sub Category</a>
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
                       <th>Category Name</th>
                      <th>Sub Category En</th>
                      <th>Sub Category Ar</th>
                      <th>Image</th>
                      <th>Update</th>
                      <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  $i=1; foreach ($get_subcategory as $key) { ?>
                    <tr>
                      <td>
                        <?php echo $i; ?>
                      </td>
                      <td><?php  $data['get_category'] =$this->Modlogin->get_categorybyid($key->c_id);print_r($data['get_category'][0]['name']); ?></td>
                      <td>
                        <?php echo $key->name; ?></td>
                        <td>
                        <?php echo translateText($key->name); ?></td>
                      <td>
                        <img style="width: 10%;" src="<?php echo base_url(); ?>assets/images/categories/<?php echo $key->featured_image;  ?>" alt="prod img" class="img-fluid">
                      </td>
                      <td><a href="#subcategory-update" id="<?php echo $key->id;  ?>" class="btn btn-success pull-right get_subcategory send_category" data-toggle="modal"><i class="fa fa-plus"></i>Update</a>
                      </td>
                      <td><a href="" id="<?php echo $key->id;  ?>" class="btn btn-danger pull-right dlt_subcategory" data-toggle="modal"><i class="fa fa-plus"></i>Delete</a>
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
    
<!-- modal here -->
<!--sub category Modal -->
<div class="modal" id="sub-category-section">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Sub Category</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
          <div class="col-xl-12">
            <form enctype="multipart/form-data" id="subcate"  method="POST" >
              <div class="form-group">
                <label>Category Name</label>
                <select class="category_list form-control" name="c_id" id="c_id">
                  <option>Select Category</option>
                </select>
              </div>
              <div class="form-group">
                <label>Sub Category Name</label>
                <input type="text" name="name" id="name" class="form-control">
              </div>
              <div class="form-group">
                <label>Image</label>
                <input type="file" name="userfile" id="userfile" class="form-control">
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger subcategory_save">submit</button>
      </div>
    </div>
  </div>
</div>
<!-- subcategory Modal update-->
<div class="modal" id="subcategory-update">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update SubCategory</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
          <div class="col-xl-12">
            <form  id="subcateupdates"  method="POST" >
              <div class="form-group">
                <label>Category Name</label>
                <select class="form-control" name="cat_id" id="cat_id">
                  <option>Select Category</option>
                  <?php echo categoryType(); ?>
                </select>
              </div>
              <div class="form-group">
                <label>SubCategory Name</label>
                <input type="text" name="sub_name" id="sub_name" class="form-control">
              </div>
              <input type="hidden" name="sub_cat_id" id="sub_cat_id" value="" >
              <input type="hidden" name="featured_image_i" value="" id="featured_image_i">
              <div class="featured_image"></div>
              <div class="form-group">
                <label>Image</label>
                <input type="file" name="sub_userfile" id="sub_userfile" class="form-control">
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger" id="subcategory_update">submit</button>
      </div>
    </div>
  </div>
</div>
<!-- model end here -->
<script>
  $(document).ready(function(){  
            $('.send_category').click(function(){
                  
                 $.ajax({  
                      url:"<?php echo base_url(); ?>backend/Login/send_category",  
                      method:"post",  
                      
                      success:function(resonse){
                        $('.category_list').html(resonse);
                        }
                 });  
            });  
       });
</script>
<script>
$(document).ready(function(){  
  $('.subcategory_save').click(function(){
    var postData = new FormData($("#subcate")[0]);
    $.ajax({
      type:'POST',
      url:'<?php echo base_url(); ?>backend/Login/subcategory_save',
      processData: false,
      contentType: false,
      data : postData,
      success:function(data){
        alert('Category Save');
        setTimeout(function(){
        location.reload(true);
        }, 2000);       
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
                      url:"<?php echo base_url(); ?>backend/Login/get_subcategory",  
                      method:"post",  
                      data:{subcategory_id:subcategory_id},  
                      success:function(resonse){
                          var returnedData = JSON.parse(resonse);  
                           $('#sub_name').val(returnedData.name);
                           $('#cat_id').val(returnedData.c_id);
                           $('#featured_image_i').val(returnedData.featured_image);
                           $('.featured_image').html('<img style="width: 20%;" class="img-radius" src="<?php echo base_url(); ?>/assets/images/categories/' + returnedData.featured_image + '"" >');
                           
                             $('#sub_cat_id').val(returnedData.id);
  
                         }
                 });  
            });  
       });
</script>

<script>
$("#subcategory_update").click(function(e){
  // e.preventDefault();
  var postData = new FormData($("#subcateupdates")[0]);
  $.ajax({
    type: 'POST',
    url: '<?php echo base_url();?>backend/Login/subcategory_update',
    processData: false,
    cache: false,
    contentType: false,
    data : postData,
    success:function(response){
      alert('Successfully update');
      // var res = JSON.parse(response);
      // if(res.status == 1){
      //   $("#Usuccess").html(res.message).show();
        window.setTimeout(function(){location.reload()},3000);
      // } else {
      //   $("#Uwarning").html(res.message).show().fadeOut();
      // }
    }
  });
});
</script>
<script>
  $(document).ready(function(){  
            $('.dlt_subcategory').click(function(){
                 if (!confirm('Are you sure you want to delete this subcategory?')) return false;
                 var subcategory_id = $(this).attr("id");  
                 $.ajax({  
                      url:"<?php echo base_url(); ?>backend/Login/dlt_subcategory",  
                      method:"post",  
                      data:{subcategory_id:subcategory_id},  
                      success:function(resonse){
                          
                        setTimeout(function(){
                    location.reload(true);
                    
                  }, 1000);       
                         }
                 });  
            });  
       });
</script>