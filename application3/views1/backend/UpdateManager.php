

<div class="pcoded-content">

   <div class="pcoded-inner-content">

      <div class="main-body">

         <div class="page-wrapper">

            <div class="page-body">

               <div class="row">

                  <!-- order-card start -->

                  <div class="col-sm-12">

                     <h4 class="page-title"> Update  Manager List</h4>

                     <div class="card tabs-card">

                        <div class="card-block p-0">

                           <!-- Nav tabs -->

                      <div class="container">





<div class="form-sec p-4">



 <?php  echo form_open_multipart('update_Manager')?>

 <?php if( $error = $this->session->flashdata('update_manager')): ?>

        <div class="form-group">

              <div class="input-icon">

        <div class="alert alert-dismissible alert-success" id="successMessage">

          <?php echo $error; ?>

        </div>

      </div>

    </div>

  <?php endif; ?>

    <div class="form-group">

      <label>Name:</label>

      <input type="text" class="form-control" required="" name="name" id="name" placeholder="Enter Name" value="<?php  print_r($user_view[0]['name']); ?>">

    </div>

    <div class="form-group">

      <label>Email:</label>

      <input type="email" class="form-control" name="email" required="" id="name" placeholder="Enter Email" value="<?php  print_r($user_view[0]['email']); ?>">

    </div>

    <div class="form-group">

      <label>Password:</label>

      <input type="password" class="form-control" name="password" required="" id="name" placeholder="Enter Password" value="<?php  print_r($user_view[0]['pass']); ?>">

    </div>

    <div class="form-group">

      <label>Phone No.:</label>

      <input type="text" class="form-control" name="contact" required="" id="phone" placeholder="Enter Phone no." value="<?php  print_r($user_view[0]['contact']); ?>">

      <input type="hidden" name="images" value="<?php  print_r($user_view[0]['profile_pic']); ?>">

      <input type="hidden" name="id" value="<?php  print_r($user_view[0]['id']); ?>">

    </div>

   <div class="form-group">

      <label>Address:</label>

      <textarea value="<?php  print_r($user_view[0]['address']); ?>"  name="address" class="form-control" id="iq" placeholder="Enter Address"><?php  print_r($user_view[0]['address']); ?></textarea>

    </div>

    

   <div class="form-group">

      <label>Location:</label>

      <textarea value="<?php  print_r($user_view[0]['location']); ?>" name="location" class="form-control" id="iq" placeholder="Enter your Issues/query"><?php  print_r($user_view[0]['location']); ?></textarea>

    </div>

    <div class="form-group">

      <img style="width:10%;" src="<?php echo base_url();  ?>assets/images/vendors/store_img/<?php  print_r($user_view[0]['profile_pic']); ?>">

      <label>Image:</label>

      <input type="file" name="userfile" class="form-control">

    </div>

    <div class="form-group">

      
      <label>Authority:</label>

      <table>

        <tr>
          <?php  
              $authority = (explode(",",$user_view[0]['authority']));
              $appliances =  array(1, 2, 3, 4, 5,6,7,8,9,10,11);
              $appliances =  array("vendor"=>1, "user"=>2, "Manage Accounts:  "=>3,"Manage Managers:"=>4,"Support:"=>5,"Manage Ads:"=>6,"Category:"=>7,"About us:"=>8,"Contact us:"=>9,"My Profile:"=>10,"Setting:"=>11);
// print_r($appliances);
$i = 0;
foreach ($appliances as $key => $value) {
  if (in_array($appliances[$key], $authority)) {
                      echo '<td><input  type="checkbox"  checked="checked" value="' . $value . '"     name="authority[]">' . $key. '</input></td>';
                  } else {
                      echo '<td><input type="checkbox" value="' . $value . '" name="authority[]">' .     $key . '</input></td>';
                  }
  $i++;
  
}

       ?>
        <!--   <td>Venders:</td>

          <td><input type="checkbox" name="authority[]" value="1" <?php if($authority[0]==1){ echo "checked"; } ?> ></td>

          <td>Users:</td>

          <td><input type="checkbox" name="authority[]" value="2" <?php if($authority[1]==2){ echo "checked"; } ?>></td>

          <td>Manage Accounts:</td>

          <td><input type="checkbox" name="authority[]" value="3"<?php if($authority[2]==3){ echo "checked"; } ?>></td>

          <td>Manage Managers:</td>

          <td><input type="checkbox" name="authority[]" value="4" <?php if($authority[3]==4){ echo "checked"; } ?>></td>

          <td>Support:</td>

          <td><input type="checkbox" name="authority[]" value="5" <?php if($authority[4]==5){ echo "checked"; } ?>></td>

          <td>Manage Ads:</td>

          <td><input type="checkbox" name="authority[]" value="6" <?php if($authority[5]==6){ echo "checked"; } ?>></td>

          <td>Category:</td>

          <td><input type="checkbox" name="authority[]" value="7" <?php if($authority[6]==7){ echo "checked"; } ?>></td> -->

         

        </tr>

        <tr>

          <!--  <td>About us:</td>

          <td><input type="checkbox" name="authority[]" value="8" <?php if($authority[7]==8){ echo "checked"; } ?>></td>

          <td>Contact us:</td>

          <td><input type="checkbox" name="authority[]" value="9" <?php if($authority[8]==9){ echo "checked"; } ?>></td>

          <td>My Profile:</td>

          <td><input type="checkbox" name="authority[]" value="10" <?php if($authority[9]==10){ echo "checked"; } ?>></td>

          <td>Setting:</td>

          <td><input type="checkbox" name="authority[]" value="11"<?php if($authority[10]==11){ echo "checked"; } ?>></td> -->

        </tr>

      </table>

    </div>

    

    <input type="submit" name="submit" value="Save" class="btn btn-success">

  </form>

  </div>





</div>

                           <!-- Tab panes -->

                         

                        </div>

                     </div>

                  </div>

                  <!-- tabs card end -->

               </div>

            </div>

         </div>

      </div>

   </div>

</div>

