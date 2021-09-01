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
.del
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
td
{
  white-space: normal;
}
div#example_wrapper > .row:first-child {
    position: absolute;
    top: 69px!important;
    display: flex;
    width: 99%!important;
    flex-direction: row;
}
</style>
<div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>News</h1>
                    <ul>
          
                        <li>Add News</li>
                    </ul>
                </div>
                <div class="pull-right"> <a href="#news-section" class="btn btn-dark pull-right" data-toggle="modal"><i class="fa fa-plus"></i> Add News</a>
                      </div>
                <div class="separator-breadcrumb border-top"></div>
          <div class="row">
            <!-- order-card start -->
            <div class="col-sm-12 slide_sec">
              <div class="card">
             
                <div class="card-body">
                  <table class="table table-bordered table-hover" id="example">
                    <thead>
                      <tr class="text-uppercase">
                        <th>S.no</th>
                        <th>Title En</th>
                        <th>Text En</th>
                        <th>Title Ar</th>
                        <th>Text Ar</th>
                        <th>Image</th>
                        <th>Update</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1;foreach ($get_news as $key) {?>
                      <tr>
                        <td> <?php echo $i; ?></td>
                        <td> <?php echo $key->title; ?></td>
                        <td> <?php echo $key->text; ?></td>
                        <td> <?php echo translateText($key->title); ?></td>
                        <td> <?php echo translateText($key->text); ?></td>
                        <td> <img style="height: 100px;width: 100%;object-fit: contain;object-position:left;" src="<?php echo base_url(); ?>assets/images/news/<?php  print_r($key->image);  ?>"></td>
                        <td><a href="#news-update" id="<?php echo $key->id; ?>" class="btn btn-dark pull-right get_news" data-toggle="modal">Update News</a></td>
                        <td><button type="button" id="<?php echo $key->id; ?>"  class="btn btn-danger dlt_news">Delete</button></td>
                      </tr>
                       <?php $i++;} ?>
                    </tbody>
                  </table>
                 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

<!-- Modal here -->
<!-- News update model -->
<div class="modal" id="news-update">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update News Section</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
          <div class="col-xl-12">
            <form enctype="multipart/form-data"  accept-charset="utf-8" name="formname1" id="formname1"  method="post" action="" >
              <div class="form-group news_update" style="display: none;" id="successMessage">
                <div class="alert alert-success">
                  <strong>News Update Successfully.</strong>
                </div>
              </div>
              <div class="form-group">
                <label>Title</label>
                <input type="text" id="title"  name="title" value="" class="form-control title">
              </div>
              <div class="form-group">
                <label>text</label>
                <textarea id="text" value="" name="text" class="form-control text"></textarea>
              </div>
              <div class="form-group">
                <label>Image</label>
                <input type="file" id="imag" name="imag"  value="" class="form-control imag">
                <div id="id_to"></div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger update_news">submit</button>
      </div>
    </div>
  </div>
</div>

<!-- News add model -->
<div class="modal" id="news-section">
  <div class="modal-dialog">
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add News Section</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <form enctype="multipart/form-data"  accept-charset="utf-8" name="formname" id="formname"  method="post"  >
            <div class="col-xl-12">
              <!-- <form action="#" method="post"> -->
                <div class="form-group news_save" style="display: none;" id="successMessage">
                  <div class="alert alert-success">
                    <strong>News Save Successfully.</strong>
                  </div>
                </div>
                <div class="form-group">
                  <label>Title</label>
                  <input type="text"  name="title" class="form-control title">
                </div>
                <div class="form-group">
                  <label>text</label>
                  <textarea  name="text" class="form-control text"></textarea>
                </div>
                <div class="form-group">
                  <label>Image</label>
                  <input type="file" id="imag"  name="imag" class="form-control imag">
                </div> 
              </div>
            </div>
            <div class="col-xl-12">
              <input type="submit" value="submit"  onsubmit="hidemodel()" class="btn btn-danger save_news"/>
            </div>
          </form>
        </div>
        <!-- Modal footer -->
        <!-- <div class="modal-footer">
          
        </div> -->
    </div>
  </div>
</div>
<!-- modal end here -->

<script>
  $(document).ready(function(){  
          $('.save_news').click(function(){

               if($('.text').val()==""){
                  alert("Please Enter Text");
                  exit();
               }
               if($('.title').val()==""){
                  alert("Please Enter Title");
                  exit();
               }
               if($('.imag').val()==""){
                  alert("Please select image");
                  exit();
               }
               var text = $('.text').val();  
               var title = $('.title').val();
               if (typeof FormData !== 'undefined') {

        // send the formData
        var formData = new FormData( $("#formname")[0] );

        $.ajax({
            url : "<?php echo base_url(); ?>backend/Login/save_news",  // Controller URL
            type : 'POST',
            data : formData,
            async : false,
            cache : false,
            contentType : false,
            processData : false,
            success : function(data) {
              console.log(data);
                successFunction(data);
                alert('News added successfully');
               // $('#news-sections').modal('hide');
                setTimeout(function(){
                  location.reload();
                  
                }, 1000); 
            }
        });

    } else {
       message("Your Browser Don't support FormData API! Use IE 10 or Above!");
    }   
         
          });  
     });
</script>
<script>
  $(document).ready(function(){  
          $('.get_news').click(function(){
              
               var news_id = $(this).attr("id"); 
                $("#id_to").append('<input type="hidden" name="news_id" value="'+news_id+'"/>');
               $.ajax({  
                    url:"<?php echo base_url(); ?>backend/Login/get_news",  
                    method:"post",  
                    data:{news_id:news_id},  
                    success:function(resonse){
                        var returnedData = JSON.parse(resonse);  
                         $('.title').val(returnedData.title);
                          $('.text').val(returnedData.text);
                           $('.imag').val(returnedData.image);
                           $('.id').val(returnedData.id);

                       }
               });  
          });  
     });
</script>
<script>
  $(document).ready(function(){  
          $('.update_news').click(function(){
                if($('#text').val()==""){
                  alert("Please Enter Text");
                  exit();
               }
               if($('#title').val()==""){
                  alert("Please Enter Title");
                  exit();
               }

               //     if($('#imag').val()==""){
               //    alert("Please select image");
               //    exit();
               // }
               var text = $('.text').val();  
               var title = $('.title').val();

               if (typeof FormData !== 'undefined') {

        // send the formData
        var formData = new FormData( $("#formname1")[0] );

        $.ajax({
            url : "<?php echo base_url(); ?>backend/Login/update_news",  // Controller URL
            type : 'POST',
            data : formData,
            async : false,
            cache : false,
            contentType : false,
            processData : false,
            success : function(data) {
                
                alert('News updated successfully');
                $('#news-update').modal('hide');
                setTimeout(function(){
                  location.reload(true);
                  
                }, 3000); 
            }
        });

    } else {
       message("Your Browser Don't support FormData API! Use IE 10 or Above!");
    }  


               
          });  
     });
</script>
<script>
  function hidemodel(){
      document.getElementById(news-section).style.display="none";
  }

  $(document).ready(function(){  
          $('.dlt_news').click(function(){
               if (!confirm('Are you sure you want to delete this news?')) return false;
               var news_id = $(this).attr("id");  
               $.ajax({  
                    url:"<?php echo base_url(); ?>backend/Login/dlt_news",  
                    method:"post",  
                    data:{news_id:news_id},  
                    success:function(resonse){
                        $('.news_update').show();
                      setTimeout(function(){
                  location.reload(true);
                  
                }, 1000);       
                       }
               });  
          });  
     });
</script>