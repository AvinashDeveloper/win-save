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
                      <td><?php echo $key->name; ?></td>
                      <td><img style="width: 10%;" src="<?php echo base_url(); ?>assets/images/categories/<?php echo $key->featured_image;  ?>" alt="prod img" class="img-fluid"></td>
                      <td><a href="#category-update" id="<?php echo $key->id;  ?>" class="btn btn-success  get_category" data-toggle="modal"><i class="fa fa-plus"></i> Update</a></td>
                      <td><a href="" id="<?php echo $key->id;  ?>" class="btn btn-danger dlt_category" data-toggle="modal"><i class="fa fa-plus"></i> Delete</a></td>
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


<!-- Modal here -->
<!-- category Modal -->
<div class="modal" id="category-section">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Category</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
          <div class="col-xl-12">
            <form enctype="multipart/form-data" id="modal_form_id"  method="POST" >
              <div class="form-group">
                <label>Category Name</label>
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
        <button type="submit" class="btn btn-danger category_save">submit</button>
      </div>
    </div>
  </div>
</div>

<!-- category Modal update-->
<div class="modal" id="category-update">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Category</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
          <div class="col-xl-12">
            <form enctype="multipart/form-data" id="modal_form_id2"  method="POST" >
              <div class="form-group">
                <label>Category Name</label>
                <input type="text" name="name" id="name" class="form-control name">
              </div>
              <input type="hidden" name="id" value="" class="id">
              <input type="hidden" name="featured_image" value="" class="featured_image">
              <div class="featured_image"></div>
              <div class="form-group">
                <label>Image</label>
                <input type="file" name="userfile" id="userfile" class="form-control userfile">
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger category_update">submit</button>
      </div>
    </div>
  </div>
</div>

<!-- End modal here -->
<script>
  $(document).ready(function(){  
    $('.category_save').click(function(){
      var postData = new FormData($("#modal_form_id")[0]);
      var name =  $('#name').val();
      if(name == ""){
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
          $('.featured_image').html('<img style="width: 20%;" class="img-radius" src="<?php echo base_url(); ?>/assets/images/categories/' + returnedData.featured_image + '"" >');

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