<style>
  .imagePreview {
    width: 100%;
    height: 180px;
    background-position: center center;
  background:url(http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg);
  background-color:#fff;
    background-size: cover;
  background-repeat:no-repeat;
    display: inline-block;
  box-shadow:0px -3px 6px 2px rgba(0,0,0,0.2);
}
.btn-primary
{
  display:block;
  border-radius:0px;
  box-shadow:0px 4px 6px 2px rgba(0,0,0,0.2);
  margin-top:-5px;
}
.imgUp
{
  margin-bottom:15px;
}
.del,.delete
{
  position:absolute;
  top:0px;
  right:15px;
  width:30px;
  height:30px;
  text-align:center;
  line-height:30px;
  background-color:rgba(255,255,255,0.6);
  cursor:pointer;
}
.imgAdd
{
  width:30px;
  height:30px;
  border-radius:50%;
  background-color:#4bd7ef;
  color:#fff;
  box-shadow:0px 0px 2px 1px rgba(0,0,0,0.2);
  text-align:center;
  line-height:30px;
  margin-top:0px;
  cursor:pointer;
  font-size:15px;
}
</style>


<div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>Image Slider</h1>
                    <ul>
                        <li><a href="href.html">Form</a></li>
                        <li>Slide's</li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>
<div class="pcoded-content">
   <?php if( $error = $this->session->flashdata('ads_save')): ?>
        <div class="form-group">
              <div class="input-icon">
        <div class="alert alert-dismissible alert-success" id="successMessage">
          <?php echo $error; ?>
        </div>
      </div>
    </div>
  <?php endif; ?>
  
  <div class="pcoded-inner-content bg-default">
    <div class="main-body">
      <div class="page-wrapper">
        <div class="page-body">
  <div class="row">
    <?php foreach ($slider_ads as $key) { ?>
            <!-- order-card start -->
            <div class="col-sm-4 slide_sec">
              <div class="card">
                <div class="card-header">
                    <h4 class="card-title text-dark">
                        Current Image Slide
                    </h4>
                </div>
                <div class="card-body">
                  <div class="imgUp">
                  
                      <img style="width: 100%;" src="<?php echo base_url();  ?>./assets/images/slider/<?php echo $key->slider_name; ?>">
                    
                   
                  </div>
                </div>
              </div><a href="#" class="delete" id="<?php echo $key->id; ?>"><i class="fa fa-close fa-1x"></i></a>
            </div>
          <?php } ?>
</div>
</div>
</div>
</div>
          </div>
          <hr>
  <div class="pcoded-inner-content">
    <div class="main-body">
      <div class="page-wrapper">
        <div class="page-body">
          <?php  echo form_open_multipart('save-ads')?>
          <div class="row">
            <!-- order-card start -->
            <div class="col-sm-4 slide_sec">
              <div class="card">
                 <div class="card-header">
                    <h4 class="card-title">
                        New Image Slide
                    </h4>
                </div>
                <div class="card-body">
                  <div class="imgUp">
                    <div class="imagePreview"></div>
                    <label class="btn btn-primary">Upload
                      <input type="file" name="files[]" multiple/ class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                    </label> <span><i class="fa fa-plus imgAdd"></i></span>
                  </div>
                </div>
              </div><a href="#" class="del"><i class="fa fa-close fa-1x"></i></a>
            </div>

          </div>
        </div>
      </div>
       <input type="submit" name="submit" value="save" class="btn btn-success">
    </div>
  </div>

</div>
</div>
</div>
<script type="text/javascript">
  $(".imgAdd").click(function(){
  $(this).closest(".row").find('.slide_sec').before('<div class="col-sm-4"><div class="card"><div class="card-header counter_no"> Slide 1 </div><div class="card-body"><div class="imgUp"> <div class="imagePreview"></div><label class="btn btn-primary">Upload<input type="file" name="files[]" multiple/ class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;"></label></div></div></div></div>');

});
$(document).on("click", ".del" , function() {
  $(this).parent().remove();
});
$(function() {
    $(document).on("change",".uploadFile", function()
    {
        var uploadFile = $(this);
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
 
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
 
            reader.onloadend = function(){ // set image data as background of div
                //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url("+this.result+")");
            }
        }
       
    });
});
</script>
<script>
  $(document).ready(function(){  
          $('.delete').click(function(){
            if (!confirm("Do you want to delete")){
      return false;
    }
    var user_id = $(this).attr("id"); 
               
               $.ajax({  
                    url:"<?php echo base_url(); ?>backend/Login/delete_ads",  
                    method:"post",  
                    data:{user_id:user_id},  
                    success:function(resonse){
                        location.reload();
                       }
               });  
          });  
     });
</script>